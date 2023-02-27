<?php
defined('BASEPATH') or exit('No direct script access allowed');
//include_once '../vendor/autoload.php';
class Customerlogin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->googlelogin == TRUE) {
			redirect(base_url() . "Customerdashboard");
		}
// 		die($this->input->ip_address());
	}
	
	public function index()
	{
	   // die($this->session->googlelogin);
		$data['site']=$this->OH->getsitedata();
		$this->load->view('Login/Customer_login',$data);
	}
	
	public function googlelogin()
	{
	   if($this->input->post('idtoken')=="")
	   {
	      header('Location:'.base_url());
	      die();
	   }
	    $id_token = $this->input->post('idtoken');
	   // $CLIENT_ID="797061690576-9l8anl03tvgj7vi02a8jreav8tr6f3t6.apps.googleusercontent.com";
	    $CLIENT_ID=GOOGLE_AUTH_CID;
	    $client = new \Google_Client(['client_id' => $CLIENT_ID]);  // Specify the CLIENT_ID of the app that accesses the backend
        $payload = $client->verifyIdToken($id_token);
        if ($payload)
        {
           
            $this->session->set_userdata('idtoken',$id_token);
            $userid = $payload['sub'];
            $response = file_get_contents('https://oauth2.googleapis.com/tokeninfo?id_token='.$id_token);
            $response = json_decode($response);
            $check=$this->OH->getdatagoogleuser($response->email);
           // $check=$this->OH->getdatagoogleuser($response->email);
            if(!$check)
            {
                $this->OH->registrationByGoogle($response->given_name,$response->family_name,$response->email,$response->picture);
                $data['subject']="New Customer Registration";
    		    $data['msg']="Thank you for signing up with Vako <br> In order to start you need to first login page enter your register email address and Password  validate and direct to dashboard";
    		    $mail_message=$this->load->view('mail/otpmail',$data,true);
    			$message =$this->OH->sendMail($response->email, $data['subject'], $mail_message);
    			$this->session->set_flashdata('message_name', 'Registration Successfully');
            }
            $data['user']="Customer";
            $data['subject']=" Customer Login";
		    $data['msg']="Thank you for signing In  with Vako Using IP Address:<br>". $this->input->ip_address();
		    $mail_message=$this->load->view('mail/loginalert',$data,true);
		    $message =$this->OH->sendMail($response->email, $data['subject'], $mail_message);
            $this->session->set_userdata('googleemail',$response->email);
            $this->session->set_userdata('googlename',$response->given_name);
            $this->session->set_userdata('googlelname',$response->family_name);
            $this->session->set_userdata('googlelogin',TRUE);
            
            //Log Insert
            $this->db->select('*');
            $this->db->where('email', $response->email);
            $this->db->from('users');
            $query = $this->db->get();
            $result=$query->result();
            if($result)
            {
                $this->session->set_userdata('googleID',$result[0]->id);
                $this->OH->userlog($result[0]->id,$result[0]->email);
            }
           //die(print_r( $message));
        }
        else
        {
          // Invalid ID token
        }
	}
	
	public function validateemailpwd()
	{
	    $email = $this->input->post('email');
	    $password = $this->input->post('password');
	    $a = $this->OH->getdatagoogleuser($email);
	    if($a)
	    {
	        if($a[0]->link=="By Google login")
	        {
	            echo "Plase login with Google";
	            return 0;
	        }
	        $this->db->select('*');
            $this->db->where('email', $email);
            $this->db->where('password', md5($password));
            $this->db->where('status', 'APPROVED');
            $this->db->from('users');
            $query = $this->db->get();
            $result=$query->result();
            if($result)
            {
                $this->session->set_userdata('googleID',$result[0]->id);
                $this->session->set_userdata('googleemail',$result[0]->email);
                $this->session->set_userdata('googlename',$result[0]->first_name);
                $this->session->set_userdata('googlelname',$result[0]->last_name);
                $this->session->set_userdata('googlelogin',TRUE);
                
                $this->OH->userlog($result[0]->id,$result[0]->email);
                $data['subject']=" Customer Login";
    		    $data['msg']="Thank you for signing In  with Vako Using IP Address:<br>". $this->input->ip_address();
    		    $mail_message=$this->load->view('mail/loginalert',$data,true);
    			$message =$this->OH->sendMail($result[0]->email, $data['subject'], $mail_message);
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
	    echo $message;
	    //return $message;
	}
	
	
}
