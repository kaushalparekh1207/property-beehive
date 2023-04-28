@section('admin_user')
    active
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
                    <h1>Admin Users</h1>
                    <small>Add New Admin User</small>
                    <ol class="breadcrumb">
                        <li><a href="index.html"><i class="pe-7s-home"></i> Home</a></li>
                        <li class="active">Dashboard</li>
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
                                    <h4>Add Admin User</h4>
                                </div>
                            </div>
                            <div class="panel-body">

                                <form method="POST" action="{{ route('AdminUsersinsert') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="inputName" class="control-label">Select Role</label>
                                        <select name="role" class="form-control">
                                            <option value="" selected disabled>Select
                                                One
                                            </option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">
                                                    {{ $role->role_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName" class="control-label">Name</label>
                                        <input type="text" class="form-control" name="user_name" id="user_name"
                                            placeholder="Name" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputName" class="control-label">Contact Number</label>
                                        <input type="number" class="form-control" name="contact_number"
                                            id="contact_number" placeholder="Contact Number"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                            maxlength="10" minlength="10" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputName" class="control-label">Email</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="Enter Email" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputName" class="control-label">Password</label>
                                        <input type="password" class="form-control" name="password" id="password"
                                            placeholder="Enter Password" required>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
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
