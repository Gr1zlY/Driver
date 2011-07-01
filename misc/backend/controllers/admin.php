<?php

class Admin extends Controller {

    function Admin() {
	parent::Controller();
    }

    function index() {
	redirect('admin/posts');
	/*$data['title'] = 'Админпанель';
		$data['page'] = 'menu';
		$this->load->view('template', $data);*/
    }

    function posts() {

	$data['posts'] = $this->blog_model->aGetPreviews(100, 0);

	$data['title'] = 'Просмотр постов';
	$data['page'] = 'blog/multiple';
	$this->load->view('template', $data);
    }

    function editpost() {

	$id = (int)$this->uri->segment(3);

	if($id != FALSE) {

	    if ($this->form_validation->run('post') != FALSE) {
		if($this->blog_model->aUpdatePost($id) != FALSE)
		    $this->session->set_flashdata('success', 'Пост изменен успешно!');
	    }

	    $data['post'] = $this->blog_model->aGetPost($id);

	    if($data['post'] != FALSE) {

		$data['title'] = 'Редактирование статьи';
		$data['page'] = 'blog/single';
		$this->load->view('template', $data);

	    }
	}
	else {
	    show_404('page');
	}
    }

    /*function newpost(){
	
		if ($this->form_validation->run('post') != FALSE){
		
			$id = $this->blog_model->aCreatePost();
			if($id != FALSE) {
				$this->session->set_flashdata('success', 'Пост успешно создан!');
				redirect('admin/posts');
			}
		}

		$data['categories'] = $this->blog_model->aGetCategories();
	
		$data['title'] = 'Создание статьи';
		$data['page'] = 'blog/newsingle';
		$this->load->view('template', $data);
	}*/

    function delete() {

	$id = (int)$this->uri->segment(3);
	if($id == FALSE)
	    show_404('page');
	else {
	    if($this->blog_model->aDeletePost($id)) {
		$this->session->set_flashdata('success', 'Пост успешно удален!');
		redirect('admin/posts');
	    }
	}
    }

    function images() {

	$this->load->model('images_model');

	$data['images'] = $this->images_model->aGetImages();

	$data['title'] = 'Создание статьи';
	$data['page'] = 'images/multiple';
	$this->load->view('template', $data);
    }

    function uploadimage() {

	$this->load->model('images_model');

	if ($this->form_validation->run('imageupload') != FALSE) {

	    $id = $this->images_model->aUploadImage();
	    if($id != FALSE) {
		$this->session->set_flashdata('success', 'Картинка загружена!');
		redirect('admin/images');
	    }
	}
	else {
	    $data['title'] = 'Загрузки изображения';
	    $data['page'] = 'images/upload';
	    $this->load->view('template', $data);
	}
    }

    function deleteimage() {

	$this->load->model('images_model');

	$id = (int)$this->uri->segment(3);
	if($id == FALSE)
	    show_404('page');
	else {
	    if($this->images_model->aDeleteImage($id)) {
		$this->session->set_flashdata('success', 'Изображение успешно удалено!');
		redirect('admin/images');
	    }
	}
    }

    function clients() {

	$this->load->model('clients_model');

	$data['clients'] = $this->clients_model->aGetClients();

	$data['title'] = 'Клиенты';
	$data['page'] = 'clients/multiple';
	$this->load->view('template', $data);
    }

    function uploadclient() {

	$this->load->model('clients_model');

	if ($this->form_validation->run('clientupload') != FALSE) {

	    $id = $this->clients_model->aUploadClient();
	    if($id != FALSE) {
		$this->session->set_flashdata('success', 'Успешно загружено');
		redirect('admin/clients');
	    }
	}
	else {
	    $data['title'] = 'Загрузки изображения';
	    $data['page'] = 'clients/upload';
	    $this->load->view('template', $data);
	}
    }

    function deleteclients() {

	$this->load->model('clients_model');

	$id = (int)$this->uri->segment(3);
	if($id == FALSE)
	    show_404('page');
	else {
	    if($this->clients_model->aDeleteClient($id)) {
		$this->session->set_flashdata('success', 'Удалено!');
		redirect('admin/clients');
	    }
	}
    }

    function panorama() {
	$this->load->model('panorama_model');

	$data['panorama'] = $this->panorama_model->aGetPanorama();

	$data['title'] = 'Панорамы';
	$data['page'] = 'panorama/multiple';
	$this->load->view('template', $data);
    }

    function uploadpanorama() {

	$this->load->model('panorama_model');

	if ($this->form_validation->run('panoramaupload') != FALSE) {

	    $id = $this->panorama_model->aUploadPanorama();
	    if($id != FALSE) {
		$this->session->set_flashdata('success', 'Панорама успешно загружена');
		redirect('admin/panorama');
	    }
	}
	else {

	    $data['panorama'] = $this->panorama_model->aGetPanoramaFiles();

	    $data['title'] = 'Загрузки изображения';
	    $data['page'] = 'panorama/newsingle';
	    $this->load->view('template', $data);
	}
    }

    function editpanorama() {

	$this->load->model('panorama_model');
	$id = (int)$this->uri->segment(3);
	$data['panorama'] = $this->panorama_model->aGetPanoramaFiles();
	$data['post'] = $this->panorama_model->aGetSinglePanorama($id);
	if($data['post'] != FALSE) {
	    if ($this->form_validation->run('panoramaupload') != FALSE) {

		$this->panorama_model->aUpdatePanorama($id);
		if($id != FALSE) {
		    $this->session->set_flashdata('success', 'Панорама успешно обновлена');
		    redirect('admin/panorama');
		}
	    }
	    $data['title'] = 'Редактирование панорамы';
	    $data['page'] = 'panorama/single';
	    $this->load->view('template', $data);
	}
	else{
	    show_404();
	}
    }

    function deletepanorama() {

	$this->load->model('panorama_model');

	$id = (int)$this->uri->segment(3);
	if($id == FALSE)
	    show_404('page');
	else {
	    if($this->panorama_model->aDeletePanorama($id)) {
		$this->session->set_flashdata('success', 'Удалено!');
		redirect('admin/panorama');
	    }
	}
    }

    function messages() {
	$this->load->model('messages_model');
	$this->load->library('pagination');

	$config['base_url'] = site_url('adminpanel/admin/messages');
	$config['total_rows'] = $this->db->get('messages')->num_rows();
	$config['per_page'] = '20';
	$config['uri_segment'] = 4;

	$this->pagination->initialize($config);
	$data['pagination'] = $this->pagination->create_links();

	$data['messages'] = $this->messages_model->aGetMessagesList($config['per_page'], $this->uri->segment(4));

	$data['title'] = 'Просмотр сообщений';
	$data['page'] = 'messages/multiple';
	$this->load->view('template', $data);
    }

    function deletemessage() {
	$this->load->model('messages_model');

	$id = (int)$this->uri->segment(3);
	if($id == FALSE)
	    show_404('page');
	else {
	    if($this->messages_model->aDeleteMessage($id)) {
		$this->session->set_flashdata('success', 'Сообщение успешно удалено!');
		redirect('admin/messages');
	    }
	}
    }

    function _remap($method) {
	if($this->session->userdata('logged_in') == TRUE) {
	    $this->$method();
	}
	else {
	    redirect('authorization');
	}
    }
}
