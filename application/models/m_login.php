<?php 
 
class M_Login extends CI_Model{	
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}	
	function ambil_data_user(){
        $query = $this->db->get('tbl_user');
        return $query->result();
    }
}