@extends('partial.app')
@section('content')
<!-- Main Content -->
<div class="main-content">
   <section class="section">
      <div class="section-header">
         <h1>Dashboard</h1>
      </div>

      <div class="alert alert-primary" role="alert">
         Hallo  <b>{{session()->get('firstname')}} {{session()->get('lastname')}} </b> , Semoga hari anda menyenangkan
       </div>

      <div class="section-body">
         <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
               <div class="card">
                  <div class="card-header text-center">
                     <h4>Tentang AirNav</h4>
                  </div>
                  <div class="card-body">
                     <div id="carouselExampleIndicators3" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                           <li data-target="#carouselExampleIndicators3" data-slide-to="0" class=""></li>
                           <li data-target="#carouselExampleIndicators3" data-slide-to="1" class=""></li>
                           <li data-target="#carouselExampleIndicators3" data-slide-to="2" class="active"></li>
                        </ol>
                        <div class="carousel-inner">
                           <div class="carousel-item">
                              <img class="d-block w-100" style="height: 350px;" src="{{ asset('assets/img/bg1.jpg') }}" alt="First slide">
                           </div>
                           <div class="carousel-item">
                              <img class="d-block w-100" style="height: 350px;" src="{{ asset('assets/img/bg2.png') }}" alt="Second slide">
                           </div>
                           <div class="carousel-item active">
                              <img class="d-block w-100" style="height: 350px;" src="{{ asset('assets/img/bg3.jpg') }}" alt="Third slide">
                           </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators3" role="button" data-slide="prev">
                           <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                           <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators3" role="button" data-slide="next">
                           <span class="carousel-control-next-icon" aria-hidden="true"></span>
                           <span class="sr-only">Next</span>
                        </a>
                     </div>
                     <p class="mb-2 mt-4 text-justify">
                        Lembaga Penyelenggara Pelayanan Navigasi Penerbangan Indonesia (AirNav Indonesia) adalah BUMN Indonesia yang bergerak di bidang usaha pelayanan navigasi udara. Airnav didirikan pada 13 September 2012 melalui PP No 77 tahun 2012. Airnav Indonesia terbagi menjadi dua ruang udara berdasarkan Flight Information Region (FIR) yaitu, FIR Jakarta dan FIR Ujung Pandang.
                        
                        <hr>

                        <h6 class="text-center">Visi</h6>
                        <p class="text-center">"Menjadi penyedia jasa navigasi penerbangan bertaraf internasional".</p>
                        <h6 class="text-center">Misi</h6>
                        <p class="text-center">"Menyediakan layanan navigasi penerbangan yang mengutamakan keselamatan, efisiensi penerbangan dan ramah lingkungan demi memenuhi ekspektasi pengguna jasa ".</p>
                     </p>
                  </div>
               </div>
               {{-- <div class="card">
                  <div class="card-header">
                     <h4>Description</h4>
                  </div>
                  <div class="card-body pt-0">
                     <p class="mb-2">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                     </p>
                  </div>
               </div> --}}
            </div>
         </div>
      </div>
   </section>
</div>
@endsection
@section('js')
<script>
   $(document).ready(function() {
   });
   
</script>
@endsection