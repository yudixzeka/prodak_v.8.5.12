<div class="card card-success">
    <form action="<?php echo base_url(); ?>user/save" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <input type='hidden' class="form-control" name="id" value="<?php echo $user['id_pengguna']; ?>" readonly />
            <div class="form-group row">
                <label class="col-sm-6 col-form-label">Nama User</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" required value="<?php echo $user['nama_pengguna']; ?>" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-6 col-form-label">Username</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="username" name="username" required value="<?php echo $user['username']; ?>" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-6 col-form-label">Password</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" id="pass" name="password" placeholder="Kosongkan jika tidak ingin mengubah password" />
                    <input id="mybutton" onclick="change()" type="checkbox" class="form-checkbox"> Lihat Password
                </div>
            </div>
        </div>
        <div class="card-footer">
            <input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
           <a type="button" class="btn btn-warning" data-dismiss="modal">Close</a>
        </div>
    </form>
</div>

<script type="text/javascript">
    function change() {
        var x = document.getElementById('pass').type;

        if (x == 'password') {
            document.getElementById('pass').type = 'text';
            document.getElementById('mybutton').innerHTML;
        } else {
            document.getElementById('pass').type = 'password';
            document.getElementById('mybutton').innerHTML;
        }
    }
</script>