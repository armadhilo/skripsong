@extends('partial.app')
@section('content')
<!-- Main Content -->
<div class="main-content">
   <section class="section">
      <div class="section-header">
         <h1>Publish Soal</h1>
         <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Forms</a></div>
            <div class="breadcrumb-item">Advanced Forms</div>
         </div>
      </div>
      <div class="section-body">
         <h2 class="section-title">Publish Soal</h2>
         <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
               <div class="card">
                  <div class="card-body" style="padding-bottom: 40px;">
                     <div class="col-12 col-md-12 col-lg-12 mt-2" style="margin-bottom: 24px;">
                        <div class="row">
                            <div class="col-8 col-md-8 col-lg-8">
                               <h6 class="text-primary">List Publish Soal</h6>
                           </div>
                           <div class="col-4 col-md-4 col-lg-4 text-right">
                              <a href="javascript:void(0)" class="btn btn-icon icon-left btn-success" onclick="publish_soal();"><i class="fa fa-plus"></i> Publish Soal</a>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-12 col-lg-12">
                        <table class="table table-striped" id="tb_publish">
                           <thead>
                              <tr>
                                 <th scope="col" class="text-center">No</th>
                                 <th scope="col" class="text-center">Package</th>
                                 <th scope="col" class="text-center">Durasi</th>
                                 <th scope="col" class="text-center">Waktu Publish</th>
                                 <th scope="col" class="text-center" style="width: 12%">Actions</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <th class="text-center">1</th>
                                 <td>Package A</td>
                                 <td class="text-center">60 menit</td>
                                 <td class="text-center">27 Januari 2021 12:00</td>
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
      <div class="modal" tabindex="-1" role="dialog" id="modal_publish" data-backdrop="static" data-keyboard="false">
         <div class="modal-dialog" role="document">
           <div class="modal-content">
             <div class="modal-header">
               <h5 class="modal-title">Publish Soal</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>
             <div class="modal-body pb-0">
               <div class="col-12 col-md-12 col-lg-12">
                  <div class="form-group mb-4">
                     <label>Package</label>
                     <select class="form-control">
                        <option>- Pilih -</option>
                        <option>Package A</option>
                        <option>Package B</option>
                     </select>
                  </div>
               </div>
               <div class="col-12 col-md-12 col-lg-12">
                  <div class="form-group mb-4">
                     <label>Durasi (menit)</label>
                     <input type="number" class="form-control"/>
                  </div>
               </div>
               <div class="col-12 col-md-12 col-lg-12">
                  <div class="form-group mb-4">
                     <label>Waktu Publish</label>
                     <input type="datetime-local" onchange="checkDate()" required="" class="form-control" id="deadline" name="deadline">
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
      $("#tb_publish").DataTable();
   });

   function publish_soal(){
      $("#modal_publish").modal('show');
      $(".modal-backdrop").remove();
   }

   function checkDate(){
		var selectedText = document.getElementById('deadline').value;
   		var selectedDate = new Date(selectedText);
   		var now = new Date();
	    if (selectedDate < now) {
	    alertify.error('Deadline tidak boleh tanggal kemarin');
	  	$('#deadline').val('');
	    }
	}

</script>
@endsection