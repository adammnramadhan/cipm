<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid py-4">
    <div class="clearfix">
        <div class="float-left">
            <h2 class="h4 m-0 text-gray-800">Daftar Penguna Aplikasi</h2>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Users Table</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Role</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($users as $user) : ?>
                                    <tr>
                                        <td class="align-middle text-center">
                                            <?= $i++; ?>
                                        </td>
                                        <td class="align-middle text-center">
                                            <?= $user->username; ?>
                                        </td>
                                        <td class="align-middle text-center">
                                            <?= $user->email; ?>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="badge badge-sm bg-gradient-success"><?= $user->name; ?></span>
                                        </td>
                                        <td class="align-middle">
                                            <a href="<?= base_url('admin/' . $user->userid); ?>" class="badge badge-sm bg-gradient-info">detail</a>
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