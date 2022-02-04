
<!DOCTYPE html>

<html lang="en">
<head>
  @include('template-admin.head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  @include('template-admin.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('template-admin.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid"><br><br><br><br><br>
        <div class="row mb-2">
            <br><br><br>
          <div class="col-sm-12">
            <center><h1 class="m-0">Selamat Datang</h1></center>
          </div>
          <div class="col-sm-12">
            <center><h1 class="m-0 text-dark"><b>Website Desa Wisata dan Reservasi Resort</b></h1></center>
            <center><h1 class="m-0 text-dark"><b>Pada Desa Katupat, Tojo Una-Una, SUlawesi Tengah</b></h1></center>
            </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<!-- REQUIRED SCRIPTS -->
@include('template-admin.script')
</body>
</html>
