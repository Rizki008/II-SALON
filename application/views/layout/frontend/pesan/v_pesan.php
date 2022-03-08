<main>
    <!--? slider Area Start-->
    <div class="slider-area2 ">
        <div class="single-slider slider-height2  hero-overly d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap">
                            <h2>Chatting</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!--**********************************
            Content body start
        ***********************************-->
    <section class="sample-text-area">
        <div class="container box_1170">
            <div class="content-body">
                <div class="container-fluid">
                    <div class="row">
                        <!--<div class="col-lg-4 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media align-items-center mb-4">
                                        <img class="mr-3" src="images/avatar/11.png" width="80" height="80" alt="">
                                        <div class="media-body">
                                            <h3 class="mb-0">Pikamy Cha</h3>
                                            <p class="text-muted mb-0">Canada</p>
                                        </div>
                                    </div>
                                    <div class="row mb-5">
                                        <div class="col">
                                            <div class="card card-profile text-center">
                                                <span class="mb-1 text-primary"><i class="icon-people"></i></span>
                                                <h3 class="mb-0">263</h3>
                                                <p class="text-muted px-4">Following</p>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card card-profile text-center">
                                                <span class="mb-1 text-warning"><i class="icon-user-follow"></i></span>
                                                <h3 class="mb-0">263</h3>
                                                <p class="text-muted">Followers</p>
                                            </div>
                                        </div>
                                        <div class="col-12 text-center">
                                            <button class="btn btn-danger px-5">Follow Now</button>
                                        </div>
                                    </div>

                                    <h4>About Me</h4>
                                    <p class="text-muted">Hi, I'm Pikamy, has been the industry standard dummy text ever since the 1500s.</p>
                                    <ul class="card-profile__info">
                                        <li class="mb-1"><strong class="text-dark mr-4">Mobile</strong> <span>01793931609</span></li>
                                        <li><strong class="text-dark mr-4">Email</strong> <span>name@domain.com</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>-->
                        <div class="col-lg-8 col-xl-9">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Chatting II-Salon</h4>
                                    <div id="morris-bar-chart"></div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-8 col-xl-9">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media media-reply">
                                        <div class="media-body">
                                            <?php
                                            foreach ($chat as $key => $value) {
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

                                                    <div class="media">
                                                        <div class="media-body text-right">
                                                            <h5 class="media-heading text-right">Admin <small class="text-muted ml-3"><?= $value->time_chatting ?></small></h5>

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
                                <form action="<?= base_url('pesanan') ?>" method="post">
                                    <div class="input-group">
                                        <input type="text" name="pesan" id="name" placeholder="Type Message ..." class="form-control" required>
                                        <span class="input-group-append">
                                            <button type="submit" class="genric-btn primary circle float-right">Send</button>
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
        </div>
    </section>
    <!-- #/ container -->
    <!-- / product category -->
    <!-- #/ container -->
</main>
<!--**********************************
        Content body end
    ***********************************-->