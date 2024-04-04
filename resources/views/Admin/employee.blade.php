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
</head>

<body>          

@section('main-section')
  <main id="main" class="main">

    <div class="pagetitle">
      <!-- <h1>Dashboard</h1> -->
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
            <h1>Employees Detail</h1>
            <div class="container mt-3">

  
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
    Add User 
  </button>
</div>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add User Form</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="store" method="post">
          @csrf
          <div class="form-group">
            <label for="name">Name :</label>
            <input type="text" name="name" id="name" class="form-control">
          </div>
          <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" class="form-control">
          </div>
          <div class="form-group">
            <label for="password">Password :</label>
            <input type="password" name="password" id="password" class="form-control">
          </div>
          <div class="form-group">
            <label for="role">Role :</label>
            <select id="role" name="role" class="form-control">
              <option value="">Select Role</option>
              <option value="admin">admin</option>
              <option value="user">user</option>
            </select>
          </div>
          <div class="form-group">
            <label for="gender">Gender :</label>
            <input type="radio" name="gender" id="gender" value="male" >male
            <input type="radio" name="gender" id="gender" value="female" >female
          </div>
          <div class="form-group">
            <label for="dob">DOB :</label>
            <input type="date" name="dob" id="dob" class="form-control">
          </div>
          <div class="form-group">
            <label for="address">Address :</label>
            <textarea id="address" name="address" rows="4" cols="50" class="form-control"></textarea>
          </div><br>
          <button type="submit" value="submit" class="btn btn-primary" style="width:100%;">Add User</button>
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
      <table id="show" class="display" width="100%">
        <thead>
          <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>ROLE</th>
            <th>ADDRESS</th>
            <th>GENDER</th>
            <th>DOB</th>
            <th>ACTION</th>
          </tr>
          </thead>   
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
  <script src="assets/js/jquery.min.js"></script>
  <script src="//cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  
  <script>
    $(document).ready(function() {
      // alert('hello');
      $('#show').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "{{url('show')}}",
          dataType: 'json'
        },
        columns: [
          {data:'id', name: 'id'},
          {data:'name', name: 'name'},
          {data:'email', name: 'email'},
          {data:'role', name: 'role'},
          {data: 'address', name: 'address'},
          {data:'gender', name: 'gender'},
          {data:'dob', name: 'dob'},
          {data:'Action', name: 'Action'},
        ]
      });

    });
    
  </script>

  
<script>
  $(document).on('click', '#delete', function(e) {
                e.preventDefault(); 
                var deleteUrl = $(this).attr('href'); // Get the href attribute for the delete action
    
                // Showing sweet alert for confirmation
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        // if user confirm to delete redirect to this url
                        window.location.href = deleteUrl;
                    } else {
                        // if user cancel showing there data is safe
                        swal("Your Record is safe!");
                    }
                });
            });
</script>

</body>

</html>


