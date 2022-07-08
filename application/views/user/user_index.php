<?php
$this->load->view('layouts/header');
$this->load->view('layouts/sidebar');
$this->load->view('layouts/blank');
?>

<div class="section-body">
    <div class="section-title">Kelola User</div>

    <div class="form-group">

        <div class="col-12 col-md-12 col-lg-20">
            <div class="card">
                <div class="card-header">
                    <h4>Daftar User </h4>
                    <div class="card-header-form">
                        <form>
                            <div class="input-group">
                                <input type="text" name="txt-data-user" class="form-control" placeholder="Search">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-md table-sm table-lg table-xl" id="dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Email</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <?php $i = 1;
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
                                            <a href="javascript:void(0);" data="<?= $val->id_user ?>" class="btn btn-icon btn-warning trigger--fire-modal-3 float-right btn-hapus" id="modal-3"><i class="fas fa-trash"></i></a>
                                        </td>

                                    </tr>
                                <?php $i++;
                                        endforeach ?> -->
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</section>

<div class="modal fade percobaan" tabindex="-1" role="dialog" id="fire-modal-3">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            <div class="modal-body">
                <h5 class="modal-title" align="center">Anda yakin ingin menghapus data ini?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class=" btn btn-danger" id="btn_delete">Iya</button>
                <a href="#" class="btn btn-primary" data-dismiss="modal" aria-label="Close">Tidak</a>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    var dataTable = null;
    var colDefs = null;
    $(document).ready(function(e) {
        renderTable();
        $(window).resize(function(e) {
            renderTable()
        });

        function renderTable() {
            is_mobile_mode = !(window.innerWidth < 1025);
            colDefs = [{
                    //KOLOM NOMOR BARIS
                    targets: 0,
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                    searchable: false,
                    visible: is_mobile_mode,
                },
                {
                    //KOLOM EMAIL
                    targets: 1,
                    render: function(data, type, row, meta) {
                        //return row[8];
                        return row.email;
                    },
                    searchable: true,
                    visible: is_mobile_mode,
                }, {
                    //KOLOM NAMA
                    targets: 2,
                    render: function(data, type, row, meta) {
                        //return row[2];
                        return row.nama;
                    },
                    searchable: true,
                    visible: is_mobile_mode,
                }, {
                    //KOLOM ALAMAT
                    targets: 3,
                    render: function(data, type, row, meta) {
                        //return row[2];
                        return row.alamat;
                    },
                    searchable: true,
                    visible: is_mobile_mode,
                }, {
                    //KOLOM STATUS
                    targets: 4,
                    render: function(data, type, row, meta) {
                        if (row.is_verified == "0000-00-00 00:00:00") {
                            return "belum aktif";
                        } else {
                            return "aktif"
                        }
                    },
                    searchable: true,
                    visible: is_mobile_mode,
                }, {
                    //KOLOM BUTTON ACTION
                    targets: 5,
                    render: function(data, type, row, meta) {
                        return "<button class='btn btn-warning btn_hapus trigger--fire-modal-3' data='" + row.id_user + "'><i class='fas fa-trash' style='font-size:16px'></i></button>";
                    },
                    searchable: false,
                    visible: is_mobile_mode,
                },
                // {
                //     //KOLOM SEMUA DATA RESPONSIVE
                //     targets: 6,
                //     render: function(data, type, row, meta) {
                //         username = "<tr><td><small><b>NPWPD</b></small></td> <td><small>:</small></td> <td><small>" + row.USERNAME + "</small></td> <td rowspan='2'><button class='btn btn-primary btn-detail-pengajuan' data='" + row.USER_ID + "'><i class='fas fa-info-circle'></i></button></td></tr>";
                //         totalPengajuan = "<tr><td><small><b>Total Pengajuan</b></small></td> <td><small>:</small></td> <td><small>" + row.COUNT + "</small></td></tr>";
                //         //actionButton = "<tr><td><small></small></td></tr>";
                //         html = "<table class='mini-table'>" + username + totalPengajuan + "</table>";
                //         return html;
                //     },
                //     searchable: false,
                //     visible: !is_mobile_mode,
                // }
            ];

            if (dataTable != null) {
                dataTable.destroy();
            }

            dataTable = $('#dataTable').DataTable({
                "paging": true,
                "ordering": true,
                "info": true,
                "searching": true,
                "dom": "<'row'<'col-sm-12'tr>><'row table-navigation'<'col-sm-12 col-md-5 dataTables_info'i><'col-sm-12 col-md-7 dataTables_pager'lp>>",
                processing: true,
                //serverSide: true,
                ajax: {
                    url: "<?= base_url() ?>user-management/listUser",
                    type: 'POST',
                    "data": function(outData, d) {
                        return outData;
                    },
                    dataFilter: function(inData, d) {
                        return inData;
                    },
                    error: function(err, status) {
                        // error
                        //console.log(err);
                    },
                    data: function(data) {}
                },
                columnDefs: colDefs,
                responsive: true,
                initComplete: function() {
                    this.api().columns().every(function() {
                        $(".txt-data-user").keyup(function(e) {
                            //console.log($(this).val());
                            dataTable.search($(this).val()).draw();
                        })


                    });
                    $(".trigger--fire-modal-3").click(function(e) {
                        id_user = $(this).attr("data");
                        $("#fire-modal-3").modal("show");
                    });
                },
                "language": {
                    "emptyTable": "Tidak ada data tersedia didalam tabel",
                    "zeroRecords": "Maaf, Tidak ada data ditemukan",
                    "info": "<span class='total-data'>_MAX_ Data Ditemukan</span>",
                    "infoEmpty": "Tidak ada data tersedia",
                    "lengthMenu": "Menampilkan _MENU_ Data",
                    "loadingRecords": "<i class='fas fa-circle-notch fa-spin'></i> Memuat Data...",
                    "processing": "<i class='fa-solid fa-circle-notch fa-spin'></i> Memproses Data...",
                    "paginate": {
                        "first": "Pertama",
                        "last": "Terakhir",
                        "next": "Next",
                        "previous": "Prev"
                    },
                    "infoFiltered": "(disaring dari _MAX_ total data)",
                },
            });

            $("#dataTable, #dataTable *").removeAttr("style");

        }

        $(".trigger--fire-modal-2").click(function(e) {
            $("#fire-modal-2").modal("show");
        });

        var id_user = null;
        $('#btn_delete').click(function() {
            $.ajax({
                method: 'post',
                url: '<?php echo base_url() ?>user-management/delete/',
                data: {
                    id: id_user
                },
                dataType: 'json',
                success: function(response) {
                    $('#myModalDelete').modal('hide');
                    location.reload();
                }
            });
        });
    });
</script>
<?php
$this->load->view('layouts/footer');
?>