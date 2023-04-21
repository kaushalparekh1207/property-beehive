<nav class="pcoded-navbar">
    <div class="nav-list">
        <div class="pcoded-inner-navbar main-menu">
            <ul class="pcoded-item pcoded-left-item">
                <li class="">
                    <a href="form-picker.html" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-home"></i>
                        </span>
                        <span class="pcoded-mtext">Dashboard</span>
                    </a>
                </li>
                <li class="pcoded-hasmenu @yield('Property')">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-layers"></i>
                        </span>
                        <span class="pcoded-mtext">Property</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="@yield('a_property')">
                            <a href="{{ route('aggriculture_property') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Aggriculture Property</span>
                            </a>
                        </li>
                        <li class="@yield('na_property')">
                            <a href="{{ route('non_aggriculture_property') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Non Aggriculture Property</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="pcoded-hasmenu">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-settings"></i>
                        </span>
                        <span class="pcoded-mtext">Setup</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li>
                            <a href="{{ route('aggriculture_property') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext ml-3">Role Master</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('aggriculture_property') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext ml-3">Country Master</span>
                            </a>
                        </li>
                        <li>
                            <a href="widget-data.html" class="waves-effect waves-dark">
                                <span class="pcoded-mtext ml-3">State Master</span>
                            </a>
                        </li>
                        <li>
                            <a href="widget-data.html" class="waves-effect waves-dark">
                                <span class="pcoded-mtext ml-3">City Master</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>
</nav>
