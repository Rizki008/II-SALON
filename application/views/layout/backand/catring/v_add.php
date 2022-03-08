<div class="content-body">

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
                        echo form_open_multipart('paket/add') ?>
                        <!-- text input -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Nama paket</label>
                                    <input name="nama_paket" type="text" class="form-control input-rounded" placeholder="Nama paket" value="<?= set_value('nama_paket') ?>">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Nama vendor vendor</label>
                                    <select name="id_vendor" class="form-control input-rounded">
                                        <option value="">---Pilih vendor vendor---</option>
                                        <?php foreach ($vendor as $key => $value) { ?>
                                            <option value="<?= $value->id_vendor ?>"><?= $value->nama_vendor ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Tipe Paket</label>
                                    <input name="tipe_paket" type="text" class="form-control input-rounded" placeholder="tipe_paket paket" value="<?= set_value('tipe_paket') ?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Harga Paket</label>
                                    <input name="harga" type="text" class="form-control input-rounded" placeholder="Harga paket" value="<?= set_value('harga') ?>">
                                </div>
                            </div>

                        </div>
                        <!-- text input -->
                        <div class="form-group">
                            <label>Deskripsi paket</label>
                            <textarea name="deskripsi" class="form-control" id="editor" cols="30" rows="10" placeholder="Deskripsi paket"><?= set_value('deskripsi') ?></textarea>
                        </div>

                        <div class="row">

                            <div class="input-group mb-3 col-sm-6">
                                <div class="custom-file">
                                    <input type="file" name="gambar" class="custom-file-input" id="preview_gambar" required>
                                    <label class="custom-file-label">Upload gambar</label>
                                </div>
                            </div>
                            <!--<div class="col-sm-6">
                                <div class="form-group">
                                    <label>Gambar paket</label>
                                    <input type="file" name="gambar" class="form-control" id="preview_gambar" required>
                                </div>
                            </div>-->

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <img src="<?= base_url('assets/gambar/nopoto.jpg') ?>" id="gambar_load" width="400px">
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

<script>
    function bacaGambar(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#gambar_load').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#preview_gambar").change(function() {
        bacaGambar(this);
    });
</script>