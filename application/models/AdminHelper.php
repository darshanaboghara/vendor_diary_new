<?php
defined('BASEPATH') or exit('No direct script access allowed');
class AdminHelper extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    public function getallquery()
    {
        $this->db->order_by('qdate', 'DESC');
        $query = $this->db->get('venorenquiry');
        $data = $query->result();
        //die(print_r($data));
        return $data;
    }
    
    public function getallcountry()
    {
        $this->db->where('is_deleted', 'No');
        $query = $this->db->get('country_master');
        $data = $query->result();
        return $data;
    }
    
    public function getallstate()
    {
        $this->db->where('is_deleted', 'No');
        $query = $this->db->get('state_master');
        $data = $query->result();
        return $data;
    }
    
    public function getallcity()
    {
        $this->db->where('is_deleted', 'No');
        $query = $this->db->get('city_master');
        $data = $query->result();
        return $data;
    }
    
    
    public function getallcustomer_comment()
    {
        $query = $this->db->get('customer_comment');
        $data = $query->result();
        return $data;
    }
    
    public function getrolenamebyid($id)
    {
        $this->db->select('*');
		$this->db->where('id', $id);
		$this->db->from('staff_role');
		$query = $this->db->get();
        $data = $query->result();
        if(count($data)>=1)
        {
            return $data[0]->role_name;
        }
        else
        {
            return "N/A";
        }
        
    }
    public function getAllStaffRole()
    {
        $this->db->select('*');
		$this->db->where('status', 'APPROVED');
		$this->db->where('is_deleted', 'No');
		$this->db->from('staff_role');
		$query = $this->db->get();
        $data=$query->result();
        return $data;
    }
    
    public function getVendorById($id)
    {
        $this->db->select('*');
        $this->db->where('is_deleted', 'No');
        $this->db->where('id', $id);
		$this->db->from('wedding_planner');
		$query = $this->db->get();
        $result=$query->result();
        if(count($result)==0)
        {
            $data['Message']="Access Deny";
		    redirect('error404',$data);
        }
        return $result[0];
    }
    
    
    public function photoUpdateByAdmin($colun,$filename)
    {
        
        $q=$this->db->query('SELECT * FROM site_config where id=1');;
        $data=$q->result();
        // die($data[0]->$colun);
        if(file_exists('assets/images/' . $data[0]->$colun))
        {
            unlink("./assets/images/".$data[0]->$colun);
        }
         
        $table="site_config";
        $data = array(
            $colun=>$filename,
        );
        $where = array(
            'id' => 1,
        );
        return $this->db->update($table, $data,$where);
    }
    
    public function adminlogin($id,$pwd)
    {
         $this->db->select('*');
        $this->db->where('email', $id);
        $this->db->where('password', $pwd);
		$this->db->from('admin_user');
		$query = $this->db->get();
        $result=$query->result();
        return $result;
    }
    
    public function passwordcheck($pwd)
    {
        $this->db->select('*');
        $this->db->where('password', $pwd);
		$this->db->from('admin_user');
		$query = $this->db->get();
        $result=$query->result();
        return $result;
    }
    
    public function updatepassword($new)
    {
        $data1['password']=$new;
        $data1['c_password']=$new;
        $this->db->where('id', 1);
        $this->db->update('admin_user', $data1);
    }
    public function getdata($table,$where,$like,$limit=10, $page=10)
    {
        $this->db->from($table);
        $this->db->where($where);
        $this->db->like($like);
        $this->db->limit($limit, $page);
        $r = $this->db->get();
         //$arr = get_defined_vars();
        
        return $r->result();
        // return $r->result();
        // print_r($arr);
        // die();
     }
    public function getquerydata($table,$where,$like,$limit=10, $page=10)
    {
        $this->db->select('*');
        $this->db->where($where);
        $this->db->like($like);
        // $this->db->limit($limit, $page);
        $this->db->from('venorenquiry');
        $this->db->join('wedding_planner', 'venorenquiry.vendor_id = wedding_planner.id');
        $r = $this->db->get();
         //$arr = get_defined_vars();
        
        return $r->result();
        // return $r->result();
        // print_r($arr);
        // die();
     }
     public function getquerydatacount($table,$where,$like)
    {
        $this->db->where($where);
        $this->db->like($like);
        // $this->db->limit($limit, $page);
        $this->db->from('venorenquiry');
        $this->db->join('wedding_planner', 'venorenquiry.vendor_id = wedding_planner.id');
        $r = $this->db->get();
         //$arr = get_defined_vars();
        
        return $r->result();
        // return $r->result();
        // print_r($arr);
        // die();
     }
      public function sendMail($to, $subject, $message, $attach = null)
    {
        // $myEmail = "tempnimesh007@gmail.com";
        // $myEmailPassword = "god404gmail";
        $myEmail = MAIL_ID;
        $myEmailPassword = MAIL_PASSWORD;

        // $SendFrom = "live"; // live | local

        

        // if ($SendFrom == "local") {
            // $myEmail = "";
            // $myEmailPassword = '';

            // $config['protocol']  = 'smtp';
            // $config['smtp_host'] = 'ssl://smtp.googlemail.com';
            // $config['smtp_user'] = $myEmail;
            // $config['smtp_pass'] = $myEmailPassword;
            // $config['smtp_port'] = "465";
        //     $config = Array(
        //         'protocol' => 'smtp',
        //         'smtp_host' => 'ssl://smtp.googlemail.com',
        //         'smtp_port' => 465,
        //         'smtp_user' =>  $myEmail,
        //         'smtp_pass' => $myEmailPassword,
        //         'mailtype'  => 'html', 
        //         'charset'   => 'iso-8859-1'
        //     );
        // } else {
        //     // $myEmail = "";
        //     // $myEmailPassword = '';

        //     $config['protocol']  = 'SMTP';
        //     $config['smtp_host'] = "sg2plzcpnl462840.prod.sin2.secureserver.net";
        //     $config['smtp_user'] = $myEmail;
        //     $config['smtp_pass'] = $myEmailPassword;
        //     $config['smtp_port'] = "25";
        //     $config['mailtype'] = "html";
        //     $config['charset'] = "iso-8859-1";
        //     $config['wordwrap'] =TRUE;
        // }

        // $this->load->library('email', $config);
        
        
        //$this->load->library('email');

        $this->email->set_newline("\r\n");
        $this->email->from($myEmail);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->set_newline("\r\n");

        if ($attach != null) {
            $this->email->attach($attach);
        }

        $result = [];
        if ($this->email->send()) {
            $result['status'] = "OK";
            $result['msg'] = "Send Successfully...";
        } else {
            $result['status'] = "BAD_REQUEST";
            $result['msg'] = $this->email->print_debugger();
        }
        return $result;
    }
    
    public function photoupdate($vid,$colun,$filename)
    {
        
        $q=$this->db->query('SELECT * FROM wedding_planner where id="' . $vid . '"');;
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
            'id' => $vid,
        );
        return $this->db->update($table, $data,$where);
    }
    
}