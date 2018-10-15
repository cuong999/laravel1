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
    {   //phan trang 
        $this->load->model("News_model");
        $config['total_rows'] = $this->News_model->countAll();
        $config['base_url'] = base_url()."index.php/welcome/index/";
        $config['per_page'] = 2;
        $config['use_page_numbers'] = TRUE;
        //$this->uri->segment(3) lay param paginate sau index
        $start = ($this->uri->segment(3)) ? (($this->uri->segment(3) * $config['per_page'])- $config['per_page']) : 0;
        $this->load->library('pagination', $config);
        
        //lay bai viet moi nhat
        $this->db->select("id, tieude, url_bv");
        $this->db->order_by("id desc");
        $this->db->limit(2,0);        
        $query =$this->db->get("blog_detail");
        $blog1 = $query->result_array();
        //lay menu 
        $query1= $this->db->get("list_blog");
        $menu  = $query1->result_array();
        //truyen bien
        $data['blog']  = $this->News_model->listall( $start, $config['per_page']);
        $data['menu']  =  $menu;
        $data['blog1'] =  $blog1;
        $this->load->view("news", $data);
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
        //phan trang
        $config['total_rows'] = $this->News_model->countAll();  
        $config['base_url'] = base_url()."index.php/welcome/danhsach/";
        $config['per_page'] = 3;
        $config['use_page_numbers'] = TRUE; //lay chinh xac trang 
        //$this->uri->segment(3) lay param paginate sau index
        $start = ($this->uri->segment(3)) ? (($this->uri->segment(3) * $config['per_page'])- $config['per_page']) : 0;
        $this->load->library('pagination', $config);
        $number = $config['per_page'];

        $blog        = $this->News_model->get_all_project1($start, $number); 
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
        $str      = $this->input->get_post('tieude');
        $url     = $this->convert($str);

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
                            'url_bv'        => $url,
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
        $mang = $this->News_model->countlist($id_listblog);
        $data['mang'] = $mang;
        $dem = count($mang);

        $config['total_rows'] = $dem;
        $config['base_url'] = base_url()."index.php/welcome/showbaiviet/$id_listblog/";
        $number = $config['per_page'] = 2;//so ban ghi moi trang
        $config['use_page_numbers'] = TRUE;
         
        $this->load->library('pagination', $config);   
        $this->db->where("url_danhmuc","$id_listblog");
        //$this->uri->segment(4) lay param sau param $id_listblog
        $start =  ($this->uri->segment(4)) ? (($this->uri->segment(4) * $config['per_page'])- $config['per_page']) : 0;
        $data['dulieubv1']   = $this->News_model->get_all_project1($number, $start);
        $query1          = $this->db->get("list_blog");
        $menu            = $query1->result_array();
        $this->db->select("id, tieude, url_bv");
        $this->db->order_by("id desc");
        $this->db->limit(2,0);        
        $query           =$this->db->get("blog_detail");
                   
        //truyen bien ra view
        $data['blog1']   = $query->result_array();
        $data['menu']    = $menu ;
        $data['id_listblog'] = $id_listblog;

        $this->load->view('theloaibv', $data);

    }
    public function baivietchitiet($id)
    {
        $this->load->Model("News_model"); 
        $this->db->where("url_bv","$id");
        $query2          = $this->db->get("blog_detail");
        $dulieubv        = $query2->row_array();
        $query1          = $this->db->get("list_blog");
        $menu            = $query1->result_array();
        $this->db->select("id, tieude, url_bv");
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
        $this->form_validation->set_rules('danhmuc', 'Danh Muc', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('viewmenu');
        } 
        else {
            $menu  = $this->input->get_post('danhmuc');
            $str   = $menu;
            $slmenu= $this->convert($str);
            $data  = array('ten_danhmuc' => $menu,
                            'url_danhmuc'=> $slmenu
                             );
            $condition = "ten_danhmuc ="."'".$menu."'";
            $result = $this->News_model->addmenu($data, $condition);
            if ($result == TRUE) {
                    return redirect('welcome/showAddBlog');
            } 
            else {
                $data['message_display'] = 'Menu Đã Tồn Tại !';
                $this->load->view('viewmenu', $data);
            }
        }
        
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
        //neu validate co loi 
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('registration_form');
        }

        else {
            $data = array(
            'user_name'     => $this->input->get_post('username'),
            'user_email'    => $this->input->get_post('email_value'),
            'user_password' => $this->input->get_post('password')
            );
            $condition = "user_name ="."'".$data['user_name']."'"; //ham tim kiem trong model
            $result = $this->News_model->adduser( $data, $condition);
            if ($result == TRUE) {
                $data['message_display'] = 'Đăng ký thành công !';
                $this->load->view('login_form', $data);
            } 
            else {
                $data['message_display'] = 'User Đã Tồn Tại !';
                $this->load->view('registration_form', $data);
            }            
                   
        }
        
    }
    public function addlogin()
    {
        $this->load->Model("News_model");
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            if(isset($this->session->userdata['logged_in'])){
            return redirect('welcome/danhsach');
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
    public function index3()
    {
         $data=array(
            "username" => "Kaito",
            "email" => "codephp2013@gmail.com",
            "website" => "freetuts.net",
            "gender" => "Male",
        );
        $this->session->set_userdata($data);
        return redirect('/welcome/index2');
    }
    public function index2()
    {
        $user=$this->session->userdata("username");
        $level=$this->session->userdata("level");
        $email=$this->session->userdata("email");
        $gender=$this->session->userdata("gender");
        echo "Username: $user, Email: $email, gender: $gender";
    }
   public function demmang2()
   {
        // load thư viện cần thiết
        $this->load->Model("News_model");
        $this->load->library('pagination');
        // cấu hình phân trang
        $config['base_url'] = base_url('index.php/welcome/demmang2/'); // xác định trang phân trang
        $config['total_rows'] = $this->News_model->countAll(); // xác định tổng số record
        $config['num_links']  =  5;
        $config['per_page'] = 2; // xác định số record ở mỗi trang
        $config['uri_segment'] = 6; // xác định segment chứa page number
        $this->pagination->initialize($config);

        $data['dulieu'] = $this->News_model->list_all1($config['per_page'],$this->uri->segment(6));
        $this->load->view('page_view',$data);
   }
   public function convert($str)
   {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        return $str;
   }
}    
