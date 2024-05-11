<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatetableingressosMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nome_completo' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'data_de_ingresso' => [
                'type' => 'DATE',
            ],
            'whatsapp' => [
                'type' => 'TEXT',
            ],
            'cep' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'logradouro' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'complemento' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'bairro' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'localidade' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'uf' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'codigo_rastreio' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'detalhe_envio' => [
                'type' => 'TEXT',
                'null' => true,
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

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('ingressos');
    }

    public function down()
    {
        $this->forge->dropTable('ingresso');
    }

}
