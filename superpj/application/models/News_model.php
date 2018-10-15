<?php
class News_model extends CI_Model
{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function listall($number, $start){
        $query=$this->db->get("blog_detail",$start,$number);
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
    public function get_all_project1($start, $number)  { 

    $this->db->select('*');
    $this->db->from('list_blog');
    $this->db->join('blog_detail','blog_detail.id_listblog = list_blog.ten_danhmuc');
    $query = $this->db->limit($number,$start)->get();  
    return $query->result_array(); 
    } 

    public function get_all_project()  { 

    $this->db->select('*');
    $this->db->from('list_blog');
    $this->db->join('blog_detail','blog_detail.id_listblog = list_blog.ten_danhmuc');

    $query = $this->db->get();  
    return $query->result(); // in ra dung row->ten truong
    } 

    public function countAll(){
        return $this->db->count_all("blog_detail"); 
    }
    public function countlist($id_listblog)
    {
        $this->db->select('*');
        $this->db->from('list_blog');
        $this->db->join('blog_detail','blog_detail.id_listblog = list_blog.ten_danhmuc');
        $this->db->where('url_danhmuc', $id_listblog);

        $query = $this->db->get();  
        return $query->result(); // in ra dung row->ten truong 
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
    public function adduser($data, $condition)
    {
        
        $this->db->select('*');
        $this->db->from('user_login');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            $this->db->insert('user_login', $data);
            //neu insert >=1 tra ve true
            if ($this->db->affected_rows() > 0) {
                return true;
            } 
            else {
                return false;
            }
            
        }    
    }

    public function addmenu($data, $condition)
    {
        
        $this->db->select('*');
        $this->db->from('list_blog');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            $this->db->insert('list_blog', $data);
            //neu insert >0 tra ve true
            if ($this->db->affected_rows() > 0) {
                return true;
            } 
            else {
                return false;
            }
            
        }    
    }

    public function list_all1($number, $offset){
        $query =  $this->db->get('blog_detail',$number,$offset);
        return $query->result_array();
    }
    // public function count_all()
    // {
    //     return $this->db->count_all('blog_detail');
    // }
}