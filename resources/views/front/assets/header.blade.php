<div class="header header-light head-shadow">
    <div class="container">
        <nav id="navigation" class="navigation navigation-landscape">
            <div class="nav-header">
                <a class="nav-brand" href="#">
                    <img src="{{ url('/') }}/front/assets/img/brand/PROPERTY_BEEHIVE_LOGO.png" class="logo"
                        alt="" style="width: 350px;">
                </a>
                <div class="nav-toggle"></div>
                <div class="mobile_nav">
                    <ul>
                        <li class="list-buttons">
                            <a href="JavaScript:Void(0);" data-bs-toggle="modal" data-bs-target="#login"><i
                                    class="fas fa-user me-2"></i>Log In</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="nav-menus-wrapper" style="transition-property: none;">
                <ul class="nav-menu">

                    <li class="@yield('home_page')"><a href="{{ route('front_home') }}">Home<span
                                class="submenu-indicator"></span></a>

                    </li>

                    <li class="@yield('buy')"><a href="JavaScript:Void(0);">Buy<span
                                class="submenu-indicator"></span></a>
                        <ul class="nav-dropdown nav-submenu">
                            <li><a href="{{ route('readyToMove') }}">Ready to Move<span
                                        class="submenu-indicator"></span></a>

                            </li>
                            <li><a href="{{ route('ownerProperties') }}">Owner Properties<span
                                        class="submenu-indicator"></span></a>

                            </li>
                            <li><a href="{{ route('newLaunch') }}">Newly Launched<span
                                        class="submenu-indicator"></span></a>

                            </li>
                        </ul>
                    </li>
                    <li class="@yield('rent')"><a href="JavaScript:Void(0);">Rent<span
                                class="submenu-indicator"></span></a>
                        <ul class="nav-dropdown nav-submenu">
                            <li><a href="{{ route('rentOwnerProperties') }}">Owner Properties<span
                                        class="submenu-indicator"></span></a>

                            </li>
                            <li><a href="{{ route('verifiedProperties') }}">Verified Properties<span
                                        class="submenu-indicator"></span></a>

                            </li>
                            <li><a href="{{ route('furnishedHomes') }}">Furnished Homes<span
                                        class="submenu-indicator"></span></a>

                            </li>
                        </ul>
                    </li>
                    <li class="@yield('sell')"><a href="JavaScript:Void(0);">Sell<span
                                class="submenu-indicator"></span></a>
                        <ul class="nav-dropdown nav-submenu">
                            <li><a href="{{ route('sellpostProperty') }}">Post Property<span
                                        class="submenu-indicator"></span></a>

                            </li>
                            <li><a href="{{ route('myDashboard') }}">My Dashboard<span
                                        class="submenu-indicator"></span></a>

                            </li>
                            <li><a href="{{ route('adPackages') }}">Ad Packages<span
                                        class="submenu-indicator"></span></a>

                            </li>
                        </ul>
                    </li>
                    <li class="@yield('propertyServices')"><a href="JavaScript:Void(0);">Property Services<span
                                class="submenu-indicator"></span></a>
                        <ul class="nav-dropdown nav-submenu">
                            <li><a href="JavaScript:Void(0);">Home Services<span class="submenu-indicator"></span></a>
                                <ul class="nav-dropdown nav-submenu">
                                    <li><a href="grid-style-1.html">Home Loans</a></li>
                                    <li><a href="grid-style-2.html">Pest Control</a></li>
                                    <li><a href="grid-style-3.html">Sanitization</a></li>
                                    <li><a href="grid-full-style-1.html">Design & Decor</a></li>
                                    <li><a href="grid-full-style-2.html">Packers & Movers</a></li>
                                    <li><a href="grid-full-style-2.html">Business Loans</a></li>
                                    <li><a href="grid-full-style-2.html">Loan Transfer</a></li>
                                </ul>
                            </li>
                            <li><a href="JavaScript:Void(0);">Sale Services<span class="submenu-indicator"></span></a>
                                <ul class="nav-dropdown nav-submenu">
                                    <li><a href="list-style-1.html">Legal Services</a></li>
                                    <li><a href="list-style-2.html">Vastu</a></li>
                                    <li><a href="list-full-style-1.html">Property
                                            Inspection</a></li>

                                </ul>
                            </li>
                            <li><a href="JavaScript:Void(0);">Rent Services<span class="submenu-indicator"></span></a>
                                <ul class="nav-dropdown nav-submenu">
                                    <li><a href="half-map.html">Pay Rent via
                                            Credit card</a></li>
                                    <li><a href="half-map-2.html">Rent Agreement</a></li>
                                    <li><a href="half-map-3.html">Tenant
                                            Verification</a></li>
                                    <li><a href="half-map-list.html">Rent Collection</a></li>

                                </ul>
                            </li>
                        </ul>
                        {{-- <ul class="nav-dropdown nav-submenu">
                            <li><a href="{{ route('rentAgreement') }}">Rent Agreement<span
                                        class="submenu-indicator"></span></a>

                            </li>
                            <li><a href="{{ route('tenantVerification') }}">Tenant Verification<span
                                        class="submenu-indicator"></span></a>

                            </li>
                            <li><a href="{{ route('propertyLawyers') }}">Property Lawyers<span
                                        class="submenu-indicator"></span></a>

                            </li>
                            <li><a href="{{ route('loan') }}">Loan<span class="submenu-indicator"></span></a>

                            </li>
                        </ul> --}}
                    </li>

                    {{-- <li class="@yield('contact_us')"><a href="contact.php">Contact US<span
                                class="submenu-indicator"></span></a>

                    </li> --}}





                    @if (Request::path() != 'sign_up')
                </ul>
                <ul class="nav-menu nav-menu-social align-to-right">
                    @if (session()->has('user'))
                        {{--                            <li> --}}
                        {{--                                <div class="btn-group account-drop"> --}}
                        {{--                                    <button type="button" class="btn btn-order-by-filt" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> --}}
                        {{--                                        <i class="fa-regular fa-bell"></i><span class="noti-status"></span> --}}
                        {{--                                    </button> --}}
                        {{--                                    <div class="dropdown-menu pull-right animated flipInX"> --}}
                        {{--                                        <div class="drp_menu_headr"> --}}
                        {{--                                            <h4>Notifications</h4> --}}
                        {{--                                        </div> --}}
                        {{--                                        <div class="ntf-list-groups"> --}}
                        {{--                                            <div class="ntf-list-groups-single"> --}}
                        {{--                                                <div class="ntf-list-groups-icon text-purple"><i class="fa-solid fa-house-medical-circle-check"></i></div> --}}
                        {{--                                                <div class="ntf-list-groups-caption"><p class="small">Hi, Nothan your <strong>Vesh</strong> property uploaded successfully</p></div> --}}
                        {{--                                            </div> --}}
                        {{--                                            <div class="ntf-list-groups-single"> --}}
                        {{--                                                <div class="ntf-list-groups-icon text-warning"><i class="fa-solid fa-envelope"></i></div> --}}
                        {{--                                                <div class="ntf-list-groups-caption"><p class="small">You have got 2 message from <strong class="text-success">Daniel</strong> 2 days ago</p></div> --}}
                        {{--                                            </div> --}}
                        {{--                                            <div class="ntf-list-groups-single"> --}}
                        {{--                                                <div class="ntf-list-groups-icon text-success"><i class="fa-solid fa-sack-dollar"></i></div> --}}
                        {{--                                                <div class="ntf-list-groups-caption"><p class="small">Hi Nothan, Your fund <strong>$70,540</strong> transfer successfully in your account</p></div> --}}
                        {{--                                            </div> --}}
                        {{--                                            <div class="ntf-list-groups-single"> --}}
                        {{--                                                <div class="ntf-list-groups-icon text-danger"><i class="fa-solid fa-comments"></i></div> --}}
                        {{--                                                <div class="ntf-list-groups-caption"><p class="small">2 New agent send you report messages 5 days ago</p></div> --}}
                        {{--                                            </div> --}}
                        {{--                                            <div class="ntf-list-groups-single"> --}}
                        {{--                                                <div class="ntf-list-groups-icon text-info"><i class="fa-solid fa-circle-dollar-to-slot"></i></div> --}}
                        {{--                                                <div class="ntf-list-groups-caption"><p class="small">Your payment for <strong class="text-danger">Resido</strong> proerty are cancelled due to server error</p></div> --}}
                        {{--                                            </div> --}}
                        {{--                                            <div class="ntf-list-groups-single"> --}}
                        {{--                                                <a href="#" class="ntf-more">View All Notifications</a> --}}
                        {{--                                            </div> --}}
                        {{--                                        </div> --}}
                        {{--                                    </div> --}}
                        {{--                                </div> --}}
                        {{--                            </li> --}}
                        <li>
                            <div class="btn-group account-drop">
                                <button type="button" class="btn btn-order-by-filt" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    {{-- <img src="assets/img/user-5.png" class="img-fluid circle" alt=""> --}}
                                    <i class="fa fa-user"></i>
                                </button>
                                <div class="dropdown-menu pull-right animated flipInX">
                                    <div class="drp_menu_headr">
                                        @if (session('user')['name'] == null)
                                            <h4>Hi,{{ session('user')['role'] }}</h4>
                                        @else
                                            <h4>Hi,{{ session('user')['name'] }}</h4>
                                        @endif
                                        <div class="drp_menu_headr-right"><a href="{{ route('front_logout') }}"
                                                type="button" class="btn btn-whites"><i
                                                    class="fa fa-sign-out"></i>&nbsp;Logout</a></div>
                                    </div>
                                    <ul>
                                        <li class="@yield('dashboard')"><a href="{{ route('front_dashboard') }}"><i
                                                    class="fa fa-tachometer-alt"></i>Dashboard</a></li>
                                        <li class="@yield('profile')"><a
                                                href="{{ route('userProfile', session('user')['id']) }}"><i
                                                    class="fa fa-user-tie"></i>My Profile</a></li>
                                        <li class="@yield('my_properties')"><a href="{{ route('myProperties') }}"><i
                                                    class="fa fa-tasks"></i>My Properties</a></li>
                                        <li class="@yield('inqury_list')"><a href="{{ route('showInquiryList') }}"><i
                                                    class="fa fa-list"></i>Inquiry List</a></li>
                                        {{-- <li><a href="{{ route('postProperty') }}"><i class="fa fa-pen-nib"></i>Post New
                                                Property</a></li> --}}
                                        {{--                <li><a href="choose-package.html"><i class="fa fa-gift"></i>Choose Package<span class="expiration">10 days left</span></a></li> --}}
                                        <li class="@yield('changePassword')"><a href="{{ route('changePassword') }}"><i
                                                    class="fa fa-unlock-alt"></i>Change Password</a></li>
                                        <li><a href="{{ route('front_logout') }}"><i
                                                    class="fa fa-sign-out"></i>Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="list-buttons ms-2">
                            <a href="{{ route('postProperty') }}"><i class="fa-solid fa-upload me-2"></i>List
                                Property</a>
                        </li>
                    @else
                        <li class="list-buttons border">
                            <a href="JavaScript:Void(0);" data-bs-toggle="modal" data-bs-target="#login"><i
                                    class="fas fa-home me-2"></i>Post New
                                Property</a>
                        </li>
                        <li class="list-buttons border">
                            <a href="JavaScript:Void(0);" data-bs-toggle="modal" data-bs-target="#login"><i
                                    class="fas fa-user me-2"></i>Log In</a>
                        </li>
                    @endif
                </ul>
                @endif
            </div>
        </nav>
    </div>
</div>
