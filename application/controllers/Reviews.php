<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reviews extends CI_Controller {

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
	    
	
	}
	
	public function newreviews()
	{
    	$vid=$this->input->get('vid');
        $rid=$this->input->get('rnumber');
        $r_message=$this->input->get('message');
        
        	$this->db->select('*');
        $this->db->where('vendor_id', $vid);
        $this->db->where('email', $this->session->googleemail);
        $this->db->from('venorenquiry');
		$query = $this->db->get();
		$valid = $query->result();
        if($valid)
        {
            $data = array(
			    'vendor_id' => $vid,
			    'users_id' =>  $this->session->googleID,
			    'r_star' => $rid,
			    'r_message' => $r_message,
			    'r_email' => $this->session->googleemail,
			    'r_name' => $this->session->googlename,
			    'r_date' => date("Y-m-d H:i:s"),
			    'status' => 'APPROVED',
			    'is_deleted' => 'No',
        	);
        	$this->db->insert('vendor_reviews', $data);
        	
        	$this->db->select('*');
            $this->db->where('vendor_id', $vid);
            $this->db->from('vendor_reviews');
    		$query = $this->db->get();
    		$vrating = $query->result();
    		$c=0;
    		$total=0;
    		foreach($vrating as $data)
    		{
    		    $c=$c+1;
    		    $total=$total+$data->r_star;
    		}
    		
    		$data1['rating']=round(($total/$c), 1);
    		$this->db->where('id', $vid);
            $this->db->update('wedding_planner', $data1);
        }
        else
        {
            echo "No quiry found";
            die();
        }
        
	    
		
    	
	}
}