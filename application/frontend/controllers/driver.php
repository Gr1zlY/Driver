<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Driver extends MY_Controller {

    public function index() {

	$data['cars'] = $this->cars_model->get_cars();
	
	$data['page'] = 'home';
	$data['meta'] = $this->_get_meta('index');
	$this->load->view('template', $data);
    }

    public function contactus() {

	$this->load->library('form_validation');
	$this->load->model('contact_model');

	if ($this->form_validation->run('contactus') == FALSE) {

	    $data['page'] = 'contactus';
	    $data['meta'] = $this->_get_meta('contactus');
	    $this->load->view('template', $data);
	}
	else {

	    if($this->contact_model->save_message() != FALSE) {

		$data['page'] = 'success';
		$data['meta'] = $this->_get_meta('success');
		$this->load->view('template', $data);
	    }
	    else {
		show_404();
	    }
	}
    }

    public function order() {

	$this->load->library('form_validation');
	$this->load->model('cars_model');
	$this->load->model('order_model');

	$car_id = (int)$this->uri->segment(3);

	if($car_id != FALSE) {

	    $data['car'] = $this->cars_model->get_car($car_id);

	    if($data['car'] != FALSE) {

		if ($this->form_validation->run('order') == FALSE) {

		    $data['page'] = 'order';
		    $data['meta'] = $this->_get_meta('order');
		    $this->load->view('template', $data);
		}
		else {

		    if($this->order_model->make_order() != FALSE) {

			$data['page'] = 'success';
			$data['meta'] = $this->_get_meta('success');
			$this->load->view('template', $data);
		    }
		    else {
			show_404();
		    }
		}

	    }
	    else {
		show_404();
	    }

	}
	else {
	    show_404();
	}
    }
}