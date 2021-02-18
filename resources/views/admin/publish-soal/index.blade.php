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
                              @foreach ($listPublish as $item)
                                 <tr>
                                    <th class="text-center">{{$loop->iteration}}</th>
                                    <td>{{$item->package}}</td>
                                    <td class="text-center">{{$item->durasi}} Menit</td>
                                    <td class="text-center">{{ date('d F Y H:i:s', strtotime($item->publish)) }}</td>
                                    <td class="text-center">
                                       <button onclick="publish_soal({{$item->id}})" class="btn btn-sm mr-1 btn-icon btn-success"><i class="fa fa-edit"></i></button>
                                       <a href="javascript:void(0)" class="btn btn-sm btn-icon btn-danger" onclick="delete_publish({{$item->id}})"><i class="fa fa-trash"></i></a>
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
             <form id="formPublish">
               <div class="modal-body pb-0">
                  <div class="col-12 col-md-12 col-lg-12">
                     <div class="form-group mb-4">
                        <label>Package</label>
                        <div id="placeForm"></div>
                        <select class="form-control" id="id" name="id">
                           <option selected value="">- Pilih -</option>
                           @if (count($dataPackage) > 0)
                              @foreach ($dataPackage as $item)
                                 <option value="{{$item->id}}">{{$item->package}}</option>
                              @endforeach 
                           @else
                              <option disabled>Tidak Ada Package</option>
                           @endif
                        </select>
                     </div>
                  </div>
                  <div class="col-12 col-md-12 col-lg-12">
                     <div class="form-group mb-4">
                        <label>Durasi (menit)</label>
                        <input type="number" name="durasi" id="durasi" class="form-control" required/>
                     </div>
                  </div>
                  <div class="col-12 col-md-12 col-lg-12">
                     <div class="form-group mb-4">
                        <label>Waktu Publish</label>
                        <input type="datetime-local" onchange="checkDate()" required="" class="form-control" id="deadline" name="publish">
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               </div>
            </form>
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

   $('#formPublish').submit(function(e){
      e.preventDefault();
      if($("#id").val() == ""){
         swal("Info!", "Mohon pilih package soal", "info");
      }else{
            $.ajax({
                  url: "{{ route('publish.publish') }}",
                  type: "POST",
                  data: $('#formPublish').serialize(),
                  dataType: 'JSON',
                  success: function( data, textStatus, jQxhr ){
                     if(data.status == 'success'){
                        swal("Success!", "Proses berhasil", "success");
                        $('#formPublish').trigger("reset");
                        location.reload();
                     }else{
                        swal("Failed!", "Proses gagal", "error");
                     }
                  },
                  error: function( jqXhr, textStatus, errorThrown ){
                     console.log( errorThrown );
                     console.warn(jqXhr.responseText);
                  },
               });
      }
      
   })

   function publish_soal(id = null){
      if(id){
         $("#modal_publish").modal('show');
         $(".modal-backdrop").remove();
         document.getElementById('id').remove();
         $.ajax({
            url: "/admin/publish_package/" + id,
            type: "GET",
            dataType: 'JSON',
            success: function( data, textStatus, jQxhr ){
               console.log(data);
               $('#placeForm').html(`
                  <input type="text" name="id" value="${data.id}" class="form-control" readonly/>
               `);
               $('#durasi').val(data.durasi);
               var dateVal = new Date(data.publish);
               var day = dateVal.getDate().toString().padStart(2, "0");
               var month = (1 + dateVal.getMonth()).toString().padStart(2, "0");
               var hour = dateVal.getHours().toString().padStart(2, "0");
               var minute = dateVal.getMinutes().toString().padStart(2, "0");
               var sec = dateVal.getSeconds().toString().padStart(2, "0");
               var ms = dateVal.getMilliseconds().toString().padStart(3, "0");
               var inputDate = dateVal.getFullYear() + "-" + (month) + "-" + (day) + "T" + (hour) + ":" + (minute) + ":" + (sec) + "." + (ms);
               $('#deadline').val(inputDate);
            },
            error: function( jqXhr, textStatus, errorThrown ){
               console.log( errorThrown );
               console.warn(jqXhr.responseText);
            },
         });

      }else{
         $("#modal_publish").modal('show');
         $(".modal-backdrop").remove();
      }
      
   }

   function delete_publish(id){
      swal({
         title: "Are you sure?",
         text: "Once deleted, you will not be able to recover this data!",
         icon: "warning",
         buttons: true,
         dangerMode: true,
         })
         .then((willDelete) => {
               if (willDelete) {
                        $.ajax({
                              url: "/admin/publish_package/" + id,
                              type: "DELETE",
                              dataType: 'JSON',
                              success: function( data, textStatus, jQxhr ){
                                 if(data.status == 'success'){
                                    swal("Success!", "Data berhasil dihapus", "success");
                                 }else{
                                    swal("Failed!", "Data gagal dihapus", "error");
                                 }
                                 location.reload();
                                 alert(data);
                              },
                              error: function( jqXhr, textStatus, errorThrown ){
                                 console.log( errorThrown );
                                 console.warn(jqXhr.responseText);
                              },
                           });
               }
         });
      
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