<!-- Preloader Start -->
<header>
	<!-- Header Start -->
	<div class="header-area">
		<div class="main-header header-sticky">
			<div class="container">
				<div class="row align-items-center">
					<!-- Logo -->
					<div class="col-xl-2 col-lg-2">
						<div class="logo">
							<a href="<?= base_url() ?>">
								<h1 class="text-danger">II-Salon</i></h1>
							</a>
						</div>
					</div>
					<div class="col-xl-10 col-lg-10 col-md-10">
						<!-- Main-menu -->
						<div class="main-menu f-right d-none d-lg-block">
							<nav>
								<ul id="navigation">
									<?php $keranjang = $this->cart->contents();
									$jml_item = 0;
									foreach ($keranjang as $key => $value) {
										$jml_item = $jml_item + $value['qty'];
									}
									?>
									<li><a href="<?= base_url() ?>"> home</a></li>
									<?php $kategori = $this->m_home->kategori_vendor(); ?>
									<!--<li><a href="blog.html">Vendor</a>

                                        <ul class="submenu">
                                            <?php foreach ($kategori as $key => $value) { ?>
                                                <li><a href="<?= base_url('/home/kategori/' . $value->id_vendor) ?>"><?= $value->nama_vendor ?></a></li>
                                            <?php } ?>
                                        </ul>

                                    </li>-->
									<li><a class="text-warning" href="https://api.whatsapp.com/send?phone=6289626178437&text=Halo%20Kami%20dari%20%20II%20Salon%20dan%20Wedding%20Service.%20Silakan%20Beri%20Tahu%20apa%20Yang%20Dapat%20Kami%20Bantu%20!!!"> Hubungi Kami</a>
									</li>
									<li>
										<?php if (
											$this->session->userdata('email') == ""
										) { ?>
											<a href="#">Akun</a>
											<ul class="submenu">
												<li><a class="dropdown-item" href="<?= base_url('pelanggan/login') ?>">Login/Register</a></li>
											</ul>
										<?php } else { ?>
											<a href="#" class="nav-link dropdown-toggle" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $this->session->userdata('nama'); ?></a>
											<ul class="submenu">
												<li><a href="<?= base_url('pesanan') ?>">Pesan</a></li>
												<li><a href="<?= base_url('pesanan_saya') ?>">Pesanan Saya</a></li>
												<li><a href="<?= base_url('pelanggan/logout') ?>">Log Out</a></li>
											</ul>
										<?php } ?>
									</li>
									<li class="nav-item cta cta-colored"><a href="<?= base_url('belanja') ?>" class="nav-link"><span class="ti-shopping-cart"></span>[<?= $jml_item ?>]</a></li>
								</ul>
							</nav>
						</div>
					</div>
					<!-- Mobile Menu -->
					<div class="col-12">
						<div class="mobile_menu d-block d-lg-none"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Header End -->
</header>
