<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableUserMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nome' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'login' => [
                'type' => 'VARCHAR', // Alterado de TEXT para VARCHAR
                'constraint' => 255, // Definindo um comprimento máximo
                'unique' => true,
            ],
            'senha' => [
                'type' => 'TEXT',
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
                'default' => null, // Valor padrão para inserção automática da data de criação
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP', 
                'null' => true,
                'default' => null, // Valor padrão para atualização automática da data de atualização
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('usuario', true, [
            'ENGINE' => 'InnoDB',
            'CHARSET' => 'utf8mb4',
            'COLLATE' => 'utf8mb4_unicode_ci'
        ]);
    }

    public function down()
    {
        $this->forge->dropTable('usuario');
    }
}
