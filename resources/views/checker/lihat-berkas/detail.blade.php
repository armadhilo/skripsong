@extends('partial.app')
@section('content')
<!-- Main Content -->
<div class="main-content">
   <section class="section">
      <div class="section-header">
         <h1>Detail Berkas</h1>
         <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Forms</a></div>
            <div class="breadcrumb-item">Advanced Forms</div>
         </div>
      </div>
      <div class="section-body">
         <h2 class="section-title">Detail Berkas</h2>
         <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
               <div class="card">
                  <div class="card-body" style="padding-bottom: 40px;">
                     <div class="col-12 col-md-12 col-lg-12 mt-2" style="margin-bottom: 24px;">
                        <div class="row">
                            <div class="col-8 col-md-8 col-lg-8">
                               <h6 class="text-primary">Package</h6>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-12 col-lg-12">
                        <div class="row">
                           <div class="col-12 col-md-12 col-lg-12">
                              <div class="form-group mb-4">
                                 <label>Package</label>
                                 <input type="text" class="form-control" value="{{ $data->package->package }}" readonly/>
                              </div>
                           </div>
                           <div class="col-12 col-md-12 col-lg-12">
                              <div class="form-group mb-4">
                                 <label>Deskripsi</label>
                                 <textarea type="text"  class="form-control" readonly>{{ $data->package->deskripsi }} </textarea>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="card">
                  <div class="card-body" style="padding-bottom: 40px;">
                     <div class="col-12 col-md-12 col-lg-12 mt-2" style="margin-bottom: 24px;">
                        <div class="row">
                            <div class="col-8 col-md-8 col-lg-8">
                               <h6 class="text-primary">Detail User</h6>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-12 col-lg-12">
                        <div class="row">
                           <div class="col-6 col-md-6 col-lg-6">
                              <div class="form-group mb-4">
                                 <label>Email User</label>
                                 <input type="text" class="form-control" id="email" value="{{ $data->user->email }}" readonly/>
                              </div>
                           </div>
                           <div class="col-6 col-md-6 col-lg-6">
                              <div class="form-group mb-4">
                                 <label>Nama User</label>
                                 <input type="text" class="form-control" id="nama_user" value="{{$data->user->firstname . " " .$data->user->lastname}}" readonly/>
                              </div>
                           </div>
                           <div class="col-6 col-md-6 col-lg-6">
                              <div class="form-group mb-4">
                                 <label>Lokasi Ujian</label>
                                 <input type="text" class="form-control" id="lokasi_ujian" value="{{$data->lokasi}}" readonly/>
                              </div>
                           </div>
                           <div class="col-6 col-md-6 col-lg-6">
                              <div class="form-group mb-4">
                                 <label>Profesi</label>
                                 <input type="text" class="form-control" id="profesi" value="{{$data->profesi}}"  readonly/>
                              </div>
                           </div>
                           <div class="col-12 col-md-12 col-lg-12">
                              <div class="form-group mb-4">
                                 <label>Rating yang Diujikan</label>
                                 <input type="text" class="form-control" id="rating" value="{{$data->rating}}"  readonly/>
                              </div>
                           </div>
                           <div class="col-6 col-md-6 col-lg-6">
                              <div class="form-group mb-4">
                                 <label>Foto New English Proficiency</label>
                                 <div>
                                    <button id="img_license" value="{{asset('berkas/nep/'.$data->img_nep)}}" onclick="showImage('img_nep');" class="btn btn-sm mr-1 btn-icon btn-success"><i class="fa fa-image"></i> Lihat Gambar</button>
                                 </div>
                              </div>
                           </div>
                           <div class="col-6 col-md-6 col-lg-6">
                              <div class="form-group mb-4">
                                 <label>Foto Medical Eximanination</label>
                                 <div>
                                    <button id="img_ielp" value="{{asset('berkas/ielp/'.$data->img_ielp)}}" onclick="showImage('img_ielp');" class="btn btn-sm mr-1 btn-icon btn-success"><i class="fa fa-image"></i> Lihat Gambar</button>
                                 </div>
                              </div>
                           </div>

                           @if (empty($data->acc))
                              <div class="col-12 col-md-12 col-lg-12 text-right">
                                 <button type="button" onclick="validasi({{$data->id}},'N')" class="btn btn-danger mr-1">Tolak</button>
                                 <button type="button" onclick="verifikasi({{$data->id}})" class="btn btn-primary">Validasi</button>
                              </div> 
                           @endif
                           
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

   </section>
