<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsers extends Migration
{
    public function up()
    {
        // Table creation for users
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'username'    => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'unique'     => true, // Make sure the username is unique
            ],
            'password'    => [
                'type'       => 'VARCHAR',
                'constraint' => '255', // Enough space for encrypted password
            ],
            'first_name'  => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'last_name'   => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'role'        => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'default'    => 'دانشجو', // Default role for new users
            ],
            'created_at'  => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
            'updated_at'  => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
        ]);

        // Add primary key
        $this->forge->addPrimaryKey('id');

        // Create the table
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
