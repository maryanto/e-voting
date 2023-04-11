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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">DATA PEMILIH </a></li>
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
                                    <?php if ($this->session->flashdata('sukses')) : ?>
                                        <div class="alert alert-primary border-0 rounded-0 m-0 d-flex align-items-center" role="alert">
                                            <i data-feather="alert-triangle" class="text-primary me-2 icon-sm"></i>
                                            <div class="flex-grow-1 text-truncate">
                                                <?= $this->session->flashdata('sukses'); ?>
                                            </div>

                                        </div>
                                    <?php endif; ?>

                                    <?php if ($this->session->flashdata('gagal')) : ?>
                                        <div class="alert alert-danger border-0 rounded-0 m-0 d-flex align-items-center" role="alert">
                                            <i data-feather="alert-triangle" class="text-primary me-2 icon-sm"></i>
                                            <div class="flex-grow-1 text-truncate">
                                                <?= $this->session->flashdata('gagal'); ?>
                                            </div>

                                        </div>
                                    <?php endif; ?>
                                </div> <!-- end card-body-->
                            </div>
                        </div> <!-- end col-->
                    </div> <!-- end row-->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <button class="btn btn-soft-success" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah Data Pemilih</button>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Lengkap</th>
                                                <th>Username</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($admin as $row) { ?>
                                                <tr>
                                                    <td><?= $no++ . '.' ?></td>
                                                    <td><?= $row->NM_ADMIN ?></td>
                                                    <td><?= $row->USERNAME ?></td>
                                                    <td>
                                                        <button class="btn btn-soft-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $row->ID_ADMIN ?>">Edit</button>
                                                        <a href="<?= site_url('panitia/admin/hapus/' . $row->ID_ADMIN) ?>" onclick="return confirm('Anda yakin mau menghapus data ini ?')">
                                                            <button class="btn btn-soft-danger btn-sm">Hapus</button>
                                                        </a>
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
<div id="modalTambah" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <form method="POST" action="<?= site_url('panitia/admin/add') ?>" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Tambah Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="col-xxl-3 col-md-12">
                        <div>
                            <label for="basiInput" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nm_admin" id="basiInput">
                        </div>
                    </div>

                    <div class="col-xxl-3 col-md-12">
                        <div>
                            <label for="basiInput" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="basiInput">
                        </div>
                    </div>

                    <div class="col-xxl-3 col-md-12">
                        <div>
                            <label for="basiInput" class="form-label">Password</label>
                            <input type="text" class="form-control" name="password" id="basiInput">
                        </div>
                    </div>

                    <!--end col-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary ">Simpan</button>
                </div>

            </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php foreach ($admin as $row) { ?>
    <div id="modalEdit<?= $row->ID_ADMIN ?>" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <form method="POST" action="<?= site_url('panitia/admin/update') ?>" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Update Data Admin</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="col-xxl-3 col-md-12">
                            <div>
                                <label for="basiInput" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nm_admin" id="basiInput" value="<?= $row->NM_ADMIN ?>">
                            </div>
                        </div>

                        <div class="col-xxl-3 col-md-12">
                            <div>
                                <label for="basiInput" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" id="basiInput" value="<?= $row->USERNAME ?>">
                            </div>
                        </div>

                        <div class="col-xxl-3 col-md-12">
                            <div>
                                <label for="basiInput" class="form-label">Password</label>
                                <input type="text" class="form-control" name="password" id="basiInput">
                            </div>
                        </div>
                        <input type="hidden" value="<?= $row->PASSWORD ?>" name="old_password" />
                        <input type="hidden" value="<?= $row->ID_ADMIN ?>" name="id_admin" />
                        <!--end col-->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary ">Simpan</button>
                    </div>

                </div><!-- /.modal-content -->
            </form>
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<?php } ?>