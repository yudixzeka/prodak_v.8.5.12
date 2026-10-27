<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PRODAK</title>
    <link rel="icon" href="<?= base_url() ?>assets/img/pemkab.png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap Bundle -->
    <script src=<?php echo base_url('assets/jquery/jquery.min.js'); ?>></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/adminlte/adminlte.min.css">
    <script src=<?php echo base_url('assets/js/adminlte.min.js'); ?>></script>
    <!-- DataTables -->
    <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.0.8/b-3.0.2/r-3.0.2/rg-1.5.0/sc-2.4.3/sp-2.3.1/datatables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.0.8/b-3.0.2/r-3.0.2/rg-1.5.0/sc-2.4.3/sp-2.3.1/datatables.min.js"></script>
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
        #map {
            height: 500px;
        }
    </style>
    <?= $this->renderSection('headers') ?>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-red navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#">
                        <i class="fas fa-bars text-white"></i>
                    </a>
                </li>
                <li class="nav-item nav-link d-none d-sm-inline-block">
                    <font color="white">
                        <?php
                        $tz = 'Asia/Singapore';
                        $timestamp = time();
                        $dt = new DateTime("now", new DateTimeZone($tz));
                        $dt->setTimestamp($timestamp);
                        echo $dt->format('l, j F Y');
                        ?>
                    </font>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?php echo base_url(); ?>" class="nav-link">
                        <font color="white">
                            <b>PRODAK (PROFIL DATA KEPENDUDUKAN) KABUPATEN BULELENG</b>
                        </font>
                    </a>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="index.php" class="brand-link">
                <img src="<?php echo base_url(); ?>assets/img/pemkab.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
                <span class="brand-text"> PRODAK</span>
            </a>
            <div class="sidebar">
            <?php if ($cek['ses_level'] == 'Administrator') { ?>
					<div class="user-panel mt-2 pb-2 mb-2 d-flex">
						<div class="image">
							<img src="<?php echo base_url(); ?>assets/img/admin.ico">
						</div>
						<div class="info">
							<a href="<?php echo site_url('user'); ?>" class="d-block">
								<?php echo $cek['ses_nama']; ?>
							</a>
							<span class="badge badge-success">
								<?php echo $cek['ses_level']; ?>
							</span>
						</div>
					</div>
				<?php } ?>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="<?php echo site_url(); ?>" class="nav-link <?php echo current_route_name() == '' ? 'active' :''; ?>" >
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="<?php echo site_url('data_penduduk'); ?>" class="nav-link <?php echo current_route_name() == 'data_penduduk' ? 'active' :''; ?>">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Data Penduduk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('grafikpeta'); ?>" class="nav-link <?php echo current_route_name() == 'grafikpeta' ? 'active' :''; ?>">
                                <i class="nav-icon fas fa-search-location"></i>
                                <p>
                                    Peta Dan Grafik
                                </p>
                            </a>
                        </li>
                        <?php if ($cek['ses_level'] == 'Administrator') { ?>
							<li class="nav-item">
								<a href="<?php echo site_url('import'); ?>" class="nav-link <?php echo current_route_name() == 'import' ? 'active' :''; ?>">
									<i class="nav-icon fas fa-cogs"></i>
									<p>
										Import Data
									</p>
								</a>
							</li>
						<?php } ?>
                        <li class="nav-header">Setting</li>
						<?php if ($cek['ses_level'] == 'Administrator') { ?>
							<li class="nav-item">
								<a href="<?php echo site_url('user'); ?>" class="nav-link <?php echo current_route_name() == 'user' ? 'active' :''; ?>">
									<i class="nav-icon fas fa-user"></i>
									<p>
										Pengguna Sistem
									</p>
								</a>
							</li>
							<li class="nav-item">
								<a onclick="return confirm('Apakah anda yakin akan keluar ?')" href="<?php echo site_url(); ?>/logout" class="nav-link">
									<i class="nav-icon fas fa-arrow-circle-right"></i>
									<p>
										Logout
									</p>
								</a>
							</li>
						<?php } else { ?>
							<li class="nav-item">
								<a href="<?php echo site_url('/login'); ?>" class="nav-link">
									<i class="nav-icon fas fa-user"></i>
									<p>
										Login
									</p>
								</a>
							</li>
						<?php } ?>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="content-wrapper">
            <section class="content-header">
            </section>
            <section class="content">
                <div class="container-fluid">

                <?= $this->renderSection('content'); ?>

            </section>
        </div>
        <footer class="main-footer">
            <b>DISDUKCAPIL BULELENG 2024</b>
        </footer>
    </div>
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
    </div>
</body>

</html>