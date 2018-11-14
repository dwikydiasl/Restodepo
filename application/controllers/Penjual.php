<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjual extends CI_Controller {

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

	
	public function invoice_penjual (){


		$this->load->view('public/invoice-penjual');
	}
	public function pembayaran_pengiriman (){


		$this->load->view('public/pembayaran-pengiriman');
	}
	public function produk_toko (){


		$this->load->view('public/produk-toko');
	}

	public function tambah_produk (){


		$this->load->view('public/tambah-produk');
	}

	public function permintaan_penawaran_pembeli (){


		$this->load->view('public/permintaan-penawaran-pembeli');
	}

	public function kotak_pesan (){


		$this->load->view('public/kotak-pesan-penjual');
	}

	public function kontak_pembeli (){


		$this->load->view('public/kontak-pembeli');
	}
	public function edit_profil (){


		$this->load->view('public/edit-profil-penjual');
	}
	
}
