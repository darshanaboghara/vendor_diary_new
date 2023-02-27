<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contactus extends CI_Controller
{

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
		$data['site']=$this->OH->getsitedata();
        $this->load->view('page/header', $data);
        $this->load->view('contact_us',$data);
        $this->load->view('page/footer', $data);
        
    }
    
    public function privacyPolicy()
    {
          $data['site']=$this->OH->getsitedata();
        $this->load->view('page/header', $data);
        $this->load->view('PrivacyPolicy');
        $this->load->view('page/footer');
    }
    public function TermsofService()
    {
          $data['site']=$this->OH->getsitedata();
        $this->load->view('page/header', $data);
        $this->load->view('termsofservice');
        $this->load->view('page/footer');
    }
    
    public function aboutus()
    {
        $data['site']=$this->OH->getsitedata();
        $this->load->view('page/header', $data);
        $this->load->view('aboutus');
        $this->load->view('page/footer');
    }
    
    public function faq()
    {
        $this->db->select('*');
        $this->db->where('is_deleted', 'No');
        $this->db->where('status', 'APPROVED');
        $this->db->from('faq_master');
		$query = $this->db->get();
		$data['allfaq'] = $query->result();
		$data['site']=$this->OH->getsitedata();
        $this->load->view('page/header', $data);
        $this->load->view('faq');
        $this->load->view('page/footer');
    }
    public function contact()
    {
		$data['site']=$this->OH->getsitedata();
        $this->load->view('page/newheader', $data);
        $this->load->view('page/contact.php');
        $this->load->view('page/newfooter');
        
    }
    
    public function privacyPolicy2()
    {
          $data['site']=$this->OH->getsitedata();
        $this->load->view('page/header', $data);
        $this->load->view('PrivacyPolicy');
        $this->load->view('page/footer');
    }
    
    public function aboutus2()
    {
        $data['site']=$this->OH->getsitedata();
        $this->load->view('page/newheader', $data);
        $this->load->view('page/about');
        $this->load->view('page/newfooter');
    }
    
    public function faq2()
    {
        $this->db->select('*');
        $this->db->where('is_deleted', 'No');
        $this->db->where('status', 'APPROVED');
        $this->db->from('faq_master');
		$query = $this->db->get();
		$data['allfaq'] = $query->result();
		$data['site']=$this->OH->getsitedata();
        $this->load->view('page/header', $data);
        $this->load->view('faq');
        $this->load->view('page/footer');
    }
}
