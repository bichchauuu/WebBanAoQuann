<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\InfoShips;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class ClientsController extends Controller
{
    //
    public function index()
    {
        $items = Product::orderBy('created_at', 'desc')->paginate(8);
        $suppliers = Supplier::where('status', config('app.status.ACTIVE'))->get();
        if ($items) {
            foreach ($items as $item) {
                if ($item->promotion_id) {
                    $promotion = Promotion::findOrFail($item->promotion_id);
                    $item->price_sell = $item->price * ((100 - $promotion->percent) / 100);
                    $item->percent = $promotion->percent;
                } else {
                    $item->price_sell = 0;
                    $item->percent = 0;
                }
            }
        }
        return view('clients.pages.home', ['items' => $items, 'suppliers' => $suppliers]);
    }
   
    public function page_product(Request $request)
    {
        $categorys = Category::with('product')->get();
        $prange = $request->query("prange");
        if (!$prange)
            $prange = "0,5000000";
        $from  = explode(",", $prange)[0];
        $to  = explode(",", $prange)[1];
        $q_categories = $request->query("categories");
        $search = $request->query("search");
        if ($q_categories) {
            $items = Product::orderBy('created_at', 'desc')->whereIn('category_id', explode(',', $q_categories))->whereBetween('price', array($from, $to))->whereRaw('LOWER(`name`) like ?', ['%'.strtolower($search).'%'])->paginate(12);
        } else {
            $items = Product::orderBy('created_at', 'desc')->whereBetween('price', array($from, $to))->whereBetween('price', array($from, $to))->whereRaw('LOWER(`name`) like ?', ['%'.strtolower($search).'%'])->paginate(12);
        }
        if ($items) {
            foreach ($items as $item) {
                if ($item->promotion_id) {
                    $promotion = Promotion::findOrFail($item->promotion_id);
                    $item->price_sell = $item->price * (100 - $promotion->percent) / 100;
                    $item->percent = $promotion->percent;
                } else {
                    $item->price_sell = $item->price;
                    $item->percent = 0;
                }
            }
        }
        return view('clients.pages.shop', ['items' => $items, 'categorys' => $categorys, 'q_categories' => $q_categories, 'from' => $from, 'to' => $to]);
    }

    public function about()
    {
        return view('clients.pages.about');
    }
    public function detail(String $id)
    {
        $product = Product::with('category')->find($id);
        if ($product->promotion_id) {
            $promotion = Promotion::findOrFail($product->promotion_id);
            $product->price_sell = $product->price * ((100 - $promotion->percent) / 100);
            $product->percent = $promotion->percent;
        } else {
            $product->price_sell = 0;
            $product->percent = 0;
        }
        return view('clients.pages.detail_product', ['product' => $product]);
    }
    public function cart()
    {
        $cartItems = Cart::instance('cart')->content();
        // var_dump($cartItems);
        return view('clients.pages.cart', ['cartItems' => $cartItems]);
    }
    public function addToCart(Request $request)
    {
        $product = Product::find($request->id);
        $price = $product->price;
        Cart::instance('cart')->add($product->id, $product->name, $request->quantity, $price)->associate(Product::class);
        return redirect()->back()->with('message', 'Thêm giỏ hàng thành công');
    }
    public function updateCart(Request $request)
    {
        Cart::instance('cart')->update($request->rowId, $request->quantity);
        return redirect()->route('client.page.cart');
    }
    public function removeItem(Request $request)
    {
        $rowId = $request->rowId;
        Cart::instance('cart')->remove($rowId);
        return redirect()->route('client.page.cart');
    }
    public function clearCart()
    {
        Cart::instance('cart')->destroy();
        return redirect()->route('client.page.cart');
    }
    public function checkOut()
    {
        if (Auth::check()) {
            $cartItems = Cart::instance('cart')->content();
            foreach ($cartItems as $item) {
                $product = Product::findOrFail($item->id);
                if ($item->qty > $product->quantity) {
                    return redirect()->back()->with('error', 'Số lượng bạn quá lớn với tồn kho');
                }
            }
            if ($cartItems->count() > 0) {
                $infoShip = InfoShips::where('user_id', Auth::user()->id)->get();
                return view('clients.pages.checkout', ['cartItems' => $cartItems, 'infoShip' => $infoShip]);
            } else {
                return view('clients.pages.cart', ['cartItems' => $cartItems]);
            }
        } else {
            return redirect()->route('client.page.cart')->with('error', 'Vui lòng đăng nhập để đặt hàng và theo dõi đơn hàng !');
        }
    }
    public function order(Request $request)
    {
        $id = $request->infoShip;
        $pay = $request->vnpay;
        $infoShip = InfoShips::findOrFail($id);
        $totalcat = Cart::instance('cart')->content();
        $total = config('app.ship.PRICE');
        foreach ($totalcat as $cart) {
            $total += $cart->price * $cart->qty;
        }
        $carts = Cart::instance('cart')->content();
        if (Auth::check()) {
            $order = Order::create([
                'user_id' => Auth::user()->id,
                'total' => $total,
                'name' => $infoShip->name,
                'phone' => $infoShip->phone,
                'email' => $infoShip->email,
                'ward' => $infoShip->ward,
                'district' => $infoShip->district,
                'province' => $infoShip->province,
                'address' => $infoShip->address,
                'status' => config('app.order_status.ORDER'),
                'isPay' => false,
            ]);
            if ($order) {
                foreach ($carts as $cart) {
                    OrderItem::create([
                        'product_id' => $cart->id,
                        'order_id' => $order->id,
                        'price' => $cart->price * $cart->qty,
                        'quantity' => $cart->qty,
                    ]);
                }
                $this->clearCart();
            }
            if ($pay == 1) {
                return $this->createVNPAY($order->id, $order->total);
            } else {
                return redirect()->route('client.page.cart')->with('success', 'Đặt hàng thành công vào theo dõi đơn hàng đêm theo dõi tiến độ !');
            }
        }
    }
    public function order_list()
    {
        $id = Auth::user()->id;
        $orders = Order::where('user_id', $id)->paginate(5);
        return view('clients.pages.order', ['orders' => $orders]);
    }
    public function cancel_order(string $id)
    {
        $order = Order::with('orderItems')->findOrFail($id);
        if (Auth::user()->id == $order->user_id) {
            if ($order->status == config('app.order_status.ORDER')) {
                $order->status = config('app.order_status.CANCEL');
                $order->update();
                return redirect()->back();
            }
        }
        return response();
    }
    public function order_detail(string $id)
    {
        $order = Order::with('orderItems')->findOrFail($id);
        $products = [];
        foreach ($order->orderItems as $item) {
            $product = Product::findOrFail($item->product_id);
            $product->quantity = $item->quantity;
            $product->price = $item->price;
            $product->created_at = $item->created_at;
            $products[] = $product;
        }
        return view('clients.pages.detail_order', ['order' => $order, 'products' => $products]);
    }
    public function add_info_ship()
    {
        return view('clients.pages.add_info_ship');
    }
    public function post_info(Request $request)
    {
        if (Auth::check()) {
            $request->validate([
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required',
                'address' => 'required',
                'province' => 'required',
                'district' => 'required',
                'ward' => 'required'
            ]);
            $infoShip = InfoShips::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
                'province' => $request->province,
                'district' => $request->district,
                'ward' => $request->ward,
            ]);
            return redirect()->back()->with('success', 'Thêm thông tin thành công!');
        } else {
            $this->nopermision();
        }
    }
    public function delete_info(string $id)
    {
        $info = InfoShips::findOrFail($id);
        $info->delete();
        return redirect()->back();
    }
    public function nopermision()
    {
        return view('clients.pages.norpermission');
    }
}
