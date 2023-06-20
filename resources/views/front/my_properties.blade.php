@php
    use App\Models\CommercialProperty;
    use App\Models\IndustrialProperty;
    use App\Models\ResidentialProperty;
    use App\Models\AgriculturalProperty;
@endphp@section('home_page')
active
@endsection
@section('my_properties')
active
@endsection
<!doctype html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>My Properties</title>
@include('front.assets.links')
<style>
    .pagination {
        padding-right: 15px !important;
    }

    div.dataTables_wrapper div.dataTables_info {
        padding-top: 0.85em;
        padding-left: 15px;
    }
</style>

</head>


<body>

<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div id="preloader">
    <div class="preloader"><span></span><span></span></div>
</div>

<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">

    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->
    <!-- Start Navigation -->
    @include('front.assets.header')
    <!-- End Navigation -->
    <div class="clearfix"></div>
    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->


    <!-- ============================ Top Banner Start================================== -->
    <div class="page-title"
        style="background:#017efa url({{ url('/') }}/front/assets/img/page-title.png) no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <h2 class="ipt-title">Hi, {{ session('user')['role'] }}</h2>
                    <span class="ipn-subtitle">Manage your profile and view property</span>

                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Top Banner End ================================== -->

    <!-- ============================= Explore Dashboard =============================== -->
    <section class="gray-simple pt-5 pb-5">
        <div class="container-fluid">

            <div class="row">

                @include('front.assets.sidepanel')

                <div class="col-xl-9 col-lg-9 col-md-12">
                    <div class="dashboard-body">

                        <div class="dashboard-wraper">

                            <!-- Basic Information -->
                            <div class="frm_submit_block">
                                <section>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="dashboard_property">
                                                    <div class="table-responsive">
                                                        <table id="example" class="table" style="width:100%">
                                                            <thead style="background: #FA962A; color:antiquewhite">
                                                                <tr>
                                                                    <th scope="col">Image</th>
                                                                    <th scope="col" class="m2_hide">Details</th>
                                                                    <th scope="col" class="m2_hide">For</th>
                                                                    <th scope="col" class="m2_hide">
                                                                        Type</th>
                                                                    <th scope="col">Status</th>
                                                                    <th scope="col">Action</th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    @include('front.assets.footer')

    @include('front.assets.modal')

    <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->


@include('front.assets.scripts')
<script>
    $(document).ready(function() {
        $(".js-select2").select2({
            closeOnSelect: false
        });
        $(".js-select2-multi").select2({
            closeOnSelect: false
        });
    });
</script>
<script>
    $(document).ready(function() {
        var columnString;
        columnString = [{
                data: 'image'
            },
            {
                data: 'details'
            },
            {
                data: 'for'
            },
            {
                data: 'type'
            },
            {
                data: 'status'
            },
            {
                data: 'action'
            },
        ]
        var myProperties = $('#example').DataTable({
            language: {
                infoFiltered: ""
            },
            processing: true,
            serverSide: true,
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,

            // pageLength: 3,
            ajax: "{{ route('showPropertyDetails') }}",
            columns: columnString,
        });
    });
</script>

</body>

</html>
