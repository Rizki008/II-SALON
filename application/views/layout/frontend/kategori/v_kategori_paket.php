<main>
    <!--? slider Area Start-->
    <div class="slider-area2">
        <div class="single-slider slider-height2  hero-overly d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap">
                            <h2>Kategori Paket</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section">
        <div class="gallery-area section-padding1">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-xl-7 col-lg-8">
                        <div class="section-tittle text-center mb-70">
                            <h2>Kategori Paket</h2>
                            <img src="<?= base_url() ?>template1/assets/img/gallery/tittle_img.png" alt="">
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <?php if (count($paket) > 0) : ?>
                            <?php foreach ($paket as $value) :

                            ?>
                                <div class="col-md-6 col-lg-3 ftco-animate">
                                    <?php
                                    echo form_open('belanja/add');
                                    echo form_hidden('id', $value->id_paket);
                                    echo form_hidden('qty', 1);
                                    echo form_hidden('price', $value->harga);
                                    echo form_hidden('name', $value->nama_paket);
                                    echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
                                    ?>
                                    <div class="product">
                                        <a href="<?= base_url('belanja/add/' . $value->id_paket); ?>" class="img-prod">
                                            <img class="img-fluid" src="<?= base_url('assets/gambar/' . $value->gambar); ?>" alt="<?= $value->nama_paket; ?>">
                                            <div class="overlay"></div>
                                        </a>
                                        <div class="text py-3 pb-4 px-3 text-center">
                                            <h3><a href="<?= base_url('belanja/add/' . $value->id_paket); ?>"><?= $value->nama_paket; ?></a></h3>
                                            <div class="d-flex">
                                                <div class="pricing">
                                                    <p class="price">
                                                        <span class="mr-2"><span class="price-sale">Rp. <?= number_format($value->harga, 0); ?></span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="bottom-area d-flex px-3">
                                                <div class="m-auto d-flex">
                                                    <a href="<?= base_url('home/detail_paket/' . $value->id_paket) ?>" class="genric-btn primary circle">
                                                        <i class="ti-eye"></i>
                                                    </a>
                                                    <button type="submit" class="genric-btn success circle" data-name="<?= $value->nama_paket; ?>" data-id="<?= $value->id_paket; ?>">
                                                        <span><i class="ti-plus"></i></span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php echo
                                    form_close();
                                    ?>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>