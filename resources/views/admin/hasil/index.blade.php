@extends('partial.app')
@section('content')
<!-- Main Content -->
<div class="main-content">
   <section class="section">
      <div class="section-header">
         <h1>Package Sudah Dikerjakan</h1>
         <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Forms</a></div>
            <div class="breadcrumb-item">Advanced Forms</div>
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
                               <h6 class="text-primary">List Package</h6>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-12 col-lg-12">
                        <table class="table table-striped" id="tb_package">
                           <thead>
                              <tr>
                                 <th scope="col" class="text-center">No</th>
                                 <th scope="col" class="text-center">Nama</th>
                                 <th scope="col" class="text-center">Package</th>
                                 <th scope="col" class="text-center">Nilai</th>
                                 {{-- <th scope="col" class="text-center" style="width: 18%">Actions</th> --}}
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($list as $item)
                                 <tr>
                                    <th class="text-center">{{$loop->iteration}}</th>
                                    <td>{{$item->user->firstname}}</td>
                                    <td>{{$item->package->package}}</td>
                                    <td class="text-center"> {{ (intval($item->jumlahBenar) / (intval($item->jumlahBenar) + intval($item->jumlahSalah)) * 100) }} </td>
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

</script>
@endsection