<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CornJob extends CI_Controller
{
    public function updatePlan()
	{
	    date_default_timezone_set('Asia/Kolkata');
	    $this->db->select('*');
        $this->db->where('plan_status', 'Paid');
        $this->db->where('plan_expired_on',date('Y-m-d'));
        $this->db->from('wedding_planner');
		$query = $this->db->get();
		$vendors = $query->result();
		foreach($vendors as $data)
		{
		  //Update in wedding_planner Set Plan Expired
	           $updatedata['plan_status']='Expired';
	           $updatedata['plan_id']=0;
    		   $this->db->where('id', $data->id);
    		   $this->db->update('wedding_planner', $updatedata);
    	   
    	  //Update in vendor_payments set plan Old
    		   $updatedataforvendor_payments['Active']='No';
    		   $this->db->where('ad_id', $data->id);
    		   $this->db->update('vendor_payments', $updatedataforvendor_payments);
    		   
    	    //Send Mail
    	    //$this->demo($data->email,"Your Plan Expired Today on ".base_url());
    	    //$this->OH->sendMail($data->email,"Regarding your Plan Expire Today","Your Plan Expired Today on ".base_url());
    	        $data1['subject']= "Your Plan Expired Today on ".base_url();
    		    $data1['msg']="Regarding your Plan Expire Today";
    		    $mail_message=$this->load->view('mail/otpmail',$data1,true);
    		    $message =$this->OH->sendMail($data->email, $data1['subject'], $mail_message);
    		   
		}
	  // return $this->OH->sendMail("nimeshdevani99@gmail.com","Regarding your Plan Expire Today","Your Plan Expired Today on ".base_url());
	  echo "hhelo";
	  log_message('info', 'Expire Plan Update Using CronJob');
	  return 1;
	}
	
	public function mailtoallvendor()
	{
	    $subject=$id = $this->input->get('Subject');
	    $msg=$id = $this->input->get('msg');
	    $myEmail = MAIL_ID;
        $myEmailPassword = MAIL_PASSWORD;

        $config['protocol']  = 'SMTP';
        $config['smtp_host'] = "sg2plzcpnl462840.prod.sin2.secureserver.net";
        $config['smtp_user'] = $myEmail;
        $config['smtp_pass'] = $myEmailPassword;
        $config['smtp_port'] = "25";
        $config['newline'] = "\r\n";
   		$config['crlf'] = "\r\n";
        $this->load->library('email', $config);

        
        
        
        $this->db->select('email');
        $this->db->where('status', 'APPROVED');
        $this->db->where('is_deleted','No');
        $this->db->from('wedding_planner');
		$query = $this->db->get();
		$vendors = $query->result();
		$response=array();
		foreach($vendors as $data)
		{
		    $this->email->set_newline("\r\n");
            $this->email->from($myEmail);
		    $this->email->to($data->email);
            $this->email->subject($subject);
            $this->email->message($msg);
            $this->email->set_newline("\r\n");
    
            $result = [];
            if ($this->email->send()) {
                $result['status'] = "OK";
                $result['msg'] = "Send Successfully...";
            } else {
                $result['status'] = "BAD_REQUEST";
                $result['msg'] = $this->email->print_debugger();
            }
            array_push($response,$result);
		}
		$this->OH->maillog($subject,$msg,'Send');
	    return $response;
        
	}
	
	public function expiredplanreminder()
	{
	    date_default_timezone_set('Asia/Kolkata');
	    $this->db->select('*');
        $this->db->where('plan_status', 'Expired');
        $this->db->from('wedding_planner');
		$query = $this->db->get();
		$vendors = $query->result();
		foreach($vendors as $data)
		{
    	    $this->OH->sendMail($data->email,"Regarding your Plan Expire reminder","Your Plan Expired  on ".base_url()." You need to buy plan to show plan");
    		   
		}
	  log_message('info', 'Expire Plan reminder');
	  return 1;
	}
	
	public function enquiryreminder()
	{
	    date_default_timezone_set('Asia/Kolkata');
	    $this->db->select('wedding_planner.planner_name,wedding_planner.email,count(wedding_planner.email) as total');
        $this->db->from('wedding_planner');
        $this->db->join('venorenquiry', 'venorenquiry.vendor_id = wedding_planner.id');
        $this->db->where('venorenquiry.status', 'NEW');
        $this->db->where('wedding_planner.plan_status', 'PAID');
        $this->db->group_by('venorenquiry.vendor_id'); 
		$query = $this->db->get();
		$vendors = $query->result();
	    
	   /* echo json_encode($vendors);
	    die(print_r($vendors));*/
	    
	    // $q=$this->db->query('SELECT * FROM wedding_planner as w INNER JOIN venorenquiry v ON v.vendor_id=w.id where v.status="NEW" GROUP by w.id');
        // $vendors=$q->result();
		foreach($vendors as $data)
		{
    	    //$this->OH->sendMail($data->email,$data->planner_name." you have new enquiry","You have enquiry on  ".base_url()." You need to contact your customer");
    	    $data1['total']= $data->total;
    		$data1['subject']= $data->planner_name." you have new enquiry";
		    $data1['msg']="You have enquiry on  ".base_url()." You need to contact your customer";
		    $mail_message=$this->load->view('mail/vendorenquiryreminder',$data1,true);
		    $message =$this->OH->sendMail($data->email, $data1['subject'], $mail_message);
		}
	  log_message('info', 'Enquiry Reminder');
	  return 1;
	}
	
	public function mailtocustomer()
	{
	    $subject=$id = $this->input->get('Subject');
	    $msg=$id = $this->input->get('msg');

        $this->db->select('email');
        $this->db->where('status', 'APPROVED');
        $this->db->from('users');
		$query = $this->db->get();
		$vendors = $query->result();
		$response=array();
		foreach($vendors as $data)
		{
		   
		   
		    $data1['subject']=$subject;
	        $data1['msg']=$msg;
    	    $mail_message=$this->load->view('mail/otpmail',$data1,true);
    		$message =$this->OH->sendMail($data->email, $data1['subject'], $mail_message);
          
		}
            $result['status'] = "OK";
            $result['msg'] = "Send Successfully...";
            
            array_push($response,$result);
        die();
		$this->OH->maillog($subject,$msg,'Send');
	    return $response;
        
	}
	
	public function enquiryreminderonmonth()
	{
	    date_default_timezone_set('Asia/Kolkata');
	    $this->db->select('*');
        $this->db->from('wedding_planner');
        $this->db->join('venorenquiry', 'venorenquiry.vendor_id = wedding_planner.id');
        $this->db->where('venorenquiry.status', 'NEW');
        $this->db->where('wedding_planner.plan_status', 'PAID');
        $this->db->where('venorenquiry.qdate', Date("Y-m-d", strtotime('-28 days')));
        $this->db->group_by('wedding_planner.id'); 
		$query = $this->db->get();
		$vendors = $query->result();
		
	   // echo Date("Y-m-d", strtotime('-28 days'));
	   //  die(print_r($vendors));
	    // $q=$this->db->query('SELECT * FROM wedding_planner as w INNER JOIN venorenquiry v ON v.vendor_id=w.id where v.status="NEW" GROUP by w.id');
        // $vendors=$q->result();
		foreach($vendors as $data)
		{
		    
    	    //$this->OH->sendMail($data->email,$data->planner_name." you have new enquiry","You have enquiry on  ".base_url()." You need to contact your customer");
    		$data1['subject']= $data->planner_name." you have new enquiry";
		    $data1['msg']="You have enquiry on  ".base_url()." You need to contact your customer";
		    $mail_message=$this->load->view('mail/vendorenquiryreminder',$data1,true);
		    $message =$this->OH->sendMail($data->email, $data1['subject'], $mail_message);
		}
	  log_message('info', 'Enquiry Reminder On Month over');
	  return 1;
	}
	
}
