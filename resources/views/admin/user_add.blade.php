@section('users')
    active pcoded-trigger
@endsection
@section('users_add')
    active
@endsection
@section('title')
    User | Add
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
                                            <h5>Users</h5>
                                            <span>Add New User</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="page-header-breadcrumb">
                                        <ul class=" breadcrumb breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="{{ route('index') }}"><i class="feather icon-home"></i></a>
                                            </li>
                                            {{-- <li class="breadcrumb-item"><a
                                                    href="{{ route('user_type') }}">User Type List</a>
                                            </li> --}}
                                            <li class="breadcrumb-item">Add New User
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
                                                        <form action="{{ route('users_insert') }}"
                                                            method="POST">
                                                            @csrf
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Select User
                                                                    Type: <sup>*</sup>
                                                                </label>
                                                                <div class="col-sm-10">
                                                                    <select class="js-example-basic-single col-sm-12"
                                                                        name="user_type" required>
                                                                        <option value="" selected disabled>Select
                                                                            One
                                                                        </option>
                                                                        @foreach ($userType as $type)
                                                                            <option value="{{ $type->id }}">
                                                                                {{ $type->user_type }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Enter User Name: <sup>*</sup></label>
                                                                <div class="col-sm-10">
                                                                    <input name="user_name" type="text"
                                                                        class="form-control"
                                                                        placeholder="Enter User Name" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Enter User contact Number: <sup>*</sup></label>
                                                                <div class="col-sm-10">
                                                                    <input name="contact" type="number"
                                                                        class="form-control"
                                                                        placeholder="Enter User contact Number" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Enter User Email Id: <sup>*</sup></label>
                                                                <div class="col-sm-10">
                                                                    <input name="email" type="email"
                                                                        class="form-control"
                                                                        placeholder="Enter User Email Id">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Enter User Password: <sup>*</sup></label>
                                                                <div class="col-sm-10">
                                                                    <input name="password" type="password"
                                                                        class="form-control"
                                                                        placeholder="Enter User Password" required>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <center><button type="submit"
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

