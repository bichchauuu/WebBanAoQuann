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
                    <h3>Shop</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.htm">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Shop</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleSlidesOnly"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Trước</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleSlidesOnly"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Sau</span>
            </button>
        </div>
    </div>
    <!-- Shop Section start -->
    <div class="container-fluid bg-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 category-side col-md-4">
                    <div class="category-option">
                        <div class="button-close mb-3">
                            <button class="btn p-0"><i data-feather="arrow-left"></i>Đóng</button>
                        </div>
                
                        <div class="accordion category-name" id="accordionExample">
                            <div class="accordion-item category-price">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFour">Giá</button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse show"
                                    aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="range-slider category-list">
                                            <input type="text" class="js-range-slider" id="js-range-price"
                                                value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item category-rating">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseSix">
                                        Loại
                                    </button>
                                </h2>
                                <div id="collapseSix" class="accordion-collapse collapse show" aria-labelledby="headingOne">
                                    <div class="accordion-body category-scroll">
                                        <ul class="category-list">
                                            @foreach ($categorys as $category)
                                                <li>
                                                    <div class="form-check ps-0 custome-form-check">
                                                        <input class="checkbox_animated check-it" id="ct{{ $category->id }}"
                                                            name="categories" type="checkbox"
                                                            @if (in_array($category->id, explode(',', $q_categories))) checked="checked" @endif
                                                            value="{{ $category->id }}"
                                                            onchange="filterProductsByCategory(this)">
                                                        <label class="form-check-label">{{ $category->name }}</label>
                                                        <p class="font-light">({{ $category->product->count() }})</p>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="category-product col-lg-9 col-12 ratio_30">
                    <!-- label and featured section -->
                    <!-- Prodcut setion -->
                    <div class="container">

                        <div class="row">
                            @foreach ($items as $product)
                                <div class="col-6 col-sm-6 col-md-6 mb-4 col-lg-4">
                                    <div class="product-item">
                                        <a href="{{ route('client.page.detail', $product->id) }}" class="product-img">
            
                                            <div class="label new top-right">
                                                <div class='content'>New</div>
                                            </div>
            
            
                                            <img src="{{ $product->img }}" alt="Image" class="img-fluid">
                                        </a>
                                        <h3 class="title"><a href="{{ route('client.page.detail', $product->id) }}">
                                                {{ $product->name }}
                                            </a>
                                        </h3>
                                        <div class="price">
                                         
                                                <p class=" fs-6 text-decoration-line-through">
                                                    {{ number_format($product->price) . ' đ' }}
                                                </p>
                                            
                                            <div class="d-flex flex-wrap">
                                                <p class="fs-6 fw-bold text-danger" style="width: 100%">
                                                    {{ number_format($product->price_sell) . ' đ' }}</p>
                                                @if ($product->percent != 0)
                                                    <p class="ms-3 fs-6 sell">{{ '- ' . $product->percent . '%' }}</p>
                                                @endif
                                            </div>
            
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
            
                    </div>
                    <div class="row g-sm-4 g-3 mt-3">
                        {{ $items->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Section end -->
    <div id="qvmodal"></div>

    <form id="frmFilter" method="GET">
        <input type="hidden" name="prange" id="prange" value="" />
        <input type="hidden" id="order" name="order" value="-1">
        <input type="hidden" id="categories" name="categories" value="{{ $q_categories }}" />
    </form>
@endsection
@push('scripts')
    <script>
        $(function() {
            $("#orderby").on("change", function() {
                $("#order").val($("#orderby option:selected").val());
                $("#frmFilter").submit();
            });
        });

        function filterProductsByCategory(brand) {
            var categories = "";
            $("input[name='categories']:checked").each(function() {
                if (categories == "") {
                    categories += this.value;
                } else {
                    categories += "," + this.value;
                }
            });
            $("#categories").val(categories);
            $("#frmFilter").submit();
        }

        $(function() {

            var $range = $(".js-range-slider");
            instance = $range.data("ionRangeSlider");
            instance.update({
                from: {{ $from }},
                to: {{ $to }}
            });

            $("#prange").on("change", function() {
                setTimeout(() => {
                    $("#frmFilter").submit();
                }, 1000);
            });
        });
    </script>
@endpush
