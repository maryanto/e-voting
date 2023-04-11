<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">E-Voting</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">

                            <li class="breadcrumb-item active">SMA Muhammadiyah 1 Yogyakarta</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xxl-5">
                <div class="d-flex flex-column h-100">
                    <?php if ($this->session->flashdata('sukses')) : ?>
                        <div class="row h-100">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="alert alert-danger border-0 rounded-0 m-0 d-flex align-items-center" role="alert">
                                            <i data-feather="alert-triangle" class="text-danger me-2 icon-sm"></i>
                                            <div class="flex-grow-1 text-truncate">
                                                Anda masih mempunyai <b>15</b> suara.
                                            </div>
                                            <div class="flex-shrink-0">
                                                <a href="pages-pricing.html" class="text-reset text-decoration-underline"><b>Upgrade</b></a>
                                            </div>
                                        </div>


                                    </div> <!-- end card-body-->
                                </div>
                            </div> <!-- end col-->
                        </div> <!-- end row-->
                    <?php endif; ?>



                    <div class="row">
                        <div class="col-md-8">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <h3>Daftar Calon Wakasekur</h3>
                                    <?php if ($jml_pilihan < 3) : ?>
                                        <table class="table table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Foto</th>
                                                    <th>Nama Calon</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($calon as $row) { ?>
                                                    <tr>
                                                        <td><?= $no++ . '.' ?></td>
                                                        <td><img src="<?= base_url('foto/' . $row->FOTO) ?>" width="50" height="50" /></td>
                                                        <td><?= $row->NM_CALON ?></td>
                                                        <td>
                                                            <a href="<?= site_url('user/pilih/simpan/' . $bidang->ID_BIDANG . '/' . $row->ID_CALON) ?>"> <button class="btn btn-danger btn-sm" title="Klik tombol ini untuk memilih">Pilih Calon</button> </a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    <?php endif; ?>
                                </div><!-- end card body -->
                            </div> <!-- end card-->
                        </div> <!-- end col-->

                        <div class="col-md-4">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p class="fw-medium text-muted mb-0">Wakasekur</p>
                                            <h2 class="mt-4 ff-secondary fw-semibold"><?= $bidang->NM_BIDANG ?></h2>
                                        </div>
                                        <div>
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-soft-primary rounded-circle fs-2">
                                                    <i data-feather="user" class="text-primary"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <h3>Pilihan Anda </h3>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Calon</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($pilihan as $row) { ?>
                                                <tr>
                                                    <td><?= $row->PERINGKAT ?></td>
                                                    <td><?= $row->NM_CALON ?></td>
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