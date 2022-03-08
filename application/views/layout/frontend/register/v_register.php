<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>RegistrationForm_v4 by Colorlib</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>template2/css/style.css">
</head>

<body>

    <div class="wrapper">
        <div class="inner">
            <div class="image-holder">
                <img src="<?= base_url() ?>template2/images/registration-form-4.jpg" alt="">
            </div>

            <?php

            echo form_open('pelanggan/register');

            echo validation_errors('<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> Coba Lagi</h5>', '</div>');

            if ($this->session->flashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Sukses</h5>';
                echo $this->session->flashdata('pesan');
                echo '</div>';
            }
            ?>

            <h3>Registrasi</h3>
            <div class="form-holder active">
                <input type="text" name="nama" value="<?= set_value('nama') ?>" placeholder="name" class="form-control">
            </div>
            <div class="form-holder">
                <input type="email" name="email" value="<?= set_value('email') ?>" placeholder="e-mail" class="form-control">
            </div>
            <div class="form-holder">
                <input type="password" name="password" value="<?= set_value('password') ?>" placeholder="Password" class="form-control" style="font-size: 15px;">
            </div>
            <div class="form-holder">
                <input type="password" name="ulangi_password" value="<?= set_value('ulangi_password') ?>" placeholder="Retype password" class="form-control" style="font-size: 15px;">
            </div>
            <div class="form-holder">
                <input type="text" name="alamat" value="<?= set_value('alamat') ?>" placeholder="Alamat" class="form-control" style="font-size: 15px;">
            </div>
            <div class="form-login">
                <button type="submit">Sign up</button>
                <p>Already Have account? <a href="<?= base_url('pelanggan/login') ?>">Login</a></p>
            </div>

            <?php echo form_close() ?>
        </div>
    </div>

    <script src="<?= base_url() ?>template2/js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url() ?>template2/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>