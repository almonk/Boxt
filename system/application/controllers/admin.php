<?php

class Admin extends Controller {

	function Admin()
	{
		parent::Controller();	
		$this->load->library('session');
		$this->config->load('boxt');
	}
	
	function index()
	{			
		$this->load->view('admin/settings');
	}	
	
	function general()
	{			
		$this->load->view('admin/home');
	}
	
	function users(){
		$this->load->view('admin/users');
	}
	
	function widgets(){
		$this->load->view('admin/widgets');
	}
	
	function announcements(){
		$this->load->view('admin/announcements');
	}
	
	function save_general()
	{			
		$this->config->load('boxt');
		$name = $this->input->post('intname');
		$logo = $this->input->post('intlogo');
		$support = $this->input->post('supportcontact');
		
		$this->config->set_item('institution_name', $name);
		$this->config->set_item('institution_logo', $logo);
		$this->config->set_item('support_contact', $support);
		$this->session->set_flashdata('result', 'Your settings have been saved.');
		redirect(base_url());
		//$this->config->set_item('self_register', $this->input->post('allowregister'));
	}
}