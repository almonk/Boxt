<?php

class Homepage extends Controller {

	function Homepage()
	{
		parent::Controller();	
		$this->load->library('session');
	}
	
	function index()
	{			
		if ( $this->session->userdata('logged_in') ) {
			if ( $this->session->userdata('admin') != '1' ) {
				$this->load->view('global/header');
				$this->load->view('dashboard/dashboard');
				$this->load->view('global/footer');
			}else{
				$this->load->view('admin/settings');
			}
		}
		else{
			$this->load->view('welcome/welcome');
		}
	}	
	
	function signup(){
		$this->load->view('welcome/signup');
	}
}