<div class="modal-header">
    <h5 class="modal-title">Detail NPWPD</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
</div>
<div class="modal-body">
    <table class="table table-sm table-detail-npwpd">
        <thead></thead>
        <tbody>
            <?php if ($pendaftaran != "") { ?>
                <tr>
                    <th scope="col">NPWPD</th>
                    <td scope="col">:</td>
                    <td scope="col" class="lbl-npwpd"><?= $pendaftaran["NPWPD"] ?></td>
                </tr>
                <tr>
                    <th scope="col">ID Pendaftaran</th>
                    <td scope="col">:</td>
                    <td scope="col" class="lbl-id-pendaftaran"><?= $pendaftaran["ID_PENDAFTARAN"] ?></td>
                </tr>
                <tr>
                    <th scope="col">Nama Wajib Pajak</th>
                    <td scope="col">:</td>
                    <td scope="col" class="lbl-nama-wp"><?= $pendaftaran["NAME"] ?></td>
                </tr>
                <tr>
                    <th scope="col">Jenis Usaha</th>
                    <td scope="col">:</td>
                    <td scope="col" class="lbl-jenis-usaha"><?= $pendaftaran["JENIS_USAHA"] ?></td>
                </tr>
            <?php } else { ?>
                <tr>
                    <td scope="col">NPWPD Tidak Ditemukan Atau Masih Dalam Proses Verifikasi</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<div class="modal-footer">
    <?php if ($pendaftaran != "") : ?>
        <button type="button" class="btn btn-primary btn-ajukan">Ajukan Penautan NPWPD</button>
    <?php endif ?>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
<script>
    $(document).ready(function(e) {
        $(".btn-ajukan").click(function(e) {
            if (confirm("Dengan Menekan OK Anda Menyetujui Segala Resiko Hukum Yang Ada. Tekan OK Untuk Melakukan Pengajuan Penautan NPWPD Dengan Akun Anda.")) {
                $.ajax({
                    url: "",
                    method: "post",
                    data: {},
                    dataType: "json",
                    success: function(e) {

                    }
                });
            }
        });
    });
</script>