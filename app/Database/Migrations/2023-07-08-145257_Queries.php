<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Queries extends Migration
{
    public function up()
    {
        // create migration for queries table with fields
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_user' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'query_name' => [
                'type' => 'VARCHAR',
                'constraint' => '200',
            ],
            'query_tags' => [
                'type' => 'VARCHAR',
                'constraint' => '300',
            ],
            'project' => [
                'type' => 'VARCHAR',
                'constraint' => '200',
            ],
            'query' => [
                'type' => 'VARBINARY',
                'constraint' => '5000',
                'default' => null,
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        // primary key
        $this->forge->addKey('id', true);

        // create table
        $this->forge->createTable('queries');
    }

    public function down()
    {
        // delete table queries
        $this->forge->dropTable('queries');
    }
}