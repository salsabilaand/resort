<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">Halo, <b>{{session('loginName')}}</b></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{route('profile-resort')}}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
              Profile
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('data-kamar')}}" class="nav-link">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>
               Data Kamar
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('data-transaksi')}}" class="nav-link">
              <i class="nav-icon fas fa-clipboard-check"></i>
              <p>
              Konfirmasi Reservasi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('laporan-transaksi')}}" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
              Laporan Reservasi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('logout')}}" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
              Log Out
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>