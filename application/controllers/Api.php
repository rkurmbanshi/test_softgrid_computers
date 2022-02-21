<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/API_Controller.php';

class Api extends API_Controller {

	/** call the Construct function */
	public function __construct() {

		parent::__construct();
		/** Load the Api_model model */
		 $this->load->model('api_model');
	}

	public function get_profile() {

		header("Access-Control-Allow-Origin: *");
	
        $user_data = $this->_apiConfig([
            'methods' => ['GET'], // Check the method type
            'requireAuthorization' => false, //requireAuthorization false
        ]);

		/** Check API Access Key is valid or not */
		$api_access_key = $this->input->get('api_access_key');
		if(isset($api_access_key) && $api_access_key !=''){
			$data = $this->api_model->getRowCount('partners', 'id', array('api_access_key'=>$api_access_key));
			if(!empty($data)){
				$userData = $this->api_model->getRow('partners', 'id, name, email', array('api_access_key'=>$api_access_key));
				if(!empty($userData)){
					$this->record_api_request($userData['id']);
				}
				$response = array('status' => true, 'data' => $userData);
				$response_code = 200;
			} else {
				$response = array('status' => false, 'message' => "Invalid Api Access Key!");
				$response_code = 404;
			}
		} else {
			$response = array('status' => false, 'message' => "Api Access Key is required!");
			$response_code = 400;	
		}

		$this->api_return($response, $response_code);
		
	}

	/** Common function for the insert each api request call */
	private function record_api_request($partner_id){
		/** Check partner id exist or not */
		if(!empty($partner_id)){
			/** Insert record in database */
			$this->api_model->insertRecord('partners_api_request_count', array('partner_id'=>$partner_id));
		}
	}

}
