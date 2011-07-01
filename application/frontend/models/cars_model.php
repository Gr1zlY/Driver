<?
class Cars_model extends CI_Model {

    function __construct() {
	parent::__construct();
    }

    function get_cars(){
	
	$this->db->select('id, title, description, image, class');
	$query = $this->db->get('cars');
	
	if($query->num_rows() > 0){
	    return $query->result_array();
	}

	return FALSE;
    }

    function get_car($id){

	$this->db->select('title, description, image');
	$this->db->where('id', $id);
	$query = $this->db->get('cars', 1);

	if($query->num_rows() > 0){
	    return $query->row_array();
	}
	
	return FALSE;
    }
}