<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mmu_model extends CI_Model
{
    public function registerMMU($data)
    {
        $this->db->insert('tblMmu', $data);
    }
}
