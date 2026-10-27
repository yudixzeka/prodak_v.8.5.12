<?php

namespace App\Controllers;

use App\Models\PendudukModel;

class Dashboard extends BaseController
{
    private function sum($field)
    {
        $db      = \Config\Database::connect();
        $builder = $db->query("SELECT SUM($field) AS $field FROM tb_pdd WHERE tanggal_tambah = (SELECT MAX(tanggal_tambah) FROM tb_pdd)");
        $sql = $builder->getResultArray();
		// dd($sql[0][$field]);
        return $sql[0][$field];
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

        $data['total_penduduk'] = $this->sum('jumlah_penduduk');
		$data['total_pria'] = $this->sum('jumlah_pria');
		$data['total_wanita'] = $this->sum('jumlah_wanita');
		$data['total_ktp'] = $this->sum('jumlah_ktp');
		$data['total_penduduk_0_18'] = $this->sum('jumlah_penduduk_0_18');
		$data['total_berstatus_kawin'] = $this->sum('jumlah_berstatus_kawin');
		$data['total_berstatus_cerai'] = $this->sum('jumlah_berstatus_cerai');
		$data['total_perekaman_ktp'] = $this->sum('jumlah_perekaman_ktp');
		$data['total_akta_kelahiran_0_18'] = $this->sum('jumlah_akta_kelahiran_0_18');
		$data['total_akta_perkawinan'] = $this->sum('jumlah_akta_perkawinan');
		$data['total_akta_perceraian'] = $this->sum('jumlah_akta_perceraian');
		$data['total_akta_kematian'] = $this->sum('jumlah_akta_kematian');
		$data['total_kartu_identitas_anak'] = $this->sum('jumlah_kartu_identitas_anak');
		$data['total_identitas_kependudukan_digital'] = $this->sum('jumlah_identitas_kependudukan_digital');
		$data['total_pindah'] = $this->sum('jumlah_pindah');
		$data['total_datang'] = $this->sum('jumlah_datang');
		$data['total_penduduk_non_permanen'] = $this->sum('jumlah_penduduk_non_permanen');

        $data['data_kecamatan'] = $this->sum_kecamatan();

        // dd($data);
		echo view('dashboard/vdashboard', $data);

       
         
    }
    
}
