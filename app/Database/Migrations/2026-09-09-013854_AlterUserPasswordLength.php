<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterUserPasswordLength extends Migration
{
    public function up()
    {
        $this->forge->modifyColumn('user', [
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->modifyColumn('user', [
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
            ],
        ]);
    }
}