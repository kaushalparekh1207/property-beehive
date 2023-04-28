@section('users')
    menu-open active
@endsection
@section('users_add')
    active
@endsection
@section('title')
    User | Edit
@endsection
<!DOCTYPE html>
<html lang="en">

@include('admin.assets.link')

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        @include('admin.assets.side&topbar')

        <!-- =============================================== -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="header-icon">
                    <i class="pe-7s-world"></i>
                </div>
                <div class="header-title">
                    <h1>Users</h1>
                    <small>Edit New User</small>

                    <ol class="breadcrumb">
                        {{-- <li><a href="{{ route('index') }}"><i class="pe-7s-home"></i> Home</a></li>
                        <li class="active">Dashboard</li> --}}
                        <li class="breadcrumb-item">
                            <a href="{{ route('index') }}"><i class="pe-7s-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('users') }}">Users List</a>
                        </li>
                        <li class="breadcrumb-item">Edit User
                        </li>
                    </ol>
                </div>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-bd">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <h4>Edit New Users</h4>
                                </div>
                            </div>
                            <div class="panel-body">

                                <form action="{{ route('users_update') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $userData->id }}">
                                    <div class="form-group">
                                        <label class="control-label">Select User
                                            Type: <sup>*</sup>
                                        </label>
                                        <div>
                                            <select name="user_type" class="form-control" required>

                                                @foreach ($userType as $type)
                                                    @php
                                                        if ($type->id == $userData->user_type_id) {
                                                            $selected = 'selected';
                                                        } else {
                                                            $selected = '';
                                                        }
                                                    @endphp
                                                    <option value="{{ $type->id }}" {{ $selected }}>
                                                        {{ $type->user_type }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Enter User Name:
                                            <sup>*</sup></label>
                                        <div>
                                            <input name="user_name" type="text" class="form-control"
                                                value="{{ $userData->name }}" placeholder="Enter User Name" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Enter User contact Number:
                                            <sup>*</sup></label>
                                        <div>
                                            <input name="contact" type="number" class="form-control"
                                                value="{{ $userData->contact }}" placeholder="Enter User contact Number"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Enter User Email Id: <sup>*</sup></label>
                                        <div>
                                            <input name="email" type="email" class="form-control"
                                                value="{{ $userData->email }}" placeholder="Enter User Email Id">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Update User Password: <sup>*</sup></label>
                                        <div>
                                            <input name="password" type="password" class="form-control"
                                                value="{{ $userData->user_password }}"
                                                placeholder="Enter User Password" required>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <button type="reset" class="btn btn-danger">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section> <!-- /.content -->
        </div> <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs"> <b>Version</b> 1.0</div>
            <strong>Copyright &copy; 2016-2017 <a href="#">bdtask</a>.</strong> All rights reserved. <i
                class="fa fa-heart color-green"></i>
        </footer>
    </div>
    <!-- ./wrapper -->
    @include('admin.assets.script')
</body>

</html>
