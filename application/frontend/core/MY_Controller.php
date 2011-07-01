<?

class MY_Controller extends CI_Controller {

    public function __construct() {
	parent::__construct();
    }

	function _get_meta($data){

		if(!is_string($data) AND (is_array($data)  OR count($data) != 0)){
			return array(
					'meta_tags' => $data['meta_tags'],
					'meta_description' => $data['meta_description'],
					'title' => $data['title']
				);
		}
		else if(is_string($data)){
			return $this->config->item($data);
		}
		else{
			return $this->config->item('index');
		}
	}
}