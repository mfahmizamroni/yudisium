<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {

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
		$this->load->helper('url');
		$this->load->view('master/Instansi/Instansi/header');
		$this->load->view('pages/form');
		$this->load->view('master/Instansi/navigation');
		$this->load->view('master/allJs');
		$this->load->view('master/footer');
	}

	public function daftarMahasiswa()
	{
<<<<<<< HEAD
		$this->load->helper('url');
		$this->load->view('master/Instansi/header');
		$this->load->view('pages/Instansi/daftarMahasiswa');
		$this->load->view('master/Instansi/navigation');
		$this->load->view('master/tableJs');
		$this->load->view('master/footer');
	}

	public function detailMahasiswa()
	{
		$this->load->helper('url');
		$this->load->view('master/Instansi/header');
		$this->load->view('pages/Instansi/detailMahasiswa');
		$this->load->view('master/Instansi/navigation');
		$this->load->view('master/tableJs');
		$this->load->view('master/footer');
	}

	public function daftarSyaratYudisium()
	{
		$this->load->helper('url');
		$this->load->view('master/Instansi/header');
		$this->load->view('pages/Instansi/daftarSyaratYudisium');
		$this->load->view('master/Instansi/navigation');
		$this->load->view('master/tableJs');
		$this->load->view('master/footer');
=======
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data = new stdClass();
		$civitas_id = $this->session->userdata('civitas_id');
		$mahasiswa = $this->mhs_model->get_mhs_per_civitas_with_syarat($civitas_id);

		$data = array('mahasiswa'=>$mahasiswa);

		$this->form_validation->set_rules('mhs[]', 'mhs', 'required');

		if ($this->form_validation->run() === false) {
			$this->load->helper('url');
			$this->load->view('master/Instansi/header');
			$this->load->view('pages/Instansi/daftarMahasiswa', $data);
			$this->load->view('master/Instansi/navigation');
			$this->load->view('master/tableJs');
			$this->load->view('pages/Instansi/searchJs');
			$this->load->view('master/footer');
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
					$this->load->view('master/Instansi/header');
					$this->load->view('pages/Instansi/daftarMahasiswa', $data);
					$this->load->view('master/Instansi/navigation');
					$this->load->view('master/tableJs');
					$this->load->view('pages/Instansi/searchJs');
					$this->load->view('master/footer');
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'user/login');
				}
			}
		}
>>>>>>> master
	}

	public function detailMahasiswa($mhs_id)
	{
<<<<<<< HEAD
		$this->load->helper('url');
		$this->load->view('master/Instansi/header');
		$this->load->view('pages/Instansi/addSyaratYudisium');
		$this->load->view('master/Instansi/navigation');
		$this->load->view('master/tableJs');
		$this->load->view('master/footer');
=======
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data =  new stdClass();
		$civitas_id = $this->session->userdata('civitas_id');
		$mahasiswa = $this->mhs_model->get_mhs_per_civitas_with_syarat_per_id($civitas_id, $mhs_id);

		$data = array('mahasiswa'=>$mahasiswa);

		$this->form_validation->set_rules('jms1', ' ', 'required');

		if ($this->form_validation->run() === false) {
			$this->load->helper('url');
			$this->load->view('master/Instansi/header');
			$this->load->view('pages/Instansi/detailMahasiswa', $data);
			$this->load->view('master/Instansi/navigation');
			$this->load->view('master/formJs');
			$this->load->view('master/footer');
		} else {
			$data =  new stdClass();
			$i = 1;
			$temp = "";
			while ($this->input->post('jms'.$i)) {
				$jms = $this->input->post('jms'.$i);
				$temp = $this->syarat_model->update_status_jms($jms);
				$i++;
			}

			if ($temp) {
				$success = "Mahasiswa Approved";
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
					$this->load->view('master/Instansi/header');
					$this->load->view('pages/Instansi/detailMahasiswa', $data);
					$this->load->view('master/Instansi/navigation');
					$this->load->view('master/formJs');
					$this->load->view('master/footer');
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'user/login');
				}
			}
		}
>>>>>>> master
	}

	public function addCatatan($jmc_id)
	{
<<<<<<< HEAD
		$this->load->helper('url');
		$this->load->view('master/Instansi/header');
		$this->load->view('pages/Instansi/addCatatan');
		$this->load->view('master/Instansi/navigation');
		$this->load->view('master/tableJs');
		$this->load->view('master/footer');
=======
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data =  new stdClass();
		$civitas_id = $this->session->userdata('civitas_id');
		$mahasiswa = $this->mhs_model->get_mhs_per_civitas($civitas_id);

		$data = array('mahasiswa'=>$mahasiswa,'id'=>$jmc_id);

		$this->form_validation->set_rules('catatan', 'catatan', 'required');

		if ($this->form_validation->run() === false) {
			$this->load->helper('url');
			$this->load->view('master/Instansi/header');
			$this->load->view('pages/Instansi/addCatatan', $data);
			$this->load->view('master/Instansi/navigation');
			$this->load->view('master/formJs');
			$this->load->view('master/footer');
		} else {
			$catatan = $this->input->post('catatan');
			$civitas_id = $this->session->userdata('civitas_id');

			if ($this->civitas_model->update_catatan_jmc($jmc_id,$catatan)) {
				$success = "Catatan Telah Ditambahkan";
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
					$this->load->view('master/Instansi/header');
					$this->load->view('pages/Instansi/addCatatan', $data);
					$this->load->view('master/Instansi/navigation');
					$this->load->view('master/formJs');
					$this->load->view('master/footer');
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'user/login');
				}
			}
		}
>>>>>>> master
	}
}
