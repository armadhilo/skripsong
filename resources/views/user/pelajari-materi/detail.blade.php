@extends('partial.app')
@section('content')
<script type="text/javascript" src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
<!-- Main Content -->
<div class="main-content">
   <section class="section">
      <div class="section-header">
         <h1>Detail Materi</h1>
         <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Forms</a></div>
            <div class="breadcrumb-item">Advanced Forms</div>
         </div>
      </div>
      <div class="section-body">
         <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
               <div class="card">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-12 col-md-12 col-lg-12 text-center">
                           <h5 style="color: #6777ef;">{{$list->judul}}</h5>
                        </div><hr>
                        <div class="col-12 col-md-12 col-lg-12">
                           <p class="mb-2 mt-4 text-justify">
                              {!!$list->materi!!}
                           </p>
                        </div>
                     </div>
                     
                     
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
      $("#tb").DataTable();
   });

   function pelajari(){
      window.location.href = "";
   }


</script>
@endsection