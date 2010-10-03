<?php

class User extends DataMapper {

	var $has_many = array('setting');

	var $validation = array(
		'username' => array(
			'rules' => array('required', 'max_length' => 20),
			'label' => 'Username'
		),
		'password' => array(
	        'label' => 'Password',
	        'rules' => array('required')
	    ),
	    'email' => array(
	        'label' => 'Email Address',
	        'rules' => array('required','valid_email')
	    )	    
	);

    function __construct($id = NULL)
	{
		parent::__construct($id);
    }
	
	function _encrypt($field)
	{
	    if (!empty($this->{$field}))
	    {
	        if (empty($this->salt))
	        {
	            $this->salt = md5(uniqid(rand(), true));
	        }
	        $this->{$field} = sha1($this->salt . $this->{$field});
	    }
	}
			
	function login(){
		$username = $this->username;
		$password = $this->password;
		
		$u = new User();
		$u->where('username', $username);
		$u->where('password', $password)->get();
		
		if ($u->exists())
		{
			//Send the values from the database back to the controller
			$this->id = $u->id;
			$this->username = $u->username;
			$this->email = $u->email;
			$this->admin = $u->admin;
			return TRUE;
		}
		else
		{
			return FALSE;
		}	
	}
	
	function register(){
		$u = new User();
		$username = $this->username;
		$password = $this->password;
		$email = $this->email;
		
		// Enter values into required fields
		$u->username = $username;
		$u->password = $password;
		$u->email = $email;

		// Save new user
		$u->save();		
	}
	
	function get_widgets($user_id){
		$s = new Setting();
		$s->where('user_id', $user_id)->get();
		
		//Left column first
		if ($s->column_left != "") {
			$left_column_widgets = explode(',',$s->column_left);
			foreach ($left_column_widgets as $left_init) {
				echo 'load_widget("'.$left_init.'","left");';
			}
		}else{
			echo "$('#firsttime').fadeIn('slow');";
		}

		//Next middle column
		if ($s->column_mid != "") {
			$mid_column_widgets = explode(',',$s->column_mid);
			foreach ($mid_column_widgets as $mid_init) {
				echo 'load_widget("'.$mid_init.'","mid");';
			}
		}
	
		//Finally right column
		if ($s->column_right != "") {
			$right_column_widgets = explode(',',$s->column_right);
			foreach ($right_column_widgets as $right_init) {
				echo 'load_widget("'.$right_init.'","right");';
			}
		}
	}
	
	function get_settings($id){
		$s = new Setting();
		$s->where('user_id', $id)->get();
		return $s->widgets_array;
	}
}