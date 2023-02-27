<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Search extends CI_Controller
{

	function __construct() {
        parent::__construct();
        $this->load->helper('text');
    }
	public function index()
	{
		//$this->db->select('*');
	    
		$name  = $this->input->get('q');
	    $where['business_name']= $name;
	    
		$where['status']='APPROVED';
		$where['is_deleted']='No';


//die(print_r($where));
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        
        $data['vendors']=$this->OH->getvendordata('wedding_planner', $where,10,$page);
        
        // $this->db->where($where);
        // $limit = $this->db->count_all_results('wedding_planner');
        
		//$this->db->limit($limit, $page);
        $this->db->where($where);
        
 		$config['total_rows'] = $this->db->count_all_results('wedding_planner');
		$config['base_url'] = base_url() . "Search/";
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
