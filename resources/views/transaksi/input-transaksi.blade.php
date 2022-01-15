<!DOCTYPE html>

<html lang="en">
<head>
  @include('template.head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  @include('template.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('template.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Input Data Transaksi</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="card card-info card-outline">
        <div class="card-body">
        <form action="{{route('input-proses-transaksi')}}" method="POST">
          {{ csrf_field() }}
          <div class="form-group">
            <label>Nama Pelanggan</label>
            <input type="text" name="nama" placeholder="Masukkan Nama Pelanggan..." class="form-control">
          </div>
          <div class="form-group">
            <label>Telepon</label>
            <input type="text" name="telepon" placeholder="Masukkan Nomor Telepon..." class="form-control">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" placeholder="Masukkan Alamat Email..." class="form-control">
          </div>
          <div class="form-group">
            <label>Tanggal Check In</label>
            <input type="date" name="tgl_masuk" class="form-control">
          </div>
          <div class="form-group">
            <label>Tanggal Check Out</label>
            <input type="date" name="tgl_keluar" class="form-control">
          </div>
          <div class="form-group">
            <label>Jumlah Tamu</label>
            <input type="text" name="jml_tamu" placeholder="Masukkan Jumlah Tamu..." class="form-control">
          </div>
          <div class="form-group">
            <label>Tarif Kamar</label>
            <input type="text" name="harga" placeholder="Masukkan Tarif Kamar..." class="form-control">
          </div>
          <div class="form-group">
            <label>Catatan Tambahan</label>
            <textarea type="text" name="catatan" placeholder="Tuliskan Catatan Tambahan (Opsional)..." class="form-control"></textarea>
          </div>
          <div class="form-group">
            <a href="{{route('data-transaksi')}}" class="btn btn-danger float-right">Batal</a>
            <input type="submit" class="btn btn-primary float-right"></button>
          </div>
        </form>
      </div>
    </div>
<!-- REQUIRED SCRIPTS -->
@include('template.script')
</body>
</html>
