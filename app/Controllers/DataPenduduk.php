<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DataPenduduk extends BaseController
{
    private function data_table()
    {
        $db = \Config\Database::connect();
        $builder = $db->query("SELECT p.id_pend, p.kode_desa, p.jumlah_penduduk, p.jumlah_pria, p.jumlah_wanita,p.jumlah_ktp, p.jumlah_perekaman_ktp, p.jumlah_akta_perkawinan, p.jumlah_akta_perceraian, p.jumlah_akta_kematian, p.jumlah_kartu_identitas_anak, p.jumlah_identitas_kependudukan_digital, p.jumlah_akta_kelahiran_0_18, p.jumlah_penduduk_0_18, p.jumlah_berstatus_kawin, p.jumlah_berstatus_cerai, p.jumlah_pindah, p.jumlah_datang, p.tanggal_tambah, d.nama_desa, d.kode_kecamatan, k.nama_kecamatan, p.jumlah_penduduk_non_permanen
            FROM tb_pdd p
            LEFT JOIN desa d ON p.kode_desa = d.kode_desa
            LEFT JOIN kecamatan k ON d.kode_kecamatan = k.kode_kecamatan
            WHERE jumlah_penduduk != '' AND tanggal_tambah = (SELECT MAX(tanggal_tambah) FROM tb_pdd)");

            $sql = $builder->getResultArray();
            return $sql;
    }
    private function desa()
    {
        $db = \Config\Database::connect();
        $builder = $db->query("SELECT d.kode_desa, d.nama_desa, k.nama_kecamatan
            FROM desa d
            LEFT JOIN kecamatan k ON d.kode_kecamatan = k.kode_kecamatan");
        $sql = $builder->getResultArray();
        return $sql;
    }

    public function index()
    {
        $session = service('session');
        $data['cek'] = "Administrator";
        $data['cek'] = [
			'ses_level' => $session->get('ses_level'),
			'ses_nama' => $session->get('ses_nama')
		];
        $data['data_tabel'] = $this->data_table();
        echo view('data_penduduk/vdatapenduduk', $data);
    }

    public function add()
    {
        $data['nama_desa'] = $this->desa();
        echo view('data_penduduk/vadddatapendudukModal', $data);
    }

    public function editmodal()
    {
        $session = service('session');
        $id = $this->request->getPost('id');
        $pendudukModel = new \App\Models\PendudukModel();

        $data['nama_desa'] = $this->desa();
        $data['data_tabel'] = $pendudukModel->find($id);
        // dd($data);
        echo view('data_penduduk/veditdatapendudukModal', $data);
    }

    public function update()
    {
        $session = service('session');
        $id = $this->request->getPost('id_pend');
        $pendudukModel = new \App\Models\PendudukModel();
        $data = [
            'kode_desa' => $this->request->getVar('kode_desa'),
            'jumlah_penduduk' => $this->request->getVar('jumlah_penduduk'),
            'jumlah_pria' => $this->request->getVar('jumlah_pria'),
            'jumlah_wanita' => $this->request->getVar('jumlah_wanita'),
            'jumlah_ktp' => $this->request->getVar('jumlah_ktp'),
            'jumlah_perekaman_ktp' => $this->request->getVar('jumlah_perekaman_ktp'),
            'jumlah_akta_perkawinan' => $this->request->getVar('jumlah_akta_perkawinan'),
            'jumlah_akta_perceraian' =>  $this->request->getVar('jumlah_akta_perceraian'),
            'jumlah_akta_kematian' =>  $this->request->getVar('jumlah_akta_kematian'),
            'jumlah_kartu_identitas_anak' => $this->request->getVar('jumlah_kartu_identitas_anak'),
            'jumlah_identitas_kependudukan_digital' => $this->request->getVar('jumlah_identitas_kependudukan_digital'),
            'jumlah_akta_kelahiran_0_18' => $this->request->getVar('jumlah_akta_kelahiran_0_18'),
            'jumlah_penduduk_0_18' => $this->request->getVar('jumlah_penduduk_0_18'),
            'jumlah_berstatus_kawin' => $this->request->getVar('jumlah_berstatus_kawin'),
            'jumlah_berstatus_cerai' => $this->request->getVar('jumlah_berstatus_cerai'),
            'jumlah_pindah' => $this->request->getVar('jumlah_pindah'),
            'jumlah_datang' => $this->request->getVar('jumlah_datang'),
            'jumlah_penduduk_non_permanen' => $this->request->getVar('pdd_non_permanen'),
        ];
        $pendudukModel->update($id, $data);
        $session->setFlashdata("pesan", "diupdate");

        return redirect()->to('data_penduduk');
    }

    public function delete($id)
    {
        $session = service('session');
        $pendudukModel = new \App\Models\PendudukModel();
        $pendudukModel->delete($id);
        $session->setFlashdata("pesan", "dihapus");
        return redirect()->to('data_penduduk');
    }
}
