@section('property_master')
    menu-is-opening menu-open
@endsection
@section('properties_add')
    active
@endsection
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Property | Add</title>

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
                            <h1 class="m-0">Add New Admin User</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin_users') }}">Admin User List</a>
                                </li>
                                <li class="breadcrumb-item active">Add New Admin User</li>
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
                        <form class="form-horizontal" method="POST" action="{{ route('property_master_insert') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body p-0">
                                <div class="bs-stepper">
                                    <div class="bs-stepper-header" role="tablist">
                                        <!-- your steps here -->
                                        <div class="step" data-target="#basics-part">
                                            <button type="button" class="step-trigger" role="tab"
                                                aria-controls="logins-part" id="basic-part-trigger">
                                                <span class="bs-stepper-circle">1</span>
                                                <span class="bs-stepper-label">Basic Information</span>
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#information-part">
                                            <button type="button" class="step-trigger" role="tab"
                                                aria-controls="information-part" id="information-part-trigger">
                                                <span class="bs-stepper-circle">2</span>
                                                <span class="bs-stepper-label">Property information</span>
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#photos-part">
                                            <button type="button" class="step-trigger" role="tab"
                                                aria-controls="photos-part" id="photos-part-trigger">
                                                <span class="bs-stepper-circle">3</span>
                                                <span class="bs-stepper-label">Photos</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="bs-stepper-content">
                                        <!-- your steps content here -->
                                        <div id="basics-part" class="content" role="tabpanel"
                                            aria-labelledby="basic-part-trigger">
                                            <hr><br>

                                            <div class="form-group row">
                                                <label for="" class="col-sm-3 col-form-label">Property Purpose:
                                                    <sup>*</sup></label>
                                                <div class="custom-control custom-radio col-sm-3">
                                                    <input class="custom-control-input custom-control-input-danger"
                                                        type="radio" id="customRadio4" name="customRadio2">
                                                    <label for="customRadio4" class="custom-control-label">Sell</label>
                                                </div>
                                                <div class="custom-control custom-radio col-sm-3">
                                                    <input class="custom-control-input custom-control-input-danger"
                                                        type="radio" id="customRadio5" name="customRadio2">
                                                    <label for="customRadio5"
                                                        class="custom-control-label">Rent/Lease</label>
                                                </div>
                                                <div class="custom-control custom-radio col-sm-3">
                                                    <input class="custom-control-input custom-control-input-danger"
                                                        type="radio" id="customRadio6" name="customRadio2">
                                                    <label for="customRadio6"
                                                        class="custom-control-label">PG/Hostel</label>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="" class="col-sm-2 col-form-label">Select Property
                                                    Type:
                                                    <sup>*</sup></label>
                                                <div class="col-sm-10">
                                                    <select class="form-control select2" name="property_type"
                                                        id="property_type" required style="width: 100%;">
                                                        <option value="" selected disabled>Select
                                                            Property Type
                                                        </option>
                                                        @foreach ($propertyTypes as $propertyType)
                                                            <option value="{{ $propertyType->id }}">
                                                                {{ $propertyType->property_type }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="" class="col-sm-2 col-form-label">Select Property
                                                    Category:
                                                    <sup>*</sup></label>
                                                <div class="col-sm-10">
                                                    <select class="form-control select3" name="property_category"
                                                        id="property_category_dropdown" required style="width: 100%;">
                                                        <option value="" selected disabled>Select
                                                            Property Category
                                                        </option>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="" class="col-sm-2 col-form-label">Select State:
                                                    <sup>*</sup></label>
                                                <div class="col-sm-10">
                                                    <select class="form-control select4" name="state"
                                                        id="state" required style="width: 100%;">
                                                        <option value="" selected disabled>Select
                                                            State
                                                        </option>
                                                        @foreach ($states as $state)
                                                            <option value="{{ $state->id }}">
                                                                {{ $state->state }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row city">
                                                <label for="" class="col-sm-2 col-form-label">Select City:
                                                    <sup>*</sup></label>
                                                <div class="col-sm-10">
                                                    <select class="form-control select5" name="city"
                                                        id="city_dropdown" required style="width: 100%;">
                                                        <option value="" selected disabled>Select
                                                            City
                                                        </option>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="" class="col-sm-2 col-form-label">Locality:
                                                    <sup>*</sup></label>
                                                <div class="col-sm-10">
                                                    <input id="locality" placeholder="Enter Locality Here"
                                                        type="text" class="form-control" name="locality"></input>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="" class="col-sm-2 col-form-label">Address:
                                                    <sup>*</sup></label>
                                                <div class="col-sm-10">
                                                    <textarea id="address" placeholder="Describe Here" rows="5" type="text" class="form-control"
                                                        name="address"></textarea>
                                                </div>
                                            </div>

                                            <button type="button" class="btn btn-primary float-right"
                                                onclick="stepper.next()">Next Step</button><br><br>
                                        </div>
                                        <div id="information-part" class="content" role="tabpanel"
                                            aria-labelledby="information-part-trigger">

                                            <hr>
                                            <div class="form-group row">
                                                <label for="" class="col-sm-2 col-form-label">Name of
                                                    Project/Property:
                                                    <sup>*</sup></label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="name_of_project"
                                                        placeholder="Name of Project/Property" class="form-control"
                                                        id="name_of_project">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="" class="col-sm-2 col-form-label">Select
                                                    Amenities:
                                                    <sup>*</sup></label>
                                                <div class="col-sm-10">
                                                    <select class="form-control select6" name="amenities[]"
                                                        id="amenities" required style="width: 100%;" multiple>
                                                        <option value="" disabled>Select
                                                            One
                                                        </option>
                                                        @foreach ($amenities as $amenity)
                                                            <option value="{{ $amenity->id }}">
                                                                {{ $amenity->amenities }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="" class="col-sm-2 col-form-label">Description:
                                                    <sup>*</sup></label>
                                                <div class="col-sm-10">
                                                    <textarea id="summernote" type="text" class="form-control" name="descr">Describe Here</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="" class="col-sm-2 col-form-label">Select BHK:
                                                    <sup>*</sup></label>
                                                <div class="col-sm-10">
                                                    <select class="form-control select7" name="bhk_details[]"
                                                        id="bhk_details" style="width: 100%;" required multiple>
                                                        <option value="" disabled>Select
                                                            One
                                                        </option>
                                                        <option value="1">1 BHK</option>
                                                        <option value="2">2 BHK</option>
                                                        <option value="3">3 BHK</option>
                                                        <option value="4">4 BHK</option>
                                                        <option value="5">5 BHK</option>
                                                        <option value="6">6 BHK</option>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="" class="col-sm-2 col-form-label">Total Floor:
                                                    <sup>*</sup></label>
                                                <div class="col-sm-10">
                                                    <input id="total_floor" placeholder="Enter Total Number of Floors"
                                                        type="number" class="form-control"
                                                        name="total_floor"></input>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="" class="col-sm-2 col-form-label">Furnished
                                                    Status:
                                                    <sup>*</sup></label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="furnished_status"
                                                        id="furnished_status" style="width: 100%;" required>
                                                        <option value="" selected disabled>Select
                                                            One
                                                        </option>
                                                        <option value="Fully Furnished">Fully Furnished</option>
                                                        <option value="Unfurnished">Unfurnished</option>
                                                        <option value="Semi Furnished">Semi Furnished</option>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="" class="col-sm-2 col-form-label">Possession
                                                    Status:
                                                    <sup>*</sup></label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="possession_status"
                                                        id="possession_status" style="width: 100%;" required>
                                                        <option value="" selected disabled>Select
                                                            One
                                                        </option>
                                                        <option value="Under Construction">Under Construction</option>
                                                        <option value="Ready to Move">Ready to Move</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row time_duration" style="display: none;">
                                                <label for="" class="col-sm-2 col-form-label">Available From:
                                                    <sup>*</sup></label>
                                                <div class="col-sm-10">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="far fa-calendar-alt"></i></span>
                                                        </div>
                                                        <input type="text" id="datemask" name="time_duration"
                                                            class="form-control" data-inputmask-alias="datetime"
                                                            data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row property_age" style="display: none;">
                                                <label for="" class="col-sm-2 col-form-label">Property Age:
                                                    <sup>*</sup></label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="property_age" id="property_age"
                                                        class="form-control" placeholder="Enter Property Age">
                                                </div>
                                            </div>

                                            <div class="form-group row only_for_commercial">
                                                <label for="" class="col-sm-2 col-form-label">Maintenance:
                                                    <sup>*</sup></label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="maintenance" id="maintenance"
                                                        class="form-control" placeholder="Enter Maintenance">
                                                </div>
                                            </div>

                                            <div class="form-group row only_for_commercial">
                                                <label for="" class="col-sm-2 col-form-label">Monthly Charges:
                                                    <sup>*</sup></label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="monthly_charges" id="monthly_charges"
                                                        class="form-control" placeholder="Enter Monthly Charges">
                                                </div>
                                            </div>

                                            <button type="button" class="btn btn-primary"
                                                onclick="stepper.previous()">Previous Step</button>
                                            <button type="button" class="btn btn-primary float-right"
                                                onclick="stepper.next()">Next Step</button>

                                        </div>
                                        <div id="photos-part" class="content" role="tabpanel"
                                            aria-labelledby="photos-part-trigger">

                                            <div class="form-group row">
                                                <label for="" class="col-sm-2 col-form-label">Khata
                                                    Certificate:
                                                    <sup>*</sup></label>
                                                <div class="col-sm-10">
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input"
                                                                id="" name="khata_certificate">
                                                            <label class="custom-file-label"
                                                                for="exampleInputFile">Choose
                                                                file</label>
                                                        </div>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">Upload</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="" class="col-sm-2 col-form-label">Rera
                                                    Certificate:
                                                    <sup>*</sup></label>
                                                <div class="col-sm-10">
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input"
                                                                id="" name="rera_certificate">
                                                            <label class="custom-file-label"
                                                                for="exampleInputFile">Choose
                                                                file</label>
                                                        </div>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">Upload</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="" class="col-sm-2 col-form-label">Property
                                                    Exterior View Image:
                                                    <sup>*</sup></label>
                                                <div class="col-sm-10">
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input"
                                                                id="" name="property_exterior_view_image[]"
                                                                multiple>
                                                            <label class="custom-file-label"
                                                                for="exampleInputFile">Choose
                                                                file</label>
                                                        </div>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">Upload</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="" class="col-sm-2 col-form-label">Property
                                                    Floor Plan Image:
                                                    <sup>*</sup></label>
                                                <div class="col-sm-10">
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input"
                                                                id="" name="property_floor_plan_image[]"
                                                                multiple>
                                                            <label class="custom-file-label"
                                                                for="exampleInputFile">Choose
                                                                file</label>
                                                        </div>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">Upload</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="" class="col-sm-2 col-form-label">Other Property
                                                    Image:
                                                    <sup>*</sup></label>
                                                <div class="col-sm-10">
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input"
                                                                id="" name="property_other_image[]" multiple>
                                                            <label class="custom-file-label"
                                                                for="exampleInputFile">Choose
                                                                file</label>
                                                        </div>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">Upload</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <button type="button" class="btn btn-primary"
                                                onclick="stepper.previous()">Previous Step</button>
                                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


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
            $('.select3').select2();
            $('.select4').select2();
            $('.select5').select2();
            $('.select6').select2({
                placeholder: "Select a Amenities",
                allowClear: true
            });
            $('.select7').select2({
                placeholder: "Select a BHK",
                allowClear: true
            });

            bsCustomFileInput.init();

            // Initialize Summernote
            $('#summernote').summernote({
                height: 200,
                minHeight: null,
                maxHeight: null,
                focus: true
            });

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {
                'placeholder': 'dd/mm/yyyy'
            });

            $('#possession_status').on('change', function() {
                var possession_status = $(this).val();
                if (possession_status == 'Under Construction') {
                    $('.time_duration').show();
                    $('.property_age').hide();
                } else {
                    $('.time_duration').hide();
                    $('.property_age').show();
                }
            });
        });

        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function() {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })
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
            $('#city').hide();

            /*------------------------------------------
            --------------------------------------------
            State Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#state').on('change', function() {
                var state = this.value;
                $("#city_dropdown").html('');
                $.ajax({
                    url: "{{ route('get-city-list') }}",
                    type: "GET",
                    data: {
                        state: state,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#city').show();
                        $('#city_dropdown').html(
                            '<option value="" selected disabled>-- Select City --</option>'
                        );
                        $.each(result.city, function(key, value) {
                            $("#city_dropdown").append('<option value="' +
                                value
                                .id + '">' + value.city +
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
