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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">REKAP SUARA & POIN Per BIDANG</a></li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xxl-5">
                <div class="d-flex flex-column h-100">
                    <div class="row h-100">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body p-0">
                                    <!-- <div class="alert alert-primary border-0 rounded-0 m-0 d-flex align-items-center" role="alert">
                                        <i data-feather="alert-triangle" class="text-primary me-2 icon-sm"></i>
                                        <div class="flex-grow-1 text-truncate">
                                            Your free trial expired in <b>17</b> days.
                                        </div>
                                        <div class="flex-shrink-0">
                                            <a href="pages-pricing.html" class="text-reset text-decoration-underline"><b>Upgrade</b></a>
                                        </div>
                                    </div> -->

                                </div> <!-- end card-body-->
                            </div>
                        </div> <!-- end col-->
                    </div> <!-- end row-->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <h4>Wakasekur. KURIKULUM</h4>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Lengkap</th>
                                                <th>Foto</th>
                                                <th>Total Suara</th>
                                                <th>Total Poin</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no1 = 1;
                                            foreach ($kurikulum as $row) { ?>
                                                <tr>
                                                    <td><?= $no1++ . '.' ?></td>
                                                    <td><?= $row->NM_CALON ?></td>
                                                    <td><img src="<?= base_url('foto/' . $row->FOTO) ?>" width="50" height="50" /></td>
                                                    <td><?= $row->JML_SUARA ?></td>
                                                    <td><?= $row->JML_POIN ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <hr>
                                    <h4>Wakasekur. KESISWAAN</h4>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Lengkap</th>
                                                <th>Foto</th>
                                                <th>Total Suara</th>
                                                <th>Total Poin</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no2 = 1;
                                            foreach ($kesiswaan as $row) { ?>
                                                <tr>
                                                    <td><?= $no2++ . '.' ?></td>
                                                    <td><?= $row->NM_CALON ?></td>
                                                    <td><img src="<?= base_url('foto/' . $row->FOTO) ?>" width="50" height="50" /></td>
                                                    <td><?= $row->JML_SUARA ?></td>
                                                    <td><?= $row->JML_POIN ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <hr>
                                    <h4>Wakasekur. SARANA PRASARANA</h4>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Lengkap</th>
                                                <th>Foto</th>
                                                <th>Total Suara</th>
                                                <th>Total Poin</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no3 = 1;
                                            foreach ($sarpras as $row) { ?>
                                                <tr>
                                                    <td><?= $no3++ . '.' ?></td>
                                                    <td><?= $row->NM_CALON ?></td>
                                                    <td><img src="<?= base_url('foto/' . $row->FOTO) ?>" width="50" height="50" /></td>
                                                    <td><?= $row->JML_SUARA ?></td>
                                                    <td><?= $row->JML_POIN ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <hr>
                                    <h4>Wakasekur. HUMAS</h4>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Lengkap</th>
                                                <th>Foto</th>
                                                <th>Total Suara</th>
                                                <th>Total Poin</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no4 = 1;
                                            foreach ($humas as $row) { ?>
                                                <tr>
                                                    <td><?= $no4++ . '.' ?></td>
                                                    <td><?= $row->NM_CALON ?></td>
                                                    <td><img src="<?= base_url('foto/' . $row->FOTO) ?>" width="50" height="50" /></td>
                                                    <td><?= $row->JML_SUARA ?></td>
                                                    <td><?= $row->JML_POIN ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <hr>
                                    <h4>Wakasekur. ISMUBA</h4>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Lengkap</th>
                                                <th>Foto</th>
                                                <th>Total Suara</th>
                                                <th>Total Poin</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no5 = 1;
                                            foreach ($ismuba as $row) { ?>
                                                <tr>
                                                    <td><?= $no5++ . '.' ?></td>
                                                    <td><?= $row->NM_CALON ?></td>
                                                    <td><img src="<?= base_url('foto/' . $row->FOTO) ?>" width="50" height="50" /></td>
                                                    <td><?= $row->JML_SUARA ?></td>
                                                    <td><?= $row->JML_POIN ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div><!-- end card body -->
                            </div> <!-- end card-->
                        </div> <!-- end col-->

                    </div> <!-- end row-->


                </div>
            </div> <!-- end col-->


        </div> <!-- end row-->
    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->