<?php
class Camp_model extends CI_Model
{
    public function registerCamp($data)
    {
        $this->db->insert('tblCamps', $data);
        return $this->db->insert_id(); // Return the ID of the inserted record
    }

    public function getDoctors() {
        // Fetch and return the list of doctors from the database
        $this->db->select('doctorId, name');
        $query = $this->db->get('tblDoctor');
        return $query->result();
    }

    public function getMMUs() {
        // Fetch and return the list of MMUs from the database
        $this->db->select('mmuId, mmuName');
        $query = $this->db->get('tblmmu');
        return $query->result();
    }
    public function getCampDetails($campId)
    {
        // Fetch camp details from the database based on $campId
        // You should write your query or use CI query builder here

        // Example using CI query builder:
        $this->db->where('campID', $campId);
        $query = $this->db->get('tblCamps');

        // Check if the query was successful
        if ($query->num_rows() > 0) {
            return $query->row(); // Return a single row of the result
        } else {
            return false; // Return false if no records found
        }
    }
}