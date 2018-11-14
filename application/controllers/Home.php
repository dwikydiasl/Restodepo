<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
        {
                parent::__construct();
                $this->load->model('index_model');
        }

	public function index()
	{
		
		if($this->dasar_model->apakahMaintenance())
		{
			$this->load->view('public/maintenance');	
		}
		else
		{
			if ($this->session->userdata($this->config->item('sess_prefix_pembeli').'IDSession'))
			{
				$id_user = $this->session->userdata($this->config->item('sess_prefix_pembeli').'IDSession');
				
			}
			else
			{
				
			}
			
			$data['list_produk_terbaru']	=$this->index_model->getProdukTerbaru();
			$data['list_produk_terlaris']	=$this->index_model->getProdukTerlaris();

		}


			$this->load->view('public/index',$data);
	}
		
}
