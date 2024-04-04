@extends('layout.headerdash')

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>

  .container th, td {
    border-bottom: 1px solid black;
    padding: 15px;
  }
  .container td {
    border-bottom: 1px solid black;
  }
  table {
    width: 100%;
    margin-top: 10px;
  }

</style>
</head>

<body>          

@section('main-section')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Employee Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li> -->
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                <div class="filter">
            
                </div>

                <div class="card-body">
                  <h5 class="card-title">Yearly Leaves</h5>

                  <div class="d-flex align-items-center">
                 
                    <div class="ps-3">
                      <h6>{{Auth::user()->leave->yearly}}</h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

      
            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                <div class="filter">
            
                </div>

                <div class="card-body">
                  <h5 class="card-title">Monthly Leave</h5>

                  <div class="d-flex align-items-center">
                 
                    <div class="ps-3">
                      <h6>{{Auth::user()->leave->monthly}}</h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

       
            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                <div class="filter">
            
                </div>

                <div class="card-body">
                  <h5 class="card-title">Pending Leave</h5>

                  <div class="d-flex align-items-center">
                 
                    <div class="ps-3">
                      <h6>{{Auth::user()->leave->pending}}</h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <button type="submit" value="submit" class="btn btn-primary">Submit</button>
            <div class="container mt-3">

 
  
  <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
    Edit Profile
  </button> -->
</div>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Profile</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="{{url('/')}}/empupdate" method="post">
          @csrf
          <div class="form-group">
            <label for="name">Name :</label>
            <input type="text" name="name" id="name" class="form-control" value="{{Auth::user()->name}}">
          </div>
          <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" class="form-control" value="{{Auth::user()->email}}">
          </div>
          <div class="form-group">
            <label for="password">Password :</label>
            <input type="password" name="password" id="password" class="form-control" value="{{Auth::user()->password}}">
          </div>
          <div class="form-group">
            <label for="role">Role :</label>
            <select id="role" name="role" class="form-control">
              @if(Auth::user()->role == 'admin')
              <option value="admin" {{ Auth::user()->role == 'admin' ? 'selected' : '' }}>admin</option>
              @endif
              <option value="user" {{ Auth::user()->role == 'user' ? 'selected' : '' }}>user</option>
            </select>
          </div>
          <div class="form-group">
            <label for="gender">Gender :</label>
            <input type="radio" name="gender" id="gender" value="male" {{ Auth::user()->details->gender == 'male' ? 'checked' : '' }}>male
            <input type="radio" name="gender" id="gender" value="female" {{ Auth::user()->details->gender == 'female' ? 'checked' : '' }}>female
          </div>
          <div class="form-group">
            <label for="dob">DOB :</label>
            <input type="date" name="dob" id="dob" class="form-control" value="{{Auth::user()->details->dob}}">
          </div>
          <div class="form-group">
            <label for="address">Address :</label>
            <textarea id="address" name="address" rows="4" cols="50" class="form-control">{{Auth::user()->details->address}}</textarea>
          </div><br>
          <button type="submit" name="empupdate" value="{{Auth::user()->id}}" class="btn btn-primary" style="width:100%;">Update</button>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>


            <div class="container">
              <table>
                <thead>
                  <tr>
                    <th>ID</th>
                    <td>{{Auth::user()->id}}</td>
                  </tr>
                  <tr>
                    <th>Name</th>
                    <td>{{Auth::user()->name}}</td>
                  </tr>
                  <tr>
                    <th>Email</th>
                    <td>{{Auth::user()->email}}</td>
                  </tr>
                  <tr>
                    <th>Role</th>
                    <td>{{Auth::user()->role}}</td>
                  </tr>
                  <tr>
                    <th>Address</th>
                    <td>{{Auth::user()->details->address}}</td>
                  </tr>
                  <tr>
                    <th>Gender</th>
                    <td>{{Auth::user()->details->gender}}</td>
                  </tr>
                  <tr>
                    <th>DOB</th>
                    <td>{{Auth::user()->details->dob}}</td> 
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">           

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->
  @endsection

 

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>


