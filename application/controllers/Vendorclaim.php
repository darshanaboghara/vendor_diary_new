<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendorclaim extends CI_Controller
{


	public function index()
	{
		$vid = $this->input->post('vendor_claim_id');
		$email = $this->input->post('email_id');
		
        $chars = '23456789bcdfhkmnprstvzBCDFHJKLMNPRSTVZ';
        $shuffled = str_shuffle($chars);
        $pwd = mb_substr($shuffled, 0, 8);
        
    	if ($this->input->server('REQUEST_METHOD') == 'POST') {
    	    $data= array(
    	        'email'=>$email,
    	        'business_claim'=>'Yes',
    	        'password'=>md5($pwd)
    	        );
    	        $where['id']=$vid;
    	  $r= $this->db->update('wedding_planner',$data,$where);
    	 
    	  if($r)
    	  {
    	        $data['subject']="Claim Business";
    	        $data['email']=$email;
                $data['pwd']=$pwd;
                $mail_message=$this->load->view('mail/vendorregistration',$data,true);
                $this->OH->sendMail($email, $data['subject'], $mail_message);
    	  }
        }
        
        redirect(base_url().'Login');
	}
}
