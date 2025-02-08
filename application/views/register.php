<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<style>
    #bg {
        background-image: url(<?= base_url() ?>assets/bg.png);
        background-repeat: repeat;
        background-size: cover;
    }
</style>

<head>
    <meta charset="utf-8">
    <title>RG</title>
    <?php $this->load->view('css') ?>
</head>

<body class="hold-transition login-page" id='bg'>
    <div class="login-box">
        <div class="login-logo">
            <a href="<?= base_url() ?>"><b style="color: white;">Dashboard Client Digical</b></a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Silahkan Daftar</p>

                <form action="<?= base_url() ?>welcome/save" method="POST" enctype="multipart/form-data">
                    <div class="input-group mb-3">
                        <input type="text" id="username" name="nama" class="form-control" placeholder="Nama Perusahaan/RS/Klinik" required="" autofocus="">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="far fa-address-card"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" id="username" name="email" class="form-control" placeholder="Email" required="" autofocus="">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-mail-bulk"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" id="username" name="username" class="form-control" placeholder="Username" required="" autofocus="">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" id="username" name="password" class="form-control" placeholder="Password" required="">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <button id="login" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <div class="col-6"><a href="/" class="btn btn-warning btn-block">Sudah Punya Akun?</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <?php $this->load->view('js') ?>
</body>

</html>