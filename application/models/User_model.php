<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function login($email, $password) {
        $query = $this->db->get_where('tblUser', array('email' => $email, 'password' => $password));

        // Check if a user with provided credentials exists
        if ($query->num_rows() > 0) {
            return $query->row(); // Return the user object
        } else {
            return false; 
        }
    }

}
