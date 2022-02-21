<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *  Dashboad class for the dashboard related stuff
 */
class Dashboard extends CI_Controller {

	/** call the Construct function */
	public function __construct() {

	   parent::__construct();
	   /** Load the Api_model model */
		$this->load->model('api_model');
	}

	/** Defualt index function  */
	public function index() {

		/** Get Total Numbers of Partners */
		$data['partners'] = $this->api_model->getRowCount('partners', 'id');

		/** Get Total Numbers of Api Request count */
		$data['total_api_request_count'] = $this->api_model->getRowCount('partners_api_request_count','id');

		/** Get Total Numbers of Api Request count By Partner 1 */
		$data['partner1_api_request_count'] = $this->api_model->getRowCount('partners_api_request_count','id',array('partner_id' => 1));

		/** Get Total Numbers of Api Request count By Partner 2 */
		$data['partner2_api_request_count'] = $this->api_model->getRowCount('partners_api_request_count','id',array('partner_id' => 2));

		$allPartners = $this->api_model->getRows('partners','*');
		if(!empty($allPartners)){
			foreach($allPartners as $key => $value){
				$allPartners[$key]['api_request_count'] = $this->api_model->getRowCount('partners_api_request_count','id', array('partner_id'=>$value['id']));
			}
			$data['all_partners'] = $allPartners;
		}

		/** Load the view file */
		$this->load->view('dashboard', $data);

	}

	/** Add partner function */
	public function add_partner(){

		/** Check name and Email feild not exist */
		if($this->input->post('name') !='' && $this->input->post('email') !=''){

			/** Create array data for the insert */
			$arrayData = array(
				'name'=> $this->input->post('name'),
				'email'=> $this->input->post('email'),
				'api_access_key'=> md5($this->input->post('email')),
			);

			/** Check email already exist or not */
			$checkDataEmail = $this->api_model->getRow('partners', 'id', array('email'=>$this->input->post('email')));
			if(empty($checkDataEmail)){
				/** Insert partner data */
				$insert = $this->api_model->insertRecord('partners', $arrayData);
				if($insert){
					$data = array(
						'status'=>true,
						'message'=>'Partner Addedd successfully!!'
					);
				}
			} else {
				$data = array(
					'status'=>false,
					'message'=>'Email Already exist!!'
				);
			}
		} else {
			$data = array(
				'status'=>false,
				'message'=>'Name & Email feild id required!'
			);
		}
		echo json_encode($data);
	}

	/** Function for the filter data */
	public function filter_data(){
		$start_date = date('Y-m-d', strtotime($this->input->post('start_date')));
		$end_date = date('Y-m-d', strtotime($this->input->post('end_date')));

		$getPartners = $this->api_model->getRows('partners','id');
		if(!empty($getPartners)){
			foreach( $getPartners as $key => $val){
				$getRequestCount = $this->api_model->getRowCount('partners_api_request_count','id', array('partner_id'=> $val['id']), 'date_time BETWEEN "'.$start_date.'" AND "'.$end_date.'" ');
				$getPartners[$key]['total_request'] = $getRequestCount;
			}

			$totalApiRequest = $this->api_model->getRowCount('partners_api_request_count','id', array(), 'date_time BETWEEN "'.$start_date.'" AND "'.$end_date.'" ');
			$getPartners['total_api_request'] = $totalApiRequest;

			echo json_encode(array('status'=>true, 'data'=>$getPartners));
		}
	}

	/** Common function for the generate API access key for the partners */
	private function genrate_api_access_key(){
		/** App API Key */
		$apiKey = "admfgjvhjkadf#$%^&v983475r834w758e34";

		/** App Api secret key */
		$secretKey = "secrfsgvkjclja;ks,43783973w$%^&*(etkey";
		
		/** Generates a random string of ten digits */
		$salt = mt_rand();

		/** Computes the signature by hashing the salt with the secret key as the key */
		$signature = hash_hmac('sha256', $salt, $secretKey, true);
		
		/** base64 encode */
		$encodedSignature = base64_encode($signature);
		
		/** urlencode */
		$encodedSignature = urlencode($encodedSignature);

		/** Return string */
		return $encodedSignature;
	}
}
