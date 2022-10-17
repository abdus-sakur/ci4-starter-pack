                <div class="modal fade" id="editSubMenu<?= $index; ?>" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="editSubMenuLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editSubMenuLabel">Ubah Submenu</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url("submenu-setting/store-submenu"); ?>" method="POST">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="id" value="<?= $submenu->id; ?>">
                                    <div class="mb-3 row">
                                        <label class="col-sm-4 col-form-label">Nama Sub Menu</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="submenu" value="<?= $submenu->name ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-4 col-form-label">Icon</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="icon" value="<?= $submenu->icon ?>" placeholder="bootstrap icon">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-4 col-form-label">URL</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="url" value="<?= $submenu->url ?>" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-4 col-form-label">Menu</label>
                                        <div class="col-sm-8">
                                            <select name="menu" class="form-control">
                                                <?php foreach ($menus as $menu) : ?>
                                                    <option value="<?= $menu->id; ?>" <?= $menu->id == $submenu->menu_id ? 'selected' : ''; ?>><?= $menu->name; ?></option>
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