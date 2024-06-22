<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Galactica Web - Login</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-6 col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5" style="margin:0 auto;">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img src="<?php echo base_url('assets/img/logo_header.png') ?>">
                                    </div>
                                    <?php if($this->session->flashdata('message_login_error')): ?>
                                        <div class="invalid-feedback">
                                            <?= $this->session->flashdata('message_login_error') ?>
                                        </div>
		                            <?php endif ?>
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label>Email :</label>
                                            <input type="text" name="username" class="form-control form-control-user <?= form_error('username') ? 'invalid' : '' ?>" id="email"
                                                placeholder="">
                                                <div class="invalid-feedback">
					                                <?= form_error('username') ?>
				                                    </div>                                               
                                        </div>
                                        <div class="form-group">
                                            <label>Password :</label>
                                            <input type="password" name="password" class="form-control form-control-user <?= form_error('password') ? 'invalid' : '' ?>" id="loginPass"
                                                 placeholder="">
                                                 <?= form_error('password') ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="login" class="btn btn-primary btn-user btn-block" value="Login" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('js/sb-admin-2.min.js') ?>"></script>

    <style>
        d-body {
            margin: 0 auto;
        }

        div.error {
        font-size: 12px;
        /* margin-bottom: 15px; */
        margin-top: 5px;
        /* margin-left: ; */
        color: red;
        }
    </style>

</body>

</html>