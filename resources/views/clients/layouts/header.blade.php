<div class="search-form" id="search-form">
    <form action="/product">
        <input type="text" name="search" class="form-control" placeholder="Enter keyword to search...">
        <button class="button">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z" />
                <path fill-rule="evenodd"
                    d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
            </svg>
        </button>
        <button class="button">
            <div class="close-search">
                <span class="icofont-close js-close-search"></span>
            </div>
        </button>

    </form>
</div>

<div class="site-mobile-menu">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
            <span class="icofont-close js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>



<nav class="site-nav mb-5">
    <div class="sticky-nav js-sticky-header">

        <div class="container position-relative">
            <div class="site-navigation text-center dark">
                <a href="index.html" class="logo menu-absolute m-0">ShionHouse<span class="text-primary">.</span></a>

                <ul class="js-clone-nav pl-0 d-none d-lg-inline-block site-menu">
                    <li><a href="/" class="active">Trang chủ</a>
                    </li>
                    <li><a href="/product">Mua hàng</a>
                    </li>
                    <li><a href="/about">Giới
                            thiệu</a>

                </ul>




                <div class="menu-icons">

                    <a href="#" class="btn-custom-search" id="btn-search">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z" />
                            <path fill-rule="evenodd"
                                d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
                        </svg>
                    </a>
                    @if (Auth::check())
                        <li class="onhover-dropdown">
                            <div class="cart-media name-usr"
                                style="font-size:11px;color:rgba(0, 0, 0, 0.5);background-color:transparent; padding:0; margin-right:20px;">
                                <i data-feather="user"></i>
                                <span class="ms-2">{{ Auth::user()->name }}</span>
                            </div>
                            <div class="onhover-div profile-dropdown">
                                <ul
                                    style="justify-content: start;
                                            align-items: start;
                                            visibility: visible;
                                            display: flex;
                                            flex-direction: column;
                                            padding: 2rem;
                                            border-radius: 2rem;
                                            gap:16px; ">
                                    @if (Auth::user()->role?->id != config('app.role.USER'))
                                        <li>
                                            <a href="/admin" class="d-block" style="color:rgba(0, 0, 0, 0.5);">Admin</a>
                                        </li>
                                    @endif
                                    <li>
                                        <a href="/order" class="d-block" style="color:rgba(0, 0, 0, 0.5);">Theo dõi đơn hàng</a>
                                    </li>
                                    <li>
                                        <a href="/logout" class="d-block" style="color:rgba(0, 0, 0, 0.5);">Đăng xuất</a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                    @else
                        <li class="onhover-dropdown">
                            <div class="cart-media name-usr"  style="font-size:24px;color:rgba(0, 0, 0, 0.5);background-color:transparent; margin-right:20px;padding:0px;">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M13 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM3.022 13h9.956a.274.274 0 0 0 .014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 0 0 .022.004zm9.974.056v-.002.002zM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                </svg>
                            </div>
                            <div class="onhover-div profile-dropdown">
                                <ul  style="justify-content: start;
                                align-items: start;
                                visibility: visible;
                                display: flex;
                                flex-direction: column;
                                padding: 2rem;
                                border-radius: 2rem;
                                gap:16px; ">
                                    <li>
                                        <a href="/login" class="d-block" style="color:rgba(0, 0, 0, 0.5);">Đăng nhập</a>
                                    </li>
                                    <li>
                                        <a href="/register" class="d-block" style="color:rgba(0, 0, 0, 0.5);">Đăng ký</a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                    @endif

                    <a href="/cart" class="cart">
                        <span class="item-in-cart"> {{ Cart::instance('cart')->content()->count() }}</span>
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                        </svg>
                    </a>

                </div>

                <a href="#"
                    class="burger ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block d-lg-none"
                    data-toggle="collapse" data-target="#main-navbar">
                    <span></span>
                </a>

            </div>
        </div>
    </div>
</nav>
