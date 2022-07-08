<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Register &mdash; Macito</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/selectric/selectric.css') ?>">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/stisla-master') ?>/assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/stisla-master') ?>/assets/css/components.css">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="<?php echo base_url('assets/stisla-master') ?>/assets/img/logo_dishub.png" alt="logo" width="80">
            </div>

            <div class="card card-primary">
              <div class="card-header">
                <h4>Registrasi Akun Macito Kota Malang</h4>
              </div>

              <div class="card-body">
                <?php if ($this->session->flashdata('pesan')) : ?>
                  <div class="alert <?= $this->session->flashdata('pesan')['alertType'] ?>">
                    <p> <?= $this->session->flashdata('pesan')['info']; ?></p>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button> -->
                  </div>
                <?php endif ?>
                <form method="POST" action="<?php echo base_url('register/register') ?>" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="nik">NIK</label>
                    <input id="nik" type="text" class="form-control" name="txt_nik">
                    <div class="feedback"></div>
                  </div>

                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input id="nama" type="text" class="form-control" name="txt_nama">
                    <div class="feedback"></div>
                  </div>

                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input id="alamat" type="text" class="form-control" name="txt_alamat">
                    <div class="feedback"></div>
                  </div>

                  <div class="form-group">
                    <label for="no_hp">No. Hp</label>
                    <input id="no_hp" type="text" class="form-control" name="txt_no_hp">
                    <div class="feedback"></div>
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="txt_email">
                    <div class="feedback"></div>
                  </div>

                  <div class="row">
                    <div class="form-group col-sm-6">
                      <label for="password" class="d-block">Password</label>
                      <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="txt_password">
                      <div class="feedback"></div>
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                    <div class="form-group col-sm-6">
                      <label for="password2" class="d-block">Password Confirmation</label>
                      <input id="password2" type="password" class="form-control" name="txt_password-confirm">
                      <div class="feedback"></div>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Daftar
                    </button>
                  </div>
                </form>
                <div class="form-group">
                  <div class="float">
                    <a href="<?= base_url('Login_Controller') ?>" class="text-small">Sudah punya akun? Login disini</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; DISHUB Kota Malang 2022
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
  <script src="<?= base_url('assets/stisla-master') ?>/assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="<?php echo base_url('assets/modules') ?>/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="<?php echo base_url('assets/modules') ?>/selectric/jquery.selectric.min.js"></script>

  <!-- Template JS File -->
  <script src="<?php echo base_url('assets/stisla-master') ?>/assets/js/scripts.js"></script>
  <script src="<?php echo base_url('assets/stisla-master') ?>/assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?php echo base_url('assets/stisla-master') ?>/assets/js/page/auth-register.js"></script>
  <script>
    $(".needs-validation").submit(function(e) {
      return usernameValidation() && passwordValidation();
    });

    $("#username, #password, #password2").keyup(function(e) {
      usernameValidation();
      passwordValidation();
    })

    function usernameValidation() {
      var format = /[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
      if ($("#username").val().length < 5) {
        $("#username").removeClass("is-valid");
        $("#username").addClass("is-invalid");

        $("#username ~ .feedback").html("Jumlah Karakter Kurang Dari 5");
        $("#username ~ .feedback").removeClass("valid-feedback");
        $("#username ~ .feedback").addClass("invalid-feedback");
        return false;
      } else if (!format.test($("#username").val())) {
        $("#username").removeClass("is-invalid");
        $("#username").addClass("is-valid");

        $("#username ~ .feedback").html("");
        $("#username ~ .feedback").removeClass("invalid-feedback");
        $("#username ~ .feedback").addClass("valid-feedback");
        return true;
      } else {
        $("#username").removeClass("is-valid");
        $("#username").addClass("is-invalid");

        $("#username ~ .feedback").html("Username Tidak Boleh Mengandung Spasi Maupun Karakter Spesial");
        $("#username ~ .feedback").removeClass("valid-feedback");
        $("#username ~ .feedback").addClass("invalid-feedback");
        return false;
      }
    }

    function passwordValidation() {
      if ($("#password").val().length < 5) {
        $("#password").removeClass("is-valid");
        $("#password").addClass("is-invalid");

        $("#password ~ .feedback").html("Jumlah Karakter Password Kurang Dari 5");
        $("#password ~ .feedback").removeClass("valid-feedback");
        $("#password ~ .feedback").addClass("invalid-feedback");
        return false;
      } else if ($("#password").val() != $("#password2").val()) {
        $("#password2").removeClass("is-valid");
        $("#password2").addClass("is-invalid");

        $("#password2 ~ .feedback").html("Password Konfirmasi Harus Bernilai Sama.");
        $("#password2 ~ .feedback").removeClass("valid-feedback");
        $("#password2 ~ .feedback").addClass("invalid-feedback");
        return true;
      } else {
        $("#password, #password2").removeClass("is-invalid");
        $("#password, #password2").addClass("is-valid");

        $("#password ~ .feedback, #password2 ~ .feedback").html("");
        $("#password ~ .feedback, #password2 ~ .feedback").removeClass("invalid-feedback");
        $("#password ~ .feedback, #password2 ~ .feedback").addClass("valid-feedback");
        return true;
      }
    }
  </script>
</body>

</html>