@php
    $city = city();
    $propertyType = propertyType();
    $taluka = taluka();
@endphp
@section('home_page')
    active
@endsection
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Property Beehive</title>
    @include('front.assets.links')
    <style>
        .sorting_desc,
        .sorting_asc {
            display: none;
        }

        label {
            font-weight: bold;
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




        <!-- ============================ Hero Banner End ================================== -->

        <div class="page-title"
            style="background:#017efa url({{ url('/') }}/front/assets/img/page-title.png) no-repeat;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">


                    </div>
                </div>
            </div>
        </div>
        <!-- ============================ Page Title End ================================== -->

        <!-- ============================ All Property ================================== -->
        <section class="over-top micler gray-simple">

            <div class="container">

                <div class="row">

                    <!-- property Sidebar -->
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="page-sidebar p-0">
                            <a class="filter_links" data-bs-toggle="collapse" href="#fltbox" role="button"
                                aria-expanded="false" aria-controls="fltbox">Open Advance Filter<i
                                    class="fa fa-sliders-h ml-2"></i></a>
                            <div class="collapse" id="fltbox">
                                <!-- Find New Property -->
                                <div class="sidebar-widgets p-4">

                                    <label for="">Property Type :</label>
                                    <div class="form-group">
                                        <select class="js-select2" name="property_type_id" id="property_type">
                                            <option value="" selected disabled>Select Property
                                                types
                                            </option>
                                            @foreach ($propertyType as $type)
                                                @php
                                                    if ($type->id == $type_id) {
                                                        $selected = 'selected';
                                                    } else {
                                                        $selected = '';
                                                    }
                                                @endphp
                                                <option value="{{ $type->id }}" {{ $selected }}>
                                                    {{ $type->property_type }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <label for="">City :</label>
                                    <div class="form-group">
                                        <select class="js-select2" name="city_id" id="city_dropdown">
                                            <option value="" selected disabled>Select City
                                            </option>
                                            @foreach ($city as $cities)
                                                @php
                                                    if ($cities->id == $city_id) {
                                                        $selected = 'selected';
                                                    } else {
                                                        $selected = '';
                                                    }
                                                @endphp
                                                <option value="{{ $cities->id }}" {{ $selected }}>
                                                    {{ $cities->city }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <label for="">Property Category :</label>
                                    <div class="form-group">
                                        <select class="js-select2" name="property_category_id"
                                            id="property_category_dropdown">
                                            @php
                                                $property_categories = App\Models\PropertyCategory::where('property_type_id', $type_id)->get();
                                            @endphp
                                            @foreach ($property_categories as $property_category)
                                                <option value="{{ $property_category->id }}" selected>
                                                    {{ $property_category->property_category_name }}
                                                </option>
                                            @endforeach
                                            <option value="" selected disabled>Select Property
                                                Type
                                                First
                                            </option>
                                        </select>
                                    </div>

                                    <label for="">Taluka :</label>
                                    <div class="form-group">
                                        <select class="js-select2" name="taluka_id" id="taluka_dropdown" multiple>
                                            @php
                                                $taluka_list_per_city = App\Models\Taluka::where('city_id', $city_id)->get();
                                            @endphp
                                            @foreach ($taluka_list_per_city as $taluka)
                                                <option value="{{ $taluka->id }}">
                                                    {{ $taluka->taluka }}
                                                </option>
                                            @endforeach
                                            <option value="" disabled>Select Taluka
                                            </option>
                                        </select>
                                    </div>

                                    <label for="">Budget :</label>
                                    <div class="form-group">
                                        <select class="js-select2" name="budget" id="budget">
                                            <option value="" selected disabled>Budget
                                            </option>
                                            <option value="500000|1000000">5-10 Lacs</option>
                                            <option value="1000000|1500000">10-15 Lacs</option>
                                            <option value="1500000|2000000">15-20 Lacs</option>
                                            <option value="2000000|2500000">20-25 Lacs</option>
                                            <option value="2500000|3000000">25-30 Lacs</option>
                                            <option value="3000000|3500000">30-35 Lacs</option>
                                            <option value="3500000|4000000">35-40 Lacs</option>
                                            <option value="4000000|4500000">40-45 Lacs</option>
                                            <option value="4500000|5000000">45-50 Lacs</option>
                                            <option value="5000000|5500000">50-55 Lacs</option>
                                            <option value="5500000|6000000">55-60 Lacs</option>
                                            <option value="6000000|6500000">60-65 Lacs</option>
                                            <option value="6500000|7000000">65-70 Lacs</option>
                                            <option value="7000000|7500000">70-75 Lacs</option>
                                            <option value="7500000|8000000">75-80 Lacs</option>
                                            <option value="8000000|8500000">80-85 Lacs</option>
                                            <option value="8500000|9000000">85-90 Lacs</option>
                                            <option value="9000000|9500000">90-95 Lacs</option>
                                            <option value="9500000|10000000">95 Lacs -1 Cr</option>
                                            <option value="10000000|15000000">1-1.5 Cr</option>
                                            <option value="15000000|20000000">1.5-2 Cr</option>
                                            <option value="20000000|25000000">2-2.5 Cr</option>
                                            <option value="25000000|250000000">2.5 Cr +</option>
                                        </select>
                                    </div>

                                    <label for="">BHK :</label>
                                    <div class="form-group">
                                        <select class="js-select2" name="bhk_filter" id="bhk_filter" multiple>
                                            <option value="1">1 BHK</option>
                                            <option value="2">2 BHK</option>
                                            <option value="3">3 BHK</option>
                                            <option value="4">4 BHK</option>
                                            <option value="5">5 BHK</option>
                                            <option value="6">6 BHK</option>
                                            <option value="7">7 BHK</option>
                                        </select>
                                    </div>

                                    <label for="">Min Bathroom :</label>
                                    <div class="form-group">
                                        <select class="js-select2" name="bathroom_filter" id="bathroom_filter">
                                            <option value="" selected disabled>Select Min Bathroom</option>
                                            @for ($i = 0; $i < 6; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>

                                    <label for="">Furnished Status :</label>
                                    <div class="form-group">
                                        <select class="js-select2-multi" name="furnished_status_filter"
                                            id="furnished_status_filter" multiple>
                                            <option value="Fully Furnished">Fully Furnished</option>
                                            <option value="Unfurnished">Unfurnished</option>
                                            <option value="Semi Furnished">Semi Furnished
                                            </option>
                                        </select>
                                    </div>

                                    <label for="">Possession Status :</label>
                                    <div class="form-group">
                                        <select class="js-select2" name="possession_status_filter"
                                            id="possession_status_filter">
                                            <option value="" selected disabled></option>
                                            <option value="Under Construction">Under
                                                Construction</option>
                                            <option value="Ready to Move">Ready to Move
                                            </option>
                                        </select>
                                    </div>

                                    {{-- <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 pt-4 pb-4">
                                            <h6>Choose Price</h6>
                                            <div class="rg-slider">
                                                <input type="text" class="js-range-slider" name="my_range"
                                                    value="">
                                            </div>
                                        </div>
                                    </div> --}}

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 pt-4">
                                            <button class="btn btn-primary rounded full-width font--medium"
                                                id="resetfilter">
                                                Clear Filter</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- Sidebar End -->
                    </div>

                    <div class="col-lg-8 col-md-12 col-sm-12">

                        <div class="row justify-content-center mb-5">
                            <div class="col-lg-12 col-md-12">
                                <div class="item-shorting-box">
                                    <div class="item-shorting-box-left">
                                        <div class="shorting-by">
                                            <select id="sort_by_filter">
                                                <option value="" selected disabled>Sorting By:</option>
                                                <option value="1">Low Price</option>
                                                <option value="2">High Price</option>
                                                {{-- <option value="3">Most Popular</option> --}}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Start All List -->
                        <div class="row gx-3 gy-4">

                            <!-- Single Property -->
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <table id="example" class="table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </section>




        <!-- ============================ Property Detail Start ================================== -->




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
                closeOnSelect: true,
                placeholder: "Select Option",
                maximumSelectionLength: 3
            });
            $(".js-select2-multi").select2({
                closeOnSelect: true,
                placeholder: "Select Option",
                maximumSelectionLength: 2
            });
            $(".js-select2-disabled-search").select2({
                closeOnSelect: true,
                placeholder: "Sort By",
                minimumResultsForSearch: -1
            });

        });
    </script>
    <script>
        $(document).ready(function() {
            var type_id = '<?php echo $type_id; ?>';
            var category_id = '<?php echo $category_id; ?>';
            var city_id = '<?php echo $city_id; ?>';
            var taluka_id = '<?php echo $taluka_id; ?>';
            var budget = '<?php echo $budget; ?>';
            var custom_filter = '<?php echo $custom_filter; ?>';
            var columnString;
            var urlstring = "{{ route('rentPropertyResultSearchList') }}";
            // alert(urlstring);
            columnString = [{
                data: 'show'
            }, ]
            var propertySearch = $('#example').DataTable({
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
                dom: 'lifrtp',
                pageLength: 8,
                ajax: {
                    url: urlstring,
                    data: function(data) {
                        data.type_id = type_id;
                        data.category_id = category_id;
                        data.city_id = city_id;
                        data.taluka_id = taluka_id;
                        data.budget = budget;
                        data.custom_filter = custom_filter;
                        data.searchByCity = $('#city_dropdown').val();
                        data.searchByTaluka = $('#taluka_dropdown').val();
                        data.searchByType = $('#property_type').val();
                        data.searchByCategory = $('#property_category_dropdown').val();
                        data.searchByBudget = $('#budget').val();
                        data.bhkFilter = $('#bhk_filter').val();
                        data.bathRoomFilter = $('#bathroom_filter').val();
                        data.furnishedStatusFilter = $('#furnished_status_filter').val();
                        data.possessionStatusFilter = $('#possession_status_filter').val();
                        data.sortByFilter = $('#sort_by_filter').val();
                    }
                },
                columns: columnString,
            });
            $('#city_dropdown').change(function() {
                propertySearch.draw();
            });
            $('#taluka_dropdown').change(function() {
                propertySearch.draw();
            });
            $('#property_type').change(function() {
                propertySearch.draw();
            });
            $('#property_category_dropdown').change(function() {
                propertySearch.draw();
            });
            $('#budget').change(function() {
                propertySearch.draw();
            });
            $('#bhk_filter').change(function() {
                propertySearch.draw();
            });
            $('#bathroom_filter').change(function() {
                propertySearch.draw();
            });
            $('#furnished_status_filter').change(function() {
                propertySearch.draw();
            });
            $('#possession_status_filter').change(function() {
                propertySearch.draw();
            });
            $('#sort_by_filter').change(function() {
                propertySearch.draw();
            });
            $("#clearfilter").click(function() {
                $('#city_dropdown').val('');
                $('#taluka_dropdown').val('');
                $('#property_type').val('');
                $('#property_category_dropdown').val('');
                $('#budget').val('');
                propertySearch.draw();
            });
        });
    </script>
    <script>
        $('#property_type').on('change', function() {
            var property_type_id = $(this).val();

            $("#property_category_dropdown").html('');
            $.ajax({
                url: "{{ route('get-property-category') }}",
                type: "GET",
                data: {
                    property_type_id: property_type_id,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#property_category_dropdown').html(
                        '<option value="" selected disabled>-- Select Property Category --</option>'
                    );
                    $.each(result.property_category, function(key, value) {
                        $("#property_category_dropdown").append(
                            '<option value="' +
                            value
                            .id + '">' + value.property_category_name +
                            '</option>');

                    });
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // var city = $('#city_dropdown').val();
            // if (city != null || city != '') {
            //     $("#taluka_dropdown").html('');
            //     $.ajax({
            //         url: "{{ route('get-taluka-list') }}",
            //         type: "GET",
            //         data: {
            //             city: city,
            //             _token: '{{ csrf_token() }}'
            //         },
            //         dataType: 'json',
            //         success: function(result) {
            //             $('#taluka').show();
            //             $('#taluka_dropdown').html(
            //                 '<option value="" selected disabled>-- Select Taluka --</option>'
            //             );
            //             $.each(result.taluka, function(key, value) {
            //                 $("#taluka_dropdown").append('<option value="' +
            //                     value
            //                     .id + '">' + value.taluka +
            //                     '</option>');
            //             });
            //             // $('#sd').show();
            //         }
            //     });
            // } else {
            //  $('#city').hide();
            $('#city_dropdown').on('change', function() {
                var city = this.value;
                $("#taluka_dropdown").html('');
                $.ajax({
                    url: "{{ route('get-taluka-list') }}",
                    type: "GET",
                    data: {
                        city: city,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#taluka').show();
                        $('#taluka_dropdown').html(
                            '<option value="" disabled>-- Select Taluka --</option>'
                        );
                        $.each(result.taluka, function(key, value) {
                            $("#taluka_dropdown").append('<option value="' +
                                value
                                .id + '">' + value.taluka +
                                '</option>');
                        });
                        // $('#sd').show();
                    }
                });
            });
            // }
        });
    </script>

</body>

</html>
