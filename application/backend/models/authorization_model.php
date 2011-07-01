<?
class Authorization_model extends CI_Model {

    function __construct() {
	parent::__construct();
    }

    function login() {

	$this->db->where('login', $this->input->post('login'));
	$this->db->where('password', $this->input->post('password'));

	$query = $this->db->get('members', 1);

	if($query->num_rows() > 0) {

	    $data = $query->row_array();

	    $this->session->set_userdata('logged_in', TRUE);
	    $this->session->set_userdata($data);

	    $this->update_login_date($data['id']);

	    return $data;
	}
	return FALSE;
    }

    private function update_login_date($id) {

	$this->db->set('last_login', time());
	$this->db->set('ip', $this->input->ip_address());
	$this->db->where('id', $id);
	$this->db->update('members');

	return TRUE;
    }

    public function update_user_data($user_id) {

	$data = array(
		'name' => $this->input->post('name'),
		'login' => 'admin',
		'permissions' => '777',
	);
	if($this->input->post('password') != FALSE)
	    $data['password'] = $this->input->post('password');

	$this->db->where('id', $user_id);
	$this->db->update('members', $data);

	return $this->db->insert_id();
    }

    public function get_user_data($user_id) {

	$this->db->select('id, permissions, name, login');
        $this->db->where('id', $user_id);

	$query = $this->db->get('members', 1);

	if($query->num_rows() > 0)
	    return $query->row_array();

	return FALSE;
    }
}