<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel'); // Load the model
    }

    // Fetch all users
    public function get_all_users()
    {
        $users = $this->UserModel->get_users(); // Call the model's method
        echo '<pre>';
        print_r($users);
        echo '</pre>';
    }

    // Fetch a user by ID
    public function get_user($id)
    {
        $user = $this->UserModel->get_user_by_id($id); // Call the model's method
        echo '<pre>';
        print_r($user);
        echo '</pre>';
    }

    // Insert a new user
    public function add_user()
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => password_hash('123456', PASSWORD_BCRYPT) // Example hashing
        ];

        if ($this->UserModel->insert_user($data)) {
            echo 'User added successfully!';
        } else {
            echo 'Failed to add user.';
        }
    }

    // Update a user
    public function update_user($id)
    {
        $data = [
            'name' => 'Jane Doe',
            'email' => 'jane@example.com'
        ];

        if ($this->UserModel->update_user($id, $data)) {
            echo 'User updated successfully!';
        } else {
            echo 'Failed to update user.';
        }
    }

    // Delete a user
    public function delete_user($id)
    {
        if ($this->UserModel->delete_user($id)) {
            echo 'User deleted successfully!';
        } else {
            echo 'Failed to delete user.';
        }
    }
}
