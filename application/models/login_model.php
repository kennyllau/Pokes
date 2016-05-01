<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Los_Angeles');

class Login_model extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->library("form_validation");
		
	}

	function get_user_by_email($email){
		$query = "SELECT * FROM users WHERE email=?";
		$values = array($email);
		return $this->db->query($query, $values)->row_array();
	}


}