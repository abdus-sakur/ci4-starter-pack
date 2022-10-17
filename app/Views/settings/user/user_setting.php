<?= $this->extend('layouts/templates'); ?>
<?= $this->section('content'); ?>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <a href="javascript:;" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addUser">Tambah User</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>username</th>
                            <th>E-mail</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $i => $user) : ?>
                            <tr>
                                <td><?= $i + 1; ?></td>
                                <td><?= $user->fullname; ?></td>
                                <td><?= $user->username; ?></td>
                                <td><?= $user->email; ?></td>
                                <td><?= $user->role_name; ?></td>
                                <td>
                                    <a href="javascript:;" class="me-2" data-bs-toggle="modal" data-bs-target="#editUser<?= $i; ?>">Ubah</a>
                                    <a href="javascript:;" class="ms-2 text-danger delete" data-id="<?= $user->id; ?>" data-url="<?= base_url("user-setting/delete-user"); ?>">Hapus</a>
                                </td>
                            </tr>
                            <?= view('settings/user/_edit_user', ['index' => $i, 'user' => $user]); ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <!-- create  -->
                <div class="modal fade" id="addUser" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="addUserLabel">Tambah User</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url("user-setting/store-user"); ?>" method="POST">
                                    <?= csrf_field(); ?>
                                    <div class="mb-3 row">
                                        <label class="col-sm-4 col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="fullname" value="<?= old('fullname'); ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-4 col-form-label">Username</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="username" value="<?= old('username'); ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-4 col-form-label">E-mail</label>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control" name="email" value="<?= old('email'); ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-4 col-form-label">Role</label>
                                        <div class="col-sm-8">
                                            <select name="role" class="form-control">
                                                <?php foreach ($roles as $role) : ?>
                                                    <option value="<?= $role->id; ?>"><?= $role->name; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-4 col-form-label">Password</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-4 col-form-label">Confirm Password</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" name="confirm_password">
                                        </div>
                                    </div>
                                    <div class="text-end mt-2">
                                        <button class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <?= $this->include('settings/user/role_setting'); ?>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>