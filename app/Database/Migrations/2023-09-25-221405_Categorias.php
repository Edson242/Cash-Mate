<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Categorias extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
                'null' => false
            ],
            'nome' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'usuarios_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('usuarios_id', 'usuarios', 'id');
        $this->forge->createTable('categorias');
    }

    public function down()
    {
        $this->forge->dropTable('categorias');
    }
}
