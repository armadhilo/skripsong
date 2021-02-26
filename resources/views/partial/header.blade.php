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
             <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
             <div class="d-sm-none d-lg-inline-block">Hi, {{session()->get('firstname') ." ".session()->get('lastname')}}</div>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
             <div class="dropdown-divider"></div>
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

       @if (session()->get('role') == 'Admin')
         <ul class="sidebar-menu">
            <li class="menu-header">App</li>
            <li><a class="nav-link" href="{{route('dashboard.admin')}}"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>

            <li class="menu-header">Master</li>
            <li><a class="nav-link" href="{{ route('buat_materi.view') }}"><i class="far fa-file-alt"></i> <span>Master Materi</span></a></li>
            <li><a class="nav-link" href="{{ route('package.view') }}"><i class="far fa-file-alt"></i> <span>Master Package</span></a></li>
            <li><a class="nav-link" href="{{ route('soal.view') }}"><i class="far fa-file-alt"></i> <span>Master Soal</span></a></li>

            <li class="menu-header">Publish</li>
            <li><a class="nav-link" href="{{ route('publish.view') }}"><i class="far fa-file-alt"></i> <span>Publish Package</span></a></li>

            <li class="menu-header">View</li>
            <li><a class="nav-link" href="{{ route('lihat_berkas.view') }}"><i class="far fa-file-alt"></i> <span>List Berkas</span></a></li>
            <li><a class="nav-link" href="{{ route('listpack.view') }}"><i class="far fa-file-alt"></i> <span>List Package</span></a></li>
            
         </ul>
       @else
         <ul class="sidebar-menu">
            <li class="menu-header">App</li>
            <li><a class="nav-link" href="{{ route('dashboard.user') }}"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>

            <li class="menu-header">Materi</li>
            <li><a class="nav-link" href="{{ route('list_materi.view') }}"><i class="fa fa-home"></i> <span>List Materi</span></a></li>

            <li class="menu-header">Package</li>
            <li><a class="nav-link" href="{{ route('user_package.view') }}"><i class="fa fa-home"></i> <span>Package</span></a></li>
            <li><a class="nav-link" href="{{ route('kerjakan_soal.view') }}"><i class="fa fa-home"></i> <span>Kerjakan Soal</span></a></li>
            <li><a class="nav-link" href="{{ route('sudah_dikerjakan.view') }}"><i class="fa fa-home"></i> <span>Hasil</span></a></li>
         </ul>
       @endif

      
    </aside>
 </div>