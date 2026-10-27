<?php

namespace App\Models;

use CodeIgniter\Model;

class PendudukModel extends Model
{
    protected $table            = 'tb_pdd';
    protected $primaryKey       = 'id_pend';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_pend',
        'kode_desa',
        'jumlah_penduduk',
        'jumlah_pria',
        'jumlah_wanita',
        'jumlah_ktp',
        'jumlah_perekaman_ktp',
        'jumlah_akta_perkawinan',
        'jumlah_akta_perceraian',
        'jumlah_akta_kematian',
        'jumlah_kartu_identitas_anak',
        'jumlah_identitas_kependudukan_digital',
        'jumlah_akta_kelahiran_0_18',
        'jumlah_penduduk_0_18',
        'jumlah_berstatus_kawin',
        'jumlah_berstatus_cerai',
        'jumlah_pindah',
        'jumlah_datang',
        'jumlah_penduduk_non_permanen',
        'jumlah_belum_bekerja',
        'jumlah_asn',
        'jumlah_tenaga_pengajar',
        'jumlah_wiraswasta',
        'jumlah_pertanian_peternakan',
        'jumlah_nelayan',
        'jumlah_agama_dan_kepercayaan',
        'jumlah_pelajar_mahasiswa',
        'jumlah_tenaga_kesehatan',
        'jumlah_pensiunan',
        'jumlah_lainnya',
        'gol_darah_a',
        'gol_darah_b',
        'gol_darah_ab',
        'gol_darah_o',
        'gol_darah_a_plus',
        'gol_darah_a_minus',
        'gol_darah_b_plus',
        'gol_darah_b_minus',
        'gol_darah_ab_plus',
        'gol_darah_ab_minus',
        'gol_darah_o_plus',
        'gol_darah_o_minus',
        'gol_darah_tidak_tahu',
        'agama_islam',
        'agama_kristen',
        'agama_katholik',
        'agama_hindu',
        'agama_budha',
        'agama_khonghucu',
        'agama_kepercayaan',
        'pend_tidak_belum_sekolah',
        'pend_tidak_tamat_sd_sederajat',
        'pend_tamat_sd_sederajat',
        'pend_sltp_sederajat',
        'pend_slta_sederajat',
        'pend_diploma_satu_dua',
        'pend_diploma_tiga_akademi',
        'pend_diploma_empat_strata_satu',
        'pend_strata_dua',
        'pend_strata_tiga',
    ];
    
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'tanggal_tambah';
    protected $updatedField  = 'tanggal_edit';
}

