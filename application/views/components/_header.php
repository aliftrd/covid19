<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>ALFTRI - CORONAVIRUS INDONESIA & GLOBAL</title>
    <meta name="description" content="Informasi data terbaru mengenai kasus Virus Corona di seluruh dunia. Data di website covid19.alftri.xyz akan selalu di update secara otomatis dan berasal dari Johns Hopkins University">
    <meta name="keywords" content="Data Corona, Informasi Data Corona">
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="<?= base_url(); ?>/assets/img/icon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="<?= base_url(); ?>/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
                urls: ['<?= base_url(); ?>/assets/css/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/alftri.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/atlantis.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.16.0/dist/bootstrap-table.min.css">


    <!--   Core JS Files   -->
    <script src="<?= base_url(); ?>/assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/core/popper.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/core/bootstrap.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.16.0/dist/bootstrap-table.min.js"></script>

    <!-- jQuery UI -->
    <script src="<?= base_url(); ?>/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="<?= base_url(); ?>/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Moment JS -->
    <script src="<?= base_url(); ?>/assets/js/plugin/moment/moment.min.js"></script>

    <!-- Chart JS -->
    <script src="<?= base_url(); ?>/assets/js/plugin/chart.js/chart.min.js"></script>

    <!-- jQuery Sparkline -->
    <script src="<?= base_url(); ?>/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <script src="<?= base_url(); ?>/assets/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Datatables -->
    <script src="<?= base_url(); ?>/assets/js/plugin/datatables/datatables.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="<?= base_url(); ?>/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- Atlantis JS -->
    <script src="<?= base_url(); ?>/assets/js/atlantis.min.js"></script>

</head>

<body data-background-color="bg2">
    <div class="wrapper fullheight-side no-box-shadow-style">
        <!-- Logo Header -->
        <div class="logo-header position-fixed" data-background-color="dark">

            <a href="<?= base_url(); ?>" class="logo">
                <img src="<?= base_url(); ?>/assets/img/logo.svg" style="height: 70%;width: 100%;" alt="navbar brand" class="navbar-brand">
            </a>
            <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <i class="icon-menu"></i>
                </span>
            </button>
        </div>
        <!-- End Logo Header -->

        <!-- Sidebar -->
        <div class="sidebar" data-background-color="dark">
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav nav-warning">
                        <li class="nav-item <?= $this->uri->segment(1) == NULL ? 'active' : ''; ?>">
                            <a href="<?= base_url(); ?>">
                                <i class="fas fa-home"></i>
                                <p>Home</p>
                            </a>
                        </li>
                        <li class="nav-item <?= $this->uri->segment(1) == 'cases' ? 'active' : ''; ?>">
                            <a data-toggle="collapse" href="#cases" class="collapsed" aria-expanded="false">
                                <i class="fa fa-bug"></i>
                                <p>Semua Kasus</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="cases">
                                <ul class="nav nav-collapse">
                                    <li class="">
                                        <a href="<?= base_url('/cases/global'); ?>">
                                            <span class="sub-item">Dunia</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="<?= base_url('/cases/indonesia'); ?>">
                                            <span class="sub-item">Indonesia</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item <?= $this->uri->segment(1) == 'tentang-kami' ? 'active' : ''; ?>">
                            <a href="<?= base_url('tentang-kami'); ?>">
                                <i class="fas fa-info-circle"></i>
                                <p>Tentang Kami</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->