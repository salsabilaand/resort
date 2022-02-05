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
            <h1 class="m-0">Data Profile Resort</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="card card-info card-outline col-md-6">
          @csrf
          @foreach ($user as $item)
          
<<<<<<< HEAD
=======
        <div class="card-body">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle" src="{{asset('img/'.$item->photo)}}" alt="User profile picture">
            </div>

            <h3 class="profile-username text-center">{{$item->nama_resort}}</h3>
            <p class="text-muted text-center">{{$item->name}}</p>

            <form action="{{route('update-profile-resort', $item->id)}}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="form-group">
                <label>Nama Resort</label>
                <input type="text" name="nama_resort" value="{{$item->nama_resort}}" class="form-control">
              </div>
              <div class="form-group">
                <label>Nama Pemilik Resort</label>
                <input type="text" name="name" value="{{$item->name}}" class="form-control">
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{$item->email}}" class="form-control">
              </div>
              <div class="form-group">
                <label>Foto</label>
                <input type="file" name="photo" class="form-control">
              </div>
              <div class="form-group">
                <img src="{{asset('img/'.$item->photo)}}" height="10%" width="50%" alt="" srcset="">
              </div>
              {{-- <div class="form-group">
                <label>Foto</label>
                <input type="file" name="photo" placeholder="" class="form-control">
              </div> --}}
              <div class="form-group">
                <label>Alamat</label>
                <input type="text" id="alamat" name="alamat" class="form-control" height="20px" value="{{$item->alamat}}">
              </div>
              <div class="form-group">
                <label>Deskripsi Resort</label>
                <input type="text" id="deskripsi" name="deskripsi" class="form-control" height="20px" value="{{$item->deskripsi}}">
              </div>
              <div class="form-group">
                <a href="{{route('profile-resort')}}" class="btn btn-danger float-right">Batal</a>
                <input type="submit" class="btn btn-primary float-right"></button>
              </div>
            </form>
          </div>
        </div>
        @endforeach
      </div>
      <div class="card card-info card-outline col-md-6">
        @csrf
        @foreach ($user as $item)
        
>>>>>>> d0ad8d151817b27e35336a91f3738459bc499ac8
        <div class="card-body">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle" src="{{asset('img/'.$item->photo)}}" alt="User profile picture">
            </div>
            
            <h3 class="profile-username text-center">{{$item->nama_resort}}</h3>
            <p class="text-muted text-center">{{$item->name}}</p>

            <form action="{{route('update-profile-resort', $item->id)}}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="form-group">
                <label>Nama Resort</label>
                <input type="text" name="nama_resort" value="{{$item->nama_resort}}" class="form-control">
              </div>
              <div class="form-group">
                <label>Nama Pemilik Resort</label>
                <input type="text" name="name" value="{{$item->name}}" class="form-control">
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{$item->email}}" class="form-control">
              </div>
              <div class="form-group">
                <label>Foto</label>
                <input type="file" name="photo" class="form-control">
              </div>
              <div class="form-group">
                <img src="{{asset('img/'.$item->photo)}}" height="10%" width="50%" alt="" srcset="">
              </div>
              {{-- <div class="form-group">
                <label>Foto</label>
                <input type="file" name="photo" placeholder="" class="form-control">
              </div> --}}
              <div class="form-group">
                <label>Alamat</label>
                <input type="text" id="alamat" name="alamat" class="form-control" height="20px" value="{{$item->alamat}}">
              </div>
              <div class="form-group">
                <label>Deskripsi Resort</label>
                <input type="text" id="deskripsi" name="deskripsi" class="form-control" height="20px" value="{{$item->deskripsi}}">
              </div>
              <div class="form-group">
                <a href="{{route('profile-resort')}}" class="btn btn-danger float-right">Batal</a>
                <input type="submit" class="btn btn-primary float-right"></button>
              </div>
            </form>
          </div>
        </div>
        @endforeach
      </div>
    </div>

      {{-- ubah password --}}
      <div class="card card-info card-outline col-md-6">
        @csrf
        @foreach ($user as $item)
        
        <div class="card-body">
          <div class="card-body box-profile">
            
            <h3 class="profile-username text-center"><b>Ubah Password</b></h3>

            <form action="{{route('update-password-pemilik-resort', $item->id)}}" method="POST">
              {{ csrf_field() }}
              <div class="form-group">
                <label>New Password</label>
                <input type="password" name="password" id="password" class="form-control">
                <span class="text-danger">@error('password') {{$message}} @enderror</span>
              </div>
              <div class="form-group">
                <label>Confirm New Password</label>
                <input type="password" name="password" id="password" class="form-control">
                <span class="text-danger">@error('password') {{$message}} @enderror</span>
              </div>
              <div class="form-group">
                <a href="{{route('profile-resort')}}" class="btn btn-danger float-right">Batal</a>
                <input type="submit" class="btn btn-primary float-right"></button>
              </div>
            </form>
          </div>
        </div>
        @endforeach
      </div>
    </div>

<!-- REQUIRED SCRIPTS -->
@include('template.script')
</body>
</html>