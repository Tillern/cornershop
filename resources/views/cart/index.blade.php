<!DOCTYPE html>
<html lang="zxx" class="no-js">

    <head>
        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Favicon-->
        <link rel="shortcut icon" href="img/fav.png">
        <!-- Author Meta -->
        <meta name="author" content="CodePixar">
        <!-- Meta Description -->
        <meta name="description" content="">
        <!-- Meta Keyword -->
        <meta name="keywords" content="">
        <!-- meta character set -->
        <meta charset="UTF-8">
        <!-- Site Title -->
        <title>cart</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

        <!--
            CSS
            ============================================= -->
        <link rel="stylesheet" href="{{ asset('customerassets/css/linearicons.css') }}">
        <link rel="stylesheet" href="{{ asset('customerassets/css/owl.carousel.css') }}">
        <link rel="stylesheet" href="{{ asset('customerassets/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('customerassets/css/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('customerassets/css/nice-select.css') }}">
        <link rel="stylesheet" href="{{ asset('customerassets/css/nouislider.min.css') }}">
        <link rel="stylesheet" href="{{ asset('customerassets/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('customerassets/css/main.css') }}">
    </head>

    <body>

        <!-- Start Header Area -->
        <header class="header_area sticky-header">
            <div class="main_menu">
                <nav class="navbar navbar-expand-lg navbar-light main_box">
                    <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <a class="navbar-brand logo_h" href="index.html"><img src="img/logo.png" alt=""></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                            <ul class="nav navbar-nav menu_nav ml-auto">
                                <li class="nav-item"><a class="nav-link" href="{{ route('customer.shop') }}">Back to
                                        Shop</a></li>

                                <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                            </ul>

                        </div>
                    </div>
                </nav>
            </div>

        </header>
        <!-- End Header Area -->

        <!-- Start Banner Area -->
        <section class="banner-area organic-breadcrumb">
            <div class="container">
                <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                    <div class="col-first">
                        <h1>Shopping Cart</h1>
                        <nav class="d-flex align-items-center">
                            <a href="{{ route('customer.shop') }}">Home<span class="lnr lnr-arrow-right"></span></a>
                            <a href="category.html">Cart</a>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Banner Area -->

        <!--================Cart Area =================-->
        <section class="cart_area">
            <div class="container">
                <div class="cart_inner">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    @if (!empty($cart) && count($cart) > 0)
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Product</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total</th>
                                        <th scope="Col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart as $id => $item)
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <div class="d-flex">
                                                        <img src="img/cart.jpg" alt="">
                                                    </div>
                                                    <div class="media-body">
                                                        <p>{{ $item['name'] }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <h5>{{ number_format($item['price'], 2) }}</h5>
                                            </td>
                                            <td>
                                                <form class="product_count" action="{{ route('cart.update', $id) }}"
                                                    method="POST">

                                                    @csrf
                                                    @method('PUT')
                                                    <input type="number" name="quantity"
                                                        value="{{ $item['quantity'] }}"
                                                        class="form-control input-text qty" min="1" required>
                                                    <button type="submit"
                                                        class="btn btn-primary btn-sm mt-2">Update</button>

                                                </form>

                                            </td>
                                            <td>
                                                <h5>{{ number_format($item['price'] * $item['quantity'], 2) }}</h5>
                                            </td>
                                            <td>
                                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr class="bottom_button">
                                        <td>
                                            <a class="gray_btn" href="#">Update Cart</a>
                                        </td>
                                        <td>

                                        </td>
                                        
                                        <td colspan="2">
                                            <div class="cupon_text d-flex align-items-center">
                                                <input type="text" placeholder="Coupon Code">
                                                <a class="primary-btn" href="#">Apply</a>
                                                <a class="gray_btn" href="#">Close Coupon</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>

                                        </td>
                                        <td>

                                        </td>
                                        <td>
                                            <h5>Subtotal</h5>
                                        </td>
                                        <td>
                                            <h5>KES. {{ number_format($total, 2) }}</h5>
                                        </td>
                                    </tr>
                                    <tr class="shipping_area">
                                        <td>

                                        </td>
                                        <td>

                                        </td>
                                        <td>
                                            <h5>Shipping</h5>
                                        </td>
                                        <td>
                                            <div class="shipping_box">
                                                <ul class="list">
                                                    <li><a href="#">Flat Rate: KES.5.00</a></li>
                                                    <li><a href="#">Free Shipping</a></li>
                                                    <li class="active"><a href="#">Local Delivery: KES.
                                                            200</a>
                                                    </li>
                                                </ul>
                                                <h6>Calculate Shipping <i class="fa fa-caret-down"
                                                        aria-hidden="true"></i>
                                                </h6>
                                                <select class="shipping_select">
                                                    <option value="1">Nairobi</option>
                                                    <option value="2">Meru</option>
                                                    <option value="4">Nyamira</option>
                                                </select>
                                                <select class="shipping_select">
                                                    <option value="1">Select a State</option>
                                                    <option value="2">Select a State</option>
                                                    <option value="4">Select a State</option>
                                                </select>
                                                <input type="text" placeholder="Postcode/Zipcode">
                                                <a class="gray_btn" href="#">Update Details</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="out_button_area">
                                        <td>

                                        </td>
                                        <td>

                                        </td>
                                        <td>

                                        </td>
                                        <td>
                                            <div class="checkout_btn_inner d-flex align-items-center">
                                                <a class="gray_btn" href="{{ route('customer.shop') }}">Continue
                                                    Shopping</a>
                                                @if (!empty($cart) && count($cart) > 0)
                                                    <form action="{{ route('customer.orders.create') }}"
                                                        method="get">
                                                        <button type="submit" class="btn primary-btn">Place
                                                            Order</button>
                                                    </form>
                                                @endif

                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        @else
                            <p>Your cart is empty!</p>
                    @endif
                </div>
            </div>
            </div>
        </section>

        <!--================End Cart Area =================-->

        <!-- start footer Area -->
        <footer class="footer-area section_gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3  col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6>About Us</h6>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt
                                ut labore dolore
                                magna aliqua.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4  col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6>Newsletter</h6>
                            <p>Stay update with our latest</p>
                            <div class="" id="mc_embed_signup">

                                <form target="_blank" novalidate="true"
                                    action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                    method="get" class="form-inline">

                                    <div class="d-flex flex-row">

                                        <input class="form-control" name="EMAIL" placeholder="Enter Email"
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '"
                                            required="" type="email">

                                        <button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right"
                                                aria-hidden="true"></i></button>
                                        <div style="position: absolute; left: -5000px;">
                                            <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1"
                                                value="" type="text">
                                        </div>

                                        <!-- <div class="col-lg-4 col-md-4">
             <button class="bb-btn btn"><span class="lnr lnr-arrow-right"></span></button>
            </div>  -->
                                    </div>
                                    <div class="info"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3  col-md-6 col-sm-6">
                        <div class="single-footer-widget mail-chimp">
                            <h6 class="mb-20">Instragram Feed</h6>
                            <ul class="instafeed d-flex flex-wrap">
                                <li><img src="img/i1.jpg" alt=""></li>
                                <li><img src="img/i2.jpg" alt=""></li>
                                <li><img src="img/i3.jpg" alt=""></li>
                                <li><img src="img/i4.jpg" alt=""></li>
                                <li><img src="img/i5.jpg" alt=""></li>
                                <li><img src="img/i6.jpg" alt=""></li>
                                <li><img src="img/i7.jpg" alt=""></li>
                                <li><img src="img/i8.jpg" alt=""></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6>Follow Us</h6>
                            <p>Let us be social</p>
                            <div class="footer-social d-flex align-items-center">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-dribbble"></i></a>
                                <a href="#"><i class="fa fa-behance"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
                    <p class="footer-text m-0">

                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved
                    </p>
                </div>
            </div>
        </footer>
        <!-- End footer Area -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/vendor/jquery-2.2.4.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
            integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
        </script>
        <script src="{{ asset('customerassets/js/jquery.ajaxchimp.min.js') }}"></script>
        <script src="{{ asset('customerassets/js/jquery.nice-select.min.js') }}"></script>
        <script src="{{ asset('customerassets/js/vendor/bootstrap.min.js') }}"></script>
        <script src="{{ asset('customerassets/js/jquery.sticky.js') }}"></script>
        <script src="{{ asset('customerassets/js/nouislider.min.js') }}"></script>
        <script src="{{ asset('customerassets/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('customerassets/js/owl.carousel.min.js') }}"></script>
        <!--gmaps Js-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
        <script src="{{ asset('customerassets/js/gmaps.min.js') }}"></script>
        <script src="{{ asset('customerassets/js/main.js') }}"></script>
    </body>

</html>
