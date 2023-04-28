@section('Property')
    menu-open active
@endsection
@section('na_property')
    active
@endsection
@section('title')
    Non Aggriculture Property
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
                    <h1>Non Aggriculture Property</h1>
                    <small>Add New Non Aggriculture Property</small>
                    <ol class="breadcrumb">
                        < <li class="breadcrumb-item">
                            <a href="{{ route('index') }}"><i class="pe-7s-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">Non Aggriculture Property List
                            </li>
                    </ol>
                </div>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-bd">

                            <div class="panel-body">
                                {{-- <button type="button"  class="btn btn-success"><a href="{{ route('state_add') }}"><i class="fa fa-plus"></i> Add
                                    New</a></button> --}}
                                <a type="button" href="{{ route('non_aggriculture_property_add') }}" id=""
                                    class="btn btn-success m-b-20">+ Add New</a>
                                <div class="table-responsive" style="margin-top: 2%;">
                                    <table id="nonaggricultureProperty"
                                        class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                <th>Sr No.</th>
                                                <th>Property Type</th>
                                                <th>Property Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Sr No.</th>
                                                <th>Property Type</th>
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
    <script>
        var columnString;

        columnString = [{
                data: 'id'
            },
            {
                data: 'na_property_type'
            },
            {
                data: 'na_property_name'
            },
            {
                data: 'action'
            },
        ]
        $('#nonaggricultureProperty').DataTable({
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
            ajax: "{{ route('show_non_AggriculturePropertyDetails') }}",
            columns: columnString,
        });
    </script>
</body>

</html>
