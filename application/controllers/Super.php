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
		
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('master/Super/headerSA');
		$this->load->view('pages/Super/daftarMahasiswa');
		$this->load->view('master/Super/navigationSA');
		$this->load->view('master/tableJs');
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
