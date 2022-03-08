<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <?php
                        if ($this->session->flashdata('pesan')) {
                            echo '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fa fa-check"></i>';
                            echo $this->session->flashdata('pesan');
                            echo '</h5></div>';
                        } ?>

                        <ul class="nav nav-pills mb-3">
                            <li class="nav-item"><a href="#navpills-1" class="nav-link active" data-toggle="tab" aria-expanded="false">Pesanan Masuk</a>
                            </li>
                            <li class="nav-item"><a href="#navpills-2" class="nav-link" data-toggle="tab" aria-expanded="false">Konfirmasi</a>
                            </li>
                            <li class="nav-item"><a href="#navpills-3" class="nav-link" data-toggle="tab" aria-expanded="true">Selesai</a>
                            </li>
                        </ul>
                        <div class="tab-content br-n pn">
                            <div id="navpills-1" class="tab-pane active">
                                <div class="row align-items-center">
                                    <table class="table">
                                        <tr>
                                            <th>No Pesan</th>
                                            <th>Nama Pemesan</th>
                                            <th>Tanggal Pesan</th>
                                            <th>Tanggal Resepsi</th>
                                            <th>Total Bayar</th>
                                            <th>Action</th>
                                        </tr>
                                        <?php foreach ($pesanan as $key => $value) { ?>
                                            <tr>
                                                <td>
                                                    <?= anchor('vendorr/detail/' . $value->no_order, '#' . $value->no_order) ?>
                                                </td>
                                                <td><?= $value->nama_pelanggan ?></td>
                                                <td><?= $value->tgl_order ?></td>
                                                <td><?= $value->tgl_resepsi ?></td>
                                                <td>
                                                    <b>Rp. <?= number_format($value->grand_total, 0) ?></b><br>
                                                    <?php if ($value->status_bayar == 0) { ?>
                                                        <span class="badge badge-warning">Belum bayar</span>
                                                    <?php } else { ?>
                                                        <span class="badge badge-success">Sudah bayar</span><br>
                                                        <span class="badge badge-primary">Menunggu Verifikasi</span>
                                                    <?php } ?>
                                                </td>
                                                <td>

                                                    <a href=" <?= base_url('vendorr/detail/' . $value->no_order) ?>" class="btn btn-sm btn-flat btn-primary">Detail Pesanan</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </div>
                            </div>
                            <div id="navpills-2" class="tab-pane">
                                <div class="row align-items-center">
                                    <table class="table">
                                        <tr>
                                            <th>No Pesan</th>
                                            <th>Nama Pemesan</th>
                                            <th>Tanggal Pesan</th>
                                            <th>Tanggal Resepsi</th>
                                            <th>Total Bayar</th>
                                        </tr>
                                        <?php foreach ($pesanan_diproses as $key => $value) { ?>
                                            <tr>
                                                <td><?= $value->no_order ?></td>
                                                <td><?= $value->nama_pelanggan ?></td>
                                                <td><?= $value->tgl_order ?></td>
                                                <td><?= $value->tgl_resepsi ?></td>
                                                <td>
                                                    <b>Rp. <?= number_format($value->grand_total, 0) ?></b><br>
                                                    <span class="badge badge-primary">Proses Persiapan</span>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </div>
                            </div>
                            <div id="navpills-3" class="tab-pane">
                                <div class="row align-items-center">
                                    <table class="table">
                                        <tr>
                                            <th>No Pesan</th>
                                            <th>Nama Pemesan</th>
                                            <th>Tanggal Pesan</th>
                                            <th>Tanggal Resepsi</th>
                                            <th>Total Bayar</th>
                                        </tr>
                                        <?php foreach ($pesanan_selesai as $key => $value) { ?>
                                            <tr>
                                                <td><?= $value->no_order ?></td>
                                                <td><?= $value->nama_pelanggan ?></td>
                                                <td><?= $value->tgl_order ?></td>
                                                <td><?= $value->tgl_resepsi ?></td>
                                                <td>
                                                    <b>Rp. <?= number_format($value->grand_total, 0) ?></b><br>
                                                    <span class="badge badge-success">Diterima</span>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.card -->
                </div>
            </div>
        </div>
    </div>
</div>


<div class="col-md-12">
    <div class="card">
        <div class="card-body">

        </div>
    </div>
    <!-- #/ container -->
</div>
<!--**********************************
            Content body end
        ***********************************-->