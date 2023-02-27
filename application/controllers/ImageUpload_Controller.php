<?php 
class ImageUpload_Controller extends CI_Controller
{
	function __construct()
	{
	parent::__construct();
	//load Helper for Form
	$this->load->helper('url', 'form');	
	$this->load->library('form_validation');
	}
	function index()
	{
		$this->load->view('Dashboard/photo_Gallery');
	}
	public function image() 
	{
        $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2000;
        $config['max_width'] = 1500;
        $config['max_height'] = 1500;
		$config['file_name'] = random_string('alnum', 8);

        $this->load->library('upload', $config);
		

        if (!$this->upload->do_upload('profile_pic')) 
		{
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('imageupload_form', $error);
        } 
		else 
		{
			$file=$this->upload->data();
			$this->OH->photoupdate('image',$file['file_name']);
            $data = array('image_metadata' => $this->upload->data());

            $this->load->view('imageupload_success', $data);
        }
    }

}
?>