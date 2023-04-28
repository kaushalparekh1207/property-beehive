@section('Property')
    menu-open active
@endsection
@section('property_transaction')
    active
@endsection
@section('title')
    Property Transaction
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
                    <h1>Property Transaction</h1>
                    <small>Add New Property Transaction</small>
                    <ol class="breadcrumb">
                        < <li class="breadcrumb-item">
                            <a href="{{ route('index') }}"><i class="pe-7s-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">Property Transaction List
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
                                <a type="button" href="{{ route('property_transaction_add') }}" id=""
                                    class="btn btn-success">+ Add New</a>
                                <div class="table-responsive" style="margin-top: 2%;">
                                    <table id="property_transaction_list" class="table table-striped table-condensed">
                                        <thead>
                                            <tr>
                                                <th>Sr No.</th>
                                                <th>Property Transaction Type</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Sr No.</th>
                                                <th>Property Transaction Type</th>
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
                data: 'property_transaction_type'
            },
            {
                data: 'action'
            },
        ]
        $('#property_transaction_list').DataTable({
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
            ajax: "{{ route('show_property_transaction') }}",
            columns: columnString,
        });
    </script>
</body>

</html>
