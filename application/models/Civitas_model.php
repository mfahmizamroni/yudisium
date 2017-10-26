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

	public function get_civitas_per_departemen($departemen_id)
	{
		$this->db->from('civitas');
		$this->db->where('civitas_departemen_id', $departemen_id);
		return $this->db->get()->result();
	}

	public function get_civitas_per_mhs_with_syarat($mhs_id)
	{
		$this->db->select(array('*','MIN(jms_status) as minstat'));
		$this->db->from('civitas');
		$this->db->join('junc_mhs_civitas', 'jmc_civitas_id = civitas_id');
		$this->db->join('mhs', 'jmc_mhs_id = mhs_id');
		$this->db->join('syarat', 'civitas_id = syarat_civitas_id');
		$this->db->join('junc_mhs_syarat', 'jms_mhs_id = mhs_id');
		$this->db->where('mhs_id', $mhs_id);
		$this->db->group_by('civitas_id');
		return $this->db->get()->result();
	}

	public function get_civitas_dosen($departemen_id)
	{
		$this->db->from('civitas');
		$this->db->where('civitas_tipe', 'Dosen Pembimbing');
		$this->db->where('civitas_departemen_id', $departemen_id);
		return $this->db->get()->result();
	}

	public function get_civitas_lab($departemen_id)
	{
		$this->db->from('civitas');
		$this->db->where('civitas_tipe', 'Laboratorium');
		$this->db->where('civitas_departemen_id', $departemen_id);
		return $this->db->get()->result();
	}

	public function get_civitas_ruangbaca($departemen_id)
	{
		$this->db->from('civitas');
		$this->db->where('civitas_tipe', 'Ruang Baca');
		$this->db->where('civitas_departemen_id', $departemen_id);
		return $this->db->get()->row();
	}

	public function get_jmc_per_mhs($mhs_id)
	{
		$this->db->from('junc_mhs_civitas');
		$this->db->where('jmc_mhs_id', $mhs_id);
		return $this->db->get()->result();
	}

	public function create_civitas($civitas_nama, $civitas_tipe, $civitas_departemen)
	{
		$data  = array(
			'civitas_nama'			=> $civitas_nama,
			'civitas_tipe'			=> $civitas_tipe,
			'civitas_departemen_id'	=> $civitas_departemen,
		);

		return $this->db->insert('civitas', $data);
	}

	public function update_civitas($civitas_id, $civitas_nama, $civitas_tipe, $civitas_departemen)
	{
		$data  = array(
			'civitas_nama'			=> $civitas_nama,
			'civitas_tipe'			=> $civitas_tipe,
			'civitas_departemen_id'	=> $civitas_departemen,
		);

		$this->db->where('civitas_id', $civitas_id);
		$this->db->update('civitas', $data);
		return $id;
	}

	public function create_jmc($mhs_id, $civitas_id)
	{
		$data = array(
			'jmc_mhs_id'   		=> $mhs_id,
			'jmc_civitas_id'   	=> $civitas_id,
			'updated_at'		=> date('Y-m-j H:i:s'),
		);
	
		return $this->db->insert('junc_mhs_civitas', $data);
		
	}

	public function update_jmc($old_mhs_id, $old_civitas_id, $mhs_id, $civitas_id)
	{
		$data = array(
			'jmc_mhs_id'   		=> $mhs_id,
			'jmc_civitas_id'	=> $civitas_id,
			'updated_at'		=> date('Y-m-j H:i:s'),
		);
		
		$this->db->where('jmc_mhs_id', $old_mhs_id);
		$this->db->where('jmc_civitas_id', $old_civitas_id);
		$this->db->update('junc_mhs_civitas', $data);
		return $mhs_id;
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

	public function delete_civitas($civitas_id)
	{
		$this->db->where('civitas_id', $civitas_id);
		$this->db->delete('civitas');
		return $civitas_id;
	}

	public function delete_jmc_per_civitas($civitas_id)
	{
		$this->db->where('jmc_civitas_id', $civitas_id);
		$this->db->delete('junc_mhs_civitas');
		return $civitas_id;
	}
}