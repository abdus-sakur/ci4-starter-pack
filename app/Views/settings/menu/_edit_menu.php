                <div class="modal fade" id="editMenu<?= $index; ?>" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="editMenuLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editMenuLabel">Ubah Menu</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url("menu-setting/store-menu"); ?>" method="POST">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="id" value="<?= $menu->id; ?>">
                                    <div class="mb-3 row">
                                        <label class="col-sm-4 col-form-label">Nama Menu</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="menu" value="<?= $menu->name ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-4 col-form-label">Icon</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="icon" value="<?= $menu->icon ?>" placeholder="bootstrap icon">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-4 col-form-label">URL</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="url" value="<?= $menu->url ?>" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-4 col-form-label">Kategori Menu</label>
                                        <div class="col-sm-8">
                                            <select name="category" class="form-control">
                                                <?php foreach ($categories as $category) : ?>
                                                    <option value="<?= $category->id; ?>" <?= $category->id == $menu->category_id ? 'selected' : ''; ?>><?= $category->name; ?></option>
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