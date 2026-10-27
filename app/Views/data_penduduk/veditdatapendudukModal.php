<div class="card card-success">

    <form action="<?php echo base_url(); ?>data_penduduk/update" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <input type="hidden" class="form-control" id="id_pend" name="id_pend" value="<?php echo $data_tabel['id_pend']; ?>" readonly />
            <div class="form-group row">
                <label class="col-sm-6 col-form-label">Pilih Desa</label>
                <div class="col-sm-6">
                    <select class="form-control" id="kode_desa" name="kode_desa" required>
                        <option value="" disabled selected>Pilih Kode Desa</option>
                        <?php
                        foreach ($nama_desa as $key) {
                            $selected = ($data_tabel['kode_desa'] == $key['kode_desa']) ? "selected" : "";
                        ?>
                            <option value="<?php echo $key['kode_desa']; ?>" <?php echo $selected; ?>><?php echo $key['nama_kecamatan'] . ' - ' .  $key['nama_desa']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-6 col-form-label">Jumlah Penduduk</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" id="jumlah_penduduk" name="jumlah_penduduk" value="<?php echo $data_tabel['jumlah_penduduk']; ?>" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-6 col-form-label">Jumlah Pria</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" id="jumlah_pria" name="jumlah_pria" value="<?php echo $data_tabel['jumlah_pria']; ?>" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-6 col-form-label">Jumlah Wanita</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" id="jumlah_wanita" name="jumlah_wanita" value="<?php echo $data_tabel['jumlah_wanita']; ?>" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-6 col-form-label">Jumlah Wajib Kartu Tanda Penduduk</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" id="jumlah_ktp" name="jumlah_ktp" value="<?php echo $data_tabel['jumlah_ktp']; ?>" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-6 col-form-label">Jumlah Penduduk Umur 0-18 Tahun</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" id="jumlah_penduduk_0_18" name="jumlah_penduduk_0_18" value="<?php echo $data_tabel['jumlah_penduduk_0_18']; ?>" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-6 col-form-label">Jumlah Penduduk Berstatus Kawin</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" id="jumlah_berstatus_kawin" name="jumlah_berstatus_kawin" value="<?php echo $data_tabel['jumlah_berstatus_kawin']; ?>" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-6 col-form-label">Jumlah Penduduk Berstatus Cerai</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" id="jumlah_berstatus_cerai" name="jumlah_berstatus_cerai" value="<?php echo $data_tabel['jumlah_berstatus_cerai']; ?>" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-6 col-form-label">Jumlah Perekaman Kartu Tanda Penduduk</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" id="jumlah_perekaman_ktp" name="jumlah_perekaman_ktp" value="<?php echo $data_tabel['jumlah_perekaman_ktp']; ?>" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-6 col-form-label">Jumlah Akta Kelahiran Umur 0-18 Tahun</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" id="jumlah_akta_kelahiran_0_18" name="jumlah_akta_kelahiran_0_18" value="<?php echo $data_tabel['jumlah_akta_kelahiran_0_18']; ?>" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-6 col-form-label">Jumlah Akta Perkawinan</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" id="jumlah_akta_perkawinan" name="jumlah_akta_perkawinan" value="<?php echo $data_tabel['jumlah_akta_perkawinan']; ?>" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-6 col-form-label">Jumlah Akta Perceraian</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" id="jumlah_akta_perceraian" name="jumlah_akta_perceraian" value="<?php echo $data_tabel['jumlah_akta_perceraian']; ?>" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-6 col-form-label">Jumlah Akta Kematian</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" id="jumlah_akta_kematian" name="jumlah_akta_kematian" value="<?php echo $data_tabel['jumlah_akta_kematian']; ?>" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-6 col-form-label">Jumlah Kartu Identitas Anak</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" id="jumlah_kartu_identitas_anak" name="jumlah_kartu_identitas_anak" value="<?php echo $data_tabel['jumlah_kartu_identitas_anak']; ?>" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-6 col-form-label">Jumlah Identitas Kependudukan Digital</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" id="jumlah_identitas_kependudukan_digital" name="jumlah_identitas_kependudukan_digital" value="<?php echo $data_tabel['jumlah_identitas_kependudukan_digital']; ?>" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-6 col-form-label">Jumlah Penduduk Non Permanen</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" id="pdd_non_permanen" name="pdd_non_permanen" value="<?php echo $data_tabel['jumlah_penduduk_non_permanen']; ?>" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-6 col-form-label">Jumlah Pindah</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" id="jumlah_pindah" name="jumlah_pindah" value="<?php echo $data_tabel['jumlah_pindah']; ?>" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-6 col-form-label">Jumlah Datang</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" id="jumlah_datang" name="jumlah_datang" value="<?php echo $data_tabel['jumlah_datang']; ?>" />
                </div>
            </div>
            <!--  -->
        </div>
        <div class="card-footer">
            <input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
            <a type="button" class="btn btn-warning" data-dismiss="modal">Close</a>
        </div>
    </form>
</div>