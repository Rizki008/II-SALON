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
                    <h5><i class="icon fas fa-check"></i>';
                            echo $this->session->flashdata('pesan');
                            echo '</h5></div>';
                        }
                        ?>
                        <table class="table table-bordered" id="example1">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Tipe paket</th>
                                    <th>Nama Paket</th>
                                    <th>Deskripsi Paket</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($pesanan_detail as $key => $value) { ?>
                                    <tr class="text-center">
                                        <td><?= $no++; ?></td>
                                        <td><img src="<?= base_url('assets/gambar/' . $value->gambar) ?>" width="150px"></td>
                                        <td><?= $value->tipe_paket ?></td>
                                        <td><?= $value->nama_paket ?></td>
                                        <td><?= $value->deskripsi ?></td>
                                        <td><?= $value->harga ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>