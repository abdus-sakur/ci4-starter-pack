<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url("assets/css/main/app.css"); ?>">
    <link rel="stylesheet" href="<?= base_url("assets/css/pages/auth.css"); ?>">
    <link rel="shortcut icon" href="<?= base_url("assets/images/logo/favicon.svg"); ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url("assets/images/logo/favicon.png"); ?>" type="image/png">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <img src="<?= base_url("assets/images/logo/logo.svg"); ?>" alt="Logo">
                    </div>
                    <?= $this->include('components/alert'); ?>
                    <h1 class="auth-title">Log in</h1>
                    <!-- <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p> -->

                    <form action="<?= base_url("login"); ?>" method="POST">
                        <?= csrf_field(); ?>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" name="username" placeholder="Username" autocomplete="x" required>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" name="password" placeholder="Password" autocomplete="y" required>
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <!-- <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Keep me logged in
                            </label>
                        </div> -->
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-2">Log in</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
    <script src="<?= base_url("assets/js/bootstrap.js"); ?>"></script>
</body>

</html>