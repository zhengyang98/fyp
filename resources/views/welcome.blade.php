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
@extends('layouts.app')

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
                        <h2 class="site-section-heading text-uppercase text-center font-secondary">Get Started Now</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 block-13 nav-direction-white">
                        <div class="nonloop-block-13 owl-carousel">
                            <div class="media-image">
                                <img src="{{asset('images/img_1.jpg')}}" alt="Image" class="img-fluid">
                                <div class="media-image-body">
                                    <h2 class="font-secondary text-uppercase">Monitor Crop</h2>
                                    <p>Begin monitoring your crop today and never misses a day anymore.</p>
                                    <p><a href="{{route('crops.monitor')}}" class="btn btn-primary text-white px-4">Begin</a></p>
                                </div>
                            </div>
                            <div class="media-image">
                                <img src="{{asset('images/img_2.jpg')}}" alt="Image" class="img-fluid">
                                <div class="media-image-body">
                                    <h2 class="font-secondary text-uppercase">View Request</h2>
                                    <p>CLick here to view all the requests, then decide, at one glance.</p>
                                    <p><a href="{{route('review.request')}}" class="btn btn-primary text-white px-4">Begin</a></p>
                                </div>
                            </div>
                            <div class="media-image">
                                <img src="{{asset('images/img_3.jpg')}}" alt="Image" class="img-fluid">
                                <div class="media-image-body">
                                    <h2 class="font-secondary text-uppercase">Monitoring Record</h2>
                                    <p>Knowing your past record has never been easier with this handy feature.</p>
                                    <p><a href="{{route('crops.record')}}" class="btn btn-primary text-white px-4">Begin</a></p>
                                </div>
                            </div>
                            <div class="media-image">
                                <img src="{{asset('images/img_4.jpg')}}" alt="Image" class="img-fluid">
                                <div class="media-image-body">
                                    <h2 class="font-secondary text-uppercase">Accepted Requests</h2>
                                    <p>Worry about unmanageable requests? Don't worry, we got your back.</p>
                                    <p><a href="{{route('accepted.request')}}" class="btn btn-primary text-white px-4">Begin</a></p>
                                </div>
                            </div>
                            <div class="media-image">
                                <img src="{{asset('images/img_5.jpg')}}" alt="Image" class="img-fluid">
                                <div class="media-image-body">
                                    <h2 class="font-secondary text-uppercase">Weather Monitoring</h2>
                                    <p>View weather forecast, never go a day unprepared for the weather.</p>
                                    <p><a href="{{url('/weather-info')}}" class="btn btn-primary text-white px-4">Begin</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
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

<script type="application/javascript">
    $("document").ready(function() {
        function showLocation(position){
            var x = position.coords.latitude;
            var y = position.coords.longitude;
            alert("latitude: " + x + " longitude :" + y);
    }
        function getCoordinate(position){

            let x = position.coords.latitude;
            let y = position.coords.longitude;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method:'post',
                url:"{{route('get.coordinate')}}",
                data:{lat: x, long: y},
                success: function(result){
                    console.log("latitude: " + x + " longitude :" + y);
            }
            });
        }
      let x =  navigator.geolocation.getCurrentPosition(getCoordinate);
});
 </script>


@endsection

