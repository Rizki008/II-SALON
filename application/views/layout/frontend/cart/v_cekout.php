<!-- Font Awesome -->
<link rel="stylesheet" href="<?= base_url() ?>template3/plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="<?= base_url() ?>template3/dist/css/adminlte.min.css">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<main>
    <!--? slider Area Start-->
    <div class="slider-area2 ">
        <div class="single-slider slider-height2  hero-overly d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap">
                            <h2>Pesan Paket</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="whole-wrap">
        <div class="container box_1170">
            <div class="section-top-border">
                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <i class="fas fa-shopping-cart"></i> Pesan Paket.
                                <small class="float-right">Date: <?= date('d-m-Y') ?></small>
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div><?php
                            if ($this->session->flashdata('pesan')) {
                                echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="fa fa-check text-success"></i>';
                                echo $this->session->flashdata('pesan');
                                echo '</h5></div>';
                            }
                            ?>
                    <?php
                    echo validation_errors('<div class="alert alert-warning alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');
                    ?>
                    <?php
                    echo form_open('belanja/cekout');
                    $no_order = date('Ymd') . strtoupper(random_string('alnum', 8));
                    $tgl1 = date('Y-m-d');
                    $tgl2 = date('Y-m-d', strtotime('+30 days', strtotime($tgl1)));

                    ?>
                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-sm-8 invoice-col">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nama Pasangan</label>
                                        <input name="id_pelanggan" class="form-control" value="<?= $this->session->userdata('nama'); ?>" disabled>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>No Telpon</label>
                                        <input name="no_tlp" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Tanggal Resepsi</label>
                                        <input name="tgl_resepsi" id="tanggal" class="form-control datepicker" required>
                                        <!--<input name="tgl2" id="tanggal" class="form-control datepicker" required>-->
                                        <!--<input name="tgl_resepsi" id="tanggal" class="form-control datepicker" required>-->
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Provinsi</label>
                                        <input name="provinsi" class="form-control"></input>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Kota</label>
                                        <input name="kota" class="form-control"></input>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Kode Pos</label>
                                        <input name="kode_pos" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input name="alamat" class="form-control" value="<?= $this->session->userdata('alamat'); ?>" disabled>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <div class="table-responsive">
                                <table class="table">
                                    <?php
                                    foreach ($this->cart->contents() as $items) {
                                        $produk = $this->m_home->detail_paket($items['id']);
                                    ?>
                                        <tr>
                                            <th>Nama Paket:</th>
                                            <th><?php echo $items['name']; ?></th>
                                        </tr>
                                        <tr>
                                            <th>Harga:</th>
                                            <th>Rp. <?php echo $this->cart->format_number($items['price']); ?></th>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <th style="width:50%">Subtotal:</th>
                                        <th>Rp. <?php echo $this->cart->format_number($this->cart->total(), 0); ?></th>
                                    </tr>
                                    <tr>
                                        <p class="text-bold">Minimal Pembayaran DP Rp. 1.000.000</p>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!--simpan transaksi-->
                    <input name="no_order" value="<?= $no_order ?>" hidden>
                    <input name="grand_total" value="<?= $this->cart->total() ?>" hidden>
                    <input name="total_bayar" hidden>
                    <!--simpan Rinci transaksi-->
                    <?php
                    $i = 1;
                    foreach ($this->cart->contents() as $items) {
                        echo form_hidden('qty' . $i++, $items['qty']);
                    }

                    ?>
                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-12">
                            <a href="<?= base_url('belanja') ?>" class="genric-btn warning circle "><i class="fa fa-backward"></i> Kembali Ke Keranjang</a>
                            <button type="submit" class="genric-btn primary circle float-right" style="margin-right: 5px;">
                                <i class="fa fa-shopping-cart"></i> Pesan
                            </button>
                        </div>
                    </div>
                    <?php
                    echo form_close();
                    ?>
                </div>
            </div>
        </div>
    </div>

</main>
<!-- jQuery -->
<script src="<?= base_url() ?>template3/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>template3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>template3/dist/js/adminlte.min.js"></script>