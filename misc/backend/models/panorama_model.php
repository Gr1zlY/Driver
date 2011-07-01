<?php

class Panorama_model extends Model {

	function Panorama_model()
	{
		parent::Model();
	}

	function aGetPanorama($limit = FALSE, $offset = FALSE){

		$this->db->select('id, image, text, order');

		$query = $this->db->get('panorama', $limit, $offset);

		if ($query->num_rows() > 0)
			return $query->result_array();

		return FALSE;
	}

	function aUploadPanorama(){

	    $image = $this->_image();
	    if($image != FALSE){

		$data = array(
			'image' => $image,
			'panorama' =>$this->input->post('panorama'),
			'text' => $this->input->post('text'),
			'title' => $this->input->post('title'),
			'order' => $this->input->post('order'),
		);

		$this->db->insert('panorama', $data);

		return $this->db->insert_id();
	    }
	    else
		return FALSE;
	}

	function aUpdatePanorama($id){

		$data = array(
			'text' => $this->input->post('text'),
			'title' => $this->input->post('title'),
			'order' => $this->input->post('order'),
			'panorama' =>$this->input->post('panorama'),
		);

		$this->db->where('id', $id);
		$this->db->update('panorama', $data);

		return $this->db->insert_id();
	}

	function aGetSinglePanorama($id){

		$this->db->where('id', $id);

		$this->db->limit(1);
		$query = $this->db->get('panorama');

		if ($query->num_rows() > 0)
			return $query->row_array();

		return FALSE;
	}

	function aDeletePanorama($id){

		if(isset($id)){

			$image = $this->aGetPanorama($id);

			unlink ('.'.$image['image']);
			unlink ('.'.$image['panorama']);

			$this->db->where('id', $id);
			$this->db->delete('panorama');

			return TRUE;
		}

		return FALSE;
	}

	function _image(){

		$config['upload_path'] = './../panorama/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['overwrite'] = TRUE;
		$config['encrypt_name'] = TRUE;
		//$config['max_width'] = '200';
		//$config['max_height'] = '100';

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

	function aGetPanoramaFiles(){
	    $this->load->helper('file');
	    return get_filenames('./../panorama/');
	}
	/*function _panorama(){

		$config['upload_path'] = './../panorama/';
		$config['allowed_types'] = 'swf';
		$config['overwrite'] = TRUE;
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);

		if(!$this->upload->do_upload('userfile2')){
			echo $this->upload->display_errors();
			return FALSE;
		}
		else {
			$config['upload_path'] = substr($config['upload_path'], 4);
			$data = $this->upload->data();
			return $config['upload_path'].$data['file_name'];
		}

		return FALSE;
	}*/
}
