<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor_details extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$vid=$this->input->get('vid');
		$name = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
		$this->db->select('*');
		if($vid!=null)
		{
		     $this->db->where('id', $vid);
		}
		else
		{
		    $name=str_replace('-', ' ', $name);
		    $this->db->where('business_name', urldecode($name));
		    $this->db->or_where('planner_name', urldecode($name));
		}
		
        $this->db->where('is_deleted', 'No');
        $this->db->where('status', 'APPROVED');
       
        $this->db->from('wedding_planner');
		$query = $this->db->get();
		$data['vdata']=$query->result();
		
		if(	$data['vdata']!=null)
		{
		    if(isset($this->session->idtoken))
            {
               // die($data['vdata'][0]->id);
               if($data['vdata'][0]->plan_status=="Paid")
                $this->OH->googlelead($data['vdata'][0]->id,$this->session->googlename,$this->session->googleemail);
            
    		}
    		$this->db->select('*');
        $this->db->where('is_deleted', 'No');
        $this->db->where('status', 'APPROVED');
        $this->db->where('vendor_id', $data['vdata'][0]->id);
        $this->db->from('vendor_reviews');
		$query = $this->db->get();
		$data['vreviews']=$query->result();
		$data['og']=true;
        }
        else
        {
            $this->session->set_userdata('alert', 'No vendor found');
        }
        
        
        

		$data['site']=$this->OH->getsitedata();
		$this->load->view('page/header',$data);
		$this->load->view('vd/Vendor_details',$data);
		$this->load->view('page/footer',$data);
	}
}
