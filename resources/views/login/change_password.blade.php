@extends('partial.app')
@section('content')
<!-- Main Content -->
<div class="main-content">
   <section class="section">
      <div class="section-header">
         <h1>Change Password</h1>
         <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Change Password</a></div>
         </div>
      </div>

       <div class="section-body">
         <div class="row">
          
            <div class="col-md-12 col-lg-12 col-12">
               <div class="tab-content">
                  <!-- Main Content -->
                  <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                     <div class="card">
                         <form id="form_password" action="/change-password" method="POST" autocomplete="off">
                            <div class="card-header">
                               <h4>Change Password</h4>
                            </div>
                            <div class="card-body pt-0">
                               <div class="row">
                                  <div class="form-group col-md-12 col-12">
                                     <label>Old Password</label>
                                     <input type="password" class="form-control" name="old_password" id="old_password" required>
                                  </div>
                                  <div class="form-group col-md-6 col-12">
                                     <label>New Password</label>
                                     <input type="password" class="form-control" name="password" id="password" required>
                                  </div>
                                  <div class="form-group col-md-6 col-12">
                                     <label>Re-type New Password</label>
                                     <input type="password" class="form-control" name="confirm_password" id="confirm_password" required>
                                  </div>
                               </div>
                               
                            </div>
                            <div class="card-footer text-right">
                               <button type="submit" class="btn btn-primary">Change Password</button>
                            </div>
                         </form>
                      </div>
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
   //CHANGE PASS
   $('#form_password').on('submit', function(e){
      e.preventDefault();
      swal({
            title: 'Yakin?',
            text: 'Apakah anda yakin akan menyimpan data ini?',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
      })
      .then((willDelete) => {
            if (willDelete) {
               $("#modal_loading").modal('show');
               $.ajax({
                  url:  $('#form_password').attr('action'),
                  type: $('#form_password').attr('method'),
                  data: $('#form_password').serialize(),
                  success: function(response){
                     setTimeout(function () {  $('#modal_loading').modal('hide'); }, 500);
                     console.log(response);
                     if(response.status == 200){
                        swal(response.message, { icon: 'success', });
                        $("#form_password")[0].reset();
                     } else {
                        swal(response.message, { icon: 'error', });
                     }
                  },error: function (jqXHR, textStatus, errorThrown){
                     console.log('Error json');
                  }
               });
            }
      });
   });

</script>
@endsection
