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
                        <h3 class="card-title">Data User</h3>
                        <button data-toggle="modal" data-target="#add" type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>
                            Tambah User</button>
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
                                <thead class="text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Level</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($user as $key => $value) { ?>
                                        <tr class="text-center">
                                            <td><?= $no++; ?></td>
                                            <td><?= $value->username ?></td>
                                            <td><?= $value->email ?></td>
                                            <td><?= $value->password ?></td>
                                            <td><?php
                                                if ($value->level == 1) {
                                                    echo '<span class="badge bg-danger">Admin</span>';
                                                } else {
                                                    echo '<span class="badge bg-success">Vendor</span>';
                                                } ?></td>
                                            <td>
                                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $value->id_user ?>"><i class="fa fa-edit"></i></button>
                                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value->id_user ?>"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>

                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /.modal Add -->
<div class="modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add user</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                echo form_open('user/add');
                ?>

                <div class="form-group">
                    <label>Nama User</label>
                    <input type="text" name="username" class="form-control" placeholder="Nama User" required>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Email" required>
                </div>

                <div class="form-group">
                    <label>Passowrd</label>
                    <input type="text" name="password" class="form-control" placeholder="Passowrd" required>
                </div>

                <div class="form-group">
                    <label>Level User</label>
                    <select name="level" class="form-control">
                        <option value="1" selected>Admin</option>
                        <option value="2">User</option>
                    </select>
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
<?php foreach ($user as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value->id_user ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit user</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open('user/edit/' . $value->id_user);
                    ?>

                    <div class="form-group">
                        <label>Nama User</label>
                        <input type="text" name="username" value="<?= $value->username ?>" class="form-control" placeholder="Nama User" required>
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="email" value="<?= $value->email ?>" class="form-control" placeholder="Email" required>
                    </div>

                    <div class="form-group">
                        <label>Passowrd</label>
                        <input type="text" name="password" value="<?= $value->password ?>" class="form-control" placeholder="Passowrd" required>
                    </div>

                    <div class="form-group">
                        <label>Level User</label>
                        <select name="level" class="form-control">
                            <option value="1" <?php if ($value->level == 1) {
                                                    echo 'selected';
                                                } ?>>Admin</option>
                            <option value="2" <?php if ($value->level == 2) {
                                                    echo 'selected';
                                                } ?>>Vendor</option>
                        </select>
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
<?php foreach ($user as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value->id_user ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete <?= $value->username ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Apakah Anda Yakin Akan Hapus Data ini?</h5>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('user/delete/' . $value->id_user) ?> " class="btn btn-primary">Delete</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>