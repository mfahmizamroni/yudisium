<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Super extends CI_Controller {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->library('session');
		$this->load->model('mhs_model');
		$this->load->model('syarat_model');
		$this->load->model('civitas_model');
	}

	public function index()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data = new stdClass();
		$civitas_id = $this->session->userdata('civitas_id');
		$mahasiswa = $this->mhs_model->get_mhs_per_civitas_with_syarat($civitas_id);

		$data = array('mahasiswa'=>$mahasiswa);

		$this->form_validation->set_rules('mhs[]', 'mhs', 'required');

		if ($this->form_validation->run() === false) {
			$this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->helper('url');
				$this->load->view('master/Super/headerSA');
				$this->load->view('pages/Super/Mhs/daftarMahasiswa', $data);
				$this->load->view('master/Super/navigationSA');
				$this->load->view('master/tableJs');
				$this->load->view('master/searchJs');
				$this->load->view('master/footer');
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'user/login');
			}
		} else {
			$temp = "";
			$mhs = $this->input->post('mhs');
			$status = $this->input->post('status');

			for($i=0;$i<sizeof($mhs);$i++)
			{
			    $mhs_id = $mhs[$i];
			    $temp = $this->syarat_model->update_status_jms_per_mahasiswa($mhs_id, $status);
			}

			if ($temp) {
				$success = "Mahasiswa Updated";
				$data = array('success' => $success );

				$this->load->library('session');
				if ($this->session->has_userdata('username')) {
					$this->load->helper('url');
					header('location:'.base_url().'form/daftarMahasiswa');
					$this->session->set_flashdata('success', $success);
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'user/login');
				}

			} else {

        		// user creation failed, this should never happen
				$data->error = 'There was a problem Please try again.';

				$this->load->library('session');
				if ($this->session->has_userdata('username')) {
					$this->load->helper('url');
					$this->load->view('master/Super/headerSA');
					$this->load->view('pages/Super/Mhs/daftarMahasiswa', $data);
					$this->load->view('master/Super/navigationSA');
					$this->load->view('master/tableJs');
					$this->load->view('master/searchJs');
					$this->load->view('master/footer');
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'user/login');
				}
			}
		}
	}

	// Begin Menu Mahasiswa //

	public function daftarMahasiswa(){
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data = new stdClass();
		$civitas_id = $this->session->userdata('civitas_id');
		$mahasiswa = $this->mhs_model->get_mhs_per_civitas_with_syarat($civitas_id);

		$data = array('mahasiswa'=>$mahasiswa);

		$this->form_validation->set_rules('mhs[]', 'mhs', 'required');

		if ($this->form_validation->run() === false) {
			$this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->helper('url');
				$this->load->view('master/Super/headerSA');
				$this->load->view('pages/Super/Mhs/daftarMahasiswa', $data);
				$this->load->view('master/Super/navigationSA');
				$this->load->view('master/tableJs');
				$this->load->view('master/searchJs');
				$this->load->view('master/footer');
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'user/login');
			}
		} else {
			$temp = "";
			$mhs = $this->input->post('mhs');
			$status = $this->input->post('status');

			for($i=0;$i<sizeof($mhs);$i++)
			{
			    $mhs_id = $mhs[$i];
			    $temp = $this->syarat_model->update_status_jms_per_mahasiswa($mhs_id, $status);
			}

			if ($temp) {
				$success = "Mahasiswa Updated";
				$data = array('success' => $success );

				$this->load->library('session');
				if ($this->session->has_userdata('username')) {
					$this->load->helper('url');
					header('location:'.base_url().'form/daftarMahasiswa');
					$this->session->set_flashdata('success', $success);
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'user/login');
				}

			} else {

        		// user creation failed, this should never happen
				$data->error = 'There was a problem Please try again.';

				$this->load->library('session');
				if ($this->session->has_userdata('username')) {
					$this->load->helper('url');
					$this->load->view('master/Super/headerSA');
					$this->load->view('pages/Super/Mhs/daftarMahasiswa', $data);
					$this->load->view('master/Super/navigationSA');
					$this->load->view('master/tableJs');
					$this->load->view('master/searchJs');
					$this->load->view('master/footer');
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'user/login');
				}
			}
		}
	}

	public function formKelengkapanMhs()
	{

			$this->load->helper('url');
			$this->load->view('master/Super/headerSA');
			$this->load->view('pages/Super/Mhs/formKelengkapan');
			$this->load->view('master/Super/navigationSA');
			$this->load->view('master/tableJs');
			$this->load->view('master/searchJs');
			$this->load->view('master/footer');
	}

	public function addMahasiswa()
	{
		$this->load->helper('url');
		$this->load->view('master/Super/headerSA');
		$this->load->view('pages/Super/Mhs/addMahasiswa');
		$this->load->view('master/Super/navigationSA');
		$this->load->view('master/tableJs');
		$this->load->view('master/footer');
	}
	// End Menu Mahasiswa //

	// Begin Menu Instansi //
	public function addCivitas()
	{
		$this->load->helper('url');
		$this->load->view('master/Super/headerSA');
		$this->load->view('pages/Super/Instansi/addInstansi');
		$this->load->view('master/Super/navigationSA');
		$this->load->view('master/tableJs');
		$this->load->view('master/footer');
	}
	public function addUserCivitas()
	{
		$this->load->helper('url');
		$this->load->view('master/Super/headerSA');
		$this->load->view('pages/Super/Instansi/addUserInstansi');
		$this->load->view('master/Super/navigationSA');
		$this->load->view('master/tableJs');
		$this->load->view('master/footer');
	}
	// End Menu Civitas

	// Begin Syarat Yudisium // 
	public function addSyaratYudisium()
	{
		$this->load->helper('url');
		$this->load->view('master/Super/headerSA');
		$this->load->view('pages/Super/SyaratYudisium/addSyaratYudisium');
		$this->load->view('master/Super/navigationSA');
		$this->load->view('master/tableJs');
		$this->load->view('master/footer');
	}
	// End Syarat Yudisium
}
