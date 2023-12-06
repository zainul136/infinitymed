<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{route('dashboard')}}">
                <img alt="" src="{{asset('frontend/images/logo.png')}}" class="header-logo"/>
            </a>
        </div>
        <ul class="sidebar-menu">
           <li class="menu-header">Main</li>
            <li  class="dropdown {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <a href="{{route('dashboard')}}" class="nav-link">
                    <i data-feather="monitor"></i>
                    <span> Dashboard</span>
                </a>
            </li>
            <li class="dropdown {{ request()->routeIs('all-user') ? 'active' : '' }}">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                        data-feather="user"></i><span>User</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{route('all-user')}}">All User</a></li>
                </ul>
            </li>

            <li class="dropdown {{ request()->routeIs('services.create') ? 'active' : '' }} {{ request()->routeIs('services.index') ? 'active' : '' }}">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                        data-feather="user"></i><span>Services</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{route('services.create')}}">Create</a></li>
                    <li><a class="nav-link" href="{{route('services.index')}}">List</a></li>
                </ul>
            </li>
            <li class="dropdown {{ request()->routeIs('weight-loss.create') ? 'active' : '' }} {{ request()->routeIs('weight-loss.index') ? 'active' : '' }}">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                        data-feather="briefcase"></i><span>Weight Loss</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{route('weight-loss.create')}}">Create</a></li>
                    <li><a class="nav-link" href="{{route('weight-loss.index')}}">List</a></li>
                </ul>
            </li>
            <li class="dropdown {{ request()->routeIs('question.create') ? 'active' : '' }} {{ request()->routeIs('question.index') ? 'active' : '' }}">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                        data-feather="package"></i><span>Question</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{route('question.create')}}">Question Create</a></li>
                    <li><a class="nav-link" href="{{route('question.index')}}">Question List</a></li>
                </ul>
            </li>

            <li class="dropdown {{ request()->routeIs('product.create') ? 'active' : '' }} {{ request()->routeIs('product.index') ? 'active' : '' }}">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                        data-feather="archive"></i><span>Products</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{route('product.create')}}">Products Create</a></li>
                    <li><a class="nav-link" href="{{route('product.index')}}">Products List</a></li>
                </ul>
            </li>

        </ul>
    </aside>
</div>
