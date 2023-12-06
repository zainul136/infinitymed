@extends('user.layouts.app')
@section('main-content')
    <!-- gift section -->
<section class="gift_section layout_padding-bottom mt-5">
    <div class="box ">
        <div class="container-fluid" style="background-color: rgb(243, 241, 238) ">
            <div class="row ml-2">
                <div class="col-md-6">
                    <div class="detail-box">
                        <div class="heading_container pt-5 pb-4">
                            <p style="font-size: 16px;">TRT</p>
                            <h1 style="font-size: 50px; font-weight:bolder">
                                @if($service)
                                    <p class="text-size">
                                        {!! $service->name ?? 'Not description available' !!}
                                    </p>
                                @else
                                    <p class="text-size">Not description available</p>
                                @endif

                            </h1>
                        </div>

                        @if($weightLoss)
                            <p class="text-size">
                                {!! $weightLoss->description ?? 'Not description available' !!}
                            </p>
                        @else
                            <p class="text-size">Not description available</p>
                        @endif
                        <div class="detail-box" >
                            <div class="btn-box pb-5" >
{{--                                @if(Auth::check())--}}
                                    <a href="{{ route('assessment', $service->slug) }}" class="btn2" style="background-color: rgb(255, 141, 125) !important; border: rgb(255, 141, 125); color: #0b3b3c; border-radius:2%; ">
                                        Start Assessment
                                    </a>
{{--                                @else--}}
{{--                                    <script>--}}
{{--                                        window.location.href = "{{ route('login') }}";--}}
{{--                                    </script>--}}
{{--                                @endif--}}

                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="img_container">
                        <div class="img-box">
                            <img src="{{asset('frontend/images/test.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--end gift section -->

@endsection
