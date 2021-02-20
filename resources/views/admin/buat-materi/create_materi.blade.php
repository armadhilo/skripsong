@extends('partial.app')
@section('content')
<!-- Main Content -->
<script type="text/javascript" src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
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
         <h2 class="section-title"> AA </h2>
         <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
               <div class="card">
                  <div class="row m-2" style="padding-top: 10px; padding-bottom: 6px;">
                     <div class="col-8 col-md-8 col-lg-8">
                        <h6 class="text-primary">List Soal</h6>
                     </div>
                  </div>
                  <form id="formMasterSoal">
                     <input type="hidden" value="" name="package_id" id="package_id">
                     <div class="card-body pt-0">
                        <div class="row">
                              <div class="col-6 col-md-6 col-lg-6 pilihan-ganda">
                                 <div class="form-group">
                                    <label>Opsi Jawaban A</label>
                                    <textarea type="text" class="form-control" name="jawabanA" style="height: 60px;"></textarea>
                                 </div>
                              </div>
                              <div class="col-12 col-md-12 col-lg-12">
                                 <div class="form-group">
                                    <label id="soal_pernyataan">Soal</label>
                                    
                                    <textarea type="text" class="form-control ckeditor-text" name="soal" id="soal" autocomplete="off"></textarea>
                                    <script type="text/javascript">
                                          CKEDITOR.replace( 'soal',
                                          {
                                             height: 200,
                                             filebrowserUploadUrl: "base64",
                                          });
                                    </script>
                                 </div>
                              </div>
                              
                              
                              
                        </div>
                     </div>
                     <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Save</button>
                     </div>
                     </form>
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
      
   });


   $('#formMasterSoal').submit(function(e){
      e.preventDefault();
      $("#demoInside iframe").contents().find("body").length;
      for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
      }
      if($("#soal").val().length < 1){
         swal("Info", "Soal tidak boleh kosong", "info");
      }else{
         $.ajax({
         url: "{{ route('soal.post') }}",
         type: "POST",
         data: $('#formMasterSoal').serialize(),
         dataType: 'JSON',
         success: function( data, textStatus, jQxhr ){
            if(data.status == 'success'){
               swal("Success!", "Proses berhasil", "success");
               console.log('success');
               $('#formMasterSoal').trigger("reset");
               goListSoal();
            }else{
               swal("Success!", "Proses gagal", "error");
            }
         },
         error: function( jqXhr, textStatus, errorThrown ){
            console.log( errorThrown );
            console.warn(jqXhr.responseText);
         },
      });
      }
      
   });

   function goListSoal(){
      var id = $("#package_id").val();
      window.location.href="/admin/master_soal/" + id;
   }
</script>
@endsection