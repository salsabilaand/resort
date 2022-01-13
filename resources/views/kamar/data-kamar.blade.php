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
            <h1 class="m-0">Data Kamar</h1>
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
            <a href="{{route('input-kamar')}}" class="btn btn-success">Tambah Data<i class="fas fa-plus-square"></i></a>
          </div>
        </div>

        <div class="card-body">
          <table class="table table-bordered">
            <tr>
              <th>No</th>
              <th>Jenis Kamar</th>
              <th>Foto</th>
              <th>Tipe Kamar</th>
              <th>Harga</th>
              <th>Deskripsi</th>
              <th>Aksi</th>
            </tr>
            <?php $no = 1 ?>
            @foreach ($dtKamar as $item)
            <tr>
              <th>{{ $no++ }}</th>
              <th>{{$item->jenis_kamar}}</th>
              <th width="20%">
                {{-- <a href="{{asset('img/'.$item->image)}}" target="_blank" rel="">Lihat Gambar</a> --}}
                <img src="{{asset('img/'.$item->image)}}" height="10%" width="80%" alt="" srcset="">
                {{-- {{$item->image}} --}}
              </th>
              <th>{{$item->tipe_kamar}}</th>
              <th>{{$item->harga}}</th>
              <th>{{$item->deskripsi}}</th>
              <th>
                <a href="{{route('edit-kamar',$item->id)}}"><i class="fas fa-edit"></i></a> |
                <a href="{{route('hapus-kamar',$item->id)}}"><i class="fas fa-trash-alt" style="color: red" onclick="return confirm('Apakah Yakin Akan Menghapus Data?')"></i></a>
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
