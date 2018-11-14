<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class restodepoadmin extends CI_Controller 
{
  	function __construct() {
      	parent::__construct();
  	}	 
	 
	public function index()
	{
		redirect(base_url().'backend/login');
	}
	
	
}
?>