<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mhs extends CI_Controller {

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
		$this->load->model('civitas_model');
		$this->load->model('syarat_model');
	}

	public function index()
	{
		$data = new stdClass();
		$civitas = $this->civitas_model->get_civitas_per_mhs_with_syarat($this->session->userdata('id'));

		$data = array('civitas'=>$civitas);

		if ($this->session->has_userdata('nama')) {
			$this->load->helper('url');
			$this->load->view('master/Mhs/headerMhs');
			$this->load->view('pages/Mhs/formKelengkapan',$data);
			$this->load->view('master/Mhs/navigationMhs');
			$this->load->view('master/tableJs');
			$this->load->view('master/footer');
		} else {
			$this->load->helper('url');
			header('location:'.base_url().'mhs/login');
		}
	}

	public function detailSyaratYudisium($civitas_id)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data = new stdClass();
		$civitas = $this->civitas_model->get_civitas($civitas_id);
		$syarat = $this->syarat_model->get_syarat_per_civitas_per_mhs($civitas_id, $this->session->userdata('id'));

		$this->form_validation->set_rules('syarat[]', '', 'required');

		$data = array('syarat'=>$syarat,'civitas'=>$civitas);

		if ($this->form_validation->run() === false) {
			if ($this->session->has_userdata('nama')) {
				$this->load->helper('url');
				$this->load->view('master/Mhs/headerMhs');
				$this->load->view('pages/Mhs/addLink', $data);
				$this->load->view('master/Mhs/navigationMhs');
				$this->load->view('master/formJs');
				$this->load->view('master/footer');
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'mhs/login');
			}
		} else {
			$temp = "";
			$bukti = $this->input->post('bukti');
			$syarat = $this->input->post('syarat');

			for($i=0;$i<sizeof($bukti);$i++)
			{
			    $syarat_id = $syarat[$i];
			    $temp = $this->syarat_model->update_bukti_jms_per_mahasiswa($this->session->userdata('id'), $syarat_id, $bukti[$i]);
			}

			if ($temp) {
				$success = "Bukti Updated";
				$data = array('success' => $success );

				$this->load->library('session');
				if ($this->session->has_userdata('nama')) {
					$this->load->helper('url');
					header('location:'.base_url().'mhs');
					$this->session->set_flashdata('success', $success);
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'mhs/login');
				}

			} else {

				$data = new stdClass();
				$syarat = $this->syarat_model->get_syarat_per_civitas_per_mhs($civitas_id, $this->session->userdata('id'));
				$data = array('syarat'=>$syarat);
        		// user creation failed, this should never happen
				$data->error = 'There was a problem Please try again.';

				$this->load->library('session');
				if ($this->session->has_userdata('nama')) {
					$this->load->helper('url');
					$this->load->view('master/Mhs/headerMhs');
					$this->load->view('pages/Mhs/addLink', $data);
					$this->load->view('master/Mhs/navigationMhs');
					$this->load->view('master/formJs');
					$this->load->view('master/footer');
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'mhs/login');
				}
			}
		}
	}

	public function editProfile(){
		$this->load->helper('url');
		$this->load->view('master/Mhs/headerMhs');
		$this->load->view('pages/Mhs/editProfile');
		$this->load->view('master/Mhs/navigationMhs');
		$this->load->view('master/tableJs');
		$this->load->view('master/footer');
	}

	public function login()
	{
		// create the data object
		$data = new stdClass();
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		// set validation rules
		$this->form_validation->set_rules('nrp', 'NRP', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run() == false) {
			
			if ($this->session->has_userdata('nama')) {
				$this->load->helper('url');
				header('location:'.base_url().'mhs');
			} else {
				// validation not ok, send validation errors to the view
				$this->load->helper('url');
				$this->load->view('loginMhs');
			}
			
		} else {
			
			// set variables from the form
			$nrp = $this->input->post('nrp');
			$password = $this->input->post('password');
			//$remember = $this->input->post('remember');
			
			if ($this->mhs_model->resolve_mhs_login($nrp, $password)) {
				
				$mhs_id = $this->mhs_model->get_mhs_id_from_nrp($nrp);
				$mhs = $this->mhs_model->get_mhs($mhs_id);
				$departemen = $this->mhs_model->get_mhs_departemen($mhs_id);
				
				$newdata = array(
					'id' 	 		=> (string)$mhs->mhs_id,
					'nama' 	 		=> (string)$mhs->mhs_nama,
					'nrp'			=> (string)$mhs->mhs_nrp,
					'jenjang'		=> (string)$mhs->mhs_jenjang,
					'departemen'	=> (string)$departemen->departemen_nama,
					'logged_in' 	=> TRUE
					);

				// $this->load->helper('cookie');
				// if ($remember == 1) {
		  //           $cookie = $this->input->cookie('ci_sessions_cookie'); // we get the cookie
		  //           $this->input->set_cookie('ci_sessions', $cookie, '1800');
				// } else{
				// 	delete_cookie("ci_sessions_cookie");
				// }
				$this->session->set_userdata($newdata);
				
				// user login ok
				$this->load->helper('url');
				header('location:'.base_url().'mhs');
				
			} else {
				
				// login failed
				$data->error = 'Wrong username or password.';
				
				// send error to the view
				$this->load->helper('url');
				$this->load->view('loginMhs', $data);
				
			}
			
		}
	}

	/**
	 * logout function.
	 * 
	 * @access public
	 * @return void
	 */
	public function logout() {
		
		// create the data object
		$data = new stdClass();
		
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			
			// remove session datas
			foreach ($_SESSION as $key => $value) {
				unset($_SESSION[$key]);
			}
			
			// user logout ok
			$this->load->helper('url');
			header('location:'.base_url().'mhs/login');
			
		} else {
			
			// there user was not logged in, we cannot logged him out,
			// redirect him to site root
			$this->load->helper('url');
			header('location:'.base_url().'mhs/login');
			
		}
		
	}

	
}
