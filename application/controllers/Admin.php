<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    function __construct()
	{
		parent::__construct();
		// $this->vid= 1 ;//Vendor Id Set.
		if ($this->session->Admin_logged_in == FALSE) {
			redirect(base_url() . "Adminlogin");
		}
		date_default_timezone_set('Asia/Kolkata');
		//die($this->session->vid);
	}
    public function index()
    {
        $this->session->set_userdata('admin_tab', 'main');
        $data['site'] = $this->OH->getsitedata();
		$this->load->view('admin/pages/header', $data);
        $this->load->view('admin/index',$data);
        $this->load->view('admin/pages/footer');
        $this->OH->log("Admin Open Site Setting");
    }
    
    public function update()
    {
        //site 
        $web_name = $this->input->post('web_name');
        $contact_no = $this->input->post('contact_no');
        $contact_email = $this->input->post('contact_email');
        $web_frienly_name = $this->input->post('web_frienly_name');
        $full_address = $this->input->post('full_address');
        $footer_text = $this->input->post('footer_text');
        
        //social media
        $google_link = $this->input->post('google_link');
        $facebook_link = $this->input->post('facebook_link');
        $linkedin_link = $this->input->post('linkedin_link');
        $twitter_link = $this->input->post('twitter_link');
        
        //corour
        $colour_name = $this->input->post('colour_name');
        $font_color = $this->input->post('font_color');
        
        //corour
        $google_analytics_code = $this->input->post('google_analytics_code');
        
        //SEO
        $website_title = $this->input->post('website_title');
        $website_description = $this->input->post('website_description');
        $website_keywords = $this->input->post('website_keywords');
        
        if ($google_analytics_code != "") {
            $data1['google_analytics_code'] = $google_analytics_code;
        }
        if ($website_title != "") {
            $data1['website_title'] = $website_title;
        }
        if ($website_description != "") {
            $data1['website_description'] = $website_description;
        }
        if ($website_keywords != "") {
            $data1['website_keywords'] = $website_keywords;
        }
        
        if ($google_link != "") {
            $data1['google_link'] = $google_link;
        }
        if ($facebook_link != "") {
            $data1['facebook_link'] = $facebook_link;
        }
        if ($linkedin_link != "") {
            $data1['linkedin_link'] = $linkedin_link;
        }
        if ($twitter_link != "") {
            $data1['twitter_link'] = $twitter_link;
        }
        if ($web_name != "") {
            $data1['web_name'] = $web_name;
        }
        if ($contact_no != "") {
            $data1['contact_no'] = $contact_no;
        }
        if ($contact_email != "") {
            $data1['contact_email'] = $contact_email;
        }
        if ($web_frienly_name != "") {
            $data1['web_frienly_name'] = $web_frienly_name;
        }
        if ($footer_text != "") {
            $data1['footer_text'] = $footer_text;
        }
        if ($full_address != "") {
            $data1['full_address'] = $full_address;
        }
        if ($colour_name != "") {
            $data1['colour_name'] = $colour_name;
        }
        if ($font_color != "") {
            $data1['font_color'] = $font_color;
        }

        $this->db->where('id', 1);
        $this->db->update('site_config', $data1);
        redirect(base_url()."Admin");
//         $data['site'] = $this->OH->getsitedata();
// 		$this->load->view('admin/pages/header', $data);
//         $this->load->view('admin/index',$data);
//         $this->load->view('admin/pages/footer');
//         $this->OH->log("Admin Update Site Setting");
    }
    
    
    public function vendorlist()
    {
//         $this->db->select('*');
//         $this->db->order_by('id', 'desc');
//         $this->db->where('is_deleted', 'No');
//         $this->db->from('wedding_planner');
// 		$query = $this->db->get();
// 		$data['allvendor'] = $query->result();
		
		
		$where['is_deleted']='No';


        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        $data['allvendor']=$this->OH->getdata('wedding_planner', $where,10,$page);
        
        $this->db->where($where);
        
 		$config['total_rows'] = $this->db->count_all_results('wedding_planner');
		$config['base_url'] = base_url() . "Admin/vendorlist/";
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
        $this->session->set_userdata('admin_tab', 'vendorlist');
        $data['site'] = $this->OH->getsitedata();
		$this->load->view('admin/pages/header', $data);
        $this->load->view('admin/vendorlist',$data);
        $this->load->view('admin/pages/footer');
        $this->OH->log("Admin Open Vendor List");
    }
    
    public function dashboard()
    {
        $this->session->set_userdata('admin_tab', 'dashboard');
        $data['allvendor']=$this->OH->getallvendor();
        //die(print_r($data['site']));
         $data['site'] = $this->OH->getsitedata();
		$this->load->view('admin/pages/header', $data);
        $this->load->view('admin/admindashboard',$data);
        $this->load->view('admin/pages/footer');
        $this->OH->log("Admin Open Deshbord");
    }
    
    public function vendorquery()
    { 
        $this->session->set_userdata('admin_tab', 'vendorquery');
        $this->db->select('*');
        $this->db->from('venorenquiry');
        $limit = 10;
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$this->db->limit($limit, $page);
		$query = $this->db->get();
		$data['vquery'] = $query->result();
        //die(print_r($query->num_rows()));
		//pagination config start
		$config['base_url'] = base_url() . "admin/vendorquery/";
		$config['total_rows'] = $this->db->count_all_results('venorenquiry');
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
		$data['site'] = $this->OH->getsitedata();
		$this->load->view('admin/pages/header', $data);
        $this->load->view('admin/vendorquery',$data);
        $this->load->view('admin/pages/footer');
        $this->OH->log("Admin Open Vendor Query");
    }
    
    //Mail User Query Reaponse
    public function vendorQueryAdminResponse()
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
        $subject="Admin Response For your Quiry";
        $message = $this->input->post('message');
        //$msg=$this->OH->sendMail($email, "Hello", $message);
        
        
        
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
        //die(print_r($result));
        $this->OH->log("Admin Open Response Vendor Query");
        redirect("admin/vendorquery");
        // $data['vquery']=$this->AH->getallquery();
        // $this->load->view('admin/vendorquery',$data);
        // $this->load->view('admin/pages/footer');
        
    }
    
    public function updatevendor()
    {
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
        $this->db->update($table, $data,$where);
        $this->OH->log("Admin Update Vendor");
        // $data['allvendor']=$this->OH->getallvendor();
        // $data['site'] = $this->OH->getsitedata();
        // //die(print_r($data['site']));
        // $this->load->view('admin/vendorlist',$data);
        // $this->load->view('admin/pages/footer');
    }
    
    public function addpage()
    {
        $data['country']=$this->AH->getallcountry();
         $data['site'] = $this->OH->getsitedata();
		$this->load->view('admin/pages/header', $data);
        $this->load->view('admin/addpage',$data);
        $this->load->view('admin/pages/footer');
        $this->OH->log("Admin Open Add Counrty, status, city");
    }
    
    
    
    public function customer_comment()
    {
        $this->session->set_userdata('admin_tab', 'customer_comment');
        $this->db->select('*');
        $this->db->from('customer_comment');
        $limit = 10;
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$this->db->limit($limit, $page);
		$query = $this->db->get();
		//$query=$this->db->query('select * from wedding_planner where country_id='.$cid .' and state_id='.$sid.' and city_id='.$ciid);
		 $data['customer_comment'] = $query->result();
        //die(print_r($query->num_rows()));
		//pagination config start
		$config['base_url'] = base_url() . "admin/customer_comment/";
		$config['total_rows'] = $this->db->count_all_results('customer_comment');
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
       // $data['customer_comment']=$this->AH->getallcustomer_comment();
        $data['site'] = $this->OH->getsitedata();
		$this->load->view('admin/pages/header', $data);
        $this->load->view('admin/customer_comment',$data);
        $this->load->view('admin/pages/footer');
        $this->OH->log("Admin Open Coustomer Commanet");
    }
    function mailSend($userEmail)
    {
   $headers ='MIME-Version:1.0'."\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
$from="nimeshdevani99@gmail.com";
$to=$userEmail;
$subject="testing";
$message="test";
$headers.="From:".$from;



$chkEmail = mail($to,$subject,$message,$headers);
if($chkEmail){
return true;
}else{
return false;
}
}
    
     //Mail User Query Reaponse
    public function customerCommentAdminResponse()
    {
        
      
        
        $id = $this->input->post('id');
        $data = array(
            'status' => "SEND",
            );
        $where = array(
            'id' => $id
        );
        $this->db->update('customer_comment', $data,$where);
        
        
        $to = $this->input->post('email');
        $message = $this->input->post('message');
        $customermessage = $this->input->post('customermessage');
        $subject="Admin Response";
        
        $data['subject']=$subject;
		$data['msg']=$message;
		$data['customermessage']=$customermessage;
		$data['email']=$to;
        $mail_message=$this->load->view('mail/adminresponse',$data,true);
        //$mail_message="Hello";
        
       $this->OH->sendMail($to, $data['subject'], $mail_message);
        $this->OH->log("Admin Response Coustomer Commnet");
        redirect('Admin/customer_comment');
    }
    
    
    
    public function AddArea()
    {
        $data['country']=$this->AH->getallcountry();
        $data['state']=$this->AH->getallstate();
        $data['city']=$this->AH->getallcity();
         $data['site'] = $this->OH->getsitedata();
		$this->load->view('admin/pages/header', $data);
        $this->load->view('admin/addarea',$data);
        $this->load->view('admin/pages/footer');
        $this->OH->log("Admin Open Add New Area Page");
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
        
        $this->session->set_flashdata('Success', 'Country Add Successfully');
        $this->db->insert('country_master', $data);
        $this->OH->log("Admin Add Country");
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
        }
        else
        {
            $this->session->set_flashdata('erorr', 'Please Select Country');
        }
        $this->OH->log("Admin Add Status");
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
        }
        else
        {
            $this->session->set_flashdata('erorr', 'Please Select Country And State');
        }
        $this->OH->log("Admin Add City By Admin");
        
        $this->AddArea();
    }
    
    public function adminlogout()
    {
        $newdata = array('Admin_logged_in');
        $this->session->unset_userdata($newdata);
        $this->session->sess_destroy();
        redirect(base_url() . "Adminlogin");
        $this->OH->log("Admin Logout From Site");
    }
    
    public function vendorPlan()
    {
        $this->session->set_userdata('admin_tab', 'vendorPlan');
        $this->db->select('*');
        $this->db->where('is_deleted', 'No');
        $this->db->from('vendor_membership_plan');
        $query = $this->db->get();
        $data['vplan']= $query->result();
         $data['site'] = $this->OH->getsitedata();
		$this->load->view('admin/pages/header', $data);
        $this->load->view('admin/vendorPlan',$data);
        $this->load->view('admin/pages/footer');
        $this->OH->log("Admin Open Vendor plan");
    }
    
    public function vendorPlanUpdate()
    {
        $id = $this->input->post('id');
        $plan_amount = $this->input->post('plan_amount');
        $plan_duration = $this->input->post('plan_duration');
        $lead = $this->input->post('lead');
        $plan_type=$this->input->post('plan_type');
        $plan_amount_type=$this->input->post('plan_amount_type');
        $status=$this->input->post('status');
        
        $fbpost=$this->input->post('fbpost');
        $igpost=$this->input->post('igpost');
        $verify=$this->input->post('verify');
        $dam=$this->input->post('dam');
        $support=$this->input->post('support');
        $ips=$this->input->post('ips');
        $pb=$this->input->post('pb');
        
        $newsletter=$this->input->post('newsletter');
        $blog=$this->input->post('blog');
        $decr=$this->input->post('decr');
        $bonm=$this->input->post('bonm');
        $mnewsletter=$this->input->post('mnewsletter');
        $mblog=$this->input->post('mblog');
        $BCPW=$this->input->post('BCPW');
        
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
        
        $data['fb_post']=$fbpost;
        $data['ig_post']=$igpost;
        $data['verify']=$verify;
        $data['dam']=$dam;
        $data['support']=$support;
        $data['ips']=$ips;
        $data['pb']=$pb;
        $data['newsletter']=$newsletter;
        $data['blog']=$blog;
        $data['decr']=$decr;
        $data['bonm']=$bonm;
        $data['mnewsletter']=$mnewsletter;
        $data['mblog']=$mblog;
        $data['BCPW']=$BCPW;
        
        $this->db->where('id', $id);
        $this->db->update('vendor_membership_plan', $data);
        redirect("Admin/vendorPlan");
        $this->OH->log("Admin Update Vendor Plan");
    }
    
    public function vendorPlanDelete()
    {
        $id = $this->input->get('id');
        
        $this->db->where('id', $id);
        $data['is_deleted'] = 'Yes';
        $data['status'] = 'UNAPPROVED';
        $this->db->update('vendor_membership_plan', $data);
       // $this -> db -> delete('vendor_membership_plan');
       // redirect("Admin/vendorPlan");
       $this->OH->log("Admin Delete vendor Plan ");
        
    }
    
    public function addVendorByAdmin()
    {
        
        $bname=$this->input->post('brand_name');
		$cid=$this->input->post('country_id');
		$sid=$this->input->post('state_id');
		$cityid=$this->input->post('city_id');
		$vendortype=$this->input->post('category_id');
		$mobile_number=$this->input->post('mobile_number');
		$password=$this->input->post('password');
		$email_id=$this->input->post('email');
		$planner_name=$this->input->post('planner_name');
		$r= $this->OH->checkemail($email_id);
        if(count($r))
        {
            $this->session->set_flashdata('erorr','Email Address Already exist <b>Access Deny</b>'); 
            redirect('Admin/dashboard');
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
			'password' => md5($password),
			'email' => $email_id,
			'created_on' => date("Y-m-d H:i:s"),
			'image' => '123.jpg',
			'image_2' => '123.jpg',
			'image_3' => '123.jpg',
			'image_4' => '123.jpg',
			'image_5' => '123.jpg',
			'RegisterBy' => 'ADMIN',
			'StaffID' => '0',
			
		);
	
	    $this->db->insert('wedding_planner', $data);
        $data1['subject']="New Vandor Registration By Admin";
        $data1['msg']="Thank you for signing up with Vako <br> In order to start you need to first login page enter your register email address and Password  validate and direct to dashboard";
        $mail_message=$this->load->view('mail/vendorregistration',$data1,true);
        $message =$this->OH->sendMail($email_id, $data1['subject'], $mail_message);
	    sleep(3);
	   // redirect(base_url()."Admin/vendorlist/");
	    $this->vendorlist();
        $this->OH->log("Admin Add New Vendor");
    }
    
   public function addNewPlan()
    {
        $rates_name=$this->input->post('rates_name');
        $plan_type=$this->input->post('plan_type');
        $plan_amount_type=$this->input->post('plan_amount_type');
        $plan_amount=$this->input->post('plan_amount');
        $plan_duration=$this->input->post('plan_duration');
        $lead=$this->input->post('lead');
        $status=$this->input->post('status');
        
        $fbpost=$this->input->post('fbpost');
        $igpost=$this->input->post('igpost');
        $verify=$this->input->post('verify');
        $dam=$this->input->post('dam');
        $support=$this->input->post('support');
        $ips=$this->input->post('ips');
        $pb=$this->input->post('pb');
        
        $newsletter=$this->input->post('newsletter');
        $blog=$this->input->post('blog');
        $decr=$this->input->post('decr');
        $bonm=$this->input->post('bonm');
        $mnewsletter=$this->input->post('mnewsletter');
        $mblog=$this->input->post('mblog');
        $BCPW=$this->input->post('BCPW');
        
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
            'fb_post'=>$fbpost,
            'ig_post'=>$igpost,
            'verify'=>$verify,
            'dam'=>$dam,
            'support'=>$support,
            'ips'=>$ips,
            'pb'=>$pb,
            'newsletter'=>$newsletter,
            'blog'=>$blog,
            'decr'=>$decr,
            'bonm'=>$bonm,
            'mnewsletter'=>$mnewsletter,
            'mblog'=>$mblog,
            'BCPW'=>$BCPW,
            'is_deleted'=>'No',
            'created_on' => date("Y-m-d H:i:s"),
            'top_featured_in_pages' => '0',
            'vendor_listing_service_providers' => '0',
        );
        $this->db->insert('vendor_membership_plan', $data);
        $this->OH->log("Admin Add new Plan");
        sleep(3);
	    redirect(base_url()."Admin/vendorPlan/");
    }
    
    public function staff()
    {
        $this->session->set_userdata('admin_tab', 'staff');
        $this->db->select('*');
        $this->db->order_by('id', 'desc');
        //$this->db->where('status', 'APPROVED');
        $this->db->where('is_deleted', 'No');
        $this->db->from('staff');
        $limit = 10;
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$this->db->limit($limit, $page);
		$query = $this->db->get();
		//$query=$this->db->query('select * from wedding_planner where country_id='.$cid .' and state_id='.$sid.' and city_id='.$ciid);
		 $data['allstaff'] = $query->result();
        //die(print_r($query->num_rows()));
		//pagination config start
		$config['base_url'] = base_url() . "admin/staff/";
		//$this->db->where('status', 'APPROVED');
		$this->db->where('is_deleted', 'No');
		$config['total_rows'] = $this->db->count_all_results('staff');
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
		
	   // die(print_r($this->AH->getAllStaffRole()));
		$data['page'] = $this->pagination->create_links();
		 $data['site'] = $this->OH->getsitedata();
		$this->load->view('admin/pages/header', $data);
        $this->load->view('admin/staff',$data);
        $this->load->view('admin/pages/footer');
        $this->OH->log("Admin Open Staff");
    }
    
    public function updatestaff()
    {
        $vid=$this->input->get('vid');
        $status=$this->input->get('status');
         
         
        $table="staff";
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
        $this->db->update($table, $data,$where);
        
        // $data['allvendor']=$this->OH->getallvendor();
        // $data['site'] = $this->OH->getsitedata();
        // //die(print_r($data['site']));
        // $this->load->view('admin/vendorlist',$data);
        // $this->load->view('admin/pages/footer');
        $this->OH->log("Admin Update Staff Member");
    }
    
    public function deleteStaff()
    {
        $id = $this->input->get('id');
        
        $data['is_deleted'] = 'Yes';
        $data['status'] = 'UNAPPROVED';
        $this->db->where('id', $id);
        $this->db->update('staff', $data);
       $this->OH->log("Admin Delete Staff");
      
       return 1;
        
    }
    
    public function deleteVendor()
    {
        $id = $this->input->get('id');
        
        $data['is_deleted'] = 'Yes';
        $data['status'] = 'UNAPPROVED';
        $this->OH->log("Admin Delete Vendor ");
        $this->db->where('id', $id);
       return $this->db->update('wedding_planner', $data);
        //die($this->db->last_query());
    }
    
    public function addNewStaff()
    {
        $username=$this->input->post('username');
        $email=$this->input->post('email');
        $password=$this->input->post('password');
        $mobile=$this->input->post('mobile');
        $role=$this->input->post('role');
        $status=$this->input->post('status');
        
        $data = array(
            'username'=>$username,
            'email'=>$email,
            'password'=>md5($password),
            'c_password'=>md5($password),
            'mobile'=>$mobile,
            'role'=>$role,
            'status'=>$status,
            'is_deleted'=>'No',
            'created_on' => date("Y-m-d H:i:s"),
            'ip_address' => '0',
            'last_login' => '0',
        );
        $this->db->insert('staff', $data);
        
        sleep(2);
	    redirect(base_url()."Admin/staff/");
    }
    
    public function updatestaffDetails()
    {
        $id = $this->input->post('id');
        $username=$this->input->post('username');
        $email=$this->input->post('email');
        $password=$this->input->post('password');
        $mobile=$this->input->post('mobile');
        $role=$this->input->post('role');
        $status=$this->input->post('status');
        
        $data = array(
            'username'=>$username,
            'email'=>$email,
            'password'=>md5($password),
            'c_password'=>md5($password),
            'mobile'=>$mobile,
            'role'=>$role,
            'status'=>$status,
        );
        
        $this->db->where('id', $id);
        $this->db->update('staff', $data);
        redirect(base_url()."Admin/staff");
        
    }
    
    public function updatevendorbyid()
    {
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
            
            $data['vdata']=$this->AH->getVendorById($id);
             $data['site'] = $this->OH->getsitedata();
		    $this->load->view('admin/pages/header', $data);
            $this->load->view('admin/updatevendor',$data);
            $this->load->view('admin/pages/footer');
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
            
            //update
            $this->db->update('wedding_planner', $data);
            //load View
            $data['vdata']=$this->AH->getVendorById($id);
             $data['site'] = $this->OH->getsitedata();
		    $this->load->view('admin/pages/header', $data);
            $this->load->view('admin/updatevendor',$data);
            $this->load->view('admin/pages/footer');
        }
        
        
        
        
    }
    public function updateVendorLinkbyAdmin()
    {
             $id=$this->input->post('id');
         $this->form_validation->set_rules('google_link', 'Google Link', 'required|valid_url');
         $this->form_validation->set_rules('facebook_link', 'Facebook Link', 'required|valid_url');
         $this->form_validation->set_rules('twitter_link', 'Twitter Link', 'required|valid_url');
         $this->form_validation->set_rules('linkedin_link', 'Linkedin Link', 'required|valid_url');
         $this->form_validation->set_rules('map_location', 'Map Location', 'required|valid_url');
         $this->form_validation->set_rules('website', 'Website', 'required|valid_url');
         
        if ($this->form_validation->run() == FALSE)
        {
            $data['vdata']=$this->AH->getVendorById($id);
             $data['site'] = $this->OH->getsitedata();
		    $this->load->view('admin/pages/header', $data);
            $this->load->view('admin/updatevendor',$data);
            $this->load->view('admin/pages/footer');
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
            
            //update
            $this->db->update('wedding_planner', $data);
            
             //load View
            $data['vdata']=$this->AH->getVendorById($id);
             $data['site'] = $this->OH->getsitedata();
		    $this->load->view('admin/pages/header', $data);
            $this->load->view('admin/updatevendor',$data);
            $this->load->view('admin/pages/footer');
        }
        
        
    }
    public function updateVendorServicebyAdmin()
    {
             $id=$this->input->post('id');
         $this->form_validation->set_rules('package', 'package', 'required');
         $this->form_validation->set_rules('start_rate_range', 'Start Rate Range', 'required');
         $this->form_validation->set_rules('end_rate_range', 'End Rate Range', 'required');
         $this->form_validation->set_rules('capacity', 'Capacity', 'required');

         
        if ($this->form_validation->run() == FALSE)
        {
            $data['vdata']=$this->AH->getVendorById($id);
             $data['site'] = $this->OH->getsitedata();
		    $this->load->view('admin/pages/header', $data);
            $this->load->view('admin/updatevendor',$data);
            $this->load->view('admin/pages/footer');
        }
        else
        {
            $package=$this->input->post('package');
            $start_rate_range=$this->input->post('start_rate_range');
            $end_rate_range=$this->input->post('end_rate_range');
            $capacity=$this->input->post('capacity');
            
            //set data
            $data['package']=$package;
            $data['start_rate_range']=$start_rate_range;
            $data['end_rate_range']=$end_rate_range;
            $data['capacity']=$capacity;
            
            //where condition 
            $this->db->where('id', $id);
            
            //update
            $this->db->update('wedding_planner', $data);
            
             //load View
            $data['vdata']=$this->AH->getVendorById($id);
             $data['site'] = $this->OH->getsitedata();
		    $this->load->view('admin/pages/header', $data);
            $this->load->view('admin/updatevendor',$data);
            $this->load->view('admin/pages/footer');
        }
        
        
    }
    public function logoFavicon()
    {
        $this->session->set_userdata('admin_tab', 'logoFavicon');
        $data['site'] = $this->OH->getsitedata();
		$this->load->view('admin/pages/header', $data);
        $this->load->view('admin/logoFavicon',$data);
        $this->load->view('admin/pages/footer');
    }
    public function webLogo()
	{
		$config['upload_path'] = './assets/images/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 2000;
		$config['max_width'] = 1500;
		$config['max_height'] = 1500;
		$config['file_name'] = random_string('alnum', 8);

		$this->load->library('upload', $config);


		if (!$this->upload->do_upload('upload_logo')) {
			$data['upload_logo']= array('error' => $this->upload->display_errors());
            //die( print_r($data['e5']));
            $data['site'] = $this->OH->getsitedata();
		    $this->load->view('admin/pages/header', $data);
			$this->load->view('admin/logoFavicon', $data);
			$this->load->view('admin/pages/footer');
		} else {
			$file = $this->upload->data();
            $this->AH->photoUpdateByAdmin('upload_logo', $file['file_name']);
			$data = array('image_metadata' => $this->upload->data());
			$data['upload_logo']= array('error' => "Image Update Successfully");
            //die( $file['file_name']);
            redirect(base_url()."Admin/logoFavicon");
		}
		
	}
	public function faviconchange()
	{
		$config['upload_path'] = './favicons/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 2000;
		$config['max_width'] = 1500;
		$config['max_height'] = 1500;
		$config['file_name'] = random_string('alnum', 8);

		$this->load->library('upload', $config);


		if (!$this->upload->do_upload('upload_favicon')) {
			$data['upload_favicon']= array('error' => $this->upload->display_errors());
            //die( print_r($data['e5']));
            $data['site'] = $this->OH->getsitedata();
		$this->load->view('admin/pages/header', $data);
			$this->load->view('admin/logoFavicon', $data);
			$this->load->view('admin/pages/footer');
		} else {
			$file = $this->upload->data();
            $this->AH->photoUpdateByAdmin('upload_favicon', $file['file_name']);
			$data = array('image_metadata' => $this->upload->data());
			$data['upload_logo']= array('error' => "Image Update Successfully");
            //die( $file['file_name']);
            redirect(base_url()."Admin/logoFavicon");
		}
	}
	
	public function paidvendorlist()
    {
        $this->session->set_userdata('admin_tab', 'paidvendorlist');
        $this->db->select('*');
        $this->db->order_by('id', 'desc');
        $this->db->where('is_deleted', 'No');
        $this->db->where('plan_status', 'Paid');
        $this->db->from('wedding_planner');
        $limit = 10;
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$this->db->limit($limit, $page);
		$query = $this->db->get();
		//$query=$this->db->query('select * from wedding_planner where country_id='.$cid .' and state_id='.$sid.' and city_id='.$ciid);
		 $data['allvendor'] = $query->result();
        //die(print_r($query->num_rows()));
		//pagination config start
		$config['base_url'] = base_url() . "admin/paidvendorlist/";
		 $this->db->where('is_deleted', 'No');
		 $this->db->where('plan_status', 'Paid');
		$config['total_rows'] = $this->db->count_all_results('wedding_planner');
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
		$this->db->select('*');
        $this->db->where('is_deleted', 'No');
        $this->db->where('status', 'APPROVED');
        $this->db->from('vendor_membership_plan');
        $query = $this->db->get();
        $data['vplan']= $query->result();
        $data['country']=$this->AH->getallcountry();
		$data['page'] = $this->pagination->create_links();
		 $data['site'] = $this->OH->getsitedata();
		$this->load->view('admin/pages/header', $data);
        $this->load->view('admin/paidvendor',$data);
        $this->load->view('admin/pages/footer');
    }
    public function expiredvendorlist()
    {
        $this->session->set_userdata('admin_tab', 'expiredvendorlist');
        $this->db->select('*');
        $this->db->order_by('id', 'desc');
        $this->db->where('is_deleted', 'No');
        $this->db->where('status', 'APPROVED');
        $this->db->where('plan_status', 'Expired');
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
		$this->load->view('admin/pages/header', $data);
        $this->load->view('admin/expiredvendorlist',$data);
        $this->load->view('admin/pages/footer');
    }
    public function vendorPayments()
    {
        $this->session->set_userdata('admin_tab', 'vendorPayments');
        //die(print_r($this->uri));
        $this->db->select('*');
        $this->db->order_by('id', 'desc');
        $this->db->where('is_deleted', 'No');
        $this->db->from('vendor_payments');
        $limit = 10;
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$this->db->limit($limit, $page);
		$query = $this->db->get();
		//$query=$this->db->query('select * from wedding_planner where country_id='.$cid .' and state_id='.$sid.' and city_id='.$ciid);
		 $data['allvendor'] = $query->result();
        //die(print_r($query->num_rows()));
		//pagination config start
		$config['base_url'] = base_url() . "admin/vendorPayments/";
		$this->db->where('is_deleted', 'No');
		$config['total_rows'] = $this->db->count_all_results('vendor_payments');
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
		
		 $data['site'] = $this->OH->getsitedata();
		$this->load->view('admin/pages/header', $data);
        $this->load->view('admin/vendorPayment',$data);
        $this->load->view('admin/pages/footer');
    }
    
    //jQuiry Table For Ascending Descending Search on table
    public function Demo()
    {
         $data['site'] = $this->OH->getsitedata();
		$this->load->view('admin/pages/header', $data);
        $this->load->view('admin/demo');
        $this->load->view('admin/pages/footer');
    }
    public function Demo2()
    {
        $data['site'] = $this->OH->getsitedata();
		$this->load->view('admin/pages/header', $data);
        $this->load->view('admin/demo2');
        $this->load->view('admin/pages/footer');
    }
    public function mail()
    {
        $this->load->view('mail/otpmail');
    }
    public function notPaidvendorlist()
    {
        $this->session->set_userdata('admin_tab', 'notPaidvendorlist');
      
	    
	    $where['is_deleted']='No';
	    $where['plan_status']='Not Paid';


        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        $data['allvendor']=$this->OH->getdata('wedding_planner', $where,10,$page);
        
        $this->db->where($where);
        
 		$config['total_rows'] = $this->db->count_all_results('wedding_planner');
		$config['base_url'] = base_url() . "Admin/notPaidvendorlist/";
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
		$this->load->view('admin/pages/header', $data);
        $this->load->view('admin/notpaidvdendor',$data);
        $this->load->view('admin/pages/footer');
    }
    public function paidByAdmin()
    {
        $id=$this->input->post('id');
        $plan_type=$this->input->post('plan_type');
        $this->OH->planchekout($id,$plan_type,'True','By Admin');
        $this->paidvendorlist();
    }
    
    public function category()
    {
        $data['allcategory']=$this->OH->getallvendorcategory();
         $data['site'] = $this->OH->getsitedata();
		$this->load->view('admin/pages/header', $data);
        $this->load->view('admin/category',$data);
        $this->load->view('admin/pages/footer');
    }
    
    public function updatecategory()
    {
        $vid=$this->input->get('vid');
        $status=$this->input->get('status');
         
        $table="vendor_category";
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
       return $this->db->update($table, $data,$where);
        
       
    }
    
    public function deleteCategory()
    {
        $id = $this->input->get('id');
        
        $this->db->where('id', $id);
        $data['is_deleted'] = 'Yes';
        $data['status'] = 'UNAPPROVED';
        
       return $this->db->update('vendor_category', $data);
    }
    
     public function addCategory()
    {
        $cname=$this->input->post('category_name');
		$status=$this->input->post('status');
		
		$data = array(
			'category_name' => $cname,
			'status' => $status,
			'is_deleted' => 'No',
		);
	
	    $this->db->insert('vendor_category', $data);
	    sleep(2);
	    redirect(base_url()."Admin/category/");
        
    }
    
    public function updatecategoryname()
    {
        $vid=$this->input->post('id');
        $catename=$this->input->post('cate_name');
         
        $table="vendor_category";
       
        $data = array(
        'category_name' => $catename,
        );
        
        $where = array(
            'id' => $vid
        );
        $this->db->update($table, $data,$where);
       redirect(base_url()."Admin/category/"); 
       
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
            $this->load->view('admin/bill',$data);
		}
    }
    
    public function passwordchange()
    {
        $old = $this->input->post('oldpwd');
        $new= $this->input->post('newpwd');
        $this->session->set_userdata('admin_tab', 'passwordchange');
        $this->form_validation->set_rules('oldpwd', 'Old Paasword', 'required|min_length[5]|max_length[13]');
        $this->form_validation->set_rules('newpwd', 'New Password', 'required|min_length[5]|max_length[13]');
        $this->form_validation->set_rules('cnewpwd', 'Confirm New Password', 'required|matches[newpwd]|min_length[5]|max_length[13]');
        
        if ($this->form_validation->run() == FALSE)
        {
             $data['site'] = $this->OH->getsitedata();
		    $this->load->view('admin/pages/header', $data);
            $this->load->view('admin/passwordchange');
            $this->load->view('admin/pages/footer');
        }
        else
        {
            $r=$this->AH->passwordcheck(md5($old));
            if($r)
            {
                $this->session->set_flashdata('Success', 'Password Update Successfully');
                $this->AH->updatepassword(md5($new));
            }
            else
            {
                $this->session->set_flashdata('Error', 'Old Password Incorrect');
            }
             $data['site'] = $this->OH->getsitedata();
		    $this->load->view('admin/pages/header', $data);
            $this->load->view('admin/passwordchange');
            $this->load->view('admin/pages/footer');
        }
    }
    public function dbBackUp()
    {
        $this->session->set_userdata('admin_tab', 'dbBackUp');
        $this->OH->log("DB Download By Admin");
        $this->load->dbutil(); 
        $prefs = array( 'format' => 'zip', // gzip, zip, txt 
                               'filename' => 'backup_'.date('d_m_Y_H_i_s').'.sql', 
                                                      // File name - NEEDED ONLY WITH ZIP FILES 
                                'add_drop' => TRUE,
                                                     // Whether to add DROP TABLE statements to backup file
                               'add_insert'=> TRUE,
                                                    // Whether to add INSERT data to backup file 
                               'newline' => "\n"
                                                   // Newline character used in backup file 
                              ); 
         // Backup your entire database and assign it to a variable 
         $backup =& $this->dbutil->backup($prefs); 
         // Load the file helper and write the file to your server 
         $this->load->helper('file'); 
         write_file('assets/dbbackupcreate/'.'dbbackup_'.date('d_m_Y_H_i_s').'.zip', $backup); 
         // Load the download helper and send the file to your desktop 
         $this->load->helper('download'); 
         force_download('dbbackup_'.date('d_m_Y_H_i_s').'.zip', $backup);
         log_message('error', 'Database Backup download By Admin');
         $this->OH->log("DB Download By Admin");
    }
    
    public function updateArea()
    {
        $data['country']=$this->AH->getallcountry();
        $data['state']=$this->AH->getallstate();
        $data['city']=$this->AH->getallcity();
         $data['site'] = $this->OH->getsitedata();
		$this->load->view('admin/pages/header', $data);
        $this->load->view('admin/updatearea',$data);
        $this->load->view('admin/pages/footer');
        $this->OH->log("Admin Open Add New Area Page");
        $this->OH->log("Admin Update Area");
        
   
    }
    public function updateAreaStatus()
    {
        $id = $this->input->get('vid');
        $status = $this->input->get('status');
        $table = $this->input->get('table');
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
            'id' => $id
        );
       $this->OH->log("Admin Update Area");
        return $this->db->update($table, $data,$where);
    }
    public function deleteArea()
    {
        $id = $this->input->get('vid');
        $table = $this->input->get('table');
        $data=array(
            'is_deleted'=>'Yes',
            'status' => "UNAPPROVED",
            );
        $where = array(
            'id' => $id
        );
       $this->OH->log("Admin Update Area");
        return $this->db->update($table, $data,$where);
    }
    
    public function mailalluser()
    {
        $this->session->set_userdata('admin_tab', 'mailalluser');
        $this->db->select('*');
        $this->db->from('Mail_history');
		$query = $this->db->get();
		$data['allmail'] = $query->result();
		 $data['site'] = $this->OH->getsitedata();
		$this->load->view('admin/pages/header', $data);
        $this->load->view('admin/bulkMail',$data);
        $this->load->view('admin/pages/footer');
        $this->OH->log("mailalluser");
    }
    public function staffpayment()
    {
        $this->session->set_userdata('admin_tab', 'staffpayment');
        $this->db->select('*');
        $this->db->order_by('id', 'desc');
        //$this->db->where('status', 'APPROVED');
        $this->db->where('is_deleted', 'No');
        $this->db->from('staff');
        $limit = 10;
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$this->db->limit($limit, $page);
		$query = $this->db->get();
		//$query=$this->db->query('select * from wedding_planner where country_id='.$cid .' and state_id='.$sid.' and city_id='.$ciid);
		 $data['allstaff'] = $query->result();
        //die(print_r($query->num_rows()));
		//pagination config start
		$config['base_url'] = base_url() . "admin/staff/";
		//$this->db->where('status', 'APPROVED');
		$this->db->where('is_deleted', 'No');
		$config['total_rows'] = $this->db->count_all_results('staff');
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
		
	   // die(print_r($this->AH->getAllStaffRole()));
		$data['page'] = $this->pagination->create_links();
		 $data['site'] = $this->OH->getsitedata();
		$this->load->view('admin/pages/header', $data);
        $this->load->view('admin/staffpaymant',$data);
        $this->load->view('admin/pages/footer');
        $this->OH->log("Admin Open Staff");
    }
    
    public function faq()
    {
        $this->db->select('*');
        $this->db->where('is_deleted', 'No');
        $this->db->from('faq_master');
		$query = $this->db->get();
		$data['allfaq'] = $query->result();
 
        $this->session->set_userdata('admin_tab', 'faq');
        $data['site'] = $this->OH->getsitedata();
		$this->load->view('admin/pages/header', $data);
        $this->load->view('admin/faq');
        $this->load->view('admin/pages/footer');
        $this->OH->log("Admin Open Vendor List");
    }
    
    public function addfaqByAdmin()
    {
        
        $question=$this->input->post('question');
		$answer=$this->input->post('answer');
		$data = array(
			'status' => 'APPROVED',
			'question' => $question,
			'answer' => $answer,
			'is_deleted' => 'No',
			
		);
	    $this->db->insert('faq_master', $data);
	    redirect(base_url() . "Admin/faq");
    }
    public function deletefaq()
    {
        $id = $this->input->get('id');
        $data['is_deleted'] = 'Yes';
        $data['status'] = 'UNAPPROVED';
        $this->OH->log("Admin Delete FAQ ");
        $this->db->where('id', $id);
       return $this->db->update('faq_master', $data);
    }
    public function updatefaq()
    {
        $id = $this->input->get('id');
        $q = $this->input->get('question');
        $a = $this->input->get('answer');
        $data['question'] = $q;
        $data['answer'] = $a;
        $this->OH->log("Admin update FAQ ");
        $this->db->where('id', $id);
        $this->db->update('faq_master', $data);
    }
    public function updatedetailsfaq()
    {
        $id = $this->input->get('id');
        $q = $this->input->get('q');
        $a = $this->input->get('a');
        $data['question'] = $q;
        $data['answer'] = $a;
        // $data['status'] = $status;
        $this->OH->log("Admin update FAQ ");
        $this->db->where('id', $id);
        $this->db->update('faq_master', $data);
        // die($id." ".$status);
        $this->faq();
    }
    
    public function city()
    {
       // $data['city']=$this->AH->getallcity();
        $where['is_deleted']='No';


        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        $data['city']=$this->OH->getdata('city_master', $where,10,$page);
        
        $this->db->where($where);
        
 		$config['total_rows'] = $this->db->count_all_results('city_master');
		$config['base_url'] = base_url() . "Admin/city/";
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
        //$this->session->set_userdata('update', 'vendorlist');
        $data['site'] = $this->OH->getsitedata();
		$this->load->view('admin/pages/header', $data);
        $this->load->view('admin/city',$data);
        $this->load->view('admin/pages/footer');
        $this->OH->log("Admin Open City master");
    }
    
    public function updateAreaCity()
    {
        $id = $this->input->post('vid');
        $city_name = $this->input->post('city_name');
        $data = array(
            'city_name' => $city_name,
        );
        $where = array(
            'id' => $id
        );
       $this->OH->log("Admin Update Area City");
      $this->db->update('city_master', $data,$where);
        redirect(base_url()."Admin/city");
    }
    
    public function expiredplanreminder()
    {
        $email_id= $this->input->get('email');
        $data['subject']="Regarding your Plan Expire reminder";
	    $data['msg']="Your Plan Expired  on ".base_url()." You need to buy plan to show plan";
	    $mail_message=$this->load->view('mail/otpmail',$data,true);
		$message =$this->OH->sendMail($email_id, $data['subject'], $mail_message);
		$this->session->set_flashdata('Success', 'Reminder Done');
		 redirect(base_url()."Admin/expiredvendorlist");
    }
    public function expiredplanreminderbyadmin()
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
	  $this->session->set_flashdata('Success', 'Reminder all vender successfully');
		 redirect(base_url()."Admin/expiredvendorlist");
	}
	
	public function vendorlistbyfilter()
    {
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
        
        $data['allvendor']=$this->AH->getdata('wedding_planner', $where,$like,10,$page);
        
        $this->db->where($where);

 		$config['total_rows'] = $this->db->count_all_results('wedding_planner');
		$config['base_url'] = base_url() . "Admin/vendorlistbyfilter/";
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
        $this->session->set_userdata('admin_tab', 'vendorlist');
        $data['site'] = $this->OH->getsitedata();
       
		$this->load->view('admin/pages/header', $data);
        $this->load->view('admin/vendorlist');
        $this->load->view('admin/pages/footer');
        $this->OH->log("Admin Open Vendor List");
    }
    public function paidvendorlistbyfilter()
    {
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
        
        $data['allvendor']=$this->AH->getdata('wedding_planner', $where,$like,10,$page);
        // die(print_r($data));
        // $this->db->like($like);
        // $this->db->where($where);
        // $limit = $this->db->count_all_results('wedding_planner');
        
	    // $this->db->limit($limit, $page);
        $this->db->where($where);
       // $this->db->like($like);
 		$config['total_rows'] = $this->db->count_all_results('wedding_planner');
		$config['base_url'] = base_url() . "Admin/paidvendorlistbyfilter/";
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
        $this->session->set_userdata('admin_tab', 'vendorlist');
        $data['site'] = $this->OH->getsitedata();
        $this->db->select('*');
        $this->db->where('is_deleted', 'No');
        $this->db->where('status', 'APPROVED');
        $this->db->from('vendor_membership_plan');
        $query = $this->db->get();
        $data['vplan']= $query->result();
		$this->load->view('admin/pages/header', $data);
        $this->load->view('admin/paidvendor');
        $this->load->view('admin/pages/footer');
        $this->OH->log("Admin Open Vendor List");
    }
    public function vendorquerybyfilter()
    {
        $like=array();
        $keyword=$this->input->post('keyword');
        $country_id=$this->input->post('country_id');
        $state_id=$this->input->post('state_id');
        $city_id=$this->input->post('city_id');
        $category_id=$this->input->post('category_id');
        $fromdate=$this->input->post('fromdate');
        $todate=$this->input->post('todate');
        $status=$this->input->post('status');
        $where['venorenquiry.status']=$status;
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
		
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        $data['vquery']=$this->AH->getquerydata('wedding_planner', $where,$like,10,$page);
    //   var_dump($this->db->last_query());
    //   die();
        //  die(print_r($this->AH->getquerydatacount('wedding_planner',$where,$like)));
        
        $this->db->where($where);
        $this->db->like($like);
 		$config['total_rows'] = count($this->AH->getquerydatacount('wedding_planner',$where,$like));
		$config['base_url'] = base_url() . "Admin/vendorquerybyfilter/";
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
        $this->session->set_userdata('admin_tab', 'vendorquery');
        $data['site'] = $this->OH->getsitedata();
       
		$this->load->view('admin/pages/header', $data);
        $this->load->view('admin/vendorquery');
        $this->load->view('admin/pages/footer');
        $this->OH->log("Admin Open Vendor List");
    }
    
    public function custommail()
    {
        $subject = $this->input->post('subject');
        $body= $this->input->post('body');
        $this->session->set_userdata('admin_tab', 'custommail');
        $this->form_validation->set_rules('subject', 'subject', 'required|min_length[5]');
        $this->form_validation->set_rules('body', 'Message', 'required|min_length[5]');
        
        if ($this->form_validation->run() == FALSE)
        {
            $data['allmail']=array();
            $data['country']=$this->AH->getallcountry();
            $data['site'] = $this->OH->getsitedata();
            $this->db->select('*');
            $this->db->from('Mail_history');
    		$query = $this->db->get();
    		$data['allmail'] = $query->result();
		    $this->load->view('admin/pages/header', $data);
            $this->load->view('admin/custommail');
            $this->load->view('admin/pages/footer');
        }
        else
        {
            $data['subject']=$subject;
		    $data['msg']=$body;
		    $mail_message=$this->load->view('mail/otpmail',$data,true);
		    $config['upload_path'] = './assets/mailattach/';
    		$config['allowed_types'] = 'gif|jpg|png';
    		$config['file_name'] = random_string('alnum', 8);

		    $this->load->library('upload', $config);


    		if (!$this->upload->do_upload('userfile')) 
    		{
    			$data['e1']= array('error' => $this->upload->display_errors());
    			$this->session->set_flashdata('message_name', $data['e1']);
    			redirect(base_url().'Admin/custommail');
    		}
    		else
    		{
    			$file = $this->upload->data();
    			$data = array('image_metadata' => $this->upload->data());
    			$this->session->set_flashdata('message_name', 'Image Update Successfully');
    			
    			$country_id=$this->input->post('country_id');
                $state_id=$this->input->post('state_id');
                $city_id=$this->input->post('city_id');
                $category_id=$this->input->post('category_id');
                $where['status']='APPROVED';
                $where['is_deleted']='No';
                if($country_id!=0)
                {
                    $where['country_id']=$country_id;
                }
                if($state_id!=0)
                {
                    $where['state_id']=$state_id;
                }
                if($city_id!=0)
                {
                    $where['city_id']=$city_id;
                }
                if($category_id!=0)
                {
                    $where['category_id']=$category_id;
                }
    			$this->db->select('*');
                $this->db->where($where);
                $this->db->from('wedding_planner');
                $query = $this->db->get();
                $vendors = $query->result();
                foreach($vendors as $data)
                {
    			    $message =$this->AH->sendMail($data->email, $subject, $mail_message,base_url()."assets/mailattach/".$file['file_name']);
                }
    			$this->session->set_flashdata('message_name','Email Send ');
    			
    			$data1 = array(
	            'email'=>$subject,
	            'email_subject'=>$subject,
	            'email_content'=>$body,
    			'attach' => $file['file_name'],
    			'is_deleted' => 'No',
    			'createon' => date("Y-m-d h:i:s"),
    		    );
    	    	$this->db->insert('send_bulk_email', $data1);
    	    	die();
    			redirect(base_url().'Admin/custommail');
    		}
        }
    }
    
    public function mailallcustomer()
    {
        $this->session->set_userdata('admin_tab', 'mailallcustomer');
        $this->db->select('*');
        $this->db->from('Mail_history');
		$query = $this->db->get();
		$data['allmail'] = $query->result();
		 $data['site'] = $this->OH->getsitedata();
		$this->load->view('admin/pages/header', $data);
        $this->load->view('admin/mailtocustomer',$data);
        $this->load->view('admin/pages/footer');
        $this->OH->log("mailalluser");
    }
    public function cutomerlist()
    {
        $where=array();
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        $data['allcutomer']=$this->OH->getdata('users', $where,10,$page);
        
        $this->db->where($where);
        
 		$config['total_rows'] = $this->db->count_all_results('users');
		$config['base_url'] = base_url() . "Admin/cutomerlist/";
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
        $this->session->set_userdata('admin_tab', 'cutomerlist');
        $data['site'] = $this->OH->getsitedata();
		$this->load->view('admin/pages/header', $data);
        $this->load->view('admin/cutomerlist',$data);
        $this->load->view('admin/pages/footer');
        $this->OH->log("Admin Open cutomer List");
    }
    public function updatecutomer()
    {
        $vid=$this->input->get('vid');
        $status=$this->input->get('status');
         
         
        $table="users";
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
        $this->db->update($table, $data,$where);
        $this->OH->log("Admin Update Vendor");
        // $data['allvendor']=$this->OH->getallvendor();
        // $data['site'] = $this->OH->getsitedata();
        // //die(print_r($data['site']));
        // $this->load->view('admin/vendorlist',$data);
        // $this->load->view('admin/pages/footer');
    }
    public function vendorquerybyid()
    {
        $like=array();
        $vendorqueryid=$this->input->get('id');
        if($vendorqueryid)
        {
            $where['venorenquiry.vendor_id']=$vendorqueryid;
            $this->session->set_userdata('vendorqueryid', $vendorqueryid);
        }
        else if($this->session->vendorqueryid)
        {
             $where['venorenquiry.vendor_id']=$this->session->vendorqueryid;
        }
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        $data['vquery']=$this->AH->getquerydata('venorenquiry', $where,$like,10,$page);
       
        $this->db->where($where);
        $this->db->like($like);
 		$config['total_rows'] = count($this->AH->getquerydatacount('venorenquiry',$where,$like));
		$config['base_url'] = base_url() . "Admin/vendorquerybyid/";
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
        $this->session->set_userdata('admin_tab', 'vendorquery');
        $data['site'] = $this->OH->getsitedata();
       
		$this->load->view('admin/pages/header', $data);
        $this->load->view('admin/vendorquery');
        $this->load->view('admin/pages/footer');
        $this->OH->log("Admin Open Vendor List");
    }
    public function staffcash()
    {
        $where['status']='APPROVED';
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        $data['staff']=$this->OH->getdata('staff', $where,10,$page);
        
        $this->db->where($where);
        
 		$config['total_rows'] = $this->db->count_all_results('staff');
		$config['base_url'] = base_url() . "Admin/staffcash/";
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
        $this->session->set_userdata('admin_tab', 'staffcash');
        
        $data['site'] = $this->OH->getsitedata();
		$this->load->view('admin/pages/header', $data);
        $this->load->view('admin/staffcash',$data);
        $this->load->view('admin/pages/footer');
        $this->OH->log("Admin Open cutomer List");
    }
    public function staffcashdashboard()
    {
        $staffid=$this->input->get('id');
        $where['staff_id']=$staffid;
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        $data['cashtoadmin']=$this->OH->getdata('staff_fund_to_admin', $where,10,$page);
        
        $this->db->where($where);
        
 		$config['total_rows'] = $this->db->count_all_results('staff_fund_to_admin');
		$config['base_url'] = base_url() . "Admin/staffcashdashboard/";
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
        $this->session->set_userdata('admin_tab', 'staffcashdashboard');
        $data['staffid']=$staffid;
        $data['site'] = $this->OH->getsitedata();
		$this->load->view('admin/pages/header', $data);
        $this->load->view('admin/staffcashdashboard');
        $this->load->view('admin/pages/footer');
        $this->OH->log("Admin Open cutomer List");
    }
    public function acceptstaffcash()
    {
        $staffid=$this->input->get('staffid');
        $cashid=$this->input->get('cashid');
        $data1['status'] = 'APPROVED';
        $data1['response_time'] =  date("Y-m-d h:i:s");
        $this->db->where('id', $cashid);
        if($cashid)
        $this->db->update('staff_fund_to_admin', $data1);
        redirect(base_url() . "Admin/staffcashdashboard?id=$staffid");
    }
    public function stafflogshow()
    {
        // $staffid=$this->input->get('id');
         $staffid=$this->uri->segment(3);
        $where['staff_id']=$staffid;
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        
        $data['stafflog']=$this->OH->getdata('staff_log', $where,10,$page);
        
        $this->db->where($where);
        
 		$config['total_rows'] = $this->db->count_all_results('staff_log');
		$config['base_url'] = base_url() . "Admin/stafflogshow/$staffid/";
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
        $this->session->set_userdata('admin_tab', 'stafflogshow');
        $data['staffid']=$staffid;
        $data['site'] = $this->OH->getsitedata();
		$this->load->view('admin/pages/header', $data);
        $this->load->view('admin/stafflogshow');
        $this->load->view('admin/pages/footer');
        $this->OH->log("Admin Open Staff Log Staff ID:$staffid ");
    }
    public function vendorchart()
    {
        $this->session->set_userdata('admin_tab', 'vendorchart');
        $this->db->select('COUNT(id) as count');
        $this->db->order_by('created_on');
        $this->db->group_by('day(created_on)');
        $this->db->from('wedding_planner');
		$query = $this->db->get();
		$data['chartdata'] = $query->result();
		//die(print_r($data['chartdata']));
		$data['site'] = $this->OH->getsitedata();
			$data['chartdata']=json_encode(array_column($query->result(), 'count'),JSON_NUMERIC_CHECK);
		$this->load->view('admin/pages/header', $data);
        $this->load->view('admin/vendorchart',$data);
        $this->load->view('admin/pages/footer');
       // $this->OH->log("mailalluser");
    }
    
    public function vendorimageupload()
	{
	    $fildname = $this->input->post('image');
	    $vid = $this->input->post('vid');
		$config['upload_path'] = './'.IMAGELINK;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 2000;
		$config['max_width'] = 1500;
		$config['max_height'] = 1500;
		$config['file_name'] = random_string('alnum', 8);

		$this->load->library('upload', $config);


		if (!$this->upload->do_upload($fildname)) {
			$data['e1']= array('error' => $this->upload->display_errors());
		} else {
			$file = $this->upload->data();
			$this->AH->photoupdate($vid,$fildname, $file['file_name']);
			$data = array('image_metadata' => $this->upload->data());
		}
// 		die(print_r($data));
		header('Location:'.base_url()."Admin/updatevendorbyid?id=$vid");
	}
	
	public function paystaffbyid()
	{
	    $sid = $this->input->get('sid');
	    $amount = $this->input->get('amouth');
	    $data = array(
            'StaffID' => $sid,
            'amouth' => $amount,
        );
        $this->db->insert('staff_paymant', $data);
        $q=$this->db->query("UPDATE `staff` SET `collect_amount`=`collect_amount`-$amount,`Transfer_to_admin`=`Transfer_to_admin`+$amount WHERE id=$sid");
        
	}
	
	public function showallpayments()
    {
        $where['status']="APPROVED";
        $where['is_deleted']="No";
        // $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        $data['allPayments']=$this->OH->getdataall('vendor_payments', $where);
        
        $this->session->set_userdata('admin_tab', 'showallpayments');
        $data['site'] = $this->OH->getsitedata();
		$this->load->view('admin/pages/header', $data);
        $this->load->view('admin/showallpayment',$data);
        $this->load->view('admin/pages/footer');
        $this->OH->log("Admin Open cutomer List");
    }
}
