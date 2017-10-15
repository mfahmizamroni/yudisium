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
		
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('master/Mhs/headerMhs');
		$this->load->view('pages/Mhs/formKelengkapan');
		$this->load->view('master/Mhs/navigationMhs');
		$this->load->view('master/tableJs');
		$this->load->view('master/footer');
	}
	public function detailSyaratYudisium()
	{
		$this->load->helper('url');
		$this->load->view('master/Mhs/headerMhs');
		$this->load->view('pages/Mhs/addLink');
		$this->load->view('master/Mhs/navigationMhs');
		$this->load->view('master/tableJs');
		$this->load->view('master/footer');
	}
}
