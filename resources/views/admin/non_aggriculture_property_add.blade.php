@section('Property')
active pcoded-trigger
@endsection
@section('na_property')
    active
@endsection
@section('title')
Non Aggriculture Property | Add
@endsection
<!DOCTYPE html>
<html lang="en">

@include('admin.assets.css')
<style>
    sup {
        color: red;
    }
</style>

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
                                            <h5>Add Non Aggriculture Property</h5>
                                            <span>Add New Non Aggriculture Property</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="page-header-breadcrumb">
                                        <ul class=" breadcrumb breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="{{ route('index') }}"><i class="feather icon-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item"><a
                                                    href="{{ route('non_aggriculture_property') }}">Non Aggriculture
                                                    Property</a>
                                            </li>
                                            <li class="breadcrumb-item">Add New
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
                                                        <form action="{{ route('non_aggriculture_property_insert') }}"
                                                            method="POST">
                                                            @csrf
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Select Property
                                                                    Type: <sup>*</sup>
                                                                </label>
                                                                <div class="col-sm-10">
                                                                    <select class="js-example-basic-single col-sm-12" name = "propertytype">
                                                                        <option value="" selected disabled>Select
                                                                            One
                                                                        </option>
                                                                        @foreach ($nonpropertyData as $property)
                                                                            <option value="{{ $property->id }}">
                                                                                {{ $property->property_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Select Non Aggriculture Property
                                                                    Type: <sup>*</sup>
                                                                </label>
                                                                <div class="col-sm-10">
                                                                    <select class="js-example-basic-single col-sm-12" name="na_property_type">
                                                                        <option value="" selected disabled>Select
                                                                            One
                                                                        </option>
                                                                        <option value="Residential" >Residential</option>
                                                                        <option value="Commercial" >Commercial</option>
                                                                        <option value="Industrial">Industrial</option>
                                                                        <option value="Multi Purpose" >Multi Purpose</option>
                                                                        
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Enter Property
                                                                    Name: <sup>*</sup></label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" name = 'nonaggriculture'
                                                                        placeholder="Non Aggriculture Property Name">
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <button type="submit"
                                                                class="btn btn-success">Submit</button>
                                                            <button type="reset"
                                                                class="btn btn-danger">Cancel</button>

                                                        </form>
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

</body>

</html>
