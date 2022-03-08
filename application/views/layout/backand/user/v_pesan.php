<!-- Content Wrapper. Contains page content -->


<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="<?= base_url('admin') ?>">Home</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-xl-9">
                <div class="card">
                    <div class="card-body">
                        <div class="media media-reply">
                            <div class="media-body">
                                <?php
                                foreach ($chatting as $key => $value) {
                                    $id_pelanggan = $value->id_pelanggan;
                                    if ($value->isi != '0') {
                                ?>
                                        <div class="d-sm-flex justify-content-between mb-2">
                                            <h5 class="mb-sm-0"><?= $value->nama ?> <small class="text-muted ml-3"><?= $value->time_chatting ?></small></h5>
                                            <div class="media-reply__link">

                                                <button class="btn btn-transparent text-dark font-weight-bold p-0 ml-2">Reply</button>
                                            </div>
                                        </div>

                                        <p><?= $value->isi ?></p>
                                    <?php } else if ($value->balas != '0') {
                                    ?>

                                        <div class="media mt-3">
                                            <div class="media-body">
                                                <div class="d-sm-flex justify-content-between mb-2">
                                                    <h5 class="mb-sm-0">Admin <small class="text-muted ml-3"><?= $value->time_chatting ?></small></h5>
                                                    <div class="media-reply__link">
                                                    </div>
                                                </div>
                                                <p><?= $value->balas ?></p>
                                            </div>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <form action="<?= base_url('pesan/send') ?>" method="post">
                        <div class="input-group">
                            <input type="text" name="pesan" placeholder="Type Message ..." class="form-control" required>
                            <input type="hidden" name="id_pelanggan" value="<?= $id_pelanggan ?>">
                            <span class="input-group-append">
                                <button type="submit" class="btn btn-primary">Send</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>
<!--**********************************
            Content body end
        ***********************************-->