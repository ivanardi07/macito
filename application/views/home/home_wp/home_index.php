<?php
$this->load->view('layouts/header');
$this->load->view('layouts/sidebar');
$this->load->view('layouts/blank');
// $this->load->view('sptpd/sptpd_insert');
?>

<div class="section-body">
    <div class="section-title">Form Pengajuan Penautan NPWPD
    </div>
    <div class="form-group">
        <div class="input-group">
            <input type="text" name="txt_npwpd" class="form-control" id="txt_npwpd" placeholder="NPWPD">
            <div class="input-group-append">
                <button class="btn btn-primary btn-cek-npwpd" type="button">CEK</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(e) {
        $(".btn-cek-npwpd").click(function(e) {
            getDataPendaftaran();
        });

        $("#txt_npwpd").keyup(function(e) {
            if (e.keyCode == 13) {
                getDataPendaftaran();
            }
        });

        function getDataPendaftaran() {
            if ($("#txt_npwpd").val() != "") {
                $(".modal-masking").modal("show");
                $.ajax({
                    url: "<?= base_url("dashboard_wp/getDataPendaftaran") ?>?",
                    method: "post",
                    data: {
                        "npwpd": $("#txt_npwpd").val()
                    },
                    dataType: "html",
                    success: function(e) {
                        $(".modal-masking").modal("hide");
                        $(".modal-detail-pendaftar").modal("show");
                        $(".modal-detail-pendaftar .modal-content").html(e);
                    }
                })
            }
        }
    })
</script>

</section>
</div>
<div class="modal fade modal-detail-pendaftar" role="dialog">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content"></div>
    </div>
</div>
<?php
$this->load->view('layouts/footer');
?>