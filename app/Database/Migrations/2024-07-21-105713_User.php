<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pengguna'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'null' => false
            ],
            'nama_pengguna'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '20',
                'null' => false
            ],
            'username'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '20',
                'null' => false
            ],
            'password'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '20',
                'null' => false
            ],
            'level'       => [
                'type'           => 'ENUM',
                'constraint'     => array('Administrator','Operator Desa','Operator Kecamatan'),
                'null' => false
            ],
            'kode_wilayah'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '11',
                'default'     => null
            ],
        ]);

        $this->forge->createTable('user', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
