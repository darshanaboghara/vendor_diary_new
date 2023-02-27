<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if ($this->session->logged_in == FALSE) {
			redirect(base_url() . "Login");
		}
		$data['site'] = $this->OH->getsitedata();
		$data['vdata'] = $this->OH->getvendor($this->session->vid);
		$data['vq'] = $this->OH->getquery($this->session->vid);
		$this->load->view('dashboard/header', $data);
		//die($this->session->vid);
	}
	public function index()
	{
		//$data['vdata'] = $this->OH->getvendor($this->session->vid);
		$data['vq'] = $this->OH->getquery($this->session->vid);
		//$this->load->view('Dashboard/header', $data);
		$this->load->view('dashboard/home', $data);
		$this->load->view('dashboard/footer');
	}
	public function Enquires_List()
	{
	    if($this->input->get('status'))
	    {
	       $data['vq'] = $this->OH->getquerybystatus($this->session->vid,$this->input->get('status') ,$this->input->post('weddingdate'), $this->input->post('weddingenddate'));
	    }
	    else
	    {
	       $data['vq'] = $this->OH->getquery($this->session->vid, $this->input->post('weddingdate'), $this->input->post('weddingenddate')); 
	    }
		
		$this->load->view('dashboard/Enquires_List', $data);
		$this->load->view('dashboard/footer');
	}

	public function my_Profile()
	{
		//$data['vdata'] = $this->OH->getvendor($this->session->vid);
		//$this->load->view('Dashboard/header', $data);
		$this->load->view('dashboard/My_Profile');
		$this->load->view('dashboard/footer');
	}

	public function logout()
	{
		$array_items = array('vid', 'vemail', 'logged_in');

		$this->session->unset_userdata($array_items);
		$this->session->sess_destroy();

		redirect(base_url());
	}

	public function updatequire()
	{
	   //start  Send mail
	    $this->db->select('*');
        $this->db->where('id', $this->input->get('EnquireId'));
        $this->db->from('venorenquiry');
		$query = $this->db->get();
		$venorenquiry=$query->result();
		$data['email']=$venorenquiry[0]->email;
		$data['Comment']=$venorenquiry[0]->Comment;
		$data['Name']=$venorenquiry[0]->Name;
		$data['Phone']=$venorenquiry[0]->Phone;
	    $data['subject']="Equire Response from ".$this->session->vemail;
	    $data['response']=$this->input->get('comment');
	    $mail_message=$this->load->view('mail/vendorresponsequery',$data,true);
		$message =$this->OH->sendMail($this->input->get('EnquireEmailId'), $data['subject'], $mail_message);
		$this->session->set_flashdata('message_name', "Equire Response to ". $this->input->get('EnquireEmailId')." send");
	    //End Send Mail	
	    
		$this->OH->updatequrie($this->input->get('EnquireId'),$this->input->get('comment'));
// 		die();
		redirect(base_url()."Dashboard/Enquires_List");
	}

	public function update_profile()
	{
		$business_name = $this->input->post('business_name');
		$contact_person_name = $this->input->post('vfirstname');
		$last_name = $this->input->post('vlastname');
		$description = $this->input->post('vdescribe');
		$address = $this->input->post('vaddress');
		$industry_exp = $this->input->post('industry_exp');
		$website = $this->input->post('website_link');
		$facebook_link = $this->input->post('facebook_page');
		$twitter_link = $this->input->post('twitter_link');
		$linkedin_link = $this->input->post('linkedin_link');
		$start_rate_range = $this->input->post('start_rate_range');
		$end_rate_range = $this->input->post('end_rate_range');
		$package = $this->input->post('package');
		$capacity = $this->input->post('capacity');
		$map_location = $this->input->post('map_location');
		$youtube_link = $this->input->post('youtube_link');
		$category_id = $this->input->post('category_id');
		$cat_2 = $this->input->post('cat_2');
		$cat_3 = $this->input->post('cat_3');
		$cat_4 = $this->input->post('cat_4');
		$cat_5 = $this->input->post('cat_5');
		$data = array(
            'business_name' => $business_name,
            'contact_person_name' => $contact_person_name,
            'last_name' => $last_name,
            'description' => $description,
            'address' => $address,
            'website' => $website,
            'package' => $package,
            'facebook_link' => $facebook_link,
            'twitter_link' => $twitter_link,
            'linkedin_link' => $linkedin_link,
            'start_rate_range' => $start_rate_range,
            'end_rate_range' => $end_rate_range,
            'capacity' => $capacity,
            'map_location' => $map_location,
            'youtube_link' => $youtube_link,
            'category_id' => $category_id,
            'cat_2' => $cat_2,
            'cat_3' => $cat_3,
            'cat_4' => $cat_4,
            'cat_5' => $cat_5,
        );
		$result = $this->OH->updateprofile($data);
		if ($result) {
			redirect(base_url() . "Dashboard/My_Profile");
		}
	}
	public function photo_Gallery()
	{
		//$data['vdata'] = $this->OH->getvendor($this->session->vid);
		//$this->load->view('Dashboard/header', $data);
		$this->load->view('dashboard/Photo_Gallery');
		$this->load->view('dashboard/footer');
	}

	public function image()
	{
	    $fildname = $this->input->post('image');
		$config['upload_path'] = './'.IMAGELINK;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 2000;
		$config['max_width'] = 1500;
		$config['max_height'] = 1500;
		$config['file_name'] = random_string('alnum', 8);

		$this->load->library('upload', $config);


		if (!$this->upload->do_upload($fildname)) {
			$data['e1']= array('error' => $this->upload->display_errors());
		//	$data['vdata'] = $this->OH->getvendor($this->session->vid);
			//$this->load->view('Dashboard/header', $data);
			$this->load->view('dashboard/Photo_Gallery', $data);
			$this->load->view('dashboard/footer');
		} else {
			$file = $this->upload->data();
			$this->OH->photoupdate($fildname, $file['file_name']);
			$data = array('image_metadata' => $this->upload->data());
			//$data['vdata'] = $this->OH->getvendor($this->session->vid);
			//$this->load->view('Dashboard/header', $data);
			$data['e1']= array('error' => "Image Update Successfully");
			$this->load->view('dashboard/Photo_Gallery', $data);
			$this->load->view('dashboard/footer');
		}
		
	}
	
	public function showVendorPlan()
	{
	    $this->db->select('*');
        $this->db->where('is_deleted', 'No');
        $this->db->where('status', 'APPROVED');
        $this->db->from('vendor_membership_plan');
        $query = $this->db->get();
        $data['vplan']= $query->result();
        
         $this->db->select('*');
        $this->db->where('is_deleted', 'No');
        $this->db->where('ad_id', $this->session->vid);
        //$this->db->where('status', 'APPROVED');
        $this->db->from('vendor_payments');
        $query = $this->db->get();
        $data['paidplan']= $query->result();
        // $arr = get_defined_vars();
        // print_r($arr);
        // die();
		$this->load->view('dashboard/showVendorPlan', $data);
		$this->load->view('dashboard/footer');
	}
	
    public function paymenttest()
	{
	    	$this->OH->planchekout();
	}
	
	public function passwordforgot()
	{
	    $email = $this->input->post('email');
	    $a = count($this->OH->checkemail($email));
	    if($a)
	    {
	        die("Email found");
	    }
	    else
	    {
	        die("email Not found");
	    }
	}
	
	public function passwordchange()
    {
        $old = $this->input->post('oldpwd');
        $new= $this->input->post('newpwd');
        $this->form_validation->set_rules('oldpwd', 'Old Paasword', 'required|min_length[8]|max_length[13]');
        $this->form_validation->set_rules('newpwd', 'New Password', 'required|min_length[8]|max_length[13]');
        $this->form_validation->set_rules('cnewpwd', 'Confirm New Password', 'required|matches[newpwd]|min_length[5]|max_length[13]');
        
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('dashboard/passwordchange');
            $this->load->view('dashboard/footer');
        }
        else
        {
            $r=$this->OH->passwordcheck(md5($old));
            if($r)
            {
                $this->session->set_flashdata('Success', 'Password Update Successfully');
                $this->OH->updatepassword(md5($new));
            }
            else
            {
                $this->session->set_flashdata('Error', 'Old Password Incorrect');
            }
            $this->load->view('dashboard/passwordchange');
            $this->load->view('dashboard/footer');
        }
    }
    public function printPayment()
    {
        $id=base64_decode($this->input->get('id'));
        $this->db->select('*');
        $this->db->where('vendor_payments.id', $id);
        $this->db->where('vendor_payments.is_deleted', 'No');
        $this->db->from('vendor_payments');
        $this->db->join('wedding_planner', 'vendor_payments.email = wedding_planner.email');
		$query = $this->db->get();
		$data['vendor'] = $query->result();
		if(count($data['vendor'])!=1)
		{
		    $data['Message']="Payment Details Page Credential Not valid";
		    $this->load->view('error404',$data);
		}
		else
		{
		    $data['site'] = $this->OH->getsitedata();
            $this->load->view('staff/staffpage/bill',$data);
		}
    }
    public function review()
	{
	    $this->db->select('*');
        $this->db->where('vendor_id', $this->session->vid);
        $this->db->from('vendor_reviews');
        $query = $this->db->get();
        $data['vreview']= $query->result();
        
		$this->load->view('dashboard/review', $data);
		$this->load->view('dashboard/footer');
	}
 
	
	
	
}
