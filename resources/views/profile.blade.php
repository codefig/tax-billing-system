<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Driver Record </title>

    <link href="{{URL::to('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="{{URL::to('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="{{URL::to("css/sb-admin.css")}}" rel="stylesheet">

    <!-- Page level plugin CSS-->
    <link href="{{URL::to('vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="index.html">Start Bootstrap</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <span class="badge badge-danger">9+</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <span class="badge badge-danger">7</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="#">Activity Log</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('user.home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>


      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{route('user.home')}}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Found Driver Record</li>
          </ol>

          <!-- Page Content -->
          <h1>Driver</h1>
          <hr>
          <p>Please all fields are required</p>

          @if(count($user) > 0)
             <img src="{{URL::to($user->photograph)}}" alt="..." class="img-thumbnail" style="height:200px;width:200px;">

          <form method="post" enctype="multipart/form-data" action="{{ route('user.profile.post') }}">
            <div class="form-group">
                <label>Passport Image</label>
                <input type="file" accept="image/*" enctype="multipart/form-data" name="photograph" id="photograph" class="form-control">
            </div>

            <div class="form-group">
                <label>Car Owner Name</label>
                <input type="text" class="form-control" id="owners_name" name="owners_name" value="{{$user->owners_name}}">
            </div>

            <div class="form-group">
              <label>Driver Name </label>
              <input type="text" class="form-control" id="drivers_name" name="drivers_name" value="{{$user->drivers_name}}">
            </div>

            <div class="form-group">
                <label>Engine Number</label>
              <input type="text" class="form-control" id="engine_no" name="engine_no" value="{{$user->engine_no}}">
            </div>

            <div class="form-group">
              <label>Plate Number</label>
              <input type="text" class="form-control" id="plate_no" name="plate_no" value="{{$user->plate_no}}">
            </div>

            <div class="form-group">
                <label>Chassis Number</label>
                <input type="text" class="form-control" id="chassis_no" name="chassis_no" value="{{$user->chassis_no}}">
            </div>

            <div class="form-group">
                <label>Licence Number</label>
              <input type="text" class="form-control" id="licence_no" name="licence_no" value="{{$user->licence_no}}">
            </div>

            <div class="form-group">
              <label>Car description</label>
              <input type="text" class="form-control" name="car_description" id='car_description' value="{{$user->car_description}}">
            </div>

            <div class="form-group">
                <label>Mobile Number</label>
              <input type="text" class="form-control" id="mobile_no" name="mobile_no" value="{{$user->mobile_no}}">
            </div>

            <div class="form-group">
                <label>Nationality</label>
              <input type="text" class="form-control" id="nationality" name="nationality" value="{{$user->nationality}}">
            </div>

            <div class="form-group">
                <label>State</label>
              <input type="text" class='form-control' id="state" name="state" value="{{$user->state}}">
            </div>

            <div class="form-group">
              <label>Local Government Area</label>
              <input type="text" class="form-control" id="lga" name="lga" value="{{$user->lga}}">
            </div>

            <input type="hidden" name="_id" value="{{$user->id}}">
          @endif
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Update Record</button>
              <input type="hidden" name="_token" value="{{Session::token()}}"
            </div>

        </form>

        @if (count($errors) > 0)
          <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif


          @if(Session::has('success_message'))
          <div class='alert alert-success'>
              <span> {{ Session::get('success_message') }}</span>
          </div>
          @endif

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Your Website 2018</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{URL::to('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{URL::to('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{URL::to('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <script src="{{URL::to('js/sb-admin.min.js')}}"></script>

  </body>

</html>
