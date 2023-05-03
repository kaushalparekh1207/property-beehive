@section('Property')
menu-is-opening menu-open
@endsection
@section('property_transaction')
    active
@endsection
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Property Transaction | Add</title>

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
                            <h1 class="m-0">Add New Property Transaction</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                                <li class="breadcrumb-item"><a
                                    href="{{ route('property_transaction') }}">Property Transaction</a>
                            </li>
                                <li class="breadcrumb-item active">Add New Property Transaction</li>
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
                        <form class="form-horizontal" action="{{ route('property_transaction_insert') }}"
                        method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-3">Enter Property
                                        Transaction Type: <sup>*</sup></label>
                                    <div class="col-sm-9">
                                        <input name="property_transaction" type="text"
                                            class="form-control"
                                            placeholder="Property Transaction Name" required>
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
