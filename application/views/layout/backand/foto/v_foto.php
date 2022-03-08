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
                        <div class="table-responsive">
                            <?php
                            if ($this->session->flashdata('pesan')) {
                                echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i>';
                                echo $this->session->flashdata('pesan');
                                echo '</h5></div>';
                            }
                            ?>
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead class="text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama paket</th>
                                        <th>Cover</th>
                                        <th>Jumlah Gambar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($foto as $key => $value) { ?>
                                        <tr class="text-center">
                                            <td><?= $no++; ?></td>
                                            <td><?= $value->nama_paket ?></td>
                                            <td><img src="<?= base_url('assets/gambar/' . $value->gambar) ?>" width="100px"></td>
                                            <td><span class="badge bg-success">
                                                    <h5><?= $value->total_gambar ?></h5>
                                                </span></td>
                                            <td>
                                                <a href="<?= base_url('foto/add/' . $value->id_paket) ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"> Gambar</i></a>
                                            </td>
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
</div>