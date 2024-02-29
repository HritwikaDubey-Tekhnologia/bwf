<?php

class Driver_model extends CI_Model
{
    public function registerDriver($data)
    {
        return $this->db->insert('tbldriver', $data);
    }

    
}
