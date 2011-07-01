<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function index(){
	redirect('admin/cars');
    }

    public function cars(){

	$data['cars'] = $this->cars_model->get_cars();

	$data['ptitle'] = 'Автомобили';
	$data['page'] = 'cars/multiple';
	$this->load->view('template', $data);
    }

    public function messages(){

	$this->load->model('contact_model');
	$this->load->library('pagination');

	$config['base_url'] = site_url('admin/messages');
	$config['total_rows'] = $this->db->count_all('messages');
	$config['per_page'] = '10';
	$config['uri_segment'] = 3;
	$this->pagination->initialize($config);

	$data['messages'] = $this->contact_model->get_messages($config['per_page'], $this->uri->segment(3));

	$data['ptitle'] = 'Сообщения';
	$data['page'] = 'messages/multiple';
	$this->load->view('template', $data);
    }

    public function orders(){

	$this->load->model('order_model');
	$this->load->library('pagination');

	$config['base_url'] = site_url('admin/orders');
	$config['total_rows'] = $this->db->count_all('orders');
	$config['per_page'] = '5';
	$config['uri_segment'] = 3;
	$this->pagination->initialize($config);
	
	$data['orders'] = $this->order_model->get_orders($config['per_page'], $this->uri->segment(3));

	for($i = 0; $i< count($data['orders']); $i++){
	    $data['orders'][$i]['car'] = $this->cars_model->get_title($data['orders'][$i]['car_id']);
	    if($data['orders'][$i]['car'] == FALSE)
		$data['orders'][$i]['car'] = 'Автомобиль был удален';
	}

	$data['ptitle'] = 'Заказы';
	$data['page'] = 'orders/multiple';
	$this->load->view('template', $data);
    }

    public function delete(){

	$option = $this->uri->segment(3);
	$id = (int)$this->uri->segment(4);

	if($option != FALSE AND $id != FALSE){
	    
	    switch($option){

		case 'message':{
		    $this->load->model('contact_model');
		    if($this->contact_model->delete_message($id))
			    $this->session->set_flashdata('success', 'Сообщение удалено!');
		    redirect('admin/messages');
		    break;
		}
		case 'order':{
		    $this->load->model('order_model');
		    if($this->order_model->delete_order($id))
		    		$this->session->set_flashdata('success', 'Заказ удален!');
		    redirect('admin/orders');
		    break;
		}
		case 'car':{
		    if($this->cars_model->delete_car($id))
			    $this->session->set_flashdata('success', 'Автомобиль удален!');
		    redirect('admin/cars');
		    break;
		}
		default:
		    show_404();
		    break;
	    }
	}
	else{
	    show_404();
	}
    }

    public function editcar() {

	$id = (int)$this->uri->segment(3);
	if($id != FALSE) {

	    if ($this->form_validation->run('car') != FALSE) {
		
		if( $this->cars_model->update_car($id) != FALSE ){
		    $this->session->set_flashdata('success', 'Пост изменен успешно!');
		}
		else{
		    $this->session->set_flashdata('error', 'Произошла ошибка :(');
		}

		redirect('admin/cars');
	    }

	    $data = $this->cars_model->get_car($id);

	    if($data != FALSE) {

		$data['ptitle'] = 'Редактирование автомобиля';
		$data['page'] = 'cars/edit';
		$this->load->view('template', $data);
	    }
	    else{
		show_404();
	    }
	}
	else {
	    show_404('page');
	}
    }

    public function newcar(){

	if ($this->form_validation->run('car') != FALSE){

	    if($this->cars_model->add_car() != FALSE) {
		$this->session->set_flashdata('success', 'Автомобиль успешно добавлен!');
	    }
	    else{
		$this->session->set_flashdata('error', 'Произошла ошибка :(');
	    }

	    redirect('admin/cars');
	}

	$data['ptitle'] = 'Добавление автомобиля';
	$data['page'] = 'cars/new';
	$this->load->view('template', $data);
    }

    public function _remap($method) {
	if($this->session->userdata('logged_in') == TRUE) {
	    $this->$method();
	}
	else {
	    redirect('authorization');
	}
    }
 }