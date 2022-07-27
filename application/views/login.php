<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href=".<?= base_url() ?>assets/.<?= base_url() ?>assets/.<?= base_url() ?>assets/">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.png">
    <!-- Page Title  -->
    <title>Login | DashLite Admin Template</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/dashlite.css?ver=2.0.0">
    <link id="skin-default" rel="stylesheet" href="<?= base_url() ?>assets/css/theme.css?ver=2.0.0">
</head>

<body class="nk-body bg-white npc-general pg-auth">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                        <div class="brand-logo pb-4 text-center">
                            <a href="<?= base_url('login') ?>" class="logo-link">
                                <img class="logo-light logo-img" src="<?= base_url() ?>assets/images/logo-sekolah.png" srcset="<?= base_url() ?>assets/images/logo-sekolah.png 2x" alt="logo">
                                <img class="logo-dark logo-img" src="<?= base_url() ?>assets/images/logo-sekolah.png" srcset="<?= base_url() ?>assets/images/logo-sekolah.png 2x" alt="logo-dark">
                            </a>
                        </div>
                        <?php if (isset($_GET['notif'])) : _notif($this->session->flashdata($_GET['notif']));
                        endif; ?>
                        <div class="card card-bordered">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">Log In</h4>
                                        <div class="nk-block-des">
                                            <p>Akses Sistem menggunakan username dan password anda!</p>
                                        </div>
                                    </div>
                                </div>
                                <?= form_open('login/cek') ?>
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label" for="default-01">Username</label>
                                    </div>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control form-control-lg" id="default-01" placeholder="Masukkan username anda" name="username" value="<?= set_value('username') ?>" autocomplete="off">
                                    </div>
                                    <?php echo form_error('username', '<small><span class="text-danger">', '</span></small>'); ?>
                                </div>
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label" for="password">Password</label>
                                    </div>
                                    <div class="form-control-wrap">
                                        <a href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                                            <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                        </a>
                                        <input type="password" class="form-control form-control-lg" id="password" placeholder="Masukkan password anda" name="password">
                                    </div>
                                    <?php echo form_error('password', '<small><span class="text-danger">', '</span></small>'); ?>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-lg btn-primary btn-block">Log In</button>
                                </div>
                                <?= form_close() ?>
                            </div>
                        </div>
                    </div>
                    <div class="nk-footer nk-auth-footer-full">
                        <div class="container wide-lg">
                            <div class="row g-3">
                                <div class="col-lg-6 order-lg-last">

                                </div>
                                <div class="col-lg-6">
                                    <div class="nk-block-content text-center text-lg-left">
                                        <p class="text-soft">&copy; 2019 CryptoLite. All Rights Reserved.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="<?= base_url() ?>assets/js/bundle.js?ver=2.0.0"></script>
    <script src="<?= base_url() ?>assets/js/scripts.js?ver=2.0.0"></script>

</html>