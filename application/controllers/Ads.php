<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Ads extends CI_Controller {


    /**
     * Index Page for this controller.
     *
     */
    public function index()
    {
        // header("Content-Type: text/txt;charset=iso-8859-1");
        $this->output->set_header("Content-Type: text/plain charset=UTF-8");
        header("Content-Type: text/plain charset=UTF-8");
        $this->load->view('ads');
    }
}
?>