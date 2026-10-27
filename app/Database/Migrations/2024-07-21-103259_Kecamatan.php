<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kecamatan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'kode_kecamatan'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 7,
                'null' => false
            ],
            'nama_kecamatan'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null' => false
            ]
        ]);

        $this->forge->createTable('kecamatan', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('kecamatan');
    }
}
