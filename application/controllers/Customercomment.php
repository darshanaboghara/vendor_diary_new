<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customercomment extends CI_Controller
{
	public function index()
	{
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$phone = $this->input->post('mobile_number');
		$comment = $this->input->post('desc');
		if ($comment == null) {
			$comment = "Not Given";
		}
		$data1 = array(
        'name' => $name,
        'email' => $email,
        'mobile_number'=>$phone,
        'comment' => $comment,
        'status'=>"NEW"
        );
       
        $r=$this->db->insert('customer_comment', $data1);
        $site = $this->OH->getsitedata();
         //die(print_r($site->contact_email));
        if($r)
        {
            $data['subject']="Copy Email Of Customer Talk About Our Wedding Plans";
            $data['customername']=$name;
            $data['customeremail']=$email;
            $data['customernumber']=$phone;
            $data['customermsg']=$comment;
		    $mail_message=$this->load->view('mail/leadvendor',$data,true);
			$message =$this->OH->sendMail($email, $data['subject'], $mail_message);
			$data['subject']="New Customer Talk About Our Wedding Plans";
			$message =$this->OH->sendMail($site->contact_email, $data['subject'], $mail_message);
        }
   		$data['message'] = "Contect soon";
		$data['site'] = $site;
		$this->session->set_flashdata('message',$data['message']);
// 		die($data['message']);
		redirect($_SERVER['HTTP_REFERER']);
	}
}
