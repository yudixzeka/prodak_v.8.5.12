<?= $this->extend('layout/template');?>

<?= $this->section('content');?>

<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-table"></i> Data User
        </h3>
    </div>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="row mt-3">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Pengguna <?php echo session()->getFlashdata('pesan'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    <?php endif; ?>

    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama User</th>
                        <th>Username</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($user as $data) {
                    ?>
                        <tr>
                            <td>
                                <?php echo $no++; ?>
                            </td>
                            <td>
                                <?php echo $data['nama_pengguna']; ?>
                            </td>
                            <td>
                                <?php echo $data['username']; ?>
                            </td>
                            <td>
                                <?php echo $data['level']; ?>
                            </td>
                            <td>
                                <a type="button" href="#" onclick="ubah(<?php echo $data['id_pengguna']; ?>)" data-toggle="modal" data-target="#myModal" title="Ubah" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.card-body -->
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
    function ubah(b) {
        let url = '<?php echo base_url(); ?>user/edit';
        $.post(url, {
            id: b
        }, function(data) {
            $('.modal-title').html('Ubah Pengguna')
            $('.modal-body').html(data);
        });
    }
</script>
<?= $this->endSection('content');?>