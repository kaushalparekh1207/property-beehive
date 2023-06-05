
@section('setup')
    menu-is-opening menu-open
@endsection
@section('inquiry_listing')
    active
@endsection
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Amenities</title>

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
                            <h1 class="m-0">Inquiry Listing</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            {{-- <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                                <li class="breadcrumb-item">Amenities
                                </li>

                            </ol> --}}
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
                        <div class="card-body">
                            {{-- <a type="button" href="{{ route('amenities_add') }}" id=""
                                class="btn btn-success mb-3">+ Add New</a> --}}
                            <table id="AmenitiesList" class="table table-striped table-condensed">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Title</th>
                                        <th>Name</th>
                                        <th>contact</th>
                                        <th>email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @foreach ($inquiry_data as $propertymasters)
                                <tr><td>{{$propertymasters->id}}</td>
                                    <td> <a href=""> {{$propertymasters->inqury_type}}</a>
                                        
                                    </td>
                                    <td> <a href=""> {{$propertymasters->name}}</a>
                                        
                                       </td>
                                    <td>{{$propertymasters->contact}}</td>
                                    <td>{{$propertymasters->email}}</td>
                                    <td><div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                          Action
                                        </button>
                                        <div class="dropdown-menu">
                        
                                            <a href="" class="dropdown-item" style="--hover-color: green" type="button">Approved</a>
                                            <a href="" class="dropdown-item" style="--hover-color: green" type="button">Rejected</a>
                                        </div>
                                     
                                      </div></td>

                                </tr>
                                @endforeach
                               
                                <tfoot>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Title</th>
                                        <th>Name</th>
                                        <th>contact</th>
                                        <th>email</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
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
  
    
</body>

</html>
