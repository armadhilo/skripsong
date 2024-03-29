@extends('partial.app')
@section('content')
<!-- Main Content -->
<div class="main-content">
   <section class="section">
      <div class="section-header">
         <h1>Laporan</h1>
         <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Laporan</a></div>
            <div class="breadcrumb-item">Data Kelompok Ujian</div>
         </div>
      </div>
      <div class="section-body">
         <h2 class="section-title">Hasil Ujian</h2>
         <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
               <div class="card">
                  <div class="card-body" style="padding-bottom: 40px;">
                     <div class="col-12 col-md-12 col-lg-12 mt-2" style="margin-bottom: 24px;">
                        <div class="row">
                            <div class="col-8 col-md-8 col-lg-8">
                               <h6 class="text-primary">Data Kelompok Ujian</h6>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-12 col-lg-12">
                        <table class="table table-striped" id="tb_package">
                           <thead>
                              <tr>
                                 <th scope="col" class="text-center">No</th>
                                 <th scope="col" class="text-center">Package</th>
                                 <th scope="col" class="text-center">Deskripsi</th>
                                 <th scope="col" class="text-center">Publish</th>
                                 <th scope="col" class="text-center">Durasi</th>
                                 <th scope="col" class="text-center">Action</th>
                                 {{-- <th scope="col" class="text-center" style="width: 18%">Actions</th> --}}
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($list as $item)
                                 <tr>
                                    <th class="text-center">{{$loop->iteration}}</th>
                                    <td>{{$item->package}}</td>
                                    <td>{{$item->deskripsi}}</td>
                                    <td class="text-center" >{{$item->publish}}</td>
                                    <td class="text-center" >{{$item->durasi}} Menit</td>
                                    <td class="text-center">
                                       <button class="btn btn-primary" onclick="detail({{$item->id}})">Detail Nilai</button>
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
      $("#tb_package").DataTable();
   });

   function detail(id){
      window.location.href = "/checker/laporan-ujian/detail-hasil/" + id;
   }

</script>
@endsection