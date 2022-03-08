<!--**********************************
            Content body start
        ***********************************-->
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
                        <h4 class="card-title">Data Table</h4>
                        <button data-toggle="modal" data-target="#add" type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>Tambah vendor</button>
                        <div class="table-responsive">
                            <?php
                            if ($this->session->flashdata('pesan')) {
                                echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fa fa-check"></i>';
                                echo $this->session->flashdata('pesan');
                                echo '</h5></div>';
                            }
                            ?>
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama vendor</th>
                                        <th>Nama Pemilik</th>
                                        <th>No Telphone</th>
                                        <th>Alamat</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($vendor as $key => $value) { ?>
                                        <tr class="text-center">
                                            <td><?= $no++; ?></td>
                                            <td><?= $value->nama_vendor ?></td>
                                            <td><?= $value->nama_pemilik ?></td>
                                            <td><?= $value->no_telpon ?></td>
                                            <td><?= $value->alamat ?></td>
                                            <td>
                                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $value->id_vendor ?>"><i class="fa fa-edit"></i></button>
                                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value->id_vendor ?>"><i class="fa fa-trash"></i></button>
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
<!--**********************************
            Content body end
        ***********************************-->

<!-- /.modal Add -->
<div class="modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah vendor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                echo form_open('vendor/add');
                ?>

                <div class="form-group">
                    <label>Nama vendor</label>
                    <input type="text" name="nama_vendor" class="form-control" placeholder="Nama vendor" required>
                </div>
                <div class="form-group">
                    <label>Nama Pemilik</label>
                    <input type="text" name="nama_pemilik" class="form-control" placeholder="Nama pemilik" required>
                </div>
                <div class="form-group">
                    <label>No Telpon</label>
                    <input type="text" name="no_telpon" class="form-control" placeholder="No telpon" required>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            <?php
            echo form_close();
            ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- /.modal Edit -->
<?php foreach ($vendor as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value->id_vendor ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit vendor</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open('vendor/edit/' . $value->id_vendor);
                    ?>

                    <div class="form-group">
                        <label>Nama vendor</label>
                        <input type="text" name="nama_vendor" value="<?= $value->nama_vendor ?>" class="form-control" placeholder="Nama User" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Pemilik</label>
                        <input type="text" name="nama_pemilik" value="<?= $value->nama_pemilik ?>" class="form-control" placeholder="Nama pemilik" required>
                    </div>
                    <div class="form-group">
                        <label>No Telpon</label>
                        <input type="text" name="no_telpon" value="<?= $value->no_telpon ?>" class="form-control" placeholder="No Telpon" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" value="<?= $value->alamat ?>" class="form-control" placeholder="Alamat" required>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                <?php
                echo form_close();
                ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>


<!-- /.modal Delete -->
<?php foreach ($vendor as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value->id_vendor ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete <?= $value->nama_vendor ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Apakah Anda Yakin Akan Hapus Data ini?</h5>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('vendor/delete/' . $value->id_vendor) ?> " class="btn btn-primary">Delete</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>