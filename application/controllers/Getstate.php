<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Getstate extends CI_Controller {

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
        $this->load->database();
		$this->load->helper('url');
		$cid=$this->input->get('q');
		if($cid=="undefined")
		{
		    echo "<option value=0>State</option>";
		    return "<option value=0>State</option>";
		}
		if(!$this->input->get('q'))
		{
		     echo "<option value=0>State</option>";
		    return "<option value=0>State</option>";
		}
		$query = $this->db->query('SELECT * FROM `state_master` where status="APPROVED" and country_id='.$cid.' ORDER BY `state_master`.`state_name` ASC');
        $data['state']=$query->result();
       
        return $this->load->view('state_ajex.php',$data);
	}
}
