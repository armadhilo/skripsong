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
                  </div>
               </div>
            </div>

            @foreach ($PackageSoal as $item)
               <div class="col-3 col-md-3 col-lg-3" style="cursor: pointer;" onclick="goPackage({{$item->id}})">  
                     <div class="card card-primary"> 
                        <div class="card-body">
                           <h6 class="text-primary">{{$item->package}}</h6>
                           <p class="mb-0">
                              {{ $item->deskripsi }}
                           </p>
                        </div>
                     </div>
               </div>
            @endforeach
         </div>
      </div>
   </section>
</div>
@endsection
@section('js')
<script>
   $(document).ready(function() {
   });

   function goPackage(id){
      window.location.href="{{URL::to('/admin/master_soal')}}/" + id;
   }

</script>
@endsection