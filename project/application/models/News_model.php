<?php
class News_model extends CI_Model
{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function listall(){
        $query=$this->db->get("blog_detail");
        return $query->result_array();
    }
    public function gettable($id)
    {
    	$query=$this->db->select("blog_detail")->where('id', $id);
    	return $query->row_array();
    }
    public function listmenu()
    {
        $query=$this->db->get("list_blog");
        return $query->result_array();

    }
    public function get_all_project()  { 

    $this->db->select('*');
    $this->db->from('list_blog');
    $this->db->join('blog_detail','blog_detail.id_listblog = list_blog.id');
    $query = $this->db->get();  
    return $query->result(); 
    } 
    public function countAll(){
        return $this->db->count_all("blog_detail"); 
    }
    public function read_user_information($username)
    {
        $condition = "user_name =" . "'" . $username . "'";
        $this->db->select('*');
        $this->db->from('user_login');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } 
        else {
            return false;
        }

    }
    public function login($data)
    {
        $condition = "user_name =" . "'" . $data['username'] . "' AND " . "user_password =" . "'" . $data['password'] . "'";
        $this->db->select('*');
        $this->db->from('user_login');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
        return true;
        } 
        else {
        return false;
        }
    }
}