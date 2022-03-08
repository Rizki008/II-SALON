<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Data Table <a href="<?= base_url('paket/add') ?>" type="button" class="btn btn-primary btn-sm "><i class="fa fa-plus"></i>
                                Tambah Paket</a></h4>
                        <div class="table-responsive">
                            <?php
                            if ($this->session->flashdata('pesan')) {
                                echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="fa fa-check text-success"></i>';
                                echo $this->session->flashdata('pesan');
                                echo '</h5></div>';
                            }
                            ?>
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama paket</th>
                                        <th>Nama Vendor</th>
                                        <th>Kategori</th>
                                        <th>Harga</th>
                                        <th>Diskon</th>
                                        <th>Deskripsi</th>
                                        <th>Gambar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($paket as $key => $value) { ?>
                                        <tr class="text-center">
                                            <td><?= $no++; ?></td>
                                            <td><?= $value->nama_paket ?></td>
                                            <td><?= $value->nama_vendor ?></td>
                                            <td><?= $value->tipe_paket ?></td>
                                            <td>Rp. <?= number_format($value->harga, 0) ?></td>
                                            <td>Rp. <?= number_format($value->diskon, 0) ?></td>
                                            <td><?= $value->deskripsi ?></td>
                                            <td><img src="<?= base_url('assets/gambar/' . $value->gambar) ?>" width="150px"></td>
                                            <td>
                                                <a href="<?= base_url('paket/edit/' . $value->id_paket) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value->id_paket ?>"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>

                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>

<!-- /.modal Delete -->
<?php foreach ($paket as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value->id_paket ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete <?= $value->nama_paket ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Apakah Anda Yakin Akan Hapus Data ini?</h5>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('paket/delete/' . $value->id_paket) ?> " class="btn btn-primary">Delete</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>