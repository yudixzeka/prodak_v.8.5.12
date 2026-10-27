<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Desa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'kode_desa'          => [
				'type'           => 'VARCHAR',
				'constraint'     => 10,
				'null' => false
			],
			'nama_desa'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
                'null' => false
			],
            'kode_kecamatan'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '7',
                'null' => false
			],
        ]);
        $this->forge->createTable('desa', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('desa');
    }
}
