<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid py-4">
    <div class="clearfix">
        <div class="float-left">
            <h2 class="h4 m-0 text-gray-800">Surat Jalan</h2>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-10">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Form Pengajuan Surat Jalan</h6>
                </div>
                <div class="card-body">

                    <form action="/psj/save" method="post">
                        <?= csrf_field(); ?>

                        <div class="row mb-3">
                            <label for="kode_ocb" class="col-sm-2 col-form-label col-form-label-sm">Kode OCB</label>
                            <div class="col-sm-6">
                                <select name="kode_ocb" id="kode_ocb" class="form-select <?= ($validation->hasError('kode_ocb'))  ? 'is-invalid' : ''; ?>">
                                    <option>Pilih Kode OCB</option>
                                    <?php foreach ($pocb as $ocb) : ?>
                                        <option value="<?= $ocb['kode_ocb']; ?>"><?= $ocb['kode_ocb']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    Data harus diisi dengan benar, Harap periksa kembali.
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nama_penerima" class="col-sm-2 col-form-label col-form-label-sm">Nama Penerima</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control <?= ($validation->hasError('nama_penerima'))  ? 'is-invalid' : ''; ?>" name="nama_penerima" id="nama_penerima" autofocus>
                                <div class="invalid-feedback">
                                    Data harus diisi dengan benar, Harap periksa kembali.
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="alamat_penerima" class="col-sm-2 col-form-label col-form-label-sm">Alamat Penerima</label>
                            <div class="col-sm-6">
                                <textarea class="form-control <?= ($validation->hasError('alamat_penerima'))  ? 'is-invalid' : ''; ?>" name="alamat_penerima" id="alamat_penerima" rows="3"></textarea>
                                <div class="invalid-feedback">
                                    Data harus diisi dengan benar, Harap periksa kembali.
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tlp_penerima" class="col-sm-2 col-form-label col-form-label-sm">Telephone Penerima</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control <?= ($validation->hasError('tlp_penerima'))  ? 'is-invalid' : ''; ?>" name="tlp_penerima" id="tlp_penerima">
                                <div class="invalid-feedback">
                                    Data harus diisi dengan benar, Harap periksa kembali.
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="jumlah_ayam" class="col-sm-2 col-form-label col-form-label-sm">Jumlah Ayam</label>
                            <div class="col-sm-6">
                                <input type="text" name="jumlah_ayam" id="jumlah_ayam" class="form-control <?= ($validation->hasError('jumlah_ayam'))  ? 'is-invalid' : ''; ?>">
                                <div class="invalid-feedback">
                                    Data harus diisi dengan benar, Harap periksa kembali.
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="jumlah_tagihan" class="col-sm-2 col-form-label col-form-label-sm">Jumlah Tagihan</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control <?= ($validation->hasError('jumlah_tagihan'))  ? 'is-invalid' : ''; ?>" name="jumlah_tagihan" id="jumlah_tagihan">
                                <div class="invalid-feedback">
                                    Data harus diisi dengan benar, Harap periksa kembali.
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary my-4">Kirim Pengajuan</button>
                        <hr>
                        <small><a href="<?= base_url('psj'); ?>">&laquo; Kembali Ke Daftar Surat Jalan</a></small>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>