<?php
$this->load->view('layouts/header');
$this->load->view('layouts/sidebar');
$this->load->view('layouts/blank');
// $this->load->view('sptpd/sptpd_insert');
?>

<div class="section-body">
    <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-stats">
                    <div class="card-stats-title">User Terdaftar
                    </div>
                    <div class="card-stats-items">
                        <div class="card-stats-item">
                            <?php if (!empty($user_aktif)) : ?>
                                <div class="card-stats-item-count"><?= $user_aktif ?></div>
                            <?php endif ?>

                            <div class="card-stats-item-label">Aktif</div>

                        </div>
                        <div class="card-stats-item">

                            <div class="card-stats-item-count"><?php echo $user_nonaktif ?></div>
                            <div class="card-stats-item-label">Nonaktif</div>
                        </div>
                        <!-- <div class="card-stats-item">
                        <div class="card-stats-item-count">23</div>
                        <div class="card-stats-item-label">Ditolak</div>
                    </div> -->
                    </div>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total User</h4>
                    </div>
                    <div class="card-body">
                        <?php echo $user_aktif + $user_nonaktif ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-stats">
                    <div class="card-stats-title">Jumlah Tiket
                    </div>
                    <div class="card-stats-items">
                        <div class="card-stats-item">
                            <div class="card-stats-item-count">2</div>
                            <div class="card-stats-item-label">Dipesan</div>
                        </div>
                        <div class="card-stats-item">
                            <div class="card-stats-item-count">25</div>
                            <div class="card-stats-item-label">Tersedia</div>
                        </div>
                        <!-- <div class="card-stats-item">
                        <div class="card-stats-item-count">23</div>
                        <div class="card-stats-item-label">Ditolak</div>
                    </div> -->
                    </div>
                </div>
                <div class="card-icon shadow-warning bg-warning">
                    <i class="fas fa-archive"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total tiket Bus Macito</h4>
                    </div>
                    <div class="card-body">
                        27
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="section-title">NPWPD
    </div>
    <div class="form-group">
        <div class="input-group">
            <select class="custom-select" id="inputGroupSelect04">
                <option selected>1022.312.010</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">Button</button>
            </div>
        </div>
    </div> -->
</div>
</section>
</div>
<?php
$this->load->view('layouts/footer');
?>