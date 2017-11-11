<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class User_model extends CI_Model {
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

	public function get_user_all() {
		$this->db->join('civitas', 'adm_civitas_id = civitas_id');
		$this->db->join('departemen', 'civitas_departemen_id = departemen_id');
		return $this->db->get('adm')->result();
	}

	public function get_user_count() {
		
		$this->db->from('adm');
		$count = $this->db->count_all_results();
		return $count;
		
	}

	public function get_user_per_departemen($departemen_id)
	{
		$this->db->from('adm');
		$this->db->join('civitas', 'adm_civitas_id = civitas_id');
		$this->db->where('civitas_departemen_id', $departemen_id);
		return $this->db->get()->result();
	}

	public function get_user_per_civitas($civitas_id)
	{
		$this->db->from('adm');
		$this->db->join('civitas', 'adm_civitas_id = civitas_id');
		$this->db->where('civitas_id', $civitas_id);
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
	public function create_user($nama, $username, $email, $password, $civitas, $role) {
		
		$data = array(
			'adm_nama'   			=> $nama,
			'adm_username'   		=> $username,
			'adm_email'      		=> $email,
			'adm_civitas_id'   		=> $civitas,
			'adm_role'      		=> $role,
			'adm_password'   		=> $this->hash_password($password),
			'created_at' 			=> date('Y-m-j H:i:s'),
		);
		
		return $this->db->insert('adm', $data);
		
	}

	public function update_user_np($id, $nama, $username, $email, $civitas, $role) {
		
		$data = array(
			'adm_nama'   			=> $nama,
			'adm_username'   		=> $username,
			'adm_email'      		=> $email,
			'adm_civitas_id'   		=> $civitas,
			'adm_role'      		=> $role,
			'updated_at'			=> date('Y-m-j H:i:s'),
		);
		
		$this->db->where('adm_id', $id);
		$this->db->update('adm', $data);
		return $username;
		
	}

	public function update_user($id, $nama, $username, $email, $password, $civitas, $role) {
		
		$data = array(
			'adm_nama'   			=> $nama,
			'adm_username'   		=> $username,
			'adm_email'      		=> $email,
			'adm_civitas_id'   		=> $civitas,
			'adm_role'      		=> $role,
			'adm_password'   		=> $this->hash_password($password),
			'updated_at'			=> date('Y-m-j H:i:s'),
		);
		
		$this->db->where('adm_id', $id);
		$this->db->update('adm', $data);
		return $username;
		
	}
	
	/**
	 * resolve_user_login function.
	 * 
	 * @access public
	 * @param mixed $username
	 * @param mixed $password
	 * @return bool true on success, false on failure
	 */
	public function resolve_user_login($username, $password) {
		
		$this->db->select('adm_password');
		$this->db->from('adm');
		$this->db->where('adm_username', $username);
		$hash = $this->db->get()->row('adm_password');
		
		return $this->verify_password_hash($password, $hash);
		
	}
	
	/**
	 * get_user_id_from_username function.
	 * 
	 * @access public
	 * @param mixed $username
	 * @return int the adm id
	 */
	public function get_user_id_from_username($username) {
		
		$this->db->select('adm_id');
		$this->db->from('adm');
		$this->db->where('adm_username', $username);
		return $this->db->get()->row('adm_id');
		
	}
	
	/**
	 * get_user function.
	 * 
	 * @access public
	 * @param mixed $user_id
	 * @return object the adm object
	 */
	public function get_user($user_id) {
		
		$this->db->from('adm');
		$this->db->where('adm_id', $user_id);
		return $this->db->get()->row();
		
	}

	public function delete_user($user_id) {
		
		$this->db->where('adm_id', $user_id);
		$this->db->delete('adm');
		return $user_id;
		
	}

	public function delete_user_per_civitas($civitas_id) {
		
		$this->db->where('adm_civitas_id', $civitas_id);
		$this->db->delete('adm');
		return $user_id;
		
	}

	public function get_user_by_username($username) {
		
		$this->db->from('adm');
		$this->db->where('adm_username', $username);
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