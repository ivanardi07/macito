<?php
$this->load->view('layouts/header');
$this->load->view('layouts/sidebar');
$this->load->view('layouts/blank');

?>

<div class="section-body">
    <div class="row">
        <div class="msg" style="display:none;">
            <?= $this->session->flashdata('msg'); ?>
        </div>
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Detail User</h4>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/adminprofile_controller/update') ?>" method="POST">
                        <div class="form-group">
                            <label for="inputEmail">Email</label>
                            <input type="text" class="form-control" id="txt_email" name="txt_email" value="<?php echo $data_profile->email; ?>">
                        </div>
                        <div class="form-group">
                            <label for="inputNama">Nama</label>
                            <input type="text" class="form-control" id="txt_nama" name="txt_nama" value="<?php echo $data_profile->nama; ?>">
                        </div>
                        <div class="form-group">
                            <label for="inputAlamat">Alamat</label>
                            <input type="text" class="form-control" id="txt_alamat" name="txt_alamat" value="<?php echo $data_profile->alamat; ?>">
                        </div>
                        <div class="form-group">
                            <label for="inputTelp">Telp</label>
                            <input type="text" class="form-control" id="txt_no_hp" name="txt_no_hp" value="<?php echo $data_profile->no_hp; ?>">
                        </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
                </form>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-6">
            <div class="card author-box card-primary">
                <div class="card-body">
                    <div class="author-box-left">
                        <img alt="image" src="<?= base_url('assets/stisla-master/assets/img/avatar/avatar-1.png') ?>" class="rounded-circle author-box-picture">
                        <div class="clearfix"></div>
                    </div>
                    <div class="author-box-details">
                        <div class="author-box-name">
                            <a href="#">Halaman Admin</a>
                        </div>
                        <div class="author-box-job">Malang City Tour</div>
                        <div class="author-box-description">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat.</p>
                        </div>
                        <div class="mb-2 mt-3">
                            <div class="text-small font-weight-bold">Follow Hasan On</div>
                        </div>
                        <a href="#" class="btn btn-social-icon mr-1 btn-facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="btn btn-social-icon mr-1 btn-twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="btn btn-social-icon mr-1 btn-github">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="#" class="btn btn-social-icon mr-1 btn-instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <div class="w-100 d-sm-none"></div>
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