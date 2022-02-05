
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
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Pemilik Resort</h1>
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
            <a href="{{route('input-pemilik-resort')}}" class="btn btn-success">Tambah Data<i class="fas fa-plus-square"></i></a>
            <a href="{{route('cetak-pemilik-resort')}}" target="_blank" class="btn btn-primary float-left">Cetak<i class="fas fa-print"></i></a>
          </div>
        </div>

        <div class="card-body">
          <table class="table table-bordered">
            <tr>
              <th>No</th>
              <th>Nama Resort</th>
              <th>Email</th>
              <th>Password</th>
              <th>Aksi</th>
            </tr>
            <?php $no = 1 ?>
            @foreach ($dtResort as $item)
            <tr>
              <th>{{$no++}}</th>
              <th>{{$item->name}}</th>
              <th>{{$item->email}}</th>
              <th>{{$item->password}}</th>
              <th>
                <a href="{{route('edit-pemilik-resort',$item->id)}}"><i class="fas fa-edit"></i></a> |
                <a href="{{route('hapus-pemilik-resort',$item->id)}}"><i class="fas fa-trash-alt" style="color: red" onclick="return confirm('Apakah Yakin Akan Menghapus Data?')"></i></a>
              </th>
            </tr>
            @endforeach
          </table>
        </div>
      </div>

<!-- REQUIRED SCRIPTS -->
@include('template-admin.script')
</body>
</html>
