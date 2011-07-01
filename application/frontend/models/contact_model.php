<?
class Contact_model extends CI_Model {

    function __construct() {
	parent::__construct();
    }

    function save_message(){

	$data = array(
	    'message' => $this->input->post('message'),
	    'name' => $this->input->post('name'),
	    'phone' => $this->input->post('phone'),
	    'email' => $this->input->post('email'),
	    'ip' => $this->input->ip_address(),
	    'time' => time()
	);

	$this->db->insert('messages', $data);

	return $this->db->insert_id();
    }

    function delete_message($id){

	$this->db->where('id', $id);
	$this->db->delete('messages');

	return TRUE;
    }
}