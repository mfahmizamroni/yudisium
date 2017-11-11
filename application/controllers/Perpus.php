<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perpus extends CI_Controller {

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
		$this->load->model('departemen_model');
		$this->load->model('user_model');
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
			if ($this->session->userdata('role') == 3 || $this->session->userdata('role') == 2) {
				$this->load->helper('url');
				$this->load->view('master/Perpus/header');
				$this->load->view('pages/Perpus/daftarMahasiswa', $data);
				$this->load->view('master/Perpus/navigation');
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
				if ($this->session->userdata('role') == 3 || $this->session->userdata('role') == 2) {
					$this->load->helper('url');
					$this->load->view('master/Perpus/header');
					$this->load->view('pages/Perpus/daftarMahasiswa', $data);
					$this->load->view('master/Perpus/navigation');
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

	public function daftarMahasiswa()
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
			if ($this->session->userdata('role') == 3 || $this->session->userdata('role') == 2) {
				$this->load->helper('url');
				$this->load->view('master/Perpus/header');
				$this->load->view('pages/Perpus/daftarMahasiswa', $data);
				$this->load->view('master/Perpus/navigation');
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
				if ($this->session->userdata('role') == 3 || $this->session->userdata('role') == 2) {
					$this->load->helper('url');
					$this->load->view('master/Perpus/header');
					$this->load->view('pages/Perpus/daftarMahasiswa', $data);
					$this->load->view('master/Perpus/navigation');
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

	public function detailMahasiswa($mhs_id)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data =  new stdClass();
		$civitas_id = $this->session->userdata('civitas_id');
		$mahasiswa = $this->mhs_model->get_mhs_per_civitas_with_syarat_per_id($civitas_id, $mhs_id);

		$data = array('mahasiswa'=>$mahasiswa);

		$this->form_validation->set_rules('jms1', ' ', 'required');

		if ($this->form_validation->run() === false) {
			if ($this->session->userdata('role') == 3 || $this->session->userdata('role') == 2) {
				$this->load->helper('url');
				$this->load->view('master/Perpus/header');
				$this->load->view('pages/Perpus/detailMahasiswa', $data);
				$this->load->view('master/Perpus/navigation');
				$this->load->view('master/formJs');
				$this->load->view('master/footer');
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'user/login');
			}
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
				if ($this->session->userdata('role') == 3 || $this->session->userdata('role') == 2) {
					$this->load->helper('url');
					header('location:'.base_url().'perpus/daftarMahasiswa');
					$this->session->set_flashdata('success', $success);
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'user/login');
				}

			} else {

        		// user creation failed, this should never happen
				$data->error = 'There was a problem Please try again.';

				$this->load->library('session');
				if ($this->session->userdata('role') == 3 || $this->session->userdata('role') == 2) {
					$this->load->helper('url');
					$this->load->view('master/Perpus/header');
					$this->load->view('pages/Perpus/detailMahasiswa', $data);
					$this->load->view('master/Perpus/navigation');
					$this->load->view('master/formJs');
					$this->load->view('master/footer');
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'user/login');
				}
			}
		}
	}

	public function addCatatan($jmc_id)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data =  new stdClass();
		$civitas_id = $this->session->userdata('civitas_id');
		$mahasiswa = $this->mhs_model->get_mhs_per_civitas($civitas_id);

		$data = array('mahasiswa'=>$mahasiswa,'id'=>$jmc_id);

		$this->form_validation->set_rules('catatan', 'catatan', 'required');

		if ($this->form_validation->run() === false) {
			if ($this->session->userdata('role') == 3 || $this->session->userdata('role') == 2) {
				$this->load->helper('url');
				$this->load->view('master/Perpus/header');
				$this->load->view('pages/Perpus/addCatatan', $data);
				$this->load->view('master/Perpus/navigation');
				$this->load->view('master/formJs');
				$this->load->view('master/footer');
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'user/login');
			}
		} else {
			$catatan = $this->input->post('catatan');
			$civitas_id = $this->session->userdata('civitas_id');

			if ($this->civitas_model->update_catatan_jmc($jmc_id,$catatan)) {
				$success = "Catatan Telah Ditambahkan";
				$data = array('success' => $success );

				$this->load->library('session');
				if ($this->session->userdata('role') == 3 || $this->session->userdata('role') == 2) {
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
				if ($this->session->userdata('role') == 3 || $this->session->userdata('role') == 2) {
					$this->load->helper('url');
					$this->load->view('master/Perpus/header');
					$this->load->view('pages/Perpus/addCatatan', $data);
					$this->load->view('master/Perpus/navigation');
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
		$user = $this->user_model->get_user_per_civitas($this->session->userdata('civitas_id'));

		$data = array('departemen'=>$departemen,'user'=>$user);

		if ($this->session->userdata('role') == 3) {
			$this->load->helper('url');
			$this->load->view('master/Perpus/header');
			$this->load->view('pages/Perpus/daftarUserInstansi',$data);
			$this->load->view('master/Perpus/navigation');
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
			if ($this->session->userdata('role') == 3) {
				$this->load->helper('url');
				$this->load->view('master/Perpus/header');
				$this->load->view('pages/Perpus/addUserInstansi', $data);
				$this->load->view('master/Perpus/navigation');
				$this->load->view('master/formJs');
				$this->load->view('master/footer');
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'user/login');
			}
		} else {
			$adm_nama = $this->input->post('nama');
			$adm_username = $this->input->post('username');
			$adm_email = $this->input->post('email');
			$adm_password = $this->input->post('password');
			$adm_civitas_id = $this->input->post('civitas');

			if ($this->user_model->create_user($adm_nama, $adm_username, $adm_email, $adm_password, $adm_civitas_id, 2)) {
				$success = "User Civitas Created";
				$data = array('success' => $success);

				$this->load->library('session');
				if ($this->session->userdata('role') == 3) {
					$this->load->helper('url');
					header('location:'.base_url().'perpus/daftarUserCivitas');
					$this->session->set_flashdata('success', $success);
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'user/login');
				}

			} else {

        		// user creation failed, this should never happen
				$data->error = 'There was a problem Please try again.';

				$this->load->library('session');
				if ($this->session->userdata('role') == 3) {
					$this->load->helper('url');
					$this->load->view('master/Perpus/header');
					$this->load->view('pages/Perpus/addUserInstansi', $data);
					$this->load->view('master/Perpus/navigation');
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
			$this->load->view('master/perpus/header');
			$this->load->view('pages/perpus/editUserInstansi', $data);
			$this->load->view('master/perpus/navigation');
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
				if ($this->session->userdata('role') == 3) {
					$this->load->helper('url');
					header('location:'.base_url().'perpus/daftarUserCivitas');
					$this->session->set_flashdata('success', $success);
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'user/login');
				}

			} else {

        		// user creation failed, this should never happen
				$data->error = 'There was a problem Please try again.';

				$this->load->library('session');
				if ($this->session->userdata('role') == 3) {
					$this->load->helper('url');
					$this->load->view('master/Perpus/header');
					$this->load->view('pages/Perpus/editUserInstansi', $data);
					$this->load->view('master/Perpus/navigation');
					$this->load->view('master/formJs');
					$this->load->view('master/footer');
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'user/login');
				}
			}
		}
	}

	public function deleteUserCivitas($id)
	{
	    $data = new stdClass();
    	$this->user_model->delete_user($id);
    	$success = "Delete success";
		$data = array('success' => $success );

		$this->load->library('session');
		if ($this->session->userdata('role') == 3) {
			header('location:'.base_url().'perpus/daftarUserCivitas');
			$this->session->set_flashdata('success', $success);
		} else {
			$this->load->helper('url');
			header('location:'.base_url().'user/login');
		}
	}

	public function daftarSyaratYudisium()
	{
		$data = new stdClass();
		$civitas_id = $this->session->userdata('civitas_id');
		$syarat = $this->syarat_model->get_syarat_per_civitas($civitas_id);

		$data = array('syarat'=>$syarat);

		if ($this->session->userdata('role') == 3) {
			$this->load->helper('url');
			$this->load->view('master/Perpus/header');
			$this->load->view('pages/Perpus/daftarSyaratYudisium', $data);
			$this->load->view('master/Perpus/navigation');
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

	    $this->load->helper('form');
	    $this->load->library('form_validation');

	    // set validation rules
	    $this->form_validation->set_rules('syarat', 'Judul Syarat', 'required');
	    // $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
	    $this->form_validation->set_rules('jenis', 'Jenis Syarat', 'required');

	    if ($this->form_validation->run() === false) {
			$this->load->library('session');
			if ($this->session->userdata('role') == 3) {
				$this->load->helper('url');
				$this->load->view('master/Perpus/header');
				$this->load->view('pages/Perpus/addSyaratYudisium', $data);
				$this->load->view('master/Perpus/navigation');
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

				$mhs_per_civitas = $this->mhs_model->get_mhs_per_civitas_per_jenjang($civitas, $jenjang);
				foreach ($mhs_per_civitas as $mhs) {
					$this->syarat_model->create_jms($mhs->mhs_id, $insert_id, $civitas);
				}

				$success = "creation success";
				$data = array('success' => $success );

				$this->load->library('session');
				if ($this->session->userdata('role') == 3) {
					$this->load->helper('url');
					header('location:'.base_url().'perpus/daftarSyaratYudisium');
					$this->session->set_flashdata('success', $success);
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'user/login');
				}

			} else {

        		// user creation failed, this should never happen
				$data->error = 'There was a problem creating new buku. Please try again.';

				$this->load->library('session');
				if ($this->session->userdata('role') == 3) {
					$this->load->helper('url');
					$this->load->view('master/Perpus/header');
					$this->load->view('pages/Perpus/addSyaratYudisium', $data);
					$this->load->view('master/Perpus/navigation');
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
			if ($this->session->userdata('role') == 3) {
				$this->load->helper('url');
				$this->load->view('master/Perpus/header');
				$this->load->view('pages/Perpus/editSyaratYudisium', $data);
				$this->load->view('master/Perpus/navigation');
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
				if ($this->session->userdata('role') == 3) {
					$this->load->helper('url');
					header('location:'.base_url().'perpus/daftarSyaratYudisium');
					$this->session->set_flashdata('success', $success);
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'user/login');
				}

			} else {

        		// user creation failed, this should never happen
				$data->error = 'There was a problem. Please try again.';

				$this->load->library('session');
				if ($this->session->userdata('role') == 3) {
					$this->load->helper('url');
					$this->load->view('master/Perpus/header');
					$this->load->view('pages/Perpus/editSyaratYudisium', $data);
					$this->load->view('master/Perpus/navigation');
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
		if ($this->session->userdata('role') == 3) {
			header('location:'.base_url().'perpus/daftarSyaratYudisium');
			$this->session->set_flashdata('success', $success);
		} else {
			$this->load->helper('url');
			header('location:'.base_url().'user/login');
		}
	}

	public function uploadDataYudisium()
	{
		$this->load->helper('url');
		$this->load->view('master/Perpus/header');
		$this->load->view('pages/Perpus/uploadData');
		$this->load->view('master/Perpus/navigation');
		$this->load->view('master/tableJs');
		$this->load->view('master/footer');
	}
}
