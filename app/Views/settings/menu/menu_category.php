<a href="javascript:;" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addCategory">Tambah Kategori</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th width="100px">#</th>
            <th>Nama</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $i => $category) : ?>
            <tr>
                <td><?= $i + 1; ?></td>
                <td><?= $category->name; ?></td>
                <td>
                    <a href="javascript:;" class="me-2" data-bs-toggle="modal" data-bs-target="#editCategory<?= $i; ?>">Ubah</a>
                    <a href="javascript:;" class="ms-2 text-danger delete" data-id="<?= $category->id; ?>" data-url="<?= base_url("menu-setting/delete-menu-category"); ?>">Hapus</a>
                </td>
            </tr>
            <?= view('settings/menu/_edit_category', ['index' => $i, 'id' => $category->id, 'category' => $category->name]); ?>
        <?php endforeach; ?>
    </tbody>
</table>
<!-- create  -->
<div class="modal fade" id="addCategory" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="addCategoryLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addCategoryLabel">Tambah Kategori</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url("menu-setting/store-menu-category"); ?>" method="POST">
                    <?= csrf_field(); ?>
                    <div>
                        <label for="">Nama Kategori</label>
                        <input type="text" class="form-control" name="category" required>
                    </div>
                    <div class="text-end mt-2">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>