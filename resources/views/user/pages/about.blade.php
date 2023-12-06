@extends('user.layouts.app')
@section('main-content')

    <!-- About section -->
    <section class="gift_section layout_padding-bottom">
        <div class="box ">
            <div class="container-fluid ">
                <div class="row ml-2">
                    <div class="col-md-7">
                        <div class="detail-box">
                            <div class="heading_container pt-5 pb-4">
                                <h1>About</h1>
                            </div>
                            <p class="text-size">
                                DocTap provides convenient, affordable and above all excellent private GP services from our 8 London clinics. Ideal if you are living, visiting or working in London and need to find a doctor nearby. Our GP appointments can be conducted in person, face to face or over the phone. For the safety of patients and doctors our clinics are regularly deep cleaned and all staff are equipped with PPE.
                            </p>
                        </div>

                    </div>
                    <div class="col-md-5">
                        <div class="img_container">
                            <div class="img-box">
                                <img src="{{asset('frontend/images/about.png')}}" alt="" height="400" width="300">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pb-5 text-size ml-2">
                    <div class="col-md-12 ">
                        <p>
                            Should you require a blood test or sexual health screen, we offer the fastest and best value doctor led blood tests in London. Simply book a normal consulation and your doctor will discuss your options with you and carry out any appropriate tests.
                        </p>
                        <p>
                            We only employ highly experienced UK accredited general practitioners who have a passion for helping their patients, whatever their medical needs. When booking your GP appointment you are welcome to request either a male or female doctor if you prefer. Repeat patients can also choose to see the same doctor again where available.
                        </p>
                        <p>
                            Why should a private doctor cost a fortune? Most of our patients have never used private healthcare before in their lives. DocTap have 15 minute private GP appointments from just £49. There are no additional charges for writing prescriptions, sick notes or referral letters during the appointment. After your doctor's appointment you are sent detailed consultation notes which you may share with your NHS GP if you choose.
                        </p>
                        <p>
                            As a private GP practice you do not need to be registered with an NHS GP to use our doctors surgery. New patients are most welcome. If you are a tourist or foreign visitor you can book an appointment with a doctor now. No extra paperwork or registration is required. DocTap is regulated by the Care Quality Commission.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- footer section -->

@endsection
