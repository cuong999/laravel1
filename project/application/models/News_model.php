<?php
class News_model extends CI_Model
{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function listall(){
        $query=$this->db->get("sinhvien");
        return $query->result_array();
    }
    
}