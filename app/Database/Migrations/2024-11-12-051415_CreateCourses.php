<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCourses extends Migration
{
    public function up()
    {
        // Define the fields for the courses table
        $this->forge->addField([
            'id'            => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'title'         => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'description'   => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'category'      => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],
            'course_duration'    => [
                'type'       => 'VARCHAR',
                'null'       => true,
                'constraint'     => '400',
            ],
            'status'        => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'default'    => 'active', // Default status is active
            ],
            'created_at'    => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
            'updated_at'    => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
        ]);

        // Add the primary key
        $this->forge->addPrimaryKey('id');

        // Optionally, add foreign key if there's a relationship with other tables (e.g., users table)
        // Example:
        // $this->forge->addForeignKey('created_by', 'users', 'id', 'CASCADE', 'CASCADE');

        // Create the table
        $this->forge->createTable('courses');
    }

    public function down()
    {
        // Drop the courses table if rolling back the migration
        $this->forge->dropTable('courses');
    }
}
