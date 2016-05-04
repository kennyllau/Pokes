<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Los_Angeles');

class Register_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
		$this->load->library("form_validation");
	}

	function add_user($user){

		$this->form_validation->set_rules("email", "Email", "trim|required|valid_email|is_unique[users.email]");

		if($this->form_validation->run()===FALSE){
			$this->session->set_flashdata('bademail', "Email has been taken.");
			redirect('/');
		}

		$this->form_validation->set_rules("password", "password", "trim|required|min_length[8]|matches[conpassword]");	
		if($this->form_validation->run()===FALSE){
			$this->session->set_flashdata('badpassword', "Password must be 8 characters long and matching.");
			redirect('/');
		}	
		else {
			$a = 0;
		$query = "INSERT INTO users(name, alias, email, dob, password, poke_count, created_at) values (?,?,?,?,?,?,?)";
		$values = array($user['name'], $user['alias'], $user['email'], $user['dob'], $user['password'], 0, date("Y-m-d, H:i:s"));

		return $this->db->query($query, $values);
		}
	}

	function get_all_users(){
		return $this->db->query("SELECT * FROM users")->result_array();
	}

	function get_user_by_email($email){
		return $this->db->query("SELECT * FROM users where email=?", array($email))->row_array();
	}


}