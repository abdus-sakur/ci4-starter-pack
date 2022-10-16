<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>

    <link rel="stylesheet" href="<?= base_url("assets/css/main/app.css"); ?>">
    <link rel="stylesheet" href="<?= base_url("assets/css/main/app-dark.css"); ?>">
    <link rel="shortcut icon" href="<?= base_url("assets/images/logo/favicon.svg"); ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url("assets/images/logo/favicon.png"); ?>" type="image/png">
    <link rel="stylesheet" href="<?= base_url("assets/css/shared/iconly.css"); ?>">

</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <?= $this->include("layouts/header"); ?>
                <?= $this->include("layouts/sidebar"); ?>
            </div>
        </div>
        <div id="main">
            <div class="page-heading d-flex justify-content-between align-items-center">
                <h3><?= $title ?? ""; ?></h3>
                <a class="dropdown bg-white shadow border-sm rounded-pill py-2 px-4" href="javascript:;" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="d-flex align-items-center">
                        <div class="me-2">
                            <i class="bi bi-person-circle" style="font-size: 24px;"></i>
                        </div>
                        <div><?= session("fullname"); ?></div>
                    </div>
                </a>
                <ul class="dropdown-menu shadow">
                    <li><a class="dropdown-item" href="<?= base_url("logout"); ?>">Logout</a></li>
                </ul>
            </div>
            <div class="page-content">
                <?= $this->include('components/alert'); ?>
                <?= $this->renderSection("content"); ?>
            </div>
            <?= $this->include("layouts/footer"); ?>
        </div>
    </div>
    <script src="<?= base_url("assets/js/bootstrap.js"); ?>"></script>
    <script src="<?= base_url("assets/js/app.js"); ?>"></script>

    <!-- Need: Apexcharts -->
    <script src="<?= base_url("assets/plugins/apexcharts/apexcharts.min.js"); ?>"></script>
    <script src="<?= base_url("assets/js/pages/dashboard.js"); ?>"></script>

</body>

</html>