<?= $this->extend('layouts/templates'); ?>
<?= $this->section('content'); ?>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">

            </div>
            <div class="col-md-6">
                <?= $this->include('settings/user/role_setting'); ?>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>