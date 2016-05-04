<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class main extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('Main_model');
			
	}

	public function index(){
		
		$this->load->view('login_page');
	}



	public function welcome(){

		$id = $this->Main_model->get_id_by_email($this->session->userdata('email'));

		$other_user = $this->Main_model->get_otheruser_info($id['id']);				//$id['id'] refers to ^
			//get user for bottom table

		$total_pokes = $this->Main_model->total_pokes($id['id']);
			// get total pokes with user

		$total_poke_count = $this->Main_model->total_poke_count($id['id']);
			// get count of people that poked user

		$people_count = $this->Main_model->people_count($id['id']);
			// get people who poked user

		// var_dump($id);
		// var_dump($other_user);
		// var_dump($total_pokes);
		// var_dump($total_poke_count);
		// var_dump($people_count);
		// die();

		$all_data = array(
			
			'other_user' => $other_user,
			'total_pokes' => $total_pokes,
			'total_poke_count' => $total_poke_count,
			'people_count' => $people_count
			);
					
		$this->load->view('welcome_page', $all_data);
	}



	public function addpoke($id){

		$username = $this->session->userdata('alias');
		$userid = $this->session->userdata('id');

		$count = 1;	
		$user_count = 1;

		$get_count = $this->Main_model->add_count($count, $id);

		$get_user_count = $this->Main_model->add_user_count($userid, $id, $username, $user_count);
		
		
		redirect('/welcome');

	}












}














