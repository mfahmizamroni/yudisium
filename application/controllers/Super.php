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
	}

	public function index()
	{
		if ($this->session->has_userdata('username') && $this->session->userdata('role') == 0) {
			$this->load->helper('url');
			$this->load->view('master/Super/headerSA');
			$this->load->view('pages/Super/Mhs/daftarMahasiswa');
			$this->load->view('master/Super/navigationSA');
			$this->load->view('master/tableJs');
			$this->load->view('master/footer');
		} else {
			$this->load->helper('url');
			header('location:'.base_url().'user/login');
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
	public function addInstansi()
	{
		$this->load->helper('url');
		$this->load->view('master/Super/headerSA');
		$this->load->view('pages/Super/Instansi/addInstansi');
		$this->load->view('master/Super/navigationSA');
		$this->load->view('master/tableJs');
		$this->load->view('master/footer');
	}
	public function addUserInstansi()
	{
		$this->load->helper('url');
		$this->load->view('master/Super/headerSA');
		$this->load->view('pages/Super/Instansi/addUserInstansi');
		$this->load->view('master/Super/navigationSA');
		$this->load->view('master/tableJs');
		$this->load->view('master/footer');
	}
	public function addSyaratYudisium()
	{
		$this->load->helper('url');
		$this->load->view('master/Super/headerSA');
		$this->load->view('pages/Super/SyaratYudisium/addSyaratYudisium');
		$this->load->view('master/Super/navigationSA');
		$this->load->view('master/tableJs');
		$this->load->view('master/footer');
	}
}
