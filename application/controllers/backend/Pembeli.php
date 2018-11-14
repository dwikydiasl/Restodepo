<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembeli extends CI_Controller 
{
  	function __construct() {
      	parent::__construct();

      	$this->load->model('pembeliadmin_model');

  	}	 
	 
	public function index()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}

		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "pembeli";

		if(!($this->dasarlib->apakahBolehMelakukan('PEMBELI','lihat',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}		

		if($this->dasarlib->apakahBolehMelakukan('PEMBELI','tambah',$iduser))
		{
			$boleh_tambah = TRUE;
		}
		else
		{
			$boleh_tambah = FALSE;
		}

		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
        $data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
        $data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
        $data['footer'] = $this->load->view('admin/footer', NULL, TRUE);

		$data['boleh_tambah'] = $boleh_tambah;

		$this->load->view('admin/pembeli/index', $data);
	}

	
	public function list_pembeli()
	{
		$hasil = $this->pembeliadmin_model->get_list_pembeli();
        echo $hasil;
	}

	public function tambah_pembeli()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}

		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "pembeli";

		if(!($this->dasarlib->apakahBolehMelakukan('PEMBELI','tambah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}		

		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
		$data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
		$data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
		$data['footer'] = $this->load->view('admin/footer', NULL, TRUE);

		$data['list_kota'] = $this->pembeliadmin_model->getListKota();

		$this->load->view('admin/pembeli/tambah', $data);
	}

    public function do_cover()
	{
		$bener = 1;

		$image_info = getimagesize($_FILES["gambar"]["tmp_name"]);
		$image_width = $image_info[0];
		$image_height = $image_info[1];

		$namafile = explode(".", $_FILES['gambar']['name']);
		$fileext = end($namafile);

		$waktu = date("YmdHis");
		$acak = $this->dasarlib->getRandomString(4);

		$nama_file_baru = $waktu."_".$acak.".".$fileext;
		$nama_file_baru_kotak = $waktu."_".$acak."_kotak.".$fileext;
		$nama_file_baru_small = $waktu."_".$acak."_small.".$fileext;

		$config['file_name']  = $nama_file_baru;
		$config['upload_path'] =  './assets/avatar_pembeli/foto/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '0';
		$config['max_width']  = '0';
		$config['max_height']  = '0';



		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('gambar'))
		{
			$bener = 0;
			//redirect(base_url()."uploader/daftar");
		}
		else
		{
			$bener = 1;
			$upload_data = $this->upload->data();
			$this->load->library('image_lib'); 

			// di-resize dulu jadi kotak
			$path = "./assets/avatar_pembeli/foto/".$nama_file_baru;
			$widthimg = $upload_data['image_width'];
			$heightimg = $upload_data['image_height'];

			if($widthimg<$heightimg){
					$width		= $widthimg;
					$height 	= $widthimg;
					
					$fromtop 	= (0.5*$heightimg)-(0.5*$widthimg);
					$fromleft	= 0;
				}else{
					$width 		= $heightimg;
					$height		= $heightimg;
					
					$fromtop 	= 0;
					$fromleft 	= (0.5*$widthimg)-(0.5*$heightimg);
				}
			$config 					= null;
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= $path;
			$config['maintain_ratio'] 	= FALSE;
			$config['quality'] 			= "130%";
			$config['width'] 			= $width;
			$config['height'] 			= $height;
			$config['x_axis'] 			= $fromleft;
			$config['y_axis'] 			= $fromtop;
			$config['new_image'] 		= './assets/avatar_pembeli/foto/'.$nama_file_baru_kotak;
		
			$this->image_lib->initialize($config);
			$this->image_lib->crop();
			$this->image_lib->clear();
			
			
			// resize thumb 160
			$config2['image_library'] = 'gd2';
			$config2['source_image'] = './assets/avatar_pembeli/foto/'.$nama_file_baru_kotak;
			$config2['maintain_ratio'] = TRUE;
			$config2['height']     = 160;
			$config2['new_image']   = './assets/avatar_pembeli/thumbnail/'.$nama_file_baru_small;
			
			$this->image_lib->initialize($config2); 
			$this->image_lib->resize();
			//unlink('./assets/avatar_member/'.$nama_file_baru);
			//$this->load->library('image_lib');
			

		}
		echo "$bener|<img src='".base_url()."assets/avatar_pembeli/thumbnail/$nama_file_baru_small' height='100'>|$nama_file_baru_small|$nama_file_baru";
		exit;		
	}	

	public function do_tambah_pembeli()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('PEMBELI','tambah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$bener = 1;
		$tujuan = base_url()."backend/pembeli";

		$password1 = trim($this->input->post('password1'));
		$password2 = trim($this->input->post('password2'));

		if($password1 <> $password2)
		{
			$bener = 0;
			$pesan =  "Error: Password dan konfirmasi tidak sama";

		}
		if(!($this->dasarlib->isValidPassword($password1)))
		{
			$bener = 0;
			$pesan =  "Error: Illegal Password, panjang password 4-16 char";

		}

		if($bener == 1)
		{
			$waktu = date("YmdHis");
			$acak = $this->dasarlib->getRandomString(6);
			$pembeli_key = $waktu.$acak;

			$kedb['username'] = trim($this->input->post('email'));
			$kedb['password'] = md5($password1);
			$kedb['nama'] = trim($this->input->post('nama'));
			$kedb['status'] = trim($this->input->post('status'));
			$kedb['phone'] = trim($this->input->post('phone'));
			$kedb['avatar'] = trim($this->input->post('daftarfilelogo_thumb'));
			$kedb['pembeli_key'] = $pembeli_key;
			$kedb['id_kota'] = trim($this->input->post('kota'));

			$namatabel = "pembeli";

			if($this->dasar_model->cekDataOnTable($namatabel,'username', $kedb['username']))
			{
				$bener = 0;
				$pesan =  "Error: email Sudah Terpakai";		
			}
			else
			{
				$bener = $this->dasar_model->insertData($namatabel,$kedb);
				if($bener == 1)
				{
					$pesan =  "Simpan Data Sukses";

					//begin masukkan ke audit trail
					$keterangan_trail = "Tambah pembeli: ".$kedb['nama'];
					$this->dasar_model->insertTrail($iduser, $username_user, $keterangan_trail);
					//end masukkan ke audit trail
				}
				else
				{
					$pesan =  "Simpan Data Gagal";
				}
			}
		}
		
		echo "$bener|$tujuan|$pesan";
	}


	public function edit_pembeli()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "penjual";

		if(!($this->dasarlib->apakahBolehMelakukan('PEMBELI','ubah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}		

		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
		$data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
		$data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
		$data['footer'] = $this->load->view('admin/footer', NULL, TRUE);

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
				$data['id'] = $this->input->get('id');
			}  
		}
		
		$namatabel = "pembeli";
		$namafield = "id_pembeli";
		$data['detail'] = $this->dasar_model->getDetailOnField($namatabel, $namafield, $data['id']);
		$data['list_kota'] = $this->pembeliadmin_model->getListKota();

		$this->load->view('admin/pembeli/edit', $data);
	}
	
	public function do_edit_pembeli()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('PENJUAL','ubah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$bener = 1;
		$tujuan = base_url()."backend/pembeli";

		$password1 = trim($this->input->post('password1'));
		$password2 = trim($this->input->post('password2'));

		$kedb['username'] = trim($this->input->post('email'));
		$kedb['nama'] = trim($this->input->post('nama'));
		$kedb['status'] = trim($this->input->post('status'));
		$kedb['phone'] = trim($this->input->post('phone'));
		$kedb['id_kota'] = trim($this->input->post('kota'));
		$kedb['avatar'] = trim($this->input->post('daftarfilelogo_thumb'));

		$id = $this->input->post('id');
		$namatabel = "pembeli";

		// cek apakah ada email yg sama
		if($this->dasar_model->cekDataOnTableForEdit($namatabel,'username', $kedb['username'], 'id_pembeli', $id))
		{
			$bener = 0;
			$pesan =  "Error: username Sudah Terpakai";		
		}
		else
		{
			if($password1 == "")
			{}
			else
			{
				if($password1 <> $password2)
				{
					$bener = 0;
					$pesan =  "Error: Password dan konfirmasi tidak sama";

				}
				if(!($this->dasarlib->isValidPassword($password1)))
				{
					$bener = 0;
					$pesan =  "Error: Illegal Password, panjang password 4-16 char";
				}
				if($bener == 1)
				{
					$kedb['password'] = md5($password1);
				}
			}

			if($bener == 1)
			{

				$bener = $this->dasar_model->updateData($namatabel,$kedb,'id_pembeli',$id);
				if($bener == 1)
				{
					$pesan =  "Simpan Data Sukses";

					//begin masukkan ke audit trail
					$keterangan_trail = "Edit pembeli: ".$kedb['nama'];
					$this->dasar_model->insertTrail($iduser, $username_user, $keterangan_trail);
					//end masukkan ke audit trail
				}
				else
				{
					$pesan =  "Simpan Data Gagal";
				}
			}
		}
		echo "$bener|$tujuan|$pesan";
	}
	

	public function delete_pembeli()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('PEMBELI','hapus',$iduser)))
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
		
		
		$bener = 1;
		
		$namatabel = "pembeli";
		$namafield = "id_pembeli";

		$param['status'] = 3;
		
		$detail = $this->dasar_model->getDetailOnField($namatabel, $namafield, $id);

		//$bener = $this->dasar_model->hapusData($namatabel,$namafield,$id);
		$bener = $this->dasar_model->updateData($namatabel,$param,$namafield,$id);
		if($bener == 1)
		{
			$pesan =  "Hapus Data Sukses";

			//begin masukkan ke audit trail
			$keterangan_trail = "Menghapus pembeli: ".$detail['nama'];
			$this->dasar_model->insertTrail($iduser, $username_user, $keterangan_trail);
			//end masukkan ke audit trail
		}
		else
		{
			$pesan =  "Hapus Data Gagal";
		}
		echo "$bener|$pesan";		
	}


	
}
?>