<?
class Order_model extends CI_Model {

    function __construct() {
	parent::__construct();
    }

    function make_order(){

	$data = array(
	    'name' => $this->input->post('name'),
	    'surname' => $this->input->post('surname'),
	    'arrival' => $this->input->post('arrival'),
	    'arrival_time' => $this->input->post('arrival_time'),
	    'flight' => $this->input->post('flight'),
	    'cell' => '+'.$this->input->post('cellcountrycode').'('.$this->input->post('cellcode').')'.$this->input->post('cellphone'),
	    'payment' => $this->input->post('payment'),
	    'email' => $this->input->post('email'),
	    'comment' => $this->input->post('comment'),
	    'ip' => $this->input->ip_address(),
	    'time' => time(),
	    'car_id' => $this->uri->segment(3),
	);

	$this->db->insert('orders', $data);

	return $this->db->insert_id();
    }
}