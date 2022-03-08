<div class="hero-wrap hero-bread" style="background-image: url('<?= base_url('template4/images/bg_1.jpg') ?>');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Toko</a></span> <span>Mutiara</span></p>
                <h1 class="mb-0 bread"><?= $title ?></h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
            <div class="col-12">

                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <h3 class="text-center">Review Produk</h3><br><br>
                    <!-- title row -->
                    <div class="row">
                        <?php foreach ($info as $key => $value) { ?>

                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i> <?= $value->nama_pelanggan ?>
                                    <small class="float-right">Date: <?= $value->tgl_order ?></small>
                                </h4>
                            </div>
                            <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            Alamat Penerima
                            <address>
                                <strong>Nama : <?= $value->nama_pelanggan ?></strong><br>
                                Phone : <?= $value->no_telpon ?><br>
                                Kota : <?= $value->kota ?><br>
                                Kode Pos : <?= $value->kode_pos ?><br>
                                <?= $value->alamat ?>
                            </address>
                        </div>

                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <b>No Order: <?= $value->no_order ?></b><br>
                            <br>
                            <!--<b>Expedisi:</b> <?= $value->expedisi ?><br>
                            <b>Estimasi:</b> <?= $value->estimasi ?><br>
                            <b>No Resi:</b> <?= $value->no_resi ?>-->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                <?php } ?>

                <!-- Table row -->

                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Gambar Product</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th></th>
                                    <th>Rivew</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pesanan_detail as $key => $value) { ?>
                                    <?php echo form_open_multipart('pesanan_saya/insert_riview') ?>
                                    <tr>
                                        <td><img src="<?= base_url('assets/gambar/' . $value->gambar) ?>" width="150px"></td>
                                        <td><?= $value->nama_paket ?></td>
                                        <td><?= $value->harga - $value->diskon ?></td>
                                        <td><input name="id_paket" class="form-control" cols="30" rows="10" placeholder="isi Produk" value="<?= $value->id_paket ?>" required hidden></input></td>
                                        <td><input name="isi" class="form-control" cols="30" rows="10" placeholder="isi Riview" required></input></td>
                                        <td><button type="submit" class="genric-btn primary-border radius">Simpan</button><a href="<?= base_url('pesanan_saya') ?>" class="genric-btn warning-border radius">Kembali</a></td>
                                    </tr>
                                    <?php echo form_close() ?>
                                <?php } ?>
                            </tbody>
                        </table>

                    </div>
                    <!-- /.col -->
                </div>

                <!-- /.row -->
                <!-- /.row -->
                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>