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
        <div class="col-lg-8">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-8">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <h4>NOMOR POLISI &nbsp; : &nbsp; <?= $kendaraan['nopol']; ?></h4>

                                    <?php if (in_groups('admin')) : ?>
                                        <form action="/kendaraan/<?= $kendaraan['id_kendaraan']; ?>" method="post" class="d-inline">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="badge badge-sm bg-gradient-danger" onclick="return confirm('apakah anda yakin ingin menghapus data ?');">Delete</button>
                                        </form>
                                    <?php endif; ?>
                                </li>
                                <li class="list-group-item mt-3">JENIS KENDARAAN &nbsp; : &nbsp; <?= $kendaraan['jenis_kendaraan']; ?></li>
                                <li class="list-group-item mt-3">MULAI BEROPERASI &nbsp; : &nbsp; <?= $kendaraan['updated_at']; ?></li>
                                <li class="list-group-item mt-3">
                                    <small><a href="<?= base_url('kendaraan'); ?>">&laquo; Kembali Ke Daftar Kendaraan</a></small>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>