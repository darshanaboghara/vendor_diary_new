<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adminlogin extends CI_Controller
{
    function __construct()
	{
		parent::__construct();
		if ($this->session->Admin_logged_in == TRUE) {
			redirect(base_url() . "Admin/dashboard");
		}
	}
	
    public function index()
    {
        // $this->load->helper(array('form', 'url'));
        // $this->load->library('form_validation');
        
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|max_length[15]|min_length[4]');
		if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('admin/login.php');
        }
        else
        {
            $r=$this->AH->adminlogin($this->input->post('email'),md5($this->input->post('password')));
            // die(print_r($r[0]->theme));
            if($r)
            {
                $newdata = array('Admin_logged_in' => TRUE);
                $this->session->set_userdata($newdata);
                $this->session->set_flashdata('Preload','TRUE'); 
                $this->session->set_userdata('theme',$r[0]->theme );
                redirect(base_url() . "Admin/dashboard");
            }
            else
            {
                $data['error']="Invalid Id or Password";
                $this->load->view('admin/login.php',$data);
            }
            
        }
        
    }
    
    
     public function adminlogout()
    {
        $newdata = array('Admin_logged_in');
        $this->session->unset_userdata($newdata);
        redirect(base_url() . "Adminlogin");
    }
    
}