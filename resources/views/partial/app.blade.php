<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
      <title>Blank Page &mdash; Stisla</title>
      <!-- General CSS Files -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
      <!-- CSS Libraries -->
      <!-- Template CSS -->
      <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
      <meta name="csrf-token" content="{{ csrf_token() }}" />
   </head>
   <body>
      <div id="app">
         <div class="main-wrapper">
            <div class="navbar-bg"></div>

            @include('partial.header')
            
            @yield('content')

             <!-- Modal Load-->
             <div class="modal fade" role="dialog" id="modal_loading" data-keyboard="false" data-backdrop="static">
               <div class="modal-dialog modal-dialog-centered" role="document">
               <div class="modal-content">
                   <div class="modal-body pt-0" style="background-color: #FAFAF8; border-radius: 6px;">
                       <div class="text-center">
                           <img style="border-radius: 4px; height: 140px;" src="{{ asset('assets/img/skripsong/loader.gif') }}" alt="Loading">
                           <h6 style="position: absolute; bottom: 10%; left: 38%;" class="pb-2">Mohon Tunggu..</h6>
                       </div>
                   </div>
               </div>
           </div>

         </div>
      </div>
      <!-- General JS Scripts -->
      <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
      <script src="{{ asset('assets/js/stisla.js') }}"></script>
      <!-- JS Libraies -->
      <!-- Template JS File -->
      <script src="{{ asset('assets/js/scripts.js') }}"></script>
      <script src="{{ asset('assets/js/custom.js') }}"></script>
      <!-- Page Specific JS File -->
      @include('scriptjs')
      <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function(){
            // swal("Good job!", "You clicked the button!", "success");

        });
    </script>
      @yield('js')
   </body>
</html>