<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en" data-layout="horizontal" data-layout-style="" data-layout-position="fixed" data-topbar="light">

<head>

    <meta charset="utf-8" />
    <title>E-Voting | SMA Muhammadiyah 1 Yogyakarta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Aplikasi E-Voting SMA Muhammadiyah 1 Yogyakarta" name="description" />
    <meta content="Maryanto" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>/assets/images/favicon.ico">

    <!-- plugin css -->
    <link href="<?= base_url() ?>/assets/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src="<?= base_url() ?>/assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="<?= base_url() ?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url() ?>/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url() ?>/assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="<?= base_url() ?>/assets/css/custom.min.css" rel="stylesheet" type="text/css" />


</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box horizontal-logo">
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="<?= base_url() ?>/assets/images/logo-sm.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?= base_url() ?>/assets/images/logo-dark.png" alt="" height="17">
                                </span>
                            </a>

                            <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="<?= base_url() ?>/assets/images/logo-sm.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?= base_url() ?>/assets/images/logo-light.png" alt="" height="17">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>
                    </div>

                    <div class="d-flex align-items-center">



                        <div class="dropdown ms-sm-3 header-item topbar-user">
                            <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    <img class="rounded-circle header-profile-user" src="<?= base_url() ?>/assets/images/users/avatar-1.jpg" alt="Header Avatar">
                                    <span class="text-start ms-xl-2">
                                        <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text"><?= $user->NM_ADMIN ?></span>
                                        <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">Panitia</span>
                                    </span>
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <h6 class="dropdown-header">Welcome <?= $user->USERNAME ?> </h6>
                                <a class="dropdown-item" href="<?= site_url('login/logout') ?>"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Keluar</span></a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="<?= base_url() ?>/assets/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= base_url() ?>/assets/images/logo-dark.png" alt="" height="17">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="<?= base_url() ?>/assets/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= base_url() ?>/assets/images/logo-light.png" alt="" height="17">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="<?= site_url('panitia') ?>" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                                <i data-feather="home" class="icon-dual"></i> <span data-key="t-dashboards">Home</span>
                            </a>

                        </li> <!-- end Dashboard Menu -->
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                                <i data-feather="grid" class="icon-dual"></i> <span data-key="t-apps">Aplikasi</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarApps">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="<?= site_url('panitia/calon') ?>" class="nav-link" data-key="t-calendar"> Data Calon </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= site_url('panitia/pemilih') ?>" class="nav-link" data-key="t-chat"> Data Pemilih </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarLayouts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                                <i data-feather="layout" class="icon-dual"></i> <span data-key="t-layouts">Rekap E-Voting</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarLayouts">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="<?= site_url('panitia/pemilih/status') ?>" class="nav-link" data-key="t-horizontal">Status Pemilih</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= site_url('panitia/rekap') ?>" class="nav-link" data-key="t-detached">Rekap Calon</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= site_url('panitia/rekap/bidang') ?>" class="nav-link" data-key="t-horizontal">Rekap Bidang</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= site_url('panitia/rekap/calon') ?>" class="nav-link" data-key="t-horizontal">Rekap Jml Poin</a>
                                    </li>

                                </ul>
                            </div>
                        </li> <!-- end Dashboard Menu -->

                        <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Pages</span></li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarAuth" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAuth">
                                <i data-feather="users" class="icon-dual"></i> <span data-key="t-authentication">User</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarAuth">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="<?= site_url('panitia/admin') ?>" class="nav-link" role="button" aria-expanded="false" aria-controls="sidebarSignIn" data-key="t-signin"> Panitia
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= site_url('login/logout') ?>" class="nav-link" role="button" aria-expanded="false" aria-controls="sidebarSignIn" data-key="t-signin"> Keluar
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>

                    </ul>
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <?php $this->load->view($content); ?>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © SMAMUHI.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by Maryanto
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->



    <!-- JAVASCRIPT -->
    <script src="<?= base_url() ?>/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/node-waves/waves.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/feather-icons/feather.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="<?= base_url() ?>/assets/js/plugins.js"></script>

    <!-- apexcharts -->
    <script src="<?= base_url() ?>/assets/libs/apexcharts/apexcharts.min.js"></script>

    <!-- Vector map-->
    <script src="<?= base_url() ?>/assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/jsvectormap/maps/world-merc.js"></script>

    <!-- Dashboard init -->
    <script src="<?= base_url() ?>/assets/js/pages/dashboard-analytics.init.js"></script>



    <!-- App js -->
    <script src="<?= base_url() ?>/assets/js/app.js"></script>
</body>

</html>