<div class="header header-light head-shadow">
    <div class="container">
        <nav id="navigation" class="navigation navigation-landscape">
            <div class="nav-header">
                <a class="nav-brand" href="#">
                    <img src="{{url('/')}}/front/assets/img/brand/PROPERTY_BEEHIVE_LOGO.png" class="logo" alt="" style="width: 350px;">
                </a>
                <div class="nav-toggle"></div>
                <div class="mobile_nav">
                    <ul>
                        <li class="list-buttons">
                            <a href="JavaScript:Void(0);" data-bs-toggle="modal" data-bs-target="#login"><i
                                    class="fas fa-sign-in-alt me-2"></i>Log In</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="nav-menus-wrapper" style="transition-property: none;">
                <ul class="nav-menu">

                    <li class="@yield('home_page')"><a href="{{route('front_home')}}">Home<span class="submenu-indicator"></span></a>

                    </li>

                    <li><a href="JavaScript:Void(0);">Searches<span class="submenu-indicator"></span></a>
                        <ul class="nav-dropdown nav-submenu">
                            <li><a href="JavaScript:Void(0);">Grid Layout<span class="submenu-indicator"></span></a>

                            </li>
                            <li><a href="JavaScript:Void(0);">List Layout<span class="submenu-indicator"></span></a>

                            </li>
                            <li><a href="JavaScript:Void(0);">Search With Map<span class="submenu-indicator"></span></a>

                            </li>
                        </ul>
                    </li>
                    <li><a href="JavaScript:Void(0);">Home Loan<span class="submenu-indicator"></span></a>
                        <ul class="nav-dropdown nav-submenu">
                            <li><a href="JavaScript:Void(0);">Grid Layout<span class="submenu-indicator"></span></a>

                            </li>
                            <li><a href="JavaScript:Void(0);">List Layout<span class="submenu-indicator"></span></a>

                            </li>
                            <li><a href="JavaScript:Void(0);">Search With Map<span class="submenu-indicator"></span></a>

                            </li>
                        </ul>
                    </li>
                    <li class="@yield('contact_us')"><a href="contact.php">Contact US<span class="submenu-indicator"></span></a>

                    </li>





                @if(Request::path() <> 'sign_up')
                </ul>
                <ul class="nav-menu nav-menu-social align-to-right">
                    @if(session()->has('user'))
{{--                            <li>--}}
{{--                                <div class="btn-group account-drop">--}}
{{--                                    <button type="button" class="btn btn-order-by-filt" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                        <i class="fa-regular fa-bell"></i><span class="noti-status"></span>--}}
{{--                                    </button>--}}
{{--                                    <div class="dropdown-menu pull-right animated flipInX">--}}
{{--                                        <div class="drp_menu_headr">--}}
{{--                                            <h4>Notifications</h4>--}}
{{--                                        </div>--}}
{{--                                        <div class="ntf-list-groups">--}}
{{--                                            <div class="ntf-list-groups-single">--}}
{{--                                                <div class="ntf-list-groups-icon text-purple"><i class="fa-solid fa-house-medical-circle-check"></i></div>--}}
{{--                                                <div class="ntf-list-groups-caption"><p class="small">Hi, Nothan your <strong>Vesh</strong> property uploaded successfully</p></div>--}}
{{--                                            </div>--}}
{{--                                            <div class="ntf-list-groups-single">--}}
{{--                                                <div class="ntf-list-groups-icon text-warning"><i class="fa-solid fa-envelope"></i></div>--}}
{{--                                                <div class="ntf-list-groups-caption"><p class="small">You have got 2 message from <strong class="text-success">Daniel</strong> 2 days ago</p></div>--}}
{{--                                            </div>--}}
{{--                                            <div class="ntf-list-groups-single">--}}
{{--                                                <div class="ntf-list-groups-icon text-success"><i class="fa-solid fa-sack-dollar"></i></div>--}}
{{--                                                <div class="ntf-list-groups-caption"><p class="small">Hi Nothan, Your fund <strong>$70,540</strong> transfer successfully in your account</p></div>--}}
{{--                                            </div>--}}
{{--                                            <div class="ntf-list-groups-single">--}}
{{--                                                <div class="ntf-list-groups-icon text-danger"><i class="fa-solid fa-comments"></i></div>--}}
{{--                                                <div class="ntf-list-groups-caption"><p class="small">2 New agent send you report messages 5 days ago</p></div>--}}
{{--                                            </div>--}}
{{--                                            <div class="ntf-list-groups-single">--}}
{{--                                                <div class="ntf-list-groups-icon text-info"><i class="fa-solid fa-circle-dollar-to-slot"></i></div>--}}
{{--                                                <div class="ntf-list-groups-caption"><p class="small">Your payment for <strong class="text-danger">Resido</strong> proerty are cancelled due to server error</p></div>--}}
{{--                                            </div>--}}
{{--                                            <div class="ntf-list-groups-single">--}}
{{--                                                <a href="#" class="ntf-more">View All Notifications</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
                            <li>
                                <div class="btn-group account-drop">
                                    <button type="button" class="btn btn-order-by-filt" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{--<img src="assets/img/user-5.png" class="img-fluid circle" alt="">--}}
                                        <i class="fa fa-user"></i>
                                    </button>
                                    <div class="dropdown-menu pull-right animated flipInX">
                                        <div class="drp_menu_headr">
                                            <h4>Hi, {{session('user')['role']}}</h4>
                                            <div class="drp_menu_headr-right"><a href="{{route('front_logout')}}" type="button" class="btn btn-whites">Logout</a></div>
                                        </div>
                                        <ul>
                                            <li><a href="dashboard.html"><i class="fa fa-tachometer-alt"></i>Dashboard<span class="notti_coun style-1">4</span></a></li>
                                            <li><a href="my-profile.html"><i class="fa fa-user-tie"></i>My Profile</a></li>
                                            <li><a href="bookmark-list.html"><i class="fa fa-bookmark"></i>Saved Property<span class="notti_coun style-2">7</span></a></li>
                                            <li><a href="my-property.html"><i class="fa fa-tasks"></i>My Properties</a></li>
                                            <li><a href="messages.html"><i class="fa fa-envelope"></i>Messages<span class="notti_coun style-3">3</span></a></li>
                                            <li><a href="choose-package.html"><i class="fa fa-gift"></i>Choose Package</a></li>
                                            <li><a href="submit-property-dashboard.html"><i class="fa fa-pen-nib"></i>Submit New Property</a></li>
                                            <li><a href="change-password.html"><i class="fa fa-unlock-alt"></i>Change Password</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                    @else
                    <li class="list-buttons border">
                        <a href="JavaScript:Void(0);" data-bs-toggle="modal" data-bs-target="#login"><i
                                class="fas fa-sign-in-alt me-2"></i>Log In</a>
                    </li>
                    @endif
                        <li class="list-buttons ms-2">
                            <a href="signup.php"><i class="fa-solid fa-upload me-2"></i>List Property</a>
                        </li>
                </ul>
                @endif
</div>
</nav>
</div>
</div>
