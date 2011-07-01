<?
class Contact_model extends CI_Model {

    function __construct() {
	parent::__construct();
    }

    function get_messages($limit, $offset){

	$this->db->order_by('time', "desc");
	$query = $this->db->get('messages', $limit, $offset);

	if($query->num_rows() > 0){
	    return $query->result_array();
	}
	return FALSE;
    }

    function delete_message($id){

	$this->db->where('id', $id);
	$this->db->delete('messages');

	return TRUE;
    }
}