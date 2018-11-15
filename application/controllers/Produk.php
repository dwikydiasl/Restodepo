<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

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

	
	public function kategori_lainnya (){

		$data['detail'] 	= $this->toko_model->getKategoriLainnya();
		$this->load->view('public/pencarian_produk',$data);
	}

	public function detail (){

		$last_segment 		= $this->uri->total_segments();
        $key 				= $this->uri->segment($last_segment);
		$data['detail'] 	= $this->dasar_model->getDetailOnField('item_produk','permalink', $key);
		/*
		$foto 				= $this->toko_model->getFotoProdukById($data['detail']['id_item']);  
        if($foto){
            foreach($foto as $item){
                $foto_produk[] = array(
                    'file_foto' => base_url().'assets/gambar_item/foto/'.$item['file_foto'],
                    'thumbnail' => base_url().'assets/gambar_item/thumbnail/'.$item['thumbnail'],
                );
            }
        } else {
            $foto_produk[] 	= array(
                'file_foto' => base_url().'assets/avatar_pembeli/noimage.png',
                'thumbnail' => base_url().'assets/avatar_pembeli/noimage.png'
            );
        }
        */
		$data['toko']		= $this->dasar_model->getDetailOnField('penjual','nama_toko', $key);
		$data['produk_lainnya'] = $this->toko_model->getProdukLainnyaById($data['detail']['id_penjual'],$data['detail']['id_item']);
		$data['kategori']	= $this->dasar_model->getDetailOnField('kategori_produk','permalink', $key);


		$this->load->view('public/detail_produk',$data);
	}


	public function produk_terbaru_lainnya (){

		if($this->dasar_model->apakahMaintenance())
		{
			$this->load->view('public/maintenance');	
		}
		else
		{
			if ($this->session->userdata($this->config->item('sess_prefix_pembeli').'IDSession'))
			{
				
			}
			else
			{
				
			}
			/*
			$data['pagging'] = $this->load->view("public/pagination", array("current" => $page, "total" => $data['count'], "limit" => $limit), true);*/
			$data['produk_terbaru_lainnya']	=$this->toko_model->getProdukTerbaruLainnya();

		}

		$this->load->view('public/pencarian_produk_terbaru',$data);
	}

	public function produk_terlaris_lainnya (){

		if($this->dasar_model->apakahMaintenance())
		{
			$this->load->view('public/maintenance');	
		}
		else
		{
			if ($this->session->userdata($this->config->item('sess_prefix_pembeli').'IDSession'))
			{
				
			}
			else
			{
				
			}

			$data['produk_terlaris_lainnya']	=$this->toko_model->getProdukTerlarisLainnya();

		}

		$this->load->view('public/pencarian_produk_terlaris',$data);
	}

	public function ajukan_penawaran_produk (){


		$this->load->view('public/permintaan_penawaran');
	}
}
