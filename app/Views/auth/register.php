<?= $this->extend('auth/templates/index'); ?>

<?= $this->section('content'); ?>
<section class="min-vh-100 mb-8">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('<?= base_url(); ?>/assets/img/curved-images/curved14.jpg');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 text-center mx-auto">
                    <h1 class="text-white mb-2 mt-5">Welcome!</h1>
                    <p class="text-lead text-white">Use these awesome forms to login or create new account in your project for free.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
            <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                <div class="card z-index-0">
                    <div class="card-header text-center pt-4">
                        <h5><?= lang('Auth.register') ?></h5>
                    </div>

                    <div class="row px-xl-5 px-sm-4 px-3">
                        <?= view('Myth\Auth\Views\_message_block') ?>
                    </div>

                    <div class="card-body">
                        <form action="<?= route_to('register') ?>" method="post" role="form text-left">
                            <?= csrf_field() ?>
                            <div class="mb-3">
                                <input type="email" class="form-control<?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" placeholder="<?= lang('Auth.email') ?>" aria-label="<?= lang('Auth.email') ?>" aria-describedby="email-addon" value="<?= old('email') ?>" autofocus>
                                <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control<?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" aria-label="<?= lang('Auth.username') ?>" aria-describedby="email-addon" value="<?= old('username') ?>">
                            </div>
                            <div class="mb-3 row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" name="password" class="form-control<?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" aria-label="<?= lang('Auth.password') ?>" aria-describedby="password-addon" autocomplete="off">
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" name="pass_confirm" class="form-control<?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" aria-label="<?= lang('Auth.repeatPassword') ?>" aria-describedby="pass_confirm-addon" autocomplete="off">
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">
                                    <?= lang('Auth.register') ?>
                                </button>
                            </div>
                            <p class="text-sm mt-3 mb-0"> <?= lang('Auth.alreadyRegistered') ?> <a href="<?= route_to('login') ?>" class="text-dark font-weight-bolder">Login</a></p>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>