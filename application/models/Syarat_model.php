<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class Syarat_model extends CI_Model {
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

	public function get_syarat_all(){
		return $this->db->get('syarat');
	}

	public function get_syarat($id)
	{
		$this->db->from('syarat');
		$this->db->where('syarat_id', $id);
		return $this->db->get()->row();
	}

	public function get_syarat_per_civitas($civitas_id)
	{
		$this->db->from('syarat');
		$this->db->where('syarat_civitas_id', $civitas_id);
		return $this->db->get()->result();
	}

	public function get_syarat_per_departemen($departemen_id)
	{
		$this->db->from('syarat');
		$this->db->join('civitas', 'syarat_civitas_id = civitas_id');
		$this->db->where('civitas_departemen_id', $departemen_id);
		return $this->db->get()->result();
	}

	public function get_syarat_per_civitas_per_mhs($civitas_id,$mhs_id)
	{
		$this->db->from('syarat');
		$this->db->join('junc_mhs_syarat', 'jms_syarat_id = syarat_id', 'left');
		$this->db->where('syarat_civitas_id', $civitas_id);
		$this->db->where('jms_mhs_id', $mhs_id);
		return $this->db->get()->result();
	}

	public function get_jms_per_mhs($mhs_id)
	{
		$this->db->from('junc_mhs_syarat');
		$this->db->where('jms_mhs_id', $mhs_id);
		return $this->db->get()->result();
	}

	public function create_syarat($nama, $deskripsi, $jenis, $civitas, $jenjang)
	{
		$data = array(
			'syarat_nama'   		=> $nama,
			'syarat_deskripsi'		=> $deskripsi,
			'syarat_jenis'   		=> $jenis,
			'syarat_civitas_id'		=> $civitas,
			'syarat_jenjang'		=> $jenjang,
			'created_at' 			=> date('Y-m-j H:i:s'),
		);
		
		$this->db->insert('syarat', $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	public function create_jms($mhs_id, $syarat_id, $civitas_id)
	{
		$data = array(
			'jms_mhs_id'   		=> $mhs_id,
			'jms_syarat_id'		=> $syarat_id,
			'jms_civitas_id'	=> $civitas_id,
			'jms_status'   		=> 0,
			'jms_bukti'   		=> "Belum Diisi",
			'created_at'		=> date('Y-m-j H:i:s'),
		);
		
		return $this->db->insert('junc_mhs_syarat', $data);
	}

	public function update_syarat($id, $nama, $deskripsi, $jenis, $civitas, $jenjang)
	{
		$data = array(
			'syarat_nama'   		=> $nama,
			'syarat_deskripsi'		=> $deskripsi,
			'syarat_jenis'   		=> $jenis,
			'syarat_civitas_id'		=> $civitas,
			'syarat_jenjang'		=> $jenjang,
			'updated_at' 			=> date('Y-m-j H:i:s'),
		);
		
		$this->db->where('syarat_id', $id);
		$this->db->update('syarat', $data);
		return $id;
	}

	public function update_jms($old_mhs_id, $old_syarat, $mhs_id, $syarat_id)
	{
		$data = array(
			'jms_mhs_id'   		=> $mhs_id,
			'jms_syarat_id'   	=> $syarat_id,
			'updated_at'		=> date('Y-m-j H:i:s'),
		);
		
		$this->db->where('jms_mhs_id', $old_mhs_id);
		$this->db->where('jms_syarat_id', $old_syarat);
		$this->db->update('junc_mhs_syarat', $data);
		return $mhs_id;
	}

	public function update_status_jms($jms_id, $status)
	{
		$data = array(
			'jms_status'   		=> $status,
			'updated_at'		=> date('Y-m-j H:i:s'),
		);
		
		$this->db->where('jms_id', $jms_id);
		$this->db->update('junc_mhs_syarat', $data);
		return $jms_id;
	}

	public function update_status_jms_per_mahasiswa($mhs_id, $status)
	{
		$data = array(
			'jms_status'   		=> $status,
			'updated_at'		=> date('Y-m-j H:i:s'),
		);
		
		$this->db->where('jms_mhs_id', $mhs_id);
		$this->db->update('junc_mhs_syarat', $data);
		return $mhs_id;
	}

	public function update_bukti_jms_per_mahasiswa($mhs_id, $syarat_id, $bukti)
	{
		$data = array(
			'jms_bukti'   		=> $bukti,
			'updated_at'		=> date('Y-m-j H:i:s'),
		);
		
		$this->db->where('jms_mhs_id', $mhs_id);
		$this->db->where('jms_syarat_id', $syarat_id);
		$this->db->update('junc_mhs_syarat', $data);
		return $mhs_id;
	}

	public function delete_syarat($syarat_id)
	{
		$this->db->where('syarat_id', $syarat_id);
		$this->db->delete('syarat');
		return $syarat_id;
	}

	public function delete_jms($syarat_id)
	{
		$this->db->where('jms_syarat_id', $syarat_id);
		$this->db->delete('junc_mhs_syarat');
		return $syarat_id;
	}

	public function delete_syarat_per_civitas($civitas_id)
	{
		$this->db->where('syarat_civitas_id', $civitas_id);
		$this->db->delete('syarat');
		return $syarat_id;
	}

	public function delete_jms_per_civitas($civitas_id)
	{
		$this->db->where('jms_civitas_id', $civitas_id);
		$this->db->delete('junc_mhs_syarat');
		return $syarat_id;
	}

}