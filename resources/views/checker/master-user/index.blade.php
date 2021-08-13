@extends('partial.app')
@section('content')
<!-- Main Content -->
<div class="main-content">
   <section class="section">
      <div class="section-header">
         <h1>Master User</h1>
      </div>
      <div class="section-body">
         <h2 class="section-title">Master User</h2>
         <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
               <div class="card">
                  <div class="card-body" style="padding-bottom: 40px;">
                     <div class="col-12 col-md-12 col-lg-12 mt-2" style="margin-bottom: 24px;">
                        <div class="row">
                            <div class="col-8 col-md-8 col-lg-8">
                               <h6 class="text-primary">List User</h6>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-12 col-lg-12">
                        <table class="table table-striped" id="tb">
                           <thead>
                              <tr>
                                 <th scope="col" class="text-center">No</th>
                                 <th scope="col" class="text-center">Nama</th>
                                 <th scope="col" class="text-center">Email</th>
                                 <th scope="col" class="text-center">Role</th>
                                 <th scope="col" class="text-center" style="width: 12%">Actions</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($list as $item)
                              <tr>
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td>{{$item->firstname . " " . $item->lastname}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->role}}</td>
                                <td class="text-center">
                                    <button class="btn btn-sm mr-1 btn-icon btn-warning" onclick="reset_password('/checker/master-user/reset-password/{{$item->id}}')"><i class="fa fa-key"></i></button>
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
   </section>
</div>
@endsection
@section('js')
<script>
   $(document).ready(function() {
      $("#tb").DataTable();
   });

   function reset_password(url){
      swal({
         title: "Apa anda yakin?",
         text: "Setelah diedit, anda tidak bisa mengembalikan password data ini!",
         icon: "warning",
         buttons: true,
         dangerMode: true,
         })
         .then((willDelete) => {
            $.ajax({
               url: url,
               type: "GET",
               dataType: 'JSON',
               success: function( data, textStatus, jQxhr ){
                  if(data.status == '200'){
                     swal(data.message, { icon: 'success', })
                     .then(function() {
                        location.reload();
                     });
                  }
               },
               error: function( jqXhr, textStatus, errorThrown ){
                  console.log( errorThrown );
                  console.warn(jqXhr.responseText);
               },
            });
         });
   }


</script>
@endsection