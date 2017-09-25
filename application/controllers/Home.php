<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->library('template');
    }
    
    function index(){
        $data['menu_active'] = 'home';
        $this->template->set("title", "Home");
        $this->template->load("main_layout","contents","home", $data);
    }
    
}


/* End of file HomeController.php */
