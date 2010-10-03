<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Widgets extends Controller {

	//php 5 constructor
	function __construct() {
		parent::Controller();
		if ( $this->session->userdata('logged_in') ) {
			
		}
		else{
			redirect(base_url(), 'location');
		}
	}
	
	//php 4 constructor
	function Users() {
		parent::Controller();
	}
	
	function index() {
		$this->load->view('widgets/library');
	}
	
	function library(){
		$search = $this->input->post('search');
		if ($search) {
			$w = new Widget();
			$w->order_by("name", "asc");
			$w->like('name', $search)->get();
			if ($w->like('name', $search)->count() > 0) {
				$data['results'] = $w;
				$this->load->view('widgets/results',$data);
			}else{
				echo '<div class="notice" style="border:0;background-color:white;color:#bdbdbd;font-size:15px;font-weight:bold;">No widgets found.</div>';
			}
		}else{
			$w = new Widget();
			$w->order_by("name", "asc");
			$w->get();
			$data['results'] = $w;
			$this->load->view('widgets/results',$data);	
		}
	}
}