<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Import extends BaseController
{
    public function index()
    {
        $session = service('session');
		$data['cek'] = [
			'ses_level' => $session->get('ses_level'),
			'ses_nama' => $session->get('ses_nama')
		];
        
        if($data['cek']['ses_level']==null) {
            return redirect()->to('/login');
        }

        echo view('import/vimport', $data);
    }

    public function import()
    {
        $file = $this->request->getFile('importFile');
        $extension = $file->getClientExtension();
        // dd($extension);
        if($extension == 'xls') {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } else {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }
        $spreadsheet = $reader->load($file);
        $sheet_data  = $spreadsheet->getActiveSheet(0)->toArray();
        $array_data  = [];

        foreach ($sheet_data as $key => $value) {
            if($key == 0) {
                continue;
            }
            if($value[1] == null || $value[1] == '') {
                continue;
            }
            $data = [
                'kode_desa' => $value[1],
                'jumlah_penduduk' => $value[2],
                'jumlah_pria' => $value[3],
                'jumlah_wanita' => $value[4],
                'jumlah_ktp' => $value[5],
                'jumlah_perekaman_ktp' => $value[6],
                'jumlah_akta_perkawinan' =>  $value[7],
                'jumlah_akta_perceraian' =>  $value[8],
                'jumlah_akta_kematian' =>   $value[9],
                'jumlah_kartu_identitas_anak' =>  $value[10],
                'jumlah_identitas_kependudukan_digital' =>  $value[11],
                'jumlah_akta_kelahiran_0_18' =>  $value[12],
                'jumlah_penduduk_0_18' =>  $value[13],
                'jumlah_berstatus_kawin' => $value[14],
                'jumlah_berstatus_cerai' => $value[15],
                'jumlah_pindah' => $value[16],
                'jumlah_datang' => $value[17],
                'jumlah_penduduk_non_permanen' => $value[18],
                'jumlah_belum_bekerja' => $value[19],
                'jumlah_asn' => $value[20],
                'jumlah_tenaga_pengajar' => $value[21],
                'jumlah_wiraswasta' => $value[22],
                'jumlah_pertanian_peternakan' => $value[23],
                'jumlah_nelayan' => $value[24],
                'jumlah_agama_dan_kepercayaan' => $value[25],
                'jumlah_pelajar_mahasiswa' => $value[26],
                'jumlah_tenaga_kesehatan' => $value[27],
                'jumlah_pensiunan' => $value[28],
                'jumlah_lainnya' => $value[29],
                'gol_darah_a' => $value[30],
                'gol_darah_b' => $value[31],
                'gol_darah_ab' => $value[32],
                'gol_darah_o' => $value[33],
                'gol_darah_a_plus' => $value[34],
                'gol_darah_a_minus' => $value[35],
                'gol_darah_b_plus' => $value[36],
                'gol_darah_b_minus' => $value[37],
                'gol_darah_ab_plus' => $value[38],
                'gol_darah_ab_minus' => $value[39],
                'gol_darah_o_plus' => $value[40],
                'gol_darah_o_minus' => $value[41],
                'gol_darah_tidah_tahu' => $value[42],
                'agama_islam' => $value[43],
                'agama_kristen' => $value[44],
                'agama_katholik' => $value[45],
                'agama_hindu' => $value[46],
                'agama_budha' => $value[47],
                'agama_khonghucu' => $value[48],
                'agama_kepercayaan' => $value[49],
                'pend_tidak_belum_sekolah' => $value[50],
                'pend_tidak_tamat_sd_sederajat' => $value[51],
                'pend_tamat_sd_sederajat' => $value[52],
                'pend_sltp_sederajat' => $value[53],
                'pend_slta_sederajat' => $value[54],
                'pend_diploma_satu_dua' => $value[55],
                'pend_diploma_tiga_akademi' => $value[56],
                'pend_diploma_empat_strata_satu' => $value[57],
                'pend_strata_dua' => $value[58],
                'pend_strata_tiga' => $value[59],
            ];
            $array_data[] = $data;

        }
        $session = service('session');
        $pendudukModel = new \App\Models\PendudukModel();
        // dd($array_data);
        $pendudukModel->insertBatch($array_data);
        $session->setFlashdata("status", "Data Berhasil di Import");

        return redirect()->to('import');
    }

    public function download() {
        return $this->response->download('assets/import.xlsx', null);
    }
}
