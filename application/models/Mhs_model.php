<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class Mhs_model extends CI_Model {
	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->database();
	}

	public function get_mhs_all(){
		return $this->db->get('mhs');
	}

	public function get_mhs($id)
	{
		$this->db->from('mhs');
		$this->db->where('mhs_id', $id);
		return $this->db->get()->row();
	}

	public function get_mhs_jmc($id)
	{
		$this->db->from('mhs');
		$this->db->join('junc_mhs_civitas', 'mhs_id = jmc_mhs_id', 'LEFT');
		$this->db->where('mhs_id', $id);
		return $this->db->get()->result();
	}

	public function get_mhs_per_civitas($civitas_id)
	{
		$this->db->from('mhs');
		$this->db->join('junc_mhs_civitas', 'mhs_id = jmc_mhs_id');
		$this->db->join('civitas', 'civitas_id = jmc_civitas_id');
		return $this->db->get()->result();
	}

	public function get_mhs_per_departemen($departemen_id)
	{
		$this->db->from('mhs');
		$this->db->join('departemen', 'mhs_departemen_id = departemen_id');
		return $this->db->get()->result();
	}

	public function get_mhs_departemen($mhs_id)
	{
		$this->db->from('mhs');
		$this->db->join('departemen', 'mhs_departemen_id = departemen_id');
		$this->db->where('mhs_id', $mhs_id);
		return $this->db->get()->row();
	}

	public function get_mhs_per_civitas_with_syarat($civitas_id)
	{
		$this->db->select(array('*','MIN(jms_status) as minstat'));
		$this->db->from('mhs');
		$this->db->join('junc_mhs_civitas', 'mhs_id = jmc_mhs_id');
		$this->db->join('civitas', 'civitas_id = jmc_civitas_id');
		$this->db->join('syarat', 'civitas_id = syarat_civitas_id');
		$this->db->join('junc_mhs_syarat', 'jms_mhs_id = mhs_id');
		$this->db->where('civitas_id', $civitas_id);
		$this->db->group_by('mhs_id');
		return $this->db->get()->result();
	}

	public function get_mhs_per_civitas_with_syarat_per_id($civitas_id, $mhs_id)
	{
		$this->db->from('mhs');
		$this->db->join('junc_mhs_civitas', 'mhs_id = jmc_mhs_id');
		$this->db->join('civitas', 'civitas_id = jmc_civitas_id');
		$this->db->join('syarat', 'civitas_id = syarat_civitas_id');
		$this->db->join('junc_mhs_syarat', 'jms_syarat_id = syarat_id AND jms_mhs_id = mhs_id');
		$this->db->where('civitas_id', $civitas_id);
		$this->db->where('mhs_id', $mhs_id);
		return $this->db->get()->result();
	}

	public function get_mhs_per_departemen_with_syarat($departemen_id)
	{
		$this->db->select(array('*','MIN(jms_status) as minstat'));
		$this->db->from('mhs');
		$this->db->join('junc_mhs_civitas', 'mhs_id = jmc_mhs_id');
		$this->db->join('departemen', 'departemen_id = mhs_departemen_id');
		// $this->db->join('syarat', 'civitas_id = syarat_civitas_id');
		$this->db->join('junc_mhs_syarat', 'jms_mhs_id = mhs_id');
		$this->db->where('departemen_id', $departemen_id);
		$this->db->group_by('mhs_id');
		return $this->db->get()->result();
	}

	/**
	 * create_user function.
	 * 
	 * @access public
	 * @param mixed $username
	 * @param mixed $email
	 * @param mixed $password
	 * @return bool true on success, false on failure
	 */
	public function create_mhs($password, $gender, $nama, $nrp, $tanggal, $notelp, $lamastudi, $mhs_jenjang) {
		
		$data = array(
			'mhs_password'   	=> $this->hash_password($password),
			'mhs_gender'   		=> $gender,
			'mhs_nama'   		=> $nama,
			'mhs_nrp'      		=> $nrp,
			'mhs_jenjang'   	=> $jenjang,
			'mhs_tgllahir'   	=> $tanggal,
			'mhs_notelp'   		=> $notelp,
			'mhs_lamastudi'   	=> $lamastudi,
			'created_at' 		=> date('Y-m-j H:i:s'),
		);
		
		return $this->db->insert('mhs', $data);
		
	}

	public function update_mhs($id, $password, $gender, $nama, $tanggal, $notelp, $lamastudi, $jenjang) {
		
		$data = array(
			'mhs_password'   	=> $this->hash_password($password),
			'mhs_gender'   		=> $gender,
			'mhs_nama'   		=> $nama,
			'mhs_jenjang'   	=> $jenjang,
			'mhs_tgllahir'   	=> $tanggal,
			'mhs_notelp'   		=> $notelp,
			'mhs_lamastudi'   	=> $lamastudi,
			'updated_at' 		=> date('Y-m-j H:i:s'),
		);
		
		$this->db->where('mhs_id', $id);
		$this->db->update('mhs', $data);
		return $id;
		
	}

	public function update_mhs_np($id, $gender, $nama, $tanggal, $notelp, $lamastudi, $jenjang) {
		
		$data = array(
			'mhs_gender'   		=> $gender,
			'mhs_nama'   		=> $nama,
			'mhs_jenjang'   	=> $jenjang,
			'mhs_tgllahir'   	=> $tanggal,
			'mhs_notelp'   		=> $notelp,
			'mhs_lamastudi'   	=> $lamastudi,
			'updated_at' 		=> date('Y-m-j H:i:s'),
		);
		
		$this->db->where('mhs_id', $id);
		$this->db->update('mhs', $data);
		return $id;
		
	}
	
	/**
	 * resolve_user_login function.
	 * 
	 * @access public
	 * @param mixed $username
	 * @param mixed $password
	 * @return bool true on success, false on failure
	 */
	public function resolve_mhs_login($nrp, $password) {
		
		$this->db->select('mhs_password');
		$this->db->from('mhs');
		$this->db->where('mhs_nrp', $nrp);
		$hash = $this->db->get()->row('mhs_password');
		
		return $this->verify_password_hash($password, $hash);
		
	}
	
	/**
	 * get_user_id_from_username function.
	 * 
	 * @access public
	 * @param mixed $username
	 * @return int the adm id
	 */
	public function get_mhs_id_from_nrp($nrp) {
		
		$this->db->select('mhs_id');
		$this->db->from('mhs');
		$this->db->where('mhs_nrp', $nrp);
		return $this->db->get()->row('mhs_id');
		
	}

	public function delete_mhs($mhs_id) {
		
		$this->db->where('mhs_id', $mhs_id);
		$this->db->delete('mhs');
		return $mhs_id;
		
	}

	public function get_mhs_by_nrp($nrp) {
		
		$this->db->from('mhs');
		$this->db->where('mhs_nrp', $nrp);
		return $this->db->get()->row();
		
	}
	
	/**
	 * hash_password function.
	 * 
	 * @access private
	 * @param mixed $password
	 * @return string|bool could be a string on success, or bool false on failure
	 */
	private function hash_password($password) {
		
		return password_hash($password, PASSWORD_BCRYPT);
		
	}
	
	/**
	 * verify_password_hash function.
	 * 
	 * @access private
	 * @param mixed $password
	 * @param mixed $hash
	 * @return bool
	 */
	private function verify_password_hash($password, $hash) {
		
		return password_verify($password, $hash);
		
	}
}