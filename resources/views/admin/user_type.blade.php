@section('users')
menu-is-opening menu-open
@endsection
@section('user_type')
    active
@endsection
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Type</title>

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
                            <h1 class="m-0">User Type</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                                <li class="breadcrumb-item"> User Type
                                </li>
                                
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
                        <div class="card-body">
                            <a type="button" href="{{ route('user_type_add') }}" id=""
                            class="btn btn-success mb-3">+ Add New</a>
                            <table id="user_type_list" class="table table-striped table-condensed">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>User Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>User Type</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
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
    <script>
        var columnString;
        columnString = [{
                data: 'id'
            },
            {
                data: 'user_type'
            },
            {
                data: 'action'
            },
        ]
        $('#user_type_list').DataTable({
            "language": {
                "infoFiltered": ""
            },
            processing: true,
            serverSide: true,
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            ajax: "{{ route('show_user_type') }}",
            columns: columnString,
        });
    </script>
</body>

</html>
