<?= $this->extend('layouts/templates'); ?>
<?= $this->section('content'); ?>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <a href="javascript:;" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addMenu">Tambah Menu</a>
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
                        <?php foreach ($menus as $i => $menu) : ?>
                            <tr>
                                <td><?= $i + 1; ?></td>
                                <td><?= $menu->name; ?></td>
                                <td><?= $menu->url; ?></td>
                                <td><i class="<?= $menu->icon; ?>"></i></td>
                                <td><?= $menu->category_name; ?></td>
                                <td>
                                    <a href="javascript:;" class="me-2" data-bs-toggle="modal" data-bs-target="#editMenu<?= $i; ?>">Ubah</a>
                                    <a href="javascript:;" class="ms-2 text-danger delete" data-id="<?= $menu->id; ?>" data-url="<?= base_url("menu-setting/delete-menu"); ?>">Hapus</a>
                                </td>
                            </tr>
                            <?= view("settings/menu/_edit_menu", ['index' => $i, 'menu' => $menu]); ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <!-- create  -->
                <div class="modal fade" id="addMenu" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="addMenuLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="addMenuLabel">Tambah Menu</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url("menu-setting/store-menu"); ?>" method="POST">
                                    <?= csrf_field(); ?>
                                    <div class="mb-3 row">
                                        <label class="col-sm-4 col-form-label">Nama Menu</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="menu" value="<?= old('menu'); ?>" required>
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
                                        <label class="col-sm-4 col-form-label">Kategori Menu</label>
                                        <div class="col-sm-8">
                                            <select name="category" class="form-control">
                                                <?php foreach ($categories as $category) : ?>
                                                    <option value="<?= $category->id; ?>" <?= $category->id == old('category') ? 'selected' : ''; ?>><?= $category->name; ?></option>
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
            <div class="col-md-6">
                <?= $this->include('settings/menu/menu_category'); ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>