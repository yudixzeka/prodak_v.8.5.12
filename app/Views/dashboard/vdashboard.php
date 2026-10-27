<?= $this->extend('layout/template');?>

<?= $this->section('content');?>

<section class="content">
	<div class="row">
		<div class="col-lg-3 col-6">
			<!-- small box -->
			<div class="small-box bg-lightblue">
				<div class="inner">
					<h3 id="1">
						<?php echo $total_penduduk; ?>
					</h3>
					<p>Penduduk</p>
				</div>
				<div class="icon">
					<!-- <i class="ion ion-person-add"></i> -->
					<i class="fas fa-users"></i>
				</div>

				<a href="<?php echo base_url(); ?>data_penduduk" class="small-box-footer">Selengkapnya
					<i class="fas fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>

		<!-- ./col -->
		<div class="col-lg-3 col-6">
			<!-- small box -->
			<div class="small-box bg-lightblue">
				<div class="inner">
					<h3 id="2">
						<?php echo $total_pria; ?>
					</h3>
					<p>Laki-laki</p>
				</div>
				<div class="icon">
					<i class="ion ion-male"></i>
				</div>

				<a href="<?php echo base_url(); ?>data_penduduk" class="small-box-footer">Selengkapnya
					<i class="fas fa-arrow-circle-right"></i>
				</a>

			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-6">
			<!-- small box -->
			<div class="small-box bg-lightblue">
				<div class="inner">
					<h3 id="3">
						<?php echo $total_wanita; ?>
					</h3>
					<p>Perempuan</p>
				</div>
				<div class="icon">
					<i class="ion ion-female"></i>
				</div>

				<a href="<?php echo base_url(); ?>data_penduduk" class="small-box-footer">Selengkapnya
					<i class="fas fa-arrow-circle-right"></i>
				</a>

			</div>
		</div>
		<!-- ./col -->

		<div class="col-lg-3 col-6">
			<!-- small box -->
			<div class="small-box bg-lightblue">
				<div class="inner">
					<h3 id="4">
						<?php echo $total_ktp; ?>
					</h3>
					<p>Wajib Kartu Tanda Penduduk</p>
				</div>
				<div class="icon">
					<i class="ion ion-card"></i>
				</div>

				<a href="<?php echo base_url(); ?>data_penduduk" class="small-box-footer">Selengkapnya
					<i class="fas fa-arrow-circle-right"></i>
				</a>

			</div>
		</div>

		<div class="col-lg-3 col-6">
			<!-- small box -->
			<div class="small-box bg-lightblue">
				<div class="inner">
					<h3 id="5">
						<?php echo $total_penduduk_0_18; ?>
					</h3>
					<p>Penduduk Umur 0-18 Tahun</p>
				</div>
				<div class="icon">
					<i class="fas fa-child"></i>
				</div>
				<a href="<?php echo base_url(); ?>data_penduduk" class="small-box-footer">Selengkapnya
					<i class="fas fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-6">
			<!-- small box -->
			<div class="small-box bg-lightblue">
				<div class="inner">
					<h3 id="6">
						<?php echo $total_berstatus_kawin; ?>
					</h3>
					<p>Penduduk Berstatus Kawin</p>
				</div>
				<div class="icon">
					<i class="fas fa-heart"></i>
				</div>

				<a href="<?php echo base_url(); ?>data_penduduk" class="small-box-footer">Selengkapnya
					<i class="fas fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-6">
			<!-- small box -->
			<div class="small-box bg-lightblue">
				<div class="inner">
					<h3 id="7">
						<?php echo $total_berstatus_cerai; ?>
					</h3>
					<p>Penduduk Berstatus Cerai</p>
				</div>
				<div class="icon">
					<i class="fas fa-heart-broken"></i>
				</div>
				<a href="<?php echo base_url(); ?>data_penduduk" class="small-box-footer">Selengkapnya
					<i class="fas fa-arrow-circle-right"></i>
				</a>

			</div>
		</div>

		<div class="col-lg-3 col-6">
			<!-- small box -->
			<div class="small-box bg-gray">
				<div class="inner">
					<h3 id="8">
						<?php echo $total_perekaman_ktp; ?>
					</h3>
					<p>Perekaman KTP</p>
				</div>
				<div class="icon">
					<i class="ion ion-card"></i>
				</div>
				<a href="<?php echo base_url(); ?>data_penduduk" class="small-box-footer">Selengkapnya
					<i class="fas fa-arrow-circle-right"></i>
				</a>

			</div>
		</div>
		<div class="col-lg-3 col-6">
			<!-- small box -->
			<div class="small-box bg-pink">
				<div class="inner">
					<h3 id="9">
						<?php echo $total_akta_kelahiran_0_18; ?>
					</h3>
					<p>Akta Kelahiran Umur 0-18 Tahun</p>
				</div>
				<div class="icon">
					<i class="fas fa-child"></i>
				</div>

				<a href="<?php echo base_url(); ?>data_penduduk" class="small-box-footer">Selengkapnya
					<i class="fas fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-6">
			<!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
					<h3 id="10">
						<?php echo $total_akta_perkawinan; ?>
					</h3>
					<p>Akta Perkawinan</p>
				</div>
				<div class="icon">
					<i class="fas fa-heart"></i>
				</div>

				<a href="<?php echo base_url(); ?>data_penduduk" class="small-box-footer">Selengkapnya
					<i class="fas fa-arrow-circle-right"></i>
				</a>

			</div>
		</div>
		<div class="col-lg-3 col-6">
			<!-- small box -->
			<div class="small-box bg-warning">
				<div class="inner">
					<h3 id="11">
						<?php echo $total_akta_perceraian; ?>
					</h3>
					<p>Akta Perceraian</p>
				</div>
				<div class="icon">
					<i class="fas fa-heart-broken"></i>
				</div>

				<a href="<?php echo base_url(); ?>data_penduduk" class="small-box-footer">Selengkapnya
					<i class="fas fa-arrow-circle-right"></i>
				</a>

			</div>
		</div>

		<div class="col-lg-3 col-6">
			<!-- small box -->
			<div class="small-box bg-danger">
				<div class="inner">
					<h3 id="12">
						<?php echo $total_akta_kematian; ?>
					</h3>
					<p>Akta Kematian</p>
				</div>
				<div class="icon">
					<i class="fas fa-file"></i>
				</div>
				<a href="<?php echo base_url(); ?>data_penduduk" class="small-box-footer">Selengkapnya
					<i class="fas fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-6">
			<!-- small box -->
			<div class="small-box bg-purple">
				<div class="inner">
					<h3 id="13">
						<?php echo $total_kartu_identitas_anak; ?>
					</h3>
					<p>Kartu Identitas Anak</p>
				</div>
				<div class="icon">
					<i class="ion ion-card"></i>
				</div>
				<a href="<?php echo base_url(); ?>data_penduduk" class="small-box-footer">Selengkapnya
					<i class="fas fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-6">
			<!-- small box -->
			<div class="small-box bg-orange">
				<div class="inner">
					<h3 id="14">
						<?php echo $total_identitas_kependudukan_digital; ?>
					</h3>
					<p>Identitas Kependudukan Digital</p>
				</div>
				<div class="icon">
					<i class="fas fa-mobile"></i>
				</div>
				<a href="<?php echo base_url(); ?>data_penduduk" class="small-box-footer">Selengkapnya
					<i class="fas fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-6">
			<!-- small box -->
			<div class="small-box bg-light">
				<div class="inner">
					<h3 id="15">
						<?php echo $total_pindah; ?>
					</h3>
					<p>Pindah</p>
				</div>
				<div class="icon">
					<i class="fas fa-user-minus"></i>
				</div>
				<a href="<?php echo base_url(); ?>data_penduduk" class="small-box-footer">Selengkapnya
					<i class="fas fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-6">
			<!-- small box -->
			<div class="small-box bg-primary">
				<div class="inner">
					<h3 id="16">
						<?php echo $total_datang; ?>
					</h3>
					<p>Datang</p>
				</div>
				<div class="icon">
					<i class="fas fa-user-plus"></i>
				</div>
				<a href="<?php echo base_url(); ?>data_penduduk" class="small-box-footer">Selengkapnya
					<i class="fas fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-6">
			<!-- small box -->
			<div class="small-box" style="background-color: #254336;">
				<div class="inner" style="color: white">
					<h3 id="17">
						<?php echo $total_penduduk_non_permanen; ?>
					</h3>
					<p>Penduduk Non Permanen</p>
				</div>
				<div class="icon">
					<i class="fas fa-user-minus"></i>
				</div>
				<a href="<?php echo base_url(); ?>data_penduduk" class="small-box-footer">Selengkapnya
					<i class="fas fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
	</div>



	<!-- ////////// -->
	<div class="row">
		<?php

		foreach ($data_kecamatan as $row) {
			$nama_kecamatan = $row['nama_kecamatan'];
			$total_penduduk = $row['total_penduduk'];
			$total_pria = $row['total_pria'];
			$total_wanita = $row['total_wanita'];
			$total_perekaman_ktp = $row['total_perekaman_ktp'];
			$total_ktp = $row['total_ktp'];
			$total_akta_kematian = $row['total_akta_kematian'];
			$total_akta_perkawinan = $row['total_akta_perkawinan'];
			$total_akta_perceraian = $row['total_akta_perceraian'];
			$total_kartu_identitas_anak = $row['total_kartu_identitas_anak'];
			$total_identitas_kependudukan_digital = $row['total_identitas_kependudukan_digital'];
			$total_akta_kelahiran_0_18 = $row['total_akta_kelahiran_0_18'];
			$total_penduduk_0_18 = $row['total_penduduk_0_18'];
			$total_berstatus_kawin = $row['total_berstatus_kawin'];
			$total_berstatus_cerai = $row['total_berstatus_cerai'];
			$total_pindah = $row['total_pindah'];
			$total_datang = $row['total_datang'];
			$total_penduduk_non_permanen = $row['total_penduduk_non_permanen'];
		?>
			<div class="col-lg-4 col-6">
				<!-- small box -->
				<div class="small-box bg-info">
					<div class="inner">
						<h4><?php echo "KECAMATAN ";
							echo $nama_kecamatan; ?>
						</h4>
						<h6>Jumlah Penduduk : <?php echo $total_penduduk; ?></h6>
						<h6>Jumlah Pria : <?php echo $total_pria; ?></h6>
						<h6>Jumlah Wanita : <?php echo $total_wanita; ?></h6>
						<h6>Jumlah Wajib KTP : <?php echo $total_ktp; ?></h6>
						<h6>Jumlah Penduduk Umur 0-18 Tahun : <?php echo $total_penduduk_0_18; ?></h6>
						<h6>Jumlah Berstatus Kawin : <?php echo $total_berstatus_kawin; ?></h6>
						<h6>Jumlah Berstatus Cerai : <?php echo $total_berstatus_cerai; ?></h6>
						<h6>Jumlah Perekaman KTP : <?php echo $total_perekaman_ktp; ?></h6>
						<h6>Jumlah Akta Kelahiran Umur 0-18 Tahun : <?php echo $total_akta_kelahiran_0_18; ?></h6>
						<h6>Jumlah Akta Perkawinan : <?php echo $total_akta_perkawinan; ?></h6>
						<h6>Jumlah Akta Perceraian : <?php echo $total_akta_perceraian; ?></h6>
						<h6>Jumlah Akta Kematian : <?php echo $total_akta_kematian; ?></h6>
						<h6>Jumlah Kartu Identitas Anak : <?php echo $total_kartu_identitas_anak; ?></h6>
						<h6>Jumlah Identitas Kependudukan Digital : <?php echo $total_identitas_kependudukan_digital; ?></h6>
						<h6>Jumlah Pindah : <?php echo $total_pindah; ?></h6>
						<h6>Jumlah Datang : <?php echo $total_datang; ?></h6>
						<h6>Jumlah Penduduk Non Permanen : <?php echo $total_penduduk_non_permanen; ?></h6>
					</div>
					<div class="icon">
						<i class="fas fa-users"></i>
					</div>
					<a href="<?php echo base_url(); ?>data_penduduk" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i>
					</a>
				</div>
			</div>
		<?php
		}
		?>
	</div>

	<script>
	function numberWithdot(x) {
    	return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
	}

	$("h3").each((i, e) => {
		let id = $(e).attr("id");
		let text = $(e).text();
		$(e).text(numberWithdot(text));
	});
	</script>

</section>
<?= $this->endSection('content');?>
<!-- /.content -->