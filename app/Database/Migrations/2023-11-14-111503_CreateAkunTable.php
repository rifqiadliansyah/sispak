<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAkunTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idAkun' => [
                'type' => 'INT', // Pastikan tipe data ini cocok dengan tipe data foreign key di "gejala"
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'unique' => true,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);

        $this->forge->addKey('idAkun', true);
        $this->forge->createTable('akun');
    }

    public function down()
    {
        $this->forge->dropTable('akun');
    }
}

