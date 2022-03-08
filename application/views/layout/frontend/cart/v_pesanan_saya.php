<main>
    <!--? slider Area Start-->
    <div class="slider-area2 ">
        <div class="single-slider slider-height2  hero-overly d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap">
                            <h2>Pesanan Paket</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Sample Area -->
    <section class="sample-text-area">
        <div class="container box_1170">
            <!-- End Sample Area -->
            <div class="row">
                <div class="col-sm-12">
                    <?php
                    if ($this->session->flashdata('pesan')) {
                        echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i>';
                        echo $this->session->flashdata('pesan');
                        echo '</h5></div>';
                    } ?>


                    <div class="card card-primary card-outline card-tabs">
                        <div class="card-header p-0 pt-1 border-bottom-0">
                            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Belum Bayar</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Diproses</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-three-settings-tab" data-toggle="pill" href="#custom-tabs-three-settings" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false">Selesai</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-three-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                                    <table class="table">
                                        <tr>
                                            <th>No Pesan</th>
                                            <th>Tanggal Pesan</th>
                                            <th>Tanggal Resepsi</th>
                                            <th>Pembayaran DP</th>
                                            <th>Total Bayar</th>
                                            <th>Action</th>
                                        </tr>
                                        <?php foreach ($belum_bayar as $key => $value) { ?>
                                            <tr>
                                                <td><?= $value->no_order ?></td>
                                                <td><?= $value->tgl_order ?></td>
                                                <td><?= $value->tgl_resepsi ?></td>
                                                <td><b>minimal pembayaran <br> Rp. 1.000.000,-</b><br>
                                                    <?php if ($value->status_bayar == 0) { ?>
                                                        <span class="badge badge-warning">Belum bayar</span>
                                                    <?php } else { ?>
                                                        <span class="badge badge-success">Sudah bayar</span><br>
                                                        <span class="badge badge-primary">Menunggu Verifikasi</span>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <b>Rp. <?= number_format($value->grand_total, 0) ?></b><br>
                                                    <!--<?php if ($value->status_bayar == 0) { ?>
                                                        <span class="badge badge-warning">Belum bayar</span>
                                                    <?php } else { ?>
                                                        <span class="badge badge-success">Sudah bayar</span><br>
                                                        <span class="badge badge-primary">Menunggu Verifikasi</span>
                                                    <?php } ?>-->
                                                </td>
                                                <td>
                                                    <?php if ($value->status_bayar == 0) { ?>
                                                        <a href="<?= base_url('pesanan_saya/bayar/' . $value->id_order) ?>" class="genric-btn primary-border radius">Bayar</a>
                                                    <?php } ?>
                                                    <!--<button class="btn btn-primary btn-xs btn-flat" data-toggle="modal" data-target="#bayar<?= $value->id_order ?>">Diterima</button>-->
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                                    <table class="table">
                                        <tr>
                                            <th>No Pesan</th>
                                            <th>Tanggal Pesan</th>
                                            <th>Pembayaran DP</th>
                                            <th>Total Bayar</th>
                                            <th>Action</th>
                                        </tr>
                                        <?php foreach ($diproses as $key => $value) { ?>
                                            <tr>
                                                <td><?= $value->no_order ?></td>
                                                <td><?= $value->tgl_order ?></td>
                                                <td>
                                                    <b>Rp. <?= number_format($value->depe) ?></b><br>
                                                    <span class="badge badge-success">Sudah Dikonfirmasi</span><br>
                                                </td>
                                                <td>
                                                    <b>Rp. <?= number_format($value->grand_total, 0) ?>
                                                    </b><br>
                                                    <span class="badge badge-primary">Kini menjadi Rp. <?= number_format($value->diskon, 0) ?></span><br>
                                                    <span class="badge badge-success">Diskon 5%</span>
                                                </td>
                                                <td>
                                                    <button class="genric-btn primary-border radius" data-toggle="modal" data-target="#diterima<?= $value->id_order ?>">Diterima</button>
                                                </td>
                                            </tr>
                                        <?php } ?>

                                    </table>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-three-settings" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
                                    <table class="table">
                                        <tr>
                                            <th>No Pesan</th>
                                            <th>Tanggal Pesan</th>
                                            <th>Total Bayar</th>
                                            <th>Action</th>
                                        </tr>
                                        <?php foreach ($selesai as $key => $value) { ?>
                                            <tr>
                                                <td><?= $value->no_order ?></td>
                                                <td><?= $value->tgl_order ?></td>
                                                <td>
                                                    <b>Rp. <?= number_format($value->diskon, 0) ?></b><br>
                                                    <span class="badge badge-success">Selesai</span><br>
                                                </td>
                                                <td>
                                                    <a href="<?= base_url('pesanan_saya/detail_selesai/' . $value->no_order) ?>" class="genric-btn primary-border radius">Riviews</a>
                                                </td>
                                            </tr>
                                        <?php } ?>

                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php foreach ($diproses as $key => $value) { ?>
    <div class="modal fade" id="diterima<?= $value->id_order ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pesanan Diterima</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin Pesanan Sudah Diterima?
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="genric-btn danger circle" data-dismiss="modal">Tidak</button>
                    <a href="<?= base_url('pesanan_saya/diterima/' . $value->id_order) ?>" class="genric-btn success circle">Ya</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>
<!--
<?php foreach ($rekening as $key => $value) { ?>
    <div class="modal fade" id="bayar<?= $value->id_order ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pesanan Diterima</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin Pesanan Sudah Diterima?
                    <tbody>
                    <tr>
                                            <td><?= $value->nama_bank ?></td>
                                            <td><?= $value->no_rek ?></td>
                                            <td><?= $value->atas_nama ?></td>
                                        </tr>
                    </tbody>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                    <a href="<?= base_url('pesanan_saya/diterima/' . $value->id_order) ?>" class="btn btn-primary">Ya</a>
                </div>
            </div>
            <!-- /.modal-content 
        </div>
        <!-- /.modal-dialog 
    </div>
    <!-- /.modal 
<?php } ?>-->


<!--

<div class="col-lg-12 mb-5 ftco-animate">
                <!-- general form elements 
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">No Rekening Toko</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <p>Silahkan Trasnfer Ke No Rekening di Bawah Ini Sebersar :
                            <h1 class="text-primary">Rp. <?= number_format($pesanan->grand_total, 0) ?>.-</h1>
                            </p><br>
                            <table class="table">
                                <thead class="thead-primary">
                                    <tr>
                                        <th>Bank</th>
                                        <th>No Rekening</th>
                                        <th>Atas Nama</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($rekening as $key => $value) { ?>
                                        <tr>
                                            <td><?= $value->nama_bank ?></td>
                                            <td><?= $value->no_rek ?></td>
                                            <td><?= $value->atas_nama ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>-->