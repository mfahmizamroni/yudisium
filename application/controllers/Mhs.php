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

		if ($this->session->has_userdata('name')) {
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
			if ($this->session->has_userdata('name')) {
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
				if ($this->session->has_userdata('name')) {
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
				if ($this->session->has_userdata('name')) {
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

		$this->load->helper('form');
		$this->load->library('form_validation');

		$data =  new stdClass();
		$mahasiswa = $this->mhs_model->get_mhs_jmc($this->session->userdata('id'));
		$dosen = $this->civitas_model->get_civitas_dosen($this->session->userdata('departemen_id'));
		$lab = $this->civitas_model->get_civitas_lab($this->session->userdata('departemen_id'));

		$data = array('mahasiswa'=>$mahasiswa,'dosen'=>$dosen,'lab'=>$lab);

		if($this->input->post('password') != "11111") {
		   $required =  '|min_length[6]|required';
		} else {
		   $required =  '';
		}

		$this->form_validation->set_rules('password', 'Password', 'trim'.$required);
		$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|matches[password]'.$required);
		$this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('dosen', 'Dosen Pembimbing', 'required');
		$this->form_validation->set_rules('lab', 'Laboratorium', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('notelp', 'Nomor Telepon', 'required');
		$this->form_validation->set_rules('lamastudi', 'Lama Studi', 'required');

		if ($this->form_validation->run() === false) {
			$this->load->helper('url');
			$this->load->view('master/Mhs/headerMhs');
			$this->load->view('pages/Mhs/editProfile', $data);
			$this->load->view('master/Mhs/navigationMhs');
			$this->load->view('master/formJs');
			$this->load->view('master/footer');
		} else {
			$password = $this->input->post('password');
			$gender = $this->input->post('gender');
			$nama = $this->input->post('nama');
			$dosen = $this->input->post('dosen');
			$lab = $this->input->post('lab');
			$tanggal = $this->input->post('tanggal');
			$notelp = $this->input->post('notelp');
			$lamastudi = $this->input->post('lamastudi');
			$id = $this->session->userdata('id');
			$jenjang = $this->session->userdata('jenjang');

			$ruang_baca = $this->civitas_model->get_civitas_ruangbaca($this->session->userdata('departemen_id'));
			$check_jmc = $this->civitas_model->get_jmc_per_mhs($id);
			$check_jms = $this->syarat_model->get_jms_per_mhs($id);

			if ($adm_password = "11111") {
				$update = $this->mhs_model->update_mhs_np($id, $gender, $nama, $tanggal, $notelp, $lamastudi, $jenjang);
				if (count($check_jmc) > 0) {
					$this->civitas_model->update_jmc($check_jmc[0]->jmc_mhs_id, $check_jmc[0]->jmc_civitas_id, $id, $dosen);
					$this->civitas_model->update_jmc($check_jmc[1]->jmc_mhs_id, $check_jmc[1]->jmc_civitas_id, $id, $lab);
					$this->civitas_model->update_jmc($check_jmc[2]->jmc_mhs_id, $check_jmc[2]->jmc_civitas_id, $id, $ruang_baca->civitas_id);
				} else {
					$jmc1 = $this->civitas_model->create_jmc($id, $dosen);
					$jmc2 = $this->civitas_model->create_jmc($id, $lab);
					$jmc3 = $this->civitas_model->create_jmc($id, $ruang_baca->civitas_id);
				}
			} else {
				$update = $this->mhs_model->update_mhs($id, $password, $gender, $nama, $tanggal, $notelp, $lamastudi, $jenjang);
				if ($check_jmc) {
					$jmc1 = $this->civitas_model->update_jmc($check_jmc[0]->jmc_mhs_id, $check_jmc[0]->jmc_civitas_id, $id, $dosen);
					$jmc2 = $this->civitas_model->update_jmc($check_jmc[1]->jmc_mhs_id, $check_jmc[1]->jmc_civitas_id, $id, $lab);
					$jmc3 = $this->civitas_model->update_jmc($check_jmc[2]->jmc_mhs_id, $check_jmc[2]->jmc_civitas_id, $id, $ruang_baca->civitas_id);
				} else {
					$jmc1 = $this->civitas_model->create_jmc($id, $dosen);
					$jmc2 = $this->civitas_model->create_jmc($id, $lab);
					$jmc3 = $this->civitas_model->create_jmc($id, $ruang_baca->civitas_id);
				}
			}

			if (count($check_jms) > 0) {
				$syaratdosen = $this->syarat_model->get_syarat_per_civitas($dosen);
				$a = 0;
				for ($i=0; $i < count($syaratdosen); $i++) { 
					$this->syarat_model->update_jms($check_jms[$i]->jms_mhs_id, $check_jms[$i]->jms_syarat_id, $id, $syaratdosen[$i]->syarat_id);
					$a++;
				}
				$syaratlab = $this->syarat_model->get_syarat_per_civitas($lab);
				for ($i=$a; $i < count($syaratlab)+$a; $i++) { 
					$this->syarat_model->update_jms($check_jms[$i]->jms_mhs_id, $check_jms[$i]->jms_syarat_id, $id, $syaratlab[$i]->syarat_id);
				}
			} else {
				$syaratdosen = $this->syarat_model->get_syarat_per_civitas($dosen);
				$a = 0;
				for ($i=0; $i < count($syaratdosen); $i++) { 
					$this->syarat_model->create_jms($id, $syaratdosen[$i]->syarat_id, $dosen);
					$a++;
				}
				$syaratlab = $this->syarat_model->get_syarat_per_civitas($lab);
				for ($i=$a; $i < count($syaratlab)+$a; $i++) { 
					$this->syarat_model->create_jms($id, $syaratlab[$i]->syarat_id, $lab);
				}
				$syaratruangbaca = $this->syarat_model->get_syarat_per_civitas($ruang_baca->civitas_id);
				for ($i=$a; $i < count($syaratruangbaca)+$a; $i++) { 
					$this->syarat_model->create_jms($id, $syaratruangbaca[$i]->syarat_id, $ruang_baca->civitas_id);
				}
			}

			if ($update) {
				$success = "Profile Updated";
				$data = array('success' => $success);

				$this->load->library('session');
				if ($this->session->has_userdata('name')) {
					$this->load->helper('url');
					header('location:'.base_url().'mhs');
					$this->session->set_flashdata('success', $success);
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'user/login');
				}

			} else {

        		// user creation failed, this should never happen
				$data->error = 'There was a problem Please try again.';

				$this->load->library('session');
				if ($this->session->has_userdata('name')) {
					$this->load->helper('url');
					$this->load->view('master/Mhs/headerMhs');
					$this->load->view('pages/Mhs/editProfile', $data);
					$this->load->view('master/Mhs/navigationMhs');
					$this->load->view('master/formJs');
					$this->load->view('master/footer');
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'user/login');
				}
			}
		}
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
			
			if ($this->session->has_userdata('name')) {
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
					'name' 	 		=> (string)$mhs->mhs_nama,
					'nrp'			=> (string)$mhs->mhs_nrp,
					'jenjang'		=> (string)$mhs->mhs_jenjang,
					'departemen_id'	=> (string)$departemen->departemen_id,
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
