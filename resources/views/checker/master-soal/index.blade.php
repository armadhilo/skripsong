@extends('partial.app')
@section('content')
<!-- Main Content -->
<div class="main-content">
   <section class="section">
      <div class="section-header">
         <h1>Master Soal</h1>
         <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Forms</a></div>
            <div class="breadcrumb-item">Advanced Forms</div>
         </div>
      </div>

      <div class="section-body">
         <h2 class="section-title">{{ $PackageSoal->package }}</h2>
         <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
               <div class="card">
                  <div class="row m-2" style="padding-top: 10px; padding-bottom: 6px;">
                     <div class="col-8 col-md-8 col-lg-8">
                        <h6 class="text-primary">Data Soal</h6>
                     </div>
                     <div class="col-4 col-md-4 col-lg-4 text-right">
                        <a href="/admin/master_soal/{{ $PackageSoal->id }}/create" class="btn btn-icon icon-left btn-success"><i class="fa fa-plus"></i> Tambah Soal</a>
                     </div>
                  </div>
                  <div class="card-body pt-0">
                    <ul class="nav nav-tabs" id="myTab3" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">Soal Pilihan Ganda</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false">Soal True or False</a>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTabContent2" style="margin-top: 20px;">
                      <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                        <table class="table table-striped" id="tb_pilihan_ganda">
                           <thead>
                              <tr>
                                 <th scope="col" class="text-center">No</th>
                                 <th scope="col" class="text-center">Soal</th>
                                 <th scope="col" class="text-center">Opsi Jawaban A</th>
                                 <th scope="col" class="text-center">Opsi Jawaban B</th>
                                 <th scope="col" class="text-center">Opsi Jawaban C</th>
                                 <th scope="col" class="text-center">Opsi Jawaban D</th>
                                 <th scope="col" class="text-center">Opsi Jawaban E</th>
                                 <th scope="col" class="text-center">Jawaban Benar</th>
                                 <th scope="col" class="text-center" style="width: 12%">Actions</th>
                              </tr>
                           </thead>
                           <tbody>

                              @foreach ($PilihanGanda as $item)
                     
                              <tr>
                                 <th class="text-center">{{ $loop->iteration }}</th>
                                 <td>{{ strip_tags($item->soal) }}</td>
                                 <td>{{ $item->jawabanA }}</td>
                                 <td>{{ $item->jawabanB }}</td>
                                 <td>{{ $item->jawabanC }}</td>
                                 <td>{{ $item->jawabanD }}</td>
                                 <td>{{ $item->jawabanE }}</td>
                                 <td class="text-center">{{ $item->jawabanBenar }}</td>
                                 <td class="text-center">
                                    <a href="javascript:void(0)" class="btn btn-sm mr-1 btn-icon btn-success" onclick="edit_soal({{$item->id}})"><i class="fa fa-edit"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-sm btn-icon btn-danger" onclick="delete_soal({{$item->id}})"><i class="fa fa-trash"></i></a>
                                 </td>
                              </tr>

                              @endforeach    
                              
                           </tbody>
                        </table>
                      </div>
                      <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                        <table class="table table-striped" id="tb_true_false">
                           <thead>
                              <tr>
                                 <th scope="col" class="text-center">No</th>
                                 <th scope="col" class="text-center">Pernyataan</th>
                                 <th scope="col" class="text-center">Jawaban</th>
                                 <th scope="col" class="text-center" style="width: 12%">Actions</th>
                              </tr>
                           </thead>
                           <tbody>

                              @foreach ($TrueFalse as $item)
                              <tr>
                                 <th class="text-center">{{ $loop->iteration }}</th>
                                 <td>{{ strip_tags($item->soal)}}</td>
                                 <td class="text-center">{{$item->TrueFalse}}</td>
                                 <td class="text-center">
                                    <a href="javascript:void(0)" class="btn btn-sm mr-1 btn-icon btn-success" onclick="edit_soal({{$item->id}})"><i class="fa fa-edit"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-sm btn-icon btn-danger" onclick="delete_soal({{$item->id}})"><i class="fa fa-trash"></i></a>
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
      $("#tb_pilihan_ganda").DataTable();
      $("#tb_true_false").DataTable();
   });

   function edit_soal(id){
      window.location.href = "/admin/master_soal/" + id + "/edit";
   }

   function delete_soal(id){
      swal({
         title: "Apa anda yakin?",
         text: "Setelah dihapus, anda tidak bisa mengembalikan data ini!",
         icon: "warning",
         buttons: true,
         dangerMode: true,
         })
         .then((willDelete) => {
               if (willDelete) {
                        $.ajax({
                           url: "/admin/master_soal/delete/" + id,
                           type: "DELETE",
                           dataType: 'JSON',
                           success: function( data, textStatus, jQxhr ){
                              if(data.status == 'success'){
                                 swal("Success!", "Data berhasil dihapus", "success");
                              }else{
                                 swal("Failed!", "Data gagal dihapus", "error");
                              }
                              location.reload();
                           },
                           error: function( jqXhr, textStatus, errorThrown ){
                              console.log( errorThrown );
                              console.warn(jqXhr.responseText);
                           },
                        });
               }
         });
   }
  
</script>
@endsection