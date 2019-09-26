<!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                  

                <a class="navbar-brand" href="{{url('home')}}">
                                {{-- <!-- Logo icon --><b>
                                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                                    <!-- Dark Logo icon -->
                                    <img src="{{asset('images/logo.png')}}" style="width:100px; height:auto" alt="homepage" class="dark-logo">
                                    <!-- Light Logo icon -->
                                    <img src="{{asset('images/logo.png')}}" style="width:100px; height:auto" alt="homepage" class="light-logo">
                                </b> --}}
                                <!--End Logo icon -->
                                <!-- Logo text --><span style="color: white; font-family: arial; font-weight: 500">
                                 <!-- dark Logo text -->
                                 <img src="{{asset('images/logo-white.png')}}" style="width:50px; height:auto" class="dark-logo">
                                 <!-- Light Logo text -->    
                                 {{-- <img src="{{asset('images/logo.png')}}" style="width:100px; height:auto" class="light-logo" alt="homepage"> --}}
                                    ROOM <strong> RESERVATION</strong> <i class="fa fa-calendar"></i>
                                </span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        {{-- <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item hidden-sm-down"></li> --}}
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        @if(\Auth::check())  
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{asset('images/profile.png')}}" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                        <div class="u-img"><img src="{{asset('images/profile.png')}}" alt="user"></div>
                                            <div class="u-text">
                                                <h4>{{Auth::user()->fullname}}</h4>
                                            {{-- <p class="text-muted">{{Auth::user()->username}}</p><a href="pages-profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div> --}}
                                        </div>
                                    </li>
                                    {{-- <li role="separator" class="divider"></li>
                                    <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                                    <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                                    <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li> --}}
                                    <li role="separator" class="divider"></li>
                                    <li><a onclick="return confirm('Are you sure you want to Log-out?')" href="{{url('logout')}}"><i class="fa fa-power-off"></i> Logout</a></li>
                                    
                                </ul>
                            </div>
                        </li>
                        @else 
                        <button type="button" class="btn btn-warning"  data-toggle="modal" data-target="#loginModal"><i class="fa fa-user-o"></i> Login</button>
                        @endif
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->