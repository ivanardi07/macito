<?php
$this->load->view('layouts/header');
$this->load->view('layouts/sidebar');
$this->load->view('layouts/blank');

?>

<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Detail User</h4>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('UserProfile_Controller/update/' . $data_profile['id_user']) ?>" method="POST">
                        <div class="form-group">
                            <label for="inputEmail">Email</label>
                            <input type="text" class="form-control" id="txt_email" name="txt_email" value="<?= $data_profile['email']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="inputNama">Nama</label>
                            <input type="text" class="form-control" id="txt_nama" name="txt_nama" value="<?= $data_profile['nama']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="inputAlamat">Alamat</label>
                            <input type="text" class="form-control" id="txt_alamat" name="txt_alamat" value="<?= $data_profile['alamat']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="inputTelp">Telp</label>
                            <input type="text" class="form-control" id="txt_no_hp" name="txt_no_hp" value="<?= $data_profile['no_hp']; ?>">
                        </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Foto KTP</h4>
                    <div class="card-header-action">
                        <a href="#" class="btn btn-primary"><i class="fas fa-upload"></i> Upload Foto</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chocolat-parent">
                        <a href="<?= base_url('assets/stisla-master/assets/img/example-image.jpg') ?>" class="chocolat-image" title="Just an example">
                            <div data-crop-image="300" style="overflow: hidden; position: relative; height: 300px;">
                                <img alt="image" src="<?= base_url('assets/stisla-master/assets/img/example-image.jpg') ?>" class="img-fluid">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
</div>
<?php
$this->load->view('layouts/footer');
?>