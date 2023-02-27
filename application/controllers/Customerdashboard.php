<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customerdashboard extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if ($this->session->googlelogin==FALSE) {
			redirect(base_url() . "Customerlogin");
		}
		$data['site'] = $this->OH->getsitedata();
		$data['vq'] = $this->OH->googlequery($this->session->googleemail);
		$this->load->view('customerdashboard/header', $data);
		//die($this->session->vid);
	}
	public function index()
	{
		//$data['vdata'] = $this->OH->getvendor($this->session->vid);
		$data['vq'] = $this->OH->getquerycustomer($this->session->googleemail);
		//$this->load->view('Dashboard/header', $data);
		$this->load->view('customerdashboard/home', $data);
		$this->load->view('customerdashboard/footer');
	}
	public function Enquires_List()
	{
		$from = $this->input->post('weddingdate');
		$to = $this->input->post('weddingenddate');
		//  die($from." ".$to);
		$data['vq'] = $this->OH->googlequery($this->session->googleemail, $from, $to);
		//$data['vq'] = $this->OH->getquery($this->session->vid, $from, $to);
		//$data['vdata'] = $this->OH->getvendor($this->session->vid);
		//die(print_r($data));
		//$this->load->view('Dashboard/header', $data);
		$this->load->view('customerdashboard/Enquires_List', $data);
		$this->load->view('customerdashboard/footer');
	}

	public function my_Profile()
	{
		//$data['vdata'] = $this->OH->getvendor($this->session->vid);
		//$this->load->view('Dashboard/header', $data);
		$this->load->view('customerdashboard/My_Profile');
		$this->load->view('customerdashboard/footer');
	}

	public function logout()
	{
	    $this->session->unset_userdata('idtoken');
	    $this->session->unset_userdata('googleemail');
        $this->session->unset_userdata('googlename');
        $this->session->unset_userdata('googlelname');
        $this->session->unset_userdata('googlelogin');
        $this->session->set_userdata('googlelogin',FALSE);
        $this->session->sess_destroy();
		//redirect(base_url());
	}
	
	public function getimagelink()
	{
	    $this->session->googleemail;
	    $this->db->select('*');
        $this->db->where('email', $this->session->googleemail);
        $this->db->from('users');
        $query = $this->db->get();
        $r= $query->result();
        return $r[0]->picture;
	}
	
	public function update_profile()
	{
	    
	    //die($this->input->post('phone'));
	     $data = array(
            'phone' => $this->input->post('phone'));
        
        
        $where = array(
            'email' => $this->session->googleemail,
        );
        $this->db->update("users", $data,$where);
        $this->session->set_userdata('phone', $this->input->post('phone'));
        redirect(base_url().'Customerdashboard/my_Profile');
	}
	
	public function passwordchange()
    {
        $old = $this->input->post('oldpwd');
        $new= $this->input->post('newpwd');
        // $this->form_validation->set_rules('oldpwd', 'Old Paasword', 'required|min_length[8]|max_length[13]');
        $this->form_validation->set_rules('newpwd', 'New Password', 'required|min_length[8]|max_length[13]');
        $this->form_validation->set_rules('cnewpwd', 'Confirm New Password', 'required|matches[newpwd]|min_length[8]|max_length[13]');
        
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('customerdashboard/passwordchange');
            $this->load->view('customerdashboard/footer');
        }
        else
        {
            $r=$this->OH->passwordcheckuser(md5($old));
            if($r)
            {
                $this->session->set_flashdata('Success', 'Password Update Successfully');
                $this->OH->updatepassworduser(md5($new));
            }
            else
            {
                $this->session->set_flashdata('Error', 'Old Password Incorrect');
            }
            $this->load->view('customerdashboard/passwordchange');
            $this->load->view('customerdashboard/footer');
        }
    }

	
	
}
