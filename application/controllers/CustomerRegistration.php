<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerRegistration extends CI_Controller {
	public function index()
	{
		$this->form_validation->set_rules('fname', 'First Name', 'required');
		$this->form_validation->set_rules('lname', 'Last Name', 'required');
		$this->form_validation->set_rules('phone', 'Mobile Number', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[18]');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');
		$this->form_validation->set_rules('terms', 'terms', 'required');
		if ($this->form_validation->run() == FALSE)
        {
//            $this->load->view('customerdashboard/registration');
            $this->load->view('customerdashboard/main_registration');
        }
        else
        {
        	$email=$this->input->post('email');
        	$given_name=$this->input->post('fname');
        	$last_name=$this->input->post('lname');
        	$password=$this->input->post('password');
        	$phone=$this->input->post('phone');
            $r=$this->OH->getdatagoogleuser($email);
            if($r)
            {
                $this->session->set_flashdata('message_name', 'Email address already registered please log in');
                redirect('Customerlogin');
            }
            else
            {
                $data = array(
    			'status' => 'APPROVED',
    			'oauth_provider' => 'Self',
    			'oauth_uid' => '',
    			'first_name' => $given_name,
    			'last_name' => $last_name,
    			'email' => $email,
    			'gender' => "",
    			'locale' => "",
    			//'picture' => $picture,
    			'link' => "",
    			'created' => date("Y-m-d H:i:s"),
    			'modified' => date("Y-m-d H:i:s"),
    			'password'=>md5($password),
    			'phone'=>$phone,
    		);
    		$this->db->insert('users', $data);
    		$data['email']=$email;
    		$data['pwd']=$password;
    		$data['subject']="New Customer Registration";
		    $data['msg']="Thank you for signing up with Vako <br> In order to start you need to first login page enter your register email address and Password  validate and direct to dashboard";
		    $data['site']=$this->OH->getsitedata();
		    $mail_message=$this->load->view('mail/customerregistration',$data,true);
//			$message =$this->OH->sendMail($email, $data['subject'], $mail_message);
			$this->session->set_flashdata('message_name', 'Registration Successfully');
    		redirect('Customerlogin');
            }
        }
		
	}
	

}
