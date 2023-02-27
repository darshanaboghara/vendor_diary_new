<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Venorenquiry extends CI_Controller
{

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
		$this->load->database();
		$this->load->helper('url');
		$vid = $this->input->post('vendor_id');
		$name = $this->input->post('full_name');
		$email = $this->input->post('email_id');
		$phone = $this->input->post('mobile_number');
		$comment = $this->input->post('comment');
		if ($comment == null) {
			$comment = "Not Given";
		}
		//$vdata=$this->OH->getvendor($vid);
		$vendor=$this->OH->getvendor($vid);
		//die($vdata->plan_status);
		if($vendor->plan_status="Paid")
		{
		    $leadshow="Yes";
		}
		else
		{
		    $leadshow="No";
		}
		
		$this->db->query('INSERT INTO `venorenquiry`(`vendor_id`, `Name`, `email`, `Phone`, `status`,`lead_show`,`Comment`,`qdate`) VALUES ("' . $vid . '","' . $name . '","' . $email . '","' . $phone . '","NEW","' . $leadshow . '","' . $comment . '","' . date('Y-m-d') . '")');
		$data['message'] = "Contect soon";
        
        $data['subject']=" Coustomer Enquiry For You";
	    //$data['msg']="Name:$name<br>Email:$email<br>Phone Number:$phone<br>Message:$comment";
	    $data['customeremail']=$email;
	    $data['customername']=$name;
	    $data['customernumber']=$phone;
	    $data['customermsg']=$comment;
	    $mail_message=$this->load->view('mail/leadvendor',$data,true);
	    if($leadshow=="Yes")
	    {
		    $this->OH->sendMail($vendor->email, $data['subject'], $mail_message);
	    }
	    else
	    {
	        $data['customeremail']="*****@****.com";
    	    $data['customername']="******** *****";
    	    $data['customernumber']="+91***** ***** ";
    	    $data['customermsg']="Hello sir/Ma'am, .......";
    	    $mail_message=$this->load->view('mail/leadvendor',$data,true);
		    $this->OH->sendMail($vendor->email, $data['subject'], $mail_message);
	    }
	    
	    $this->session->set_userdata('message', 'venorenquiry');

	    
// 		$data['subject']=" Coustomer Enquiry Copy Mail";
// 		$this->OH->sendMail($email,$data['subject'], $mail_message);

        redirect(base_url());
	}
}
