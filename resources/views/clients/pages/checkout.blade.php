@extends('clients.layouts.app')
@section('contents')
    <section class="breadcrumb-section section-b-space" style="padding-top:100px;padding-bottom:20px;">
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>Checkout</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Cart Section Start -->
    <section class="section-b-space">
        <div class="container">
            <form class="needs-validation" action="" method="POST">
                @csrf
                @if ($infoShip->count() > 0)
                    <div class="row mb-3">
                        <div class="d-flex flex-wrap justify-content-between my-3">
                            <h3 class="mb-3 theme-color">Sử dụng thông tin có sẵn</h3>
                            <div class="">
                                <div class="mb-3">
                                    <input type="hidden" name="vnpay" id="flexCheckDefault" value="0" checked style="display:none;"/>
                                </div>
                                <button type="submit" class="btn btn-solid-default "> Đặt hàng </button>
                            </div>
                        </div>
                        @foreach ($infoShip as $index => $info)
                            <div class="col-12 mb-2">
                                <div class="card p-3">
                                    <div class="row">
                                        <div class="col-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="infoShip"
                                                    id="flexRadioDefault1" value="{{ $info->id }}"
                                                    @if ($index == 0) : {{ 'checked' }} @endif>
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Dùng địa chỉ này
                                                </label>
                                            </div>
                                            <div><strong>Khách hàng: </strong>{{ $info->name }}</div>
                                            <div><strong>Số điện thoại:</strong> {{ $info->phone }} , Email: {{ $info->email }}</div>
                                            <div><strong>Địa chỉ:</strong> {{ $info->address }}, {{ $info->ward }}, {{ $info->district }}, {{ $info->province }}
                                            </div>
                                        </div>
                                        <div class="col-2 row">
                                            <a href="{{ route('client.delete.info', $info->id) }}"
                                                class="btn btn-danger mb-2 col-12">
                                                Xóa
                                            </a>
                                            <a href="" class="btn btn-warning col-12">
                                                Sửa
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="text-end my-3">
                            <a href="/addinfoship" class="btn btn-primary">Thêm địa chỉ giao hàng !</a>
                        </div>
                    </div>
                @else
                    <div class="row mb-3">
                        <div class="d-flex flex-wrap justify-content-between my-3">
                            <h3 class="mb-3 theme-color">Bạn chưa có địa chỉ giao hàng</h3>
                            <a href="/addinfoship" class="btn btn-primary">Thêm địa chỉ giao hàng !</a>
                        </div>
                    </div>
                @endif
                <div class="row g-4 justify-content-center">
                    <div class="col-lg-8">
                       
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <table class="table cart-table">
                                    <thead>
                                        <tr class="table-head">
                                            <th scope="col">image</th>
                                            <th scope="col">product name</th>
                                            <th scope="col">price</th>
                                            <th scope="col">quantity</th>
                                            <th scope="col">total</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cartItems as $item)
                                            <tr>
                                                <td>
                                                    <a href="{{ '/product/' . $item->id }}">
                                                        <img src="{{ asset($item->model->img) }}" class="blur-up lazyloaded"
                                                            alt="">
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ '/product/' . $item->id }}">{{ $item->name }}</a>
                                                    <div class="mobile-cart-content row">
                                                        <div class="col">
                                                            <div class="qty-box">
                                                                <div class="input-group">
                                                                    <input type="text" name="quantity"
                                                                        class="form-control input-number" value="1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <h2>{{ number_format($item->price) }}</h2>
                                                        </div>
                                                        <div class="col">
                                                            <h2 class="td-color">
                                                                <a href="javascript:void(0)">
                                                                    <i class="fas fa-times"></i>
                                                                </a>
                                                            </h2>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h2>{{ number_format($item->price) }}</h2>
                                                </td>
                                                <td>
                                                    <div class="qty-box">
                                                        <h2 class="td-color">{{ number_format($item->qty ) }}</h2>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h2 class="td-color">{{ number_format($item->price) }}</h2>
                                                </td>
                                               
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
        
                            
                        </div>
                    
                    </div>
                    <div class="col-lg-4">
                        <h3 class="mb-3 theme-color">Thông tin giỏ hàng</h3>
                        <div class="your-cart-box">
                            <h3 class="mb-3 d-flex text-capitalize">Your cart<span
                                    class="badge bg-theme new-badge rounded-pill ms-auto bg-dark">{{ $cartItems->count() }}</span>
                            </h3>
                            <ul class="list-group mb-3">
                                <li class="list-group-item d-flex justify-content-between lh-condensed active">
                                    <div class="text-dark">
                                        <h6 class="my-0" >Tên sản phẩm</h6>
                                        <small></small>
                                    </div>
                                    
                                    <span>Thành tiền</span>
                                </li>
                                <?php $total = config('app.ship.PRICE'); ?>
                                @foreach ($cartItems as $item)
                                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                                        <div class="text-dark">
                                            <h6 class="my-0">{{ $item->name }}</h6>
                                            <small></small>
                                        </div>
                                        <span>{{ number_format($item->price * $item->qty) . ' VNĐ' }}</span>
                                    </li>
                                    <?php $total += $item->price * $item->qty; ?>
                                @endforeach
                                <li class="list-group-item d-flex lh-condensed justify-content-between">
                                    <span class="fw-bold">Phí ship (VNĐ)</span>
                                    <strong>
                                        {{ number_format(config('app.ship.PRICE')) . ' VNĐ' }}
                                    </strong>
                                </li>
                                <li class="list-group-item d-flex lh-condensed justify-content-between">
                                    <span class="fw-bold">VAT (0%)</span>
                                    <strong>
                                        0 VNĐ
                                    </strong>
                                </li>
                                <li class="list-group-item d-flex lh-condensed justify-content-between">
                                    <span class="fw-bold">Tổng cộng (VNĐ)</span>
                                    <strong>
                                        {{ number_format($total) . ' VNĐ' }}
                                    </strong>
                                </li>
                                <a href="/cart" class="btn btn-solid-default mt-4">Quay về giỏ hàng</a>
                            </ul>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Cart Section End -->
