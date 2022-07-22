<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">
    <div class="clearfix">
        <div class="float-left">
            <h2 class="h4 m-0 text-gray-800"><?= $title ?></h2>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-8">
            <form action="/Kendaraan/save" method="post">
                <?= csrf_field() ?>
                <div class="form-group row">
                    <label for="jenis_kendaraan" class="col-sm-2 col-form-label">Jenis Kendaraan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('jenis_kendaraan'))  ? 'is-invalid' : ''; ?>" id="jenis_kendaraan" name="jenis_kendaraan" autofocus value="<?= old('jenis_kendaraan'); ?>">
                        <div class="invalid-feedback">
                            Data harus diisi dengan benar, Harap periksa kembali.
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nopol" class="col-sm-2 col-form-label">Nomor Polisi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('nopol'))  ? 'is-invalid' : ''; ?>" id=" nopol" name="nopol" value="<?= old('nopol'); ?>">
                        <div class="invalid-feedback">
                            Data harus diisi dengan benar, Harap periksa kembali.
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>