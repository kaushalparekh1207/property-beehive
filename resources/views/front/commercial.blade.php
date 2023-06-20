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
    <script></script>
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


        <!-- ============================ Hero Banner  Start================================== -->
        <div class="image-cover hero-header"
            style="background:url({{ url('/') }}/front/assets/img/brand/commercial.jpg) no-repeat;"
            data-overlay="6">
            <div class="container">

                <div class="inner-banner-text text-center">
                    <h1>Commercial Properties</h1>

                </div>

                <div class="full-search-2 mt-5">
                    <form id="property_result" action="{{ route('searchCommercialProperty') }}" method="post">
                        @csrf
                        <div class="btn-group-horizontal " role="group"
                            aria-label="horizontal radio toggle button group" style="margin-left: 100px;">
                            <input type="radio" class="btn-check" name="sale" value="Sale" id="vbtn-radio1"
                                autocomplete="off">

                            <label class="btn" for="vbtn-radio1"><a style="color: #fff;"
                                    href="{{ url('/') }}/buy">Buy</a></label>
                            <input type="radio" class="btn-check" name="vbtn-radio" value="Rent/Lease"
                                id="vbtn-radio2" autocomplete="off">
                            <label class="btn" for="vbtn-radio2"><a style="color: #fff;"
                                    href="{{ url('/') }}/rent">Rent</a></label>
                            <input type="radio" class="btn-check" name="vbtn-radio" id="vbtn-radio3"
                                autocomplete="off">
                            <label class="btn" for="vbtn-radio3"><a style="color: #fff;"
                                    href="{{ url('/') }}/pg">PG</a></label>
                            <input type="radio" class="btn-check" name="vbtn-radio" id="vbtn-radio4"
                                autocomplete="off">
                            <label class="btn" for="vbtn-radio4"><a style="color: #fff;"
                                    href="{{ url('/') }}/land">Land</a></label>
                            <input type="radio" class="btn-check" name="vbtn-radio" id="vbtn-radio5"
                                autocomplete="off" checked>
                            <label class="btn" for="vbtn-radio5"><a style="color: #fff;"
                                    href="{{ url('/') }}/commercial">Commercial</a></label>
                        </div>
                        <div class="hero-search-content colored">
                            <div class="row classic-search-box m-0 gx-2">
                                <div class="col-xl-2 col-lg-3 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <select class="js-select2" name="city_id" id="city_id_dropdown">
                                                <option value="" selected disabled>Select City</option>
                                                @foreach ($city as $cities)
                                                    <option value="{{ $cities->id }}">{{ $cities->city }}</option>
                                                @endforeach
                                            </select>
                                            <i class="fa-solid fa-location-crosshairs mb-2"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-3 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <select class="js-select2" name="taluka_id" id="taluka_id_dropdown">
                                                <option value="" selected disabled>Select City First</option>
                                            </select>
                                            <i class="fa-solid fa-location-crosshairs mb-2"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-3 col-md-12 col-sm-12">
                                    <div class="form-group briod">
                                        <div class="input-with-icon">
                                            {{-- <select class="form-control" name="property_type_id"> --}}
                                            <select class="js-select2" name="property_type_id" id="property_type">
                                                <option value="" selected disabled>Select Property types</option>
                                                @foreach ($propertyType as $type)
                                                    <option value="{{ $type->id }}">
                                                        {{ $type->property_type }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <i class="fa-solid fa-house-crack mb-2"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-3 col-md-12 col-sm-12">
                                    <div class="form-group briod">
                                        <div class="input-with-icon">
                                            {{-- <select class="form-control" name="property_type_id"> --}}
                                            <select class="js-select2" name="property_category_id"
                                                id="property_category_dropdown">
                                                <option value="" selected disabled>Select Property Type First
                                                </option>
                                            </select>
                                            <i class="fa-solid fa-house-crack mb-2"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-3 col-md-12 col-sm-12">
                                    <div class="form-group briod">
                                        <div class="input-with-icon">
                                            {{-- <select class="form-control" name="property_type_id"> --}}
                                            <select class="js-select2" name="property_type_id"
                                                id="property_type_dropdown">
                                                <option value="" selected disabled>Budget
                                                </option>
                                                {{-- @foreach ($propertyType as $type)
                                                    <option value="{{ $type->id }}">
                                                        {{ $type->property_type }}
                                                    </option>
                                                @endforeach --}}
                                            </select>
                                            <i class="fa-solid fa-house-crack mb-2"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-3 col-md-12 col-sm-12">
                                    <div class="fliox-search-wiop">
                                        <div class="form-group me-2">
                                            <a href="JavaScript:Void(0);" data-bs-toggle="modal"
                                                data-bs-target="#filter" class="btn btn-filter-search"><i
                                                    class="fa-solid fa-filter"></i>Filter</a>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary full-width">Search</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
        <!-- ============================ Hero Banner End ================================== -->

        <!-- ============================= Explore Categories =============================== -->
        <section>
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-lg-7 col-md-10 text-center">
                        <div class="sec-heading center">
                            <h2>Commercial Properties</h2>
                            {{-- <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                                voluptatum deleniti atque corrupti quos dolores</p> --}}
                        </div>
                    </div>
                </div>

                <div class="row justify-content gx-3 gy-4">

                    <!-- Single Property -->
                    @foreach ($properties as $property)
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                            <div class="veshm-list-wraps">
                                @if ($property->property_status == 'Sale')
                                    <div class="veshm-type fr-sale"><span>For {{ $property->property_status }}</span>
                                    </div>
                                @elseif($property->property_status == 'Rent/Lease')
                                    <div class="veshm-type"><span>For {{ $property->property_status }}</span></div>
                                @elseif($property->property_status == 'PG/Hostel')
                                    <div class="veshm-type fr-pg"><span>For {{ $property->property_status }}</span>
                                    </div>
                                @endif

                                <div class="veshm-list-thumb">

                                    <div class="veshm-list-img-slide">
                                        <div class="veshm-list-click">
                                            <div>
                                                @if ($property->cover_image == null)
                                                    <a
                                                        href="{{ route('propertydetails', [$property->id, $property->property_type_id, $property->name_of_project, $property->client_master_id]) }}"><img
                                                            src="{{ asset('storage/property/no-photo.png') }}"
                                                            class="img-fluid mx-auto" alt=""
                                                            style="width: 500px; height: 300px;"></a>
                                                @else
                                                    <a
                                                        href="{{ route('propertydetails', [$property->id, $property->property_type_id, $property->name_of_project, $property->client_master_id]) }}"><img
                                                            src="{{ asset('storage/property/banner_image/' . $property->cover_image) }}"
                                                            class="img-fluid mx-auto" alt=""
                                                            style="width: 500px; height: 300px;"></a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="veshm-list-block">
                                    <div class="veshm-list-head">
                                        <div class="veshm-list-head-caption">
                                            <div class="rlhc-price">
                                                <h4 class="rlhc-price-name theme-cl"> ₹@php
                                                    echo preg_replace('/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i', "$1,", $property->expected_price);
                                                @endphp
                                                </h4>
                                                @if ($property->property_status == 'Sale')
                                                    <span class="monthly">One Time</span>
                                                @elseif ($property->property_status == 'Rent/Lease')
                                                    <span class="monthly">/Months</span>
                                                @elseif ($property->property_status == 'PG/Hostel')
                                                    <span class="monthly">/Months</span>
                                                @endif
                                            </div>
                                            <div class="listing-short-detail-flex">
                                                <h5 class="rlhc-title-name verified"><a
                                                        href="{{ route('propertydetails', [$property->id, $property->property_type_id, $property->name_of_project, $property->client_master_id]) }}"
                                                        class="prt-link-detail">{{ $property->name_of_project }}</a>
                                                </h5>
                                            </div>
                                            <div class="veshm-list-icons">
                                                <ul>
                                                    <li><i class="fa-solid fa-bed"></i><span>{{ $property->total_bedrooms }}
                                                            Bed</span></li>
                                                    <li><i class="fa-solid fa-bath"></i><span>{{ $property->total_bathrooms }}
                                                            Ba</span></li>
                                                    <li><i class="fa-solid fa-vector-square"></i><span>{{ $property->carpet_area }}
                                                            sft</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        {{-- <div class="veshm-list-head-flex">
                                            <button class="btn btn-like active" type="button"><i
                                                    class="fa-solid fa-heart-circle-check"></i></button>
                                        </div> --}}
                                    </div>

                                    <div class="resi-prty-offers-box">

                                        <div class="prty-offers-btn text-center">

                                            <a href="{{ route('propertydetails', [$property->id, $property->property_type_id, $property->name_of_project, $property->client_master_id]) }}"
                                                class="btn btn-offer-send">View Details</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                    <!-- End Single Property -->
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
                closeOnSelect: true
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
            //  $('#city').hide();
            $('#city_id_dropdown').on('change', function() {
                var city = this.value;
                $("#taluka_id_dropdown").html('');
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
                        $('#taluka_id_dropdown').html(
                            '<option value="" selected disabled>-- Select Taluka --</option>'
                        );
                        $.each(result.taluka, function(key, value) {
                            $("#taluka_id_dropdown").append('<option value="' +
                                value
                                .id + '">' + value.taluka +
                                '</option>');
                        });
                        // $('#sd').show();
                    }
                });
            });
        });
    </script>

</body>

</html>
