@section('setup')
    menu-open active
@endsection
@section('city')
    active
@endsection
@section('title')
    City | Add
@endsection
<!DOCTYPE html>
<html lang="en">

@include('admin.assets.link')

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
                    <h1>City</h1>
                    <small>Add New City</small>

                    <ol class="breadcrumb">
                        {{-- <li><a href="{{ route('index') }}"><i class="pe-7s-home"></i> Home</a></li>
                        <li class="active">Dashboard</li> --}}
                        <li class="breadcrumb-item">
                            <a href="{{ route('index') }}"><i class="pe-7s-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('city') }}">City List</a>
                        </li>
                        <li class="breadcrumb-item">Add New
                        </li>
                    </ol>
                </div>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-bd">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <h4>Add New State</h4>
                                </div>
                            </div>
                            <div class="panel-body">

                                <form action="{{ route('city_insert') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label class="control-label">Select State Name: <sup>*</sup>
                                        </label>
                                        <div>
                                            <select class="form-control" name="state_id" id="state_id" required>
                                                <option value="" selected disabled>Select
                                                    One
                                                </option>
                                                @foreach ($stateData as $state)
                                                    <option value="{{ $state->id }}">
                                                        {{ $state->state }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Enter City Name:
                                            <sup>*</sup></label>
                                        <div>
                                            <input name="city" type="text" class="form-control"
                                                placeholder="City Name" required>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="reset" class="btn btn-danger">Cancel</button>
                                    </div>
                                </form>
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
</body>

</html>
