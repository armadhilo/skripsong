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
         <p hidden id="demo">{{$package->package->durasi}}</p>
         <h2 class="section-title">{{$package->package->package}} - <span id="time"></span></h2>
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
                        @foreach ($soal as $item)
                              <div class="row mb-2">
                                 <div class="col-2 col-md-1 col-lg-1 pr-0 text-center">
                                    <p> {{$loop->iteration}} </p>
                                 </div>
                                 <div class="col-10 col-md-11 col-lg-11 pl-0">
                                    <p style="margin-bottom: 6px;">
                                       {!! $item->soal !!}
                                    </p>
                                    @if ($item->type == '1')
                                       <input type="radio" id="opsiA" name="opsiJawaban-{{$item->id}}" value="A-{{$item->id}}" onclick="jawab(this.value)" @if ($item->jawabanUser == 'A') checked @endif>
                                       <label style="padding-left: 10px;"> {{$item->jawabanA}} </label><br>
                                       <input type="radio" id="opsiB" name="opsiJawaban-{{$item->id}}" value="B-{{$item->id}}" onclick="jawab(this.value)" @if ($item->jawabanUser == 'B') checked @endif>
                                       <label style="padding-left: 10px;"> {{$item->jawabanB}} </label><br>
                                       <input type="radio" id="opsiD" name="opsiJawaban-{{$item->id}}" value="C-{{$item->id}}" onclick="jawab(this.value)" @if ($item->jawabanUser == 'C') checked @endif>
                                       <label style="padding-left: 10px;"> {{$item->jawabanC}} </label><br>
                                       <input type="radio" id="opsiD" name="opsiJawaban-{{$item->id}}" value="D-{{$item->id}}" onclick="jawab(this.value)" @if ($item->jawabanUser == 'D') checked @endif>
                                       <label style="padding-left: 10px;"> {{$item->jawabanD}} </label><br>
                                       <input type="radio" id="opsiD" name="opsiJawaban-{{$item->id}}" value="E-{{$item->id}}" onclick="jawab(this.value)" @if ($item->jawabanUser == 'E') checked @endif>
                                       <label style="padding-left: 10px;"> {{$item->jawabanE}} </label><br>
                                    @else
                                       <div class="selectgroup w-50">
                                          <label class="selectgroup-item">
                                             <input type="radio" name="opsi_pic-{{$item->id}}" value="True-{{$item->id}}" class="selectgroup-input" onclick="jawab(this.value)" @if ($item->jawabanUser == 'True') checked @endif>
                                             <span class="selectgroup-button">True</span>
                                          </label>
                                          <label class="selectgroup-item">
                                             <input type="radio" name="opsi_pic-{{$item->id}}" value="False-{{$item->id}}" class="selectgroup-input" onclick="jawab(this.value)" @if ($item->jawabanUser == 'False') checked @endif>
                                             <span class="selectgroup-button">False</span>
                                          </label>
                                       </div>
                                    @endif
                                    
                                 </div>
                              </div>
                        @endforeach
                        
                     </div>

                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-primary" id="btn_finish" onclick="finish({{$package->id}})">Finish</button>
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
      document.getElementById("timer");
   });

   function jawab(answer){
      $.ajax({
         url: '/user/kerjakan_soal/jawab',
         type: "POST",
         data: {data : answer},
         dataType: 'JSON',
         success: function( data, textStatus, jQxhr ){
         },
         error: function( jqXhr, textStatus, errorThrown ){
            console.log( errorThrown );
            console.warn(jqXhr.responseText);
         },
      });
   }

   function finish(id){
      $.ajax({
         url: '/user/kerjakan_soal/finish',
         type: "POST",
         data: {data : id},
         dataType: 'JSON',
         success: function( data, textStatus, jQxhr ){
            swal("Success!", "Berhasil Mengerjakan Soal", "success");
            window.setTimeout(function(){location.href="/user/sudah_dikerjakan"},2000);
         },
         error: function( jqXhr, textStatus, errorThrown ){
            console.log( errorThrown );
            console.warn(jqXhr.responseText);
         },
      });
   }

   function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.text(minutes + ":" + seconds);

        if (--timer < 0) {
            timer = duration;
            $('#btn_finish').click();
        } 
    }, 1000);
}

jQuery(function ($) {
    var fiveMinutes = 60 * $('#demo').text(),
        display = $('#time');
    startTimer(fiveMinutes, display);
});

</script>
@endsection