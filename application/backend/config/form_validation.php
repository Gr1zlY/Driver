<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config = array(

	'login' => array(
		array(
			'field' => 'login',
			'label' => 'Login',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required|md5'
		)
	),
	'car' => array(
	    array(
		'field' => 'title',
		'label' => 'Title',
		'rules' => 'trim|required'
	    ),
	    array(
		'field' => 'class',
		'label' => 'Car class',
		'rules' => 'required'
	    ),
	    array(
		'field' => 'description',
		'label' => 'Description',
		'rules' => 'trim|required'
	    )
	),
	'editmember' => array(
		array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'matches[passconf]|md5'
		),
		array(
			'field' => 'passconf',
			'label' => 'Password confirmation',
			'rules' => ''
		),
		array(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'trim'
		)
	)
);