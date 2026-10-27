<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class GrafikPeta extends BaseController
{
    private function sum_desa()
    {
        $db      = \Config\Database::connect();
        $builder = $db->query("SELECT d.nama_desa,
				SUM(p.jumlah_penduduk) AS total_penduduk,
				SUM(p.jumlah_pria) AS total_pria,
				SUM(p.jumlah_wanita) AS total_wanita,
				SUM(p.jumlah_perekaman_ktp) AS total_perekaman_ktp,
				SUM(p.jumlah_ktp) AS total_ktp,
				SUM(p.jumlah_akta_kematian) AS total_akta_kematian,
				SUM(p.jumlah_akta_perkawinan) AS total_akta_perkawinan,
				SUM(p.jumlah_akta_perceraian) AS total_akta_perceraian,
				SUM(p.jumlah_kartu_identitas_anak) AS total_kartu_identitas_anak,
				SUM(p.jumlah_identitas_kependudukan_digital) AS total_identitas_kependudukan_digital,
				SUM(p.jumlah_akta_kelahiran_0_18) AS total_akta_kelahiran_0_18,
				SUM(p.jumlah_penduduk_0_18) AS total_penduduk_0_18,
				SUM(p.jumlah_berstatus_kawin) AS total_berstatus_kawin,
				SUM(p.jumlah_berstatus_cerai) AS total_berstatus_cerai,
				SUM(p.jumlah_pindah) AS total_pindah,
				SUM(p.jumlah_datang) AS total_datang,
				SUM(p.jumlah_penduduk_non_permanen) AS total_penduduk_non_permanen,
				d.kode_desa
				FROM desa d
				LEFT JOIN tb_pdd p ON d.kode_desa = p.kode_desa
				WHERE tanggal_tambah = (SELECT MAX(tanggal_tambah) FROM tb_pdd) GROUP BY d.kode_desa");

                $sql = $builder->getResultArray();
                return $sql;
    }

    private function sum_kecamatan()
    {
        $db      = \Config\Database::connect();
        $builder = $db->query("SELECT k.nama_kecamatan,
				SUM(p.jumlah_penduduk) AS total_penduduk,
				SUM(p.jumlah_pria) AS total_pria,
				SUM(p.jumlah_wanita) AS total_wanita,
				SUM(p.jumlah_perekaman_ktp) AS total_perekaman_ktp,
				SUM(p.jumlah_ktp) AS total_ktp,
				SUM(p.jumlah_akta_kematian) AS total_akta_kematian,
				SUM(p.jumlah_akta_perkawinan) AS total_akta_perkawinan,
				SUM(p.jumlah_akta_perceraian) AS total_akta_perceraian,
				SUM(p.jumlah_kartu_identitas_anak) AS total_kartu_identitas_anak,
				SUM(p.jumlah_identitas_kependudukan_digital) AS total_identitas_kependudukan_digital,
				SUM(p.jumlah_akta_kelahiran_0_18) AS total_akta_kelahiran_0_18,
				SUM(p.jumlah_penduduk_0_18) AS total_penduduk_0_18,
				SUM(p.jumlah_berstatus_kawin) AS total_berstatus_kawin,
				SUM(p.jumlah_berstatus_cerai) AS total_berstatus_cerai,
				SUM(p.jumlah_pindah) AS total_pindah,
				SUM(p.jumlah_datang) AS total_datang,
				SUM(p.jumlah_penduduk_non_permanen) AS total_penduduk_non_permanen,
				k.kode_kecamatan
				FROM kecamatan k
				LEFT JOIN desa d ON k.kode_kecamatan = d.kode_kecamatan
				LEFT JOIN tb_pdd p ON d.kode_desa = p.kode_desa
				WHERE tanggal_tambah = (SELECT MAX(tanggal_tambah) FROM tb_pdd) GROUP BY k.kode_kecamatan");

                $sql = $builder->getResultArray();
                return $sql;
    }

    public function index()
    {
		$session = service('session');
		$data['cek'] = [
			'ses_level' => $session->get('ses_level'),
			'ses_nama' => $session->get('ses_nama')
		];
		
        $data['data_kecamatan'] = $this->sum_kecamatan();
        $data['data_desa'] = $this->sum_desa();
        // dd($data);
        echo view('grafikpeta/vgrafikpeta', $data);
    }
}
