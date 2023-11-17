<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateGejalaTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_gejala' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'benjolan' => [
                'type' => 'BOOLEAN',
            ],
            'demam' => [
                'type' => 'BOOLEAN',
            ],
            'keringat' => [
                'type' => 'BOOLEAN',
            ],
            'sakitTenggorokan' => [
                'type' => 'BOOLEAN',
            ],
            'pilek' => [
                'type' => 'BOOLEAN',
            ],
            'lelah' => [
                'type' => 'BOOLEAN',
            ],
            'gatal' => [
                'type' => 'BOOLEAN',
            ],
            'sesak' => [
                'type' => 'BOOLEAN',
            ],
            'penurunanBerat' => [
                'type' => 'BOOLEAN',
            ],
            'id_pengguna' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'hasil' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'timeCustom' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            
        ]);

        $this->forge->addKey('id_gejala', true);
        $this->forge->addForeignKey('id_pengguna', 'akun', 'idAkun'); // Menambahkan foreign key
        $this->forge->createTable('gejala');
    }

    public function down()
    {
        $this->forge->dropTable('gejala');
    }
}
