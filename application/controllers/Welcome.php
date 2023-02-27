<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	    $this->db->cache_on();
	   // $this->cachePage(365000000);
		$query = $this->db->query('UPDATE site_config SET siteview = siteview + 1');
		$query = $this->db->query('SELECT id,country_name FROM country_master where status="APPROVED" AND is_deleted="No"  ORDER BY `country_master`.`country_name` ASC');
        
		$data['country']=$query->result();
		$data['site']=$this->OH->getsitedata();
		$this->load->view('page/header',$data);
		$this->load->view('Vendor_home',$data);
		$this->load->view('page/footer',$data);

	}
	
	public function error404()
	{
	    
	    	$this->load->view('error404');
	}
	public function vplan()
	{
    		$data['site']=$this->OH->getsitedata();
    		$this->load->view('page/header',$data);
	    	$this->load->view('page/vendorplan');
	    	$this->load->view('page/footer');
	}
	public function shortvplan()
	{
	    	$this->load->view('page/vendorshortplan');
	}
	public function index2()
	{
	    $this->db->cache_on();
		$query = $this->db->query('UPDATE site_config SET siteview = siteview + 1');
		$query = $this->db->query('SELECT id,country_name FROM country_master where status="APPROVED" AND is_deleted="No"  ORDER BY `country_master`.`country_name` ASC');
        
		$data['country']=$query->result();
		$data['site']=$this->OH->getsitedata();
		$this->load->view('page/newheader',$data);
		$this->load->view('page/newhome');
		$this->load->view('page/newfooter');
	}
}
