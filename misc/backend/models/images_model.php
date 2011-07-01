<?php

class Images_model extends Model {

	function Images_model()
	{
		parent::Model();
	}

	function aGetImages($limit = FALSE, $offset = FALSE){

		$this->db->select('id, image, alt, order');

		$query = $this->db->get('images', $limit, $offset);

		if ($query->num_rows() > 0)
			return $query->result_array();

		return FALSE;
	}

	function aUploadImage(){

	    $image = $this->_image();
	    if($image != FALSE){

		$data = array(
			'image' => $this->_image(),
			'alt' => $this->input->post('alt'),
			'preview' => FALSE,
			'order' => $this->input->post('order'),
		);

		$this->db->insert('images', $data);

		return $this->db->insert_id();
	    }
	    else
		return FALSE;
	}

	function aUpdatePost($id){

		$data = array(
			'alt' => $this->input->post('alt'),
		);

		$this->db->where('id', $id);
		$this->db->update('images', $data);

		return $this->db->insert_id();
	}

	function aGetImage($id){

		$this->db->where('id', $id);

		$this->db->limit(1);
		$query = $this->db->get('images');

		if ($query->num_rows() > 0)
			return $query->row_array();

		return FALSE;
	}

	function aDeleteImage($id){

		if(isset($id)){

			$image = $this->aGetImage($id);

			unlink ('.'.$image['image']);

			$this->db->where('id', $id);
			$this->db->delete('images');

			return TRUE;
		}

		return FALSE;
	}
	
	function _image(){

		$config['upload_path'] = './../images/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['overwrite'] = TRUE;
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);

		if(!$this->upload->do_upload('userfile')){
			echo $this->upload->display_errors();
			return FALSE;
		}
		else {
			$config['upload_path'] = substr($config['upload_path'], 4);
			$data = $this->upload->data();
			return $config['upload_path'].$data['file_name'];
		}

		return FALSE;
	}
}
