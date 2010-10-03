<?php

class Setting extends DataMapper {

	var $has_one = array('user');

    function __construct($id = NULL)
	{
		parent::__construct($id);
    }
}