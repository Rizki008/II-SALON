<div class="content-body">
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <?php
                        //notifikasi form kosong
                        echo validation_errors('<div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="fa fa-exclamation-triangle text-warning"></i>', '</h5></div>');

                        //notifikasi gagal upload gambar
                        if (isset($error_upload)) {
                            echo '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="fa fa-exclamation-triangle text-warning"></i>' . $error_upload . '</h5></div>';
                        }
                        echo form_open_multipart('paket/edit/' . $paket->id_paket) ?>
                        <!-- text input -->
                        <div class="form-group">
                            <label>Nama paket</label>
                            <input name="nama_paket" type="text" class="form-control input-rounded" placeholder="Nama paket" value="<?= $paket->nama_paket ?>">
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Nama Vendor</label>
                                    <select name="id_vendor" class="form-control">
                                        <option value="<?= $paket->id_vendor ?>"><?= $paket->nama_vendor ?></option>
                                        <?php foreach ($vendor as $key => $value) { ?>
                                            <option value="<?= $value->id_vendor ?>"><?= $value->nama_vendor ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Tipe paket</label>
                                    <input name="tipe_paket" type="text" class="form-control input-rounded" placeholder="tipe_paket paket" value="<?= $paket->tipe_paket ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Harga paket</label>
                                    <input name="harga" type="text" class="form-control input-rounded" placeholder="Harga paket" value="<?= $paket->harga ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Diskon paket</label>
                                    <input name="diskon" type="text" class="form-control input-rounded" placeholder="diskon paket" value="<?= $paket->diskon ?>">
                                </div>
                            </div>

                        </div>

                        <!-- text input -->
                        <div class="form-group">
                            <label>Deskripsi paket</label>
                            <textarea name="deskripsi" class="summernote" cols="30" rows="10" placeholder="Deskripsi paket" value="<?= $paket->deskripsi ?>"><?= $paket->deskripsi ?></textarea>
                        </div>

                        <div class="row">
                            <div class="input-group mb-3 col-sm-6">
                                <div class="custom-file">
                                    <input type="file" name="gambar" class="custom-file-input" id="preview_gambar">
                                    <label class="custom-file-label">Upload gambar</label>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <img src="<?= base_url('assets/gambar/' . $paket->gambar) ?>" id="gambar_load" width="400px">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            <a href="<?= base_url('paket') ?>" class="btn btn-warning btn-sm">Kembali</a>
                        </div>

                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>