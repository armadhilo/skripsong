@extends('partial.app')
@section('content')
<script type="text/javascript" src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
<!-- Main Content -->
<div class="main-content">
   <section class="section">
      <div class="section-header">
         <h1>Materi</h1>
         <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Forms</a></div>
            <div class="breadcrumb-item">Advanced Forms</div>
         </div>
      </div>
      <div class="section-body">
         <h2 class="section-title">Pelajari Materi</h2>
         <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
               <div class="card">
                  <div class="card-body" style="padding-bottom: 40px;">
                     <div class="col-12 col-md-12 col-lg-12 mt-2" style="margin-bottom: 24px;">
                        <div class="row">
                            <div class="col-8 col-md-8 col-lg-8">
                               <h6 class="text-primary">List Materi</h6>
                           </div>
                           <div class="col-4 col-md-4 col-lg-4 text-right">
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-12 col-lg-12">
                        <table class="table table-striped" id="tb">
                           <thead>
                              <tr>
                                 <th scope="col" class="text-center">No</th>
                                 <th scope="col" class="text-center">Judul Materi</th>
                                 <th scope="col" class="text-center">Deskripsi Singkat</th>
                                 <th scope="col" class="text-center" style="width: 12%">Actions</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($list as $item)
                              <tr>
                                 <td>{{$loop->iteration}}</td>
                                 <td>{{$item->judul}}</td>
                                 <td>{{$item->deskripsi}}</td>
                                 <td class="text-center">
                                    <button class="btn btn-sm mr-1 btn-icon btn-success" onclick="pelajari({{$item->id}});"><i class="fa fa-edit"></i> Pelajari</button>
                                 </td>
                              </tr>
                              @endforeach
                           </tbody>
                        </table>
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

   function pelajari(id){
      window.location.href = "/user/list_materi/" + id;
   }


</script>
@endsection