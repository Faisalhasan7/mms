<?php $adminInfo=Auth::user(); ?>
<div class="navbar-custom">
    <div class="container-fluid">
        <ul class="list-unstyled topnav-menu float-end mb-0">


            <li class="dropdown notification-list topbar-dropdown">
                <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img @if($adminInfo->photo) src="/{{$adminInfo->photo}} " @else src="{{asset('/backend/assets/no_image.jpg')}}" @endif  alt="user-image" class="rounded-circle">
                    <span class="pro-user-name ms-1">
                        {{$adminInfo->name}} <i class="mdi mdi-chevron-down"></i>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                    <!-- item-->
                    <a href="{{route('admin.profile',$adminInfo->id)}}" class="dropdown-item notify-item">
                        <i class="fe-user"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="{{route('admin.password', $adminInfo->id)}}" class="dropdown-item notify-item">
                        <i class="fe-settings"></i>
                        <span>Change Password</span>
                    </a>

                    <div class="dropdown-divider"></div>

                    <!-- item-->
                    <a href="{{route('admin.logout')}}" class="dropdown-item notify-item">
                        <i class="fe-log-out"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </li>


        </ul>

        <!-- LOGO -->
        <div class="logo-box">
            <a href="{{route('dashboard')}}" class="logo logo-dark text-center">
                <span class="logo-sm">
                    <img src="{{asset('/backend/MMS.png')}}" alt="" height="22">
                     <span class="logo-lg-text-light">MMS</span>
                </span>
                <span class="logo-lg">
                    <img src="{{asset('/backend/MMS.png')}}" alt="" height="20">
                    <span class="logo-lg-text-light">MMS</span>
                </span>
            </a>

            <a href="{{route('dashboard')}}" class="logo logo-light text-center">
                <span class="logo-sm">
                    <img src="{{asset('/backend/MMS.png')}}" alt="" height="24">
                </span>
                <span class="logo-lg">
                    <img src="{{asset('/backend/MMS.png')}}" alt="" height="50">
                </span>
            </a>
        </div>

        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button class="button-menu-mobile waves-effect waves-light">
                    <i class="fe-menu"></i>
                </button>
            </li>

            <li>
                <!-- Mobile menu toggle (Horizontal Layout)-->
                <a class="navbar-toggle nav-link" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </li>

        </ul>
        <div class="clearfix"></div>
    </div>
</div>
