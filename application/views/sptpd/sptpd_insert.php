<div class="card">
    <form id="setting-form">
        <div class="card" id="settings-card">
            <div class="card-header">
                <h4>e-SPTPD $jenis_pajak</h4>
            </div>
            <div class="card-body">
                <p class="text-muted">General settings such as, site title, site description, address and so on.</p>
                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">NPWPD</label>
                    <div class="col-sm-6 col-md-5">
                        <input type="text" name="site_title" class="form-control-plaintext" readonly="" value="Hello!" id="site-title">
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <label for="site-description" class="form-control-label col-sm-3 text-md-right">Masa Pajak</label>
                    <div class="col-sm-6 col-md-5">
                        <input type="date" class="form-control" placeholder="Pilih Periode">
                    </div>
                </div>

                <div class="form-group row align-items-center">
                    <label class="form-control-label col-sm-3 text-md-right">Jatuh Tempo</label>
                    <div class="col-sm-6 col-md-5">
                        <input type="text" name="site_title" class="form-control-plaintext" readonly="" value="Akhir Maret" id="site-title">
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <label for="site-description" class="form-control-label col-sm-3 text-md-right">Omzet (Rp.)</label>
                    <div class="col-sm-6 col-md-5">
                        <input type="text" class="form-control">
                        <input type="text" name="site_title" class="form-control-plaintext" readonly="" value="Format number" id="site-title">
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <label for="site-description" class="form-control-label col-sm-3 text-md-right">Tarif (%)</label>
                    <div class="col-sm-6 col-md-5">
                        <input type="text" class="form-control" readonly="">
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <label for="site-description" class="form-control-label col-sm-3 text-md-right">Pajak (Rp.)</label>
                    <div class="col-sm-6 col-md-5">
                        <input type="text" class="form-control">
                        <input type="text" name="site_title" class="form-control-plaintext" readonly="" value="Format number" id="site-title">
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <label for="site-description" class="form-control-label col-sm-3 text-md-right">Keterangan</label>
                    <div class="col-sm-6 col-md-5">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <label for="site-description" class="form-control-label col-sm-3 text-md-right">Potensi</label>
                    <div class="col-sm-6 col-md-5">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="custom-switch mt-2">
                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                        <span class="custom-switch-indicator"></span>
                        <span class="custom-switch-description col-11">Dengan ini saya menyatakan bahwa laporan tersebut saya buat dengan sebenarnya. Apabila dikemudian hari ditemukan bahwa data yang saya sampaikan tidak benar dan/atau ada pemalsuan, maka seluruh keputusan yang telah ditetapkan berdasarkan data tersebut batal berdasarkan hukum dan saya bersedia dikenakan sanksi sesuai ketentuan peraturan perundang-undangan yang berlaku.</span>
                    </label>
                </div>

            </div>
            <div class="card-footer text-md-right">
                <button class="btn btn-primary" id="save-btn">Kirim</button>
                <button class="btn btn-secondary" type="button">Reset</button>
            </div>
        </div>
    </form>
</div>
</div>