@extends('partial.app')
@section('content')
<!-- Main Content -->
<div class="main-content">
   <section class="section">
      <div class="section-header">
         <h1>Cek Berkas</h1>
         <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Forms</a></div>
            <div class="breadcrumb-item">Advanced Forms</div>
         </div>
      </div>
      <div class="section-body">
         <h2 class="section-title">Cek Berkas</h2>
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
                                 <th scope="col" class="text-center">Deskripsi Packgae</th>
                                 <th scope="col" class="text-center">User</th>
                                 <th scope="col" class="text-center">Nama User</th>
                                 <th scope="col" class="text-center">Status</th>
                                 <th scope="col" class="text-center" style="width: 18%">Actions</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($list as $item)
                                 <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td>{{$item->package->package}}</td>
                                    <td>{{$item->package->deskripsi}}</td>
                                    <td>{{$item->user->email}}</td>
                                    <td>{{$item->user->firstname . " " . $item->user->lastname }}</td>
                                    <td>
                                       @if ($item->acc == "Y")
                                          <div class="badge badge-success"><i class="fa fa-check"></i> Verified</div>
                                       @elseif($item->acc == "N")
                                          <div class="badge badge-danger"><i class="fa fa-times"></i> Decline</div>
                                       @else
                                          <div class="badge badge-info"><i class="fa fa-tasks"></i> Unprocessed</div>
                                       @endif
                                    </td>
                                    <td class="text-center">
                                       <a href="/checker/checking/lihat_berkas/detail/{{$item->id}}" class="btn btn-sm mr-1 btn-icon btn-primary"><i class="fa fa-eye"></i> Detail Berkas</a>
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

</script>
@endsection