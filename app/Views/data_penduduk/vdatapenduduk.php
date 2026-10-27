<?= $this->extend('layout/template');?>

<?= $this->section('content');?>

<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-table"></i> Data Penduduk
        </h3>
    </div>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="row mt-3">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Penduduk <?php echo session()->getFlashdata('pesan'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    <?php endif; ?>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <table id="datapenduduk" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <!-- <th rowspan="2">No</th> -->
                        <th rowspan="2">Kecamatan</th>
                        <th rowspan="2">Desa</th>
                        <th colspan="19" style="text-align: center;">Jumlah</th>
                        <?php
                        if ($cek['ses_level'] === 'Administrator') {
                        ?>
                            <th rowspan="2">Aksi</th>
                        <?php
                        } ?>
                    </tr>
                    <tr>
                        <th>Tanggal Buat</th>
                        <th>Penduduk</th>
                        <th>Pria</th>
                        <th>Wanita</th>
                        <th>Wajib KTP</th>
                        <th>Penduduk Umur 0-18 Tahun</th>
                        <th>Penduduk Berstatus Kawin</th>
                        <th>Penduduk Berstatus Cerai</th>
                        <th>Perekaman KTP</th>
                        <th>Persentase Perekaman KTP</th>
                        <th>Akta Kelahiran Umur 0-18 Tahun</th>
                        <th>Akta Perkawinan</th>
                        <th>Akta Perceraian</th>
                        <th>Akta Kematian</th>
                        <th>Kartu Identitas Anak</th>
                        <th>Identitas Kependudukan Digital</th>
                        <th>Pindah</th>
                        <th>Datang</th>
                        <th>Penduduk Non Permanen</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 0;
                    // Lakukan sesuatu dengan data yang ditemukan
                    foreach ($data_tabel as $data) {
                    ?>
                        <tr>
                            <!-- <td> -->
                            <!-- <?php echo $no++; ?> -->
                            <!-- </td> -->
                            <td>
                                <?php echo $data['nama_kecamatan']; ?>
                            </td>
                            <td>
                                <?php echo $data['nama_desa']; ?>
                            </td>
                            <td>
                                <?php echo $data['tanggal_tambah']; ?>
                            </td>
                            <td>
                                <?php echo $data['jumlah_penduduk']; ?>
                            </td>
                            <td>
                                <?php echo $data['jumlah_pria']; ?>
                            </td>
                            <td>
                                <?php echo $data['jumlah_wanita']; ?>
                            </td>
                            <td>
                                <?php echo $data['jumlah_ktp']; ?>
                            </td>
                            <td>
                                <?php echo $data['jumlah_penduduk_0_18']; ?>
                            </td>
                            <td>
                                <?php echo $data['jumlah_berstatus_kawin']; ?>
                            </td>
                            <td>
                                <?php echo $data['jumlah_berstatus_cerai']; ?>
                            </td>
                            <td>
                                <?php echo $data['jumlah_perekaman_ktp']; ?>
                            </td>
                            <td>
                                <?php
                                $persentase_rekam = ($data['jumlah_perekaman_ktp'] / $data['jumlah_ktp']) * 100;
                                echo round($persentase_rekam, 1);
                                echo "%"; ?>
                            </td>
                            <td>
                                <?php echo $data['jumlah_akta_kelahiran_0_18']; ?>
                            </td>
                            <td>
                                <?php echo $data['jumlah_akta_perkawinan']; ?>
                            </td>
                            <td>
                                <?php echo $data['jumlah_akta_perceraian']; ?>
                            </td>
                            <td>
                                <?php echo $data['jumlah_akta_kematian']; ?>
                            </td>
                            <td>
                                <?php echo $data['jumlah_kartu_identitas_anak']; ?>
                            </td>
                            <td>
                                <?php echo $data['jumlah_identitas_kependudukan_digital']; ?>
                            </td>
                            <td>
                                <?php echo $data['jumlah_pindah']; ?>
                            </td>
                            <td>
                                <?php echo $data['jumlah_datang']; ?>
                            </td>
                            <td>
                                <?php echo $data['jumlah_penduduk_non_permanen']; ?>
                            </td>
                            <?php
                            if ($cek['ses_level'] === 'Administrator') {
                            ?>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                        <a type="button" href="#" onclick="ubah(<?php echo $data['id_pend']; ?>)" data-toggle="modal" data-target="#myModal" title="Ubah" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                        <a type="button" href="<?php echo base_url(); ?>data_penduduk/del/<?php echo $data['id_pend']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                    </div>
                                </td>
                            <?php
                            } ?>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Modal body..
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.card-body -->


<script>
    function add() {
        let url = '<?php echo base_url(); ?>/data_penduduk/add';
        $.post(url, {}, function(data) {
            $('.modal-title').html('Tambah Data')
            $('.modal-body').html(data);
        });
    }

    function ubah(a) {
        let url = '<?php echo base_url(); ?>data_penduduk/edit';
        $.post(url, {
            id: a
        }, function(data) {
            $('.modal-title').html('Ubah Data')
            $('.modal-body').html(data);
        });
    }
</script>

<script>
        $(function() {
            $("#datapenduduk").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });
</script>

<?= $this->endSection('content');?>