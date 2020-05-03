<div class="main-panel full-height">
    <div class="container">
        <div class="page-inner">

            <div class="page-header">
                <h4 class="page-title">Home</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Corona Virus Home</a>
                    </li>
                </ul>
            </div>

            <div class="row d-flex justify-content-center">
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-secondary card-round" style="margin-bottom: 15px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <div class="icon-big text-center">
                                        <img src="<?= base_url('assets/img/emoji/sad.png'); ?>" alt="Flags" style="width: 40px">
                                    </div>
                                </div>
                                <div class="col-8 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Total Positif</p>
                                        <h4 class="card-title"><?= number_format($globals['positive']) ?> <span style="font-size: 12px">Orang</span></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-success card-round" style="margin-bottom: 15px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <div class="icon-big text-center">
                                        <img src="<?= base_url('assets/img/emoji/smile.png'); ?>" alt="Flags" style="width: 40px">
                                    </div>
                                </div>
                                <div class="col-8 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Total Sembuh</p>
                                        <h4 class="card-title"><?= number_format($globals['recovered']) ?> <span style="font-size: 12px">Orang</span></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-danger card-round" style="margin-bottom: 15px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <div class="icon-big text-center">
                                        <img src="<?= base_url('assets/img/emoji/death.png'); ?>" alt="Flags" style="width: 40px">
                                    </div>
                                </div>
                                <div class="col-8 col-stats">
                                    <div class="numbers">
                                        <p class="card-category" style="font-size:14px;">Total Meninggal</p>
                                        <h4 class="card-title"><?= number_format($globals['deaths']) ?> <span style="font-size: 12px">Orang</span></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-warning card-round" style="margin-bottom: 15px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <div class="icon-big text-center">
                                        <img src="<?= base_url('assets/img/emoji/indonesia-flags.png'); ?>" alt="Flags" style="width: 40px">
                                    </div>
                                </div>
                                <div class="col-8 col-stats">
                                    <div class="numbers">
                                        <p class="card-category" style="font-size:14px;">Indonesia</p>
                                        <h4 class="card-title" style="font-size: 10px;"><?= $summary['confirmed'] ?> Positif, <?= $summary['recovered'] ?> Sembuh, <?= $summary['deaths'] ?> Meninggal</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="page-category text-center" style="font-size: 12px;margin-bottom: 15px;">Update terakhir : <?= $summary['update_at'] ?> WIB</div>

            <div class="row">

                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title my-card-title">Statistik Kasus Coronavirus Indonesia</div>
                        </div>
                        <div class="card-body">
                            <div class="chart-container">
                                <canvas id="doughnutChartIndo" style="width: 50%; height: 50%"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title my-card-title">Statistik Kasus Coronavirus Global</div>
                        </div>
                        <div class="card-body">
                            <div class="chart-container">
                                <canvas id="doughnutChartGlobal" style="width: 50%; height: 50%"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script type="text/javascript">
        var myDoughnutChartIndo = new Chart(doughnutChartIndo, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [<?= $summary['confirmed'] ?>, <?= $summary['recovered'] ?>, <?= $summary['deaths'] ?>],
                    backgroundColor: ['#296d98', '#f9a404', '#ed553b']
                }],

                labels: [
                    "Positif",
                    "Sembuh",
                    "Meninggal"
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'left'
                },
                layout: {
                    padding: {
                        left: 20,
                        right: 20,
                        top: 20,
                        bottom: 20
                    }
                }
            }
        });

        var myDoughnutChartGlobal = new Chart(doughnutChartGlobal, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [<?= $globals['positive'] ?>, <?= $globals['recovered'] ?>, <?= $globals['deaths'] ?>],
                    backgroundColor: ['#296d98', '#f9a404', '#ed553b']
                }],

                labels: [
                    "Positif",
                    "Sembuh",
                    "Meninggal"
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'left'
                },
                layout: {
                    padding: {
                        left: 20,
                        right: 20,
                        top: 20,
                        bottom: 20
                    }
                }
            }
        });
    </script>