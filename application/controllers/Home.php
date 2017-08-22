<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->library('template');
    }
    
    function index(){
        $this->template->set("title", "Home");
        $this->template->load("main_layout","contents","home");
    }
    
}


/* End of file HomeController.php */
