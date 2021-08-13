@extends('partial.app')
@section('content')
<!-- Main Content -->
<div class="main-content">
   <section class="section">
      <div class="section-header">
         <h1>Ambil Package Ujian</h1>
      </div>
      <div class="section-body">
         <h2 class="section-title">List Package</h2>
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
                                 <th scope="col" class="text-center">Package</th>
                                 <th scope="col" class="text-center">Deskripsi</th>
                                 <th scope="col" class="text-center" style="width: 18%">Actions</th>
                              </tr>
                           </thead>
                           <tbody>

                              @foreach ($list as $item)
                                 <tr>
                                    <th class="text-center">{{ $loop->iteration }}</th>
                                    <td>{{ $item->package }}</td>
                                    <td>{{ $item->deskripsi }}</td>
                                    <td class="text-center">
                                       <a href="javascript:void(0)" onclick="ambil_package({{$item->id}});" class="btn btn-sm mr-1 btn-icon btn-success"><i class="fa fa-check"></i> Ambil Package</a>
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
      <div class="modal" tabindex="-1" role="dialog" id="modal_package" data-backdrop="static" data-keyboard="false">
         <div class="modal-dialog modal-lg" role="document">
           <div class="modal-content">
             <div class="modal-header">
               <h5 class="modal-title">Isi Data</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>
             <div class="modal-body pb-0">
                <form id="form">
                   <input type="text" hidden id="id" name="id">
                     <div class="row">
                        <div class="col-6 col-md-6 col-lg-6">
                           <div class="form-group mb-4">
                              <label>Lokasi Ujian</label>
                              <input type="text" class="form-control" id="lokasi_ujian" required/>
                           </div>
                        </div>
                        <div class="col-6 col-md-6 col-lg-6">
                           <div class="form-group mb-4">
                              <label>Profesi</label>
                              <input type="text" class="form-control" id="profesi" required/>
                           </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-12">
                           <div class="form-group mb-4">
                              <label>Rating yang Diujikan</label>
                              <input type="text" class="form-control" id="rating" required/>
                           </div>
                        </div>
                        <div class="col-6 col-md-6 col-lg-6">
                           <div class="form-group mb-4">
                              <label>Foto New English Proficiency</label>
                              <input type="file" class="form-control" id="img_nep" required/>
                           </div>
                        </div>
                        <div class="col-6 col-md-6 col-lg-6">
                           <div class="form-group mb-4">
                              <label>Foto Medical Eximanination</label>
                              <input type="file" class="form-control" id="img_medex" required/>
                           </div>
                        </div>
                       
                     </div>
             </div>
             <div class="modal-footer">
               <button type="submit" class="btn btn-primary">Submit</button>
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
      $("#tb_package").DataTable();
   });

   function ambil_package(id){
      $("#modal_package").modal('show');
      $(".modal-backdrop").remove();
      $('#id').val(id)
   }

   $('#form').submit(function(e){
      e.preventDefault();
      
      var id                        = $('#id').val();
      var lokasi_ujian              = $('#lokasi_ujian').val();
      var profesi                   = $('#profesi').val();
      var rating                    = $('#rating').val();
      var img_nep                   = $('#img_nep').prop('files')[0];
      var img_medex                 = $('#img_medex').prop('files')[0];

      var data = new FormData();
          data.append('id',id );
          data.append('lokasi', lokasi_ujian);
          data.append('profesi', profesi);
          data.append('rating', rating);
          data.append('img_nep', img_nep);
          data.append('img_medex', img_medex);

      $.ajax({
         url: "/checker/daftar-ujian/ambil-package",
         dataType: 'JSON',
         cache: false,
         contentType: false,
         processData: false,
         data: data,
         type: 'POST',
         success: function( data, textStatus, jQxhr ){
            if(data.status == 'success'){
               swal("Success!", "Proses berhasil", "success");
               console.log('success');
               $('#form').trigger("reset");
               $("#modal_package").modal('hide');
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
   })

</script>
@endsection