<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">SMA Muhammadiyah 1 Yogyakarta</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">

                            <li class="breadcrumb-item active"></li>
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
                                    <div class="alert alert-danger border-0 rounded-0 m-0 d-flex align-items-center" role="alert">
                                        <i data-feather="alert-triangle" class="text-danger me-2 icon-sm"></i>
                                        <div class="flex-grow-1 text-truncate">
                                            <?php
                                            $sisa = 15 - $jml_pilihan;
                                            if ($sisa > 0 and $sisa <= 15) {
                                                echo "Anda masih mempunyai " . $sisa . " suara.";
                                            } else {
                                                echo "Anda sudah tidak mempunyai suara.";
                                            }
                                            ?>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <a href="#" class="text-reset text-decoration-underline"><b><?= $user->NM_PEMILIH ?></b></a>
                                        </div>
                                    </div>


                                </div> <!-- end card-body-->
                            </div>
                        </div> <!-- end col-->
                    </div> <!-- end row-->

                    <div class="row">
                        <?php foreach ($bidang as $row) { ?>
                            <div class="col-md-4">
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <p class="fw-medium text-muted mb-0">Wakasekur</p>
                                                <h2 class="mt-4 ff-secondary fw-semibold"><?= $row->NM_BIDANG ?></h2>
                                                <a href="<?= site_url('user/pilih/calon/' . $row->ID_BIDANG) ?>"><button class="btn btn-outline-primary btn-sm">Pilih Calon</button></a>
                                            </div>
                                            <div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-soft-primary rounded-circle fs-2">
                                                        <i data-feather="user" class="text-primary"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        <?php } ?>

                    </div> <!-- end row-->

                </div>
            </div> <!-- end col-->


        </div> <!-- end row-->


    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->