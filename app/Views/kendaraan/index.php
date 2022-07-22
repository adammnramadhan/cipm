<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid py-4">
    <div class="clearfix">
        <div class="float-left">
            <h2 class="h4 m-0 text-gray-800"><?= $title ?></h2>
        </div>

        <?php if (in_groups('admin')) : ?>
            <div class="float-right">
                <a href="<?= base_url('Kendaraan/tambah') ?>" class="btn btn-primary btn-sm">Tambah</a>
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
                    <h6>Kendaraan Table</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <td class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</td>
                                    <td class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis Kendaraan</td>
                                    <td class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nomor Polisi</td>
                                    <td class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($kendaraan as $k) : ?>
                                    <tr>
                                        <td class="align-middle text-center">
                                            <?= $i++; ?>
                                        </td>
                                        <td class="align-middle text-center">
                                            <?= $k['jenis_kendaraan']; ?>
                                        </td>
                                        <td class="align-middle text-center">
                                            <?= $k['nopol']; ?>
                                        </td>
                                        <td class="align-middle">
                                            <a href="/kendaraan/<?= $k['slug']; ?>" class="badge badge-sm bg-gradient-info">Detail</a>
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

    <div class="col-12 mt-4">
        <div class="card mb-4">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                        <div class="card card-blog card-plain">
                            <div class="position-relative">
                                <a class="d-block shadow-xl border-radius-xl">
                                    <img src="../assets/img/home-decor-1.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                        <div class="card card-blog card-plain">
                            <div class="position-relative">
                                <a class="d-block shadow-xl border-radius-xl">
                                    <img src="<?= base_url(); ?>/assets/img/home-decor-2.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                        <div class="card card-blog card-plain">
                            <div class="position-relative">
                                <a class="d-block shadow-xl border-radius-xl">
                                    <img src="../assets/img/home-decor-3.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>