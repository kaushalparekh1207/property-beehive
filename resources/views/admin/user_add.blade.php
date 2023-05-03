@section('users')
menu-is-opening menu-open
@endsection
@section('users_add')
    active
@endsection
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Users| Add</title>

    @include('admin.assets.links')
    <style>
        sup {
            color: red;
        }
    </style>
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        @include('admin.assets.side&topbar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Add New Users</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                                <li class="breadcrumb-item"><a
                                    href="{{ route('users') }}"> Users List
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">Add New Users</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="containter-fluid">
                    <div class="card card-info">
                        {{-- <div class="card-header">
                            <h3 class="card-title">Horizontal Form</h3>
                        </div> --}}
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" action="{{ route('users_insert') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-2">Select User
                                        Type: <sup>*</sup>
                                    </label>
                                    <div class="col-sm-10">
                                        <select  class="form-control select2" name="user_type" required>
                                            <option value="" selected disabled>Select
                                                One
                                            </option>
                                            @foreach ($userType as $type)
                                                <option value="{{ $type->id }}">
                                                    {{ $type->user_type }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-sm-2">Enter User Name:
                                        <sup>*</sup></label>
                                    <div class="col-sm-10">
                                        <input name="user_name" type="text" class="form-control"
                                            placeholder="Enter User Name" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-2">Enter User contact Number:
                                        <sup>*</sup></label>
                                    <div class="col-sm-10">
                                        <input name="contact" type="number" class="form-control"
                                            placeholder="Enter User contact Number" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-2">Enter User Email Id: <sup>*</sup></label>
                                    <div class="col-sm-10">
                                        <input name="email" type="email" class="form-control"
                                            placeholder="Enter User Email Id">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-2">Enter User Password: <sup>*</sup></label>
                                    <div class="col-sm-10">
                                        <input name="password" type="password" class="form-control"
                                            placeholder="Enter User Password" required>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Submit</button>
                                <button type="reset" class="btn btn-default float-right">Cancel</button>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                </div>
                <!--/. container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        @yield('footer')
    </div>
    <!-- ./wrapper -->

    @include('admin.assets.scripts')
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2();
        });
    </script>
</body>

</html>
