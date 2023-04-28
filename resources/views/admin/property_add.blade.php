@section('admin_user')
    active
@endsection
<!DOCTYPE html>
<html lang="en">

@include('admin.assets.link')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
<!--Summernote css-->
<link href="{{ url('/') }}/admin/assets/plugins/summernote/summernote.css" rel="stylesheet" type="text/css" />


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
                    <h1>Admin Users</h1>
                    <small>Add New Admin User</small>
                    <ol class="breadcrumb">
                        <li><a href="index.html"><i class="pe-7s-home"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-bd">

                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <form method="post" class="f1">
                                            {{-- <h3 class="m-t-0">Register To Our App</h3>
                                            <p>Fill in the form to get instant access</p> --}}
                                            <div class="f1-steps">
                                                <div class="f1-progress">
                                                    <div class="f1-progress-line" data-now-value="16.66"
                                                        data-number-of-steps="3" style="width: 16.66%;"></div>
                                                </div>
                                                <div class="f1-step ">
                                                    <div class="f1-step-icon"><i class="fa fa-user"></i></div>
                                                    <p>Basic Information</p>
                                                </div>
                                                <div class="f1-step active">
                                                    <div class="f1-step-icon"><i class="fa fa-key"></i></div>
                                                    <p>Property Information</p>
                                                </div>
                                                <div class="f1-step">
                                                    <div class="f1-step-icon"><i class="fa fa-twitter"></i></div>
                                                    <p>Photos</p>
                                                </div>
                                            </div>
                                            <fieldset>
                                                <label class="" for="">Select Property: </label>
                                                <div class="form-group">
                                                    <select class="form-control" name="property" id="property"
                                                        required>
                                                        <option value="" selected disabled>Select
                                                            One
                                                        </option>
                                                        <option value="1">
                                                            Aggriculture (Land)
                                                            Property</option>
                                                        <option value="2">Non
                                                            Aggriculture Property
                                                        </option>
                                                    </select>
                                                </div>
                                                <label class="" for="">Select Property Type: </label>
                                                <div class="form-group">
                                                    <select class="form-control" name="propertytype"
                                                        id="propertytype_dropdown" required>
                                                        <option value="" selected disabled>Select
                                                            One
                                                        </option>

                                                    </select>
                                                </div>

                                                <label class="" for="">Select State: </label>
                                                <div class="form-group">
                                                    <select class="form-control" name="state" id="state" required>
                                                        <option value="" selected disabled>Select
                                                            One
                                                        </option>
                                                        @foreach ($states as $state)
                                                            <option value="{{ $state->id }}">
                                                                {{ $state->state }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </div>

                                                <label class="" for="">Select City: </label>
                                                <div class="form-group">
                                                    <select class="form-control" name="city" id="city" required>
                                                        <option value="" selected disabled>Select
                                                            One
                                                        </option>
                                                        @foreach ($cities as $city)
                                                            <option value="{{ $city->id }}">
                                                                {{ $city->city }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </div>

                                                <div class="f1-buttons">
                                                    <button type="button"
                                                        class="btn btn-success btn-next">Next</button>
                                                </div>
                                            </fieldset>
                                            <fieldset>

                                                <label for="">Name of Project: </label>
                                                <div class="form-group">
                                                    <label class="sr-only" for="f1-email">Name of
                                                        Project/Property: </label>
                                                    <input type="text" name="name_of_project"
                                                        placeholder="Name of Project/Title" class="form-control"
                                                        id="name_of_project">
                                                </div>

                                                <label for="">Select Amenities: </label>
                                                <div class="form-group">
                                                    <select class="form-control" name="amenities" id="amenities"
                                                        required>
                                                        <option value="" selected disabled>Select
                                                            One
                                                        </option>
                                                        @foreach ($amenities as $amenity)
                                                            <option value="{{ $amenity->id }}">
                                                                {{ $amenity->amenities }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                                <label class="" for="">Description:</label>
                                                <div class="form-group">
                                                    <textarea type="text" class="form-control" name="descr" id="summernote" rows="5"></textarea>
                                                </div>

                                                <label class="" for="">Address: </label>
                                                <div class="form-group">
                                                    <textarea id="address" placeholder="Describe Here..." rows="5" name="address" type="text"
                                                        class="form-control"></textarea>
                                                </div>


                                                <label class="" for="">Locality: </label>
                                                <div class="form-group">
                                                    <input type="text" name="locality" id="locality"
                                                        class="form-control" placeholder="Locality">
                                                </div>

                                                <div class="checkbox checkbox-primary">
                                                    <input id="checkbox2" type="checkbox" checked="">
                                                    <label for="checkbox2">Primary</label>
                                                </div>


                                                <div class="f1-buttons">
                                                    <button type="button" class="btn btn-previous">Previous</button>
                                                    <button type="button"
                                                        class="btn btn-success btn-next">Next</button>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <h4>Social media profiles:</h4>
                                                <div class="form-group">
                                                    <label class="sr-only" for="f1-facebook">Facebook</label>
                                                    <input type="text" name="f1-facebook"
                                                        placeholder="Facebook..." class="form-control"
                                                        id="f1-facebook">
                                                </div>
                                                <div class="form-group">
                                                    <label class="sr-only" for="f1-twitter">Twitter</label>
                                                    <input type="text" name="f1-twitter" placeholder="Twitter..."
                                                        class="form-control" id="f1-twitter">
                                                </div>
                                                <div class="form-group">
                                                    <label class="sr-only" for="f1-google-plus">Google plus</label>
                                                    <input type="text" name="f1-google-plus"
                                                        placeholder="Google plus..." class="form-control"
                                                        id="f1-google-plus">
                                                </div>
                                                <div class="f1-buttons">
                                                    <button type="button" class="btn btn-previous">Previous</button>
                                                    <button type="submit"
                                                        class="btn btn-success btn-submit">Submit</button>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <!-- summernote js -->
    <script src="{{ url('/') }}/admin/assets/plugins/summernote/summernote.js" type="text/javascript"></script>
    <script>
        $('#summernote').summernote({
            height: 200, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: true // set focus to editable area after initializing summernote
        });
    </script>
    <script>
        $('#property').on('change', function() {
            var property_id = $(this).val();

            $("#propertytype_dropdown").html('');
            $.ajax({
                url: "{{ route('get-property-list') }}",
                type: "GET",
                data: {
                    property_id: property_id,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#propertytype_dropdown').html(
                        '<option value="" selected disabled>-- Select Property Type --</option>'
                    );
                    $.each(result.property_type, function(key, value) {
                        if (property_id == 1) {
                            $("#propertytype_dropdown").append(
                                '<option value="' +
                                value
                                .id + '">' + value.a_property_name +
                                '</option>');
                        } else {
                            $("#propertytype_dropdown").append(
                                '<option value="' +
                                value
                                .id + '">' + value.na_property_type +
                                '</option>');
                        }

                    });
                }
            });
        });
    </script>
</body>

</html>
