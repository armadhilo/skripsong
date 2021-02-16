@extends('partial.app')
@section('content')
<!-- Main Content -->
<div class="main-content">
   <section class="section">
      <div class="section-header">
         <h1>Pilih Package</h1>
         <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Forms</a></div>
            <div class="breadcrumb-item">Advanced Forms</div>
         </div>
      </div>
      <div class="section-body">
         <div class="row">
            <div class="col-8 col-md-8 col-lg-8">
               <h2 class="section-title" style="margin-top: 0px; margin-bottom: 0px;">Pilih Package Soal</h2>
            </div>
            <div class="col-4 col-md-4 col-lg-4">
               <div class="card" style="background-color: #f4f6f9; box-shadow: none; margin: 0px;">
                  <div class="card-header" style="padding: 0px;">
                  <h4></h4>
                  <form class="card-header-form">
                     <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search">
                        <div class="input-group-btn">
                        <button class="btn btn-primary btn-icon"><i class="fas fa-search"></i></button>
                        </div>
                     </div>
                  </form>
                  </div>
               </div>
            </div>

            <div class="col-3 col-md-3 col-lg-3" style="cursor: pointer;">
               <div class="card card-primary">
                 <div class="card-body">
                  <h6 class="text-primary">Package A</h6>
                   <p class="mb-0">
                      lorem ipsum dolor sit amet consectetur adipiscing elit.
                   </p>
                 </div>
               </div>
             </div>
             <div class="col-3 col-md-3 col-lg-3" style="cursor: pointer;">
               <div class="card card-primary">
                 <div class="card-body">
                  <h6 class="text-primary">Package B</h6>
                   <p class="mb-0">
                      lorem ipsum dolor sit amet consectetur adipiscing elit.
                   </p>
                 </div>
               </div>
             </div>
             <div class="col-3 col-md-3 col-lg-3" style="cursor: pointer;">
               <div class="card card-primary">
                 <div class="card-body">
                  <h6 class="text-primary">Package C</h6>
                   <p class="mb-0">
                      lorem ipsum dolor sit amet consectetur adipiscing elit.
                   </p>
                 </div>
               </div>
             </div>
             <div class="col-3 col-md-3 col-lg-3" style="cursor: pointer;">
               <div class="card card-primary">
                 <div class="card-body">
                  <h6 class="text-primary">Package D</h6>
                   <p class="mb-0">
                      lorem ipsum dolor sit amet consectetur adipiscing elit.
                   </p>
                 </div>
               </div>
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