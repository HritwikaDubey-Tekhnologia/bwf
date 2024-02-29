<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vitals_model extends CI_Model {

    public function getVitalsList()
    {
        $query = $this->db->get('tblvitals');
        return $query->result();
    }

    public function getVitalsByPatientId($patientID) {
        return $this->db->get_where('tblVitals', array('patientID' => $patientID))->result();
    }

    // Add other methods as needed
}
