<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Usuarios extends Migration
{
    public function up()
    {

        $this->forge->addField([
            "id" => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
                'null' => false
            ],
            "nome" => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ],
            "email" => [
                'type' => "VARCHAR",
                'constraint' => 255,
                'null' => false
            ],
            "password" => [
                'type' => "VARCHAR",
                "constraint" => 255,
                "null" => false
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('usuarios');
    }

    public function down()
    {
        $this->forge->dropTable('usuarios');
    }
}
