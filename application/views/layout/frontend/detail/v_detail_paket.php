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
    <div class="slider-area2">
        <div class="single-slider slider-height2  hero-overly d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap">
                            <h2>Details Paket</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Default box -->
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8">
            <div class="section-tittle text-center mb-70">
                <h2><?= $paket->nama_paket ?></h2>
                <img src="<?= base_url() ?>template1/assets/img/gallery/tittle_img.png" alt="">
                <p></p>
            </div>
        </div>
    </div>
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="col-12">
                        <img src="<?= base_url('assets/gambar/' . $paket->gambar) ?>" class="product-image" alt="Product Image">
                    </div>
                    <div class="col-12 product-image-thumbs">
                        <div class="product-image-thumb active"><img src="<?= base_url('assets/gambar/' . $paket->gambar) ?>" alt="Product Image"></div>
                        <!--<?php foreach ($gambar as $key => $value) { ?>
                            <div class="product-image-thumb">
                                <img src="<?= base_url('assets/foto/' . $value->gambar) ?>" alt="Product Image">
                            </div>

                        <?php } ?>-->
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <h4>Vendor : <?= $paket->nama_vendor ?></h4>
                    <hr>
                    <h4>Deskripsi</h4>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <?php foreach ($gambar as $key => $value) { ?>
                            <div class="product-image-thumb">
                                <img src="<?= base_url('assets/foto/' . $value->gambar) ?>" alt="Product Image">
                            </div>
                            <div class="align-bottom">
                                <p><?= $value->keterangan ?></p>
                            </div>
                        <?php } ?>
                    </div>
                    <p><?= $paket->deskripsi ?></p>
                    <div class="bg-gray py-2 px-3 mt-4">
                        <h2 class="mb-0">
                            Rp. <?= number_format($paket->harga - $paket->diskon, 0) ?>
                        </h2>
                    </div>
                    <?php
                    echo form_open('belanja/add');
                    echo form_hidden('id', $paket->id_paket);
                    echo form_hidden('price', $paket->harga);
                    echo form_hidden('name', $paket->nama_paket);
                    echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
                    ?>
                    <div class="mt-4">
                        <div class="row">
                            <div>
                                <input type="number" name="qty" class="form-control" value="1" min="1" hidden>
                            </div>
                            <div class="col-sm-4">
                                <button type="submit" class="genric-btn danger circle swalDefaultSuccess" data-name="<?= $paket->nama_paket; ?>" data-price="<?= ($paket->diskon > 0) ? ($paket->harga - $paket->diskon) : $paket->harga ?>" data-id="<?= $paket->id_paket; ?>">
                                    <i class="fas fa-file-invoice-dollar mr-2"></i>
                                    Pesan Sekarang
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
                <div class="row mt-4">
                    <nav class="w-100">
                        <div class="nav nav-tabs" id="product-tab" role="tablist">
                            <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Keritik & Saran</a>
                        </div>
                    </nav>
                    <?php foreach ($reviews as $key => $value) { ?>
                        <div class="tab-content p-3" id="nav-tabContent">

                            <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"><br><?= $value->nama ?> <br> <?= $value->tanggal ?> : <?= $value->isi ?> |<br>
                                <p class="name"></p>
                                <p class="mb-5 pl-4 position"></p>
                                <p class="line">
                            </div>

                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</main>
<!-- jQuery -->
<script src="<?= base_url() ?>template3/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>template3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>template3/dist/js/adminlte.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url() ?>template3/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>template3/dist/js/demo.js"></script>

<script type="text/javascript">
    $(function() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        $('.swalDefaultSuccess').click(function() {
            Toast.fire({
                icon: 'success',
                title: 'paket Berhasil Ditambahkan ke Keranjang.'
            })
        });
    });
</script>