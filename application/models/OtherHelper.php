<?php
defined('BASEPATH') or exit('No direct script access allowed');
class OtherHelper extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('email');
        
    }
    public function sendMail($to, $subject, $message, $attach = null)
    {
      
        // $this->load->library('phpmailer_lib');
        // // PHPMailer object
        // $mail = $this->phpmailer_lib->load();
        
        require_once APPPATH.'third_party/PHPMailer/src/Exception.php';
        require_once(APPPATH.'third_party/PHPMailer/src/PHPMailer.php');
        require_once(APPPATH.'third_party/PHPMailer/src/SMTP.php');


    $mail = new PHPMailer\PHPMailer\PHPMailer();
    // $mail->IsSMTP(); 

        
        $mail->isSMTP();
        $mail->Host     = 'smtp.hostinger.com';
        $mail->SMTPAuth = true;
        $mail->Username = MAIL_ID;
        $mail->Password = MAIL_PASSWORD;
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
        
        $mail->setFrom('info@vendordiary.com', 'Vendor Diary');
        //$mail->addReplyTo("info@vendordiary.com", 'CodexWorld');

        // Add a recipient
        $mail->addAddress($to);

        // Add cc or bcc 
        // $mail->addCC('nimeshdevani99@gmail.com');
        // $mail->addBCC('nimeshdevani99@gmail.com');

        // Email subject
        $mail->Subject = $subject;

        // Set email format to HTML
        $mail->isHTML(true);

        // Email body content
        $mailContent =$message;
        $mail->Body = $mailContent;
        
       // die(print_r($mail->send()));
        // Send email
        $this->log($to);
        if(!$mail->send()){
          //  echo 'Message could not be sent.';
         // die(print_r($mail->ErrorInfo));
            return 'Mailer Error: ' . $mail->ErrorInfo;
        }else{
           // echo $to;
           //die("Message send");
            return 'Message has been sent';
        }
        //$mail->SMTPDebug  = 1;

    }
    public function checkemail($vemail)
    {
        $query = $this->db->query('SELECT * FROM wedding_planner where email="' . $vemail . '"');
        $data= $query->result();
        return $data;
    }
    public function checkemailuser($vemail)
    {
        $query = $this->db->query('SELECT * FROM users where email="' . $vemail . '"');
        $data= $query->result();
        return $data;
    }
    public function checkotp($otp, $vemail = 0, $vid = 0)
    {
        if ($vid == 0) {
            $query = $this->db->query('SELECT otp FROM wedding_planner where email="' . $vemail . '"');
            $data = $query->result();
            if ($otp == $data[0]->otp) {
                return true;
            } else {
                return false;
            }
        }
        if ($vemail == 0) {
            $query = $this->db->query('SELECT otp FROM wedding_planner where id=' . $vid);
            $data = $query->result();
            //die(print_r($data));
        }
    }
    public function insertotp($otp, $vemail)
    {
        $query = $this->db->query('UPDATE `wedding_planner` SET `otp`="' . $otp . '" WHERE email="' . $vemail . '"and  status="APPROVED" and is_deleted="No"');
        return $query;
    }

    public function getsitedata()
    {
        $query = $this->db->query('SELECT * FROM site_config');
        $data['site'] = $query->result();
        return $data['site'][0];
    }

    public function getquery($vid, $from = 0, $to = 0)
    {
        if ($to == 0 and $from == 0) {
            $query = $this->db->query('SELECT * FROM venorenquiry where vendor_id="' . $vid . '" and lead_show="Yes"');
            $data = $query->result();
            //die(print_r($data));
            return $data;
        } else {
            $query = $this->db->query('SELECT * FROM venorenquiry where lead_show="Yes" and vendor_id="' . $vid . '" and qdate>=' . $from . ' and qdate<="' . $to . '"');
            //SELECT * FROM venorenquiry where vendor_id="64" and `qdate`>='2021-04-01' and `qdate`<='2021-04-06'
            $data = $query->result();
            return $data;
        }
    }
    
    public function getquerybystatus($vid, $status,$from = 0, $to = 0)
    {
        if ($to == 0 and $from == 0) {
            $query = $this->db->query("SELECT * FROM venorenquiry where vendor_id='$vid' and status='$status' and lead_show='Yes'");
            $data = $query->result();
            //die(print_r($data));
            return $data;
        } else {
            $query = $this->db->query("SELECT * FROM venorenquiry where vendor_id='$vid' and qdate>= '$from' and qdate<='$to' and  status='$status' and lead_show='Yes'");
            //SELECT * FROM venorenquiry where vendor_id="64" and `qdate`>='2021-04-01' and `qdate`<='2021-04-06'
            $data = $query->result();
            return $data;
        }
    }
    public function getquerycustomer($vid, $from = 0, $to = 0)
    {
        
        if ($to == 0 and $from == 0) {
            $query = $this->db->query('SELECT * FROM venorenquiry where email="' . $vid . '"');
            $data = $query->result();
            //die(print_r($data));
            return $data;
        } else {
            $query = $this->db->query('SELECT * FROM venorenquiry where email="' . $vid . '" and qdate>=' . $from . ' and qdate<="' . $to . '"');
            //SELECT * FROM venorenquiry where vendor_id="64" and `qdate`>='2021-04-01' and `qdate`<='2021-04-06'
            $data = $query->result();
            return $data;
        }
    }
    public function googlequery($ceid, $from = 0, $to = 0)
    {
        if ($to == 0 and $from == 0) {
            // $query = $this->db->query('SELECT * FROM venorenquiry where email="' . $ceid . '"');
            $query = $this->db->query('SELECT * FROM `venorenquiry` as v INNER JOIN wedding_planner as w on w.id=v.vendor_id WHERE v.email="' . $ceid . '"');
            $data = $query->result();
            //die($to.$from);
            return $data;
        } else {
            //die("$to");
            $query = $this->db->query('SELECT * FROM venorenquiry as v INNER JOIN wedding_planner as w on w.id=v.vendor_id   where v.email="' . $ceid . '" AND v.qdate BETWEEN   "' . $from . '" AND "' . $to . '"');
            //SELECT * FROM venorenquiry where vendor_id="64" and `qdate`>='2021-04-01' and `qdate`<='2021-04-06'
            $data = $query->result();
            return $data;
        }
    }




    public function getvendor($vid)
    {
        $query = $this->db->query('SELECT * FROM wedding_planner where id="' . $vid . '"');
        $data = $query->result();
        return $data[0];
    }
    
    public function getallvendor()
    {   $this->db->select('*');
        $this->db->order_by('id', 'desc');
        $this->db->where('is_deleted', 'No');
        $this->db->from('wedding_planner');
        $this->db->limit(10);
        $query = $this->db->get();
        return $query->result();
    }
    public function getvendorbyemail($vemail)
    {
        $query = $this->db->query('SELECT * FROM wedding_planner where email="' . $vemail . '"');
        $data = $query->result();
        return $data[0];
    }

    public function updatequrie($qid,$msg="N/A")
    {
        $table="venorenquiry";
        $data = array(
            'status' => "OLD",
            'response' => $msg
        );
        $where = array(
            'id' => $qid
        );
        return $this->db->update($table, $data,$where);
    }

    public function updateprofile($data)
    {
        $table="wedding_planner";
        $where = array(
            'id' => $this->session->vid
        );
        return $this->db->update($table, $data,$where);
    }
    public function photoupdate($colun,$filename)
    {
        
        $q=$this->db->query('SELECT * FROM wedding_planner where id="' . $this->session->vid . '"');;
        $data=$q->result();
        if(file_exists(IMAGELINK . $data[0]->$colun))
        {
            unlink("./".IMAGELINK.$data[0]->$colun);
        }
         
        $table="wedding_planner";
        $data = array(
            $colun=>$filename,
        );
        $where = array(
            'id' => $this->session->vid
        );
        return $this->db->update($table, $data,$where);
    }
    
    public function getallcountry()
    {
        $query = $this->db->get('country_master');
        $data = $query->result();
        return $data;
    }
    
    public function getallstate()
    {
        $query = $this->db->get('state_master');
        $data = $query->result();
        return $data;
    }
    
    public function getallcity()
    {
        $query = $this->db->get('city_master');
        $data = $query->result();
        return $data;
    }
    
    public function getallvendorcategory()
    {
        $this->db->select('*');
		$this->db->where('is_deleted', 'No');
	    $this->db->from('vendor_category');
	    $query = $this->db->get();
        $data = $query->result();
        return $data;
    }
    
    public function getcatnamebyid($id)
    {
        $this->db->select('*');
		$this->db->where('id', $id);
		$this->db->from('vendor_category');
		$query = $this->db->get();
        $data = $query->result();
        if(count($data)>=1)
        {
            return $data[0]->category_name;
        }
        else
        {
            return "N/A";
        }
        
    }
    public function getidbycatname($name)
    {
        $this->db->select('*');
		$this->db->where('category_name', $name);
		$this->db->from('vendor_category');
		$query = $this->db->get();
        $data = $query->result();
        if(count($data)>=1)
        {
            return $data[0]->id;
        }
        else
        {
            return "N/A";
        }
        
    }
    
    public function get_client_ip()
    {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
          $ipaddress = 'UNKNOWN';

      return $ipaddress;
    }
    
    public function getallvendors()
    {   $this->db->select('*');
        $this->db->where('is_deleted', 'No');
        $this->db->from('wedding_planner');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function gettodayvendorscount()
    {   
        $c=0;
        foreach($this->OH->getallvendors() as $data)
        {
            if(date("Y-m-d")==$data->created_on)
            {
                $c++;
            }
        }    
        return  $c; 
    }
    
    public function getlastweekvendorscount()
    {   
        $c=0;
        $stop_date = new DateTime(date("Y-m-d H:i:s"));
        $stop_date->modify('-7 day');
        foreach($this->OH->getallvendors() as $data)
        {
            if($stop_date->format('Y-m-d H:i:s')<$data->created_on)
            {
                $c++;
            }
        }    
        return  $c; 
    }
    public function getLastMonthVendorsCount()
    {   
        $c=0;
        $stop_date = new DateTime(date("Y-m-d H:i:s"));
        $stop_date->modify('first day of this month');
        foreach($this->OH->getallvendors() as $data)
        {
            if($stop_date->format('Y-m-d H:i:s')<$data->created_on)
            {
                $c++;
            }
        }    
        return $c; 
    }
    
    public function planchekout($vid=64,$planid=1,$status="True",$tid="0000",$note="N/A")
    {
        //get plan details
        $this->db->select('*');
        $this->db->from('vendor_membership_plan');
        $this->db->where('id',$planid);
		$query = $this->db->get();
		$plandata=$query->result();
		$plandata=$plandata[0];
		
		//get vendor detials
		$this->db->select('*');
        $this->db->from('wedding_planner');
        $this->db->where('id',$vid);
		$query = $this->db->get();
		$vdata=$query->result();
		$vdata=$vdata[0];
		$site = $this->OH->getsitedata();
		
		 $original = ($plandata->plan_amount*(100/(100+ $site->gst)));
		 $gst = $plandata->plan_amount-$original;
		
        if($status=="Flase")
        {
            $data = array(
            'ad_id' => $vid,
            'email' => $vdata->email,
            'plan_id' => $plandata->id,
            'plan_type' => $plandata->plan_type,
            'payment_mode' => "Online",
            'plan_name' => $plandata->rates_name,
            'plan_activated' => date("Y-m-d"),
            'plan_expired' => Date("Y-m-d", strtotime('+'.$plandata->plan_duration.' days')),
            'plan_duration' => $plandata->plan_duration,
            'top_featured_in_pages' => 0,
            'lead' => $plandata->lead,
            'currency' => $plandata->plan_amount_type,
            'transaction_id' => $tid,
            'current_plan' => "No",
            'discount_detail' => "0",
            'discount_amount' => "0",
            'tax_name' => "GST",
            'tax_percentage' => $site->gst,
            'tax_amount' => $gst,
            'grand_total' => $plandata->plan_amount,
            'payment_note' => $note,
            'status' => 'UNAPPROVED',
            'is_deleted' => 'No'
            );
            return $this->db->insert('vendor_payments', $data);
        }
        else if($status=="True")
        {
             $data = array(
            'ad_id' => $vid,
            'email' => $vdata->email,
            'plan_id' => $plandata->id,
            'plan_type' => $plandata->plan_type,
            'payment_mode' => "Online",
            'plan_name' => $plandata->rates_name,
            'plan_activated' => date("Y-m-d"),
            'plan_expired' => Date("Y-m-d", strtotime('+'.$plandata->plan_duration.' days')),
            'plan_duration' => $plandata->plan_duration,
            'top_featured_in_pages' => 0,
            'lead' => $plandata->lead,
            'currency' => $plandata->plan_amount_type,
            'transaction_id' => $tid,
            'current_plan' => "Yes",
            'discount_detail' => "0",
            'discount_amount' => "0",
            'tax_name' => "GST",
            'tax_percentage' => $site->gst,
            'tax_amount' => $gst,
            'grand_total' => $plandata->plan_amount,
            'payment_note' => $note,
            'status' => 'APPROVED',
            'is_deleted' => 'No'
            );
            $result= $this->db->insert('vendor_payments', $data);
            if($result)
            {
                $pd['vname']=$vdata->planner_name;
                $pd['plan_name']=$plandata->rates_name;
                $pd['amount']=$plandata->plan_amount;
                $pd['tdate']=date("d-m-Y h:i:s A");
                $pd['tnote']=$note;
                $pd['tid']=$tid;
                $pd['plan_expired']=Date("d-m-Y", strtotime('+'.$plandata->plan_duration.' days'));
                $pd['Subject']="Your payment was successful";
                
                
                $data = array(
                    'plan_status' => 'Paid',
                    'plan_name' => $plandata->rates_name,
                    'plan_id' => $plandata->id,
                    'plan_expired_on' => Date("Y-m-d", strtotime('+'.$plandata->plan_duration.' days')),
                );
                $where = array(
                    'id' => $vid
                );
                
                $mail_message=$this->load->view('mail/planupgrade',$pd,true);
                $this->sendMail($vdata->email, $pd['Subject'],$mail_message);
                $edata['lead_show']="Yes";
                $ewhere['vendor_id']=$vid;
                $this->db->update('venorenquiry', $edata,$ewhere);
                return $this->db->update('wedding_planner', $data,$where);
            }
            else
            {
                return 0;
            }
        }
    }
    
    public function getdata($table,$where,$limit=10, $page=10)
     {
         $this->db->where($where);
         $this->db->limit($limit, $page);
         $this->db->from($table);
        //  $this->db->order_by("`plan_status` ='Paid'", "DESC");
         $r = $this->db->get();
         return $r->result();
     }
    public function getdataall($table,$where)
     {
         $this->db->where($where);
         $this->db->from($table);
         $r = $this->db->get();
         return $r->result();
     }
    public function getvendordata($table,$where,$limit=10, $page=10)
     {
         $this->db->where($where);
        /* if(defined($where['category_id']))
         {
            $this->db->or_where('cat_2',$where['category_id']);
         }*/
         $this->db->limit($limit, $page);
         $this->db->from($table);
         $this->db->order_by("`plan_status` ='Paid'", "DESC");
         $r = $this->db->get();
         return $r->result();
     }
     
     public function pagelink($table,$where,$url="",$prpage=5)
     {
        $this->db->where($where);
        // die(print_r($this->db->count_all_results($table)));
        $settings = $this->config->item('pagination');
        
        $settings['total_rows']=$this->db->count_all_results($table);
        
        $settings['base_url'] = base_url() . $url;
		$settings['per_page'] = $prpage;
		
		// Pagination link format 
		$settings['num_tag_open'] = '<li class="page-item page-link" >';
		$settings['num_tag_close'] = '</li>';
		$settings['cur_tag_open'] = '<li class="active"><a  class="page-link" href="javascript:void(0);">';
		$settings['cur_tag_close'] = '</a></li>';
		$settings['next_link'] = 'Next';
		$settings['prev_link'] = 'Prev';
		$settings['next_tag_open'] = '<li class="pg-next page-link">';
		$settings['next_tag_close'] = '</li>';
		$settings['prev_tag_open'] = '<li class="pg-prev page-link">';
		$settings['prev_tag_close'] = '</li>';
		$settings['first_tag_open'] = '<li class=" page-link">';
		$settings['first_tag_close'] = '</li>';
		$settings['last_tag_open'] = '<li class=" page-link">';
		$settings['last_tag_close'] = '</li>';
		//pagination initialize
		$this->pagination->initialize($settings);
		// die(print_r($this->pagination->initialize($settings)));
		//create links
		return $this->pagination->create_links();
		// die($this->pagination->create_links());
        
     }
     
     public function getdatagoogleuser($email)
     {
         $this->db->where('email',$email);
         $this->db->from('users');
         $r = $this->db->get();
         return $r->result();
     }
     
    
    public function registrationByGoogle($given_name,$last_name,$email,$picture)
	{
			$data = array(
    			'status' => 'APPROVED',
    			'oauth_provider' => 'By Google',
    			'oauth_uid' => '',
    			'first_name' => $given_name,
    			'last_name' => $last_name,
    			'email' => $email,
    			'gender' => "",
    			'locale' =>$this->input->ip_address(),
    			'picture' => $picture,
    			'link' => "By Google login",
    			'created' => date("Y-m-d H:i:s"),
    			'modified' => date("Y-m-d H:i:s"),
    		);
    	return	$this->db->insert('users', $data);
	}
	
	public function googlelead($vendor_id,$name,$email,$phone="",$leadshow="Yes")
	{
	    $data = array(
    			'vendor_id' => $vendor_id,
    			'Name' => $name,
    			'email' => $email,
    			'Phone' => $phone,
    			'status' => 'NEW',
    			'Comment' => 'By Google lead',
    			'qdate' => date("Y-m-d"),
    			'lead_show'=>$leadshow,
    		);
    		return	$this->db->insert('venorenquiry', $data);
	}
	
	public function log($msg="N/A")
	{
	    $data = array(
	            'message'=>$msg,
    			'ip' => $this->input->ip_address(),
    			'createon' => date("Y-m-d h:i:s"),
    		);
    	return	$this->db->insert('log', $data);
	}
	public function userlog($id,$email)
	{
	    $data = array(
	            'matri_id'=>$id,
	            'email'=>$email,
    			'ip_address' => $this->input->ip_address(),
    // 			'login_at' => date("Y-m-d h:i:s"),
    		);
    	return	$this->db->insert('user_login_history', $data);
	}
	public function maillog($subject,$msg,$status)
	{
	    $data = array(
	            'message'=>$msg,
    			'subject' => $subject,
    			'status' => $status,
    			'sendDate' => date("Y-m-d h:i:s"),
    		);
    	return	$this->db->insert('Mail_history', $data);
	}
	
	public function getimagelink()
	{
	    $this->session->googleemail;
	    $this->db->select('*');
        $this->db->where('email', $this->session->googleemail);
        $this->db->from('users');
        $query = $this->db->get();
        $r= $query->result();
        return $r[0]->picture;
	}
	
	public function passwordcheck($pwd)
    {
        $this->db->select('*');
        $this->db->where('password', $pwd);
        $this->db->where('email', $this->session->vemail);
		$this->db->from('wedding_planner');
		$query = $this->db->get();
        $result=$query->result();
        return $result;
    }
    
     public function updatepassword($new)
    {
        $data1['password']=$new;
        $this->db->where('email', $this->session->vemail);
        $this->db->update('wedding_planner', $data1);
    }
    
	public function passwordcheckuser($pwd)
    {
        $this->db->select('*');
        $this->db->where('password', $pwd);
        $this->db->where('email', $this->session->googleemail);
		$this->db->from('users');
		$query = $this->db->get();
        $result=$query->result();
        return $result;
        
    }
    
     public function updatepassworduser($new)
    {
        $data1['password']=$new;
        $this->db->where('email', $this->session->googleemail);
        $this->db->update('users', $data1);
    }
    
    public function genrallead($vendor_id,$name,$email,$comment="Lead by search base",$phone="")
	{
	    $data = array(
    			'vendor_id' => $vendor_id,
    			'Name' => $name,
    			'email' => $email,
    			'Phone' => $phone,
    			'status' => 'NEW',
    			'Comment' => $comment,
    			'qdate' => date("Y-m-d"),
    		);
    		return	$this->db->insert('venorenquiry', $data);
	}
	public function getvendorreview($vid)
	{
	    $this->db->select('*');
        $this->db->where('is_deleted', 'No');
        $this->db->where('status', 'APPROVED');
        $this->db->where('vendor_id', $vid);
        $this->db->from('vendor_reviews');
		$query = $this->db->get();
		$data['vreviews']=$query->result();
		return count($data['vreviews']);
	}
	public function getvendorqurey($cemail)
	{
	    $this->db->select('*');
        $this->db->where('email', $cemail);
        $this->db->from('venorenquiry');
		$query = $this->db->get();
		$data['venorenquiry']=$query->result();
		return count($data['venorenquiry']);
	}
	
	public function getallcustomers()
    {   $this->db->select('*');
        $this->db->where('status', 'APPROVED');
        $this->db->from('users');
        $query = $this->db->get();
        return $query->result();
    }
    
	public function gettodaycustomerscount()
    {   
        $c=0;
        foreach($this->OH->getallcustomers() as $data)
        {
            if(date("Y-m-d")==$data->created)
            {
                $c++;
            }
        }    
        return  $c; 
    }
    public function getlastweekcustomerscount()
    {   
        $c=0;
        $stop_date = new DateTime(date("Y-m-d H:i:s"));
        $stop_date->modify('-7 day');
        foreach($this->OH->getallcustomers() as $data)
        {
            if($stop_date->format('Y-m-d H:i:s')<$data->created)
            {
                $c++;
            }
        }    
        return  $c; 
    }
    public function getLastMonthcustomersCount()
    {   
        $c=0;
        $stop_date = new DateTime(date("Y-m-d H:i:s"));
        $stop_date->modify('first day of this month');
        foreach($this->OH->getallcustomers() as $data)
        {
            if($stop_date->format('Y-m-d H:i:s')<$data->created)
            {
                $c++;
            }
        }    
        return $c; 
    }
    public function passwordreset($table,$col,$token,$email)
    {
        $data[$col]=$token;
        $this->db->where('email', $email);
        $this->db->update($table, $data);
    }
    
    public function addvendorview($vendor_id,$source,$user_id="null")
	{
	    if($this->session->googleID)
	    {
	        $user_id=$this->session->googleID;
	    }
	    $data = array(
    			'v_id' => $vendor_id,
    			'u_id' => $user_id,
    			'source' => $source,
    			'ip_address' => $this->input->ip_address(),
    		);
    		return	$this->db->insert('vendor_view', $data);
	}
    
}
