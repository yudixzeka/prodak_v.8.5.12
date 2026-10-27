<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbPdd extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pend' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kode_desa' => [
                'type'           => 'VARCHAR',
                'constraint'     => '10',
                'null' => false
            ],
            'jumlah_penduduk' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'jumlah_pria' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'jumlah_wanita' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'jumlah_ktp' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'jumlah_perekaman_ktp' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'jumlah_akta_perkawinan' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'jumlah_akta_perceraian' => [
               'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'jumlah_akta_kematian' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'jumlah_kartu_identitas_anak' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'jumlah_identitas_kependudukan_digital' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'jumlah_akta_kelahiran_0_18' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'jumlah_penduduk_0_18' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'jumlah_berstatus_kawin' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'jumlah_berstatus_cerai' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'jumlah_pindah' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'jumlah_datang' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'jumlah_penduduk_non_permanen' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'jumlah_belum_bekerja' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'jumlah_asn' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'jumlah_tenaga_pengajar' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'jumlah_wiraswasta' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'jumlah_pertanian_peternakan' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'jumlah_nelayan' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'jumlah_agama_dan_kepercayaan' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'jumlah_pelajar_mahasiswa' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'jumlah_tenaga_kesehatan' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'jumlah_pensiunan' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'jumlah_lainnya' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'gol_darah_a' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'gol_darah_b' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'gol_darah_ab' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'gol_darah_o' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'gol_darah_a_plus' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'gol_darah_a_minus' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'gol_darah_b_plus' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'gol_darah_b_minus' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'gol_darah_ab_plus' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'gol_darah_ab_minus' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'gol_darah_o_plus' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'gol_darah_o_minus' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'gol_darah_tidah_tahu' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'agama_islam' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'agama_kristen' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'agama_katholik' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'agama_hindu' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'agama_budha' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'agama_khonghucu' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'agama_kepercayaan' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'pend_tidak_belum_sekolah' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'pend_tidak_tamat_sd_sederajat' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'pend_tamat_sd_sederajat' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'pend_sltp_sederajat' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'pend_slta_sederajat' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'pend_diploma_satu_dua' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'pend_diploma_tiga_akademi' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'pend_diploma_empat_strata_satu' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'pend_strata_dua' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'pend_strata_tiga' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => false
            ],
            'tanggal_tambah' => [
                'type'           => 'DATETIME',
                'default'     => null
            ],
            'tanggal_edit' => [
                'type'           => 'DATETIME',
                'default'     => null
            ]
        ]);

        $this->forge->addKey('id_pend', true);

        $this->forge->createTable('tb_pdd', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('tb_pdd');
    }
}
