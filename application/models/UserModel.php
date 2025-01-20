<?php
defined("BASEPATH")or exit("No direct script access allowed");

class UserModel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();    
    }

    // Fetch all users
    public function get_users()
    {
        $query = $this->db->get('users'); // 'users' is the table name
        return $query->result(); // Return result as an array of objects
    }

    // Fetch a single user by ID
    public function get_user_by_id($id)
    {
        $query = $this->db->get_where('users', ['id' => $id]);
        return $query->row(); // Return a single object
    }

    // Insert a new user
    public function insert_user($data)
    {
        return $this->db->insert('users', $data); // Insert data into 'users' table
    }

    // Update a user
    public function update_user($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('users', $data); // Update data in 'users' table
    }

    // Delete a user
    public function delete_user($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('users'); // Delete a record from 'users' table
    }
}

?>