@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script>
        var citis = document.getElementById("city");
        var districts = document.getElementById("district");
        var wards = document.getElementById("ward");
        var Parameter = {
            url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
            method: "GET",
            responseType: "json",
        };
        var promise = axios(Parameter);
        promise.then(function(result) {
            renderCity(result.data);
        });

        function renderCity(data) {
            for (const x of data) {
                citis.options[citis.options.length] = new Option(x.Name, x.Id);
            }
            citis.onchange = function() {
                district.length = 1;
                ward.length = 1;
                if (this.value != "") {
                    const result = data.filter(n => n.Id === this.value);

                    for (const k of result[0].Districts) {
                        district.options[district.options.length] = new Option(k.Name, k.Id);
                    }
                }
                var selectedOption = citis.options[citis.selectedIndex];
                var selectedTinh = selectedOption.text;
                var tinh = document.getElementById("tinh");
                tinh.value = selectedTinh;
            };
            district.onchange = function() {
                ward.length = 1;
                const dataCity = data.filter((n) => n.Id === citis.value);
                if (this.value != "") {
                    const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;

                    for (const w of dataWards) {
                        wards.options[wards.options.length] = new Option(w.Name, w.Id);
                    }
                }
                var selectedOption = district.options[district.selectedIndex];
                var selectedHuyen = selectedOption.text;
                var huyen = document.getElementById("huyen");
                huyen.value = selectedHuyen;
            };
            wards.onchange = function() {
                var selectedOption = wards.options[wards.selectedIndex];
                var selectedPhuong = selectedOption.text;
                var phuong = document.getElementById("phuong");
                phuong.value = selectedPhuong;
            }
        }
    </script>
@endpush
