<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logins extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('Login_model');
	}

	
	public function check(){

		$exists = $this->Login_model->get_user_by_email($this->input->post('email'));

		if($exists){

			$userpassword = $this->input->post('password');
			if($exists['password']==md5($userpassword)){
				$usersession = array(
									'id'=>$exists['id'],
									'first_name' => $exists['first_name'],
									'last_name' => $exists['last_name'],
									'email' => $exists['email'],
									'is_logged_in' => true
									);

				$this->session->set_userdata('info', $usersession);
				redirect('/welcome_page');
			}
			
		}
		else {
			$this->session->set_flashdata('loginfail', "The email and password you entered don't match!");
			redirect('/');
		}

	}

	public function destroy(){
		$this->session->set_flashdata('destroy', "You have been logged off.");
		$this->session->sess_destroy();
		redirect('/');
	}


}


