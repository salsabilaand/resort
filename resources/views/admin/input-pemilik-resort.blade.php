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
            <h1 class="m-0">Input Data Pemilik Resort</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="card card-info card-outline">
        <div class="card-body">
        <form action="{{route('input-proses-pemilik-resort')}}" method="POST">
            @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @if(Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif
            @csrf
            {{-- {{ csrf_field() }} --}}
          <div class="form-group">
            <label>Nama Pemilik Resort</label>
            <input type="text" name="name" value="{{old('name')}}" id="name" class="form-control">
            <span class="text-danger">@error('name') {{$message}} @enderror</span>
          </div>
          <div class="form-group">
            <label>Nama Resort</label>
            <input type="text" name="nama_resort" value="{{old('nama_resort')}}" id="nama_resort"  class="form-control">
            <span class="text-danger">@error('nama_resort') {{$message}} @enderror</span>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="{{old('email')}}" id="email"  class="form-control">
            <span class="text-danger">@error('email') {{$message}} @enderror</span>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" value="{{old('password')}}" id="password" class="form-control">
            <span class="text-danger">@error('password') {{$message}} @enderror</span>
          </div>
          <div class="form-group">
            <a href="{{route('data-pemilik-resort')}}" class="btn btn-danger float-right">Batal</a>
            <input type="submit" class="btn btn-primary float-right"></button>
          </div>
        </form>
      </div>

<!-- REQUIRED SCRIPTS -->
@include('template-admin.script')
</body>
</html>
