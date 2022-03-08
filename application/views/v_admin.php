<div class="content-body">

    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h3 class="card-title text-white">Paket Sold</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white"><?= $total_pesanan ?></h2>
                            <p class="text-white mb-0">Jan - March 2019</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-2">
                    <div class="card-body">
                        <h3 class="card-title text-white">Transaksi</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white"><?= $total_transaksi ?></h2>
                            <p class="text-white mb-0">Jan - March 2019</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-3">
                    <div class="card-body">
                        <h3 class="card-title text-white">Pelanggan</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white"><?= $total_pelanggan ?></h2>
                            <p class="text-white mb-0">Jan - March 2019</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-4">
                    <div class="card-body">
                        <h3 class="card-title text-white">Vendor</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white"><? $total_vendor ?></h2>
                            <p class="text-white mb-0">Jan - March 2019</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span>
                    </div>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="active-member">
                            <div class="table-responsive">
                                <table class="table table-xs mb-0">
                                    <thead>
                                        <tr>
                                            <th>Gambar</th>
                                            <th>Product</th>
                                            <th>Country</th>
                                            <th>Status</th>
                                            <th>Payment Method</th>
                                            <th>Activity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($paket as $key => $value) { ?>
                                            <tr>
                                                <td><img src="<?= base_url('assets/gambar/' . $value->gambar) ?>" width="150px"></td>
                                                <td><?= $value->nama_paket ?></td>
                                                <td>
                                                    <span><?= $value->nama_vendor ?></span>
                                                </td>
                                                <td>
                                                    <div>
                                                        <div class="progress" style="height: 6px">
                                                            <div class="progress-bar bg-success" style="width: 50%"></div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-circle-o text-success  mr-2"></i>Rp. <?= number_format($value->harga - $value->diskon, 0) ?></td>
                                                <td>
                                                    <span><?= $value->deskripsi ?></span>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- #/ container -->
</div>
<!--**********************************
            Content body end
        ***********************************-->