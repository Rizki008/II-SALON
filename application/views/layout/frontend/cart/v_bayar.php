<main>
	<!--? slider Area Start-->
	<div class="slider-area2 ">
		<div class="single-slider slider-height2  hero-overly d-flex align-items-center">
			<div class="container">
				<div class="row">
					<div class="col-xl-12">
						<div class="hero-cap">
							<h2>Pembayaran DP</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<section class="ftco-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 mb-5 ftco-animate">
					<!-- general form elements -->
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">No Rekening II-Salon</h3>
						</div>
						<div class="card-body">
							<div class="form-group">
								<p>Silahkan Trasnfer Uang DP Ke No Rekening di Bawah Ini Sebersar :
								<h1 class="text-primary">Rp. 1.000.000
								</h1>
								<h1 hidden><?= number_format($pesanan->grand_total, 0) ?></h1>
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
				</div>
				<!-- left column -->
				<div class="col-lg-6 mb-5 ftco-animate">
					<!-- general form elements -->
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Konfirmasi Pembayaran</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<?php echo form_open_multipart('pesanan_saya/bayar/' . $pesanan->id_order); ?>
						<div class="card-body">
							<input hidden type="text" name="total" value="<?= $pesanan->grand_total ?>">
							<input hidden type="text" name="tgl" value="<?= $pesanan->tgl_order ?>">
							<div class="form-group">
								<label>Atas Nama</label>
								<input name="atas_nama" class="form-control" placeholder="Atas Nama" required>
							</div>
							<div class="form-group">
								<label>Nama Bank</label>
								<input name="nama_bank" class="form-control" placeholder="Nama Bank" required>
							</div>
							<div class="form-group">
								<label>No Rek</label>
								<input name="no_rek" class="form-control" placeholder="No Rek" required>
							</div>

							<div class="form-group">
								<label>Jumlah Pembayaran DP</label>
								<input name="depe" class="form-control" placeholder="Bayar DP" required>
							</div>

							<div class="form-group">
								<label for="exampleInputFile">Bukti Bayar</label>
								<div class="input-group">
									<div class="custom-file">
										<input type="file" name="bukti_bayar" class="custom-file-input" required">
										<label class="custom-file-label" for="exampleInputFile">Pilih File</label>
									</div>
								</div>
							</div>
						</div>
						<!-- /.card-body -->

						<div class="card-footer">
							<a href="<?= base_url('pesanan_saya') ?>" class="genric-btn success circle">Back</a>
							<button type="submit" class="genric-btn primary circle">Submit</button>
						</div>
						<?php echo form_close() ?>
					</div>
					<!-- /.card -->
				</div>
			</div>
		</div>
	</section>
</main>