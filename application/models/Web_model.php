<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web_model extends CI_model
{
    public function jobpost_appln($data = array()){
        $insert = $this->db->insert('jobs', $data);
        $this->session->set_userdata($data);
        if($insert){
            return true;
        }
        else{
            return false;
        }
    }
}
