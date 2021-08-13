@extends('partial.app')
@section('content')
<!-- Main Content -->
<div class="main-content">
   <section class="section">
      <div class="section-header">
         <h1>Kerjakan Ujian</h1>
         <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Ujian</a></div>
            <div class="breadcrumb-item">Kerjakan Ujian</div>
         </div>
      </div>
      <div class="section-body">
         <h2 class="section-title">Data Kelompok Ujian</h2>
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
                                 <th scope="col" class="text-center">Kelompok Ujian</th>
                                 <th scope="col" class="text-center">Deskripsi</th>
                                 <th scope="col" class="text-center">Durasi</th>
                                 <th scope="col" class="text-center">Publish</th>
                                 <th scope="col" class="text-center" style="width: 18%">Actions</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($list as $item)
                              <tr>
                                 <th class="text-center">{{$loop->iteration}}</th>
                                 <td>{{$item->package->package}}</td>
                                 <td>{{$item->package->deskripsi}}</td>
                                 <td>{{$item->package->durasi}} Menit</td>
                                 <td>{{ date('d F Y H:i:s', strtotime($item->package->publish)) }}</td>
                                 <td class="text-center">
                                    @if ($item->package->publish >= date("Y-m-d H:i:s"))
                                       <button onclick="goToExam({{$item->id}})" class="btn btn-sm mr-1 btn-icon btn-success" disabled><i class="fa fa-check"></i> Kerjakan</button>
                                    @else
                                       <button onclick="goToExam({{$item->id}})" class="btn btn-sm mr-1 btn-icon btn-success"><i class="fa fa-check"></i> Kerjakan</button>
                                    @endif
                                    
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

   function goToExam(id){
         swal({
         title: "Apa anda yakin?",
         text: "Apa anda yakin akan mengambil kelompok ujian ini?",
         icon: "warning",
         buttons: true,
         dangerMode: true,
         })
         .then((willDelete) => {
               if (willDelete) {
                     window.location.href = "/checker/kerjakan-ujian/kerjakan_soal/kerjakan/" + id;
               }
         });
   }
</script>
@endsection