<?php
defined('BASEPATH') or exit('No direct script access allowed');
class StaffHelper extends CI_Model
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
    
    
    public function getallcustomer_comment()
    {
        $query = $this->db->get('customer_comment');
        $data = $query->result();
        return $data;
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
        if($this->session->StaffRole->view_member=="Own Members")
        {
            $this->db->where('StaffID', $this->session->StaffData->id);
        }
		$this->db->from('wedding_planner');
		$query = $this->db->get();
        $result=$query->result();
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
    
    public function loginValidate($email,$pwd)
    {   $this->db->select('*');
        $this->db->where('is_deleted', 'No');
        $this->db->where('status', 'APPROVED');
        $this->db->where('email', $email);
        $this->db->where('password', $pwd);
        $this->db->from('staff');
        $query = $this->db->get();
        return $query->result();
    }
    public function getroledata($id)
    {   $this->db->select('*');
        $this->db->where('is_deleted', 'No');
        $this->db->where('status', 'APPROVED');
        $this->db->where('id', $id);
        $this->db->from('staff_role');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function getVendor($limit=10, $page=10)
    {
        $this->db->select('*');
        $this->db->where('is_deleted', 'No');
        if($this->session->StaffRole->view_member=="Own Members")
        {
            $this->db->where('StaffID', $this->session->StaffData->id);
        }
        $this->db->limit($limit, $page);
		$this->db->from('wedding_planner');
		$this->db->order_by("id", "desc");
		$query = $this->db->get();
        $result=$query->result();
        return $result;
    }
    
    public function photoupdate($colun,$filename,$uid)
    {
        
        $q=$this->db->query('SELECT * FROM wedding_planner where id="' . $uid . '"');;
        $data=$q->result();
        if(file_exists(IMAGELINK. $data[0]->$colun))
        {
            unlink("./".IMAGELINK.$data[0]->$colun);
        }
         
        $table="wedding_planner";
        $data = array(
            $colun=>$filename,
        );
        $where = array(
            'id' => $uid
        );
        return $this->db->update($table, $data,$where);
    }
    
    public function log($msg="n/a")
	{
	    $data = array(
	            'staff_id'=>$this->session->StaffData->id,
	            'message'=>$msg,
    			'ip_address' => $this->input->ip_address(),
    			'createon' => date("Y-m-d h:i:s"),
    		);
    	return	$this->db->insert('staff_log', $data);
	}
	public function getdata($table,$where,$like,$limit=10, $page=10)
    {
        $this->db->from($table);
        $this->db->where($where);
        $this->db->like($like);
        $this->db->limit($limit, $page);
        $r = $this->db->get();
        return $r->result();
     }
     
     public function getquerydata($table,$where,$like,$limit=10, $page=10)
    {
        $this->db->where($where);
        $this->db->like($like);
        $this->db->limit($limit, $page);
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
    public function vendorcash($vid=64,$planid=1)
    {
        //get plan details
        $this->db->select('*');
        $this->db->from('vendor_membership_plan');
        $this->db->where('id',$planid);
		$query = $this->db->get();
		$plandata=$query->result();
		$plandata=$plandata[0];
		
        $data = array(
        'staff_id' => $this->session->StaffData->id,
        'vendor_id' => $vid,
        'plan_id' => $planid,
        'amount' => $plandata->plan_amount,
        'note' => 'Staff paid ',
        'status' => 'APPROVED',
        );
    
        $this->db->insert('staff_cash_fund', $data);
    }
    public function vendorPaymentCash($vid=64,$planid=1)
    {
        $this->db->select('*');
        $this->db->from('vendor_membership_plan');
        $this->db->where('id',$planid);
		$query = $this->db->get();
		$plandata=$query->result();
		$plandata=$plandata[0];
		
        $data = array(
	        'StaffID'=>$this->session->StaffData->id,
	        'Vid'=>$vid,
	        'createdate'=>date("Y-m-d"),
	        'affiliate'=>$plandata->plan_amount,
	        'payment'=>'No',
	        'status'=>"UNAPPROVED",
	        );
	    $this->db->insert('staff_Add_vendor', $data);
    }
    public function addcashpayment($planid=1)
    {
        $this->db->select('*');
        $this->db->from('vendor_membership_plan');
        $this->db->where('id',$planid);
		$query = $this->db->get();
		$plandata=$query->result();
		$plandata=$plandata[0];
    /*    $data = array(
	        'collect_amount'=>"`collect_amount`+$plandata->plan_amount",
	        );
        $this->db->where('id', $this->session->StaffData->id);
        $this->db->update('staff', $data);*/
        $staffid= $this->session->StaffData->id;
          $q=$this->db->query("UPDATE `staff` SET `collect_amount`=`collect_amount`+$plandata->plan_amount,`total_amount`=`total_amount`+$plandata->plan_amount WHERE id=$staffid");
        // $q->result();
    }
    public function getstaffcash($staffid)
    {   $this->db->select('*');
        $this->db->where('staff_id', $staffid);
        $this->db->from('staff_cash_fund');
        $query = $this->db->get();
        $data['staffcash']=$query->result();
        
        $this->db->select('*');
        $this->db->where('staff_id', $staffid);
        $this->db->from('staff_fund_to_admin');
        $query = $this->db->get();
        $data['staffcashtoadmin']=$query->result();
        return $data;
    }
    
}