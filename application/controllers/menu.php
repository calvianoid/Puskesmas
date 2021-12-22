<?php
class Menu extends CI_CONTROLLER
{   
    function __construct()
    {
        parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
        $this->load->helper(array('form','url'));
        $this->load->database();
        $this->load->helper('form');
        $this->load->model('m_utama');
        
    }

    function Utama()
    {
        $this->load->library('pagination');
        $this->load->view('v_admin');
    }   

    function Utama1()
    {
        $this->load->library('pagination');
        $this->load->view('v_resepsionis');
    }

    function Utama2()
    {
        $this->load->library('pagination');
        $this->load->view('v_apoteker');
    }   

    function Utama3()
    {
        $this->load->library('pagination');
        $this->load->view('v_dokter');
    }   
}