<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class Departemen_model extends CI_Model {
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

	public function get_departemen_all(){
		return $this->db->get('departemen')->result();
	}

	public function get_departemen($id)
	{
		$this->db->from('departemen');
		$this->db->where('departemen_id', $id);
		return $this->db->get()->row();
	}

}