<?php

class Messages_model extends Model {

	function  Messages_model()
	{
		parent::Model();
	}

	function aGetMessagesList($limit = FALSE, $offset = FALSE){

	    $this->db->select('id, name, email, time, message, status');
	    $this->db->order_by('time', 'desc');

	    $query = $this->db->get('messages', $limit, $offset);

	    if($query->num_rows() > 0){
		return $query->result_array();
	    }

	    return FALSE;
	}

	function aSetStatus($id){

	    $data = array(
		'status' => '1',
	    );

	    $this->db->where('id', $id);
	    $this->db->update('messages', $data);

	    return $this->db->insert_id();
	}

	function aDeleteMessage($id) {
	    $this->db->where('id', $id);
	    $this->db->delete('messages');

	    return TRUE;
	}

	function aGetMessage($id){

	    $this->db->where('id', $id);
	    $query = $this->db->get('messages', 1);

	    if($query->num_rows() > 0){
		return $query->row_array();
	    }

	    return FALSE;
	}

}