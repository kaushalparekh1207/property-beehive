<nav class="pcoded-navbar">
    <div class="nav-list">
        <div class="pcoded-inner-navbar main-menu">
            <ul class="pcoded-item pcoded-left-item">
                <li class="@yield('dashboard')">
                    <a href="{{ route('index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-home"></i>
                        </span>
                        <span class="pcoded-mtext">Dashboard</span>
                    </a>
                </li>
                <li class="@yield('admin_users')">
                    <a href="{{ route('admin_users') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-user-plus"></i>
                        </span>
                        <span class="pcoded-mtext">Admin Users</span>
                    </a>
                </li>
                <li class="pcoded-hasmenu @yield('Property')">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-layers"></i>
                        </span>
                        <span class="pcoded-mtext">Property Types</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="@yield('a_property')">
                            <a href="{{ route('aggriculture_property') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext ml-3">Aggriculture Property</span>
                            </a>
                        </li>
                        <li class="@yield('na_property')">
                            <a href="{{ route('non_aggriculture_property') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext ml-3">Non Aggriculture Property</span>
                            </a>
                        </li>
                        <li class="@yield('property_transaction')">
                            <a href="{{ route('property_transaction') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext ml-3">Property Transaction</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="pcoded-hasmenu @yield('setup')">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-settings"></i>
                        </span>
                        <span class="pcoded-mtext">Setup</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="@yield('role')">
                            <a href="{{ route('roles') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext ml-3">Role Master</span>
                            </a>
                        </li>
                        <li class="@yield('state')">
                            <a href="{{ route('state') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext ml-3">State Master</span>
                            </a>
                        </li>
                        <li class="@yield('city')">
                            <a href="{{ route('city') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext ml-3">City Master</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="pcoded-hasmenu @yield('users')">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-users"></i>
                        </span>
                        <span class="pcoded-mtext">Users</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="@yield('user_type')">
                            <a href="{{ route('user_type') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext ml-3">User Types</span>
                            </a>
                        </li>
                        <li class="@yield('users_add')">
                            <a href="{{ route('users_add') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext ml-3">Add Users</span>
                            </a>
                        </li>
                        <li class="@yield('user_list')">
                            <a href="{{ route('city') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext ml-3">User List</span>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>

        </div>
    </div>
</nav>
