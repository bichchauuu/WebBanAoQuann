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
                    <h3>Giới thiệu</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.htm">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Về chúng tôi</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Section start -->

        <div class="untree_co-hero" style="background-image: url('images/hero-slider-1-min.jpg');">
          <div class="container">
            <div class="row align-items-center justify-content-center">
              <div class="col-lg-8 text-center text-lg-center">

                <h1 class="mb-4 heading text-white" data-aos="fade-up" data-aos-delay="100">Sản phẩm</a></h1>


                <p class="mb-0" data-aos="fade-up" data-aos-delay="300"><a href="/product" class="btn btn-black">Khám phá ngay</a></p>

              </div>
            </div>
          </div>
        </div> <!-- /.untree_co-hero -->

        <div class="untree_co-section">
          <div class="container">
            <div class="row justify-content-between">
              <div class="col-lg-5 mb-5">
                <h2 class="line-bottom mb-4" data-aos="fade-up" data-aos-delay="0">Tại sao chọn Shion House</h2>
                <p data-aos="fade-up" data-aos-delay="100">
                  Cam kết cung cấp các sản phẩm chính hãng và nhập khẩu 100% từ Mỹ, Pháp… Số lượng sản phẩm và dịch vụ lớn nhất với chủng loại đa dạng, phong phú sẽ đáp ứng tất cả nhu cầu mua sắm của bạn.
                </p>
                <ul class="list-unstyled ul-check mb-5 primary" data-aos="fade-up" data-aos-delay="200">
                  <li>Đa dạng mẫu mã, kiểu dáng</li>
                  <li>Thời thượng, Trendy</li>
                  <li>Giao hàng hoả tốc</li>
                </ul>

                <p data-aos="fade-up" data-aos-delay="200">
                  <a href="/product" class="btn btn-black">Mua sắm</a>
                  <a href="/" class="btn btn-outline-black">Trang chủ</a>
                </p>
              </div>
            </div>
          </div>
        </div> <!-- /.untree_co-section -->
@endsection
