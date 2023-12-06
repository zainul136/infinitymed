@extends('user.layouts.app')
@section('main-content')
<style>
    .scroll-section {
        background-color: #055875;; /* Set the background color as needed */
        opacity: 1; /* Initial opacity */
        transition: opacity 0.3s; /* Add a smooth transition effect */

    }
    #thumbSlider .carousel-inner img {
        height: 150px;
        margin-left: auto;
        margin-right: auto;
        display: block;
        opacity: 0.5;
    }
    #myCarousel img {
        height: 330px;
        width: 346px;
        object-fit: cover;
        margin-left: auto;
        margin-right: auto;
    }

</style>

    <!-- slider section -->



    <section class="slider_section scroll-section" >
        <div class="slider_container" style="background-image: url('frontend/images/home.avif'); background-size: cover; background-position: center; height:50vh;">
            <div class="container-fluid" style="background-color: #05587582; height:50vh;">
                <div class="row">
                    <div class="col-md-8 offset-2">
                        <div class="detail-box text-center" style=" margin-top: 18%">
                            <h1 class="mt-5 text-size "style="color:#39b6bb">
                            <span style="color: white; font-weight: bolder">Welcome To</span>
                            ‘Infinity  <span style="color: #ef3737">Med’</span>
                            </h1>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- end slider section -->
</div>
<!-- end hero area -->


<!-- Healthcare at your fingertips -->

<section class="why_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Healthcare at your fingertips
            </h2>
        </div>
        <div class="row pt-3">
            <div class="col-10 offset-1 ">
                <p class="text-center text-size">
                    <span class="text-center"> Making your journey to a healthier lifestyle easier.</span>

                    Here at Infinity
                    Med, we
                    believe in simplicity,
                    accessibility, and a personalized touch like no other.
                </p>

                <p class="text-center">From consulting a doctor to receiving
                    personalised
                    treatment,<br>
                    we want to help YOU reach your goal whatever it may be. </p>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Healthcare at your fingertips -->


<!-- Choose what to solve -->

<section class="why_section layout_paddings">
    <div class="container">
       
        <div class="row">
            @foreach ($services as $service)
                <div class="col-md-4 mx-auto">
                    <div class="box " style="background: #055875;box-shadow: 4px 8px 10px gray;">
                        <a href="{{route('card-details',$service->slug)}}">
                            <div class="img-box">
                                <img src="/admin/services/{{$service->image}}"  aria-hidden="true" style="height:60px; color:white;" />
                            </div>
                            <div class="detail-box text-white">
                                <h5>
                                    {{$service->name}}
                                </h5>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

<!-- Confidential section -->

<section class="saving_section " >
    <div class="box">
        <div class="container-fluid" style="padding-bottom:20px;">
            <div class="row">
                <div class="col-lg-5 offset-1">
                    <div class="detail-box ">
                        <ul class="tick-mark-list">
                            <li><i class="fas fa-check"></i> GP led clinical services </li>
                            <li><i class="fas fa-check"></i> Safe & discreet </li>
                            <li><i class="fas fa-check"></i> Easily accessible</li>
                        </ul>
                        <div class="text-center btn-box">
                            <a href="{{route('contact-us')}}" class="btn2">
                                Contact Us
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="img-box">
                        <img src="{{asset('frontend/images/skin.png')}}" alt="" height="400" width="300">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- end Confidential section -->


<!-- Services section -->

<section class="shop_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Services
            </h2>
        </div>

        <!-- Main-Slideelement -->
        <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="false">
            <div class="carousel-inner my-slider">
                <div class="carousel-item active">
                    <h4 class="green-color text-center f-cursive"> Remote Consultant</h4>
                    <img class="d-block" src="{{asset('assets/img/remote_cons.png')}}">
                </div>
                <div class="carousel-item">
                    <h4 class="green-color text-center f-cursive"> Private Prescriptions</h4>
                    <img class="d-block" src="{{asset('assets/img/private_prescription.png')}}">
                </div>
                <div class="carousel-item">
                    <h4 class="green-color text-center f-cursive"> Medical Advice</h4>
                    <img class="d-block" src="{{asset('assets/img/med_advice.png')}}">
                </div>
                <div class="carousel-item">
                    <h4 class="green-color text-center f-cursive"> Skin Care</h4>
                    <img class="d-block" src="{{asset('assets/img/skin_care.png')}}">
                </div>
                <div class="carousel-item">
                    <h4 class="green-color text-center f-cursive"> Service</h4>
                    <img class="d-block" src="{{asset('assets/img/service.png')}}">
                </div>
            </div>
        </div>

        <!-- Main-Slider-Element ends -->
        <!-- Thumb-Slider-Element starts -->
        <div id="thumbSlider" class="carousel slide" data-interval="false">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        <div data-target="#myCarousel" data-slide-to="0" class="thumb col-sm-4 active">
                            <img src="{{asset('assets/img/remote_cons.png')}}">
                        </div>
                        <div data-target="#myCarousel" data-slide-to="1" class="thumb col-sm-4">
                            <img src="{{asset('assets/img/private_prescription.png')}}">
                        </div>
                        <div data-target="#myCarousel" data-slide-to="2" class="thumb col-sm-4">
                            <img src="{{asset('assets/img/med_advice.png')}}">
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div data-target="#myCarousel" data-slide-to="3" class="thumb col-sm-4">
                            <img src="{{asset('assets/img/skin_care.png')}}">
                        </div>
                        <div data-target="#myCarousel" data-slide-to="4" class="thumb col-sm-4">
                            <img src="{{asset('assets/img/service.png')}}">
                        </div>

                    </div>
                </div>
                <a class="carousel-control-prev" href="#thumbSlider" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#thumbSlider" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>
        <!-- Thumb-Slider-Element ends -->

    </div>

</section>

<!-- end Services section -->




<!-- What we do section -->
<section class="client_section saving_section layout_padding" style="color:white;">
    <div class="container" style="background-color: #055875; padding-top:70px; padding-bottom:140px;">
        <div class="heading_container heading_center">
            <h2>
                What we do
            </h2>
            <div class="row">
                <div class="col-md-9 offset-1">
                    <p class="text-size">
                        Our aim is to make healthcare more accessible. We treat a variety of conditions. Please use the link below to send us a request.
                    </p>
                </div>

            </div>
        </div>
        <div class="detail-box text-center ml-5">
            <div class="btn-box text-center">
                <a href="#" class="btn2">
                    Skin problems
                </a>
                <a href="#" class="btn2">
                    Infections
                </a>
                <a href="#" class="btn2">
                    Ears nose throat
                </a>
                <a href="#" class="btn2">
                    Vaccination
                </a>
                <a href="#" class="btn2">
                    Weight Loss
                </a>
            </div>
        </div>


    </div>

    </div>
</section>
<!-- end What we do section -->


<script>
    window.addEventListener("scroll", function () {
        const scrollY = window.scrollY;
        const section = document.querySelector(".scroll-section");
        const sectionHeight = section.offsetHeight;
        const windowHeight = window.innerHeight;
        const maxOpacity = 1;
        const minOpacity = 0;

        // Calculate the opacity based on scroll position
        let opacity = 1 - (scrollY - (section.offsetTop - windowHeight + sectionHeight)) / (windowHeight + sectionHeight);

        // Ensure opacity stays within bounds
        opacity = Math.max(minOpacity, Math.min(maxOpacity, opacity));

        // Set the opacity of the section
        section.style.opacity = opacity.toFixed(2); // Limit decimal places for smoother transition
    });


</script>
@endsection
