@extends('partial.app')
@section('content')
<!-- Main Content -->
<div class="main-content">
   <section class="section">
      <div class="section-header">
         <h1>List Package</h1>
         <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Forms</a></div>
            <div class="breadcrumb-item">Advanced Forms</div>
         </div>
      </div>
      <div class="section-body">
         <h2 class="section-title">List Package</h2>
         <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
               <div class="card">
                  <div class="row m-2" style="padding-top: 10px; padding-bottom: 6px;">
                     <div class="col-8 col-md-8 col-lg-8">
                        <h6 class="text-primary">List Package</h6>
                     </div>
                  </div>
                  <div class="card-body pt-0">
                    <ul class="nav nav-tabs" id="myTab3" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">Soal Belum Rilis</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false">Soal Rilis</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="exp-tab3" data-toggle="tab" href="#exp" role="tab" aria-controls="profile" aria-selected="false">Soal Expired</a>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTabContent2" style="margin-top: 20px;">
                      <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                        <table class="table table-striped" id="tb_belum_rilis">
                           <thead>
                              <tr>
                                 <th scope="col" class="text-center">No</th>
                                 <th scope="col" class="text-center">Package</th>
                                 <th scope="col" class="text-center">Deskripsi</th>
                                 <th scope="col" class="text-center" style="width: 12%">Actions</th>
                              </tr>
                           </thead>
                           <tbody>
                              
                              @foreach ($belumRilis as $item)
                                 <tr>
                                    <th class="text-center">{{ $loop->iteration }}</th>
                                    <td>{{$item->package}}</td>
                                    <td>{{$item->deskripsi}}</td>
                                    <td class="text-center">
                                       <a href="#" class="btn btn-sm mr-1 btn-icon btn-success"><i class="fa fa-edit"></i></a>
                                       <a href="#" class="btn btn-sm btn-icon btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                 </tr>
                              @endforeach
                           
                           </tbody>
                        </table>
                      </div>
                      <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                        <table class="table table-striped" id="tb_rilis">
                           <thead>
                              <tr>
                                 <th scope="col" class="text-center">No</th>
                                 <th scope="col" class="text-center">Package</th>
                                 <th scope="col" class="text-center">Deskripsi</th>
                                 <th scope="col" class="text-center" style="width: 12%">Actions</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($soalRilis as $item)
                              <tr>
                                 <th class="text-center">{{ $loop->iteration }}</th>
                                 <td>{{$item->package}}</td>
                                 <td>{{$item->deskripsi}}</td>
                                 <td class="text-center">
                                    <a href="#" class="btn btn-sm mr-1 btn-icon btn-success"><i class="fa fa-edit"></i></a>
                                    <a href="#" class="btn btn-sm btn-icon btn-danger"><i class="fa fa-trash"></i></a>
                                 </td>
                              </tr>
                           @endforeach
                           </tbody>
                        </table>
                      </div>
                      <div class="tab-pane fade" id="exp" role="tabpanel" aria-labelledby="exp-tab3">
                        <table class="table table-striped" id="tb_exp">
                           <thead>
                              <tr>
                                 <th scope="col" class="text-center">No</th>
                                 <th scope="col" class="text-center">Package</th>
                                 <th scope="col" class="text-center">Deskripsi</th>
                                 <th scope="col" class="text-center" style="width: 12%">Actions</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($soalExpired as $item)
                                 <tr>
                                    <th class="text-center">{{ $loop->iteration }}</th>
                                    <td>{{$item->package}}</td>
                                    <td>{{$item->deskripsi}}</td>
                                    <td class="text-center">
                                       <a href="#" class="btn btn-sm mr-1 btn-icon btn-success"><i class="fa fa-edit"></i></a>
                                       <a href="#" class="btn btn-sm btn-icon btn-danger"><i class="fa fa-trash"></i></a>
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
            
            
            <!-- Modal -->
            <div class="modal" tabindex="-1" role="dialog" id="modal_soal" data-backdrop="static" data-keyboard="false">
               <div class="modal-dialog modal-lg" role="document">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h5 class="modal-title">Modal title</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <div class="modal-body">
                     <p>Modal body text goes here.</p>
                   </div>
                   <div class="modal-footer">
                     <button type="button" class="btn btn-primary">Save changes</button>
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
      $("#tb_belum_rilis").DataTable();
      $("#tb_rilis").DataTable();
      $("#tb_exp").DataTable();
   });

  
</script>
@endsection