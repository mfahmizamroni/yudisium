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

	public function get_mhs_per_civitas($civitas_id)
	{
		$this->db->from('mhs');
		$this->db->join('junc_mhs_civitas', 'mhs_id = jmc_mhs_id');
		$this->db->join('civitas', 'civitas_id = jmc_civitas_id');
		return $this->db->get()->result();
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
}