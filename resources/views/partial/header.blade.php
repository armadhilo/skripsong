<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
       <ul class="navbar-nav mr-3">
          <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
       </ul>
    </form>
    <ul class="navbar-nav navbar-right">
       <li class="dropdown">
          <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
             <img alt="image" src="{{asset('assets/img/avatar/avatar-1.png')}}" class="rounded-circle mr-1">
             <div class="d-sm-none d-lg-inline-block">Hi, {{session()->get('firstname') ." ".session()->get('lastname')}}</div>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
             <div class="dropdown-divider"></div>
             <a href="/view-change-password" class="dropdown-item has-icon">
               <i class="fas fa-user"></i> Change Password
             </a>
             <a href="{{route('logout')}}" class="dropdown-item has-icon text-danger">
               <i class="fas fa-sign-out-alt"></i> Logout
             </a>
          </div>
       </li>
    </ul>
 </nav>

 
 <div class="main-sidebar">
    <aside id="sidebar-wrapper">
       <div class="sidebar-brand">
          <a href="index.html">AirNav</a>
       </div>
       <div class="sidebar-brand sidebar-brand-sm">
          <a href="index.html">NV</a>
       </div>

       @if (session()->get('role') == 'Checker')
         <ul class="sidebar-menu">
            <li><a class="nav-link" href="{{route('dashboard.checker')}}"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>

            <li class="menu-header">Master</li>
            <li><a class="nav-link" href="/checker/master-checker/"><i class="far fa-file-alt"></i> <span>Master Checker</span></a></li>
            <li><a class="nav-link" href="/checker/master-user/"><i class="far fa-file-alt"></i> <span>Master User</span></a></li>
            <li><a class="nav-link" href="{{ route('buat_materi.view') }}"><i class="far fa-file-alt"></i> <span>Master Materi</span></a></li>
            <li><a class="nav-link" href="{{ route('package.view') }}"><i class="far fa-file-alt"></i> <span>Master Kelompok Ujian</span></a></li>
            <li><a class="nav-link" href="{{ route('soal.view') }}"><i class="far fa-file-alt"></i> <span>Master Soal</span></a></li>

            <li class="menu-header">Terbitkan</li>
            <li><a class="nav-link" href="{{ route('publish.view') }}"><i class="far fa-file-alt"></i> <span>Terbitkan Ujian</span></a></li>

            <li class="menu-header">Data</li>
            <li><a class="nav-link" href="{{ route('listpack.view') }}"><i class="far fa-file-alt"></i> <span>Data Kelompok Ujian</span></a></li>

            <li class="menu-header">Checker</li>
            <li><a class="nav-link" href="/checker/checking/lihat_berkas"><i class="far fa-file-alt"></i> <span>Verifikasi Peserta</span></a></li>

            <li class="menu-header">Ujian</li>
            <li><a class="nav-link" href="/checker/daftar-ujian/"><i class="far fa-file-alt"></i> <span>Ambil Kelompok Ujian</span></a></li>
            <li><a class="nav-link" href="/checker/kerjakan-ujian/"><i class="far fa-file-alt"></i> <span>Kerjakan Ujian</span></a></li>
            <li><a class="nav-link" href="/checker/sudah-ujian/"><i class="far fa-file-alt"></i> <span>Hasil Ujian</span></a></li>

            <li class="menu-header">Laporan Ujian</li>
            <li><a class="nav-link" href="/checker/laporan-ujian/"><i class="fa fa-home"></i> <span>Laporan</span></a></li>

            {{--<li class="menu-header">Publish</li>
            <li><a class="nav-link" href="{{ route('publish.view') }}"><i class="far fa-file-alt"></i> <span>Publish Package</span></a></li>

            <li class="menu-header">View</li>
            <li><a class="nav-link" href="{{ route('lihat_berkas.view') }}"><i class="far fa-file-alt"></i> <span>List Berkas</span></a></li>
            <li><a class="nav-link" href="{{ route('listpack.view') }}"><i class="far fa-file-alt"></i> <span>List Package</span></a></li>

            <li class="menu-header">Hasil</li>
            <li><a class="nav-link" href="{{ route('hasil.view') }}"><i class="far fa-file-alt"></i> <span>Hasil</span></a></li> --}}
            
         </ul>
       @else
         <ul class="sidebar-menu">
            <li class="menu-header">App</li>
            <li><a class="nav-link" href="{{ route('dashboard.user') }}"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>

            <li class="menu-header">Materi</li>
            <li><a class="nav-link" href="{{ route('list_materi.view') }}"><i class="fa fa-home"></i> <span>List Materi</span></a></li>

            <li class="menu-header">Ujian</li>
            <li><a class="nav-link" href="{{ route('user_package.view') }}"><i class="fa fa-home"></i> <span>Ambil Kelompok Ujian</span></a></li>
            <li><a class="nav-link" href="{{ route('kerjakan_soal.view') }}"><i class="fa fa-home"></i> <span>Kerjakan Ujian</span></a></li>
            <li><a class="nav-link" href="{{ route('sudah_dikerjakan.view') }}"><i class="fa fa-home"></i> <span>Hasil Ujian</span></a></li>
         </ul>
       @endif

      
    </aside>
 </div>