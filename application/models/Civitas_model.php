<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class Civitas_model extends CI_Model {
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

	public function get_civitas_all(){
		return $this->db->get('civitas');
	}

	public function get_civitas($id)
	{
		$this->db->from('civitas');
		$this->db->where('civitas_id', $id);
		return $this->db->get()->row();
	}

	public function update_catatan_jmc($jmc_id, $catatan)
	{
		$data = array(
			'jmc_catatan'   	=> $catatan,
			'updated_at'		=> date('Y-m-j H:i:s'),
		);
		
		$this->db->where('jmc_id', $jmc_id);
		$this->db->update('junc_mhs_civitas', $data);
		return $jmc_id;
	}
}