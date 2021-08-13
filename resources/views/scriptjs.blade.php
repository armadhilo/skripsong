<script type="text/javascript">

    $('#form_submit').on('submit', function(e){
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
                   url:  $('#form_submit').attr('action'),
                   type: $('#form_submit').attr('method'),
                   data: $('#form_submit').serialize(),
                   success: function(response){
                      setTimeout(function () {  $('#modal_loading').modal('hide'); }, 500);
                      console.log(response);
                      if(response.status == 200){
                         swal(response.message, { icon: 'success', })
                           .then(function() {
                              location.reload();
                           });
                         $("#modal").modal('hide');
                      }
                      else if(response.status == 201){
                         swal(response.message, { icon: 'success', });
                         $("#modal").modal('hide');
                         window.location.href = response.link;
                      }
                      else if(response.status == 203){
                         swal(response.message, { icon: 'success', });
                         $("#modal").modal('hide');
                         tb.ajax.reload(null, false);
                      }
                      else if(response.status == 300){
                         swal(response.message, { icon: 'error', });
                      }

                   },error: function (jqXHR, textStatus, errorThrown){
                      console.log('Error json');
                   }
                });
             }
       });
    });
 
     $('#form-upload').submit(function(e){
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
                   url:  $('#form-upload').attr('action'),
                   type: $('#form-upload').attr('method'),
                   enctype: 'multipart/form-data',
                   data: new FormData($('#form-upload')[0]),
                   cache: false,
                   contentType: false,
                   processData: false,
                   success: function(response) {
                      setTimeout(function () {  $('#modal_loading').modal('hide'); }, 500);
                      $("#form-upload")[0].reset();
                      $("#path_file_text").text("");
                      if(response.status == 200){
                         $("#modal_upload").modal('hide');
                         iziToast.success({
                            title: 'Success!',
                            message: response.message,
                            position: 'topRight'
                         });
                         tb.ajax.reload(null, false);
                      }
                      else if(response.status == 201){
                         $("#modal_upload").modal('hide');
                         iziToast.success({
                            title: 'Success!',
                            message: response.message,
                            position: 'topRight'
                            });
                         window.location.href = response.link;
                      }
                      else if(response.status == 203){
                         $("#modal_upload").modal('hide');
                         iziToast.success({
                            title: 'Success!',
                            message: response.message,
                            position: 'topRight'
                            });
                         tb.ajax.reload(null, false);
                      }
                      else if(response.status == 300){
                         iziToast.error({
                         title: 'Error!',
                         message: response.message,
                         position: 'topRight'
                         });
                      }
                   },error: function (jqXHR, textStatus, errorThrown){
                      console.log('Error json');
                   }
                });
             }
       });
   })
    
    function hanyaAngka(e, decimal) {
       var key;
       var keychar;
       if (window.event) {
          key = window.event.keyCode;
       } else if (e) {
          key = e.which;
       } else {
          return true;
       }
       keychar = String.fromCharCode(key);
       if ((key==null) || (key==0) || (key==8) ||  (key==9) || (key==13) || (key==27) ) {
          return true;
       } else if ((("0123456789").indexOf(keychar) > -1)) {
          return true;
       } else if (decimal && (keychar == ".")) {
          return true;
       } else {
          return false;
       }
    }
 
    function get_path_file(){
       var fullPath = $("#file_excel").val();    
       var filename = fullPath.replace(/^.*[\\\/]/, '');
       $("#path_file_text").text(filename);
    }
 
    function edit_action(url, modal_text){
       save_method = 'edit';
       $("#modal").modal('show');
       $(".modal-title").text(modal_text);
       $(".modal-backdrop").remove();
 
       $.ajax({
          url : url,
          type: "GET",
          dataType: "JSON",
          success: function(response){
             Object.keys(response).forEach(function (key) {
                var elem_name = $('[name=' + key + ']');
                if (elem_name.hasClass('selectric')) {
                   elem_name.val(response[key]).change().selectric('refresh');
                }else if(elem_name.hasClass('select2')){
                   elem_name.select2("trigger", "select", { data: { id: response[key] } });
                }else if(elem_name.hasClass('selectgroup-input')){
                   $("input[name="+key+"][value=" + response[key] + "]").prop('checked', true);
                }else if(elem_name.hasClass('my-ckeditor')){
                   CKEDITOR.instances[key].setData(response[key]);
                }else if(elem_name.hasClass('round-number')){
                   elem_name.val(Math.round(response[key]));
                }else{
                   elem_name.val(response[key]);
                }
             });
          },error: function (jqXHR, textStatus, errorThrown){
             console.log('Error get data');
          }
       });
    }
 
    function delete_action(url, nama){
       swal({
             title: 'Apakah anda yakin?',
             text: 'Apakah anda yakin akan menghapus data ' + nama + "?",
             icon: 'warning',
             buttons: true,
             dangerMode: true,
       })
       .then((willDelete) => {
             if (willDelete) {
                $("#modal_loading").modal('show');
                $.ajax({
                   url : url,
                   type: "DELETE",
                   dataType: "JSON",
                   success: function(response){
                      setTimeout(function () {  $('#modal_loading').modal('hide'); }, 500);
 
                      if(response.status === 200){
                         swal(response.message, {  icon: 'success', });
                         $("#modal").modal('hide');
                         tb.ajax.reload(null, false);
                      }else{
                         swal(response.message, {  icon: 'error', });
                      }
                      
                   },error: function (jqXHR, textStatus, errorThrown){
                      console.log('Error delete data');
                      // $("#modal_loading").modal('hide');
                   }
                });
             }
       });
    }
 
    function reload(){
       tb.ajax.reload(null,false);
    }
 
    function reset_all_select(){
       $('.select2').each(function(){
          var name = $(this).attr("name");
          $('[name="'+name+'"]').select2().trigger('change');
       });
 
       $('.selectric').each(function(){
          var name = $(this).attr("name");
          $('[name="'+name+'"]').selectric();
       });
    }
 
 
 </script>