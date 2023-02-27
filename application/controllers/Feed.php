<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Feed extends CI_Controller {


    /**
     * Index Page for this controller.
     *
     */
    public function index()
    {
        header("Content-Type: text/xml;charset=iso-8859-1");
        $this->load->view('feed',true);
    }
}
?>
