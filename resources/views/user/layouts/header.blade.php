<!-- header section strats -->
<header class="header_section sticky-header-container">
    <nav class="navbar navbar-expand-lg fixed-top  custom_nav-container  ">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <a href="{{url('/')}}" style="margin-right: 100px;margin-top: 5px; color: white !important;">
                    <img src="" alt="" >Logo
                </a>
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('about')}}">About</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownWeightLoss" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Weight Loss
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownWeightLoss">
                        <a class="dropdown-item" href="#">Tablet</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item dropdown-toggle dropdown-menu-right" href="#"
                           id="dnavbarDropdownInjection" role="button" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            Injection
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownInjection">
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Daily</a>
                            <a class="dropdown-item" href="#">Weekly</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropddownInjection" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Vaccines
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownInjection">
                        <a class="dropdown-item" href="#">Travel</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">COVID19</a>
                        <a class="dropdown-item" href="#">Home visits</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownInjection" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Skincare
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownInjection">
                        <a class="dropdown-item" href="#">Consultations</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Advice / Video consultations</a>
                        <a class="dropdown-item" href="#">Aesthetic treatment</a>
                        <a class="dropdown-item" href="#">Observ 360 consultations</a>
                        <a class="dropdown-item" href="#">Obagi Skincare</a>
                        <a class="dropdown-item" href="#">Skin Lesion Removal</a>
                        <a class="dropdown-item" href="#">Dermoscopy</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarSupportedContentDropdownInjection"
                       role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Private
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownInjection">
                        <a class="dropdown-item" href="#">Consultations</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Prescriptions</a>
                        <a class="dropdown-item" href="#">Sick Notes</a>
                        <a class="dropdown-item" href="#">Letters</a>
                        <a class="dropdown-item" href="#">Ear Micro-suction</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="cnavbarDropdownInjection" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Shop
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownInjection">
                        <a class="dropdown-item" href="#">Coming soon</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Gummies</a>
                        <a class="dropdown-item" href="#">Creams</a>
                    </div>
                </li>
            </ul>
            <div class="user_option" style="margin-left: 100px;margin-top: 5px;">
                <!--                <a href="">-->
                <!--                <span>-->
                <!--                    Account-->
                <!--                </span>-->
                <!--                </a>-->
                @if(Auth::check())
                    <!-- If the user is logged in, display the user dropdown menu -->
                    <div class="dropdown">
                        <a href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <i class="fa fa-user text-white" aria-hidden="true" style="color: white !important;">  </i>
                            {{auth()->user()->name}}  </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <a class="dropdown-item"  href="{{ route('edit-profile') }}" style="color: #0b3b3c;">Edit Profile</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color: #0b3b3c;">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                @else
                    <!-- If the user is not logged in, display the login link -->
                    <a href="{{ route('login') }}">
                        <i class="fa fa-user text-white" aria-hidden="true" style="color: white !important;"></i>
                    </a>
                @endif

                <a href="">
                    <i class="fa fa-shopping-cart text-white" aria-hidden="true" style="color: white!important;"></i>
                </a>
            </div>
        </div>
    </nav>

</header>
<!-- end header section -->
