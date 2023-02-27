<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Getcity extends CI_Controller {

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
	    //check  method call get post or other
	    //die(print_r($this->input->method()));
        $this->load->database();
		$this->load->helper('url');
		$cid=$this->input->get('q');
		
	    $query = $this->db->query('SELECT * FROM `city_master` where status="APPROVED" and state_id='.$cid.' ORDER BY `city_master`.`city_name` ASC');
    
        $data['city']=$query->result();
        return $this->load->view('city_ajex.php',$data);
	}
}
