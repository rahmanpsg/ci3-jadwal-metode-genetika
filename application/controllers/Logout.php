<?php 
	/**
	* 
	*/
	class Logout extends CI_Controller
	{
		
		public function index(){
			$this->load->library('session');
			session_destroy();
			redirect('/login','refresh');
		}
	}
?>