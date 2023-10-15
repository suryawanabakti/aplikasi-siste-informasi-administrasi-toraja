<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="/assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>SIA Toraja</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="/assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="/assets/js/config.js"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link gap-2">
                  <span class="app-brand-text demo text-body fw-bolder">SIA Toraja</span>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">Pendaftaran SIA! 👋</h4>
              <p class="mb-4">Silahkan melakukan pendaftaran</p>
              @if ($errors->any())
@foreach ($errors->all() as $error)
<div class="alert alert-danger alert-dismissible show fade">
                              <div class="alert-body">
                                  <button class="close" data-dismiss="alert">
                                      <span>×</span>
                                  </button>
                                  <div>{{ $error }}</div>
                              </div>
        </div>
@endforeach
@endif



              <form id="formAuthentication" class="mb-3" action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="" class="form-label">Nik</label>
                    <input type="text" class="form-control" name="nik" required>
                </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" required name="name">
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="" class="form-label">Jenis Kelamin</label>
                      <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                        <option value="Laki-laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                  </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                </div>
              
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir" required>
                    </div>
                </div>
                
                <div class="row">
                  <div class="col-md-6 mb-3">
                      <label for="" class="form-label">Agama</label>
                      <select name="agama" id="agama" class="form-control">
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katholik">Katholik</option>
                        <option value="Budha">Budha</option>
                      </select>
                  </div>
                  <div class="col-md-6 mb-3">
                      <label for="" class="form-label">Alamat</label>
                      <input type="text" class="form-control" name="alamat" required>
                  </div>
              </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Golongan Darah</label>
                      <select  class="form-control" name="golongan_darah" required>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="O">O</option>
                        <option value="AB">AB</option>
                      </select>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="" class="form-label">Foto KTP</label>
                    <input type="file" required class="form-control" name="foto_ktp">
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="" class="form-label">Foto KK</label>
                    <input type="file" required class="form-control" name="foto_kk">
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="" class="form-label">Foto Pas Foto</label>
                    <input type="file" required class="form-control" name="pas_foto">
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Password</label>
                     <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Password Confirmation</label>
                     <input type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>
               
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit">Sign Up</button>
                </div>
              </form>

              <p class="text-center">
                <span>Sudah punya akun?</span>
                <a href="/login">
                  <span>Login Disini</span>
                </a>
              </p>
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    <!-- / Content -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="/assets/vendor/libs/popper/popper.js"></script>
    <script src="/assets/vendor/js/bootstrap.js"></script>
    <script src="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="/assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
