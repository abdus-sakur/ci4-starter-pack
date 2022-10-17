<?= $this->extend('layouts/templates'); ?>
<?= $this->section('content'); ?>
<div class="card">
    <div class="card-body">
        <a href="javascript:;" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addSubMenu">Tambah Sub Menu</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="100px">#</th>
                    <th>Nama</th>
                    <th>URL</th>
                    <th>Ikon</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($submenus as $i => $submenu) : ?>
                    <tr>
                        <td><?= $i + 1; ?></td>
                        <td><?= $submenu->name; ?></td>
                        <td><?= $submenu->url; ?></td>
                        <td><i class="<?= $submenu->icon; ?>"></i></td>
                        <td><?= $submenu->menu_name; ?></td>
                        <td>
                            <a href="javascript:;" class="me-2" data-bs-toggle="modal" data-bs-target="#editSubMenu<?= $i; ?>">Ubah</a>
                            <a href="javascript:;" class="ms-2 text-danger delete" data-id="<?= $submenu->id; ?>" data-url="<?= base_url("submenu-setting/delete-submenu"); ?>">Hapus</a>
                        </td>
                    </tr>
                    <?= view('settings/menu/_edit_submenu', ['index' => $i, 'submenu' => $submenu]); ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!-- create  -->
        <div class="modal fade" id="addSubMenu" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="addSubMenuLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addSubMenuLabel">Tambah Sub Menu</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url("submenu-setting/store-submenu"); ?>" method="POST">
                            <?= csrf_field(); ?>
                            <div class="mb-3 row">
                                <label class="col-sm-4 col-form-label">Nama Sub Menu</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="submenu" value="<?= old('submenu'); ?>" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-4 col-form-label">Icon</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="icon" value="<?= old('icon'); ?>" placeholder="bootstrap icon" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-4 col-form-label">URL</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="url" value="<?= old('url'); ?>" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-4 col-form-label">Menu</label>
                                <div class="col-sm-8">
                                    <select name="menu" class="form-control">
                                        <?php foreach ($menus as $menu) : ?>
                                            <option value="<?= $menu->id; ?>" <?= $menu->id == old('menu') ? 'selected' : ''; ?>><?= $menu->name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="text-end mt-2">
                                <button class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>