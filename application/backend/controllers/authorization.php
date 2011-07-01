<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authorization extends CI_Controller {

    public function __construct() {
	parent::__construct();

	$this->load->model('authorization_model');
    }
    public function index() {

	$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

	if($this->form_validation->run('login') != FALSE) {

	    if($this->authorization_model->login() == FALSE) {
		$data['error'] = 'Аккаунт не найден!';
	    }
	    else {
		redirect('admin/admin');
	    }

	}

	$data['ptitle'] = 'Вход в админпанель';
	$data['page'] = 'login';
	$this->load->view('template', $data);
    }

    public function editmember() {

	$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

	$user_id = (int)$this->session->userdata('id');

	if ($this->form_validation->run('editmember') != FALSE) {
	    if($this->authorization_model->update_user_data($user_id))
		$data['success'] = 'Данные изменены';
	}

	$data = $this->authorization_model->get_user_data($user_id);

	if($data != FALSE) {

	    $data['ptitle'] = 'Профиль';
	    $data['page'] = 'members/edit';
	    $this->load->view('template',$data);
	}
	else {
	    show_404('page');
	}
    }

    public function _remap($method) {


	if($this->session->userdata('logged_in') == TRUE) {
	    $this->$method();
	}
	else if($method == 'index') {
	    $this->index();
	}
	else {
	    redirect('authorization/index');
	}
    }

    public function logout() {

	$this->session->sess_destroy();
	redirect('');
    }
}