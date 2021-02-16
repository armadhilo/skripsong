@extends('partial.app')
@section('content')
<!-- Main Content -->
<div class="main-content">
   <section class="section">
      <div class="section-header">
         <h1>Master Package</h1>
         <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Forms</a></div>
            <div class="breadcrumb-item">Advanced Forms</div>
         </div>
      </div>
      <div class="section-body">
         <h2 class="section-title">Buat Package Soal</h2>
         <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
               <div class="card">
                  <div class="card-body" style="padding-bottom: 40px;">
                     <div class="col-12 col-md-12 col-lg-12 mt-2" style="margin-bottom: 24px;">
                        <div class="row">
                            <div class="col-8 col-md-8 col-lg-8">
                               <h6 class="text-primary">List Package</h6>
                           </div>
                           <div class="col-4 col-md-4 col-lg-4 text-right">
                              <a href="javascript:void(0)" class="btn btn-icon icon-left btn-success" onclick="add_package();"><i class="fa fa-plus"></i> Tambah Package</a>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-12 col-lg-12">
                        <table class="table table-striped" id="tb_package">
                           <thead>
                              <tr>
                                 <th scope="col" class="text-center">No</th>
                                 <th scope="col" class="text-center">Package</th>
                                 <th scope="col" class="text-center">Deskripsi</th>
                                 <th scope="col" class="text-center" style="width: 12%">Actions</th>
                              </tr>
                           </thead>
                           <tbody>

                              @foreach ($dataAll as $item)
                                 <tr>
                                    <th class="text-center">{{ $loop->iteration }}</th>
                                    <td>{{ $item->package }}</td>
                                    <td>{{ $item->deskripsi }}</td>
                                    <td class="text-center">
                                       <button class="btn btn-sm mr-1 btn-icon btn-success" onclick="add_package({{$item->id}})"><i class="fa fa-edit"></i></button>
                                       <a href="#" class="btn btn-sm btn-icon btn-danger"><i class="fa fa-trash"></i></a>
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
      <div class="modal" tabindex="-1" role="dialog" id="modal_package" data-backdrop="static" data-keyboard="false">
         <div class="modal-dialog" role="document">
         <form id="formPackage">
         <input type="hidden" name="id" id="id">
           <div class="modal-content">
             <div class="modal-header">
               <h5 class="modal-title" id="modalTitle"></h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>
             <div class="modal-body pb-0">
               <div class="col-12 col-md-12 col-lg-12">
                  <div class="form-group mb-4">
                     <label>Judul Package</label>
                     <input type="text" name="package" id="package" class="form-control"/>
                  </div>
               </div>
               
               <div class="col-12 col-md-12 col-lg-12">
                  <div class="form-group mb-4">
                     <label>Deskripsi</label>
                     <textarea type="text" name="deskripsi" id="deskripsi" class="form-control" style="height: 60px;"></textarea>
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
      $("#tb_package").DataTable();
   });

   function add_package(id = null){

      if(id){
         $('#modalTitle').html('Edit Package');
         $("#modal_package").modal('show');
         $(".modal-backdrop").remove();

         $.ajax({
            url: "/admin/package/" + id,
            type: "GET",
            dataType: 'JSON',
            success: function( data, textStatus, jQxhr ){
               $('#package').val(data.package);
               $('#deskripsi').val(data.deskripsi);
            },
            error: function( jqXhr, textStatus, errorThrown ){
               console.log( errorThrown );
               console.warn(jqXhr.responseText);
            },
         });

      }else{
         $('#modalTitle').html('Add Package');
         $("#modal_package").modal('show');
         $(".modal-backdrop").remove();
      }
      
   }

   $('#formPackage').submit(function(e){
      e.preventDefault();
      $.ajax({
         url: "{{ route('package.post') }}",
         type: "POST",
         data: $('#formPackage').serialize(),
         dataType: 'JSON',
         success: function( data, textStatus, jQxhr ){
            if(data.status == 'success'){
               console.log('success');
               $('#formPackage').trigger("reset");
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