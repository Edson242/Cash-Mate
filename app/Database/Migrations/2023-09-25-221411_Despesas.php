<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Despesas extends Migration
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
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false
            ],
            'categoria_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false
            ],
            'valor' => [
                'type' => 'DECIMAL(10, 2)',
                'null' => false
            ],
            'data' => [
                'type' => 'date',
                'null' => false
            ],
            'descricao' => [
                'type' => 'TEXT',
                'null' => false
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'usuarios', 'id');
        $this->forge->addForeignKey('categoria_id', 'categorias', 'id');
        $this->forge->createTable('despesas');
    }

    public function down()
    {
        $this->forge->dropTable('despesas');
    }
}
