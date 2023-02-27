<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
	   
		$data['country']=$this->OH->getallcountry();
		$data['site']=$this->OH->getsitedata();
		$this->form_validation->set_message('greater_than_equal_to[1]', '{field} must have selected');
		$this->form_validation->set_rules('brand_name', 'brand_name', 'required');
		$this->form_validation->set_rules('country_id', 'country', 'required');
		$this->form_validation->set_rules('country_id', 'country', 'greater_than_equal_to[1]',array('greater_than_equal_to[1]' => 'Plase Select Country'));
		
		$this->form_validation->set_rules('state_id', 'Sate', 'required');
		$this->form_validation->set_rules('state_id', 'State', 'greater_than_equal_to[1]');
		
		$this->form_validation->set_rules('city_id', 'City', 'required');
		$this->form_validation->set_rules('city_id', 'City', 'greater_than_equal_to[1]');
		
		$this->form_validation->set_rules('mobile_number', 'Mobile Number', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[18]');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');
		$this->form_validation->set_rules('terms', 'terms', 'required');
		$this->form_validation->set_rules('category_id', 'country', 'required');
// 		$this->form_validation->set_rules('lan', 'Map Address', 'required');
// 		$this->form_validation->set_rules('long', 'Map Address', 'required');
		if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('registration/registration',$data);
        }
        else
        {
        	$business_name=$this->input->post('brand_name');
    		$cid=$this->input->post('country_id');
	        $sid=$this->input->post('state_id');
    		$cityid=$this->input->post('city_id');
    		$category_id=$this->input->post('category_id');
    		$mobile_number=$this->input->post('mobile_number');
    		$email_id=$this->input->post('email');
    		$password=$this->input->post('password');
    		$lan=$this->input->post('lan');
    		$long=$this->input->post('long');
            
            $r= $this->OH->checkemail($email_id);
            if(count($r))
            {
                $this->session->set_flashdata('message_name', 'Email address already registered please log in');
                redirect('Login');
            }
            else
            {
    		$data = array(
    			'status' => 'APPROVED',
    			'business_name' => $business_name,
    			'category_id' => $category_id,
    			'country_id' => $cid,
    			'state_id' => $sid,
    			'city_id' => $cityid,
    			'mobile' => $mobile_number,
    			'email' => $email_id,
    			'password' => md5($password),
    			'created_on' => date("Y-m-d H:i:s"),
    			'RegisterBy' => 'SELF',
    			'image' => '123.jpg',
    			'image_2' => '123.jpg',
    			'image_3' => '123.jpg',
    			'image_4' => '123.jpg',
    			'image_5' => '123.jpg',
			    'StaffID' => '0',
			    'lat' => $lan,
			    'long' => $long,
    		);
    		$this->db->insert('wedding_planner', $data);
		
            $data['subject']="New Vandor Registration";
            $data['msg']="Thank you for signing up with Vako <br> In order to start you need to first login page enter your register email address and Password  validate and direct to dashboard";
            $mail_message=$this->load->view('mail/vendorregistration',$data,true);
            $message =$this->OH->sendMail($email_id, $data['subject'], $mail_message);

            // $data['subject']="YOUR PROFILE IS APPROVED";
            // $mail_message=$this->load->view('mail/vendorapprove',$data,true);
            // $message =$this->OH->sendMail($email_id, $data['subject'], $mail_message);
			
			
			$this->session->set_flashdata('Success', 'Registration Successfully');
			
    		redirect('Login');
            }
        }
		
	}

	public function addVendor()
	{
	   
		$bname=$this->input->post('brand_name');
		$cid=$this->input->post('country_id');
		$sid=$this->input->post('state_id');
		$cityid=$this->input->post('city_id');
		$vendortype=$this->input->post('service_type');
		$mobile_number=$this->input->post('mobile_number');
		$email_id=$this->input->post('email_id');
        
         $r= $this->OH->checkemail($email_id);
            if(count($r))
            {
                $this->session->set_flashdata('message_name', 'Email address already registered please log in');
                redirect('Login');
            }
        
		$data = array(
			'status' => 'APPROVED',
			'business_name' => $bname,
			'category_id' => $vendortype,
			'country_id' => $cid,
			'state_id' => $sid,
			'city_id' => $cityid,
			'mobile' => $mobile_number,
			'email' => $email_id,
			'created_on' => date("Y-m-d H:i:s"),
			'image' => '123.jpg',
			'image_2' => '123.jpg',
			'image_3' => '123.jpg',
			'image_4' => '123.jpg',
			'image_5' => '123.jpg',
			'RegisterBy' => 'SELF',
			'StaffID' => '0',
			
		);
	
	$this->db->insert('wedding_planner', $data);
		
	}

	

}
