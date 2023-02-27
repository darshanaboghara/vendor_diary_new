<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Demo extends CI_Controller
{
    public function index()
    {
        // $response = file_get_contents('https://forbes400.herokuapp.com/api/forbes400?limit=10');
        $response = file_get_contents('https://forbes400.herokuapp.com/api/forbes400');
        $data['response'] = json_decode($response);
        $this->load->view('demopage',$data);
    }
    public function news()
    {
        // $response = file_get_contents('https://forbes400.herokuapp.com/api/forbes400?limit=10');
        $response = file_get_contents('https://newsapi.org/v2/top-headlines?country=in&apiKey=dc33d86106a0424da2d7e9e50990a8dd');
        $data['response'] = json_decode($response);
        $response = file_get_contents('https://newsapi.org/v2/everything?q=tesla&from=2021-11-07&sortBy=publishedAt&apiKey=dc33d86106a0424da2d7e9e50990a8dd');
        $data['response2'] = json_decode($response);
        $response = file_get_contents('https://saurav.tech/NewsAPI/top-headlines/category/health/in.json');
        $data['response3'] = json_decode($response);
        $this->load->view('news',$data);
    }
     function maildemo()
     {
     }
}