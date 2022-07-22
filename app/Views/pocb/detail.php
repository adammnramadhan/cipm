<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid py-4">
    <div class="clearfix">
        <div class="float-left">
            <h2 class="h4 m-0 text-gray-800"><?= $title ?></h2>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="row g-0">
                    <div class="col-md-8">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <h4>NOMOR PENGAJUAN &nbsp; : &nbsp; <?= $pocb['no_pengajuan']; ?></h4>

                                    <?php if (in_groups('admin')) : ?>
                                        <form action="/pocb/<?= $pocb['id_pocb']; ?>" method="post" class="d-inline">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="badge badge-sm bg-gradient-danger" onclick="return confirm('apakah anda yakin ingin menghapus data ?');">Delete</button>
                                        </form>
                                    <?php endif; ?>
                                </li>
                                <li class="list-group-item mt-3">KODE OCB &nbsp; : &nbsp; <?= $pocb['kode_ocb']; ?></li>
                                <li class="list-group-item mt-3">DRIVER &nbsp; : &nbsp; <?= $pocb['username']; ?></li>
                                <li class="list-group-item mt-3">NOMOR TELEPON &nbsp; : &nbsp; <?= $pocb['no_tlp']; ?></li>
                                <li class="list-group-item mt-3">NOMOR PLAT KENDARAAN &nbsp; : &nbsp; <?= $pocb['nopol']; ?></li>
                                <li class="list-group-item mt-3">TANGGAL/WAKTU PENGAJUAN &nbsp; : &nbsp; <?= $pocb['updated_at']; ?></li>
                                <li class="list-group-item mt-3">
                                    <small><a href="<?= base_url('pocb'); ?>">&laquo; Kembali Ke Daftar Surat Jalan</a></small>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<br>
<?= $this->endSection(); ?>