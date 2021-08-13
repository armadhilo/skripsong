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
         <h2 class="section-title"> @if($type == 'create') {{$data->package}} @else {{$data->package->package}}  @endif </h2>
         <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
               <div class="card">
                  <div class="row m-2" style="padding-top: 10px; padding-bottom: 6px;">
                     <div class="col-8 col-md-8 col-lg-8">
                        <h6 class="text-primary">Data Soal</h6>
                     </div>
                  </div>
                  <form id="formMasterSoal">
                     <input type="hidden" value="@if($type == 'create') @else {{$data->id}} @endif" name="id">
                     <input type="hidden" value="@if($type == 'create') {{$data->id}} @else {{$data->package->id}} @endif" name="package_id" id="package_id">
                     <div class="card-body pt-0">
                        <div class="row">
                           <div class="col-6 col-md-6 col-lg-6">
                              <div class="form-group">
                                 <label>Tipe Soal</label>
                                 <select class="form-control" id="tipe_soal" name="type" onchange="pilih_tipe_soal();">
                                    <option value="1" @if($type == 'edit' && $data->type == '1') selected  @endif>Pilihan Ganda</option>
                                    <option value="2" @if($type == 'edit' && $data->type == '2') selected  @endif>True or False</option>
                                 </select>
                              </div>
                           </div>
                              <div class="col-12 col-md-12 col-lg-12">
                                 <div class="form-group">
                                    <label id="soal_pernyataan">Soal</label>
                                    
                                    <textarea type="text" class="form-control ckeditor-text" name="soal" id="soal" autocomplete="off">@if($type == 'create') @else {!! $data->soal !!} @endif</textarea>
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
                                       <input type="radio" name="TrueFalse" value="True" class="selectgroup-input" @if($type == 'edit' && $data->TrueFalse == 'True') checked @else  checked=""  @endif>
                                       <span class="selectgroup-button">True</span>
                                       </label>
                                       <label class="selectgroup-item">
                                       <input type="radio" name="TrueFalse" value="False" class="selectgroup-input"  @if($type == 'edit' && $data->TrueFalse == 'False') checked @else @endif>
                                       <span class="selectgroup-button">False</span>
                                       </label>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-6 col-md-6 col-lg-6 pilihan-ganda">
                                 <div class="form-group">
                                    <label>Opsi Jawaban A</label>
                                    <textarea type="text" class="form-control" name="jawabanA" style="height: 60px;">@if($type == 'edit') {{ $data->jawabanA }}@endif</textarea>
                                 </div>
                              </div>
                              <div class="col-6 col-md-6 col-lg-6 pilihan-ganda">
                                 <div class="form-group">
                                    <label>Opsi Jawaban B</label>
                                    <textarea type="text" class="form-control" name="jawabanB" style="height: 60px;">@if($type == 'edit') {{ $data->jawabanB }}@endif</textarea>
                                 </div>
                              </div>
                              <div class="col-6 col-md-6 col-lg-6 pilihan-ganda">
                                 <div class="form-group">
                                    <label>Opsi Jawaban C</label>
                                    <textarea type="text" class="form-control" name="jawabanC" style="height: 60px;">@if($type == 'edit') {{ $data->jawabanC }}@endif</textarea>
                                 </div>
                              </div>
                              <div class="col-6 col-md-6 col-lg-6 pilihan-ganda">
                                 <div class="form-group">
                                    <label>Opsi Jawaban D</label>
                                    <textarea type="text" class="form-control" name="jawabanD" style="height: 60px;">@if($type == 'edit') {{ $data->jawabanD }}@endif</textarea>
                                 </div>
                              </div>
                              <div class="col-6 col-md-6 col-lg-6 pilihan-ganda">
                                 <div class="form-group">
                                    <label>Opsi Jawaban E</label>
                                    <textarea type="text" class="form-control" name="jawabanE" style="height: 60px;">@if($type == 'edit') {{ $data->jawabanE }}@endif</textarea>
                                 </div>
                              </div>
                              <div class="col-6 col-md-6 col-lg-6 pilihan-ganda">
                                 <div class="form-group">
                                    <label>Jawaban Benar</label>
                                    <select class="form-control" name="jawabanBenar">
                                       <option>- Pilih -</option>
                                       <option value="A" @if ($type == 'edit' && $data->jawabanBenar == 'A') selected @endif>Opsi A</option>
                                       <option value="B" @if ($type == 'edit' && $data->jawabanBenar == 'B') selected @endif>Opsi B</option>
                                       <option value="C" @if ($type == 'edit' && $data->jawabanBenar == 'C') selected @endif>Opsi C</option>
                                       <option value="D" @if ($type == 'edit' && $data->jawabanBenar == 'D') selected @endif>Opsi D</option>
                                       <option value="E" @if ($type == 'edit' && $data->jawabanBenar == 'E') selected @endif>Opsi E</option>
                                    </select>
                                 </div>
                              </div>
                        </div>
                     </div>
                     <div class="card-footer text-right">
                        <button type="submit" id="btn_submit" class="btn btn-primary">Save</button>
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
      $('#tipe_soal').trigger('change');
   });

   function pilih_tipe_soal(){
      var tipe_soal = $("#tipe_soal").val();
      if(tipe_soal === "1"){
         $(".pilihan-ganda").attr("hidden", false);
         $(".true-false").attr("hidden", true);
         $('[name ="jawabanA"]').attr("required", true);
         $('[name ="jawabanB"]').attr("required", true);
         $('[name ="jawabanC"]').attr("required", true);
         $('[name ="jawabanD"]').attr("required", true);
         $('[name ="jawabanE"]').attr("required", true);
      }else{
         $(".pilihan-ganda").attr("hidden", true);
         $(".true-false").attr("hidden", false);
         $('[name ="jawabanA"]').attr("required", false);
         $('[name ="jawabanB"]').attr("required", false);
         $('[name ="jawabanC"]').attr("required", false);
         $('[name ="jawabanD"]').attr("required", false);
         $('[name ="jawabanE"]').attr("required", false);
      }
   }

   $('#formMasterSoal').submit(function(e){
      e.preventDefault();
      $("#demoInside iframe").contents().find("body").length;
      for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
      }
      if($("#soal").val().length < 1){
         swal("Info", "Soal tidak boleh kosong", "info");
      }else{
         $('#btn_submit').prop('disabled', true);
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