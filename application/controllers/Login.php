<?php 
/**
* 
*/
class Login extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		switch ($this->session->userdata('hasLogin')) {
			case 'admin':
				redirect('admin/');
				break;
		}
	}

	function index(){
		$this->load->view('login/index');
	}

	function cekLogin(){
		$keys = array_column($this->input->post('data'),'name');
		$values = array_column($this->input->post('data'),'value');

		$data = array_combine($keys,$values);

		$user = $data['username'];
        $pass = $data['password'];

		$cek = $this->db->get_where('tbl_admin',array('username'=>$user,'password'=>$pass))->result_array();

		if (count($cek) > 0) {
			$res = true;
            $set = array("hasLogin"=>'admin',"nama"=>$cek[0]['nama']);
            $this->session->set_userdata($set);
		}else{
			$res = false;
		}

		echo json_encode($res);
	}
}
 ?>