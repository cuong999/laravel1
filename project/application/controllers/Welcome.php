<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function other(){
        $this->load->Model("News_model");
        $title        =$this->News_model->listall();
        $data['title']= $title; 
       	$this->load->view('welcome_message', $data);
        
    }
    public function news()
    {
    	$this->load->view('news');
    }
    public function showAddBlog()
    {
        $this->load->view('thembaiviet');
    }
    public function danhsach()
    {
       $this->load->view('danhsachbv');
    }
    public function add()
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
                $picture       = '';
            }
        }
        else{
            $picture  = '';
        }
        $data    = array(   'tieude'     => $tieude,
                            'mota'       => $mota,   
                            'chitiet_tin'=> $chitiet,
                            'hinhanh'    => $picture,
                        );                 
        $this->db->insert("blog_detail",$data);
        echo "Success!";
    }
}
