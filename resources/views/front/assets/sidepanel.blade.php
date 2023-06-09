<div class="col-xl-3 col-lg-3 col-md-12">
    <div class="property_dashboard_navbar">

        <div class="dash_user_avater">
            <img src="{{ url('/') }}/front/assets/img/team-3.jpg" class="img-fluid avater" alt="">
            @if (session('user')['name'] == null)
                <h4>{{ session('user')['role'] }}</h4>
            @else
                <h4>{{ session('user')['name'] }}</h4>
            @endif
            @if ((session('user')['city'] != null) & (session('user')['state'] != null))
                <span class="font--medium small"><i
                        class="fa-solid fa-location-dot me-2"></i>{{ session('user')['city'] }},{{ session('user')['state'] }}</span>
            @endif
        </div>

        {{--        <div class="adgt-wriop-social"> --}}
        {{--            <ul> --}}
        {{--                <li><a href="JavaScript:Void(0);" class="bg--facebook"><i class="fa-brands fa-facebook-f"></i></a></li> --}}
        {{--                <li><a href="JavaScript:Void(0);" class="bg--twitter"><i class="fa-brands fa-twitter"></i></a></li> --}}
        {{--                <li><a href="JavaScript:Void(0);" class="bg--googleplus"><i class="fa-brands fa-google-plus-g"></i></a></li> --}}
        {{--                <li><a href="JavaScript:Void(0);" class="bg--linkedin"><i class="fa-brands fa-linkedin-in"></i></a></li> --}}
        {{--            </ul> --}}
        {{--        </div> --}}

        {{--        <div class="adgt-wriop-footer py-3 px-3"> --}}
        {{--            <div class="single-button d-flex align-items-center justify-content-between"> --}}
        {{--                <button type="button" class="btn btn-md font--bold btn-light-primary me-2 full-width"><i class="fa-solid fa-phone me-2"></i>856 742 672</button> --}}
        {{--                <button type="button" data-bs-toggle="modal" data-bs-target="#message" class="btn btn-md font--bold btn-light-success full-width"><i class="fa-solid fa-paper-plane me-2"></i>Send Message</button> --}}
        {{--            </div> --}}
        {{--        </div> --}}

        <div class="dash_user_menues">
            <ul>
                <li class="@yield('dashboard')"><a href="{{ route('front_dashboard') }}"><i
                            class="fa fa-tachometer-alt"></i>Dashboard</a></li>
                <li class="@yield('profile')"><a href="{{ route('userProfile', session('user')['id']) }}"><i
                            class="fa fa-user-tie"></i>My Profile</a></li>
                <li class="@yield('my_properties')"><a href="{{ route('myProperties') }}"><i class="fa fa-tasks"></i>My
                        Properties</a></li>
                <li class="@yield('inqury_list')"><a href="{{ route('showInquiryList') }}"><i class="fa fa-list"></i>Inquiry
                        List</a></li>
                        <li class="@yield('our_packages')"><a href="{{ route('our_packages') }}"><i class="fa fa-list"></i>Packages</a></li>
                <li class="@yield('post_property')"><a href="{{ route('postProperty') }}"><i class="fa fa-pen-nib"></i>Post
                        New Property</a></li>
                {{--                <li><a href="choose-package.html"><i class="fa fa-gift"></i>Choose Package<span class="expiration">10 days left</span></a></li> --}}
                <li class="@yield('changePassword')"><a href="{{ route('changePassword') }}"><i
                            class="fa fa-unlock-alt"></i>Change Password</a></li>
                <li><a href="{{ route('front_logout') }}"><i class="fa fa-sign-out"></i>Logout</a></li>
            </ul>
        </div><br>
    </div>
</div>
