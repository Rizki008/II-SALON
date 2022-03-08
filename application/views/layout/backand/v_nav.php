<!--**********************************
            Nav header start
        ***********************************-->
<?php
$daftar_chat = $this->m_pesan->daftar_chat();
$jml_chat = $this->m_pesan->jml_chatting();
?>
<div class="nav-header">
    <div class="brand-logo">
        <a href="<?= base_url('admin') ?>">
            <b class="logo-abbr"><img src="<?= base_url() ?>template/images/logo.png" alt=""> </b>
            <span class="logo-compact"><img src="<?= base_url() ?>template/images/logo-compact.png" alt=""></span>
            <span class="brand-title">
                <h1>Admin</h1>
            </span>
        </a>
    </div>
</div>
<!--**********************************
            Nav header end
        ***********************************-->

<!--**********************************
            Header start
        ***********************************-->
<div class="header">
    <div class="header-content clearfix">

        <div class="nav-control">
            <div class="hamburger">
                <span class="toggle-icon"><i class="icon-menu"></i></span>
            </div>
        </div>
        <div class="header-left">
            <div class="input-group icons">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                </div>
                <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
                <div class="drop-down   d-md-none">
                    <form action="#">
                        <input type="text" class="form-control" placeholder="Search">
                    </form>
                </div>
            </div>
        </div>
        <div class="header-right">
            <ul class="clearfix">
                <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                        <i class="mdi mdi-email-outline"></i>
                        <span class="badge gradient-1 badge-pill badge-primary"><?= $jml_chat ?></span>
                    </a>
                    <div class="drop-down animated fadeIn dropdown-menu">
                        <div class="dropdown-content-heading d-flex justify-content-between">
                            <span class=""><?= $jml_chat ?> New Messages</span>

                        </div>
                        <div class="dropdown-content-body">
                            <ul>
                                <?php
                                foreach ($daftar_chat as $key => $value) {
                                ?>
                                    <li class="notification-unread">
                                        <a href="<?= base_url('pesan/chatting/' . $value->id_pelanggan) ?>">
                                            <img class="float-left mr-3 avatar-img" src="images/avatar/1.jpg" alt="">
                                            <div class="notification-content">
                                                <div class="notification-heading"><?= $value->nama ?></div>
                                                <div class="notification-timestamp"><?= $value->time_chatting ?></div>
                                                <div class="notification-text"><?= $value->isi ?></div>
                                            </div>
                                        </a>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </li>
                <!--<li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                        <i class="mdi mdi-bell-outline"></i>
                        <span class="badge badge-pill gradient-2 badge-primary">3</span>
                    </a>
                    <div class="drop-down animated fadeIn dropdown-menu dropdown-notfication">
                        <div class="dropdown-content-heading d-flex justify-content-between">
                            <span class="">2 New Notifications</span>
                        </div>
                        <div class="dropdown-content-body">
                            <ul>
                                <li>
                                    <a href="javascript:void()">
                                        <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>
                                        <div class="notification-content">
                                            <h6 class="notification-heading">Events near you</h6>
                                            <span class="notification-text">Within next 5 days</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>-->
                <li class="icons dropdown">
                    <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                        <span class="activity active"></span>
                        <img src="<?= base_url() ?>template/images/user/1.png" height="40" width="40" alt="">
                    </div>
                    <div class="drop-down dropdown-profile   dropdown-menu">
                        <div class="dropdown-content-body">
                            <ul>
                                <li>
                                    <a href="app-profile.html"><i class="icon-user"></i> <span>Profile</span></a>
                                </li>

                                <hr class="my-2">
                                <li><a href="<?= base_url('auth/logout_user') ?>"><i class="icon-key"></i> <span>Logout</span></a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--**********************************
            Header end ti-comment-alt
        ***********************************-->

<!--**********************************
            Sidebar start
        ***********************************-->
<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li>
                <a href="<?= base_url('admin') ?>" aria-expanded="false">
                    <i class="icon-home menu-icon"></i><span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('vendor') ?>" aria-expanded="false">
                    <i class="icon-user menu-icon"></i> <span class="nav-text">Data Vendor</span>
                </a>
            </li>
            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Master Paket</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="<?= base_url('paket') ?>"> <i class="fa fa-file-text"></i> Paket Weding</a></li>
                    <li><a href="<?= base_url('foto') ?>"> <i class="fa fa-camera-retro"></i> Foto</a></li>
                    <!--<li><a href="<?= base_url('deskripsi') ?>"> <i class="fa fa-camera-retro"></i> Deskripsi</a></li>-->
                    <!--<li><a href="<?= base_url('catering') ?>">Catring</a></li>-->
                </ul>
            </li>
            <li>
                <a href="<?= base_url('admin/pesanan_masuk') ?>" aria-expanded="false">
                    <i class="fa fa-credit-card"></i> <span class="nav-text">Transaksi</span>
                </a>
            </li>
            <li>
                <a class="has-arrow" href="<?= base_url('laporan') ?>" aria-expanded="false">
                    <i class="nav-icon fa fa-book menu-icon"></i><span class="nav-text">Laporan</span>
                </a>
            </li>
            <li>
                <a class="has-arrow" href="<?= base_url('user') ?>" aria-expanded="false">
                    <i class="fa fa-drivers-license menu-icon"></i> <span class="nav-text">User</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!--**********************************
            Sidebar end
        ***********************************-->