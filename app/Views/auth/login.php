<?= $this->extend('auth/templates/index'); ?>

<?= $this->section('content'); ?>
<main class="main-content  mt-0">
    <section>
        <div class="page-header min-vh-75">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                        <div class="card card-plain mt-8">
                            <div class="card-header pb-0 text-left bg-transparent">
                                <h3 class="font-weight-bolder text-info text-gradient">Welcome back</h3>
                                <p class="mb-0">Aplikasi Pengajuan Surat Jalan Berbasis Web</p>
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4"><?= lang('Auth.loginTitle') ?></h1>
                                </div>

                                <?= view('Myth\Auth\Views\_message_block') ?>

                                <form action="<?= route_to('login') ?>" method="post" role="form">
                                    <?= csrf_field() ?>
                                    <?php if ($config->validFields === ['email']) : ?>
                                        <label>Email</label>
                                        <div class="mb-3">
                                            <input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>" aria-label="Email" aria-describedby="email-addon">
                                            <div class="invalid-feedback">
                                                <?= session('errors.login') ?>
                                            </div>
                                        </div>
                                    <?php else : ?>
                                        <label>Email</label>
                                        <div class="mb-3">
                                            <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>" aria-label="Email" aria-describedby="email-addon" autofocus>
                                            <div class="invalid-feedback">
                                                <?= session('errors.login') ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <label>Password</label>
                                    <div class="mb-3">
                                        <input type="password" name="password" class="form-control form-control-user<?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" aria-label="Password" aria-describedby="password-addon">
                                    </div>
                                    <?php if ($config->allowRemembering) : ?>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" name="remembering" <?php if (old('remember')) : ?> checked <?php endif ?>>
                                                <label class="custom-control-label" for="customCheck"><?= lang('Auth.rememberMe') ?></label>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">
                                            <?= lang('Auth.loginAction') ?>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <?php if ($config->activeResetter) : ?>
                                <div class="text-center">
                                    <a class="small" href="<?= route_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a>
                                </div>
                            <?php endif; ?>
                            <?php if ($config->allowRegistration) : ?>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-4 text-sm mx-auto">
                                        <?= lang('Auth.needAnAccount') ?>
                                        <a href="<?= route_to('register') ?>" class="text-info text-gradient font-weight-bold">Register</a>
                                    </p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                            <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('../assets/img/curved-images/curved6.jpg')"></div>
                            <div class="position-relative justify-content-center">
                                <img class="max-width-500 w-100 position-relative z-index-2" src="<?= base_url(); ?>/assets/img/cvrlogin.jpg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<br>
<?= $this->endSection(); ?>