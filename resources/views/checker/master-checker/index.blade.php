@extends('partial.app')
@section('content')
<!-- Main Content -->
<div class="main-content">
   <section class="section">
      <div class="section-header">
         <h1>Master Checker</h1>
      </div>
      <div class="section-body">
         <h2 class="section-title">Buat Checker</h2>
         <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
               <div class="card">
                  <div class="card-body" style="padding-bottom: 40px;">
                     <div class="col-12 col-md-12 col-lg-12 mt-2" style="margin-bottom: 24px;">
                        <div class="row">
                            <div class="col-8 col-md-8 col-lg-8">
                               <h6 class="text-primary">List Checker</h6>
                           </div>
                           <div class="col-4 col-md-4 col-lg-4 text-right">
                              <a href="javascript:void(0)" class="btn btn-icon icon-left btn-success" onclick="add();"><i class="fa fa-plus"></i> Tambah Checker</a>
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
                                    <button class="btn btn-sm mr-1 btn-icon btn-warning" onclick="reset_password('/checker/master-checker/reset-password/{{$item->id}}')"><i class="fa fa-key"></i></button>
                                    <button class="btn btn-sm mr-1 btn-icon btn-success" onclick="edit('/checker/master-checker/detail/{{$item->id}}')"><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-sm btn-icon btn-danger" onclick="delete_action('/checker/master-checker/delete/{{$item->id}}', {{$item->firstname . ' ' . $item->lastname}})"><i class="fa fa-trash"></i></button>
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
      <div class="modal" tabindex="-1" role="dialog" id="modal" data-backdrop="static" data-keyboard="false">
         <div class="modal-dialog modal-lg" role="document">
         <form id="form_submit" method="POST" action="/checker/master-checker/store-update">
           <div class="modal-content">
             <div class="modal-header">
               <h5 class="modal-title" id="modalTitle"></h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>
             <div class="modal-body pb-0">
                <div class="row">
                     <input type="text" hidden name="id" id="id">
                     <div class="col-6 col-md-6 col-lg-6">
                        <div class="form-group mb-4">
                           <label>Nama Pertama</label>
                           <input type="text" name="firstname" id="firstname" name="judul" class="form-control" required/>
                        </div>
                     </div>
                     <div class="col-6 col-md-6 col-lg-6">
                        <div class="form-group mb-4">
                           <label>Nama Terakhir</label>
                           <input type="text" name="lastname" id="lastname" name="judul" class="form-control" required/>
                        </div>
                     </div>
                     <div class="col-12 col-md-12 col-lg-12">
                        <div class="form-group mb-4">
                            <label>Email</label>
                            <input type="email" name="email" id="email" name="judul" class="form-control" required/>
                        </div>
                     </div>
                </div>
               
             </div>
             <div class="modal-footer">
               <button type="submit" class="btn btn-primary">Save</button>
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             </div>
           </div>
         </form>
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

    function add(){
        $("#modal").modal('show');
        $(".modal-title").text('Tambah Checker');
        $(".modal-backdrop").remove();
        $("#form_submit")[0].reset();
        $("[name=id]").attr("readonly", false);
    }


   function edit(url){
      $("[name=id]").attr("readonly", true);
      edit_action(url, 'Edit Master Checker');
   }

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