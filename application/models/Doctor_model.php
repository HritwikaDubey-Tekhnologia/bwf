<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function registerDoctor($data)
    {
        $this->db->insert('tblDoctor', $data);
        return $this->db->insert_id();
    }

    public function getDoctorByEmailAndPassword($email, $password) {
        // Adjust the table name and fields based on your database structure
        $this->db->select('*');
        $this->db->from('tblDoctor');
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->row_array(); // Return the doctor's data as an associative array
        } else {
            return false;
        }
    }

    public function get_doctor_list() {
        $query = $this->db->get('tblDoctor');
        
        if ($query->num_rows() > 0) {
            return $query->result(); 
        } else {
            return array();
        }
    }


}
