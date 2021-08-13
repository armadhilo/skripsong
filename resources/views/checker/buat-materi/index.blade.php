@extends('partial.app')
@section('content')
<script type="text/javascript" src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
<!-- Main Content -->
<div class="main-content">
   <section class="section">
      <div class="section-header">
         <h1>Materi</h1>
      </div>
      <div class="section-body">
         <h2 class="section-title">Buat Materi</h2>
         <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
               <div class="card">
                  <div class="card-body" style="padding-bottom: 40px;">
                     <div class="col-12 col-md-12 col-lg-12 mt-2" style="margin-bottom: 24px;">
                        <div class="row">
                            <div class="col-8 col-md-8 col-lg-8">
                               <h6 class="text-primary">List Materi</h6>
                           </div>
                           <div class="col-4 col-md-4 col-lg-4 text-right">
                              <a href="javascript:void(0)" class="btn btn-icon icon-left btn-success" onclick="add();"><i class="fa fa-plus"></i> Tambah Materi</a>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-12 col-lg-12">
                        <table class="table table-striped" id="tb">
                           <thead>
                              <tr>
                                 <th scope="col" class="text-center">No</th>
                                 <th scope="col" class="text-center">Judul Materi</th>
                                 <th scope="col" class="text-center">Deskripsi Singkat</th>
                                 <th scope="col" class="text-center">Materi</th>
                                 <th scope="col" class="text-center" style="width: 12%">Actions</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($list as $item)
                              <tr>
                                 <td>{{ $loop->iteration }}</td>
                                 <td>{{ $item->judul }}</td>
                                 <td>{{ $item->deskripsi }}</td>
                                 <td class="text-center">
                                    <a href="{{asset('/berkas/materi/'.$item->materi)}}" target="_blank"><button class="btn btn-warning">Lihat Materi</button></a>
                                 </td>
                                 <td class="text-center">
                                    <button class="btn btn-sm mr-1 btn-icon btn-success" onclick="add({{$item->id}})"><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-sm btn-icon btn-danger" onclick="delete_materi({{$item->id}})"><i class="fa fa-trash"></i></button>
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
         <form id="form">
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
                           <label>Judul Materi</label>
                           <input type="text" name="judul" id="judul" name="judul" class="form-control" required/>
                        </div>
                     </div>
                     <div class="col-6 col-md-6 col-lg-6">
                        <div class="form-group mb-4">
                           <label>Deskripsi Singkat</label>
                           <textarea type="text" name="deskripsi" id="deskripsi" name="deskripsi" class="form-control" required></textarea>
                        </div>
                     </div>
                     <div class="col-12 col-md-12 col-lg-12">
                        <div class="form-group mb-4">
                           <label>Materi</label>
                           <input type="file" class="form-control" id="materi" name="materi"/>
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

   function delete_materi(id){
         swal({
         title: "Are you sure?",
         text: "Setelah dihapus, anda tidak bisa mengembalikan data ini!",
         icon: "warning",
         buttons: true,
         dangerMode: true,
         })
         .then((willDelete) => {
               if (willDelete) {
                  $.ajax({
                     url: "/admin/buat_materi/" + id,
                     type: "DELETE",
                     dataType: 'JSON',
                     success: function( data, textStatus, jQxhr ){
                        if(data.status == 'success'){
                           swal("Success!", "Data berhasil dihapus", "success");
                        }else{
                           swal("Failed!", "Data gagal dihapus", "error");
                        }
                        location.reload();
                     },
                     error: function( jqXhr, textStatus, errorThrown ){
                        console.log( errorThrown );
                        console.warn(jqXhr.responseText);
                     },
                  });
               }
         });
   }

   function add(id = null){
      $('#modalTitle').html('Edit Materi');
      $("#modal").modal('show');
      $(".modal-backdrop").remove();
      if(id){
         $('#modalTitle').html('Edit Materi');
         $("#modal_package").modal('show');
         $(".modal-backdrop").remove();

         $.ajax({
            url: "/checker/buat_materi/" + id,
            type: "GET",
            dataType: 'JSON',
            success: function( data, textStatus, jQxhr ){
               $('#judul').val(data.judul);
               $('#deskripsi').val(data.deskripsi);
               $('#id').val(data.id);
            },
            error: function( jqXhr, textStatus, errorThrown ){
               console.log( errorThrown );
               console.warn(jqXhr.responseText);
            },
         });

      }else{
         $('#modalTitle').html('Add Materi');
         $("#modal_package").modal('show');
         $(".modal-backdrop").remove();
         $('#form')[0].reset();
         CKEDITOR.instances['materi'].setData("");
      }
      
   }

   $('#form').submit(function(e){
      e.preventDefault();
      var data = new FormData(this);

      $.ajax({
         url: "{{ route('buat_materi.post') }}",
         cache: false,
         contentType: false,
         processData: false,
         data: data,
         type: "POST",
         dataType: 'JSON',
         success: function( data, textStatus, jQxhr ){
            if(data.status == 'success'){
               swal("Success!", "Proses berhasil", "success");
               $('#form').trigger("reset");
               $("#modal_package").modal('hide');
            }else if(data.status == '300'){
               swal("Failed!", data.message, "error");
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