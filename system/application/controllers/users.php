<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Users extends Controller {

	//php 5 constructor
	function __construct() {
		parent::Controller();
	}
	
	//php 4 constructor
	function Users() {
		parent::Controller();
	}
	
	function index() {
		
	}
	
	function register(){
		$u = new User();

		$u->username = $this->input->post('username');
		$u->password = $this->input->post('password');
		$u->email = $this->input->post('email');

		$u->register();
		$this->session->set_flashdata('result', 'Thanks for signing up! Your account has been activated.');
		redirect(base_url());
	}
	
	function login(){
		$u = new User();

		$u->username = $this->input->post('username');
		$u->password = $this->input->post('password');

		if ($u->login()){
			$newdata = array(
				'username'  => $u->username,
				'email'     => $u->email,
				'id'     => $u->id,
				'admin' => $u->admin,
				'logged_in' => TRUE
			);
			$this->session->set_userdata($newdata);
			redirect(base_url());
		}else{
			echo 'Access denied';
		}
	}
	
	function settings(){
		$this->load->library('parser');
		$u = new User();
		
		$data = array(
			'user_id' => $this->session->userdata('id'),
			'username' => $this->session->userdata('username')
		);
		
		$this->load->view('global/header');
		$this->parser->parse('user/settings', $data);
		$this->load->view('global/footer');
	}
	
	function save_widgets_array(){
		$column_id = $this->input->post('columnid');
		$user_id = $this->input->post('userid');
		$widget_array = $this->input->post('widget_array');
		
		$s = new Setting();
		$s->where('user_id', $user_id)->get();
		$s->update($column_id, $array);
		echo "Saved Widget Positions";
	}
	
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
}