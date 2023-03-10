




<div class="main-wrapper">

    <div class="header">

        <div class="header-left active">
            <a href="index.html" class="logo logo-normal">
                <img src="{{asset('assets/img/logo.png')}}" alt="">
            </a>
            <a href="index.html" class="logo logo-white">
                <img src="{{asset('assets/img/logo-white.png')}}" alt="">
            </a>
            <a href="index.html" class="logo-small">
                <img src="{{asset('assets/img/logo-small.png')}}" alt="">
            </a>
            <a id="toggle_btn" href="javascript:void(0);">
            </a>
        </div>

        <a id="mobile_btn" class="mobile_btn" href="#sidebar">
            <span class="bar-icon">
                <span></span>
                <span></span>
                <span></span>
            </span>
        </a>

        <ul class="nav user-menu">

            <li class="nav-item">
                <div class="top-nav-search">
                    <a href="javascript:void(0);" class="responsive-search">
                        <i class="fa fa-search"></i>
                    </a>
                    <form action="#">
                        <div class="searchinputs">
                            <input type="text" placeholder="Search Here ...">
                            <div class="search-addon">
                                <span><img src="{{asset('assets/img/icons/closes.svg')}}" alt="img"></span>
                            </div>
                        </div>
                        <a class="btn" id="searchdiv"><img src="{{asset('assets/img/icons/search.svg')}}" alt="img"></a>
                    </form>
                </div>
            </li>


            <li class="nav-item dropdown has-arrow main-drop">
                <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
                    <span class="user-img"><img src="{{asset('assets/img/profiles/avator1.jpg')}}" alt="">
                        <span class="status online"></span></span>
                </a>
                <div class="dropdown-menu menu-drop-user">
                    <div class="profilename">
                        <div class="profileset">
                            <span class="user-img"><img src="{{asset('assets/img/profiles/avator1.jpg')}}" alt="">
                                <span class="status online"></span></span>
                            <div class="profilesets">
                                <h6>John Doe</h6>
                                <h5>Admin</h5>
                            </div>
                        </div>
                        <hr class="m-0">
                        <a class="dropdown-item" href="profile.html"> <i class="me-2" data-feather="user"></i> My
                            Profile</a>
                        <a class="dropdown-item" href="generalsettings.html"><i class="me-2" data-feather="settings"></i>Settings</a>
                        <hr class="m-0">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-danger">
                                logout
                            </button>

                        </form>
                    </div>
                </div>
            </li>
        </ul>


        <div class="dropdown mobile-user-menu">
            <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="profile.html">My Profile</a>
                <a class="dropdown-item" href="generalsettings.html">Settings</a>
                <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
            </div>
        </div>

    </div>


    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                @if(Auth::guard('web')->user()->is_admin == 1)
                <ul>
                    <li class="active">
                        <a href="{{route('dashboard')}}"><img src="{{asset('assets/img/icons/dashboard.svg')}}" alt="img"><span>
                                Dashboard</span> </a>
                    </li>
                    @can('viewAny', \App\Models\Appointment::class )
                    <li class="submenu">
                        <a href="javascript:void(0);"><img src="{{asset('assets/img/icons/product.svg')}}" alt="img"><span>
                                Chember</span> <span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="{{route('admin.chemberPage')}}">Add Chember</a></li>
                            <li><a href="{{route('admin.chemberList')}}">Chember List</a></li>
                         
                        </ul>
                    </li>
                    @endcan
                    @can('viewAny', \App\Models\Appointment::class )
                    <li class="submenu">
                        <a href="javascript:void(0);"><img src="{{asset('assets/img/icons/sales1.svg')}}" alt="img"><span>
                                Schedule</span> <span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="{{route('admin.schedulePage')}}">Weekly Schedule </a></li>
                            <li><a href="{{route('admin.scheduleList')}}">Schedule List</a></li>
                            <li><a href="{{route('admin.specialPage')}}">Special Schedule</a></li>
                            <li><a href="{{route('admin.specialScheduleList')}}">Special Schedule List</a></li>

                        </ul>
                    </li>
                    @endcan

                    @can('viewAny', \App\Models\Appointment::class )
                    <li class="submenu">
                        <a href="javascript:void(0);"><img src="{{asset('assets/img/icons/product.svg')}}" alt="img"><span>
                                Appointment</span> <span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="{{route('admin.appointmentPage')}}">Create Appointment</a></li>
                            <li><a href="{{route('admin.appointmentList')}}">Appointment List</a></li>
                            <li><a href="{{route('admin.cancelledAppointment')}}">Cancelled Appointments</a></li>
                        </ul>
                    </li>
                    @endcan
                    @can('viewAny', \App\Models\Appointment::class )
                    <li class="submenu">
                        <a href="javascript:void(0);"><img src="{{asset('assets/img/icons/purchase1.svg')}}" alt="img"><span>
                                Patient History</span> <span class="menu-arrow"></span></a>

                        
                        <ul>
                            <li><a href="{{ route('admin.viewAddReport') }}">Patient Report</a></li>
                        </ul>
                        
                        <ul>
                            <li><a href="{{ route('admin.addReportView', Auth::guard('web')->user()->id) }}">Patient Report</a></li>
                        </ul>
                    </li>
                    @endcan
                    @can('viewAny', \App\Models\Appointment::class )

                    <li class="submenu">
                        <a href="javascript:void(0);"><img src="{{asset('assets/img/icons/time.svg')}}" alt="img"><span>
                                Accounts</span> <span class="menu-arrow"></span></a>
                        <ul>


                            <li><a href=""></a></li>

                            <li><a href="">Purchase Report</a></li>


                        </ul>
                    </li>
                    @endcan
                    @can('viewAny', \App\Models\User::class )
                    <li class="submenu">
                        <a href="javascript:void(0);"><img src="{{asset('assets/img/icons/product.svg')}}" alt="img"><span>
                                Employee</span> <span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="{{route('admin.employeePage')}}">Add Employee</a></li>
                            <li><a href="{{route('admin.rolePage')}}">Add Role</a></li>
                        </ul>
                    </li>
                    @endcan
                    @elseif(Auth::guard('web')->user()->is_admin == 0)
                    <li><a href="{{route('admin.employeePage')}}">Profile</a></li>
                    <li><a href="{{route('admin.employeePage')}}">Appointments</a></li>
                    <li><a href="{{route('admin.employeePage')}}">Reports</a></li>
                    
                    @endif
                </ul>
              
            </div>
        </div>
    </div>


</div>

