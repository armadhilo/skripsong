<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
      <title>Login &mdash; Stisla</title>
      <!-- General CSS Files -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
      <!-- CSS Libraries -->
      <link rel="stylesheet" href="{{ asset('modules/bootstrap-social/bootstrap-social.css') }}">
      <!-- Template CSS -->
      <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
      <meta name="csrf-token" content="{{ csrf_token() }}" />
   </head>
   <body>
      <div id="app">
         <section class="section">
            <div class="d-flex flex-wrap align-items-stretch">
                <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white id-login">
                    <div class="p-4 m-3">
                      <img src="{{asset('assets/img/logo.jpg')}}" alt="logo" width="80" class="shadow-light rounded-circle mb-5 mt-2">
                      <h4 class="text-dark font-weight-normal">Selamat datang <span class="font-weight-bold">AirNav</span></h4>
                      <p class="text-muted"> Sebelum login pastikan anda telah mempunyai akun, apabila belum silahkan registrasi terlebih dahulu.</p>
                      <div id="alert"></div>
                      @if ($message = Session::get('msg'))
                        <div class="alert alert-success alert-block">
                          <button type="button" class="close" data-dismiss="alert">×</button>
                          <strong>{{ $message }}</strong>
                        </div>
                      @endif

                      @if ($errors->any())
                        <div class="alert alert-danger">
                          <ul>
                            @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                        </div>
                      @endif

                      <form id="formLogin" class="needs-validation" novalidate="">
                          <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                            <div class="invalid-feedback">
                                Mohon isi email anda
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="d-block">
                                <label for="password" class="control-label">Password</label>
                            </div>
                            <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                            <div class="invalid-feedback">
                                Mohon isi password anda
                            </div>
                          </div>
                          <div class="form-group text-right">
                            {{-- <a href="auth-forgot-password.html" class="float-left mt-3">
                            Forgot Password?
                            </a> --}}
                            <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                            Login
                            </button>
                          </div>
                          <div class="mt-5 text-center">
                            Belum punya akun? <a  href="javascript:void(0)" onclick="log_res('register')">Buat akun baru</a>
                          </div>
                      </form>
                      {{-- 
                      <div class="text-center mt-5 text-small">
                          Copyright &copy; Your Company. Made with 💙 by Stisla
                      </div>
                      --}}
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white id-register" hidden>
                  <div class="p-4 m-3">
                    <img src="../assets/img/stisla-fill.svg" alt="logo" width="80" class="shadow-light rounded-circle mb-5 mt-2">
                    <h4 class="text-dark font-weight-normal">Pendaftaran</h4>
                    <form id="formRegister">
                      <input type="hidden" value="user" name="role">
                      <div class="row">
                        <div class="form-group col-6">
                          <label for="first_name">Nama Pertama</label>
                          <input id="first_name" type="text" class="form-control" name="firstname" autofocus>
                        </div>
                        <div class="form-group col-6">
                          <label for="last_name">Nama Terakhir</label>
                          <input id="last_name" type="text" class="form-control" name="lastname">
                        </div>
                      </div>
    
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control" name="email">
                        <div class="invalid-feedback">
                        </div>
                      </div>
    
                      <div class="row">
                        <div class="form-group col-6">
                          <label for="password" class="d-block">Password</label>
                          <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                          <div id="pwindicator" class="pwindicator">
                            <div class="bar"></div>
                            <div class="label"></div>
                          </div>
                        </div>
                        <div class="form-group col-6">
                          <label for="password2" class="d-block">Konfirmasi Password</label>
                          <input id="password2" type="password" class="form-control" name="passwordconfirm">
                        </div>
                      </div>

    
                      {{-- <div class="form-group">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                          <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                        </div>
                      </div> --}}
    
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                          Daftar Sekarang!
                        </button>
                      </div>
                      <div class="mt-5 text-center">
                        Sudah punya akun? <a href="javascript:void(0)" onclick="log_res('login')">Login disini</a>
                      </div>
                    </form>
                    {{-- 
                    <div class="text-center mt-5 text-small">
                        Copyright &copy; Your Company. Made with 💙 by Stisla
                    </div>
                    --}}
                  </div>
              </div>
               <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="{{asset('assets/img/bg3.jpg')}}">
                  <div class="absolute-bottom-left index-2">
                     <div class="text-light p-5 pb-2">
                        <div class="mb-5 pb-3">
                           <h1 class="mb-2 display-4 font-weight-bold">AirNav</h1>
                           <h5 class="font-weight-normal text-muted-transparent">"Menyediakan layanan navigasi penerbangan yang mengutamakan keselamatan, efisiensi penerbangan dan ramah lingkungan demi memenuhi ekspektasi pengguna jasaStruggle that you do today is the single way to build a better future."</h5>
                        </div>
                        {{-- Photo by <a class="text-light bb" target="_blank" href="https://unsplash.com/photos/a8lTjWJJgLA">Justin Kauffman</a> on <a class="text-light bb" target="_blank" href="https://unsplash.com">Unsplash</a> --}}
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
      <!-- General JS Scripts -->
      <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script src="{{ asset('assets/js/stisla.js') }}"></script>
      <!-- JS Libraies -->
      <!-- Template JS File -->
      <script src="{{ asset('assets/js/scripts.js') }}"></script>
      <script src="{{ asset('assets/js/custom.js') }}"></script>
      <!-- Page Specific JS File -->\
      <script type="text/javascript">
         $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });

         $('#formLogin').submit(function(e){
          e.preventDefault();
          $.ajax({
            url: "{{ route('login.post') }}",
            type: "POST",
            data: $('#formLogin').serialize(),
            dataType: 'JSON',
            success: function( data, textStatus, jQxhr ){
              if(data.status == 'success'){
                console.log(data.url);
                window.location.href = data.url;
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

         $('#formRegister').submit(function(e){
           e.preventDefault();
           $.ajax({
            url: "{{ route('register.post') }}",
            type: "POST",
            data: $('#formRegister').serialize(),
            dataType: 'JSON',
            success: function( data, textStatus, jQxhr ){
              if(data.status == 'success'){
                swal("Success!", "Proses berhasil", "success");
                location.reload();
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

         function log_res(val){
            if(val === "login"){
                $(".id-login").attr("hidden", false);
                $(".id-register").attr("hidden", true);
            }else{
                $(".id-login").attr("hidden", true);
                $(".id-register").attr("hidden", false);
            }
         }
      </script>
      <!-- Page Specific JS File -->
   </body>
</html>