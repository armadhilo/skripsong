@extends('partial.app')
@section('content')
<!-- Main Content -->
<div class="main-content">
   <section class="section">
      <div class="section-header">
         <h1>Package A</h1>
         <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Forms</a></div>
            <div class="breadcrumb-item">Advanced Forms</div>
         </div>
      </div>
      <div class="section-body">
         <h2 class="section-title">Package A</h2>
         <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
               <div class="card">
                  <div class="card-body" style="padding-bottom: 40px;">
                     <div class="col-12 col-md-12 col-lg-12 mt-2" style="margin-bottom: 24px;">
                        <div class="row">
                            <div class="col-8 col-md-8 col-lg-8">
                               <h6 class="text-primary">Soal</h6>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-12 col-lg-12">
                        <div class="row mb-2">
                           <div class="col-2 col-md-1 col-lg-1 pr-0 text-center">
                              <p>1. </p>
                           </div>
                           <div class="col-10 col-md-11 col-lg-11 pl-0">
                              <p style="margin-bottom: 6px;">
                                 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                              </p>
                              <input type="radio" id="opsiA" name="opsiJawaban" value="opsi1">
                              <label style="padding-left: 10px;"> Opsi Jawaban A</label><br>
                              <input type="radio" id="opsiB" name="opsiJawaban" value="opsi2">
                              <label style="padding-left: 10px;"> Opsi Jawaban B</label><br>
                              <input type="radio" id="opsiD" name="opsiJawaban" value="opsi3">
                              <label style="padding-left: 10px;"> Opsi Jawaban C</label><br>
                              <input type="radio" id="opsiD" name="opsiJawaban" value="opsi4">
                              <label style="padding-left: 10px;"> Opsi Jawaban D</label><br>
                           </div>
                        </div>
                        <div class="row mb-2">
                           <div class="col-2 col-md-1 col-lg-1 pr-0 text-center">
                              <p>2. </p>
                           </div>
                           <div class="col-10 col-md-11 col-lg-11 pl-0">
                              <p style="margin-bottom: 6px;">
                                 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                              </p>
                              <div class="selectgroup w-50">
                                 <label class="selectgroup-item">
                                     <input type="radio" name="opsi_pic" value="Y" class="selectgroup-input" checked="">
                                     <span class="selectgroup-button">True</span>
                                 </label>
                                 <label class="selectgroup-item">
                                     <input type="radio" name="opsi_pic" value="N" class="selectgroup-input">
                                     <span class="selectgroup-button">False</span>
                                 </label>
                             </div>
                           </div>
                        </div>
                     </div>

                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-primary">Finish</button>
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
      $("#tb_package").DataTable();
   });

</script>
@endsection