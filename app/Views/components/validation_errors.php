<?php if (isset($validation) && $validation->getErrors()) : ?>
    <div class="alert alert-warning alert-dismissible fade show fw-bold" role="alert">
        <?= $validation->listErrors(); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>