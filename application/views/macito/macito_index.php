<?php
$this->load->view('layouts/header');
$this->load->view('layouts/sidebar');
$this->load->view('layouts/blank');
?>

<div class="section-body">
    <div class="section-title">Kelola Bus</div>
    <div class="form-group">

        <div class="col-12 col-md-12 col-lg-20">
            <div class="card">
                <div class="card-header">
                    <h4>Bus Macito </h4>
                    <div class="card-header-form">
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-md table-sm table-lg table-xl">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Bus</th>
                                    <th>Kuota</th>
                                    <th>Jam Operasional</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($data_user as $key => $val) : ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $val->email ?></td>
                                        <td><?= $val->nama ?></td>
                                        <td><?= $val->alamat ?></td>
                                        <td>
                                            <?php if ($val->is_verified == 0) { ?>
                                                <div class="badge badge-danger">Nonaktif</div>
                                            <?php
                                            } else { ?>
                                                <div class="badge badge-success">Aktif</div>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <!-- <button class="btn btn-warning trigger--fire-modal-2" id="modal-2" data="<?= $val->ID_USER ?>"><i class="far fa-edit"></i></button> -->
                                            <!-- <a href="#" class="btn btn-primary trigger--fire-modal-2" id="modal-2" data="<?= $val->id_user ?>">NPWPD</a> -->
                                            <a href="javascript:void(0);" data="<?= $val->id_user ?>" class="btn btn-icon btn-warning trigger--fire-modal-3 float-right btn-hapus" id="modal-3"><i class="fas fa-trash"></i></a>
                                        </td>

                                    </tr>
                                <?php $i++;
                                endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <nav class="d-inline-block">
                        <ul class="pagination mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
$this->load->view('layouts/footer');
?>