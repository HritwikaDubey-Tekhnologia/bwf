<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hooks {

    public function setUserdata() {
        $CI = &get_instance();
        $CI->load->model('admin_model');  
        $user_id = $CI->session->userdata('user_id');
        $CI->user_data = $CI->admin_model->get_user_data($user_id);
    }
}

    
