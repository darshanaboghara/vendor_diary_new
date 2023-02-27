<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Staff extends CI_Controller
{
    function __construct()
	{
		parent::__construct();
		
	}
    
	public function index()
    {
		 redirect(base_url() . "staff/dashboard");
    }
    public function login()
    {
        if ($this->session->Staff_logged_in == TRUE) {
			redirect(base_url() . "staff/dashboard");
		}
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|max_length[15]|min_length[6]');
		if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('staff/login.php');
        }
        else
        {
            $result=$this->SH->loginValidate($this->input->post('email'),md5($this->input->post('password')));
            
            if(count($result)==1)
            {
                $this->session->set_userdata('StaffData', $result[0]);
                $roleresult=$this->SH->getroledata($this->session->StaffData->role);
                $this->session->set_userdata('StaffRole', $roleresult[0]);
                $newdata = array('Staff_logged_in' => TRUE);
                $this->session->set_userdata($newdata);
                $this->session->set_flashdata('Preload','TRUE');
                //staff last login time set
                date_default_timezone_set('Asia/Kolkata');
                $data['last_login']=date("Y-m-d H:i:s");
                $data['ip_address']=$this->input->ip_address();
                $where = array(
                    'id' => $this->session->StaffData->id
                );
                $this->db->update('staff', $data,$where);
                $this->SH->log('Login at');
                redirect(base_url() . "staff/dashboard");
            }
            else
            {
                $data['error']="Invalid Id or Password";
                $this->load->view('staff/login.php',$data);
            }
            
        }
        
    }
    
    public function logout()
    { 
        $this->SH->log('Log Out');
        $newdata = array('Staff_logged_in');
        $this->session->unset_userdata($newdata);
        $this->session->unset_userdata('StaffData');
        $this->session->unset_userdata('roleresult');
       
        redirect(base_url() . "staff/login");
    }
    
    public function dashboard()
    {
        if ($this->session->Staff_logged_in != TRUE) {
			 redirect(base_url() . "staff/login");
		}
		$this->session->set_userdata('staff_tab', 'dashboard');
		$data['site'] = $this->OH->getsitedata();
		$this->SH->log('Dashboard');
        $this->load->view('staff/staffpage/header.php',$data);
        $this->load->view('staff/staffpage/dashboard.php');
        $this->load->view('staff/staffpage/footer.php');
    }
    
    public function vendor()
    {
        $this->SH->log('Show vendor list');
        if ($this->session->Staff_logged_in != TRUE) {
			 redirect(base_url() . "staff/login");
		}
		if ($this->session->StaffRole->view_member == "No") {
		    $this->session->set_flashdata('erorr','You Can not Access Vendor Function'); 
			redirect(base_url() . "staff/dashboard");
		}
		else
		{
		    $this->session->set_userdata('staff_tab', 'vendor');
		    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    		$data['site'] = $this->OH->getsitedata();
    		$data['allvendor'] = $this->SH->getVendor(10,$page);
    		$data['country']=$this->SH->getallcountry();
    		
    		
    	$where['is_deleted']='No';	
    	if($this->session->StaffRole->view_member=="Own Members")
        {
    	    $where['StaffID']=$this->session->StaffData->id;	
        }
    	$this->db->where($where);
        $limit = $this->db->count_all_results('wedding_planner');
        
// 		$this->db->limit($limit, $page);
        $this->db->where($where);
        
 		$config['total_rows'] = $this->db->count_all_results('wedding_planner');
		$config['base_url'] = base_url() . "staff/vendor";
		$config['num_links']=10;
		$config['per_page'] = 10;
		// Pagination link format 
		$config['num_tag_open'] = '<li class="page-item page-link" >';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a  class="page-link" href="javascript:void(0);">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['next_tag_open'] = '<li class="pg-next page-link">';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li class="pg-prev page-link">';
		$config['prev_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li class=" page-link">';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class=" page-link">';
		$config['last_tag_close'] = '</li>';
		//pagination initialize
		$this->pagination->initialize($config);
		//create links
		$data['page'] = $this->pagination->create_links();
    		
    		
    		
            $this->load->view('staff/staffpage/header',$data);
            $this->load->view('staff/staffpage/vendorlist');
            $this->load->view('staff/staffpage/footer');
		}
		
    }
    
    public function deleteVendor()
    {
        
        if ($this->session->Staff_logged_in != TRUE) {
			 redirect(base_url() . "staff/login");
		}
        if ($this->session->StaffRole->delete_member == "No") {
		    $this->session->set_flashdata('erorr','You Can Delete Vendor <b>Access Deny</b>'); 
			redirect(base_url() . "staff/dashboard");
		}
		
		$id = $this->input->get('id');
		if($id)
		{
		    	if ($this->session->StaffRole->delete_member == "Own Members") {
		    $this->db->where('StaffID', $this->session->StaffData->id);
		}
        $this->SH->log("Delete vendor vendor id $id");
        $data['is_deleted'] = 'Yes';
        $data['status'] = 'UNAPPROVED';
        
        $this->db->where('id', $id);
        $this->db->update('wedding_planner', $data);
       // echo $this->db->last_query();
		}
	
    }
    
    public function updatevendorstatus()
    {
        if ($this->session->Staff_logged_in != TRUE) {
			 redirect(base_url() . "staff/login");
		}
        if ($this->session->StaffRole->edit_member == "No") {
		    $this->session->set_flashdata('erorr','You Can Update Vendor <b>Access Deny</b>'); 
			redirect(base_url() . "staff/dashboard");
		}
        $vid=$this->input->get('vid');
        $status=$this->input->get('status');
         
         
        $table="wedding_planner";
        if("APPROVED"==$status)
        {
            $data = array(
            'status' => "UNAPPROVED",
            );
        }else
        {
             $data = array(
            'status' => "APPROVED",
            );
        }
        
        
        
        $where = array(
            'id' => $vid
        );
        $this->SH->log("Update vendor $vid");
        return $this->db->update($table, $data,$where);
        
    }
    
    public function sendcredentialmail()
    {
        if ($this->session->Staff_logged_in != TRUE) {
			 redirect(base_url() . "staff/login");
		}
//         if ($this->session->StaffRole->edit_member == "No") {
// 		    $this->session->set_flashdata('erorr','You Can Update Vendor <b>Access Deny</b>'); 
// 			redirect(base_url() . "staff/dashboard");
// 		}
        $vid=$this->input->get('vid');
        $email=$this->input->get('email');
        $pass="newpss".rand(11111,99999);
        $table="wedding_planner";
            $data1 = array(
            'email' => $email,
            'password' => md5($pass),
            );
        $where = array(
            'id' => $vid
        );
        $result= $this->db->update($table, $data1,$where);
        //die($vid." ".$email);
        if($result)
        {
            $this->db->select('*');
            $this->db->where('id', $vid);
            $this->db->from('wedding_planner');
            $query = $this->db->get();
            $vendor= $query->result();
           // die($data[0]->email);
            $this->SH->log("Claim accout $vid");
            $data['subject']="Credential for ".base_url();
    	    $data['msg']="ID:".$vendor[0]->email ."<br> Password:".$pass;
    	    $mail_message=$this->load->view('mail/otpmail',$data,true);
    		$message =$this->OH->sendMail($vendor[0]->email, $data['subject'], $mail_message);
    		sleep(3);
        }
        
    }
    
    public function addVendorByStaff()
    {
        if ($this->session->Staff_logged_in != TRUE) {
			 redirect(base_url() . "staff/login");
		}
        if ($this->session->StaffRole->add_member == "No") {
		    $this->session->set_flashdata('erorr','You Can Add Vendor <b>Access Deny</b>'); 
			redirect(base_url() . "staff/dashboard");
		}
        $bname=$this->input->post('brand_name');
		$cid=$this->input->post('country_id');
		$sid=$this->input->post('state_id');
		$cityid=$this->input->post('city_id');
		$vendortype=$this->input->post('category_id');
		$mobile_number=$this->input->post('mobile_number');
		$email_id=$this->input->post('email');
		$planner_name=$this->input->post('planner_name');
		$password=$this->input->post('password');
		$r= $this->OH->checkemail($email_id);
		if(count($r))
        {
            $this->session->set_flashdata('erorr','Email Address Already exist <b>Access Deny</b>'); 
            redirect('Staff/dashboard');
        }
		$data = array(
			'status' => 'APPROVED',
			'business_name' => $bname,
			'planner_name' => $planner_name,
			'category_id' => $vendortype,
			'country_id' => $cid,
			'state_id' => $sid,
			'city_id' => $cityid,
			'mobile' => $mobile_number,
			'email' => $email_id,
			'password' => md5($password),
			'created_on' => date("Y-m-d H:i:s"),
			'image' => '123.jpg',
			'image_2' => '123.jpg',
			'image_3' => '123.jpg',
			'image_4' => '123.jpg',
			'image_5' => '123.jpg',
			'RegisterBy' => 'STAFF',
			'StaffID' => $this->session->StaffData->id,
			
			
		);
	
	    $this->db->insert('wedding_planner', $data);
	    $insert_id = $this->db->insert_id();
	    
	    
	    
	    $fildname = $this->input->post('image');
	    $vid = $insert_id;
		$config['upload_path'] = './'.IMAGELINK;
		$config['allowed_types'] = 'gif|jpg|png';
// 		$config['max_size'] = 2000;
// 		$config['max_width'] = 1500;
// 		$config['max_height'] = 1500;
		$config['file_name'] = random_string('alnum', 8);

		$this->load->library('upload', $config);
		
			if (!$this->upload->do_upload('image')) {
			$data['e1']= array('error' => $this->upload->display_errors());
		//	die('fail to upload image');
		} else {
			$file = $this->upload->data();
// 			$this->AH->photoupdate($vid,$fildname, $file['file_name']);
	        $this->SH->photoupdate('image', $file['file_name'],$vid);
			$data = array('image_metadata' => $this->upload->data());
		}
	    
	    
	    
	    $this->session->set_flashdata('userid', $insert_id);
	    $svid=$this->db->insert_id();
	    $data = array();
	    $data = array(
	        'StaffID'=>$this->session->StaffData->id,
	        'Vid'=>$svid,
	        'createdate'=>date("Y-m-d"),
	        'affiliate'=>5,
	        'payment'=>'No',
	        'status'=>"UNAPPROVED",
	        );
	    $this->db->insert('staff_Add_vendor', $data);
	    
	    $data['subject']="New Vandor Registration By Staff";
	    $data['msg']="Thank you for signing up with Vako <br> In order to start you need to first login page enter your register email address and get OTP  validate OTP and direct to dashboard";
	    $mail_message=$this->load->view('mail/otpmail',$data,true);
		$message =$this->OH->sendMail($email_id, $data['subject'], $mail_message);
		$this->SH->log("New vendor  id $insert_id add by staff");
	    sleep(3);
	    redirect(base_url().'Staff/updatevendorbyid?id='.$insert_id);
        
    }
    
    
    public function updatevendorbyid()
    {
        if ($this->session->Staff_logged_in != TRUE) {
			 redirect(base_url() . "staff/login");
		}
         if ($this->session->StaffRole->edit_member == "No") {
		    $this->session->set_flashdata('erorr','You Can Update Vendor <b>Access Deny</b>'); 
			redirect(base_url() . "staff/dashboard");
		}
		
// 		die($this->session->StaffRole->edit_member);
        $id = $this->input->get('id');
        $this->form_validation->set_rules('planner_name', 'Planner Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('business_name', 'Business Name', 'required');
        $this->form_validation->set_rules('contact_person_name', 'Contact Person Name', 'required');
        $this->form_validation->set_rules('mobile', 'Mobile', 'required|min_length[10]|max_length[13]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        
        if ($this->form_validation->run() == FALSE)
        {
            
            $data['vdata']=$this->SH->getVendorById($id);
            $data['site'] = $this->OH->getsitedata();
            
            $this->load->view('staff/staffpage/header.php',$data);
            $this->load->view('staff/staffpage/updatevendor',$data);
            $this->load->view('staff/staffpage/footer.php');
        }
        else
        {
            $planner_name=$this->input->post('planner_name');
            $last_name=$this->input->post('last_name');
            $business_name=$this->input->post('business_name');
            $contact_person_name=$this->input->post('contact_person_name');
            $mobile=$this->input->post('mobile');
            $email=$this->input->post('email');
            $description=$this->input->post('description');
            $address=$this->input->post('address');
            
            //set data
            $data['planner_name']=$planner_name;
            $data['last_name']=$last_name;
            $data['business_name']=$business_name;
            $data['contact_person_name']=$contact_person_name;
            $data['mobile']=$mobile;
            $data['email']=$email;
            $data['description']=$description;
            $data['address']=$address;
            
            //where condition 
            $this->db->where('id', $id);
            $this->SH->log("Update vendor $id");
            //update
            $this->db->update('wedding_planner', $data);
            
            //load View
            
            $data['site'] = $this->OH->getsitedata();
            $data['vdata']=$this->SH->getVendorById($id);
            
            $this->load->view('staff/staffpage/header.php',$data);
            $this->load->view('staff/staffpage/updatevendor',$data);
            $this->load->view('staff/staffpage/footer.php');
        }
        
        
        
        
    }
    public function updateVendorLinkbyStaff()
    {
        if ($this->session->Staff_logged_in != TRUE) {
			 redirect(base_url() . "staff/login");
		}
        $id=$this->input->post('id');
         $this->form_validation->set_rules('google_link', 'Google Link', 'required|valid_url');
         $this->form_validation->set_rules('facebook_link', 'Facebook Link', 'required|valid_url');
         $this->form_validation->set_rules('twitter_link', 'Twitter Link', 'required|valid_url');
         $this->form_validation->set_rules('linkedin_link', 'Linkedin Link', 'required|valid_url');
         $this->form_validation->set_rules('map_location', 'Map Location', 'required|valid_url');
         $this->form_validation->set_rules('website', 'Website', 'required|valid_url');
         
        if ($this->form_validation->run() == FALSE)
        {
            $data['site'] = $this->OH->getsitedata();
            $data['vdata']=$this->SH->getVendorById($id);
            
            $this->load->view('staff/staffpage/header.php',$data);
            $this->load->view('staff/staffpage/updatevendor',$data);
            $this->load->view('staff/staffpage/footer.php');
        }
        else
        {
           
            $google_link=$this->input->post('google_link');
            $facebook_link=$this->input->post('facebook_link');
            $linkedin_link=$this->input->post('linkedin_link');
            $twitter_link=$this->input->post('twitter_link');
            $map_location=$this->input->post('map_location');
            $website=$this->input->post('website');
            
            //set data
            $data['google_link']=$google_link;
            $data['facebook_link']=$facebook_link;
            $data['linkedin_link']=$linkedin_link;
            $data['twitter_link']=$twitter_link;
            $data['map_location']=$map_location;
            $data['website']=$website;
            
            //where condition 
            $this->db->where('id', $id);
            $this->SH->log("update vendor link vender id: $id");
            //update
            $this->db->update('wedding_planner', $data);
            
             //load View
            $data['site'] = $this->OH->getsitedata();
            $data['vdata']=$this->SH->getVendorById($id);
            
            $this->load->view('staff/staffpage/header.php',$data);
            $this->load->view('staff/staffpage/updatevendor',$data);
            $this->load->view('staff/staffpage/footer.php');
        }
        
        
    }
    public function AddArea()
    {
        if ($this->session->Staff_logged_in != TRUE) {
			 redirect(base_url() . "staff/login");
		}
        $this->session->set_userdata('staff_tab', 'AddArea');
        $data['country']=$this->AH->getallcountry();
        $data['state']=$this->AH->getallstate();
        $data['city']=$this->AH->getallcity();
        $data['site'] = $this->OH->getsitedata();
        $this->SH->log("show All Area");
        $this->load->view('staff/staffpage/header.php',$data);
        $this->load->view('staff/staffpage/addarea',$data);
        $this->load->view('staff/staffpage/footer.php');
    }
    public function AddCountry()
    {
         $country_name = $this->input->post('country_name');
         $country_code = $this->input->post('country_code');
        
        $data = array(
        'country_name' => $country_name,
        'country_code' => $country_code,
        'status' => 'APPROVED',
        'is_deleted' => 'No'
        );
        $this->SH->log("Add contry $country_name code is $country_code ");
        $this->session->set_flashdata('Success', 'Country Add Successfully');
        $this->db->insert('country_master', $data);
        
        $this->AddArea();
    }
   
    public function AddState()
    {
         $country_id = $this->input->post('country_id');
         $state_name = $this->input->post('state_name');
        
        $data = array(
        'country_id' => $country_id,
        'state_name' => $state_name,
        'status' => 'APPROVED',
        'is_deleted' => 'No'
        );
        if($country_id!=0)
        {
            $this->db->insert('state_master', $data);
            $this->session->set_flashdata('Success', 'State Add Successfully');
            $this->SH->log("Add state $state_name");
        }
        else
        {
            $this->session->set_flashdata('erorr', 'Please Select Country');
        }
        
        $this->AddArea();
    }
   
    public function AddCity()
    {
         $country_id = $this->input->post('country_id');
         $state_id = $this->input->post('state_id');
         $city_name = $this->input->post('city_name');
        
        $data = array(
        'country_id' => $country_id,
        'state_id' => $state_id,
        'city_name' => $city_name,
        'priority' => 'No',
        'status' => 'APPROVED',
        'is_deleted' => 'No'
        );
        
        if($country_id!=0 or $state_id!=0)
        {
            $this->db->insert('city_master', $data);
            $this->session->set_flashdata('Success', 'City Add Successfully');
            $this->SH->log("add new city $city_name");
        }
        else
        {
            $this->session->set_flashdata('erorr', 'Please Select Country And State');
        }
        
        
        $this->AddArea();
    }
    
    public function category()
    {
        if ($this->session->Staff_logged_in != TRUE) {
			 redirect(base_url() . "staff/login");
		}
        $this->session->set_userdata('staff_tab', 'category');
        $data['allcategory']=$this->OH->getallvendorcategory();
        $data['site'] = $this->OH->getsitedata();
        $this->SH->log("show all category");
        $this->load->view('staff/staffpage/header.php',$data);
        $this->load->view('staff/staffpage/category',$data);
        $this->load->view('staff/staffpage/footer.php');
    }
    
    public function vendorPlan()
    {
        if ($this->session->Staff_logged_in != TRUE) {
			 redirect(base_url() . "staff/login");
		}
        if ($this->session->StaffRole->view_plan == "No") {
		    $this->session->set_flashdata('erorr','You Can Not Show Vendor Plan <b>Access Deny</b>'); 
			redirect(base_url() . "staff/dashboard");
		}
        $this->session->set_userdata('staff_tab', 'vendorPlan');
        $this->db->select('*');
        $this->db->where('is_deleted', 'No');
        $this->db->from('vendor_membership_plan');
        $query = $this->db->get();
        
        $data['vplan']= $query->result();
        $data['site'] = $this->OH->getsitedata();
        $this->SH->log("show vendor vendorplan");
        $this->load->view('staff/staffpage/header.php',$data);
        $this->load->view('staff/staffpage/vendorPlan',$data);
        $this->load->view('staff/staffpage/footer.php');
    }
    
    public function vendorPlanUpdate()
    {
        if ($this->session->Staff_logged_in != TRUE) {
			 redirect(base_url() . "staff/login");
		}
        if ($this->session->StaffRole->edit_newplan == "No") {
		    $this->session->set_flashdata('erorr','You Can Not Edit or Update Vendor Plan <b>Access Deny</b>'); 
			redirect(base_url() . "staff/dashboard");
		}
        $id = $this->input->post('id');
        $plan_amount = $this->input->post('plan_amount');
        $plan_duration = $this->input->post('plan_duration');
        $lead = $this->input->post('lead');
        $plan_type=$this->input->post('plan_type');
        $plan_amount_type=$this->input->post('plan_amount_type');
        $status=$this->input->post('status');
        
        if($plan_type=="FREE")
        {
            $plan_amount=0;
        }
        
        $data['plan_amount'] = $plan_amount;
        $data['plan_duration'] = $plan_duration;
        $data['lead'] = $lead;
        $data['plan_amount_type']=$plan_amount_type;
        $data['plan_type']=$plan_type;
        $data['status']=$status;
        
        $this->db->where('id', $id);
        $this->db->update('vendor_membership_plan', $data);
        $this->SH->log("update Plan id $id");
        redirect("Staff/vendorPlan");
        
    }
    
    public function addNewPlan()
    {
        if ($this->session->Staff_logged_in != TRUE) {
			 redirect(base_url() . "staff/login");
		}
        if ($this->session->StaffRole->edit_newplan == "No")
        {
		    $this->session->set_flashdata('erorr','You Can Not Add New Vendor Plan <b>Access Deny</b>'); 
			redirect(base_url() . "staff/dashboard");
		}
        $rates_name=$this->input->post('rates_name');
        $plan_type=$this->input->post('plan_type');
        $plan_amount_type=$this->input->post('plan_amount_type');
        $plan_amount=$this->input->post('plan_amount');
        $plan_duration=$this->input->post('plan_duration');
        $lead=$this->input->post('lead');
        $status=$this->input->post('status');
        
        if($plan_type=="FREE")
        {
            $plan_amount=0;
        }
        
        $data = array(
            'rates_name'=>$rates_name,
            'plan_type'=>$plan_type,
            'plan_amount_type'=>$plan_amount_type,
            'plan_amount'=>$plan_amount,
            'plan_duration'=>$plan_duration,
            'lead'=>$lead,
            'status'=>$status,
            'is_deleted'=>'No',
            'created_on' => date("Y-m-d H:i:s"),
            'top_featured_in_pages' => '0',
            'vendor_listing_service_providers' => '0',
        );
        $this->db->insert('vendor_membership_plan', $data);
        $this->SH->log("new plan added");
        sleep(3);
	    redirect(base_url()."Staff/vendorPlan");
    }
    public function vendorPlanDelete()
    {
        if ($this->session->Staff_logged_in != TRUE) {
			 redirect(base_url() . "staff/login");
		}
         if ($this->session->StaffRole->edit_newplan == "No") {
		    $this->session->set_flashdata('erorr','You Can Not Edit or Delete Vendor Plan <b>Access Deny</b>'); 
		    return http_response_code(401);
			redirect(base_url() . "staff/dashboard");
		}
        $id = $this->input->get('id');
        
        $this->db->where('id', $id);
        $data['is_deleted'] = 'Yes';
        $data['status'] = 'UNAPPROVED';
        $this->db->update('vendor_membership_plan', $data);
        $this->SH->log("plan id :$id deleted");
       // $this -> db -> delete('vendor_membership_plan');
       // redirect("Staff/vendorPlan");
        
    }
    
    public function vendorquery()
    { 
        if ($this->session->Staff_logged_in != TRUE) {
			 redirect(base_url() . "staff/login");
		}
        if ($this->session->StaffRole->view_comment == "No") {
		    $this->session->set_flashdata('erorr','You Can Not Show Vendor Query <b>Access Deny</b>'); 
			redirect(base_url() . "staff/dashboard");
		}
        $this->session->set_userdata('staff_tab', 'vendorquery');
        
        $this->db->select('*');
        if ($this->session->StaffRole->view_comment == "Own Members") {
            $this->db->join('wedding_planner', 'venorenquiry.vendor_id = wedding_planner.id');
            $this->db->where('wedding_planner.StaffID', $this->session->StaffData->id);
        }
        $this->db->from('venorenquiry');
		$query = $this->db->get();
		$data['country']=$this->AH->getallcountry();
		$data['vquery'] = $query->result();
        $data['site'] = $this->OH->getsitedata();
        $this->SH->log("vendor query show");
        $this->load->view('staff/staffpage/header',$data);
        $this->load->view('staff/staffpage/vendorquery');
        $this->load->view('staff/staffpage/footer');
    }
    
    public function vendorQueryStaffResponse()
    {
        $id = $this->input->post('id');
        $data = array(
            'status' => "SEND",
            );
        $where = array(
            'id' => $id
        );
        $this->db->update('venorenquiry', $data,$where);
        $to = $this->input->post('email');
        $subject="Staff Response For your Quiry";
        $message = $this->input->post('message');
        //$msg=$this->OH->sendMail($email, "Hello", $message);
        $this->SH->log("staff query response to $to message is:$message");
        
        
        $myEmail = MAIL_ID;
        $myEmailPassword = MAIL_PASSWORD;

        $config['protocol']  = 'SMTP';
        $config['smtp_host'] = "sg2plzcpnl462840.prod.sin2.secureserver.net";
        $config['smtp_user'] = $myEmail;
        $config['smtp_pass'] = $myEmailPassword;
        $config['smtp_port'] = "25";
        $config['mailtype'] = "html";
        $config['charset'] = "iso-8859-1";
        $config['wordwrap'] =TRUE;

        $this->load->library('email', $config);
        $config['newline'] = "\r\n";
   		$config['crlf'] = "\r\n";

        $this->email->set_newline("\r\n");
        $this->email->from($myEmail);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->set_newline("\r\n");

        $result = [];
        if ($this->email->send()) {
            $result['status'] = "OK";
            $result['msg'] = "Send Successfully...";
        } else {
            $result['status'] = "BAD_REQUEST";
            $result['msg'] = $this->email->print_debugger();
        }
        redirect("Staff/vendorquery");
    }
    
    public function paidvendorlist()
    {
        if ($this->session->Staff_logged_in != TRUE) {
			 redirect(base_url() . "staff/login");
		}
        if ($this->session->StaffRole->renew_plan == "No") {
		    $this->session->set_flashdata('erorr','You Can Not Show Paid Vendor <b>Access Deny</b>'); 
			redirect(base_url() . "staff/dashboard");
		}
		
        $this->session->set_userdata('staff_tab', 'paidvendorlist');
        
        $this->db->select('*');
        $this->db->order_by('id', 'desc');
        if ($this->session->StaffRole->renew_plan == "Own Members") {
            
            $this->db->where('StaffID', $this->session->StaffData->id);
        }
        $this->db->where('is_deleted', 'No');
        $this->db->where('status', 'APPROVED');
        $this->db->where('plan_status', 'Paid');
        $this->db->from('wedding_planner');
        
		$query = $this->db->get();
		 $data['allvendor'] = $query->result();
		
		$this->db->select('*');
        $this->db->where('is_deleted', 'No');
        $this->db->where('status', 'APPROVED');
        $this->db->from('vendor_membership_plan');
        $query = $this->db->get();
        $data['vplan']= $query->result();
        
        $data['site'] = $this->OH->getsitedata();
        $this->SH->log("show all paid vendor list");
        $this->load->view('staff/staffpage/header',$data);
        $this->load->view('staff/staffpage/paidvendor',$data);
        $this->load->view('staff/staffpage/footer');
    }
    
    public function paidByStaff()
    {
        if ($this->session->Staff_logged_in != TRUE) {
			 redirect(base_url() . "staff/login");
		}
        $id=$this->input->post('id');
        $plan_type=$this->input->post('plan_type');
        $status=$this->input->post('status');
        if($status=="APPROVED")
        {
            $r='True';
            $this->SH->log("staff free to paid vendor $id to ID:$plan_type plan id");
            $this->SH->vendorcash($id,$plan_type);
            $this->SH->vendorPaymentCash($id,$plan_type);
             $this->SH->addcashpayment($plan_type);
            
            $data['email']=$this->input->post('email');
            $data['StaffID']=$this->session->StaffData->id;
            $this->db->where('id', $id);
            $this->db->update('wedding_planner', $data);
            
            //send new credential to Vendor
            $vid=$id;
            $email=$this->input->post('email');
            $pass="newpss".rand(11111,99999);
            $table="wedding_planner";
                $data1 = array(
                'email' => $email,
                'password' => md5($pass),
                );
            $where = array(
                'id' => $vid
            );
            $this->db->update($table, $data1,$where);
            $this->SH->log("Claim accout $vid");
            $data['subject']="Credential for ".base_url();
    	    $data['msg']="ID:".$email ."<br> Password:".$pass;
    	    $mail_message=$this->load->view('mail/otpmail',$data,true);
    		$message =$this->OH->sendMail($email, $data['subject'], $mail_message);
    		sleep(2);
        }
        else
        {
            $r="Flase";
        }
        $this->OH->planchekout($id,$plan_type,$r,'By_Staff_ID_'.$this->session->StaffData->id,"Pay by Staff Id ".$this->session->StaffData->id);
        $this->paidvendorlist();
    }
    
    public function expiredvendorlist()
    {
        if ($this->session->Staff_logged_in != TRUE) {
			 redirect(base_url() . "staff/login");
		}
        if ($this->session->StaffRole->view_member == "No") {
		    $this->session->set_flashdata('erorr','You Can not Access Vendor Function'); 
			redirect(base_url() . "staff/dashboard");
		}
		$this->session->set_userdata('staff_tab', 'expiredvendorlist');
        $this->db->select('*');
        $this->db->order_by('id', 'desc');
        $this->db->where('is_deleted', 'No');
        $this->db->where('status', 'APPROVED');
        $this->db->where('plan_status', 'Expired');
        
        if ($this->session->StaffRole->renew_plan == "Own Members") {
            
            $this->db->where('StaffID', $this->session->StaffData->id);
        }
        $this->db->from('wedding_planner');
		$query = $this->db->get();
		$data['allvendor'] = $query->result();
		
		$this->db->select('*');
        $this->db->where('is_deleted', 'No');
        $this->db->where('status', 'APPROVED');
        $this->db->from('vendor_membership_plan');
        $query = $this->db->get();
        $data['vplan']= $query->result();
        
        $data['site'] = $this->OH->getsitedata();
        $this->SH->log("show all expired vendorlist");
        $this->load->view('staff/staffpage/header.php',$data);
        $this->load->view('staff/staffpage/expiredvendorlist',$data);
        $this->load->view('staff/staffpage/footer.php');
    }
    public function notPaidvendorlist()
    {
        if ($this->session->Staff_logged_in != TRUE) {
			 redirect(base_url() . "staff/login");
		}
        
        if ($this->session->StaffRole->view_member == "No") {
		    $this->session->set_flashdata('erorr','You Can not Access Vendor Function'); 
			redirect(base_url() . "staff/dashboard");
		}
		$this->session->set_userdata('staff_tab', 'notPaidvendorlist');
		
        //Vendor List
        $where['is_deleted']='No';
        $where['plan_status']='Not Paid';
        if ($this->session->StaffRole->renew_plan == "Own Members") {
            //$where['StaffID']= $this->session->StaffData->id;
        }
	    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        $data['allvendor']=$this->OH->getdata('wedding_planner', $where,10,$page);
	    $this->db->where($where);
	    $config['total_rows'] = $this->db->count_all_results('wedding_planner');
		$config['base_url'] = base_url() . "staff/notPaidvendorlist";
		$config['num_links']=10;
		$config['per_page'] = 10;
		// Pagination link format 
		$config['num_tag_open'] = '<li class="page-item page-link" >';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a  class="page-link" href="javascript:void(0);">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['next_tag_open'] = '<li class="pg-next page-link">';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li class="pg-prev page-link">';
		$config['prev_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li class=" page-link">';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class=" page-link">';
		$config['last_tag_close'] = '</li>';
		//pagination initialize
		$this->pagination->initialize($config);
		//create links
		$data['page'] = $this->pagination->create_links();
	    
	    //Plan
	    $this->db->select('*');
        $this->db->where('is_deleted', 'No');
        $this->db->where('status', 'APPROVED');
        $this->db->from('vendor_membership_plan');
        $query = $this->db->get();
        $data['vplan']= $query->result();

        $data['site'] = $this->OH->getsitedata();
        $this->SH->log("not paid vendor list");
        $this->load->view('staff/staffpage/header.php',$data);
        $this->load->view('staff/staffpage/notpaidvdendor',$data);
        $this->load->view('staff/staffpage/footer.php');
    }
    
    public function vendorPayments()
    {
        if ($this->session->Staff_logged_in != TRUE) {
			 redirect(base_url() . "staff/login");
		}
        if ($this->session->StaffRole->view_member == "No") {
		    $this->session->set_flashdata('erorr','You Can not Access Vendor Function'); 
			redirect(base_url() . "staff/dashboard");
		}
		$this->session->set_userdata('staff_tab', 'vendorPayments');
		
        $this->db->select('*');
        $this->db->where('vendor_payments.is_deleted', 'No');
        $this->db->where('wedding_planner.StaffID', $this->session->StaffData->id);
        $this->db->from('vendor_payments');
        $this->db->join('wedding_planner', 'vendor_payments.ad_id = wedding_planner.id');
		$query = $this->db->get();
		$data['allvendor'] = $query->result();
        
        $data['site'] = $this->OH->getsitedata();
        $this->SH->log("show all paid vendor list");
        $this->load->view('staff/staffpage/header.php',$data);
        $this->load->view('staff/staffpage/vendorPayment',$data);
        $this->load->view('staff/staffpage/footer.php');
    }
    
    public function printPayment()
    {
        //$data['site'] = $this->OH->getsitedata();
        $id=base64_decode($this->input->get('id'));
        $this->db->select('*');
        $this->db->where('vendor_payments.id', $id);
        $this->db->where('vendor_payments.is_deleted', 'No');
        $this->db->from('vendor_payments');
        $this->db->join('wedding_planner', 'vendor_payments.email = wedding_planner.email');
		$query = $this->db->get();
		$data['vendor'] = $query->result();
		$data['billid'] = base64_encode($id);
		//die(print_r($data['vendor']));
		if ($this->session->Admin_logged_in == TRUE || $this->session->Staff_logged_in == TRUE || $this->session->vid==$data['vendor'][0]->ad_id)
		{
    		 if($data['vendor'])
    		 {
    		    $data['site'] = $this->OH->getsitedata();
                $this->load->view('staff/staffpage/bill',$data);
                //$this->SH->log("PRINT bill vendor id:$id");
    		}
    		else
    		{
    		     $data['Message']="Payment Details Page Credential Not valid";
    		     $this->load->view('error404',$data);
    		    
    		}
		}
		else
    		{
    		     $data['Message']="You need to login for check your bill";
    		     $this->load->view('error404',$data);
    		    
    		}
		
		
    }
    
    public function mailbill()
    {
        $id=base64_decode($this->input->get('id'));
        $this->db->select('*');
        $this->db->where('vendor_payments.id', $id);
        $this->db->where('vendor_payments.is_deleted', 'No');
        $this->db->from('vendor_payments');
        $this->db->join('wedding_planner', 'vendor_payments.email = wedding_planner.email');
		$query = $this->db->get();
		$data['vendor'] = $query->result();
	//	die(print_r($data['vendor'][0]->email));
		if($data['vendor'])
		{
		    $data['subject']="INVOICE";
	        $data['msg']="Bill";
	        $data['site'] = $this->OH->getsitedata();
            $mail_message=$this->load->view('mail/bill',$data,true);
	    //$mail_message=$this->load->view('mail/otpmail',$data,true);
		$message =$this->OH->sendMail($data['vendor'][0]->email, $data['subject'], $mail_message);
		    
		   $data['site'] = $this->OH->getsitedata();
            $this->load->view('staff/staffpage/bill',$data);
		}
		else
		{
		     $data['Message']="Payment Details Page Credential Not valid";
		    $this->load->view('error404',$data);
		    
		}
    }
    public function vendorAffiliate()
    {
        if ($this->session->Staff_logged_in != TRUE) {
			 redirect(base_url() . "staff/login");
		}
//         if ($this->session->StaffRole->view_member == "No") {
// 		    $this->session->set_flashdata('erorr','You Can not Access Vendor Function'); 
// 			redirect(base_url() . "staff/dashboard");
// 		}

		$this->session->set_userdata('staff_tab', 'vendorAffiliate');
		
        $this->db->select('*');
        $this->db->where('StaffID', $this->session->StaffData->id);
        $this->db->from('staff_Add_vendor');
		$query = $this->db->get();
		$data['allvendor'] = $query->result();
        
        $data['site'] = $this->OH->getsitedata();
        $this->SH->log("show affiliate");
        $this->load->view('staff/staffpage/header.php',$data);
        $this->load->view('staff/staffpage/vendorAffiliate',$data);
        $this->load->view('staff/staffpage/footer.php');
    }
    
    public function image()
	{
	    if ($this->session->Staff_logged_in != TRUE) {
			 redirect(base_url() . "staff/login");
		}
	    $uid=$this->input->post('userid');
	    $fild=$this->input->post('fild');
		$config['upload_path'] = './'.IMAGELINK;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 2000;
		$config['max_width'] = 1500;
		$config['max_height'] = 1500;
		$config['file_name'] = random_string('alnum', 8);

		$this->load->library('upload', $config);


		if (!$this->upload->do_upload('image')) {
			$data['e1']= array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('message_name', $data['e1']);
		//	$data['vdata'] = $this->OH->getvendor($this->session->vid);
			//$this->load->view('Dashboard/header', $data);
			redirect(base_url().'Staff/updatevendorbyid?id='. $uid);
		} else {
			$file = $this->upload->data();
			$this->SH->photoupdate($fild, $file['file_name'],$uid);
			$data = array('image_metadata' => $this->upload->data());
			//$data['vdata'] = $this->OH->getvendor($this->session->vid);
			//$this->load->view('Dashboard/header', $data);
		//	$data['e1']= array('error' => "Image Update Successfully");
			$this->session->set_flashdata('message_name', 'Image Update Successfully');
			redirect(base_url().'Staff/updatevendorbyid?id='. $uid,'refresh');
		}
		
	}
	public function vendorlistbyfilter()
    {
        if ($this->session->Staff_logged_in != TRUE) {
			 redirect(base_url() . "staff/login");
		}
        $like=array();
        $keyword=$this->input->post('keyword');
        $country_id=$this->input->post('country_id');
        $state_id=$this->input->post('state_id');
        $city_id=$this->input->post('city_id');
        $category_id=$this->input->post('category_id');
        
        if($keyword)
        {
            $like['email']=$keyword;
            $this->session->set_userdata('keyword', $keyword);
        }
        else if($this->session->keyword)
        {
             $like['email']=$this->session->keyword;
        }
        
        if($country_id!=0)
        {
            $where['country_id']=$country_id;
            $this->session->set_userdata('country_id', $country_id);
        }
        else if($this->session->country_id!=0)
        {
             $where['country_id']=$this->session->country_id;
        }
        
        if($city_id!=0)
        {
            $where['city_id']=$city_id;
            $this->session->set_userdata('city_id', $city_id);
        }
        else if($this->session->country_id!=0)
        {
             $where['city_id']=$this->session->city_id;
        }
        if($state_id!=0)
        {
            $where['state_id']=$state_id;
            $this->session->set_userdata('state_id', $state_id);
        }
        else if($this->session->state_id!=0)
        {
             $where['state_id']=$this->session->state_id;
        }
        if($category_id!=0)
        {
            $where['category_id']=$category_id;
            $this->session->set_userdata('category_id', $category_id);
        }
        else if($this->session->category_id!=0)
        {
           
             $where['category_id']=$this->session->category_id;
        }
        
		$where['is_deleted']='No';
		
// 		die(print_r($where));
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        $data['allvendor']=$this->SH->getdata('wedding_planner', $where,$like,10,$page);
        // die(print_r($data));
        // $this->db->like($like);
        // $this->db->where($where);
        // $limit = $this->db->count_all_results('wedding_planner');
        
	    // $this->db->limit($limit, $page);
        $this->db->where($where);
        $this->db->like($like);
 		$config['total_rows'] = $this->db->count_all_results('wedding_planner');
		$config['base_url'] = base_url() . "staff/vendorlistbyfilter/";
		$config['num_links']=10;
		$config['per_page'] = 10;
		// Pagination link format 
		$config['num_tag_open'] = '<li class="page-item page-link" >';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a  class="page-link" href="javascript:void(0);">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['next_tag_open'] = '<li class="pg-next page-link">';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li class="pg-prev page-link">';
		$config['prev_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li class=" page-link">';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class=" page-link">';
		$config['last_tag_close'] = '</li>';
		//pagination initialize
		$this->pagination->initialize($config);
		//create links
		$data['page'] = $this->pagination->create_links();
		
		
		$data['country']=$this->AH->getallcountry();
        $this->session->set_userdata('staff_tab', 'vendorlist');
        $data['site'] = $this->OH->getsitedata();
       
	    $this->load->view('staff/staffpage/header',$data);
        $this->load->view('staff/staffpage/vendorlist');
        $this->load->view('staff/staffpage/footer');
        $this->OH->log("Staff Open Vendor List");
    }
    
    public function paidvendorlistbyfilter()
    {
        if ($this->session->Staff_logged_in != TRUE) {
			 redirect(base_url() . "staff/login");
		}
        $like=array();
        $keyword=$this->input->post('keyword');
        $country_id=$this->input->post('country_id');
        $state_id=$this->input->post('state_id');
        $city_id=$this->input->post('city_id');
        $category_id=$this->input->post('category_id');
        $where['plan_status']='Paid';
        if($keyword)
        {
            $like['email']=$keyword;
            $this->session->set_userdata('keyword', $keyword);
        }
        else if($this->session->keyword)
        {
             $like['email']=$this->session->keyword;
        }
        
        if($country_id!=0)
        {
            $where['country_id']=$country_id;
            $this->session->set_userdata('country_id', $country_id);
        }
        else if($this->session->country_id!=0)
        {
             $where['country_id']=$this->session->country_id;
        }
        
        if($city_id!=0)
        {
            $where['city_id']=$city_id;
            $this->session->set_userdata('city_id', $city_id);
        }
        else if($this->session->country_id!=0)
        {
             $where['city_id']=$this->session->city_id;
        }
        if($state_id!=0)
        {
            $where['state_id']=$state_id;
            $this->session->set_userdata('state_id', $state_id);
        }
        else if($this->session->state_id!=0)
        {
             $where['state_id']=$this->session->state_id;
        }
        if($category_id!=0)
        {
            $where['category_id']=$category_id;
            $this->session->set_userdata('category_id', $category_id);
        }
        else if($this->session->category_id!=0)
        {
           
             $where['category_id']=$this->session->category_id;
        }
        
		$where['is_deleted']='No';
		
// 		die(print_r($where));
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        $data['allvendor']=$this->SH->getdata('wedding_planner', $where,$like,10,$page);
        // die(print_r($data));
        // $this->db->like($like);
        // $this->db->where($where);
        // $limit = $this->db->count_all_results('wedding_planner');
        
	    // $this->db->limit($limit, $page);
        $this->db->where($where);
        $this->db->like($like);
 		$config['total_rows'] = $this->db->count_all_results('wedding_planner');
		$config['base_url'] = base_url() . "staff/paidvendorlistbyfilter/";
		$config['num_links']=10;
		$config['per_page'] = 10;
		// Pagination link format 
		$config['num_tag_open'] = '<li class="page-item page-link" >';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a  class="page-link" href="javascript:void(0);">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['next_tag_open'] = '<li class="pg-next page-link">';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li class="pg-prev page-link">';
		$config['prev_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li class=" page-link">';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class=" page-link">';
		$config['last_tag_close'] = '</li>';
		//pagination initialize
		$this->pagination->initialize($config);
		//create links
		$data['page'] = $this->pagination->create_links();
		
		
		$data['country']=$this->AH->getallcountry();
        $this->session->set_userdata('staff_tab', 'vendorlist');
        $data['site'] = $this->OH->getsitedata();
        $this->db->select('*');
        $this->db->where('is_deleted', 'No');
        $this->db->where('status', 'APPROVED');
        $this->db->from('vendor_membership_plan');
        $query = $this->db->get();
        $data['vplan']= $query->result();
		$this->load->view('staff/staffpage/header',$data);
        $this->load->view('staff/staffpage/paidvendor');
        $this->load->view('staff/staffpage/footer');
        $this->OH->log("Staff Open Vendor List");
    }
    
    public function vendorquerybyfilter()
    {
        if ($this->session->Staff_logged_in != TRUE) {
			 redirect(base_url() . "staff/login");
		}
        $like=array();
        $keyword=$this->input->post('keyword');
        $country_id=$this->input->post('country_id');
        $state_id=$this->input->post('state_id');
        $city_id=$this->input->post('city_id');
        $category_id=$this->input->post('category_id');
        $fromdate=$this->input->post('fromdate');
        $todate=$this->input->post('todate');
        if($fromdate)
        {
            $where['venorenquiry.qdate >=']=$fromdate;
            $this->session->set_userdata('fromqdate', $fromdate);
        }else
        {
            if($this->session->fromqdate)
            {
                $where['venorenquiry.qdate >=']=$this->session->fromqdate;
            }
        }
        if($todate)
        {
            $where['venorenquiry.qdate <=']=$todate;
            $this->session->set_userdata('toqdate', $todate);
        }else
        {
            if($this->session->todate)
            {
                $where['venorenquiry.qdate <=']=$this->session->toqdate;
            }
        }
        
        if($keyword)
        {
            $like['wedding_planner.email']=$keyword;
            $this->session->set_userdata('keyword', $keyword);
        }
        else if($this->session->keyword)
        {
             $like['wedding_planner.email']=$this->session->keyword;
        }
        
        if($country_id!=0)
        {
            $where['wedding_planner.country_id']=$country_id;
            $this->session->set_userdata('country_id', $country_id);
        }
        else if($this->session->country_id!=0)
        {
             $where['wedding_planner.country_id']=$this->session->country_id;
        }
        
        if($city_id!=0)
        {
            $where['wedding_planner.city_id']=$city_id;
            $this->session->set_userdata('city_id', $city_id);
        }
        else if($this->session->country_id!=0)
        {
             $where['wedding_planner.city_id']=$this->session->city_id;
        }
        if($state_id!=0)
        {
            $where['wedding_planner.state_id']=$state_id;
            $this->session->set_userdata('state_id', $state_id);
        }
        else if($this->session->state_id!=0)
        {
             $where['wedding_planner.state_id']=$this->session->state_id;
        }
        if($category_id!=0)
        {
            $where['wedding_planner.category_id']=$category_id;
            $this->session->set_userdata('category_id', $category_id);
        }
        else if($this->session->category_id!=0)
        {
           
             $where['wedding_planner.category_id']=$this->session->category_id;
        }
        
		$where['wedding_planner.is_deleted']='No';
		
// 		die(print_r($where));
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        $data['vquery']=$this->SH->getquerydata('wedding_planner', $where,$like,10,$page);
        // die(print_r($data));
        // $this->db->like($like);
        // $this->db->where($where);
        // $limit = $this->db->count_all_results('wedding_planner');
        
	    // $this->db->limit($limit, $page);
        $this->db->where($where);
        $this->db->like($like);
 		$config['total_rows'] = count($this->SH->getquerydatacount('wedding_planner',$where,$like));
		$config['base_url'] = base_url() . "Staff/vendorquerybyfilter/";
		$config['num_links']=10;
		$config['per_page'] = 10;
		// Pagination link format 
		$config['num_tag_open'] = '<li class="page-item page-link" >';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a  class="page-link" href="javascript:void(0);">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['next_tag_open'] = '<li class="pg-next page-link">';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li class="pg-prev page-link">';
		$config['prev_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li class=" page-link">';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class=" page-link">';
		$config['last_tag_close'] = '</li>';
		//pagination initialize
		$this->pagination->initialize($config);
		//create links
		$data['page'] = $this->pagination->create_links();
		
		
		$data['country']=$this->AH->getallcountry();
        $this->session->set_userdata('staff_tab', 'vendorquery');
        $data['site'] = $this->OH->getsitedata();
       
		$this->load->view('staff/staffpage/header',$data);
        $this->load->view('staff/staffpage/vendorquery');
        $this->load->view('staff/staffpage/footer');
        $this->OH->log("Staff Open Vendor List");
    }
    public function staffcash()
    {
        if ($this->session->Staff_logged_in != TRUE) {
			 redirect(base_url() . "staff/login");
		}   
		$where['staff_id']=$this->session->StaffData->id;
		

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        $data['staffcash']=$this->OH->getdata('staff_cash_fund', $where,10,$page);
       
        $this->db->where($where);
 		$config['total_rows'] = $this->db->count_all_results('staff_cash_fund');
		$config['base_url'] = base_url() . "Staff/staffcash/";
		$config['num_links']=10;
		$config['per_page'] = 10;
		// Pagination link format 
		$config['num_tag_open'] = '<li class="page-item page-link" >';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a  class="page-link" href="javascript:void(0);">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['next_tag_open'] = '<li class="pg-next page-link">';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li class="pg-prev page-link">';
		$config['prev_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li class=" page-link">';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class=" page-link">';
		$config['last_tag_close'] = '</li>';
		//pagination initialize
		$this->pagination->initialize($config);
		//create links
		$data['page'] = $this->pagination->create_links();
		
		
        $this->session->set_userdata('staff_tab', 'staffcash');
        $data['site'] = $this->OH->getsitedata();
       
		$this->load->view('staff/staffpage/header',$data);
        $this->load->view('staff/staffpage/staffcash');
        $this->load->view('staff/staffpage/footer');
        $this->OH->log("Staff Open staffcash List");
    }
    public function cashtoadmin()
    {
        if ($this->session->Staff_logged_in != TRUE) {
			 redirect(base_url() . "staff/login");
		}
		$where['StaffID']=$this->session->StaffData->id;
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['cashtoadmin']=$this->OH->getdata('staff_paymant', $where,10,$page);
        
        $this->db->select('*');
        $this->db->where('id',$this->session->StaffData->id);
        $this->db->from('staff');
		$query = $this->db->get();
		$data['staff'] = $query->result();
      
        $this->session->set_userdata('staff_tab', 'cashtoadmin');
        $data['site'] = $this->OH->getsitedata();

		$this->load->view('staff/staffpage/header',$data);
        $this->load->view('staff/staffpage/cashtoadmin');
        $this->load->view('staff/staffpage/footer');
        $this->OH->log("Staff Open cashtoadmin List");
    }
    public function sendtoadmincash()
    {
        if ($this->session->Staff_logged_in != TRUE) {
			 redirect(base_url() . "staff/login");
		}
        $amount=$this->input->post('amount');
        $note=$this->input->post('note');
        $data = array(
            'staff_id'=>$this->session->StaffData->id,
            'amount'=>$amount,
            'status'=>'UNAPPROVED',
            'note'=>$note,
        );
        $this->db->insert('staff_fund_to_admin', $data);
        redirect(base_url() . "staff/cashtoadmin");
    }
    
}