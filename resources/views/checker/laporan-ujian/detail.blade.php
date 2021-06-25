@extends('partial.app')
@section('content')
<!-- Main Content -->
<div class="main-content">
   <section class="section">
      <div class="section-header">
         <h1>Detail Hasil Ujian</h1>
         <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Laporan</a></div>
            <div class="breadcrumb-item">Detail Hasil Ujian</div>
         </div>
      </div>
      <div class="section-body">
         <h2 class="section-title">Hasil Ujian</h2>
         <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12 col-md-12 col-lg-12 mt-2" style="margin-bottom: 24px;">
                            <div class="row">
                                <div class="col-8 col-md-8 col-lg-8">
                                   <h6 class="text-primary">Info Package</h6>
                               </div>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-3 col-md-3 col-lg-3">
                                <input type="text" class="form-control" value="{{$data->package}}" readonly>
                            </div>
                            <div class="col-3 col-md-3 col-lg-3">
                                <input type="text" class="form-control" value="{{$data->deskripsi}}" readonly>
                            </div>
                            <div class="col-3 col-md-3 col-lg-3">
                                <input type="text" class="form-control" value="{{$data->publish}}" readonly>
                            </div>
                            <div class="col-3 col-md-3 col-lg-3">
                                <input type="text" class="form-control" value="{{$data->durasi}} Menit" readonly>
                            </div>
                         </div>
                        
                    </div>
                </div>
                <a href="/checker/laporan-ujian/cetak-pdf/{{$data->id}}" target="_blank"><button class="btn btn-primary float-right"> <i class="fa fa-print"></i> Print Hasil Ujian</button></a>
                <br><br><br>
               <div class="card">
                  <div class="card-body" style="padding-bottom: 40px;">
                     <div class="col-12 col-md-12 col-lg-12 mt-2" style="margin-bottom: 24px;">
                        <div class="row">
                            <div class="col-8 col-md-8 col-lg-8">
                               <h6 class="text-primary">List Nilai</h6>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-12 col-lg-12">
                        <table class="table table-striped" id="tb_package">
                           <thead>
                              <tr>
                                 <th scope="col" class="text-center">No</th>
                                 <th scope="col" class="text-center">Nama</th>
                                 <th scope="col" class="text-center">Email</th>
                                 <th scope="col" class="text-center">Role</th>                                
                                 <th scope="col" class="text-center">Benar/Salah/Total Soal</th>
                                 <th scope="col" class="text-center">Nilai</th>
                                 {{-- <th scope="col" class="text-center" style="width: 18%">Actions</th> --}}
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($list as $item)
                                 <tr>
                                    <th class="text-center">{{$loop->iteration}}</th>
                                    <td class="text-center">{{$item->user->firstname}}</td>
                                    <td class="text-center">{{$item->user->email}}</td>
                                    <td class="text-center">
                                        @if ($item->user->role == 'Checker')
                                            <span class="badge badge-primary">checker</span>
                                        @else
                                            <span class="badge badge-info">Peserta</span>
                                        @endif
                                    </td>
                                    <td class="text-center"> {{$item->jumlahBenar}} / {{$item->jumlahSalah}} / {{(intval($item->jumlahBenar) + intval($item->jumlahSalah))}} </td>
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