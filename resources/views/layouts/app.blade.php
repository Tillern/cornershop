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
        <title>cornerShop</title>

        <!--
            CSS
            ============================================= -->
        <link rel="stylesheet" href="{{ asset('customerassets/css/linearicons.css') }}">
        <link rel="stylesheet" href="{{ asset('customerassets/css/owl.carousel.css') }}">
        <link rel="stylesheet" href="{{ asset('customerassets/css/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('customerassets/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('customerassets/css/nice-select.css') }}">
        <link rel="stylesheet" href="{{ asset('customerassets/css/nouislider.min.css') }}">
        <link rel="stylesheet" href="{{ asset('customerassets/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('customerassets/css/main.css') }}">
    </head>

    <body>
        <!-- Start Banner Area -->
        <section class="banner-area organic-breadcrumb">
            <div class="container">
                <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                    <div class="col-first">
                        <h1>Corner Shop Demo</h1>
                        <a class="navbar-brand" href="{{ url('/') }}">MyShop</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Banner Area -->

        <!-- Start Button -->
        <section class="button-area">
            <div class="container border-top-generic">
                <h3 class="text-heading">Sample Buttons</h3>

                <div class="button-group-area mt-40">
                    <a href="{{ route('customer.shop') }}" class="genric-btn default circle arrow">Shop<span
                            class="lnr lnr-arrow-right"></span></a>

                    <a href="href="{{ route('admin.dashboard') }}"" class="genric-btn info circle arrow">Admin<span
                            class="lnr lnr-arrow-right"></span></a>

                </div>

            </div>
        </section>
        <!-- End Button -->

        <!-- start footer Area -->
        <footer class="footer-area section_gap">
            <div class="container">
                <div class="row">

                    <div class="single-footer-widget">
                        <h6>About Us</h6>
                        <p>
                            Your shopping partner!
                        </p>
                    </div>

                </div>
                <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
                    <p class="footer-text m-0">
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | <i class="fa fa-heart-o" aria-hidden="true"></i>
                        by <a href="" target="_blank">Minodi</a>
                    </p>
                </div>
            </div>
        </footer>
        <!-- End footer Area -->

        <script src="{{ asset('customerassets/js/vendor/jquery-2.2.4.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
            integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
        </script>
        <script src="{{ asset('customeassets/js/vendor/bootstrap.min.js') }}"></script>
        <script src="{{ asset('customeassets/js/jquery.ajaxchimp.min.js') }}"></script>
        <script src="{{ asset('customeassets/js/jquery.nice-select.min.js') }}"></script>
        <script src="{{ asset('customeassets/js/jquery.sticky.js') }}"></script>
        <script src="{{ asset('customeassets/js/nouislider.min.js') }}"></script>
        <script src="{{ asset('customeassets/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('customeassets/js/owl.carousel.min.js') }}"></script>
        <!--gmaps Js-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
        <script src="{{ asset('customerassets/js/gmaps.min.js') }}"></script>
        <script src="{{ asset('customerassets/js/main.js') }}"></script>
    </body>

</html>
