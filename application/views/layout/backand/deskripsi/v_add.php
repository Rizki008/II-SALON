<div class="content-body">

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h3 class="card-title">Tambah Gambar paket : <?= $paket->nama_paket ?></h3>

                        <?php
                        if ($this->session->flashdata('pesan')) {
                            echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fa fa-check"></i>';
                            echo $this->session->flashdata('pesan');
                            echo '</h5></div>';
                        }
                        ?>

                        <?php
                        //notifikasi form kosong
                        echo validation_errors('<div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fa fa-exclamation-triangle"></i>', '</h5></div>');

                        //notifikasi gagal upload gambar
                        if (isset($error_upload)) {
                            echo '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i>' . $error_upload . '</h5></div>';
                        }
                        echo form_open_multipart('deskripsi/add/' . $paket->id_paket) ?>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Keterangan Gambar paket</label>
                                    <input name="keterangan" type="text" class="form-control" placeholder="keterangan Gambar paket" value="<?= set_value('keterangan') ?>">
                                </div>
                            </div>

                            <!--<div class="col-sm-6">
                                <div class="form-group">
                                    <label>Nama vendor vendor</label>
                                    <select name="id_paket" class="form-control input-rounded">
                                        <option value="">---Pilih Deskripsi paket---</option>
                                        <?php foreach ($vendor as $key => $value) { ?>
                                            <option value="<?= $value->id_paket ?>"><?= $value->deskipsi ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>-->

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Gambar paket</label>
                                    <input type="file" name="gambar" class="form-control" id="preview_gambar" required>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <img src="<?= base_url('assets/gambar/nopoto.jpg') ?>" id="gambar_load" width="200px">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            <a href="<?= base_url('deskripsi') ?>" class="btn btn-warning btn-sm">Kembali</a>
                        </div>

                        <?php echo
                        form_close();
                        ?>

                        <hr>
                        <div class="row">
                            <?php foreach ($gambar as $key => $value) { ?>
                                <div class="col-sm-3 text-center">
                                    <div class="form-group">
                                        <img src="<?= base_url('assets/fotodesk/' . $value->gambar) ?>" id="gambar_load" width="250px" height="200px">
                                    </div>
                                    <p for="">keterangan : <?= $value->keterangan ?></p>
                                    <button data-toggle="modal" data-target="#delete<?= $value->id_desk ?>" class="btn btn-danger btn-sm btn-block"><i class="fa fa-trash"></i>Hapus Gambar</button>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>
<!-- /.modal Delete -->
<?php foreach ($gambar as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value->id_desk ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete <?= $value->keterangan ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">

                    <div class="form-group">
                        <img src="<?= base_url('assets/fotodesk/' . $value->gambar) ?>" id="gambar_load" width="250px" height="200px">
                    </div>

                    <h5>Apakah Anda Yakin Akan Hapus Gambar ini?</h5>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('deskripsi/delete/' . $value->id_paket . '/' . $value->id_desk) ?> " class="btn btn-primary">Delete</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>