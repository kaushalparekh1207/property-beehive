@section('users')
    active pcoded-trigger
@endsection
@section('user_list')
    active
@endsection
@section('title')
    Users List
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
                                        <i class="feather icon-layers bg-c-blue"></i>
                                        <div class="d-inline">
                                            <h4>Users</h4>
                                            <span>User List</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="page-header-breadcrumb">
                                        <ul class=" breadcrumb breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="{{ route('index') }}"><i class="feather icon-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a>
                                            </li>
                                            <li class="breadcrumb-item">User List
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
                                                        <a type="button" href="{{ route('user_type_add') }}"
                                                            id="" class="btn btn-success m-b-20">+ Add New</a>
                                                        <div class="dt-responsive table-responsive">
                                                            <table id="user_list"
                                                                class="table table-striped table-bordered nowrap">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Sr No.</th>
                                                                        <th>User Type</th>
                                                                        <th>User Name</th>
                                                                        <th>Contact Number</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th>Sr No.</th>
                                                                        <th>User Type</th>
                                                                        <th>User Name</th>
                                                                        <th>Contact Number</th>
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
                    data: 'user_type'
                },
                {
                    data: 'name'
                },
                {
                    data: 'contact'
                },
                {
                    data: 'action'
                },
            ]
            $('#user_list').DataTable({
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
                ajax: "{{ route('show_users') }}",
                columns: columnString,
            });
        });
    </script>

</body>

</html>
