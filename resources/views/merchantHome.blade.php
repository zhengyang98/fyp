<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    .site-wrap{
        width: 100% !important;
    }
    main.py-4 {
        padding: 0px !important;
    }
    .slant-1{
        border: none !important;
    }
    .site-section{
        padding-top: 100px !important;
        padding-bottom: 0px !important;
    }
    .media-image img{
        width: 400px !important;
        height: 350px !important;
    }
</style>
@extends('layouts.merchant_layout')

@section('content')

    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <div class="site-wrap">
        <div class="container">
            <div class="slide-one-item home-slider owl-carousel">
                <div class="site-blocks-cover inner-page overlay" style="background-image: url({{asset('images/hero_1.jpg')}});" data-aos="fade" data-stellar-background-ratio="0.5">
                    <div class="container">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-6 text-center" data-aos="fade">
                                <h1 class="font-secondary  font-weight-bold text-uppercase">Welcome to EasyFarm</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="site-blocks-cover inner-page overlay" style="background-image: url({{asset('images/hero_2.jpg')}});" data-aos="fade" data-stellar-background-ratio="0.5">
                    <div class="container">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-7 text-center" data-aos="fade">
                                <h1 class="font-secondary font-weight-bold text-uppercase">Where Farming Made  Easy</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slant-1"></div>

        <div class="site-section first-section">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-md-12 text-center" data-aos="fade">
                        <span class="caption d-block mb-2 font-secondary font-weight-bold">Outstanding Services</span>
                        <h2 class="site-section-heading text-uppercase text-center font-secondary">No Compromises</h2>
                    </div>
                </div>
                <div class="row border-responsive">
                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0 border-right" data-aos="fade-up" data-aos-delay="">
                        <div class="text-center">
                            <span class="flaticon-money-bag-with-dollar-symbol display-4 d-block mb-3 text-primary"></span>
                            <h3 class="text-uppercase h4 mb-3">Increase Revenue</h3>
                            <p>By inreasing the efficiency of monitoring and sales management, expect to gain a higher revenue as well!</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0 border-right" data-aos="fade-up" data-aos-delay="100">
                        <div class="text-center">
                            <span class="flaticon-bar-chart display-4 d-block mb-3 text-primary"></span>
                            <h3 class="text-uppercase h4 mb-3">Monitor Crops</h3>
                            <p>With our system, crops monitoring will surely feel just like a breeze and nothing more.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0 border-right" data-aos="fade-up" data-aos-delay="200">
                        <div class="text-center">
                            <span class="flaticon-medal display-4 d-block mb-3 text-primary"></span>
                            <h3 class="text-uppercase h4 mb-3">Brilliant UI</h3>
                            <p>The User Interface (UI) is crafted with ease of use in mind so you can use it right away.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0" data-aos="fade-up" data-aos-delay="300">
                        <div class="text-center">
                            <span class="flaticon-box display-4 d-block mb-3 text-primary"></span>
                            <h3 class="text-uppercase h4 mb-3">Complete Package</h3>
                            <p>Our system offers a complete feature set ranging from crop monitoring to sales management.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-section ">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <span class="caption d-block mb-2 font-secondary font-weight-bold">Products &amp; Services</span>
                        <h2 class="site-section-heading text-uppercase text-center font-secondary">Start Publishing Request:</h2>
                    </div>
                </div>
                <div style="width: 100%; text-align: center; padding-bottom: 100px">
                    <a style="text-align: center; font-size: 20px" href="{{route('display.request')}}" class="btn btn-primary text-white px-4">Publish Request</a>
                </div>
            </div>
        </div>
    </div>



<!--Template-Script -->
<script type="application/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.5/waypoints.min.js"></script>
<script type="application/javascript" src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script type="application/javascript" src="{{asset('js/jquery-migrate-3.0.1.min.js')}}"></script>
<script type="application/javascript" src="{{asset('js/jquery-ui.js')}}"></script>
<script type="application/javascript" src="{{asset('js/popper.min.js')}}"></script>
<script type="application/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('js/jquery.animateNumber.min.js')}}"></script>
<script src="{{asset('js/aos.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>

@endsection

