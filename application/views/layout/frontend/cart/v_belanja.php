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

    <!-- Start Sample Area -->
    <section class="sample-text-area">
        <div class="container box_1170">
            <!-- End Sample Area -->
            <!-- Default box -->
            <div class="card card-solid">
                <div class="card-body pb-0">
                    <div class="row">
                        <div class="col-sm-6">
                            <?php
                            if ($this->session->flashdata('pesan')) {
                                echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i>';
                                echo $this->session->flashdata('pesan');
                                echo '</h5></div>';
                            }
                            if ($this->session->flashdata('penuh')) {
                                echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i>';
                                echo $this->session->flashdata('penuh');
                                echo '</h5></div>';
                            } ?>
                        </div>

                        <div class="col-sm-12">
                            <?php echo form_open('belanja/update'); ?>
                            <table class="table" cellpadding="6" cellspacing="1" style="width:100%">
                                <tr>
                                    <th></th>
                                    <th>Nama Paket</th>
                                    <th style="text-align:right">Harga</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                <?php $i = 1; ?>
                                <?php
                                foreach ($this->cart->contents() as $items) {
                                    $paket = $this->m_home->detail_paket($items['id']);
                                ?>
                                    <tr>
                                        <td class="image-prod">
                                            <img src="<?= base_url('assets/gambar/' . $paket->gambar) ?>" class="img-fluid" alt="Colorlib Template" width="200px" height="150px">
                                        </td>
                                        <td>
                                            <?php echo $items['name']; ?>
                                        </td>
                                        <td style="text-align:right" hidden><?= $list_paket ?> List</td>
                                        <td style="text-align:right">Rp.<?php echo $this->cart->format_number($items['price']); ?></td>
                                        <td style="text-align:right" hidden>Rp. <?php echo $this->cart->format_number($items['subtotal']); ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('belanja/delete/') . $items['rowid'] ?>" class="genric-btn danger circle"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php } ?>
                                <tr>
                                    <td> </td>
                                    <td class="right" hidden><strong>List Paket : <?= $list_paket ?></strong></td>
                                    <td class="right"><strong>Total Harga : </strong><strong>Rp.<?php echo $this->cart->format_number($this->cart->total(), 0); ?></strong></td>
                                    <td class="right"></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </table>
                            <a href="<?= base_url('belanja/cekout') ?>" class="genric-btn primary circle"><i class="fa fa-check-square"></i>Langsung Pesan</a>
                            <?php echo form_close(); ?>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>