<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registers extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("Register_model");
	}

	public function add(){

		$dob ='';

		$info = $this->input->post();

		if($info['month'] < 10 && $info['date'] < 10){

			$month = '0' .$info['month'];
			$date = '0' . $info['date'];

			$dob = $month. "/" .$date. "/" .$info['year'];
			
		
		}

		if($info['month'] >= 10 && $info['date'] < 10){
			$month = $info['month'];
			$date= '0' . $info['date'];
			$year = $info['year'];

			$dob= $month. "/" .$date. "/" .$year;

		}

		if($info['month'] < 10 && $info['date'] >= 10){
			$month = '0' .$info['month'];

			$dob = $month. "/" .$info['date']. "/" .$info['year'];
		}



		var_dump($info['email']);
		die();
		// else{
		// 	$dob += $info['month'];
		// }

		// if($info['date']< 10){
		// 	$date= '0'.$info['date'];
		// 	$dob += .$date;
		// }
		// else{
		// 	$dob += .$info['date'];
		// }



		



		// var_dump($dob);
		// die();





		$enc_password=md5($this->input->post('password'));
		$data = array(
			"first_name" => $info['first_name'],
			"last_name" => $info['last_name'],
			"email" => $info['email'],
			"password" => $enc_password
			);

		$user_added = $this->Register_model->add_user($data);

		if($user_added){

			$user = $this->Login_model->get_user_by_email($info['email']);

			$usersession = array(
				'id'=>$user['id'],
				'first_name' => $user['first_name'],
				'last_name' => $user['last_name'],
				'email' => $user['email'],
				'is_logged_in' => true
				);
			$this->session->set_userdata('info', $usersession);
			redirect('/welcome_page');
		}	
	}




}