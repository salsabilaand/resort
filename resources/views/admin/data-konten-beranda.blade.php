
<!DOCTYPE html>

<html lang="en">
<head>
  @include('template-admin.head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  {{-- @include('template-admin.navbar') --}}
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('template-admin.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Tempat Wisata</h1>
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
            <a href="{{route('input-konten-beranda')}}" class="btn btn-success">Tambah Data  <i class="fas fa-plus-square"></i></a>
            {{-- <a href="{{route('cetak-pemilik-resort')}}" target="_blank" class="btn btn-primary float-left">Cetak  <i class="fas fa-print"></i></a> --}}
          </div>
        </div>

        <div class="card-body">
          <table class="table table-bordered">
            <tr>
              <th>No</th>
              <th>Judul</th>
              <th>Deskripsi</th>
              <th>Foto</th>
              <th>Aksi</th>
            </tr>
            <?php $no = 1 ?>
            @foreach ($dtKonten as $item)
            <tr>
              <th>{{$no++}}</th>
              <th>{{$item->judul_konten}}</th>
              <th>{{$item->deskripsi_konten}}</th>
              <th width="20%">
                <img src="{{asset('img/'.$item->image)}}" height="10%" width="80%" alt="" srcset="">
              </th>
              <th>
                <a href="{{route('edit-konten-beranda',$item->id)}}"><i class="fas fa-edit"></i></a> |
                <a href="{{route('hapus-konten-beranda',$item->id)}}"><i class="fas fa-trash-alt" style="color: red" onclick="return confirm('Apakah Yakin Akan Menghapus Data?')"></i></a>
              </th>
            </tr>
            @endforeach
          </table>
        </div>
      </div>
    </section>

<!-- REQUIRED SCRIPTS -->
@include('template-admin.script')
</body>
</html>
