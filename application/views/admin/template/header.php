<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.png">
    <!-- Page Title  -->
    <title><?= $title ?></title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/dashlite.css?ver=2.0.0">
    <link id="skin-default" rel="stylesheet" href="<?= base_url() ?>assets/css/theme.css?ver=2.0.0">
</head>

<body class="nk-body npc-invest bg-lighter ">
    <div class="nk-app-root">
        <!-- wrap @s -->
        <div class="nk-wrap ">
            <!-- main header @s -->
            <div class="nk-header nk-header-fluid is-theme">
                <div class="container-xl wide-xl">
                    <div class="nk-header-wrap">
                        <div class="nk-menu-trigger mr-sm-2 d-lg-none">
                            <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="headerNav"><em class="icon ni ni-menu"></em></a>
                        </div>
                        <div class="nk-header-brand">
                            <a href="<?= base_url('admin/index') ?>" class="logo-link">
                                <img class="logo-light logo-img" src="<?= base_url() ?>assets/images/logo-sekolah.png" srcset="<?= base_url() ?>assets/images/logo-sekolah.png 2x" alt="logo">
                                <img class="logo-dark logo-img" src="<?= base_url() ?>assets/images/logo-sekolah.png" srcset="<?= base_url() ?>assets/images/logo-sekolah.png 2x" alt="logo-dark">
                            </a>
                        </div><!-- .nk-header-brand -->
                        <div class="nk-header-menu" data-content="headerNav">
                            <div class="nk-header-mobile">
                                <div class="nk-header-brand">
                                    <a href="<?= base_url('admin/index') ?>" class="logo-link">
                                        <img class="logo-light logo-img" src="<?= base_url() ?>assets/images/logo-sekolah.png" srcset="<?= base_url() ?>assets/images/logo-sekolah.png 2x" alt="logo">
                                        <img class="logo-dark logo-img" src="<?= base_url() ?>assets/images/logo-sekolah.png" srcset="<?= base_url() ?>assets/images/logo-sekolah.png 2x" alt="logo-dark">
                                    </a>
                                </div>
                                <div class="nk-menu-trigger mr-n2">
                                    <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="headerNav"><em class="icon ni ni-arrow-left"></em></a>
                                </div>
                            </div>
                            <ul class="nk-menu nk-menu-main ui-s2">
                                <li class="nk-menu-item">
                                    <a href="<?= base_url('admin/index') ?>" class="nk-menu-link">
                                        <span class="nk-menu-text">Dashboard</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-text">Master Data</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="<?= base_url('admin/tahun_pelajaran') ?>" class="nk-menu-link"><span class="nk-menu-text">Tahun Pelajaran</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="<?= base_url('admin/guru') ?>" class="nk-menu-link"><span class="nk-menu-text">Guru</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="<?= base_url('admin/siswa') ?>" class="nk-menu-link"><span class="nk-menu-text">Siswa</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="<?= base_url('admin/user') ?>" class="nk-menu-link"><span class="nk-menu-text">Pengguna</span></a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="<?= base_url('admin/kelas') ?>" class="nk-menu-link">
                                        <span class="nk-menu-text">Kelas</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="<?= base_url('admin/mapel') ?>" class="nk-menu-link">
                                        <span class="nk-menu-text">Mata Pelajaran</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                            </ul><!-- .nk-menu -->
                        </div><!-- .nk-header-menu -->
                        <div class="nk-header-tools">
                            <ul class="nk-quick-nav">
                                <li class="dropdown user-dropdown order-sm-first">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <div class="user-toggle">
                                            <div class="user-avatar sm">
                                                <em class="icon ni ni-user-alt"></em>
                                            </div>
                                            <div class="user-info d-none d-xl-block">
                                                <div class="user-status">Administrator</div>
                                                <div class="user-name dropdown-indicator"><?= _namauser($this->session->userdata('id')) ?></div>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1 is-light">
                                        <div class="dropdown-inner">
                                            <ul class="link-list">
                                                <li><a href="<?= base_url('login/logout') ?>"><em class="icon ni ni-signout"></em><span>Log out</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li><!-- .dropdown -->
                            </ul><!-- .nk-quick-nav -->
                        </div><!-- .nk-header-tools -->
                    </div><!-- .nk-header-wrap -->
                </div><!-- .container-fliud -->
            </div>
            <!-- main header @e -->