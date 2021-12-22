<?php
class M_Utama extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    //MODELS
    //OBAT
    function ambil_data_obat(){
        $query = $this->db->select("*")
                 ->from('tbl_obat')
                 ->order_by('kode_obat', 'DESC')
                 ->get();
        return $query->result();
    }

    function ambil_data_obat2($kode_obat)
    {
        $this->db->where('kode_obat',$kode_obat);
        $query = $this->db->get('tbl_obat');
        return $query->result();
    }

    function simpan_obat()
    {
        $this->db->set('kode_obat',$this->input->post('kode_obat'));
        $this->db->set('nama_obat',$this->input->post('nama_obat'));
        $this->db->set('jenis_obat',$this->input->post('jenis_obat'));
        $this->db->set('dosis_aturan_obat',$this->input->post('dosis_aturan_obat'));
        $this->db->set('jumlah_obat',$this->input->post('jumlah_obat')); 
        $this->db->set('satuan',$this->input->post('satuan'));
        $this->db->set('harga_obat',$this->input->post('harga_obat'));  
        $this->db->insert('tbl_obat');
    }

    function hapus_obat($id)
    {
        $this->db->where('kode_obat',$id);
        $this->db->delete('tbl_obat');
    }

    function ubah_obat()
    {
        $this->db->set('kode_obat',$this->input->post('kode_obat'));
        $this->db->set('nama_obat',$this->input->post('nama_obat'));
        $this->db->set('jenis_obat',$this->input->post('jenis_obat'));
        $this->db->set('dosis_aturan_obat',$this->input->post('dosis_aturan_obat'));
        $this->db->set('jumlah_obat',$this->input->post('jumlah_obat')); 
        $this->db->set('satuan',$this->input->post('satuan'));
        $this->db->set('harga_obat',$this->input->post('harga_obat'));  
        $this->db->where('kode_obat',$this->input->post('kode_obat'));
        $this->db->update('tbl_obat');
    }

    public function listing_obat() 
    {
        $this->db->select('*');
        $this->db->from('tbl_obat');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_kode_obat() 
    {
        $id = 'KO-';
        $query = $this->db->query("SELECT MAX(kode_obat) as max_id FROM tbl_obat"); 
        $row = $query->row_array();
        $max_id = $row['max_id']; 
        $max_id1 =(int) substr($max_id,9,5);
        $kode_obat = $max_id1 +8;
        $maxid_obat = $id.sprintf("%02s",$kode_obat);
        return $maxid_obat;
       }

    //POLI
    function ambil_data_poli(){
        $query = $this->db->get('tbl_poli');
        return $query->result();
    }

    function ambil_data_poli2($id_poli)
    {
        $this->db->where('id_poli',$id_poli);
        $query = $this->db->get('tbl_poli');
        return $query->result();
    }

    function simpan_poli()
    {
        $this->db->set('id_poli',$this->input->post('id_poli'));
        $this->db->set('nama_poli',$this->input->post('nama_poli'));
        $this->db->set('ruang_poli',$this->input->post('ruang_poli'));
        $this->db->insert('tbl_poli');
    }

    function hapus_poli($id)
    {
        $this->db->where('id_poli',$id);
        $this->db->delete('tbl_poli');
    }

    function ubah_poli()
    {
        $this->db->set('id_poli',$this->input->post('id_poli'));
        $this->db->set('nama_poli',$this->input->post('nama_poli'));
        $this->db->set('ruang_poli',$this->input->post('ruang_poli'));
        $this->db->where('id_poli',$this->input->post('id_poli'));
        $this->db->update('tbl_poli');
    }

    //DOKTER
    function ambil_data_dokter(){
        $query = $this->db->get('tbl_dokter');
        return $query->result();
    }

    function ambil_data_dokter2($kode_dokter)
    {
        $this->db->where('kode_dokter',$kode_dokter);
        $query = $this->db->get('tbl_dokter');
        return $query->result();
    }

    function simpan_dokter()
    {
        $this->db->set('kode_dokter',$this->input->post('kode_dokter'));
        $this->db->set('nama_dokter',$this->input->post('nama_dokter'));
        $this->db->set('jenis_kelamin',$this->input->post('jenis_kelamin'));
        $this->db->set('nomor_induk_dokter',$this->input->post('nomor_induk_dokter'));
        $this->db->set('tempat_lahir',$this->input->post('tempat_lahir'));
        $this->db->set('tgl_lahir',$this->input->post('tgl_lahir'));
        $this->db->set('alamat',$this->input->post('alamat'));
        $this->db->set('id_poli',$this->input->post('id_poli'));   
        $this->db->insert('tbl_dokter');
    }

    function hapus_dokter($id)
    {
        $this->db->where('kode_dokter',$id);
        $this->db->delete('tbl_dokter');
    }

    function ubah_dokter()
    {
        $this->db->set('kode_dokter',$this->input->post('kode_dokter'));
        $this->db->set('nama_dokter',$this->input->post('nama_dokter'));
        $this->db->set('jenis_kelamin',$this->input->post('jenis_kelamin'));
        $this->db->set('nomor_induk_dokter',$this->input->post('nomor_induk_dokter'));
        $this->db->set('tempat_lahir',$this->input->post('tempat_lahir'));
        $this->db->set('tgl_lahir',$this->input->post('tgl_lahir'));
        $this->db->set('alamat',$this->input->post('alamat'));
        $this->db->set('id_poli',$this->input->post('id_poli'));  
        $this->db->where('kode_dokter',$this->input->post('kode_dokter'));
        $this->db->update('tbl_dokter');
    }

    public function listing_dokter() 
    {
        $this->db->select('*');
        $this->db->from('tbl_dokter');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_kode_dokter() 
    {
        $id = 'D-';
        $query = $this->db->query("SELECT MAX(kode_dokter) as max_id FROM tbl_dokter"); 
        $row = $query->row_array();
        $max_id = $row['max_id']; 
        $max_id1 =(int) substr($max_id,9,5);
        $kode_dokter = $max_id1 +5;
        $maxid_dokter = $id.sprintf("%02s",$kode_dokter);
        return $maxid_dokter;
    }

    //SUPPLIER
    function ambil_data_supplier(){
        $query = $this->db->get('tbl_supplier');
        return $query->result();
    }

    function ambil_data_supplier2($kode_supplier)
    {
        $this->db->where('kode_supplier',$kode_supplier);
        $query = $this->db->get('tbl_supplier');
        return $query->result();
    }

    function simpan_supplier()
    {
        $this->db->set('kode_supplier',$this->input->post('kode_supplier'));
        $this->db->set('nama_supplier',$this->input->post('nama_supplier'));
        $this->db->set('alamat',$this->input->post('alamat'));
        $this->db->set('no_telpon',$this->input->post('no_telpon'));  
        $this->db->insert('tbl_supplier');
    }

    function hapus_supplier($id)
    {
        $this->db->where('kode_supplier',$id);
        $this->db->delete('tbl_supplier');
    }

    function ubah_supplier()
    {
        $this->db->set('kode_supplier',$this->input->post('kode_supplier'));
        $this->db->set('nama_supplier',$this->input->post('nama_supplier'));
        $this->db->set('alamat',$this->input->post('alamat'));
        $this->db->set('no_telpon',$this->input->post('no_telpon'));  
        $this->db->where('kode_supplier',$this->input->post('kode_supplier'));
        $this->db->update('tbl_supplier');
    }

    //JADWAL PRAKTEK
    function ambil_data_jadwal_praktek()
    {
    $this->db->select('tbl_dokter.nama_dokter, tbl_dokter.id_poli, tbl_jadwal_praktek_dokter.id_jadwal, tbl_jadwal_praktek_dokter.kode_dokter, tbl_jadwal_praktek_dokter.hari, tbl_jadwal_praktek_dokter.jam_kerja');
    $this->db->join('tbl_dokter','tbl_jadwal_praktek_dokter.kode_dokter = tbl_dokter.kode_dokter');
    $this->db->group_by('tbl_jadwal_praktek_dokter.id_jadwal');
    return $this->db->get($this->table_jadwal)->result();
    }

    function ambil_data_jadwal_praktek2($id_jadwal)
    {
        $this->db->where('id_jadwal',$id_jadwal);
        $this->db->select('tbl_dokter.nama_dokter, tbl_dokter.id_poli, tbl_jadwal_praktek_dokter.id_jadwal, tbl_jadwal_praktek_dokter.kode_dokter, tbl_jadwal_praktek_dokter.hari, tbl_jadwal_praktek_dokter.jam_kerja');
        $this->db->join('tbl_dokter','tbl_jadwal_praktek_dokter.kode_dokter = tbl_dokter.kode_dokter');
        $this->db->group_by('tbl_jadwal_praktek_dokter.id_jadwal');
        return $this->db->get($this->table_jadwal)->result();
    }

    function simpan_jadwal_praktek()
    {
        $this->db->set('id_jadwal',$this->input->post('id_jadwal'));
        $this->db->set('kode_dokter',$this->input->post('kode_dokter'));
        $this->db->set('hari',$this->input->post('hari'));
        $this->db->set('jam_kerja',$this->input->post('jam_kerja'));  
        $this->db->set('id_poli',$this->input->post('id_poli')); 
        $this->db->insert('tbl_jadwal_praktek_dokter');
    }

    function hapus_jadwal_praktek($id)
    {
        $this->db->where('kode_jadwal_praktek',$id);
        $this->db->delete('tbl_jadwal_praktek_dokter');
    }

    function ubah_jadwal_praktek()
    {
        $this->db->set('id_jadwal',$this->input->post('id_jadwal'));
        $this->db->set('kode_dokter',$this->input->post('kode_dokter'));
        $this->db->set('hari',$this->input->post('hari'));
        $this->db->set('jam_kerja',$this->input->post('jam_kerja'));  
        $this->db->set('id_poli',$this->input->post('id_poli'));
        $this->db->where('id_jadwal',$this->input->post('id_jadwal')); 
        $this->db->update('tbl_jadwal_praktek_dokter');
    }

    //USERLEVEL
    function ambil_data_user_level(){
        $query = $this->db->get('tbl_user_level');
        return $query->result();
    }

    function ambil_data_user_level2($id_user_level)
    {
        $this->db->where('id_user_level',$id_user_level);
        $query = $this->db->get('tbl_user_level');
        return $query->result();
    }

    function simpan_user_level()
    {
        $this->db->set('id_user_level',$this->input->post('id_user_level'));
        $this->db->set('nama_level',$this->input->post('nama_level'));
        $this->db->insert('tbl_user_level');
    }

    function hapus_user_level($id)
    {
        $this->db->where('id_user_level',$id);
        $this->db->delete('tbl_user_level');
    }

    function ubah_user_level()
    {
        $this->db->set('id_user_level',$this->input->post('id_user_level'));
        $this->db->set('nama_level',$this->input->post('nama_level'));;  
        $this->db->where('id_user_level',$this->input->post('id_user_level'));
        $this->db->update('tbl_user_level');
    }

    //USER
    function ambil_data_user(){
        $query = $this->db->get('tbl_user');
        return $query->result();
    }

    function ambil_data_user2($id_user)
    {
        $this->db->where('id_user',$id_user);
        $query = $this->db->get('tbl_user');
        return $query->result();
    }

    function simpan_user()
    {
        $this->db->set('id_user',$this->input->post('id_user'));
        $this->db->set('nama_user',$this->input->post('nama_user'));
        $this->db->set('username',$this->input->post('username'));
        $password = $this->input->post('password');
        $this->db->set('password',md5($password));
        $this->db->set('images_user',$this->input->post('images_user'));
        $this->db->set('id_user_level',$this->input->post('id_user_level'));
        $this->db->insert('tbl_user');
    }

    function hapus_user($id)
    {
        $this->db->where('id_user',$id);
        $this->db->delete('tbl_user');
    }

    function ubah_user()
    {
        $this->db->set('id_user',$this->input->post('id_user'));
        $this->db->set('nama_user',$this->input->post('nama_user'));
        $this->db->set('username',$this->input->post('username'));
        $password = $this->input->post('password');
        $this->db->set('password',md5($password));
        $this->db->set('images_user',$this->input->post('images_user'));
        $this->db->set('id_user_level',$this->input->post('id_user_level'));
        $this->db->where('id_user',$this->input->post('id_user'));
        $this->db->update('tbl_user');
    }

    //PENDAFTARAN
    function ambil_data_pendaftaran(){
        $query = $this->db->get('tbl_pendaftaran');
        return $query->result();
    }

    function ambil_data_pendaftaran2($kode_pendaftaran)
    {
        $this->db->where('kode_antrian',$kode_pendaftaran);
        $query = $this->db->get('tbl_pendaftaran');
        return $query->result();
    }

    function simpan_pendaftaran()
    {
        $this->db->set('kode_antrian',$this->input->post('kode_antrian'));
        $this->db->set('tanggal_pendaftaran',$this->input->post('tanggal_pendaftaran'));
        $this->db->set('nama_pasien',$this->input->post('nama_pasien'));
        $this->db->set('nama_poli',$this->input->post('nama_poli'));
        $this->db->set('nama_dokter',$this->input->post('nama_dokter'));
        $this->db->set('nama_user',$this->input->post('nama_user'));
        $this->db->insert('tbl_pendaftaran');
    }

    function ubah_pendaftaran()
    {
        $this->db->set('kode_antrian',$this->input->post('kode_antrian'));
        $this->db->set('tanggal_pendaftaran',$this->input->post('tanggal_pendaftaran'));
        $this->db->set('nama_pasien',$this->input->post('nama_pasien'));
        $this->db->set('nama_poli',$this->input->post('nama_poli'));
        $this->db->set('nama_dokter',$this->input->post('nama_dokter'));
        $this->db->set('nama_user',$this->input->post('nama_user'));
        $this->db->where('kode_antrian',$this->input->post('kode_antrian'));
        $this->db->update('tbl_pendaftaran');
    }

    function hapus_pendaftaran($id)
    {
        $this->db->where('kode_antrian',$id);
        $this->db->delete('tbl_pendaftaran');
    }

    public function listing_pendaftaran() 
    {
        $this->db->select('*');
        $this->db->from('tbl_pendaftaran');
        $query = $this->db->get();
        return $query->result();
    }


    //PENGADAAN OBAT
    function ambil_data_pengadaanobat()
    {
        $query = $this->db->select("*")
            ->from('tbl_pengadaan_obat')
            ->order_by('kode_pengadaan', 'DESC')
            ->get();
            return $query->result();
    }
   
    function ambil_data_obat3()
    {
        $query = $this->db->select("*")
            ->from('tbl_obat')
            ->order_by('kode_obat', 'DESC')
            ->get();
            return $query->result();
    }

    function simpan_pengadaanobat($data)
    {

        $query = $this->db->insert("tbl_pengadaan_obat", $data);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    function simpan_perubahan_dataobat()
    {
        
        $this->db->set('jumlah_obat',$_POST['total_obat']);
        $query = $this->db->where('kode_obat',$_POST['kode_obat'])
                        ->update('tbl_obat');

        if($query){
            return true;
        }else{
            return false;
        }

    }

    function cari($id){
        $query = $this->db->get_where('tbl_obat', array('kode_obat'=>$id));
        return $query;
    }

    function cari1($id){
        $query = $this->db->get_where('tbl_pendaftaran', array('kode_antrian'=>$id));
        return $query;
    }

    function cari2($id){
        $query = $this->db->get_where('tbl_pasien', array('id_pasien'=>$id));
        return $query;
    }

    function hapus_pengadaanobat($id)
    {
        $this->db->where('kode_pengadaan',$id);
        $this->db->delete('tbl_pengadaan_obat');
    }

    function laporan_pengadaan_obat($from, $to)
	{
		$sql = "
			SELECT 
				DISTINCT(SUBSTR(a.`tgl_transaksi`, 1, 10)) AS tgl_transaksi,
				(
					SELECT 
						SUM(b.`total_harga`) 
					FROM 
						`tbl_pengadaan_obat` AS b 
					WHERE 
						SUBSTR(b.`tgl_transaksi`, 1, 10) = SUBSTR(a.`tgl_transaksi`, 1, 10) 
					LIMIT 1
				) AS total_pengadaan 
			FROM 
				`tbl_pengadaan_obat` AS a 
			WHERE 
				SUBSTR(a.`tgl_transaksi`, 1, 10) >= '".$from."' 
				AND SUBSTR(a.`tgl_transaksi`, 1, 10) <= '".$to."' 
			ORDER BY 
				a.`tgl_transaksi` ASC
		";
		return $this->db->query($sql);
	}

    function ambil_nomor_antrian($kode_antrian)
    {
        $query = $this->db->select("*")
            ->from('tbl_pendaftaran')
            ->where('kode_antrian',$kode_antrian)
            ->get();
            return $query->result();
    }
    
    function ambil_nomor_antrian2($kode_antrian)
    {
        $query = $this->db->select("*")
            ->from('tbl_resep')
            ->where('kode_antrian',$kode_antrian)
            ->get();
            return $query->result();
    }
    public function get_kode_pengadaan() 
    {
        $id = "B-".date('dm')."19-";
        $query = $this->db->query("SELECT MAX(kode_pengadaan) as max_id FROM tbl_pengadaan_obat"); 
        $row = $query->row_array();
        $max_id = $row['max_id']; 
        $max_id1 =(int) substr($max_id,9,5);
        $kode_pengadaan = $max_id1 +1;
        $maxid_pasien = $id.sprintf("%04s",$kode_pengadaan);
        return $maxid_pasien;
    }

    //PEMBAYARAN
    function ambil_data_pembayaran(){
        $query = $this->db->get('tbl_pembayaran');
        return $query->result();
    }

    function ambil_data_pembayaran2($kode_transaksi)
    {
        $this->db->where('kode_transaksi',$kode_transaksi);
        $query = $this->db->get('tbl_pembayaran');
        return $query->result();
    }

    public function get_kode_pembayaran() 
    {
        $id = "TR";
        $query = $this->db->query("SELECT MAX(kode_transaksi) as max_id FROM tbl_pembayaran"); 
        $row = $query->row_array();
        $max_id = $row['max_id']; 
        $max_id1 =(int) substr($max_id,9,5);
        $kode_pembayaran = $max_id1 +1;
        $maxid_pembayaran = $id.sprintf("%08s",$kode_pembayaran);
        return $maxid_pembayaran;
    }
    // function simpan_pembayaran()
    // {
    //     $this->db->set('kode_transaksi',$this->input->post('kode_transaksi'));
    //     $this->db->set('tanggal_transaksi',$this->input->post('tanggal_transaksi'));
    //     $this->db->set('kode_antrian',$this->input->post('kode_antrian'));
    //     $this->db->set('id_user',$this->input->post('id_user'));
    //     $this->db->set('total_bayar',$this->input->post('total_bayar'));
    //     $this->db->insert('tbl_pembayaran');
    // }

    function create($table,$data)
    {
        $query = $this->db->insert($table,$data);
        return $query;
    }

    function hapus_pembayaran($id)
    {
        $this->db->where('kode_transaksi',$id);
        $this->db->delete('tbl_pembayaran');
    }

    function hapus_detail_pembayaran($id)
    {
        $this->db->where('kode_transaksi',$id);
        $this->db->delete('tbl_detail_pembayaran');
    }

    function ambil_kode_transaksi($kode_transaksi)
    {
        $query = $this->db->select("*")
            ->from('tbl_pembayaran')
            ->where('kode_transaksi',$kode_transaksi)
            ->get();
            return $query->result();
    }

    function ambil_kode_transaksi2($kode_transaksi)
    {
        $query = $this->db->select("*")
            ->from('tbl_detail_pembayaran')
            ->where('kode_transaksi',$kode_transaksi)
            ->get();
            return $query->result();
    }

    function laporan_pembayaran_obat($from, $to)
	{
		$sql = "
			SELECT 
				DISTINCT(SUBSTR(a.`tanggal_transaksi`, 1, 10)) AS tanggal_transaksi,
				(
					SELECT 
						SUM(b.`total_bayar`) 
					FROM 
						`tbl_pembayaran` AS b 
					WHERE 
						SUBSTR(b.`tanggal_transaksi`, 1, 10) = SUBSTR(a.`tanggal_transaksi`, 1, 10) 
					LIMIT 1
				) AS total_pembayaran 
			FROM 
				`tbl_pembayaran` AS a 
			WHERE 
				SUBSTR(a.`tanggal_transaksi`, 1, 10) >= '".$from."' 
				AND SUBSTR(a.`tanggal_transaksi`, 1, 10) <= '".$to."' 
			ORDER BY 
				a.`tanggal_transaksi` ASC
		";
		return $this->db->query($sql);
    }
    
    //PASIEN
    function ambil_data_pasien(){
        $query = $this->db->select("*")
                 ->from('tbl_pasien')
                 ->order_by('id_pasien', 'DESC')
                 ->get();
        return $query->result();
    }

    function ambil_data_pasien2($id_pasien)
    {
        $this->db->where('id_pasien',$id_pasien);
        $query = $this->db->get('tbl_pasien');
        return $query->result();
    }

    function simpan_pasien()
    {
        $this->db->set('id_pasien',$this->input->post('id_pasien'));
        $this->db->set('nama_pasien',$this->input->post('nama_pasien'));
        $this->db->set('jk',$this->input->post('jk'));
        $this->db->set('tempat_lahir',$this->input->post('tempat_lahir'));
        $this->db->set('tanggal_lahir',$this->input->post('tanggal_lahir')); 
        $this->db->set('alamat',$this->input->post('alamat'));
        $this->db->set('no_telp',$this->input->post('no_telp'));  
        $this->db->insert('tbl_pasien');
    }

    function hapus_pasien($id)
    {
        $this->db->where('id_pasien',$id);
        $this->db->delete('tbl_pasien');
    }

    function ubah_pasien()
    {
        $this->db->set('id_pasien',$this->input->post('id_pasien'));
        $this->db->set('nama_pasien',$this->input->post('nama_pasien'));
        $this->db->set('jk',$this->input->post('jk'));
        $this->db->set('tempat_lahir',$this->input->post('tempat_lahir'));
        $this->db->set('tanggal_lahir',$this->input->post('tanggal_lahir')); 
        $this->db->set('alamat',$this->input->post('alamat'));
        $this->db->set('no_telp',$this->input->post('no_telp'));  
        $this->db->where('id_pasien',$this->input->post('id_pasien'));
        $this->db->update('tbl_obat');
    }

    public function listing_pasien() 
    {
        $this->db->select('*');
        $this->db->from('tbl_pasien');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_id_pasien() 
    {
        $id = 'PSN';
        $query = $this->db->query("SELECT MAX(id_pasien) as max_id FROM tbl_pasien"); 
        $row = $query->row_array();
        $max_id = $row['max_id']; 
        $max_id1 =(int) substr($max_id,9,5);
        $id_pasien = $max_id1 +1;
        $maxid_pasien = $id.sprintf("%07s",$id_pasien);
        return $maxid_pasien;
       }

    //RESEP
    function ambil_data_resep(){
        $query = $this->db->select("*")
                 ->from('tbl_resep')
                 ->order_by('kode_antrian', 'DESC')
                 ->get();
        return $query->result();
    }

    function ambil_data_resep2($kode_antrian)
    {
        $this->db->where('kode_antrian',$kode_antrian);
        $query = $this->db->get('tbl_resep');
        return $query->result();
    }

    function simpan_resep()
    {
        $this->db->set('kode_antrian',$this->input->post('kode_antrian'));
        $this->db->set('nama_pasien',$this->input->post('nama_pasien'));
        $this->db->set('resep',$this->input->post('resep'));  
        $this->db->insert('tbl_resep');
    }

    function hapus_resep($id)
    {
        $this->db->where('kode_antrian',$id);
        $this->db->delete('tbl_resep');
    }

    function ubah_resep()
    {
        $this->db->set('kode_antrian',$this->input->post('kode_antrian'));
        $this->db->set('nama_pasien',$this->input->post('nama_pasien'));
        $this->db->set('resep',$this->input->post('resep'));  
        $this->db->where('kode_antrian',$this->input->post('kode_antrian'));
        $this->db->update('tbl_obat');
    }

    public function listing_resep() 
    {
        $this->db->select('*');
        $this->db->from('tbl_resep');
        $query = $this->db->get();
        return $query->result();
    }
}
?>