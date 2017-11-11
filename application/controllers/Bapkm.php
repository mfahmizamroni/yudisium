<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bapkm extends CI_Controller {

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
		$this->load->model('user_model');
		$this->load->model('mhs_model');
		$this->load->model('syarat_model');
		$this->load->model('civitas_model');
		$this->load->model('departemen_model');
	}

	// Begin Menu Mahasiswa //

	public function index()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data = new stdClass();
		$civitas_id = $this->session->userdata('civitas_id');
		$mahasiswa = $this->mhs_model->get_mhs_all();

		$data = array('mahasiswa'=>$mahasiswa);

		$this->form_validation->set_rules('mhs[]', 'mhs', 'required');

		if ($this->form_validation->run() === false) {
			$this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->helper('url');
				$this->load->view('master/Bapkm/header');
				$this->load->view('pages/Bapkm/Mhs/daftarMahasiswa', $data);
				$this->load->view('master/Bapkm/navigation');
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
					$this->load->view('master/Bapkm/header');
					$this->load->view('pages/Bapkm/Mhs/daftarMahasiswa', $data);
					$this->load->view('master/Bapkm/navigation');
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
	
	public function formKelengkapanMahasiswa($mhs_id)
	{

		$data = new stdClass();
		$formBebas = $this->civitas_model->get_civitas_per_mhs_with_syarat($mhs_id);
		$mahasiswa = $this->mhs_model->get_mhs($mhs_id);
		$departemen = $this->departemen_model->get_departemen($this->session->userdata('departemen_id'));

		$data = array('formBebas'=>$formBebas,'mhs_id'=>$mhs_id,'mahasiswa'=>$mahasiswa,'departemen'=>$departemen);

		if ($this->session->has_userdata('username')) {
			$this->load->helper('url');
			$this->load->view('master/Bapkm/header');
			$this->load->view('pages/Bapkm/Mhs/formKelengkapan',$data);
			$this->load->view('master/Bapkm/navigation');
			$this->load->view('master/tableJs');
			$this->load->view('master/footer');
		} else {
			$this->load->helper('url');
			header('location:'.base_url().'user/login');
		}
	}

	public function detailSyaratYudisium($civitas_id, $mhs_id)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data =  new stdClass();
		$mahasiswa = $this->mhs_model->get_mhs_per_civitas_with_syarat_per_id($civitas_id, $mhs_id);
		$civitas = $this->civitas_model->get_civitas($civitas_id);

		$data = array('mahasiswa'=>$mahasiswa,'civitas'=>$civitas);

		$this->form_validation->set_rules('jms1', ' ', 'required');

		if ($this->form_validation->run() === false) {
			$this->load->helper('url');
			$this->load->view('master/Bapkm/header');
			$this->load->view('pages/Bapkm/Mhs/detailMahasiswa', $data);
			$this->load->view('master/Bapkm/navigation');
			$this->load->view('master/formJs');
			$this->load->view('master/footer');
		} else {
			$data =  new stdClass();
			$i = 1;
			$temp = "";

			while ($this->input->post('jms'.$i)) {
				$jms = $this->input->post('jms'.$i);
				$status = $this->input->post('status'.$i);
				$temp = $this->syarat_model->update_status_jms($jms, $status);
				$i++;
			}

			if ($temp) {
				$success = "Mahasiswa Updated";
				$mahasiswa = $this->mhs_model->get_mhs_per_civitas_with_syarat_per_id($civitas_id, $mhs_id);

				$data = array('success' => $success, 'mahasiswa' => $mahasiswa );

				$this->load->library('session');
				if ($this->session->has_userdata('username')) {
					// $this->load->helper('url');
					// $this->load->view('master/Civitas/header');
					// $this->load->view('pages/Civitas/detailMahasiswa', $data);
					// $this->load->view('master/Civitas/navigation');
					// $this->load->view('master/formJs');
					// $this->load->view('master/footer');
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
					$this->load->view('master/Super/header');
					$this->load->view('pages/Super/Mhs/detailMahasiswa', $data);
					$this->load->view('master/Super/navigation');
					$this->load->view('master/formJs');
					$this->load->view('master/footer');
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'user/login');
				}
			}
		}
	}
}
