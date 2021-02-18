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
         <h2 class="section-title">{{$soal->package->package}}</h2>
         <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
               <div class="card">
                  <div class="row m-2" style="padding-top: 10px; padding-bottom: 6px;">
                     <div class="col-8 col-md-8 col-lg-8">
                        <h6 class="text-primary">List Soal</h6>
                     </div>
                  </div>
                  <form id="formMasterSoal">
                     <input type="hidden" value="{{$soal->id}}" name="package_id">
                     <div class="card-body pt-0">
                        <div class="row">
                           <div class="col-6 col-md-6 col-lg-6">
                              <div class="form-group">
                                 <label>Tipe Soal</label>
                                 <select class="form-control" id="tipe_soal" name="type">
                                    <option value="1" @if ($soal->type == '1') checked @endif>Pilihan Ganda</option>
                                    <option value="2" @if ($soal->type == '2') checked @endif>True or False</option>
                                 </select>
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
                              <div class="col-6 col-md-6 col-lg-6 true-false">
                                 <div class="form-group">
                                    <label>Jawaban</label>
                                    <div class="selectgroup w-100">
                                       <label class="selectgroup-item">
                                       <input type="radio" name="TrueFalse" value="True" class="selectgroup-input" @if ($soal->TrueFalse == 'True') checked @endif >
                                       <span class="selectgroup-button">True</span>
                                       </label>
                                       <label class="selectgroup-item">
                                       <input type="radio" name="TrueFalse" value="False" class="selectgroup-input" @if ($soal->TrueFalse == 'False') checked @endif>
                                       <span class="selectgroup-button">False</span>
                                       </label>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-6 col-md-6 col-lg-6 pilihan-ganda">
                                 <div class="form-group">
                                    <label>Opsi Jawaban A</label>
                                    <textarea type="text" class="form-control" name="jawabanA" style="height: 60px;">{{$soal->jawabanA}}</textarea>
                                 </div>
                              </div>
                              <div class="col-6 col-md-6 col-lg-6 pilihan-ganda">
                                 <div class="form-group">
                                    <label>Opsi Jawaban B</label>
                                    <textarea type="text" class="form-control" name="jawabanB" style="height: 60px;">{{$soal->jawabanB}}</textarea>
                                 </div>
                              </div>
                              <div class="col-6 col-md-6 col-lg-6 pilihan-ganda">
                                 <div class="form-group">
                                    <label>Opsi Jawaban C</label>
                                    <textarea type="text" class="form-control" name="jawabanC" style="height: 60px;">{{$soal->jawabanC}}</textarea>
                                 </div>
                              </div>
                              <div class="col-6 col-md-6 col-lg-6 pilihan-ganda">
                                 <div class="form-group">
                                    <label>Opsi Jawaban D</label>
                                    <textarea type="text" class="form-control" name="jawabanD" style="height: 60px;">{{$soal->jawabanD}}</textarea>
                                 </div>
                              </div>
                              <div class="col-6 col-md-6 col-lg-6 pilihan-ganda">
                                 <div class="form-group">
                                    <label>Opsi Jawaban E</label>
                                    <textarea type="text" class="form-control" name="jawabanE" style="height: 60px;">{{$soal->jawabanE}}</textarea>
                                 </div>
                              </div>
                              <div class="col-6 col-md-6 col-lg-6 pilihan-ganda">
                                 <div class="form-group">
                                    <label>Jawaban Benar</label>
                                    <select class="form-control"  name="jawabanBenar">
                                       <option>- Pilih -</option>
                                       <option value="A" @if ($soal->jawabanBenar == 'A') selected @endif >Opsi A</option>
                                       <option value="B" @if ($soal->jawabanBenar == 'B') selected @endif >Opsi B</option>
                                       <option value="C" @if ($soal->jawabanBenar == 'C') selected @endif >Opsi C</option>
                                       <option value="D" @if ($soal->jawabanBenar == 'D') selected @endif >Opsi D</option>
                                       <option value="E" @if ($soal->jawabanBenar == 'E') selected @endif >Opsi E</option>
                                    </select>
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
      var tipe_soal = $("#tipe_soal").val();
      if(tipe_soal === "1"){
         $(".pilihan-ganda").attr("hidden", false);
         $(".true-false").attr("hidden", true);
      }else{
         $(".pilihan-ganda").attr("hidden", true);
         $(".true-false").attr("hidden", false);
      }
   });

   $('#formMasterSoal').submit(function(e){
      e.preventDefault();
      for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
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
            }else{
               swal("Success!", "Proses gagal", "error");
            }
         },
         error: function( jqXhr, textStatus, errorThrown ){
            console.log( errorThrown );
            console.warn(jqXhr.responseText);
         },
      });
   });

   function goListSoal($id){
      window.location.href="/admin/master_soal/" + $id;
   }
</script>
@endsection