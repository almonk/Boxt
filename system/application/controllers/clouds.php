<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Clouds extends Controller {

	//php 5 constructor
	function __construct() {
		parent::Controller();
		$this->load->library('session');
	}
	
	//php 4 constructor
	function Clouds() {
		parent::Controller();
		$this->load->library('session');
	}
		
	function save(){
		$userid = $this->session->userdata('id');
		$widgetname = $this->input->post('widget_name');
		$datastring = $this->input->post('data_string');
		$datavalue = $this->input->post('data_value');
		
		$c = new Cloud();
		$c->limit(1);
		$c->where('user_id',$userid);
		$c->where('widget_name',$widgetname);
		$c->where('data_string',$datastring);
		$c->get();
		if ($c->exists()) {
			//Update row
			$c->data_value = $datavalue;
			$c->save();
		}else{
			//Create new row
			$c->user_id = $userid;
			$c->widget_name = $widgetname;
			$c->data_string = $datastring;
			$c->data_value = $datavalue;
			$c->save();
		}		
		echo 'Saved.';
	}
	
	function read(){
		//Read data from cloud
		$userid = $this->session->userdata('id');
		$widgetname = $this->input->post('widget_name');
		$datastring = $this->input->post('data_string');
		
		$c = new Cloud();
		$c->limit(1);
		$c->where('user_id',$userid);
		$c->where('widget_name',$widgetname);
		$c->where('data_string',$datastring);
		$c->get();
		echo $c->data_value;
	}
}
