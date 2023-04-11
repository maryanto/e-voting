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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">REKAP SUARA & POIN</a></li>
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
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr rowspan="2">
                                                <th rowspan="2">No</th>
                                                <th rowspan="2">Nama Lengkap</th>
                                                <th rowspan="2">Foto</th>
                                                <th colspan="5">Jumlah Poin Pada Bidang</th>
                                            </tr>
                                            <tr>
                                                <th>Kurikulum</th>
                                                <th>Kesiswaan</th>
                                                <th>SarPras</th>
                                                <th>Humas</th>
                                                <th>Ismuba</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($calon as $row) { ?>
                                                <tr>
                                                    <td><?= $no++ . '.' ?></td>
                                                    <td><?= $row->NM_CALON ?></td>
                                                    <td><img src="<?= base_url('foto/' . $row->FOTO) ?>" width="50" height="50" /></td>
                                                    <td><?= $this->votinglib->jmlPoinCalon($row->ID_CALON, '1') ?></td>
                                                    <td><?= $this->votinglib->jmlPoinCalon($row->ID_CALON, '3') ?></td>
                                                    <td><?= $this->votinglib->jmlPoinCalon($row->ID_CALON, '2') ?></td>
                                                    <td><?= $this->votinglib->jmlPoinCalon($row->ID_CALON, '4') ?></td>
                                                    <td><?= $this->votinglib->jmlPoinCalon($row->ID_CALON, '5') ?></td>

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