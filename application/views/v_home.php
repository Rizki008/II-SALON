<main>
    <!--? Slider Area Start-->
    <div class="slider-area">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height hero-overly d-flex align-items-center">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <div class="col-xl-8 col-lg-6 col-md-8 ">
                            <div class="hero__caption">
                                <span data-animation="fadeInLeft" data-delay=".3s">Organizer</span>
                                <h1 data-animation="fadeInLeft" data-delay=".5s" data-duration="2000ms">II-Salon</h1>
                                <p data-animation="fadeInLeft" data-delay=".9s">Makeup Wedding Service</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Slider -->
            <div class="single-slider slider-height hero-overly d-flex align-items-center">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <div class="col-xl-8 col-lg-6 col-md-8 ">
                            <div class="hero__caption">
                                <span data-animation="fadeInLeft" data-delay=".3s">Organizer</span>
                                <h1 data-animation="fadeInLeft" data-delay=".5s" data-duration="2000ms">II-Salon</h1>
                                <p data-animation="fadeInLeft" data-delay=".9s">Makeup Wedding Service</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Slider Area End-->
    <!--? Our Story Start -->
    <div class="Our-story-area story-padding">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row d-flex justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="section-tittle text-center mb-70">
                        <h2>Promo Terbaru & Termurah​</h2>
                        <img src="<?= base_url() ?>template1/assets/img/gallery/tittle_img.png" alt="">
                        <p>Nikmati Promo Terbaik Baik Untuk Pernikaha Anda</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="story-caption background-img mb-40" style="background-image: url(<?= base_url() ?>template1/assets/img/gallery/story2.jpg);">
                        <div class="story-details">
                            <h4><?= $diskon_murah->nama_paket ?></h4>
                            <!--<p><?= $diskon_murah->deskripsi ?></p>-->
                            <?php if ($diskon_murah->diskon > 0) : ?>
                                <h4 class="mr-2 price-dc">Harga Utama <?= number_format($diskon_murah->harga, 0); ?></h4>
                                <h4 class="mr-2 price-sale"> Kini Menjadi <?= number_format($diskon_murah->harga - $diskon_murah->diskon, 0); ?></h4>
                            <?php else : ?>
                                <h4 class="mr-2 price-sale">Rp.<?= number_format($diskon_murah->harga - $diskon_murah->diskon, 0); ?></h4>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="story-img">
                        <img class="story2" src="<?= base_url('assets/gambar/' . $diskon_murah->gambar) ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--? Gallery Area Start -->
    <div class="gallery-area section-padding1">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="section-tittle text-center mb-70">
                        <h2>Katalog Paket</h2>
                        <img src="<?= base_url() ?>template1/assets/img/gallery/tittle_img.png" alt="">
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach ($paket as $key => $value) { ?>
                    <div class="col-sm-6">
                        <div class="single-gallery mb-20">
                            <div class="gallery-img" style="background-image: url(<?= base_url('assets/gambar/' . $value->gambar) ?>);">
                            </div>
                            <div class="thumb-content-box">
                                <div class="thumb-content">
                                    <?php if ($value->diskon > 0) : ?>
                                        <h3><?= $value->nama_paket ?><br> Harga Utama Rp.<?= number_format($value->harga, 0); ?></h3>
                                        <h3>Diskon Rp. <?= number_format($value->harga - $value->diskon, 0); ?></h3>
                                    <?php else : ?>
                                        <h3><?= $value->nama_paket ?> Rp. <?= number_format($value->harga - $value->diskon, 0); ?></h3>
                                    <?php endif; ?>

                                    <a href="<?= base_url('home/detail_paket/' . $value->id_paket) ?>"><i class="ti-eye"></i></a>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- Gallery Area End -->