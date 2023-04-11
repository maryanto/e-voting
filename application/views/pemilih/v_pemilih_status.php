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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">STATUS VOTING </a></li>
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
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Lengkap</th>
                                                <th>Status Voting</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($pemilih as $row) { ?>
                                                <tr>
                                                    <td><?= $no++ . '.' ?></td>
                                                    <td><?= $row->NM_PEMILIH ?></td>
                                                    <td>
                                                        <?php $jml_suara =  $this->votinglib->jmlSuara($row->ID_PEMILIH); ?>
                                                        <?php if ($jml_suara < 15 && $jml_suara > 0) : ?>
                                                            <button class="btn btn-soft-warning"><?= $jml_suara ?></button>
                                                        <?php endif; ?>
                                                        <?php if ($jml_suara == 15) : ?>
                                                            <button class="btn btn-soft-success">Selesai</button>
                                                        <?php endif; ?>
                                                        <?php if ($jml_suara < 1) : ?>
                                                            <button class="btn btn-soft-danger">0</button>
                                                        <?php endif; ?>
                                                    </td>
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