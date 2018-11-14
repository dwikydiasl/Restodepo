<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang_restodepo extends CI_Controller {

	function __construct() 
	{
      	parent::__construct();
  	}
	
	public function index()
	{
			$this->load->view('public/tentang_restodepo');
	}
	
	
}
