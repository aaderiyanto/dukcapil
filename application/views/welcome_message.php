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
            <a href="<?= base_url() ?>"><b style="color: white;">Dashboard</b></a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Silahkan Login</p>

                <form id="form-login">
                    <!-- <form action="<?= base_url() ?>welcome/login" method="POST"> -->
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
                            <button id="login" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- <div class="col-6"><a href="welcome/register" class="btn btn-warning btn-block">Tidak Punya Akun?</a> -->
                        <!-- </div> -->
                    </div>
                </form>

            </div>
        </div>
    </div>
    <?php $this->load->view('js') ?>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#login').on('click', function(event) {
                event.preventDefault()
                let form = $('#form-login');
                $('#login').html('<i class="fa fa-spinner fa-spin"></i> Loading');
                $('#login').prop('disabled', true);
                $.ajax({
                    url: '<?= base_url() ?>welcome/login',
                    type: 'POST',
                    dataType: 'JSON',
                    data: form.serialize(),
                    success: function(response) {
                        if (response == 1) {
                            window.location.href = "dashboard";
                        } else {
                            console.log(response);
                            $('#login').html('Masuk');
                            $('#login').prop('disabled', false);
                            // alert("Login Gagal");
                            window.location.href = "./";
                        }
                    },
                    error: function(response) {
                        console.log(response);
                    }
                })
            })
        })
    </script>
</body>

</html>