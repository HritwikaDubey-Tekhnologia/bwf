<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prescription_model extends CI_Model {

    public function registerPrescription($data)
    {
        // Insert prescription data into the 'tblPrescription' table
        $this->db->insert('tblPrescription', $data);
    }

    public function getPatients() {
        $this->db->select('patientID, name');
        $query = $this->db->get('tblPatient');

        return $query->result();
    }

    public function getAllPrescriptions()
    {
        $query = $this->db->get('tblprescription');
        return $query->result();
    }

    public function getPrescriptionByPatientId($patientID) {
        return $this->db->get_where('tblPrescription', array('patientID' => $patientID))->row();
    }


// application/models/Prescription_model.php

public function getPrescriptions() {
    $this->db->select('prescriptionID, patient.name as patientName, doctor.name as doctorName, symptom, advice, state, medicine, Date, note, tblPrescription.mmuID'); // Specify tblPrescription.mmuID
    $this->db->from('tblPrescription');
    $this->db->join('tblPatient as patient', 'patient.patientID = tblPrescription.patientID');
    $this->db->join('tblDoctor as doctor', 'doctor.doctorID = tblPrescription.doctorID');
    $query = $this->db->get();

    return $query->result();
}


}
