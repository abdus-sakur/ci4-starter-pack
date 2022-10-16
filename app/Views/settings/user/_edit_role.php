<!-- create  -->
<div class="modal fade" id="editRole<?= $index; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editRoleLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editRoleLabel">Add Role</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url("user-setting/store-role"); ?>" method="POST">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <div>
                        <label for="">Role Name</label>
                        <input type="text" class="form-control" name="role" value="<?= $role; ?>" required>
                    </div>
                    <div class="text-end mt-2">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>