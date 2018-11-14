<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller 
{
  	function __construct() {
      	parent::__construct();
      	$this->load->model('transaksiadmin_model');
  	}	 
	 
	public function tanya_jawab()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "transaksi";

		if(!($this->dasarlib->apakahBolehMelakukan('TRANSAKSI','lihat',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}		

		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
        $data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
        $data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
        $data['footer'] = $this->load->view('admin/footer', NULL, TRUE);

		$this->load->view('admin/transaksi/tanya_jawab', $data);
	}

	public function list_tanya_jawab()
	{
		$hasil = $this->transaksiadmin_model->get_list_tanya_jawab_root();
        echo $hasil;
	}

	public function view_tanya_jawab()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "transaksi";

		if(!($this->dasarlib->apakahBolehMelakukan('TRANSAKSI','lihat',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}		

		
		if(!($this->input->get('id')))
		{
  			echo "ERROR: No item selected...";
			exit;
		}
		else
		{
		  	if(!(is_numeric($this->input->get('id'))))
		  	{
  				echo "ERROR: invalid number...";
				exit;
		  	}
			else
			{
				$idroot = $this->input->get('id');
			}  
		}
		
		$data['list_tj'] = $this->transaksiadmin_model->get_detail_tanya_jawab($idroot);
		$this->load->view('admin/transaksi/detail_tanya_jawab', $data);		
	}

	public function invoice()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "transaksi";

		if(!($this->dasarlib->apakahBolehMelakukan('TRANSAKSI','lihat',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}		

		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
        $data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
        $data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
        $data['footer'] = $this->load->view('admin/footer', NULL, TRUE);

		$this->load->view('admin/transaksi/invoice', $data);
	}

	public function list_invoice()
	{
		$hasil = $this->transaksiadmin_model->get_list_invoice();
        echo $hasil;
	}

	public function view_invoice()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "transaksi";

		if(!($this->dasarlib->apakahBolehMelakukan('TRANSAKSI','lihat',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}		

		
		if(!($this->input->get('id')))
		{
  			echo "ERROR: No item selected...";
			exit;
		}
		else
		{
		  	if(!(is_numeric($this->input->get('id'))))
		  	{
  				echo "ERROR: invalid number...";
				exit;
		  	}
			else
			{
				$id = $this->input->get('id');
			}  
		}

		$data['list_detail'] = $this->transaksiadmin_model->get_detail_invoice_on_idmaster($id);
		
		$data['detail'] = $this->dasar_model->getDetailOnField('invoice_master', 'id_invoice_master', $id);

		if($data['detail']['status'] > 0)
		{ 
			$data['bank_pembeli'] = $this->dasar_model->getDetailOnField('bank_list', 'kode', $data['detail']['kode_bank_pembeli']);

			$data['debank_kami'] = $this->dasar_model->getDetailOnField('bank_kami', 'id', $data['detail']['id_bank_kami']);
			$data['nama_bank_kami'] = $this->dasar_model->getDetailOnField('bank_list', 'kode', $data['debank_kami']['kode_bank']);

		}


		$this->load->view('admin/transaksi/detail_invoice', $data);		
	}
	//disini


	
}
?>