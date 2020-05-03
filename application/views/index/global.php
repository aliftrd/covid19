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
                        <a href="#">Corona Virus Global</a>
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

            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title my-card-title">Statistik Kasus Coronavirus Global</div>
                            <div class="chart-container">
                                <canvas id="doughnutChartGlobal" style="width: 50%; height: 50%"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-responsive">
                            <div class="card-title my-card-title">Data Kasus Coronavirus Global (Data by JHU)</div>
                            <table id="table" data-toggle="table" data-height="460" data-search="true" data-visible-search="true">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Negara</th>
                                        <th>Positif</th>
                                        <th>Sembuh</th>
                                        <th>Meninggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0;
                                    foreach ($globals['features'] as $gCorona) : ?>
                                        <tr>
                                            <td><?= ++$i ?></td>
                                            <td><?= $gCorona['country'] ?></td>
                                            <td><?= number_format($gCorona['confirmed']) ?></td>
                                            <td><?= number_format($gCorona['recovered']) ?></td>
                                            <td><?= number_format($gCorona['deaths']) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <script type="text/javascript">
        $('#global-table').DataTable();

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