<?php

class Clients_model extends Model {

	function Clients_model()
	{
		parent::Model();
	}

	function aGetClients($limit = FALSE, $offset = FALSE){

		$this->db->select('id, image, text, order, link');

		$query = $this->db->get('clients', $limit, $offset);

		if ($query->num_rows() > 0)
			return $query->result_array();

		return FALSE;
	}

	function aUploadClient(){

	    $image = $this->_image();
	    if($image != FALSE){

		$data = array(
			'image' => $image,
			'text' => $this->input->post('text'),
			'link' => $this->input->post('link'),
			'preview' => FALSE,
			'order' => $this->input->post('order'),
		);

		$this->db->insert('clients', $data);

		return $this->db->insert_id();
	    }
	    else
		return FALSE;
	}

	function aUpdateClients($id){

		$data = array(
			'text' => $this->input->post('text'),
			'link' => $this->input->post('link')
		);

		$this->db->where('id', $id);
		$this->db->update('clients', $data);

		return $this->db->insert_id();
	}

/*	function aGetClients($id){

		$this->db->where('id', $id);

		$this->db->limit(1);
		$query = $this->db->get('clients');

		if ($query->num_rows() > 0)
			return $query->row_array();

		return FALSE;
	}*/

	function aDeleteClient($id){

		if(isset($id)){

			$image = $this->aGetClients($id);

			unlink ('.'.$image['image']);

			$this->db->where('id', $id);
			$this->db->delete('clients');

			return TRUE;
		}

		return FALSE;
	}

	function _image(){

		$config['upload_path'] = './../clients/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['overwrite'] = TRUE;
		$config['encrypt_name'] = TRUE;
		$config['max_width'] = '73';

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
