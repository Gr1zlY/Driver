<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config = array(
	'order' => array(
		array(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'trim|required|min_length[3]|max_length[240]'
		),
		array(
			'field' => 'surname',
			'label' => 'Surname',
			'rules' => 'trim|required|min_length[3]|max_length[240]'
		),
		array(
			'field' => 'email',
			'label' => 'email',
			'rules' => 'valid_email|required'
		),
		array(
			'field' => 'cellcountrycode',
			'label' => 'country phone code',
			'rules' => 'trim|is_natural|required'
		),
		array(
			'field' => 'cellcode',
			'label' => 'phone code',
			'rules' => 'trim|is_natural|required'
		),
		array(
			'field' => 'cellphone',
			'label' => 'phone number',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'payment',
			'label' => 'payment method',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'arrival',
			'label' => 'arrival date',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'arrival_time',
			'label' => 'arrival time',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'flight',
			'label' => 'flight number',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'comment',
			'label' => 'comment',
			'rules' => 'trim|required'
		),
		/*array(
			'field' => 'captcha',
			'label' => 'Captcha',
			'rules' => 'required|callback__check_captcha'
		)*/
	),
	'contactus'  => array(
		array(
			'field' => 'message',
			'label' => 'Message',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'email',
			'label' => 'email',
			'rules' => 'valid_email|required'
		),
		array(
			'field' => 'phone',
			'label' => 'Phone',
			'rules' => 'trim'
		)
	)
);
