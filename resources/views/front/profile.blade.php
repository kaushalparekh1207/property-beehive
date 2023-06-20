@section('home_page')
    active
@endsection
@section('profile')
    active
@endsection
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Property Beehive</title>
    @include('front.assets.links')

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
                                    <form id="editProfile" method="post" action="{{ route('editProfile') }}">
                                        <h4>My Account</h4>
                                        <div class="frm_submit_wrap">
                                            <div class="row">

                                                @csrf
                                                <div class="form-group col-md-6">
                                                    <label>Role</label>
                                                    <input type="hidden" value="{{ $userData->id }}" name="id"
                                                        id="id">
                                                    <select class="form-control js-select2" name="client_type_id"
                                                        id="client_type_id" disabled>
                                                        @foreach ($clientTypes as $clientType)
                                                            @php
                                                                $userData->client_type_id == $clientType->id ? ($selected = 'selected') : ($selected = '');
                                                            @endphp
                                                            <option value="{{ $clientType->id }}" {{ $selected }}>
                                                                {{ $clientType->client_type }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Your Name</label>
                                                    <input type="text" class="form-control" name="name"
                                                        value="{{ $userData->name }}" placeholder="Enter Your Name">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" name="email"
                                                        value="{{ $userData->email }}" placeholder="Enter Email">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Phone</label>
                                                    <input type="number" name="contact" class="form-control"
                                                        value="{{ $userData->contact }}">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label>State</label>
                                                    <select class="js-select2" name="state_id" id="state_id">
                                                        <option value="" selected disabled>Select State</option>
                                                        @foreach ($states as $state)
                                                            @php
                                                                if ($state->id == $userData->state_id) {
                                                                    $selected = 'selected';
                                                                } else {
                                                                    $selected = '';
                                                                }
                                                            @endphp
                                                            <option value="{{ $state->id }}" {{ $selected }}>
                                                                {{ $state->state }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label>City</label>
                                                    <select class="js-select2" name="city_id" id="city_id">
                                                        <option value="" selected disabled>Select City</option>
                                                        @foreach ($cities as $city)
                                                            @php
                                                                if ($city->id == $userData->city_id) {
                                                                    $selected = 'selected';
                                                                } else {
                                                                    $selected = '';
                                                                }
                                                            @endphp
                                                            <option value="{{ $city->id }}" {{ $selected }}>
                                                                {{ $city->city }}</option>
                                                        @endforeach
                                                        {{-- <select class="js-select2" name="city_id"
                                                        id="city_dropdown" required>
                                                        <option value="" selected disabled>Select
                                                            City
                                                        </option> --}}

                                                    </select>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label>Zip</label>
                                                    <input type="text" class="form-control" name="zip"
                                                        value="{{ $userData->zip }}" placeholder="Enter Zip Code">
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <label>Address</label>
                                                    <textarea class="form-control" name="address" placeholder="Describe Here...">{{ $userData->address }}</textarea>
                                                </div>

                                                <div class="form-group col-lg-12 col-md-12 mt-4">
                                                    <button class="btn btn-theme btn-lg" type="submit"
                                                        style="background-color: #017efa; border: none;">Save
                                                        Changes</button>
                                                    <button class="btn btn-theme btn-lg" type="reset"
                                                        style="background-color: #dc3545; border: none;">Cancel</button>
                                                </div>


                                            </div>

                                        </div>
                                    </form>
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



            /*------------------------------------------
            --------------------------------------------
            State Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#state_id').on('change', function() {
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
