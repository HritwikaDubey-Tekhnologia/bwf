<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class City_model extends CI_Model {

    public function insert_city($data) {
        $this->db->insert('tblcity', $data);
        return $this->db->insert_id();
    }
}
