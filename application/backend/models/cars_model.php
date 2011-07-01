<?
class Cars_model extends CI_Model {

    function __construct() {
	parent::__construct();
    }

    function get_cars($limit = FALSE, $offset = FALSE){

	$query = $this->db->get('cars', $limit, $offset);

	if($query->num_rows() > 0){
	    return $query->result_array();
	}
	return FALSE;
    }

    function delete_car($id){

	$this->db->where('id', $id);
	$this->db->delete('cars');

	return TRUE;
    }

    function add_car(){

	$data = array(
	    'title' => $this->input->post('title'),
	    'description' => $this->input->post('description'),
	    'image' => $this->upload_image(),
	    'class' => $this->input->post('class'),
	);

	$this->db->insert('cars', $data);

	return $this->db->insert_id();
    }

    function update_car($id){

	$data = array(
	    'title' => $this->input->post('title'),
	    'description' => $this->input->post('description'),
	    'class' => $this->input->post('class'),
	);

	$image =  $this->upload_image();
	if($image != FALSE){
	    $data['image'] = $image;
	}
	
	$this->db->where('id', $id);
	$this->db->update('cars', $data);

	return TRUE;
    }

    function get_car($id){

	$this->db->where('id', $id);
	$query = $this->db->get('cars', 1);

	if($query->num_rows() > 0){
	    return $query->row_array();
	}
	return FALSE;
    }

    function upload_image(){
	
	$config['upload_path'] = './../uploads/';
	$config['allowed_types'] = 'gif|jpg|png';
	//$config['max_width']  = '300';
	$config['encrypt_name'] = TRUE;
	$config['overwrite'] = TRUE;

	$this->load->library('upload', $config);

	if( ! $this->upload->do_upload()){
	    echo $this->upload->display_errors();
	    return FALSE;
	}
	else{
	    $config['upload_path'] = substr($config['upload_path'], 4);
	    $data = $this->upload->data();
	    return $config['upload_path'].$data['file_name'];
	}
    }

    function get_title($id){
	
	$this->db->select('title, class');
	$this->db->where('id', $id);
	$query = $this->db->get('cars', 1);

	if($query->num_rows() > 0){
	    return $query->row_array();
	}
	return FALSE;
    }
    
}