<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid py-4">
    <div class="clearfix">
        <div class="float-left">
            <h2 class="h4 m-0 text-gray-800">Operational Cash Bon</h2>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-10">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Form Pengajuan Operational Cash Bon</h6>
                </div>
                <div class="card-body">

                    <form action="/pocb/save" method="post">
                        <?= csrf_field(); ?>

                        <div class="row mb-3">
                            <label for="no_pengajuan" class="col-sm-2 col-form-label col-form-label-sm">No. Pengajuan</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="no_pengajuan" name="no_pengajuan" value="PJ<?= time() ?>" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="kode_ocb" class="col-sm-2 col-form-label col-form-label-sm">Kode OCB</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="kode_ocb" name="kode_ocb" value="K<?= date('His') ?>" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="username" class="col-sm-2 col-form-label col-form-label-sm">Username</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="username" name="username" value="<?= user()->username; ?>" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="no_tlp" class="col-sm-2 col-form-label col-form-label-sm">Nomor Telepon</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="no_tlp" name="no_tlp" value="<?= user()->no_tlp; ?>" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nopol" class="col-sm-2 col-form-label col-form-label-sm">No. Polisi</label>
                            <div class="col-sm-6">
                                <select name="nopol" id="nopol" class="form-select <?= ($validation->hasError('nopol'))  ? 'is-invalid' : ''; ?>">
                                    <option>Pilih Nomor Polisi</option>
                                    <?php foreach ($kendaraan as $k) : ?>
                                        <option value="<?= $k['nopol']; ?>"><?= $k['nopol']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    Data harus diisi dengan benar, Harap periksa kembali.
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary my-4">Kirim Pengajuan</button>
                        <hr>
                        <small><a href="<?= base_url('pocb'); ?>">&laquo; Kembali Ke Daftar Surat Jalan</a></small>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<br>
<?= $this->endSection(); ?>