<?php

class Category extends DataMapper {
	
	//Because of the odd pluralisation we have to tell it which table to relate to
	var $table = 'categories';
	var $has_many = array('widget');

	var $validation = array(
		'name' => array(
			'rules' => array('required', 'max_length' => 40),
			'label' => 'Name'
		)
	);
}