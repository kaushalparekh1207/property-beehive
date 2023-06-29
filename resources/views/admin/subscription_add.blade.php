@section('setup')
    menu-is-opening menu-open
@endsection
@section('Subscription')
    active
@endsection
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Subscription| Add</title>

    @include('admin.assets.links')
    <style>
        sup {
            color: red;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        @include('admin.assets.side&topbar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Add New Subscription</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('Subscription') }}">Subscription
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">Add New Subscription</li>
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
                        <form class="form-horizontal" action="{{ route('subscription_insert') }}" method="POST">
                            @csrf
                            <div class="card-body">

                                <div class="form-group row">
                                    <label class="col-form-label col-sm-2">Enter Subscription Name:
                                        <sup>*</sup></label>
                                    <div class="col-sm-10">
                                        <input name="package_name" type="text" class="form-control"
                                            placeholder="Enter Subscription Name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-2">Enter Subscription Description:
                                    </label>
                                    <div class="col-sm-10">
                                        <input name="package_description" type="text" class="form-control"
                                            placeholder=" Enter Subscription Description">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-2">Enter Subscription type:
                                    </label>
                                    <div class="col-sm-10">
                                        <input name="package_type" type="text" class="form-control"
                                            placeholder="Enter Subscription type">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-2">Enter Number of Listing Property:
                                    </label>
                                    <div class="col-sm-10">
                                        <input name="number_of_listing_property" type="number" class="form-control"
                                            placeholder="Enter Number of Listing Property">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-2">Enter Number Ads:
                                    </label>
                                    <div class="col-sm-10">
                                        <input name="number_of_ads" type="number" class="form-control"
                                            placeholder="Enter Number Ads">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-2">Enter Subscription Price:
                                    </label>
                                    <div class="col-sm-10">
                                        <input name="price" type="number" class="form-control"
                                            placeholder="Enter Subscription Price">
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
