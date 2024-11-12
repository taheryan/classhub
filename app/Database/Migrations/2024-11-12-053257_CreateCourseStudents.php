<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCourseStudents extends Migration
{
    public function up()
    {
        // Create the course_students pivot table
        $this->forge->addField([
            'course_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'student_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'enrolled_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
        ]);

        // Add foreign key constraints
        $this->forge->addForeignKey('course_id', 'courses', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('student_id', 'users', 'id', 'CASCADE', 'CASCADE');

        // Create the table
        $this->forge->createTable('course_students');
    }

    public function down()
    {
        // Drop the course_students table if rolling back
        $this->forge->dropTable('course_students');
    }
}
