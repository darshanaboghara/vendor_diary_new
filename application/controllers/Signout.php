<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signout extends CI_Controller {
    public function logout()
	{
	    $this->session->unset_userdata('idtoken');
	    $this->session->unset_userdata('googleemail');
        $this->session->unset_userdata('googlename');
        $this->session->unset_userdata('googlelname');
        $this->session->unset_userdata('googlelogin');
        $this->session->set_userdata('googlelogin',FALSE);
		redirect(base_url());
	}
}