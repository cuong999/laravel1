<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Welcome extends CI_Controller {
    public function __construct(){
        parent::__construct();
        // session_start();
        $this->load->library('session');

        $this->load->helper("url");
        $this->load->helper('form');
        $this->load->library('form_validation');
        
    }
   
	public function index()
	{
		$this->load->Model("News_model");
        $blog  =$this->News_model->listall();
        $this->db->select("id, tieude");
        $this->db->order_by("id desc");
        $this->db->limit(2,0);        
        $query =$this->db->get("blog_detail");
        $blog1 = $query->result_array();
        $query1= $this->db->get("list_blog");
        $menu  = $query1->result_array();

        $data['menu']  =  $menu;
        $data['blog']  =  $blog; 
        $data['blog1'] =  $blog1;



        $this->load->view('news', $data);

	}
	public function other(){
        $this->load->Model("News_model");
        $title        =$this->News_model->listall();
        $data['title']= $title; 
       	$this->load->view('welcome_message', $data);
        
    }
    public function news()
    {
        $this->load->Model("News_model");
        $blog        =$this->News_model->listall();
        $data['title']= $blog;
    	$this->load->view('danhsachbv', $data);
    }
    public function showAddBlog()
    {   
        $this->load->Model("News_model");
        $showlist         =   $this->News_model->listmenu();      
        $data['showlist'] =  $showlist  ;
        $this->load->view('thembaiviet', $data);
    }
    public function danhsach()
    {
        $this->load->Model("News_model");
        $blog        = $this->News_model->get_all_project(); 
        $data['blog']= $blog;
        $this->load->view('danhsachbv', $data);
    }
    public function add()
    {
        $this->load->Model("News_model");
    
        $tieude  = $this->input->get_post('tieude');
        $mota    = $this->input->get_post('mota');
        $chitiet = $this->input->get_post('chitiet');
        $theloai = $this->input->get_post('danhmuc');        

        if (!empty($_FILES['picture']['name'])) {
            $config['upload_path']   = './upload';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name']     = $_FILES['picture']['name'];

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('picture')) {
                $uploadData    = $this->upload->data();
                $picture       = $uploadData['file_name'];
            } 
            else{
                $picture       = 'no-image.png';
            }
        }
        else{
            $picture  = 'no-image.jpeg';
        }
        $data    = array(   'tieude'     => $tieude,
                            'mota'       => $mota,   
                            'chitiet_tin'=> $chitiet,
                            'id_listblog'=> $theloai,
                            'hinhanh'    => $picture,
                        );                 
        $this->db->insert("blog_detail",$data);
        return redirect('/welcome/danhsach');
    }
    public function delete($id)
    {   
        $this->load->Model("News_model");    
        $this->db->where("id","$id");
        $this->db->delete("blog_detail");
        return redirect('/welcome/danhsach');

    }
    public function showedit($id)
    {   
        $this->load->Model("News_model");     
        $this->db->where("id","$id");
        $query         =$this->db->get("blog_detail");
        $dulieu        = $query->row_array(); 
        $data['dulieu']= $dulieu ;
        $this->load->view('editbv', $data);
    }
    public function showbaiviet($id_listblog)
    {
        $this->load->Model("News_model"); 
        $this->db->where("id_listblog","$id_listblog");
        $query2           =$this->db->get("blog_detail");
        $dulieubv        = $query2->result_array();
        $query1          = $this->db->get("list_blog");
        $menu            = $query1->result_array();

        $blog            =$this->News_model->listall();
        $this->db->select("id, tieude");
        $this->db->order_by("id desc");
        $this->db->limit(2,0);        
        $query           =$this->db->get("blog_detail");
        $blog1           = $query->result_array();
        $data['blog1']   = $blog1 ; 
        $data['dulieubv']= $dulieubv ;
        $data['menu']    = $menu ;
        $this->load->view('theloaibv', $data);

    }
    public function baivietchitiet($id)
    {
        $this->load->Model("News_model"); 
        $this->db->where("id","$id");
        $query2          = $this->db->get("blog_detail");
        $dulieubv        = $query2->row_array();
        $query1          = $this->db->get("list_blog");
        $menu            = $query1->result_array();
        $this->db->select("id, tieude");
        $this->db->order_by("id desc");
        $this->db->limit(2,0);        
        $query           =$this->db->get("blog_detail");
        $blog1           = $query->result_array();
        $data['blog1']   = $blog1 ; 
        $data['dulieubv']= $dulieubv ;
        $data['menu']    = $menu ;
        $this->load->view('chitietbv', $data);
    }
    public function edit($id)
    {
        $this->load->Model("News_model");

        $tieude  = $this->input->get_post('tieude');
        $mota    = $this->input->get_post('mota');
        $chitiet = $this->input->get_post('chitiet');
        if (!empty($_FILES['picture']['name'])) {
            $config['upload_path']   = './upload';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name']     = $_FILES['picture']['name'];

            $this->load->library('upload', $config);
            $this->upload->initialize($config);


            if ($this->upload->do_upload('picture')) {
                $uploadData    = $this->upload->data();
                $picture       = $uploadData['file_name'];
            } 
            else{
               $error = array('error' => $this->upload->display_errors());

                $this->load->view('upload_form', $error);
                print_r($error);
                exit();
            }
        }
        else{
            $data  = array('tieude'      => $tieude,
                            'mota'       => $mota,   
                            'chitiet_tin'=> $chitiet,
                    
                    );  
                    
            $this->db->where("id","$id");
            $this->db->update("blog_detail",$data);
            return redirect('/welcome/danhsach');               
        }

        
        $data = array(  'tieude'     => $tieude,
                        'mota'       => $mota,   
                        'chitiet_tin'=> $chitiet,
                        'hinhanh'    => $picture,
                     )   ;     
                
        $this->db->where("id","$id");
        $this->db->update("blog_detail",$data);
        return redirect('/welcome/danhsach');

    }
    public function showmenu()
    {
        $this->load->view('viewmenu');
    }
    public function addmenu()
    {   
        $this->load->Model("News_model");
        $menu  = $this->input->get_post('danhmuc');
        $data  = array('ten_danhmuc'=> $menu);
        $this->db->insert("list_blog",$data);
        return redirect('/welcome/showAddBlog');
    }
    public function list_all_project() {
    $this->load->model('News_model');
    $connect_table =   $this->News_model->get_all_project();      
    $data['connect_table'] = $connect_table;
    $this->load->view('connect',$data);
    
    }
    public function getpaginate()
    {   $this->load->Model("News_model");
        $config['total_rows'] = $this->News_model->countAll();
        $config['base_url'] = base_url()."index.php/page/index";
        $config['per_page'] = 3;
  
        $this->load->library('pagination', $config);
        echo $this->pagination->create_links();
    }
    public function login()
    {   
        $this->load->view('login_form');
    }
    public function register_show()
    {
        $this->load->view('registration_form');
    }
    public function addregistor()
    {   
        $this->load->Model("News_model");
       // Check validation for user input in SignUp form
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('email_value', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('registration_form');
        }

        else {
            $data = array(
            'user_name'     => $this->input->get_post('username'),
            'user_email'    => $this->input->get_post('email_value'),
            'user_password' => $this->input->get_post('password')
            );
            $result = $this->db->insert("user_login",$data);

             
            $data['message_display'] = 'Đăng ký thành công !';
            $this->load->view('login_form', $data);
            

        }
        
    }
    public function addlogin()
    {
        $this->load->Model("News_model");
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            if(isset($this->session->userdata['logged_in'])){
            $this->load->view('danhsachbv');
            }
            else{
            $this->load->view('login_form');
            }
        }

        else {
            $data = array(
            'username' => $this->input->get_post('username'),
            'password' => $this->input->get_post('password')
            );
            $result = $this->News_model->login($data);
            if ($result == TRUE) {

                $username = $this->input->get_post('username');
                $result   = $this->News_model->read_user_information($username);
                if ($result == TRUE) {
                $session_data = array(
                'username' => $result[0]->user_name,
                'email'    => $result[0]->user_email,
                );
                $this->session->set_userdata('logged_in', $session_data);
                return redirect('/welcome/danhsach');
                } 
                
            }
            else {
            $data = array(
                'error_message' => ' Username or Password Không Đúng!'
                );
                $this->load->view('login_form', $data); 
            }    
        }        
    }
    public function logout()
    {
        $sess_array = array(
        'username' => ''
        );
        $this->session->unset_userdata('logged_in', $sess_array);
        $data['message_display'] = 'Successfully Logout';
        $this->load->view('login_form', $data);
    }
}    
