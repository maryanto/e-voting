<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">SMA Muhammadiyah 1 Yogyakarta</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">PANITIA </a></li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">

            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Grafik Suara Terkumpul</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="myChart2"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Grafik Total Poin (10 besar)</h4>
                    </div>
                    <div class="card-body">
                        <!-- <canvas id="myChart" class="chartjs-chart" data-colors='["--vz-primary"]'></canvas> -->
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div> <!-- end row -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
        <script type="text/javascript">
            var ctx = document.getElementById('myChart').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [
                        <?php
                        if (count($grafik) > 0) {
                            foreach ($grafik as $data) {
                                echo "'" . $data->NM_CALON . "',";
                            }
                        }
                        ?>
                    ],
                    datasets: [{
                        label: 'Jumlah Poin',
                        backgroundColor: '#03c2fc',
                        borderColor: '#0380fc',
                        data: [
                            <?php
                            if (count($grafik) > 0) {
                                foreach ($grafik as $data) {
                                    echo $data->JUMLAH . ", ";
                                }
                            }
                            ?>
                        ]
                    }]
                },
            });
        </script>
        <?php
        $total_suara = $TotalPemilih * 15;
        $jumlah_belum = $total_suara - $TotalVoting;
        ?>
        <script type="text/javascript">
            var ctx = document.getElementById('myChart2').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Belum', 'Sudah'],
                    datasets: [{
                        label: 'Jumlah Poin',
                        backgroundColor: ["#f58f7a", "#71c5f0"],
                        data: [<?= $jumlah_belum ?>, <?= $TotalVoting ?>]
                    }]
                },
            });
        </script>

        <div class="row">
            <div class="col-xxl-5">
                <div class="d-flex flex-column h-100">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p class="fw-medium text-muted mb-0">Wakasekur (3 Besar)</p>
                                            <h2 class="mt-4 ff-secondary fw-semibold">Waka. Kurikulum</h2>

                                            <table class="table table-borderless">
                                                <?php $no1 = 1;
                                                foreach ($kurikulum as $row) { ?>
                                                    <tr>
                                                        <td><?= $no1++ . '.' ?></td>
                                                        <td><img src="<?= base_url('foto/' . $row->FOTO) ?>" width="50" height="50" /></td>
                                                        <td><?= $row->NM_CALON ?></td>

                                                    </tr>
                                                <?php } ?>
                                            </table>
                                            <a href="<?= site_url('panitia/rekap/bidang') ?>">
                                                <button class="btn btn-outline-success">Hasil Selengkapnya</button>
                                            </a>
                                        </div>
                                        <div>
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-soft-primary rounded-circle fs-2">
                                                    <i data-feather="users" class="text-primary"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div> <!-- end card-->
                        </div> <!-- end col-->
                        <div class="col-md-6">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p class="fw-medium text-muted mb-0">Wakasekur (3 Besar)</p>
                                            <h2 class="mt-4 ff-secondary fw-semibold">Waka. Kesiswaan</h2>

                                            <table class="table table-borderless">
                                                <?php $no2 = 1;
                                                foreach ($kesiswaan as $row) { ?>
                                                    <tr>
                                                        <td><?= $no2++ . '.' ?></td>
                                                        <td><img src="<?= base_url('foto/' . $row->FOTO) ?>" width="50" height="50" /></td>
                                                        <td><?= $row->NM_CALON ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </table>

                                            <a href="<?= site_url('panitia/rekap/bidang') ?>">
                                                <button class="btn btn-outline-success">Hasil Selengkapnya</button>
                                            </a>
                                        </div>
                                        <div>
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-soft-primary rounded-circle fs-2">
                                                    <i data-feather="users" class="text-primary"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div> <!-- end card-->
                        </div> <!-- end col-->
                    </div> <!-- end row-->

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p class="fw-medium text-muted mb-0">Wakasekur (3 Besar)</p>
                                            <h2 class="mt-4 ff-secondary fw-semibold">Waka. SarPras</h2>

                                            <table class="table table-borderless">
                                                <?php $no3 = 1;
                                                foreach ($sarpras as $row) { ?>
                                                    <tr>
                                                        <td><?= $no3++ . '.' ?></td>
                                                        <td><img src="<?= base_url('foto/' . $row->FOTO) ?>" width="50" height="50" /></td>
                                                        <td><?= $row->NM_CALON ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </table>

                                            <a href="<?= site_url('panitia/rekap/bidang') ?>">
                                                <button class="btn btn-outline-success">Hasil Selengkapnya</button>
                                            </a>
                                        </div>
                                        <div>
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-soft-primary rounded-circle fs-2">
                                                    <i data-feather="users" class="text-primary"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div> <!-- end card-->
                        </div> <!-- end col-->
                        <div class="col-md-6">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p class="fw-medium text-muted mb-0">Wakasekur (3 Besar)</p>
                                            <h2 class="mt-4 ff-secondary fw-semibold">Waka. Humas</h2>

                                            <table class="table table-borderless">
                                                <?php $no4 = 1;
                                                foreach ($humas as $row) { ?>
                                                    <tr>
                                                        <td><?= $no4++ . '.' ?></td>
                                                        <td><img src="<?= base_url('foto/' . $row->FOTO) ?>" width="50" height="50" /></td>
                                                        <td><?= $row->NM_CALON ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </table>

                                            <a href="<?= site_url('panitia/rekap/bidang') ?>">
                                                <button class="btn btn-outline-success">Hasil Selengkapnya</button>
                                            </a>
                                        </div>
                                        <div>
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-soft-primary rounded-circle fs-2">
                                                    <i data-feather="users" class="text-primary"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div> <!-- end card-->
                        </div> <!-- end col-->
                    </div> <!-- end row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p class="fw-medium text-muted mb-0">Wakasekur (3 Besar)</p>
                                            <h2 class="mt-4 ff-secondary fw-semibold">Waka. Ismuba</h2>

                                            <table class="table table-borderless">
                                                <?php $no5 = 1;
                                                foreach ($ismuba as $row) { ?>
                                                    <tr>
                                                        <td><?= $no5++ . '.' ?></td>
                                                        <td><img src="<?= base_url('foto/' . $row->FOTO) ?>" width="50" height="50" /></td>
                                                        <td><?= $row->NM_CALON ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </table>
                                            <a href="<?= site_url('panitia/rekap/bidang') ?>">
                                                <button class="btn btn-outline-success">Hasil Selengkapnya</button>
                                            </a>
                                        </div>
                                        <div>
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-soft-primary rounded-circle fs-2">
                                                    <i data-feather="users" class="text-primary"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div> <!-- end card-->
                        </div> <!-- end col-->
                    </div>


                </div>
            </div> <!-- end col-->


        </div> <!-- end row-->
    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->