<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Kecamatan extends Seeder
{
    public function run()
    {
        $kecamatan_data = [
            [
                'kode_kecamatan' => '510801',
                'nama_kecamatan'  => 'GEROKGAK'
            ],
            [
                'kode_kecamatan' => '510802',
                'nama_kecamatan'  => 'SERIRIT'
            ],
            [
                'kode_kecamatan' => '510803',
                'nama_kecamatan'  => 'BUSUNGBIU'
            ],
            [
                'kode_kecamatan' => '510804',
                'nama_kecamatan'  => 'BANJAR'
            ],
            [
                'kode_kecamatan' => '510805',
                'nama_kecamatan'  => 'SUKASADA'
            ],
            [
                'kode_kecamatan' => '510806',
                'nama_kecamatan'  => 'BULELENG'
            ],
            [
                'kode_kecamatan' => '510807',
                'nama_kecamatan'  => 'SAWAN'
            ],
            [
                'kode_kecamatan' => '510808',
                'nama_kecamatan'  => 'KUBUTAMBAHAN'
            ],
            [
                'kode_kecamatan' => '510809',
                'nama_kecamatan'  => 'TEJAKULA'
            ],
        ];

        foreach($kecamatan_data as $data){
            $this->db->table('kecamatan')->insert($data);
        }
    }
}
