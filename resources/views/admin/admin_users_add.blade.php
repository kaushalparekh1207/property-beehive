@section('admin_users')
    active
@endsection
@section('title')
    Admin User | Add
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
                                        <i class="fa fa-user-plus bg-c-blue"></i>
                                        <div class="d-inline">
                                            <h5>Admin Users</h5>
                                            <span>Add New Admin User</span>
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
                                                                <label class="col-sm-2 col-form-label">Select
                                                                    Role: <sup>*</sup></label>
                                                                <div class="col-sm-10">
                                                                    <select name="select" class="form-control">
                                                                        <option value="" selected disabled>Select
                                                                            One
                                                                        </option>
                                                                        @foreach ($roles as $role)
                                                                            <option value="{{ $role->id }}">
                                                                                {{ $role->role_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">
                                                                    Name: <sup>*</sup></label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        name='user_name' placeholder="Enter Name">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">
                                                                    Email: <sup>*</sup></label>
                                                                <div class="col-sm-10">
                                                                    <input type="email" class="form-control"
                                                                        name='email'
                                                                        placeholder="Enter Email Address">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">
                                                                    Contact Number: <sup>*</sup></label>
                                                                <div class="col-sm-10">
                                                                    <input type="number" class="form-control"
                                                                        name="contact_number"
                                                                        placeholder="Enter Contact Number">
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <center>
                                                                <button type="submit"
                                                                    class="btn btn-success">Submit</button>
                                                                <button type="reset"
                                                                    class="btn btn-danger">Cancel</button>
                                                            </center>

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
