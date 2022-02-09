
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
            <h1 class="m-0">Edit Data Pemilik Resort</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="card card-info card-outline">
        <div class="card-body">
            <form action="{{route('edit-proses-konten-beranda', $dt->id)}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                  <label>Judul Konten</label>
                  <input type="text" name="judul_konten" value="{{$dt->judul_konten}}" class="form-control">
                </div>
                  <div class="form-group">
                    <label>Deskripsi Konten</label>
                    <input type="text" id="deskripsi_konten" name="deskripsi_konten" class="form-control" height="20px" value="{{$dt->deskripsi_konten}}">
                    {{-- <textarea type="text" name="deskripsi" class="form-control" value="{{$dt->deskripsi}}"></textarea> --}}
                </div>
                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <img src="{{asset('img/'.$dt->image)}}" height="10%" width="50%" alt="" srcset="">
                </div>
                <div class="form-group">
                  <a href="{{route('data-konten-beranda')}}" class="btn btn-danger float-right">Batal</a>
                  <input type="submit" class="btn btn-primary float-right"></button>
                </div>
              </form>
      </div>
    </div>
<!-- REQUIRED SCRIPTS -->
@include('template-admin.script')
</body>
</html>
