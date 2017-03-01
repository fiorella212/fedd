<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    function __construct() {
        
        parent::__construct();
        $this->load->model('Person');

        $this->load->library(array('form_validation','session'));
        $this->load->helper(array('url','html','form'));
    }

	public function index()
	{
		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('main');
		$this->load->view('footer');
	}

}

/* End of file Main.php */
/* Location: ./application/controllers/Main.php */