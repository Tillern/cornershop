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
        <title>placeorder</title>

        <!--
            CSS
            ============================================= -->
        <link rel="stylesheet" href="{{ asset('customerassets/css/linearicons.css')}}">
        <link rel="stylesheet" href="{{ asset('customerassets/css/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{ asset('customerassets/css/themify-icons.css')}}">
        <link rel="stylesheet" href="{{ asset('customerassets/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{ asset('customerassets/css/nice-select.css')}}">
        <link rel="stylesheet" href="{{ asset('customerassets/css/nouislider.min.css')}}">
        <link rel="stylesheet" href="{{ asset('customerassets/css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{ asset('customerassets/css/main.css')}}">
    </head>

    <body>

        <!-- Start Banner Area -->
        <section class="banner-area organic-breadcrumb">
            <div class="container">
                <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                    <div class="col-first">
                        <h1>Place Order</h1>
                        <nav class="d-flex align-items-center">
                            <a href="{{ route('customer.shop') }}">Back to shop<span
                                    class="lnr lnr-arrow-right"></span></a>

                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Banner Area -->

        <div class="container">
            <h1>Create Order</h1>

            <form action="{{ route('customer.orders.store') }}" method="POST">
                @csrf

                <h3>Your Cart</h3>
                <ul>
                    @foreach ($cartItems as $item)
                        <li>
                            {{ $item['name'] }} - {{ $item['quantity'] }} x {{ $item['price'] }}
                        </li>
                    @endforeach
                </ul>

                <h3>Fill in Your Details</h3>

                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea class="form-control" id="address" name="address" required></textarea>
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" class="form-control" id="phone" name="phone" required>
                </div>

                <button type="submit" class="btn btn-primary">Place Order</button>
            </form>
        </div>

        <!-- start footer Area -->
        <footer class="footer-area section_gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3  col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6>About Us</h6>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore dolore
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
                                <li><img src="{{ asset('customerassets/img/i1.jpg')}}" alt=""></li>
                                <li><img src="{{ asset('customerassets/img/i2.jpg')}}" alt=""></li>
                                <li><img src="{{ asset('customerassets/img/i3.jpg')}}" alt=""></li>
                                <li><img src="{{ asset('customerassets/img/i4.jpg')}}" alt=""></li>
                                <li><img src="{{ asset('customerassets/img/i5.jpg')}}" alt=""></li>
                                <li><img src="{{ asset('customerassets/img/i6.jpg')}}" alt=""></li>
                                <li><img src="{{ asset('customerassets/img/i7.jpg')}}" alt=""></li>
                                <li><img src="{{ asset('customerassets/img/i8.jpg')}}" alt=""></li>
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
                    <p class="footer-text m-0">Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved
                    </p>
                </div>
            </div>
        </footer>
        <!-- End footer Area -->


       
        <script src="{{ asset('customerassets/js/vendor/jquery-2.2.4.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
            integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
        </script>
        <script src="{{ asset('customerassets/js/vendor/bootstrap.min.js')}}"></script>
        <script src="{{ asset('customerassets/js/jquery.ajaxchimp.min.js')}}"></script>
        <script src="{{ asset('customerassets/js/jquery.nice-select.min.js')}}"></script>
        <script src="{{ asset('customerassets/js/jquery.sticky.js')}}"></script>
        <script src="{{ asset('customerassets/js/nouislider.min.js')}}"></script>
        <script src="{{ asset('customerassets/js/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{ asset('customerassets/js/owl.carousel.min.js')}}"></script>
        <!--gmaps Js-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
        <script src="{{ asset('customerassets/js/gmaps.min.js')}}"></script>
        <script src="{{ asset('customerassets/js/main.js')}}"></script>
    </body>

</html>
