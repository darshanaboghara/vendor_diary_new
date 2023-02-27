<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resetpassword extends CI_Controller {
    public function index()
	{
	    $data['table']=($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
	    $data['col']=($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	    $data['token']=($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
	    $where[$data['col']]= $data['token'];
	     $this->db->where($where);
         $this->db->from(  $data['table']);
         $r = $this->db->get();
	    $r=$r->result();
	    if($r!=null)
	    {
	       if(md5(date('d-m-Y h:i:s')) >= $this->input->get('token')){
	           die("Password Reset link Expired");
	       }
	        
	    $data['site']=$this->OH->getsitedata();
		$this->load->view('page/header',$data);
	    $this->load->view('page/resetpassword');
	    $this->load->view('page/footer'); 
	    }
	    else
	    {
	         die("Password Reset link Expired");
	    }
	   
	}
    public function setpassnewpass()
	{
	    $table=($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	    $col=($this->uri->segment(4)) ? $this->uri->segment(4) : 0;;
	    $password=$this->input->post('newpass');
	    $token=($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
	    $data['password']=md5($password);
	    //die($password);
	    $this->db->where($col, $token);
        $r=$this->db->update($table, $data);
        if($r)
        {
            $data[$col]=null;
            $this->db->where($col, $token);
            $this->db->update($table, $data); 
            header("Location:".base_url());
        }
        else
        {
            die("Link Expire");
        }
	    
        
        
	}
}