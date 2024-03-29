@extends('partial.app')
@section('content')
<!-- Main Content -->
<div class="main-content">
   <section class="section">
      <div class="section-header">
         <h1>Master Kelompok Ujian</h1>
      </div>
      <div class="section-body">
         <h2 class="section-title">Buat Kelompok Ujian Soal</h2>
         <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
               <div class="card">
                  <div class="card-body" style="padding-bottom: 40px;">
                     <div class="col-12 col-md-12 col-lg-12 mt-2" style="margin-bottom: 24px;">
                        <div class="row">
                            <div class="col-8 col-md-8 col-lg-8">
                               <h6 class="text-primary">Data Kelompok Ujian</h6>
                           </div>
                           <div class="col-4 col-md-4 col-lg-4 text-right">
                              <a href="javascript:void(0)" class="btn btn-icon icon-left btn-success" onclick="add_package();"><i class="fa fa-plus"></i> Tambah Package</a>
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
                                 <th scope="col" class="text-center" style="width: 12%">Actions</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <th class="text-center">1</th>
                                 <td>Kelompok Ujian A</td>
                                 <td>lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore</td>
                                 <td class="text-center">
                                    <a href="#" class="btn btn-sm mr-1 btn-icon btn-success"><i class="fa fa-edit"></i></a>
                                    <a href="#" class="btn btn-sm btn-icon btn-danger"><i class="fa fa-trash"></i></a>
                                 </td>
                              </tr>
                              
                           </tbody>
                        </table>
                     </div>

                  </div>
               </div>
            </div>
         </div>
      </div>



      <!-- Modal -->
      <div class="modal" tabindex="-1" role="dialog" id="modal_package" data-backdrop="static" data-keyboard="false">
         <div class="modal-dialog" role="document">
           <div class="modal-content">
             <div class="modal-header">
               <h5 class="modal-title">Tambah Kelompok Ujian</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>
             <div class="modal-body pb-0">
               <div class="col-12 col-md-12 col-lg-12">
                  <div class="form-group mb-4">
                     <label>Judul Kelompok Ujian</label>
                     <input type="text" class="form-control"/>
                  </div>
               </div>
               
               <div class="col-12 col-md-12 col-lg-12">
                  <div class="form-group mb-4">
                     <label>Deskripsi</label>
                     <textarea type="text" class="form-control" style="height: 60px;"></textarea>
                  </div>
               </div>
             </div>
             <div class="modal-footer">
               <button type="button" class="btn btn-primary">Save</button>
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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

   function add_package(){
      $("#modal_package").modal('show');
      $(".modal-backdrop").remove();
   }

</script>
@endsection