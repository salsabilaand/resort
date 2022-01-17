
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
            <h1 class="m-0">Edit Data Transaksi</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="card card-info card-outline">
        <div class="card-body">
        <form action="{{route('edit-proses-transaksi', $dt->id)}}" method="POST">
          {{ csrf_field() }}
          <div class="form-group">
            <label>Nama Pelanggan</label>
            <input type="text" name="nama" value="{{$dt->nama}}" class="form-control">
          </div>
          <div class="form-group">
            <label>Telepon</label>
            <input type="text" name="telepon" value="{{$dt->telepon}}" class="form-control">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" value="{{$dt->email}}" class="form-control">
          </div>
          <div class="form-group">
            <label>Jenis Kamar</label>
            <select class="form-control select2" style="width: 100%;" name="kamar_id" id="kamar_id">
              <option value="{{$dt->kamar_id}}"> {{$dt->kamar->jenis_kamar}} </option>
              @foreach ($kmr as $item)
                  <option value="{{$item->id}}"> {{$item->jenis_kamar}} </option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Tanggal Check In</label>
            <input type="date" name="tgl_masuk" class="form-control" value="{{$dt->tgl_masuk}}">
          </div>
          <div class="form-group">
            <label>Tanggal Check Out</label>
            <input type="date" name="tgl_keluar" class="form-control" value="{{$dt->tgl_keluar}}">
          </div>
          <div class="form-group">
            <label>Jumlah Tamu</label>
            <input type="text" name="jml_tamu" value="{{$dt->jml_tamu}}" class="form-control">
          </div>
          <div class="form-group">
            <label>Tarif Kamar</label>
            <input type="text" name="harga" value="{{$dt->harga}}" class="form-control">
          </div>
          <div class="form-group">
            <label>Catatan Tambahan</label>
            <input type="text" id="catatan" name="catatan" class="form-control" height="20px" value="{{$dt->catatan}}">
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
