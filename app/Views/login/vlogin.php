<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>login | PRODAK</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/img/pemkab.png">
    <script src=<?php echo base_url('assets/jquery/jquery.min.js'); ?>></script>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/adminlte/adminlte.min.css">
    <script src="<?php echo base_url(); ?>assets/sweetalert2/sweetalert2.all.min.js"></script>
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
        </div>
        <div class="flash-data" data-flashdata="<?php echo session()->getFlashdata('status')?>">
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <center>
                    <img src="<?php echo base_url(); ?>assets/img/pemkab.png" width=170px />
                    <br>
                    <br>
                    <h4>
                        <b>PRODAK</b>
                    </h4>
                    <h6>
                        <b>(Profil Data Kependudukan)</b><br>
                        <b>Kabupaten Buleleng</b>
                    </h6>
                    <br>
                </center>

                <form action="<?php echo base_url(); ?>auth/login" method="post">
                    <?= csrf_field(); ?>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="username" placeholder="Username" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-danger btn-block btn-flat" title="Masuk Sistem">
                                <b>Login</b>
                            </button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        const flashData= $('.flash-data').data('flashdata');
        console.log(flashData);
        if (flashData) {
            Swal.fire({
                title: "GAGAL",
                text: flashData,
                icon: "error"
            });
        }
        </script>
</body>

</html>