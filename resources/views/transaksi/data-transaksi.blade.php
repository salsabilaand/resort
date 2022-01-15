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
            <h1 class="m-0">Data Transaksi</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="card card-info card-outline">
        <div class="card-header">
          <div class="card-tools">
            <a href="{{route('input-transaksi')}}" class="btn btn-success">Tambah Data<i class="fas fa-plus-square"></i></a>
          </div>
        </div>

        <div class="card-body">
          <table class="table table-bordered">
            <tr>
              <th>No</th>
              <th>Nama Pelanggan</th>
              <th>Telepon</th>
              <th>Email</th>
              <th>Check In</th>
              <th>Check Out</th>
              <th>Jumlah Tamu</th>
              <th>Tarif</th>
              <th>Catatan Tambahan</th>
              <th>Aksi</th>
            </tr>
            <?php $no = 1 ?>
            @foreach ($dtTransaksi as $item)
            <tr>
              <th>{{ $no++ }}</th>
              <th>{{$item->nama}}</th>
              <th>{{$item->telepon}}</th>
              <th>{{$item->email}}</th>
              <th>{{$item->tgl_masuk}}</th>
              <th>{{$item->tgl_keluar}}</th>
              <th>{{$item->jml_tamu}}</th>
              <th>{{$item->harga}}</th>
              <th>{{$item->catatan}}</th>
              <th>
                <a href="{{route('edit-transaksi',$item->id)}}"><i class="fas fa-edit"></i></a> |
                <a href="{{route('hapus-transaksi',$item->id)}}"><i class="fas fa-trash-alt" style="color: red" onclick="return confirm('Apakah Yakin Akan Menghapus Data?')"></i></a>
              </th>
            </tr>
            @endforeach
          </table>
        </div>
      </div>

<!-- REQUIRED SCRIPTS -->
@include('template.script')
</body>
</html>