</div>

 <!-- Modal -->
 <div class="modal" tabindex="-1" role="dialog" id="modal_img" data-backdrop="static" data-keyboard="false">
   <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title">Isi Data</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body pb-0">
         <div class="card">
            <div class="card-body">
               <div class="col-12 col-md-12 col-lg-12">
                  <img id="img_place" src="" width="670" height="auto">
               </div>
            </div>
         </div>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       </div>
      </form>
     </div>
   </div>
 </div>

 <div class="modal" tabindex="-1" role="dialog" id="modal_upload" data-backdrop="static" data-keyboard="false">
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
                        <label>New English Proficiency</label>
                        <input type="file" class="form-control" id="img_nep" required/>
                     </div>
                  </div>
                  <div class="col-6 col-md-6 col-lg-6">
                     <div class="form-group mb-4">
                        <label>Medical Examination</label>
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
@endsection
@section('js')
<script>

   function showImage(id){

      console.log('aa');
      $("#modal_img").modal('show');
      $(".modal-backdrop").remove();
      $("#img_place").attr("src","");

      var a = document.getElementById(id);
      var src = a.value;

      if(id === "img_license"){
         $(".modal-title").text("Foto Lembar License");
         $("#img_place").attr("src", src);
      }else if(id === "img_ielp"){
         $(".modal-title").text("IELP Min Lev 4");
         $("#img_place").attr("src", src);
      }else if(id === "img_kompetensi"){
         $(".modal-title").text("Surat Kompetensi");
         $("#img_place").attr("src", src);

      }else if(id === "img_pas_foto"){
         $(".modal-title").text("Pas Foto");
         $("#img_place").attr("src", src);

      }else if(id === "img_ktp"){
         $(".modal-title").text("KTP");
         $("#img_place").attr("src", src);

      }else if(id === "img_sertifikat_kesehatan"){
         $(".modal-title").text("Sertifikat Kesehatan");
         $("#img_place").attr("src", src);

      }else if(id === "img_bukti_pembayaran"){
         $(".modal-title").text("Bukti Pembayaran");
         $("#img_place").attr("src", src);

      }else if(id === "img_ijazah"){
         $(".modal-title").text("Sertifikat Kompetensi Ijazah Personil Komando Komunikasi Penerbangan");
         $("#img_place").attr("src", src);

      }
   }

   function verifikasi(id){
      $('#modal_upload').modal('show');
      $('#id').val(id);
   }

   function validasi(id,acc){
         swal({
         title: "Are you sure?",
         text: "",
         icon: "warning",
         buttons: true,
         dangerMode: true,
         })
         .then((willDelete) => {
               if (willDelete) {
                     $.ajax({
                        url: "/checker/checking/lihat_berkas/persetujuan",
                        type: "POST",
                        data: {"id" : id, "acc" : acc},
                        dataType: 'JSON',
                        success: function( data, textStatus, jQxhr ){
                           swal("Success!", "Data berhasil diproses", "success");
                           window.location.href = "/checker/checking/lihat_berkas";
                        },
                        error: function( jqXhr, textStatus, errorThrown ){
                           console.log( errorThrown );
                           console.warn(jqXhr.responseText);
                        },
                     });
               }
         });
   }

   $('#form').submit(function(e){
      e.preventDefault();
      
      var id               = $('#id').val();
      var img_nep          = $('#img_nep').prop('files')[0];
      var img_medex        = $('#img_medex').prop('files')[0];

      var data = new FormData();
      data.append('id',id );
      data.append('img_nep', img_nep);
      data.append('img_medex', img_medex);

      $.ajax({
         url: "/checker/checking/verifikasi_berhasil",
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