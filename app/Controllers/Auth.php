<?php

namespace App\Controllers;

use App\Models\User;
use CodeIgniter\Config\Services;

class Auth extends BaseController
{
    public function index(): string
    {
        return view('auth/login');
    }

    public function signup(): string
    {
        helper('form');  // Load the form helper

        // Load the validation service
        $validation = \Config\Services::validation();

        // Check if the form was submitted
        if ($this->request->getMethod() === 'POST') {
            // Define the validation rules
            $rules = [
                'first_name' => 'required|min_length[3]|max_length[50]',
                'last_name' => 'required|min_length[3]|max_length[50]',
                'username' => 'required|min_length[3]|max_length[50]|is_unique[users.username]', // Unique username check
                'password' => 'required|min_length[6]',
                'confirm_password' => 'required|matches[password]', // Ensure passwords match
                'role' => 'required|in_list[دانشجو,مدرس,کارشناس آموزش]',
            ];
            // Validate input
            if (!$this->validate($rules)) {
                // If validation fails, reload the form with validation errors
                return view('auth/signup', [
                    'validation' => $this->validator,
                ]);
            }

            // Gather the user input
            $userData = [
                'first_name' => $this->request->getPost('first_name'),
                'last_name' => $this->request->getPost('last_name'),
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password'),
                'role' => $this->request->getPost('role'),
                'created_at' => date('Y-m-d H:i:s'),
            ];

            // Load the UserModel to interact with the database
            $userModel = new User();

            // Insert the new user into the database
            if ($userModel->insert($userData)) {
                // Redirect or show success message
                return redirect()->to('auth/login')->with('success', 'ثبت نام شما با موفقیت انجام شد!');
            } else {
                // Handle the case if insertion fails
                return redirect()->back()->with('error', 'مشکلی در ثبت نام پیش آمده است.');
            }
        } else {

            return view('auth/signup');
        }


    }

    public function login()
    {
        $model = new User();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Check if user exists
        $user = $model->getUserByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            // User is authenticated, store user data in session
            $session = Services::session();
            $session->set('user_id', $user['id']);
            $session->set('username', $user['username']);
            $session->set('role', $user['role']);

            return redirect()->to('/tickets');
        }

        // If authentication fails
        return redirect()->to('/auth')->with('error', 'Invalid credentials');
    }

    public function logout()
    {
        $session = Services::session();
        $session->destroy(); // Destroy session to log out

        return redirect()->to('/auth');
    }
}
