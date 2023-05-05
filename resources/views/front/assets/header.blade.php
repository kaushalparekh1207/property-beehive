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

                    <li class="active"><a href="JavaScript:Void(0);">Home<span class="submenu-indicator"></span></a>

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
                    <li class="active  "><a href="contact.php">Contact US<span class="submenu-indicator"></span></a>

                    </li>





                @if(Request::path() <> 'sign_up')
                </ul>
                <ul class="nav-menu nav-menu-social align-to-right">
                    <li class="list-buttons ms-2">
                        <a href="signup.php"><i class="fa-solid fa-upload me-2"></i>List Property</a>
                    </li>
                    <li class="list-buttons border">
                        <a href="JavaScript:Void(0);" data-bs-toggle="modal" data-bs-target="#login"><i
                                class="fas fa-sign-in-alt me-2"></i>Log In</a>
                    </li>
                </ul>
                @endif
</div>
</nav>
</div>
</div>
