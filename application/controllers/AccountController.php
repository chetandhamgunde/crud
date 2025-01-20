<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccountController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel'); // Load the model
    }

    // Show the form
    public function user_form()
    {
        $this->load->view('user_form'); // Load the form view
    }

    // Handle form submission
    public function add_user()
    {
        // Set validation rules
        $this->form_validation->set_rules('name', 'Name', 'required|min_length[3]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

        // Run validation
        if ($this->form_validation->run() == FALSE)
        {
            // Validation failed, reload the form with errors
            $this->load->view('user_form');
        }
        else
        {
            // Validation passed, process the form data
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT) // Secure the password
            );

            // Insert user data into the database using the model
            if ($this->UserModel->insert_user($data)) {
                echo 'User added successfully!';
            } else {
                echo 'Failed to add user.';
            }
        }
    }
}
?>
