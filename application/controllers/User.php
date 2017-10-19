<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('civitas_model');
	}

	public function index()
	{
		
	}

	public function login()
	{
		// create the data object
		$data = new stdClass();
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		
		// set validation rules
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run() == false) {
			
			// validation not ok, send validation errors to the view
			$this->load->helper('url');
			$this->load->view('login');
			
		} else {
			
			// set variables from the form
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			//$remember = $this->input->post('remember');
			
			if ($this->user_model->resolve_user_login($username, $password)) {
				
				$user_id = $this->user_model->get_user_id_from_username($username);
				$user = $this->user_model->get_user($user_id);
				$civitas = $this->civitas_model->get_civitas($user->adm_civitas_id);
				
				$newdata = array(
					'username'  => (string)$user->adm_username,
					'email'		=> (string)$user->adm_email,
					'civitas_id'	=> (string)$civitas->civitas_id,
					'civitas_nama'	=> (string)$civitas->civitas_nama,
					'civitas_tipe'	=> (string)$civitas->civitas_tipe,
					'logged_in' => TRUE
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
				header('location:'.base_url().'form/daftarMahasiswa');
				
			} else {
				
				// login failed
				$data->error = 'Wrong username or password.';
				
				// send error to the view
				$this->load->helper('url');
				$this->load->view('login', $data);
				
			}
			
		}
	}

	/**
	 * register function.
	 * 
	 * @access public
	 * @return void
	 */
	public function register() {
		
		// create the data object
		$data = new stdClass();
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		
		// set validation rules
		$this->form_validation->set_rules('username', 'Username', 'trim|required|valid_email|min_length[10]|is_unique[user.username]', array('is_unique' => 'This username already exists. Please choose another one.'));
		$this->form_validation->set_rules('name', 'Nama', 'required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
		$this->form_validation->set_rules('user_level', 'User Level', 'required');
		
		if ($this->form_validation->run() === false) {
			
			// validation not ok, send validation errors to the view
			$this->load->library('session');
			if ($this->session->has_userdata('username')) {
				// $this->load->helper('url');
				// $this->load->view('master/header');
				// $this->load->view('master/navigation');
				// $this->load->view('pages/user/addUser', $data);
				// $this->load->view('master/jsAdd');
				// $this->load->view('master/footer');
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'user/login');
			}
			
		} else {
			
			// set variables from the form
			$username = $this->input->post('username');
			$name = $this->input->post('name');
			$user_level = $this->input->post('user_level');
			$outlet = $this->input->post('outlet');
			$password = $this->input->post('password');
			
			if ($this->user_model->create_user($username, $user_level, $password, $name, $outlet)) {
				
				$success = "creation success";
				$outlet = $this->outlet_model->get_outlet_all();
				$data = array('success' => $success, 'outlet' => $outlet );
				// user creation ok
				$this->load->library('session');
				if ($this->session->has_userdata('username')) {
					$this->load->helper('url');
					header('location:'.base_url().'user/lists');
					$this->session->set_flashdata('success', $success);
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'user/login');
				}
				
			} else {
				
				// user creation failed, this should never happen
				$data->error = 'There was a problem creating new account. Please try again.';
				
				// send error to the view
				$this->load->library('session');
				if ($this->session->has_userdata('username')) {
					// $this->load->helper('url');
					// $this->load->view('master/header');
					// $this->load->view('master/navigation');
					// $this->load->view('pages/user/addUser', $data);
					// $this->load->view('master/jsAdd');
					// $this->load->view('master/footer');
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'user/login');
				}
				
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
			header('location:'.base_url().'user/login');
			
		} else {
			
			// there user was not logged in, we cannot logged him out,
			// redirect him to site root
			$this->load->helper('url');
			header('location:'.base_url().'user/login');
			
		}
		
	}
}
