<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'third_party/twilio-php-main/src/Twilio/autoload.php';

use Twilio\Rest\Client;

class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->logged_in == TRUE) {
			redirect(base_url() . "Dashboard");
		}
// 		die($this->input->ip_address());
	}
	
	public function index()
	{
		$data['site']=$this->OH->getsitedata();
		$this->load->view('Login/vendor_login',$data);
	}

	public function sendOTPOnMobile(){

		$mobile_number = $this->input->post('mobile_number');
		$twilio = new Client(TWILIO_ACCOUNT_SID, TWILIO_AUTH_TOKEN);
		try {
			$verification = $twilio->verify->v2->services(TWILIO_VERIFICATION_SID)
				->verifications
				->create($mobile_number,'sms');

			echo $verification->status;
		}catch (\Exception $e){
			print_r($e->getMessage());
		}
	}

	public function verifyMobileOTP(){

		$twilio = new Client(TWILIO_ACCOUNT_SID, TWILIO_AUTH_TOKEN);
		$mobile_number = $this->input->post('mobile_number');
		$otp_code = $this->input->post('otp_code');
		$verificationData = array("to" => $mobile_number, "code" => $otp_code);
		try {
			$verification_check = $twilio->verify->v2->services(TWILIO_VERIFICATION_SID)
				->verificationChecks
				->create($verificationData);

			echo $verification_check->status;
		}catch (\Exception $e){
			print_r($e->getMessage());
		}
	}
	
	public function validateemailpwd()
	{
	    $email = $this->input->get('email');
	    $password = $this->input->get('password');
	    $a = count($this->OH->checkemail($email));
	    if($a)
	    {
	        $this->db->select('*');
            $this->db->where('email', $email);
            $this->db->where('password', md5($password));
            $this->db->where('is_deleted', 'No');
            $this->db->where('status', 'APPROVED');
            $this->db->from('wedding_planner');
            $query = $this->db->get();
            $result=$query->result();
            if($result)
            {
                $data = $this->OH->getvendorbyemail($email);
                $newdata = array(
    				'vid'  => $data->id,
    				'vemail'     => $data->email,
    				'rating'     => $data->rating,
    				'logged_in' => TRUE
    			);
    			
    			// Set Sesstion
    			$this->session->set_userdata($newdata);
                // Update Id Address
                    $updatedata = array(
                        // 'ip_address'=>$this->OH->get_client_ip(),
                        'ip_address'=>$this->input->ip_address(),
                        'last_login'=>date("Y-m-d H:i:s"),
                    );
            
                    $this->db->where('email', $email);
                    $this->db->update('wedding_planner', $updatedata);
                // redirect(base_url() . "Dashboard");
                $data1['user']="Vendor";
                $data1['subject']=" Vendor Login";
        	    $data1['msg']="Thank you for signing In  with Vako Using IP Address:<br>". $this->input->ip_address();
        	    $mail_message=$this->load->view('mail/loginalert',$data1,true);
        	    $this->OH->sendMail($data->email, $data1['subject'], $mail_message);
                $message = "Login Success";
                
            }
            else
            {
                $message="Wrong Password";
            }
	    }
	    else
	    {
	        $message="Email Id Not Found";    
	    }
	    print_r($message);
	    //return $message;
	}
	public function sendotp()
	{
		$email = $this->input->post('email');
		$a = count($this->OH->checkemail($email));
		if ($a) {
			$code = rand(100000, 999999);
			if ($this->OH->insertotp($code, $email)) {
				//$message = "OTP Send Sucessfully";
				    $data['subject']="Vandor OTP";
				    $data['msg']="Welcome to ".base_url()."  <br> plase Use this OTP: <b>$code</b> for Login in ".base_url();
				    $mail_message=$this->load->view('mail/otpmail',$data,true);
				   // $mail_message = "Use OTP For Login " . $code ;
					$message =$this->OH->sendMail($email, $data['subject'], $mail_message);
					$message = "OTP Send Sucessfully";
			} else {
				$message = "OTP NOT SEND";
			}
		} else {
			$message = "Mail Id Not Found";
		}


		// die($message);
	     print_r($message);
	     return $message;
	}
	public function validateotp()
	{
		$otp = $this->input->post('otp');
		$vemail = $this->input->post('email1');
		$result = $this->OH->checkotp($otp, $vemail);
		if($otp==null or $vemail==null)
		{
		    $message = "OTP Can not Be Empty";
		}
		else
		{
	    	if ($result)
	        {
    			$data = $this->OH->getvendorbyemail($vemail);
    			$newdata = array(
    				'vid'  => $data->id,
    				'vemail'     => $data->email,
    				'logged_in' => TRUE
    			);
    			
    			// Set Sesstion
    			$this->session->set_userdata($newdata);
    			
                // Update Id Address
                    $code = rand(100000, 999999);
                    $updatedata = array(
                        // 'ip_address'=>$this->OH->get_client_ip(),
                        'ip_address'=>$this->input->ip_address(),
                        'last_login'=>date("Y-m-d H:i:s"),
                        'otp'=>$code,
                    );
            
                    $this->db->where('email', $vemail);
                    $this->db->update('wedding_planner', $updatedata);
    			redirect(base_url() . "Dashboard");
		    }
	        else 
		    {
		    	$message = "Invalid OTP";
	    	}
		}
	

		echo $message;
	}
	public function googlelogin()
	{
	    $id_token = $this->input->post('idtoken');
	    
	    $CLIENT_ID="797061690576-9l8anl03tvgj7vi02a8jreav8tr6f3t6.apps.googleusercontent.com";
	    $client = new Google_Client(['client_id' => $CLIENT_ID]);  // Specify the CLIENT_ID of the app that accesses the backend
        $payload = $client->verifyIdToken($id_token);
        if ($payload)
        {
            $this->session->set_userdata('idtoken',$id_token);
            $userid = $payload['sub'];
            $response = file_get_contents('https://oauth2.googleapis.com/tokeninfo?id_token='.$id_token);
            $response = json_decode($response);
            $check=$this->OH->getdatagoogleuser($response->email);
            if(!$check)
            {
                $this->OH->registrationByGoogle($response->given_name,$response->family_name,$response->email,$response->picture);
                $data['subject']="New Customer Registration";
    		    $data['msg']="Thank you for signing up with Vako <br> In order to start you need to first login page enter your register email address and Password  validate and direct to dashboard";
    		    $mail_message=$this->load->view('mail/otpmail',$data,true);
    			$message =$this->OH->sendMail($response->email, $data['subject'], $mail_message);
    			$this->session->set_flashdata('message_name', 'Registration Successfully');
            }
            $data['subject']=" Customer Login";
		    $data['msg']="Thank you for signing In  with Vako Using IP Address:<br>". $this->input->ip_address();
		    $mail_message=$this->load->view('mail/otpmail',$data,true);
			$message =$this->OH->sendMail($response->email, $data['subject'], $mail_message);
            $this->session->set_userdata('googleemail',$response->email);
            $this->session->set_userdata('googlename',$response->given_name);
            $this->session->set_userdata('googlelname',$response->family_name);
        }
        else
        {
          // Invalid ID token
        }
	}
	public function googlelogout()
	{
	    $this->session->unset_userdata('idtoken');

		redirect(base_url());
	}
	
	public function passwordforgot()
	{
	    $email = $this->input->get('email');
	    $result=$this->OH->checkemail($email);
	    $a = count($result);
	    if($a)
	    {
	        $token=random_string('alnum', 16);
	        $table="wedding_planner";
	        $col="otp";
	        $etime=md5(date('d-m-Y h:i:s', time()+(60*60*1)));
	        $this->OH->passwordreset($table,$col,$token,$email);
	        
	        $data['subject']="Vandor Password forgot";
		  //  $data['msg']="As per your request on ".base_url()." for Password forgot <br> plase Use this Link  ".base_url()."Resetpassword/$table/$col/$token and  Use your register Email ID for Login in ".base_url();
		    $data['email']=$email;
		    $data['user']="Vendor";
		    $data['pwdlink']= base_url()."Resetpassword/$table/$col/$token?token=$etime";
		    $mail_message=$this->load->view('mail/passwordreset',$data,true);
		   // $mail_message = "Use OTP For Login " . $code ;
			$message =$this->OH->sendMail($email, $data['subject'], $mail_message);
			$message = "Password Send Sucessfully";
			$this->session->set_flashdata('message_name', 'Your password send to you an email');
	    }
	    else
	    {
	        //die("email Not found");
	        $message = "You enterd email id not found";
	        $this->session->set_flashdata('message_name', 'You enterd email id not found');
	    }
	    echo $message;
	}
	public function passwordforgotuser()
	{
	    $email = $this->input->get('email');
	    $result=$this->OH->checkemailuser($email);
	    $a = count($result);
	    if($a)
	    {
	        $token=random_string('alnum', 16);
	        $table="users";
	        $col="oauth_uid";
	        $etime=md5(date('d-m-Y h:i:s', time()+(60*60*1)));
	        $this->OH->passwordreset($table,$col,$token,$email);
	        $data['subject']="Customer Password forgot";
		  //  $data['msg']="As per your request on ".base_url()." for Password forgot <br> plase Use this Link ".base_url()."Resetpassword/$table/$col/$token  Use your register Email ID for Login in ".base_url();
		    $data['email']=$email;
		    $data['user']="Customer";
		    $data['pwdlink']= base_url()."Resetpassword/$table/$col/$token?token=$etime";
		    $mail_message=$this->load->view('mail/passwordreset',$data,true);
		    //$mail_message=$this->load->view('mail/otpmail',$data,true);
		   // $mail_message = "Use OTP For Login " . $code ;
			$message =$this->OH->sendMail($email, $data['subject'], $mail_message);
			$message = "Password Send Sucessfully";
			$this->session->set_flashdata('message_name', 'Your password send to you an email');
	    }
	    else
	    {
	        //die("email Not found");
	        $message = "You enterd email id not found";
	        $this->session->set_flashdata('message_name', 'You enterd email id not found');
	    }
	    echo $message;
	}
 
}
