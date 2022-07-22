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
                                    <h4>KODE OCB &nbsp; : &nbsp; <?= $psj['kode_ocb']; ?></h4>

                                    <?php if (in_groups('admin')) : ?>
                                        <form action="/psj/<?= $psj['id_psj']; ?>" method="post" class="d-inline">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="badge badge-sm bg-gradient-danger" onclick="return confirm('apakah anda yakin ingin menghapus data ?');">Delete</button>
                                        </form>
                                    <?php endif; ?>
                                </li>
                                <li class="list-group-item mt-3">NAMA PENERIMA &nbsp; : &nbsp; <?= $psj['nama_penerima']; ?></li>
                                <li class="list-group-item mt-3">ALAMAT PENERIMA &nbsp; : &nbsp; <?= $psj['alamat_penerima']; ?></li>
                                <li class="list-group-item mt-3">TELEPON PENERIMA &nbsp; : &nbsp; <?= $psj['tlp_penerima']; ?></li>
                                <li class="list-group-item mt-3">JUMLAH AYAM &nbsp; : &nbsp; <?= $psj['jumlah_ayam']; ?>/ekor</li>
                                <li class="list-group-item mt-3">JUMLAH TAGIHAN &nbsp; : &nbsp; Rp.<?= $psj['jumlah_tagihan']; ?></li>
                                <li class="list-group-item mt-3">TANGGAL/WAKTU PENGERIMAN &nbsp; : &nbsp; <?= $psj['updated_at']; ?></li>
                                <li class="list-group-item mt-3">
                                    <small><a href="<?= base_url('psj'); ?>">&laquo; Kembali Ke Daftar Surat Jalan</a></small>
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