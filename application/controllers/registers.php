<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registers extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("Register_model");
		$this->load->model("Login_model");
	}

	public function add(){

		$dob = '';

		$info = $this->input->post();


		if(checkdate($info['month'], $info['day'], $info['year']) === false){
			$this->session->set_flashdata('dob', 'not a valid birthday');
			redirect('/');
		}
		if($info['month'] < 10 && $info['day'] < 10){
			$month = '0' .$info['month'];
			$day = '0' . $info['day'];
			$dob = $month. "/" .$day. "/" .$info['year'];		
		}

		if($info['month'] >= 10 && $info['day'] < 10){
			$month = $info['month'];
			$day= '0' . $info['day'];
			$year = $info['year'];
			$dob= $month. "/" .$day. "/" .$year;
		}

		if($info['month'] < 10 && $info['day'] >= 10){
			$month = '0' .$info['month'];
			$dob = $month. "/" .$info['day']. "/" .$info['year'];
		}

		if($this->input->post('name') == null){
		 	$this->session->set_flashdata('name', 'name cannot be empty');
		 	redirect('/');
		 }
		 if($this->input->post('alias') == null){
		 	$this->session->set_flashdata('alias', 'alias cannot be empty');
		 	redirect('/');
		 }
		 if($this->input->post('email') == null){
		 	$this->session->set_flashdata('email', 'email cannot be empty');
		 	redirect('/');
		 }
		

			
		$enc_password=md5($this->input->post('password'));
		$data = array(
			"name" => $info['name'],
			"alias" => $info['alias'],
			"email" => $info['email'],
			"dob" => $dob,
			"password" => $enc_password
			);

		$user_added = $this->Register_model->add_user($data);

		$email = $info['email'];

		$id = $this->Register_model->get_user_by_email($email);

		if($user_added){

			$this->session->set_userdata('id', $id['id']);
			$this->session->set_userdata('name', $info['name']);
			$this->session->set_userdata('alias', $info['alias']);
			$this->session->set_userdata('dob', $dob);
			$this->session->set_userdata('email', $info['email']);
			redirect('/welcome');
		}	
	}




}