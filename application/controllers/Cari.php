<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cari extends CI_Controller {

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
                $this->load->model('toko_model');
        }

	public function cari()
	{
		$this->load->model('Toko_model');
		$search = $this->input->post('search');
		$data['users'] = $this->Toko_model->search_produk($search);
		$this->load->view('public/pencarian_produk',$data);
	}

	public function carikategori() {
		$this->load->model('Toko_model');
		$data = $this->uri->uri_to_assoc();
		$code = $data['search'];
		$data['users'] = $this->Toko_model->search_kategori($code);
		$this->load->view('public/pencarian_produk',$data);
	}

	public function klikKategori()
	{
		$data = $this->uri->uri_to_assoc();
		$id_kategori = $data['search'];
		$data['detail'] 	= $this->toko_model->getKlikKategori($id_kategori);

		$this->load->view('public/pencarian_produk',$data);
	}
		
}
