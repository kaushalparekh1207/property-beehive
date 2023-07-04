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

                <!-- Start Search -->
                @if (\Route::current()->getName() == 'property_result_search')
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

                                        <div class="form-group">
                                            <select class="js-select2" name="taluka_id" id="taluka_dropdown">
                                                @php
                                                    $taluka_list_per_city = App\Models\Taluka::where('city_id', $city_id)->get();
                                                @endphp
                                                @foreach ($taluka_list_per_city as $taluka)
                                                    <option value="{{ $taluka->id }}" selected>
                                                        {{ $taluka->taluka }}
                                                    </option>
                                                @endforeach
                                                <option value="" selected disabled>Select Taluka
                                                </option>
                                            </select>
                                        </div>

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

                                        <div class="form-group">
                                            <select class="js-select2" name="bhk_filter" id="bhk_filter">
                                                <option value="" selected disabled>Select BHK</option>
                                                <option value="1">1 BHK</option>
                                                <option value="2">2 BHK</option>
                                                <option value="3">3 BHK</option>
                                                <option value="4">4 BHK</option>
                                                <option value="5">5 BHK</option>
                                                <option value="6">6 BHK</option>
                                                <option value="7">7 BHK</option>
                                            </select>
                                        </div>

                                        {{-- <div class="form-group">
                                            <select id="bathrooms" class="select-normal">
                                                <option value="0">Min Bathrooms</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <select id="garage" class="select-normal">
                                                <option value="0">Garage Choose</option>
                                                <option value="1">Any Type</option>
                                                <option value="2">Yes</option>
                                                <option value="3">No</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <select id="built" class="select-normal">
                                                <option value="0">Built Year</option>
                                                <option value="1">2010</option>
                                                <option value="2">2011</option>
                                                <option value="3">2012</option>
                                                <option value="4">2013</option>
                                                <option value="5">2014</option>
                                                <option value="6">2015</option>
                                                <option value="7">2016</option>
                                            </select>
                                        </div> --}}

                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <div class="simple-input">
                                                        <input type="text" class="form-control"
                                                            placeholder="Min Area">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <div class="simple-input">
                                                        <input type="text" class="form-control"
                                                            placeholder="Max Area">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 pt-4 pb-4">
                                                <h6>Choose Price</h6>
                                                <div class="rg-slider">
                                                    <input type="text" class="js-range-slider" name="my_range"
                                                        value="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 pt-4">
                                                <h6>Amenities</h6>
                                                <ul class="row p-0 m-0">
                                                    {{-- <li class="col-lg-6 col-md-6 p-0">
                                                        <div class="form-check form-check-inline">
                                                            <input id="ao-1" class="form-check-input"
                                                                name="ao-1" type="checkbox">
                                                            <label for="ao-1" class="form-check-label">Air
                                                                Condition</label>
                                                        </div>
                                                    </li>
                                                    <li class="col-lg-6 col-md-6 p-0">
                                                        <div class="form-check form-check-inline">
                                                            <input id="ao-2" class="form-check-input"
                                                                name="ao-2" type="checkbox">
                                                            <label for="ao-2"
                                                                class="form-check-label">Bedding</label>
                                                        </div>
                                                    </li>
                                                    <li class="col-lg-6 col-md-6 p-0">
                                                        <div class="form-check form-check-inline">
                                                            <input id="ao-3" class="form-check-input"
                                                                name="ao-3" type="checkbox">
                                                            <label for="ao-3"
                                                                class="form-check-label">Heating</label>
                                                        </div>
                                                    </li>
                                                    <li class="col-lg-6 col-md-6 p-0">
                                                        <div class="form-check form-check-inline">
                                                            <input id="ao-4" class="form-check-input"
                                                                name="ao-4" type="checkbox">
                                                            <label for="ao-4"
                                                                class="form-check-label">Internet</label>
                                                        </div>
                                                    </li>
                                                    <li class="col-lg-6 col-md-6 p-0">
                                                        <div class="form-check form-check-inline">
                                                            <input id="ao-5" class="form-check-input"
                                                                name="ao-5" type="checkbox">
                                                            <label for="ao-5"
                                                                class="form-check-label">Microwave</label>
                                                        </div>
                                                    </li>
                                                    <li class="col-lg-6 col-md-6 p-0">
                                                        <div class="form-check form-check-inline">
                                                            <input id="ao-6" class="form-check-input"
                                                                name="ao-6" type="checkbox">
                                                            <label for="ao-6" class="form-check-label">Smoking
                                                                Allow</label>
                                                        </div>
                                                    </li>
                                                    <li class="col-lg-6 col-md-6 p-0">
                                                        <div class="form-check form-check-inline">
                                                            <input id="ao-7" class="form-check-input"
                                                                name="ao-7" type="checkbox">
                                                            <label for="ao-7"
                                                                class="form-check-label">Terrace</label>
                                                        </div>
                                                    </li>
                                                    <li class="col-lg-6 col-md-6 p-0">
                                                        <div class="form-check form-check-inline">
                                                            <input id="ao-8" class="form-check-input"
                                                                name="ao-8" type="checkbox">
                                                            <label for="ao-8"
                                                                class="form-check-label">Balcony</label>
                                                        </div>
                                                    </li>
                                                    <li class="col-lg-6 col-md-6 p-0">
                                                        <div class="form-check form-check-inline">
                                                            <input id="ao-9" class="form-check-input"
                                                                name="ao-9" type="checkbox">
                                                            <label for="ao-9"
                                                                class="form-check-label">Icon</label>
                                                        </div>
                                                    </li> --}}
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 pt-4">
                                                <button class="btn btn-primary rounded full-width font--medium">Submit
                                                    Search</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- Sidebar End -->
                        </div>
                        <div class="col-xl-8 col-lg-12 col-md-12">
                            <div class="full-search-2 mt-2">
                                <div class="hero-search-content colored">
                                    <div class="row classic-search-box m-0 gx-2">
                                        <div class="col-xl-4 col-lg-3 col-md-12 col-sm-12">
                                            <div class="form-group briod">
                                                <div class="input-with-icon">
                                                    {{-- <select class="form-control" name="property_type_id"> --}}
                                                    <select class="js-select2" name="property_type_id"
                                                        id="property_type">
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
                                                    <i class="fa-solid fa-house-crack mb-3"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <div class="input-with-icon">
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
                                                    <i class="fa-solid fa-location-crosshairs mb-3"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
                                            <div class="form-group briod">
                                                <div class="input-with-icon">
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
                                                    <i class="fa-solid fa-house-crack mb-3"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-3 col-md-12 col-sm-12">
                                            <div class="fliox-search-wiop">
                                                {{-- <div class="form-group me-2">
                                                        <a href="JavaScript:Void(0);" data-bs-toggle="modal"
                                                            data-bs-target="#filter" class="btn btn-filter-search"><i
                                                                class="fa-solid fa-filter"></i>Reset FilterFilter</a>
                                                    </div> --}}
                                                <div class="form-group">
                                                    <a type="button" id="clearfilter"
                                                        class="btn btn-filter-search"><i
                                                            class="fa-solid fa-filter"></i>Clear</a>
                                                </div>
                                                {{-- <div class="form-group">
                                                        <a type="button" id="resetfilter" class="btn btn-primary"><i
                                                                class="fa-solid fa-filter"></i>Reset</a>
                                                    </div> --}}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!-- Start All List View -->
                            <table id="example" class="table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th></th>
                                    </tr>
                                </thead>
                            </table>
                            <!-- End All List View -->
                        </div>
                    </div>
                @endif

                <!-- Start Shorting -->
                {{-- <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="item-shorting-box mt-4 bg-white border rounded px-3 py-3 mb-5">
                            <div class="item-shorting clearfix">
                                <div class="left-column">
                                    <h4 class="m-0 text-dark font--medium">
                                        <span>{{ $resultSearch->count() }}</span> Results Found of {{ $count }}
                                    </h4>
                                </div>
                            </div>
                            <div class="item-shorting-box-right">
                                <div class="shorting-by">
                                    <select>
                                        <option value="0">Shorting By:</option>
                                        <option value="1">Low Price</option>
                                        <option value="2">High Price</option>
                                        <option value="3">Most Popular</option>
                                    </select>
                                </div>
                                <ul class="shorting-list">
                                    <li><a href="javascript:void(0);" onclick="divVisibility('cell');" class="border"><i
                                                class="fas fa-table-cells-large"></i></a></li>
                                    <li><a href="javascript:void(0);" onclick="divVisibility('list');" class="border"><i
                                                class="fas fa-list"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> --}}


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
                closeOnSelect: true
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
            var urlstring = "{{ route('propertyResultSearchList') }}";
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
                            '<option value="" selected disabled>-- Select Taluka --</option>'
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
