@extends('clients.layouts.app')
@section('contents')
    <div class="breadcrumb-section section-b-space" style="padding-top:100px;padding-bottom:20px;">
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
                    <h3>Theo dõi đơn hàng</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.htm">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Order</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Section start -->
    <div class="container-fluid bg-white py-5">
        <div class="container">
            @if ($orders->count() > 0)
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                        id="kt_ecommerce_products_table">
                        <thead>
                            <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                <th>Mã đơn hàng</th>
                                <th>Tên người nhận</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-600">
                            @foreach ($orders as $order)
                                <tr class="odd">
                                    <td>
                                        <span class="fw-bold">{{ $order->id }}</span>
                                    </td>
                                    <td>
                                        {{ $order->name }}
                                    </td>
                                    <td>
                                        {{ $order->phone }}
                                    </td>
                                    <td>{{ $order->address }}
                                    </td>
                                    <td>
                                        @if ($order->status == config('app.order_status.ORDER'))
                                            <span class="fw-bold stt stt-order">Order</span>
                                            <!--end::Badges-->
                                        @elseif ($order->status == config('app.order_status.SHIPPING'))
                                            <span class="fw-bold stt stt-shipping">Shipping</span>
                                        @elseif($order->status == config('app.order_status.DONE'))
                                            <span class="fw-bold stt stt-done">Done</span>
                                        @elseif ($order->status == config('app.order_status.CANCEL'))
                                            <span class="fw-bold stt stt-cancel"> Cancel</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2>Đơn hàng đang trống</h2>
                        <h5 class="mt-3">Mua sắm ngay</h5>
                        <a href="/product" class="btn btn-warning mt-5">Shop Now</a>
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection
