<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Syarat extends CI_Controller {

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
	}

	public function index()
	{

	}

	public function daftarSyaratYudisium()
	{
		$data = new stdClass();
		$civitas_id = $this->session->userdata('civitas_id');
		$syarat = $this->syarat_model->get_syarat_per_civitas($civitas_id);

		$data = array('syarat'=>$syarat);

		$this->load->helper('url');
		$this->load->view('master/Civitas/header');
		$this->load->view('pages/Civitas/daftarSyaratYudisium', $data);
		$this->load->view('master/Civitas/navigation');
		$this->load->view('master/tableJs');
		$this->load->view('master/footer');
	}

	public function addSyaratYudisium()
	{
		// create the data object
	    $data = new stdClass();

	    $this->load->helper('form');
	    $this->load->library('form_validation');

	    // set validation rules
	    $this->form_validation->set_rules('syarat', 'Judul Syarat', 'required');
	    // $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
	    $this->form_validation->set_rules('jenis', 'Jenis Syarat', 'required');

	    if ($this->form_validation->run() === false) {
			$this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->helper('url');
				$this->load->view('master/Civitas/header');
				$this->load->view('pages/Civitas/addSyaratYudisium', $data);
				$this->load->view('master/Civitas/navigation');
				$this->load->view('master/formJs');
				$this->load->view('master/footer');
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'user/login');
			}
		} else {
			$syarat = $this->input->post('syarat');
			$deskripsi = $this->input->post('deskripsi');
			$jenis = $this->input->post('jenis');
			$jenjang = $this->input->post('jenjang');
			$civitas = $this->session->userdata('civitas_id');

			$insert_id = $this->syarat_model->create_syarat($syarat, $deskripsi, $jenis, $civitas, $jenjang);

			if ($insert_id) {

				$mhs_per_civitas = $this->mhs_model->get_mhs_per_civitas($civitas);
				foreach ($mhs_per_civitas as $mhs) {
					$this->syarat_model->create_jms($mhs->mhs_id, $insert_id, $civitas);
				}

				$success = "creation success";
				$data = array('success' => $success );

				$this->load->library('session');
				if ($this->session->has_userdata('username')) {
					$this->load->helper('url');
					header('location:'.base_url().'syarat/daftarSyaratYudisium');
					$this->session->set_flashdata('success', $success);
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'user/login');
				}

			} else {

        		// user creation failed, this should never happen
				$data->error = 'There was a problem creating new buku. Please try again.';

				$this->load->library('session');
				if ($this->session->has_userdata('username')) {
					$this->load->helper('url');
					$this->load->view('master/Civitas/header');
					$this->load->view('pages/Civitas/addSyaratYudisium', $data);
					$this->load->view('master/Civitas/navigation');
					$this->load->view('master/formJs');
					$this->load->view('master/footer');
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'user/login');
				}
			}
		}
	}

	public function editSyaratYudisium($id)
	{
		// create the data object
	    $data = new stdClass();
	    $syarat = $this->syarat_model->get_syarat($id);

	    $data = array('syarat'=>$syarat, 'id'=>$id);

	    $this->load->helper('form');
	    $this->load->library('form_validation');

	    // set validation rules
	    $this->form_validation->set_rules('syarat', 'Judul Syarat', 'required');
	    // $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
	    $this->form_validation->set_rules('jenis', 'Jenis Syarat', 'required');

	    if ($this->form_validation->run() === false) {
			$this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->helper('url');
				$this->load->view('master/Civitas/header');
				$this->load->view('pages/Civitas/editSyaratYudisium', $data);
				$this->load->view('master/Civitas/navigation');
				$this->load->view('master/formJs');
				$this->load->view('master/footer');
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'user/login');
			}
		} else {
			$syarat = $this->input->post('syarat');
			$deskripsi = $this->input->post('deskripsi');
			$jenis = $this->input->post('jenis');
			$jenjang = $this->input->post('jenjang');
			$civitas = $this->session->userdata('civitas_id');

			if ($this->syarat_model->update_syarat($id, $syarat, $deskripsi, $jenis, $civitas, $jenjang)) {

				$success = "update success";
				$data = array('success' => $success );

				$this->load->library('session');
				if ($this->session->has_userdata('username')) {
					$this->load->helper('url');
					header('location:'.base_url().'syarat/daftarSyaratYudisium');
					$this->session->set_flashdata('success', $success);
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'user/login');
				}

			} else {

        		// user creation failed, this should never happen
				$data->error = 'There was a problem. Please try again.';

				$this->load->library('session');
				if ($this->session->has_userdata('username')) {
					$this->load->helper('url');
					$this->load->view('master/Civitas/header');
					$this->load->view('pages/Civitas/editSyaratYudisium', $data);
					$this->load->view('master/Civitas/navigation');
					$this->load->view('master/formJs');
					$this->load->view('master/footer');
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'user/login');
				}
			}
		}
	}

	public function deleteSyaratYudisium($syarat_id)
	{
	    $data = new stdClass();
    	$this->syarat_model->delete_jms($syarat_id);
    	$this->syarat_model->delete_syarat($syarat_id);
    	$success = "Delete success";
		$data = array('success' => $success );

		$this->load->library('session');
		if ($this->session->has_userdata('username')) {
			header('location:'.base_url().'syarat/daftarSyaratYudisium');
			$this->session->set_flashdata('success', $success);
		} else {
			$this->load->helper('url');
			header('location:'.base_url().'user/login');
		}
	}

	public function uploadDataYudisium()
	{
		$this->load->helper('url');
		$this->load->view('master/Civitas/header');
		$this->load->view('pages/Civitas/uploadData');
		$this->load->view('master/Civitas/navigation');
		$this->load->view('master/tableJs');
		$this->load->view('master/footer');
	}
}
