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
		
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('master/header');
		$this->load->view('pages/form');
		$this->load->view('master/navigation');
		$this->load->view('master/allJs');
		$this->load->view('master/footer');
	}

	public function daftarMahasiswa()
	{
		$this->load->helper('url');
		$this->load->view('master/header');
		$this->load->view('pages/daftarMahasiswa');
		$this->load->view('master/navigation');
		$this->load->view('master/tableJs');
		$this->load->view('master/footer');
	}

	public function detailMahasiswa()
	{
		$this->load->helper('url');
		$this->load->view('master/header');
		$this->load->view('pages/detailMahasiswa');
		$this->load->view('master/navigation');
		$this->load->view('master/tableJs');
		$this->load->view('master/footer');
	}

	public function daftarSyaratYudisium()
	{
		$this->load->helper('url');
		$this->load->view('master/header');
		$this->load->view('pages/daftarSyaratYudisium');
		$this->load->view('master/navigation');
		$this->load->view('master/tableJs');
		$this->load->view('master/footer');
	}

	public function addSyaratYudisium()
	{
		$this->load->helper('url');
		$this->load->view('master/header');
		$this->load->view('pages/addSyaratYudisium');
		$this->load->view('master/navigation');
		$this->load->view('master/tableJs');
		$this->load->view('master/footer');
	}

	public function addCatatan()
	{
		$this->load->helper('url');
		$this->load->view('master/header');
		$this->load->view('pages/addCatatan');
		$this->load->view('master/navigation');
		$this->load->view('master/tableJs');
		$this->load->view('master/footer');
	}
}
