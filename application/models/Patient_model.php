<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database(); 
    }

    public function registerPatient($data)
    {
        // Insert patient data into the 'tblPatient' table
        $this->db->insert('tblPatient', $data);
        return $this->db->insert_id();
    }
    
    public function getAllPatients($search = null, $searchSex = null, $searchDoctor = null) {
        $this->db->select('*');
        if ($search) {
            $this->db->like('village', $search);
        }
    
        if ($searchSex) {
            $this->db->where('sex', $searchSex);
        }
    
        if ($searchDoctor) {
            $this->db->like('doctor', $searchDoctor);
        }
    
        $query = $this->db->get('tblPatient');
    
        return $query->result();
    }

    public function getPatientById($patientID) {
        return $this->db->get_where('tblPatient', array('patientID' => $patientID))->row();
    }

}
