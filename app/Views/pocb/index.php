<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid py-4">
    <div class="clearfix">
        <div class="float-left">
            <h2 class="h4 m-0 text-gray-800">Operational Cash Bon</h2>
        </div>
        <div class="float-right">
            <a href="<?= base_url('Pocb/tambah') ?>" class="btn btn-primary btn-sm">Form Pengajuan OCB</a>
        </div>
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
                    <h6>OCB Table</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <td class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</td>
                                    <td class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No Pengajuan</td>
                                    <td class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username Driver</td>
                                    <td class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No Telpon Driver</td>
                                    <td class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal/Waktu Pengajuan</td>
                                    <td class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($pocb as $ocb) : ?>
                                    <tr>
                                        <td class="align-middle text-center">
                                            <?= $i++; ?>
                                        </td>
                                        <td class="align-middle text-center">
                                            <?= $ocb['no_pengajuan']; ?>
                                        </td>
                                        <td class="align-middle text-center">
                                            <?= $ocb['username']; ?>
                                        </td>
                                        <td class="align-middle text-center">
                                            <?= $ocb['no_tlp']; ?>
                                        </td>
                                        <td class="align-middle text-center">
                                            <?= $ocb['updated_at']; ?>
                                        </td>
                                        <td class="align-middle">
                                            <a href="/pocb/<?= $ocb['slug']; ?>" class="badge badge-sm bg-gradient-info">Detail</a>
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