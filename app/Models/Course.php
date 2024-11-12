<?php

namespace App\Models;

use CodeIgniter\Model;

class CourseModel extends Model
{
    // Define the table name for this model
    protected $table      = 'courses';
    
    // Define the primary key
    protected $primaryKey = 'id';
    
    // Define the allowed fields for insert/update
    protected $allowedFields = [
        'title', 'description', 'teacher_id', 'category', 'start_date', 'end_date', 'status', 'created_at', 'updated_at'
    ];

    // Enable automatic timestamp management
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    
    // Validation rules
    protected $validationRules = [
        'title'       => 'required|min_length[3]|max_length[255]',
        'description' => 'required|min_length[10]',
        'teacher_id'  => 'required|is_natural_no_zero', // Ensure teacher_id is a valid ID
        'category'    => 'required|max_length[100]',
        'start_date'  => 'required|valid_date[Y-m-d]',
        'end_date'    => 'required|valid_date[Y-m-d]',
        'status'      => 'required|in_list[active,inactive]',
    ];
    
    // Validation error messages (optional)
    protected $validationMessages = [
        'title' => [
            'required' => 'The course title is required.',
            'min_length' => 'The course title must be at least 3 characters long.',
            'max_length' => 'The course title cannot be longer than 255 characters.',
        ],
        'teacher_id' => [
            'required' => 'A teacher must be assigned to this course.',
            'is_natural_no_zero' => 'Invalid teacher ID provided.',
        ],
        // Add custom validation messages for other fields
    ];
    
    // Fetch all courses
    public function getAllCourses()
    {
        return $this->findAll();  // Fetch all courses
    }
    
    // Fetch a single course by its ID
    public function getCourseById($id)
    {
        return $this->find($id);  // Find a course by its ID
    }
    
    // Fetch courses by teacher ID
    public function getCoursesByTeacher($teacherId)
    {
        return $this->where('teacher_id', $teacherId)->findAll();
    }
    
    // Insert a new course into the database
    public function insertCourse($data)
    {
        return $this->insert($data);
    }
    
    // Update an existing course
    public function updateCourse($id, $data)
    {
        return $this->update($id, $data);
    }
    
    // Delete a course
    public function deleteCourse($id)
    {
        return $this->delete($id);
    }
}
