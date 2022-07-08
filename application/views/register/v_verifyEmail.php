<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Verifikasi Email Anda</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/stisla-master/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/stisla-master/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/stisla-master/assets/css/components.css">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
                        <div class="login-brand">
                            Tinggal 1 langkah lagi
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Verifikasi Email Anda</h4>
                            </div>

                            <div class="card-body">
                                <form method="POST">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <!-- <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-envelope"></i>
                                                </div>
                                            </div> -->
                                            <p>
                                                Halo <?= $username ?>, tinggal satu langkah lagi dan akun anda bisa digunakan, kami telah mengirim sebuah pesan ke email <b><?= $email ?></b> sebagai tahapan verifikasi, jika anda tidak mendapatkan email apapun di kotak masuk mohon periksa juga di folder spam, atau klik tombol kirim ulang dibawah ini jika tidak menerima email sama sekali.
                                            </p>
                                            <!-- <input id="email" type="email" class="form-control" name="email" autofocus="" placeholder="Email"> -->
                                        </div>
                                    </div>

                                    <div class="form-group text-center">
                                        <!-- <button type="button" class="btn btn-lg btn-round btn-primary">
                                            Kirim ulang email verifikasi
                                        </button> -->
                                        <a href="<?= base_url('') ?>" class="btn btn-lg btn-round btn-primary">
                                            Ke Halaman Login
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="simple-footer">
                            Copyright © Bapenda Kota Malang 2022
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="<?= base_url() ?>assets/stisla-master/assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url() ?>assets/stisla-master/assets/js/popper.js"></script>
    <script src="<?= base_url() ?>assets/stisla-master/assets/js/tooltip.js"></script>
    <script src="<?= base_url() ?>assets/stisla-master/assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/stisla-master/assets/js/jquery.nicescroll.min.js"></script>
    <script src="<?= base_url() ?>assets/stisla-master/assets/js/moment.min.js"></script>
    <script src="<?= base_url() ?>assets/stisla-master/assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="<?= base_url() ?>assets/stisla-master/assets/js/scripts.js"></script>
    <script src="<?= base_url() ?>assets/stisla-master/assets/js/custom.js"></script>

</body>

</html>