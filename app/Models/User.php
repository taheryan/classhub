<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    // Define the table name for this model
    protected $table      = 'users';

    // Define the primary key
    protected $primaryKey = 'id';

    // Define the allowed fields for insert/update
    protected $allowedFields = [
        'username',
        'email',
        'password',
        'role',
        'first_name',
        'last_name',
        'created_at',
        'updated_at'
    ];

    // Define the data type for each column (optional but recommended)
    protected $useTimestamps = true; // Automatically manage created_at and updated_at columns
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation rules for the User model
    protected $validationRules    = [
        'username' => 'required|min_length[3]|max_length[20]|is_unique[users.username]',
        'password' => 'required|min_length[8]',
        // 'confirm_password' => 'required|matches[password]', // 'matches' ensures they match
        'role' => 'required|in_list[دانشجو,مدرس,کارشناس آموزش]',
    ];

    // Validation error messages (optional)
    protected $validationMessages = [
        'username' => [
            'required' => 'Username is required.',
            'min_length' => 'Username must be at least 3 characters.',
            'max_length' => 'Username cannot exceed 20 characters.',
            'is_unique' => 'Username is already taken.',
        ],
        'password' => [
            'required' => 'Password is required.',
            'min_length' => 'Password must be at least 8 characters.',
        ],
        'role' => [
            'required' => 'Role is required.',
            'in_list' => 'Role must be one of admin, teacher, or student.',
        ],
    ];

    // Return a list of users based on role (can be customized further)
    public function getUsersByRole($role = 'student')
    {
        return $this->where('role', $role)->findAll();
    }

    // Find user by email
    public function findByEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    // Insert a new user, ensuring the password is hashed
    public function insertUser($data)
    {
        // Hash the password before inserting
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        return $this->insert($data);
    }

    // Verify if a password matches the stored hash
    public function verifyPassword($inputPassword, $storedPassword)
    {
        return password_verify($inputPassword, $storedPassword);
    }

    // Update the user data (for example, after changing their password)
    public function updateUser($id, $data)
    {
        // Hash the password if it's being updated
        if (isset($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }
        return $this->update($id, $data);
    }

    // Fetch user by username or email
    public function getUserByUsername($username)
    {
        return $this->where('username', $username)->first();
    }

    // Delete a user
    public function deleteUser($id)
    {
        return $this->delete($id);
    }
}
