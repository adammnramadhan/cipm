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
            <form action="/user/update/<?= user()->id; ?>" method="post">
                <?= csrf_field() ?>
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('username'))  ? 'is-invalid' : ''; ?>" id="username" name="username" value="<?= user()->username; ?>">
                        <div class="invalid-feedback">
                            Data harus diisi dengan benar, Harap periksa kembali.
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control <?= ($validation->hasError('email'))  ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= user()->email; ?>">
                        <div class="invalid-feedback">
                            Data harus diisi dengan benar, Harap periksa kembali.
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fullname" class="col-sm-2 col-form-label">Fullname</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('fullname'))  ? 'is-invalid' : ''; ?>" id=" fullname" name="fullname" value="<?= user()->fullname; ?>">
                        <div class="invalid-feedback">
                            Data harus diisi dengan benar, Harap periksa kembali.
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="no_tlp" class="col-sm-2 col-form-label">Nomor Telepon</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('no_tlp'))  ? 'is-invalid' : ''; ?>" id=" no_tlp" name="no_tlp" value="<?= user()->no_tlp; ?>">
                        <div class="invalid-feedback">
                            Data harus diisi dengan benar, Harap periksa kembali.
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Edit Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>