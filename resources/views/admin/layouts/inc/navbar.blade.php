<nav class="navbar navbar-expand-lg main-navbar sticky">
    <div class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li>
                <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg collapse-btn">
                    <i data-feather="align-justify"></i>
                </a>
            </li>
            <li>
                <a href="#" class="nav-link nav-link-lg fullscreen-btn">
                    <i data-feather="maximize"></i>
                </a>
            </li>
            <li>
                <form class="form-inline mr-auto">
                    <div class="search-element">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200" />
                        <button class="btn" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </li>
        </ul>
    </div>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown dropdown-list-toggle">
            <p class="text-white" style="margin-top: 9px;font-size: 17px">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</p>
        </li>
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                @if(auth()->user()->profile_image)
                    <img alt="image" src="{{ asset('profile_image/' . (auth()->user()->profile_image ?? 'default-images.png')) }}" class="user-img-radious-style" />
                    <span class="d-sm-none d-lg-inline-block"></span>
                @else
                    <img alt="image" src="{{asset('profile_image/default-images.png')}}" class="user-img-radious-style" />
                    <span class="d-sm-none d-lg-inline-block"></span>
                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
                <div class="dropdown-title">{{auth()->user()->first()->name}}</div>
                <a href="{{route('admin-profile')}}" class="dropdown-item has-icon"> <i class="far fa-user"></i> Profile </a>
{{--                <a href="timeline.html" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i> Activities </a>--}}
{{--                <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i> Settings </a>--}}
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a
                        type="submit"
                        onclick="event.preventDefault();
                  this.closest('form').submit();"
                        class="btn flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"
                    >
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </form>
            </div>
        </li>
    </ul>
</nav>
