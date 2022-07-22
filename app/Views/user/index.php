<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">
    <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('<?= base_url(); ?>/assets/img/cvrpro.jpg'); background-position-y: 50%;"></div>
    <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
        <div class="row gx-4">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                    <img src="<?= base_url('/img/' . user()->user_image); ?>" alt="<?= user()->username; ?>" class="w-100 border-radius-lg shadow-sm">
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        @<?= user()->username; ?>
                    </h5>
                </div>
            </div>
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-12 col-xl-4">
                        <div class="card h-100">
                            <div class="card-header pb-0 p-3">
                                <div class="row">
                                    <div class="col-md-8 d-flex align-items-center">
                                        <h6 class="mb-0">Profile Information</h6>
                                    </div>
                                    <?php if (session()->getFlashdata('pesan')) : ?>
                                        <div class="alert alert-success" role="alert">
                                            <?= session()->getFlashdata('pesan'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="card-body p-3">
                                <p class="text-sm">
                                    Mohon lengkapi data diri anda sebelum mengisi form yang tersedia. Seperti nomor telepon dan nama lengkap yang tersedia pada halaman edit profile. Terimakasih!
                                </p>
                                <hr class="horizontal gray-light my-4">
                                <div class="col-md-4 text-end">
                                    <li class="nav-item d-flex align-items-center">
                                        <a href="/user/edit/<?= user()->id; ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                            </svg>
                                            <span> &nbsp; Edit Profile</span>
                                        </a>
                                    </li>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="card h-100">
                            <div class="card-body p-3">
                                <ul class="list-group">
                                    <?php if (user()->fullname) : ?>
                                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full Name:</strong> &nbsp; <?= user()->fullname; ?></li>
                                    <?php endif; ?>
                                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile:</strong> &nbsp; <?= user()->no_tlp; ?></li>
                                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; <?= user()->email; ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>