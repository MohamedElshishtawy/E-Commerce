<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Male-Fashion | {{$title = "Shop"}}</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href={{asset('css/bootstrap.min.css')}} type="text/css">
    <link rel="stylesheet" href={{asset("css/fontawsome.all.min.css")}} type="text/css">
    <link rel="stylesheet" href={{asset("css/elegant-icons.css" )}} type="text/css">
    <link rel="stylesheet" href={{asset("css/magnific-popup.css")}} type="text/css">
    <link rel="stylesheet" href={{asset("css/nice-select.css")}} type="text/css">
    <link rel="stylesheet" href={{asset("css/owl.carousel.min.css")}} type="text/css">
    <link rel="stylesheet" href={{asset("css/slicknav.min.css")}} type="text/css">
    <link rel="stylesheet" href={{asset("css/style.css")}} type="text/css">
    {{-- SPECIFIC STYLE --}}
    {{ $more_css_links }}

</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__nav__option">
            <a href="#" class="search-switch"><i class="fa fa-search fa-fw"></i></a>
            @auth
                <a href=""><i class="fa-solid fa-cart-shopping"></i></a>
                <div>
                    <i class="fa fa-dollar"></i>
                    <span>{{\App\Models\Cart::calculateTotalPriceInCart()?? 0.00}}</span>
                </div>
                <form action={{route("logout")}} method=POST>
                    @csrf
                    <button type="submit" class="border-0 bg-transparent"><i class="fa fa-door-open"></i></button>
                </form>
            @else 
                <a href={{route("register")}}><i class="fa fa-user-plus"></i></a>
                <a href={{route("login")}}><i class="fa fa-arrow-right-to-bracket"></i></a>
            @endauth
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <p>Free shipping, 30-day return or refund guarantee.</p>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <a href={{route("home")}}><img src={{asset("img/logo.png")}} alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu mobile-menu">
                        @php
                            $pages = ["home", "shop", "pages"];
                        @endphp
                        <ul>
                            <li {{$title == "Home" ? 'class=active' : '' }}><a href={{route("home")}}>Home</a></li>
                            <li {{$title == "Shop" ? 'class=active' : '' }}><a href="./shop.html">Shop</a></li>
                            <li {{$title == "Process" ? 'class=active' : '' }}><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href={{route("add_product")}}><i class="fa fa-plus fa-fw"></i> Add Product</a></li>
                                    <li><a href={{route("my_products")}}><i class="fa fa-list-check"></i> My Products</a></li>
                                    <li><a href={{route("cart_page")}}>Shopping Cart</a></li>
                                    <li><a href="./checkout.html">Check Out</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="./blog.html">Blog</a></li>
                            <li><a href="./contact.html">Contacts</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="header__nav__option">
                        <a href="#" class="search-switch"><i class="fa fa-search fa-fw"></i></a>
                        @auth
                            <a href={{route("cart_page")}} class="cart_btn">
                                <div><i class="fa-solid fa-cart-shopping"></i></div>
                                <div>
                                    <i class="fa fa-dollar"></i>
                                    {{\App\Models\Cart::calculateTotalPriceInCart()?? 0.00}}
                                </div>
                            </a>
                            <form action={{route("logout")}} method=POST>
                                @csrf
                                <button type="submit" class="border-0 bg-transparent"><i class="fa fa-door-open"></i></button>
                            </form>
                        @else 
                            <a href={{route("register")}}><i class="fa fa-user-plus"></i></a>
                            <a href={{route("login")}}><i class="fa fa-arrow-right-to-bracket"></i></a>
                        @endauth

                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>
    <!-- Header Section End -->

    <main>
        <x-message/>
        {{$slot}}
    </main>

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="#"><img src={{asset("img/footer-logo.png")}} alt=""></a>
                        </div>
                        <p>The customer is at the heart of our unique business model, which includes design.</p>
                        <a href="#"><img src={{asset("img/payment.png")}} alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                            <li><a href="#">Clothing Store</a></li>
                            <li><a href="#">Trending Shoes</a></li>
                            <li><a href="#">Accessories</a></li>
                            <li><a href="#">Sale</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Payment Methods</a></li>
                            <li><a href="#">Delivary</a></li>
                            <li><a href="#">Return & Exchanges</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6>NewLetter</h6>
                        <div class="footer__newslatter">
                            <p>Be the first to know about new arrivals, look books, sales & promos!</p>
                            <form action="#">
                                <input type="text" placeholder="Your email">
                                <button type="submit"><span class="icon_mail_alt"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer__copyright__text">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <p>Copyright ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>2020
                            All rights reserved | This template is made with <i class="fa fa-heart-o"
                            aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        </p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="{{asset("js/jquery-3.3.1.min.js")}}"></script>
    <script src="{{asset("js/bootstrap.min.js")}}"></script>
    <script src="{{asset("js/jquery.nice-select.min.js")}}"></script>
    <script src="{{asset("js/jquery.nicescroll.min.js")}}"></script>
    <script src="{{asset("js/jquery.magnific-popup.min.js")}}"></script>
    <script src="{{asset("js/jquery.countdown.min.js")}}"></script>
    <script src="{{asset("js/jquery.slicknav.js")}}"></script>
    <script src="{{asset("js/mixitup.min.js")}}"></script>
    <script src="{{asset("js/owl.carousel.min.js")}}"></script>
    <script src="{{asset("js/main.js")}}"></script>
    <script src="{{asset("js/products/options.js")}}"></script>
    <script src="{{asset("js/products/addToCart.js")}}"></script>
</body>

</html>