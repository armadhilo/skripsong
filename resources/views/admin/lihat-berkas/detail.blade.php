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
                                 <input type="text" class="form-control" value="{{ $header->package->package }}" readonly/>
                              </div>
                           </div>
                           <div class="col-12 col-md-12 col-lg-12">
                              <div class="form-group mb-4">
                                 <label>Deskripsi</label>
                                 <textarea type="text"  class="form-control" readonly>{{ $header->package->deskripsi }} </textarea>
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
                                 <input type="text" class="form-control" id="email" value="{{ $header->user->email }}" readonly/>
                              </div>
                           </div>
                           <div class="col-6 col-md-6 col-lg-6">
                              <div class="form-group mb-4">
                                 <label>Nama User</label>
                                 <input type="text" class="form-control" id="nama_user" value="{{$header->user->firstname . " " .$header->user->lastname}}" readonly/>
                              </div>
                           </div>
                           <div class="col-6 col-md-6 col-lg-6">
                              <div class="form-group mb-4">
                                 <label>Lokasi Ujian</label>
                                 <input type="text" class="form-control" id="lokasi_ujian" value="{{$header->lokasi}}" readonly/>
                              </div>
                           </div>
                           <div class="col-6 col-md-6 col-lg-6">
                              <div class="form-group mb-4">
                                 <label>Profesi</label>
                                 <input type="text" class="form-control" id="profesi" value="{{$header->profesi}}"  readonly/>
                              </div>
                           </div>
                           <div class="col-6 col-md-6 col-lg-6">
                              <div class="form-group mb-4">
                                 <label>Rating yang Diujikan</label>
                                 <input type="text" class="form-control" id="rating" value="{{$header->rating}}"  readonly/>
                              </div>
                           </div>
                           <div class="col-6 col-md-6 col-lg-6">
                              <div class="form-group mb-4">
                                 <label>Foto Lembar License</label>
                                 <div>
                                    <button id="img_license" value="{{asset('berkas/license/'.$header->img_license)}}" onclick="showImage('img_license');" class="btn btn-sm mr-1 btn-icon btn-success"><i class="fa fa-image"></i> Lihat Gambar</button>
                                 </div>
                              </div>
                           </div>
                           <div class="col-6 col-md-6 col-lg-6">
                              <div class="form-group mb-4">
                                 <label>IELP Min Lev 4</label>
                                 <div>
                                    <button id="img_ielp" value="{{asset('berkas/ielp/'.$header->img_ielp)}}" onclick="showImage('img_ielp');" class="btn btn-sm mr-1 btn-icon btn-success"><i class="fa fa-image"></i> Lihat Gambar</button>
                                 </div>
                              </div>
                           </div>
                           <div class="col-6 col-md-6 col-lg-6">
                              <div class="form-group mb-4">
                                 <label>Surat Kompetensi</label>
                                 <div>
                                    <button id="img_kompetensi" value="{{asset('berkas/kompetensi/'.$header->img_kompetensi)}}" onclick="showImage('img_kompetensi');" class="btn btn-sm mr-1 btn-icon btn-success"><i class="fa fa-image"></i> Lihat Gambar</button>
                                 </div>
                              </div>
                           </div>
                           <div class="col-6 col-md-6 col-lg-6">
                              <div class="form-group mb-4">
                                 <label>Pas Foto</label>
                                 <div>
                                    <button id="img_pas_foto" value="{{asset('berkas/foto/'.$header->img_pas_foto)}}" onclick="showImage('img_pas_foto');" class="btn btn-sm mr-1 btn-icon btn-success"><i class="fa fa-image"></i> Lihat Gambar</button>
                                 </div>
                              </div>
                           </div>
                           <div class="col-6 col-md-6 col-lg-6">
                              <div class="form-group mb-4">
                                 <label>KTP</label>
                                 <div>
                                    <button id="img_ktp" value="{{asset('berkas/ktp/'.$header->img_ktp)}}" onclick="showImage('img_ktp');" class="btn btn-sm mr-1 btn-icon btn-success"><i class="fa fa-image"></i> Lihat Gambar</button>
                                 </div>
                              </div>
                           </div>
                           <div class="col-6 col-md-6 col-lg-6">
                              <div class="form-group mb-4">
                                 <label>Sertifikat Kesehatan</label>
                                 <div>
                                    <button id="img_sertifikat_kesehatan" value="{{asset('berkas/sertifikat_kesehatan/'.$header->img_sertifikat_kesehatan)}}" onclick="showImage('img_sertifikat_kesehatan');" class="btn btn-sm mr-1 btn-icon btn-success"><i class="fa fa-image"></i> Lihat Gambar</button>
                                 </div>
                              </div>
                           </div>
                           <div class="col-6 col-md-6 col-lg-6">
                              <div class="form-group mb-4">
                                 <label>Bukti Pembayaran</label>
                                 <div>
                                    <button id="img_bukti_pembayaran" value="{{ asset('berkas/bukti_pembayaran/'.$header->img_bukti_pembayaran)}}" onclick="showImage('img_bukti_pembayaran');" class="btn btn-sm mr-1 btn-icon btn-success"><i class="fa fa-image"></i> Lihat Gambar</button>
                                 </div>
                              </div>
                           </div>
                           <div class="col-6 col-md-6 col-lg-6">
                              <div class="form-group mb-4">
                                 <label>Sertifikat Kompetensi Ijazah Personil Komando Komunikasi Penerbangan</label>
                                 <div>
                                    <button id="img_ijazah" value="{{ asset('berkas/ijazah/'.$header->img_ijazah)}}" onclick="showImage('img_ijazah');" class="btn btn-sm mr-1 btn-icon btn-success"><i class="fa fa-image"></i> Lihat Gambar</button>
                                 </div>
                              </div>
                           </div>
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
@endsection
@section('js')
<script>
   $(document).ready(function() {
      
   });

   function showImage(id){
      $("#modal_img").modal('show');
      $(".modal-backdrop").remove();
      $("#img_place").attr("src","");

      if(id === "img_license"){

         var a = document.getElementById('img_license');
         var src = a.value;

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

</script>
@endsection