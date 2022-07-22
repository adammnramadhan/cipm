<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid py-4">
    <div class="clearfix">
        <div class="float-left">
            <h2 class="h4 m-0 text-gray-800">Daftar Pengajuan Surat Jalan</h2>
        </div>

        <?php if (in_groups('admin')) : ?>
            <div class="float-right">
                <a href="<?= base_url('Psj/tambah') ?>" class="btn btn-primary btn-sm">Form Pengajuan Surat Jalan</a>
            </div>
        <?php endif; ?>
    </div>
    <hr>

    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Surat Jalan Table</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <td class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</td>
                                    <td class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kode OCB</td>
                                    <td class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Penerima</td>
                                    <td class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alamat Penerima</td>
                                    <td class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Telephone Penerima</td>
                                    <td class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal/Waktu Pengiriman</td>
                                    <td class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah Ayam</td>
                                    <td class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah Tagihan</td>
                                    <td class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($psj as $sj) : ?>
                                    <tr>
                                        <td class="align-middle text-center">
                                            <?= $i++; ?>
                                        </td>
                                        <td class="align-middle text-center">
                                            <?= $sj['kode_ocb']; ?>
                                        </td>
                                        <td class="align-middle text-center">
                                            <?= $sj['nama_penerima']; ?>
                                        </td>
                                        <td class="align-middle text-center">
                                            <?= $sj['alamat_penerima']; ?>
                                        </td>
                                        <td class="align-middle text-center">
                                            <?= $sj['tlp_penerima']; ?>
                                        </td>
                                        <td class="align-middle text-center">
                                            <?= $sj['updated_at']; ?>
                                        </td>
                                        <td class="align-middle text-center">
                                            <?= $sj['jumlah_ayam']; ?>/ekor
                                        </td>
                                        <td class="align-middle text-center">
                                            Rp.<?= $sj['jumlah_tagihan']; ?>
                                        </td>
                                        <td class="align-middle">
                                            <a href="/psj/<?= $sj['slug']; ?>" class="badge badge-sm bg-gradient-info">Detail</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<br>
<?= $this->endSection(); ?>