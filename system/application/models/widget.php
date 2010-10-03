<?php

class Widget extends DataMapper {
	
	var $has_one = array('category');

	var $validation = array(
		'name' => array(
			'rules' => array('required', 'max_length' => 30),
			'label' => 'Name'
		),
		'description' => array(
	        'label' => 'Description',
	        'rules' => array('required')
	    ),
	    'author' => array(
	        'label' => 'Author',
	        'rules' => array('required')
	    ),	    
		'url' => array(
	        'label' => 'Location',
	        'rules' => array('required')
	    )
		
	);

	function add(){
		$w = new Widget();
		$name = $this->name;
		$description = $this->description;
		$author = $this->author;
		$url = $this->url;
		$category = $this->category;
	
		$w->name = $name;
		$w->description = $description;
		$w->author = $author;
		$w->url = $url;
		
		$c = new Category();
		$c->where('name', $category)->get();

		$w->save($c);		
	}
	
	function delete($id){
		$w = new Widget;
		$w->where('id', $id)->get();
		$w->delete();
	}

}