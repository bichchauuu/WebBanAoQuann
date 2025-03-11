@extends('clients.layouts.app')
@section('contents')
    @include('clients.layouts.banner')
    <div class="untree_co-section">
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

    </div> <!-- /.untree_co-section -->
    <div class="untree_co-section">
        <div class="container">
            <div class="row mb-5 align-items-center">
                <div class="col-md-6">
                    <h2 class="h3">Popular Items</h2>
                </div>
                <div class="col-sm-6 carousel-nav text-sm-right">
                    <a href="#" class="prev js-custom-prev-v2">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-circle"
                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path fill-rule="evenodd"
                                d="M8.354 11.354a.5.5 0 0 0 0-.708L5.707 8l2.647-2.646a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708 0z" />
                            <path fill-rule="evenodd" d="M11.5 8a.5.5 0 0 0-.5-.5H6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5z" />
                        </svg>
                    </a>
                    <a href="#" class="next js-custom-next-v2">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right-circle"
                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path fill-rule="evenodd"
                                d="M7.646 11.354a.5.5 0 0 1 0-.708L10.293 8 7.646 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0z" />
                            <path fill-rule="evenodd" d="M4.5 8a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5z" />
                        </svg>
                    </a>
                </div>
            </div> <!-- /.heading -->
            <div class="owl-3-slider owl-carousel">
                @foreach ($items as $product)
                    <div class="item">
                        <div class="product-item">
                            <a href="{{ route('client.page.detail', $product->id) }} class="product-img">
                                <div class="label sale top-right">
                                    <div class='content'>Sale</div>
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
                    </div> <!-- /.item -->
                @endforeach
            </div>
        </div> <!-- /.container -->
    </div> <!-- /.untree_co-section -->
@endsection
