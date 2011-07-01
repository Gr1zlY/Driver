<?
class Order_model extends CI_Model {

    function __construct() {
	parent::__construct();
    }

    function get_orders($limit, $offset){

	$this->db->order_by('time', "desc");
	$query = $this->db->get('orders', $limit, $offset);

	if($query->num_rows() > 0){
	    return $query->result_array();
	}
	return FALSE;
    }

    function delete_order($id){
	
	$this->db->where('id', $id);
	$this->db->delete('orders');

	return TRUE;
    }
}