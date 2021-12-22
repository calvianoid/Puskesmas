<?php 
 
class Login extends CI_Controller{
	function __construct(){
		parent::__construct();		
		$this->load->model('m_login');
 
	}
 
	function index(){
		$this->load->view('v_login');
	}
 
	function aksi_login(){
		$nama_user = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'nama_user' => $nama_user,
			'password' => md5($password),
			);
		$cek = $this->m_login->cek_login("tbl_user",$where)->num_rows();
		$data = $this->m_login->ambil_data_user();
		if($cek > 0){
			$data_session = array(
				'nama_user' 	=> $nama_user,
				'status'  		=> "login",
				);
			$this->session->set_userdata($data_session);
			if($this->session->userdata('nama_user') == "admin"){
				redirect(base_url("Menu/Utama"));
			}
			elseif($this->session->userdata('nama_user') == "calviano"){
				redirect(base_url("Menu/Utama1"));
			}
			elseif($this->session->userdata('nama_user') == "deiska"){
				redirect(base_url("Menu/Utama2"));
			}
			elseif($this->session->userdata('nama_user') == "cindy"){
				redirect(base_url("Menu/Utama3"));
			};
		}else{
			redirect(base_url('login'));
		}
    }
    
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}