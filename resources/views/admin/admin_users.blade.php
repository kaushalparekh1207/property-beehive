@section('Property')
    active pcoded-trigger
@endsection
@section('a_property')
    active
@endsection
@section('title')
    Admin Users
@endsection
<!DOCTYPE html>
<html lang="en">

@include('admin.assets.css')

<body>

    <div class="loader-bg">
        <div class="loader-bar"></div>
    </div>

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            @include('admin.assets.topbar')

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">

                    @include('admin.assets.sidebar')

                    <div class="pcoded-content">

                        <div class="page-header card">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <i class="fa fa-user-plus bg-c-blue"></i>
                                        <div class="d-inline">
                                            <h5>Admin Users</h5>
                                            <span>Admin User List</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="page-header-breadcrumb">
                                        <ul class=" breadcrumb breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="../index-2.html"><i class="feather icon-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a>
                                            </li>
                                            <li class="breadcrumb-item">Aggriculture Property
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pcoded-inner-content">

                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-12">


                                                <div class="card">

                                                    <div class="card-block">
                                                        <a type="button" href="{{ route('createAdminUsers') }}"
                                                            id="" class="btn btn-success m-b-20">+ Add New</a>
                                                        <div class="dt-responsive table-responsive">
                                                            <table id="aggricultureProperty"
                                                                class="table table-striped table-bordered nowrap">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Sr No.</th>
                                                                        <th>Property Name</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th>Sr No.</th>
                                                                        <th>Property Name</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="styleSelector">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('admin.assets.js')
    <script>
        $(function() {
            var columnString;

            columnString = [{
                    data: 'id'
                },
                {
                    data: 'property_name'
                },
                {
                    data: 'action'
                },
            ]
            $('#aggricultureProperty').DataTable({
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
                ajax: "{{ route('showAggriculturePropertyDetails') }}",
                columns: columnString,
            });
        });
    </script>

</body>

</html>
