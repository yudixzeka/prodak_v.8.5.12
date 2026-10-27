<?= $this->extend('layout/template');?>

<?= $this->section('content');?>

<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-table"></i> Import Data
        </h3>
    </div>
    <?php if (session()->getFlashdata('status')) { ?>
        <div class="row mt-3">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('status'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    <?php } ?>
    <div class="card-body">
        <form action="<?= base_url('import') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <h5>Import Excel</h5>
            </div>
            <div class="col mt-3">
                <!-- Upload File -->
                <input name="importFile" class="form-control py-1" type="file" accept=".xls,.xlsx" required>
                <!-- Download Template -->
            </div>
            <div class="modal-footer">
                <a href="<?= base_url('import/download') ?>" class="btn btn-success" download>Download Template</a>
                <button class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection('content');?>