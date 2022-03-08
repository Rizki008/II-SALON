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
                        echo form_open_multipart('dekor/edit/' . $dekor->id_detail) ?>
                        <!-- text input -->
                        <div class="form-group">
                            <label>Nama Dekor</label>
                            <input name="nama" type="text" class="form-control input-rounded" placeholder="Nama Dekor" value="<?= $dekor->nama ?>">
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Nama Kategori Vendor</label>
                                    <select name="id_vendor" class="form-control input-rounded">
                                        <option value="<?= $dekor->id_vendor ?>"><?= $dekor->nama_vendor ?></option>
                                        <?php foreach ($vendor as $key => $value) { ?>
                                            <option value="<?= $value->id_vendor ?>"><?= $value->nama_vendor ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- text input -->
                        <div class="form-group">
                            <label>Deskripsi paket</label>
                            <textarea name="deskripsi" class="summernote" cols="30" rows="10" placeholder="Deskripsi Dekorasi"><?= $dekor->deskripsi ?></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            <a href="<?= base_url('dekor') ?>" class="btn btn-warning btn-sm">Kembali</a>
                        </div>

                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>