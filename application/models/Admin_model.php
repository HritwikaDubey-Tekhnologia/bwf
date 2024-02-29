<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

//     public function get_user_data($user_id) {e
//         $query = $this->db->query("SELECT * FROM tbluser WHERE userID = ?", array($user_id));
//         return $query->row_array();
//     }



// }


public function get_user_data($user_id) {
    
    // Fetch user data from the database, including user type
    $this->db->select('tbluser.*, tblusertype.userType');
    $this->db->from('tbluser');
    $this->db->join('tblusertype', 'tbluser.userTypeID = tblusertype.userTypeID', 'left');
    $this->db->where('tbluser.userID', $user_id);
    $query = $this->db->get();

    // Check if a row was found
    if ($query->num_rows() > 0) {

        $result = $query->row();

        $userData = json_decode(json_encode($result), true);

        return $userData;
    } else {
        
        return array();
    }
}


}