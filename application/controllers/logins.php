<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logins extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('Login_model');
	}

	
	public function check(){

		if($this->input->post('email1') == null){
			$this->session->set_flashdata('email1', 'email cannot be empty');
			redirect('/');
		}
		if($this->input->post('password1') == null){
			$this->session->set_flashdata('password1', 'password cannot be empty');
			redirect('/');
		}


		$exists = $this->Login_model->get_user_by_email($this->input->post('email1'));

		if($exists){

			$userpassword = $this->input->post('password1');

			if($exists['password']==md5($userpassword)){
				$usersession = array(
									'id'=>$exists['id'],
									'name' => $exists['name'],
									'alias' => $exists['alias'],
									'email' => $exists['email'],
									'dob' => $exists['dob'],
									'is_logged_in' => true
									);

				$this->session->set_userdata('id', $exists['id']);
				$this->session->set_userdata('name', $exists['name']);
				$this->session->set_userdata('alias', $exists['alias']);
				$this->session->set_userdata('dob', $exists['dob']);
				$this->session->set_userdata('email', $exists['email']);
				redirect('/welcome');
			}
			
			else {
				$this->session->set_flashdata('loginfail', "The email and password you entered don't match!");
				redirect('/');
			}
		}
		
		else {
				$this->session->set_flashdata('loginfail', "The email and password you entered don't match!");
				redirect('/');
			}

	}

	public function destroy(){
		$this->session->set_flashdata('destroy', "You have been logged off.");
		$this->session->unset_userdata('email');
		$this->session->sess_destroy();
		redirect('/');
	}


}


