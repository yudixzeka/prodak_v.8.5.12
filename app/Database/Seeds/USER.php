<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class USER extends Seeder
{
    public function run()
    {
        $user_data = [
            [
                'id_pengguna'   => 1,
                'nama_pengguna' => 'DISDUKCAPIL',
                'username'      => 'admin',
                'password'      => password_hash('admin123', PASSWORD_DEFAULT),
                'level'         => 'Administrator',
                'kode_wilayah'  => '0',
            ],
        ];

        foreach ($user_data as $data) {
            $this->db->table('user')->insert($data);
        }
    }
}
