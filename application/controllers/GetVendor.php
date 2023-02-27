<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GetVendor extends CI_Controller
{

	function __construct() {
        parent::__construct();
        $this->load->helper('text');
    }
	public function index()
	{
		//$this->db->select('*');
	    
		$cid = $this->input->post('country_id');
		$sid = $this->input->post('state_id');
		$ciid = $this->input->post('city_id');
		$caid = $this->input->post('category_id');

		if ($cid != 0) {
		    $where['country_id']=$cid;
			$this->session->set_userdata('country_id', $cid);
		} else if($this->session->country_id){
		    $this->db->where('country_id', $this->session->country_id);
		    $where['country_id']=$this->session->country_id;
		}
		if ($sid != 0) {
		    
		     $where['state_id']=$sid;
			 $this->session->set_userdata('state_id', $sid);
		} else if($this->session->state_id!=0){
		     $where['state_id']=$this->session->state_id;
		}
		if ($ciid != 0) {
		    $where['city_id']=$ciid;
			$this->session->set_userdata('city_id', $ciid);
		}
		else if($this->session->city_id!=0)
		{
		     $where['city_id']=$this->session->city_id;
		}
		if ($caid != 0) {
		    $where['category_id']=$caid;
			$this->session->set_userdata('category_id', $caid);
		}
		else if($this->session->category_id)
		{
		    $where['category_id']=$this->session->category_id;
		}
		$where['status']='APPROVED';
		$where['is_deleted']='No';

        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        
        $data['vendors']=$this->OH->getvendordata('wedding_planner', $where,10,$page);
        
        // $this->db->where($where);
        // $limit = $this->db->count_all_results('wedding_planner');
        
		//$this->db->limit($limit, $page);
        $this->db->where($where);
        
 		$config['total_rows'] = $this->db->count_all_results('wedding_planner');
		$config['base_url'] = base_url() . "GetVendor/";
		$config['num_links']=2;
		$config['per_page'] =10;
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
        if($this->session->state_id!=0)
        {
            $query = $this->db->query('SELECT * FROM city_master where state_id=' . $this->session->state_id . ' and  status="APPROVED" and is_deleted="No" ORDER BY `city_master`.`city_name` ASC');

		$data['city'] = $query->result();
        }
		

	    $query = $this->db->query('SELECT * FROM `vendor_category` where status="APPROVED" ');
		$data['category'] = $query->result();
		
	    $query = $this->db->query('SELECT * FROM `country_master` where status="APPROVED" and is_deleted="No"');
        $data['country']=$query->result();
	    
	    $query = $this->db->query('SELECT * FROM `state_master` where status="APPROVED" and is_deleted="No"');
        $data['state']=$query->result();
        
		$this->load->view('page/header', $data);
		$this->load->view('vendor_result', $data);
		$this->load->view('page/footer', $data);
		if($ciid != 0 && $caid != 0 )
		{
		    if(isset($this->session->idtoken))
            {
                foreach($data['vendors'] as $vdata)
                {
                    if($vdata->plan_status=="Paid")
                    {
                        $this->OH->googlelead($vdata->id,$this->session->googlename,$this->session->googleemail);
                    }
                    else
                    {
                        $this->OH->googlelead($vdata->id,$this->session->googlename,$this->session->googleemail,"","No");
                    }
                }
            
    		}
		}
	}
	public function locationchange()
	{
//         $ciid = $this->input->post('country_id');
// 		$said = $this->input->post('state_id');
//         $ctid = $this->input->post('city_id');
// 		$caid = $this->input->post('category_id');
		
		$cid = $this->input->post('country_id');
		$sid = $this->input->post('state_id');
		$ciid = $this->input->post('city_id');
		$caid = $this->input->post('category_id');
		//die($caid);
		
		if ($cid != 0) {
		    $where['country_id']=$cid;
			$this->session->set_userdata('country_id', $cid);
		} else if($this->session->country_id){
		    $this->db->where('country_id', $this->session->country_id);
		    $where['country_id']=$this->session->country_id;
		}
		if ($sid != 0) {
		     $where['state_id']=$sid;
			 $this->session->set_userdata('state_id', $sid);
		} else if($this->session->state_id){
		     $where['state_id']=$this->session->state_id;
		}
		if ($ciid != 0) {
		    $where['city_id']=$ciid;
			$this->session->set_userdata('city_id', $ciid);
		}
		else if($this->session->city_id)
		{
		     $where['city_id']=$this->session->city_id;
		}
		if ($caid != 0) {
		    $where['category_id']=$caid;
			$this->session->set_userdata('category_id', $caid);
		}
		else if($this->session->category_id)
		{
		    $where['category_id']=$this->session->category_id;
		}
		$where['status']='APPROVED';
		$where['is_deleted']='No';
		
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
	    $data['vendors']=$this->OH->getvendordata('wedding_planner', $where,10,$page);
        
        $this->db->where($where);
        
 		$config['total_rows'] = $this->db->count_all_results('wedding_planner');
		//pagination config start
		$config['base_url'] = base_url() . "GetVendor/locationchange/";
	//	$config['total_rows'] =200;
	    $config['num_links']=2;
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



        if($this->session->state_id)
		{ 
		    $query = $this->db->query('SELECT * FROM city_master where state_id=' . $this->session->state_id . ' and  status="APPROVED" and is_deleted="No" ORDER BY `city_master`.`city_name` ASC');
		}
		else
		{
		    $query = $this->db->query('SELECT * FROM city_master  where state_id="0" and status="APPROVED" and is_deleted="No" ORDER BY `city_master`.`city_name` ASC');
		}


	//	$query = $this->db->query('SELECT * FROM city_master where state_id=' . $this->session->state_id . ' and  status="APPROVED"');
		$data['city'] = $query->result();

		$query = $this->db->query('SELECT * FROM `vendor_category` where status="APPROVED" ');
		$data['category'] = $query->result();
		
		$query = $this->db->query('SELECT * FROM `country_master` where status="APPROVED" and is_deleted="No"');
        $data['country']=$query->result();

		$data['site'] = $this->OH->getsitedata();
		$this->load->view('page/header', $data);
		$this->load->view('vendor_result', $data);
		$this->load->view('page/footer', $data);
		if($ciid != 0 && $caid != 0 )
		{
		    if(isset($this->session->idtoken))
            {
                foreach($data['vendors'] as $vdata)
                {
                    if($vdata->plan_status=="Paid")
                    {
                        $this->OH->googlelead($vdata->id,$this->session->googlename,$this->session->googleemail);
                    }
                    else
                    {
                        $this->OH->googlelead($vdata->id,$this->session->googlename,$this->session->googleemail,"","No");
                    }
                }
            
    		}
		}
	}
	public function vendorbycategory()
	{
	   
		$cid=($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		
// 		die($this->OH->getidbycatname($cid));
		 $this->db->select('*');
		if(!isset($cid))
		{
		    
		    $cid=0;   
		}
		else
		{
		        $this->session->set_userdata('category_id', $cid);
		}
		if ($this->session->country_id != 0) {
			$this->db->where('country_id', $this->session->country_id);
		}
		if ($this->session->state_id != 0) {
			$this->db->where('state_id', $this->session->state_id);
		}
		$ciid = $this->input->post('city_id');
		$caid = $this->input->post('category_id');
		if ($ciid != 0) {
			$this->db->where('city_id', $ciid);
			$this->session->set_userdata('city_id', $ciid);
		}
		if ($caid != 0) {
			$this->db->where('category_id', $caid);
			$this->session->set_userdata('category_id', $caid);
		}



		
		$this->db->where('status', 'APPROVED');
		$this->db->where('category_id', $cid);
		$this->db->where('is_deleted', 'No');
		$this->db->from('wedding_planner');
	    $this->db->order_by("`plan_status` ='Paid'", "DESC");
		//record get limit
		$limit = 10;
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
// 		die($page);
		$this->db->limit($limit, $page);
		//get data
		$query = $this->db->get();
		//$query=$this->db->query('select * from wedding_planner where country_id='.$cid .' and state_id='.$sid.' and city_id='.$ciid);
		$data['vendors'] = $query->result();

		//pagination config start
		if(!isset($cid))
		{
		    $cid=0;   
		}
		if ($this->session->country_id != 0) {
			$this->db->where('country_id', $this->session->country_id);
		}
		if ($this->session->state_id != 0) {
			$this->db->where('state_id', $this->session->state_id);
		}
		$ciid = $this->input->post('city_id');
		$caid = $this->input->post('category_id');
		if ($ciid != 0) {
			$this->db->where('city_id', $ciid);
			$this->session->set_userdata('city_id', $ciid);
		}
		if ($caid != 0) {
			$this->db->where('category_id', $caid);
			$this->session->set_userdata('category_id', $caid);
		}



		
		$this->db->where('status', 'APPROVED');
		$this->db->where('category_id', $cid);
		$config['total_rows'] = $this->db->count_all_results('wedding_planner');
		$config['base_url'] = base_url() . "GetVendor/vendorbycategory/".$cid."/";
		$config['num_links']=2;
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



//         $this->db->select('*');
// 		$this->db->where('status', 'APPROVED');
// 		if($this->session->state_id)
// 		{
// 		    $this->db->where('state_id', $this->session->state_id);
// 		}
// 		$this->db->from('city_master');
// 		//get data
// 		$query = $this->db->get();
       

        if($this->session->state_id)
		{ 
		    //die("Hello");
		    $query = $this->db->query('SELECT * FROM city_master where state_id=' . $this->session->state_id . ' and  status="APPROVED" and is_deleted="No" ORDER BY `city_master`.`city_name` ASC');
		}
		else
		{
		    $query = $this->db->query('SELECT * FROM city_master  where state_id="0" and status="APPROVED" and is_deleted="No" ORDER BY `city_master`.`city_name` ASC');
		}
		$data['city'] = $query->result();
		
        //die(print_r($data['city']));

		$query = $this->db->query('SELECT * FROM `vendor_category` where status="APPROVED"');
		$data['category'] = $query->result();
		$data['site'] = $this->OH->getsitedata();
// 		Get country
		$query = $this->db->query('SELECT * FROM `country_master` where status="APPROVED" and is_deleted="No"');
        $data['country']=$query->result();
		$this->load->view('page/header', $data);
		$this->load->view('vendor_result', $data);
		$this->load->view('page/footer', $data);
		if($ciid != 0 && $caid != 0 )
		{
		    if(isset($this->session->idtoken))
            {
                foreach($data['vendors'] as $vdata)
                {
                     if($vdata->plan_status=="Paid")
                    {
                        $this->OH->googlelead($vdata->id,$this->session->googlename,$this->session->googleemail);
                    }
                    else
                    {
                        $this->OH->googlelead($vdata->id,$this->session->googlename,$this->session->googleemail,"","No");
                    }
                }
            
    		}
		}
	}
	public function vendorbycategoryfilter()
	{
		$cid=$this->input->get('cid');
		if($this->session->country_id)
		{
		    $where['country_id']=$this->session->country_id;
		}
		if($this->session->state_id)
		{
	        $where['state_id']=$this->session->state_id;
		}
		if($this->session->city_id)
		{
		    $where['city_id']=$this->session->city_id;
		}
		$where['category_id']=$cid;
		$this->session->set_userdata('category_id', $cid);
		$where['status']='APPROVED';
		$where['is_deleted']='No';

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
        $data['vendors']=$this->OH->getvendordata('wedding_planner', $where,10,$page);
        
        
        $this->db->where($where);
         
        //pagination config start
 		$config['total_rows'] = $this->db->count_all_results('wedding_planner');
		
		$config['base_url'] = base_url() . "GetVendor/vendorbycategoryfilter?cid=".$cid;
		$config['num_links']=2;
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

        if($this->session->state_id)
		{ 
		    //die("Hello");
		    $query = $this->db->query('SELECT * FROM city_master where state_id=' . $this->session->state_id . ' and  status="APPROVED" and is_deleted="No" ORDER BY `city_master`.`city_name` ASC');
		    $data['city'] = $query->result();
		}
		
		$query = $this->db->query('SELECT * FROM `vendor_category` where status="APPROVED"');
		$data['category'] = $query->result();
		$data['site'] = $this->OH->getsitedata();
		$this->load->view('vendor_ajex', $data);
		
		    if(isset($this->session->idtoken))
            {
                foreach($data['vendors'] as $vdata)
                {
                     if($vdata->plan_status=="Paid")
                    {
                        $this->OH->googlelead($vdata->id,$this->session->googlename,$this->session->googleemail);
                    }
                    else
                    {
                        $this->OH->googlelead($vdata->id,$this->session->googlename,$this->session->googleemail,"","No");
                    }
                }
            
    		}
		
	}
	public function vendorrandom()
	{
	   // $cid=$this->input->get('cat');
	    $cid = $this->input->get('country_id');
		$sid = $this->input->get('state_id');
		$ciid = $this->input->get('city_id');
		$caid = $this->input->get('category_id');
		if($cid)
		{
		    $where['country_id']=$cid;
		}
		if($sid)
		{
	        $where['state_id']=$sid;
		}
		if($ciid)
		{
		    $where['city_id']=$ciid;
		}
		if($cid)
		{
		    $where['category_id']=$caid;
		}
		
		$where['status']='APPROVED';
		$where['is_deleted']='No';

		$this->db->select('*');
		$this->db->where($where);
 		$this->db->from('wedding_planner');
 		$this->db->limit(5);
 		$this->db->order_by('rand()');
        $data['vendorrandom']=$this->db->get()->result();;
       //die(print_r($data['vendorrandom']));
       $this->load->view('vd/randomvendor', $data);
	}
}
