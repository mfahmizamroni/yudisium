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
		if ($this->session->userdata('departemen_id') == 0) {
	    	$mahasiswa = $this->mhs_model->get_mhs_all();
	    } else {	
	    	$mahasiswa = $this->mhs_model->get_mhs_per_departemen($this->session->userdata('departemen_id'));
	    }

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
					header('location:'.base_url().'super');
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
	
	public function formKelengkapanMahasiswa($mhs_id)
	{

		$data = new stdClass();
		$formBebas = $this->civitas_model->get_civitas_per_mhs_with_syarat($mhs_id);
		$mahasiswa = $this->mhs_model->get_mhs($mhs_id);
		$departemen = $this->departemen_model->get_departemen($this->session->userdata('departemen_id'));

		$data = array('formBebas'=>$formBebas,'mhs_id'=>$mhs_id,'mahasiswa'=>$mahasiswa,'departemen'=>$departemen);

		if ($this->session->has_userdata('username')) {
			$this->load->helper('url');
			$this->load->view('master/super/headerSA');
			$this->load->view('pages/Super/Mhs/formKelengkapan',$data);
			$this->load->view('master/Super/navigationSA');
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
			$this->load->view('master/Super/headerSA');
			$this->load->view('pages/Super/Mhs/detailMahasiswa', $data);
			$this->load->view('master/Super/navigationSA');
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
					header('location:'.base_url().'super');
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
					$this->load->view('pages/Super/Mhs/detailMahasiswa', $data);
					$this->load->view('master/Super/navigationSA');
					$this->load->view('master/formJs');
					$this->load->view('master/footer');
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'user/login');
				}
			}
		}
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
	public function daftarCivitas()
	{
		$data = new stdClass();
		$departemen = $this->departemen_model->get_departemen($this->session->userdata('departemen_id'));
		if ($this->session->userdata('departemen_id') == 0) {
	    	$civitas = $this->civitas_model->get_civitas_all();
	    } else {	
	    	$civitas = $this->civitas_model->get_civitas_per_departemen($this->session->userdata('departemen_id'));
	    }

		$data = array('departemen'=>$departemen,'civitas'=>$civitas);

		if ($this->session->has_userdata('username')) {
			$this->load->helper('url');
			$this->load->view('master/super/headerSA');
			$this->load->view('pages/Super/Civitas/daftarInstansi',$data);
			$this->load->view('master/Super/navigationSA');
			$this->load->view('master/tableJs');
			$this->load->view('master/footer');
		} else {
			$this->load->helper('url');
			header('location:'.base_url().'user/login');
		}
	}

	public function detailCivitas($civitas_id)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data = new stdClass();
		$mahasiswa = $this->mhs_model->get_mhs_per_civitas_with_syarat($civitas_id);
		$civitas = $this->civitas_model->get_civitas($civitas_id);

		$data = array('mahasiswa'=>$mahasiswa,'civitas'=>$civitas);

		$this->form_validation->set_rules('mhs[]', 'mhs', 'required');

		if ($this->form_validation->run() === false) {
			$this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->helper('url');
				$this->load->view('master/Super/headerSA');
				$this->load->view('pages/Super/Civitas/daftarMahasiswa', $data);
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
					header('location:'.base_url().'super/detailCivitas/'.$civitas_id);
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
					$this->load->view('pages/Super/Civitas/daftarMahasiswa', $data);
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

	public function detailMahasiswa($mhs_id, $civitas_id)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data =  new stdClass();
		$civitas = $this->civitas_model->get_civitas($civitas_id);
		$mahasiswa = $this->mhs_model->get_mhs_per_civitas_with_syarat_per_id($civitas_id, $mhs_id);

		$data = array('mahasiswa'=>$mahasiswa,'civitas'=>$civitas);

		$this->form_validation->set_rules('jms1', ' ', 'required');

		if ($this->form_validation->run() === false) {
			$this->load->helper('url');
			$this->load->view('master/Super/headerSA');
			$this->load->view('pages/Super/Civitas/detailMahasiswa', $data);
			$this->load->view('master/Super/navigationSA');
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
					$this->load->helper('url');
					header('location:'.base_url().'super/detailCivitas/'.$civitas_id);
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
					$this->load->view('pages/Super/Civitas/detailMahasiswa', $data);
					$this->load->view('master/Super/navigationSA');
					$this->load->view('master/formJs');
					$this->load->view('master/footer');
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'user/login');
				}
			}
		}
	}

	public function addCivitas()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data =  new stdClass();
		$departemen = $this->departemen_model->get_departemen_all();

		$data = array('departemen'=>$departemen);

		$this->form_validation->set_rules('nama', 'Nama Civitas', 'required');
		$this->form_validation->set_rules('tipe', 'Tipe Civitas', 'required');

		if ($this->form_validation->run() === false) {
			$this->load->helper('url');
			$this->load->view('master/Super/headerSA');
			$this->load->view('pages/Super/Civitas/addInstansi', $data);
			$this->load->view('master/Super/navigationSA');
			$this->load->view('master/formJs');
			$this->load->view('master/footer');
		} else {
			$civitas_nama = $this->input->post('nama');
			$civitas_tipe = $this->input->post('tipe');
			if ($this->session->userdata('departemen_id') == 0) {
				$civitas_departemen = $this->input->post('departemen');
			} else {
				$civitas_departemen = $this->session->userdata('departemen_id');
			}

			if ($this->civitas_model->create_civitas($civitas_nama, $civitas_tipe, $civitas_departemen)) {
				$success = "Civitas Created";
				$data = array('success' => $success);

				$this->load->library('session');
				if ($this->session->has_userdata('username')) {
					$this->load->helper('url');
					header('location:'.base_url().'super/daftarCivitas');
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
					$this->load->view('pages/Super/Civitas/addInstansi', $data);
					$this->load->view('master/Super/navigationSA');
					$this->load->view('master/formJs');
					$this->load->view('master/footer');
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'user/login');
				}
			}
		}
	}

	public function editCivitas($civitas_id)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data =  new stdClass();
		$civitas = $this->civitas_model->get_civitas($civitas_id);
		$departemen = $this->departemen_model->get_departemen_all();

		$data = array('civitas'=>$civitas,'departemen'=>$departemen);

		$this->form_validation->set_rules('nama', 'Nama Civitas', 'required');
		$this->form_validation->set_rules('tipe', 'Tipe Civitas', 'required');

		if ($this->form_validation->run() === false) {
			$this->load->helper('url');
			$this->load->view('master/Super/headerSA');
			$this->load->view('pages/Super/Civitas/editInstansi',$data);
			$this->load->view('master/Super/navigationSA');
			$this->load->view('master/formJs');
			$this->load->view('master/footer');
		} else {
			$civitas_nama = $this->input->post('nama');
			$civitas_tipe = $this->input->post('tipe');
			if ($this->session->userdata('departemen_id') == 0) {
				$civitas_departemen = $this->input->post('departemen');
			} else {
				$civitas_departemen = $this->session->userdata('departemen_id');
			}

			if ($this->civitas_model->create_civitas($civitas_nama, $civitas_tipe, $civitas_departemen)) {
				$success = "Civitas Created";
				$data = array('success' => $success);

				$this->load->library('session');
				if ($this->session->has_userdata('username')) {
					$this->load->helper('url');
					header('location:'.base_url().'super/daftarCivitas');
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
					$this->load->view('pages/Super/Civitas/editInstansi',$data);
					$this->load->view('master/Super/navigationSA');
					$this->load->view('master/formJs');
					$this->load->view('master/footer');
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'user/login');
				}
			}
		}
	}

	public function daftarUserCivitas()
	{

		$data = new stdClass();
		$departemen = $this->departemen_model->get_departemen($this->session->userdata('departemen_id'));
		if ($this->session->userdata('departemen_id') == 0) {
	    	$user = $this->user_model->get_user_all();
	    } else {	
	    	$user = $this->user_model->get_user_per_departemen($this->session->userdata('departemen_id'));
	    }

		$data = array('departemen'=>$departemen,'user'=>$user);

		if ($this->session->has_userdata('username')) {
			$this->load->helper('url');
			$this->load->view('master/super/headerSA');
			$this->load->view('pages/Super/Civitas/daftarUserInstansi',$data);
			$this->load->view('master/Super/navigationSA');
			$this->load->view('master/tableJs');
			$this->load->view('master/footer');
		} else {
			$this->load->helper('url');
			header('location:'.base_url().'user/login');
		}
	}

	public function addUserCivitas()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data =  new stdClass();
		$departemen = $this->departemen_model->get_departemen($this->session->userdata('departemen_id'));
		if ($this->session->userdata('departemen_id') == 0) {
	    	$civitas = $this->civitas_model->get_civitas_all();
	    } else {	
	    	$civitas = $this->civitas_model->get_civitas_per_departemen($this->session->userdata('departemen_id'));
	    }

		$data = array('departemen'=>$departemen,'civitas'=>$civitas);

		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[adm.adm_email]', array('is_unique' => 'This email already exists. Please choose another one.'));
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[adm.adm_username]', array('is_unique' => 'This username already exists. Please choose another one.'));
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
		$this->form_validation->set_rules('civitas', 'civitas', 'required');

		if ($this->form_validation->run() === false) {
			$this->load->helper('url');
			$this->load->view('master/Super/headerSA');
			$this->load->view('pages/Super/Civitas/addUserInstansi', $data);
			$this->load->view('master/Super/navigationSA');
			$this->load->view('master/formJs');
			$this->load->view('master/footer');
		} else {
			$adm_nama = $this->input->post('nama');
			$adm_username = $this->input->post('username');
			$adm_email = $this->input->post('email');
			$adm_password = $this->input->post('password');
			$adm_civitas_id = $this->input->post('civitas');

			if ($this->user_model->create_user($adm_nama, $adm_username, $adm_email, $adm_password, $adm_civitas_id, 1)) {
				$success = "User Civitas Created";
				$data = array('success' => $success);

				$this->load->library('session');
				if ($this->session->has_userdata('username')) {
					$this->load->helper('url');
					header('location:'.base_url().'super/daftarUserCivitas');
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
					$this->load->view('pages/Super/Civitas/addUserInstansi', $data);
					$this->load->view('master/Super/navigationSA');
					$this->load->view('master/formJs');
					$this->load->view('master/footer');
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'user/login');
				}
			}
		}
	}

	public function editUserCivitas($id)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data =  new stdClass();
		$departemen = $this->departemen_model->get_departemen($this->session->userdata('departemen_id'));
		if ($this->session->userdata('departemen_id') == 0) {
	    	$civitas = $this->civitas_model->get_civitas_all();
	    } else {	
	    	$civitas = $this->civitas_model->get_civitas_per_departemen($this->session->userdata('departemen_id'));
	    }
		$user = $this->user_model->get_user($id);

		$data = array('departemen'=>$departemen,'civitas'=>$civitas,'user'=>$user);

		if($this->input->post('email') != $user->adm_email) {
		   $is_emailunique =  '|is_unique[adm.adm_email]';
		} else {
		   $is_emailunique =  '';
		}

		if($this->input->post('username') != $user->adm_username) {
		   $is_unique =  '|is_unique[adm.adm_username]';
		} else {
		   $is_unique =  '';
		}

		if($this->input->post('password') != "11111") {
		   $required =  '|min_length[6]|required';
		} else {
		   $required =  '';
		}

		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email'.$is_emailunique , array('is_unique' => 'This email already exists. Please choose another one.'));
		$this->form_validation->set_rules('username', 'Username', 'required'.$is_unique, array('is_unique' => 'This username already exists. Please choose another one.'));
		$this->form_validation->set_rules('password', 'Password', 'trim'.$required);
		$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|matches[password]'.$required);
		$this->form_validation->set_rules('civitas', 'civitas', 'required');

		if ($this->form_validation->run() === false) {
			$this->load->helper('url');
			$this->load->view('master/Super/headerSA');
			$this->load->view('pages/Super/Civitas/editUserInstansi', $data);
			$this->load->view('master/Super/navigationSA');
			$this->load->view('master/formJs');
			$this->load->view('master/footer');
		} else {
			$adm_nama = $this->input->post('nama');
			$adm_username = $this->input->post('username');
			$adm_email = $this->input->post('email');
			$adm_password = $this->input->post('password');
			$adm_civitas_id = $this->input->post('civitas');
			if ($adm_password = "11111") {
				$update = $this->user_model->update_user_np($id, $adm_nama, $adm_username, $adm_email, $adm_civitas_id, 1);
			} else {
				$update = $this->user_model->update_user($id, $adm_nama, $adm_username, $adm_email, $adm_password, $adm_civitas_id, 1);
			}

			if ($update) {
				$success = "User Civitas updated";
				$data = array('success' => $success);

				$this->load->library('session');
				if ($this->session->has_userdata('username')) {
					$this->load->helper('url');
					header('location:'.base_url().'super/daftarUserCivitas');
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
					$this->load->view('pages/Super/Civitas/editUserInstansi', $data);
					$this->load->view('master/Super/navigationSA');
					$this->load->view('master/formJs');
					$this->load->view('master/footer');
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'user/login');
				}
			}
		}
	}

	public function deleteCivitas($civitas_id)
	{
	    $data = new stdClass();
    	$this->syarat_model->delete_syarat_per_civitas($civitas_id);
    	$this->syarat_model->delete_jms_per_civitas($civitas_id);
    	$this->user_model->delete_user_per_civitas($civitas_id);
    	$this->civitas_model->delete_jmc_per_civitas($civitas_id);
    	$this->civitas_model->delete_civitas($civitas_id);
    	$success = "Delete success";
		$data = array('success' => $success );

		$this->load->library('session');
		if ($this->session->has_userdata('username')) {
			header('location:'.base_url().'super/daftarCivitas');
			$this->session->set_flashdata('success', $success);
		} else {
			$this->load->helper('url');
			header('location:'.base_url().'user/login');
		}
	}

	public function deleteUserCivitas($id)
	{
	    $data = new stdClass();
    	$this->user_model->delete_user($id);
    	$success = "Delete success";
		$data = array('success' => $success );

		$this->load->library('session');
		if ($this->session->has_userdata('username')) {
			header('location:'.base_url().'super/daftarUserCivitas');
			$this->session->set_flashdata('success', $success);
		} else {
			$this->load->helper('url');
			header('location:'.base_url().'user/login');
		}
	}

	// End Menu Civitas

	// Begin Syarat Yudisium // 
	public function daftarSyaratYudisium()
	{

		$data = new stdClass();
		$departemen = $this->departemen_model->get_departemen($this->session->userdata('departemen_id'));
		$civitas = $this->civitas_model->get_civitas_per_departemen($departemen->departemen_id);

		$data = array('civitas'=>$civitas,'departemen'=>$departemen);

		if ($this->session->has_userdata('username')) {
			$this->load->helper('url');
			$this->load->view('master/super/headerSA');
			$this->load->view('pages/Super/SyaratYudisium/daftarSyaratYudisium',$data);
			$this->load->view('master/Super/navigationSA');
			$this->load->view('master/tableJs');
			$this->load->view('master/footer');
		} else {
			$this->load->helper('url');
			header('location:'.base_url().'user/login');
		}
	}

	public function detailSyarat($civitas_id)
	{

		$data = new stdClass();
		$departemen = $this->departemen_model->get_departemen($this->session->userdata('departemen_id'));
		$syarat = $this->syarat_model->get_syarat_per_civitas($civitas_id);

		$data = array('departemen'=>$departemen,'syarat'=>$syarat);

		if ($this->session->has_userdata('username')) {
			$this->load->helper('url');
			$this->load->view('master/super/headerSA');
			$this->load->view('pages/Super/SyaratYudisium/detailSyaratYudisium',$data);
			$this->load->view('master/Super/navigationSA');
			$this->load->view('master/tableJs');
			$this->load->view('master/footer');
		} else {
			$this->load->helper('url');
			header('location:'.base_url().'user/login');
		}
	}


	public function addSyaratYudisium()
	{

		// create the data object
	    $data = new stdClass();
	    if ($this->session->userdata('departemen_id') == 0) {
	    	$civitas = $this->civitas_model->get_civitas_all();
	    } else {	
	    	$civitas = $this->civitas_model->get_civitas_per_departemen($this->session->userdata('departemen_id'));
	    }

	    $data = array('civitas'=>$civitas);

	    $this->load->helper('form');
	    $this->load->library('form_validation');

	    // set validation rules
	    $this->form_validation->set_rules('syarat', 'Judul Syarat', 'required');
	    // $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
	    $this->form_validation->set_rules('jenis', 'Jenis Syarat', 'required');
	    $this->form_validation->set_rules('civitas', 'Civitas', 'required');
	    $this->form_validation->set_rules('jenjang', 'Jenjang', 'required');

	    if ($this->form_validation->run() === false) {
			$this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->helper('url');
				$this->load->view('master/Super/headerSA');
				$this->load->view('pages/Super/SyaratYudisium/addSyaratYudisium', $data);
				$this->load->view('master/Super/navigationSA');
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
			$civitas = $this->input->post('civitas');

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
					header('location:'.base_url().'super/daftarSyaratYudisium');
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
					$this->load->view('master/Super/headerSA');
					$this->load->view('pages/Super/SyaratYudisium/addSyaratYudisium', $data);
					$this->load->view('master/Super/navigationSA');
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
	    if ($this->session->userdata('departemen_id') == 0) {
	    	$civitas = $this->civitas_model->get_civitas_all();
	    } else {	
	    	$civitas = $this->civitas_model->get_civitas_per_departemen($this->session->userdata('departemen_id'));
	    }
	    $syarat = $this->syarat_model->get_syarat($id);

	    $data = array('civitas'=>$civitas,'syarat'=>$syarat,'id'=>$id);

	    $this->load->helper('form');
	    $this->load->library('form_validation');

	    // set validation rules
	    $this->form_validation->set_rules('syarat', 'Judul Syarat', 'required');
	    // $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
	    $this->form_validation->set_rules('jenis', 'Jenis Syarat', 'required');
	    $this->form_validation->set_rules('civitas', 'Civitas', 'required');
	    $this->form_validation->set_rules('jenjang', 'Jenjang', 'required');

	    if ($this->form_validation->run() === false) {
			$this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->helper('url');
				$this->load->view('master/Super/headerSA');
				$this->load->view('pages/Super/SyaratYudisium/editSyaratYudisium', $data);
				$this->load->view('master/Super/navigationSA');
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
			$civitas = $this->input->post('civitas');

			if ($this->syarat_model->update_syarat($id, $syarat, $deskripsi, $jenis, $civitas, $jenjang)) {

				$success = "update success";
				$data = array('success' => $success );

				$this->load->library('session');
				if ($this->session->has_userdata('username')) {
					$this->load->helper('url');
					header('location:'.base_url().'super/daftarSyaratYudisium');
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
					$this->load->view('master/Super/headerSA');
					$this->load->view('pages/Super/SyaratYudisium/editSyaratYudisium', $data);
					$this->load->view('master/Super/navigationSA');
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
			header('location:'.base_url().'super/daftarSyaratYudisium');
			$this->session->set_flashdata('success', $success);
		} else {
			$this->load->helper('url');
			header('location:'.base_url().'user/login');
		}
	}

	public function uploadDataYudisium()
	{
		$this->load->helper('url');
		$this->load->view('master/Super/headerSA');
		$this->load->view('pages/Super/SyaratYudisium/uploadData');
		$this->load->view('master/Super/navigationSA');
		$this->load->view('master/tableJs');
		$this->load->view('master/footer');
	}
	// End Syarat Yudisium
}
