<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjual extends CI_Controller 
{
  	function __construct() {
      	parent::__construct();

      	$this->load->model('penjualadmin_model');

  	}	 
	 
	public function index()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}

		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "penjual";

		if(!($this->dasarlib->apakahBolehMelakukan('PENJUAL','lihat',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}		

		if($this->dasarlib->apakahBolehMelakukan('PENJUAL','tambah',$iduser))
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

		$this->load->view('admin/penjual/index', $data);
	}

	
	public function list_penjual()
	{
		$hasil = $this->penjualadmin_model->get_list_penjual();
        echo $hasil;
	}

	public function do_dokumen_toko()
	{
		$bener = 1;

		$image_info = getimagesize($_FILES["gambar2"]["tmp_name"]);
		$image_width = $image_info[0];
		$image_height = $image_info[1];

		$namafile = explode(".", $_FILES['gambar2']['name']);
		$fileext = end($namafile);

		$waktu = date("YmdHis");
		$acak = $this->dasarlib->getRandomString(4);

		$nama_file_baru = $waktu."_".$acak.".".$fileext;

		$config['file_name']  = $nama_file_baru;
		$config['upload_path'] =  './assets/dokumen_owner/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '0';
		$config['max_width']  = '0';
		$config['max_height']  = '0';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('gambar2'))
		{
			$bener = 0;
			//redirect(base_url()."uploader/daftar");
		}
		else
		{
			$bener = 1;
			$upload_data = $this->upload->data();
			$this->load->library('image_lib'); 

		}
		echo "$bener|<img src='".base_url()."assets/dokumen_owner/$nama_file_baru' height='200'>|$nama_file_baru|$nama_file_baru";
		exit;		
	}	

	public function do_cover_toko()
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
		$config['upload_path'] =  './assets/gambar_toko/foto/';
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
			$path = "./assets/gambar_toko/foto/".$nama_file_baru;
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
			$config['new_image'] 		= './assets/gambar_toko/foto/'.$nama_file_baru_kotak;
		
			$this->image_lib->initialize($config);
			$this->image_lib->crop();
			$this->image_lib->clear();
			
			
			// resize thumb 160
			$config2['image_library'] = 'gd2';
			$config2['source_image'] = './assets/gambar_toko/foto/'.$nama_file_baru_kotak;
			$config2['maintain_ratio'] = TRUE;
			$config2['height']     = 160;
			$config2['new_image']   = './assets/gambar_toko/thumbnail/'.$nama_file_baru_small;
			
			$this->image_lib->initialize($config2); 
			$this->image_lib->resize();
			//unlink('./assets/avatar_member/'.$nama_file_baru);
			//$this->load->library('image_lib');
			

		}
		echo "$bener|<img src='".base_url()."assets/gambar_toko/thumbnail/$nama_file_baru_small' height='100'>|$nama_file_baru_small|$nama_file_baru";
		exit;		
	}	

    public function getPlaceCoordinate() {
        $this->load->config("setting");
        $address = $this->input->post("address");
        $kota = $this->input->post("kota");

        if ($kota != "") {
			$dekab = $this->dasar_model->getDetailOnField('master_wilayah', 'id', $kota);
			$namakab = $dekab['namakab'];
			
            $initial = str_replace(" ", "+", $address . ",+" . $namakab);
        } else {
            $initial = str_replace(" ", "+", $address);
        }

        $APIKEY = $this->config->item("API_google_key");

        $json = file_get_contents("https://maps.google.com/maps/api/geocode/json?address=$initial&sensor=false&components=country:ID&key=" . $APIKEY);
        $json = json_decode($json);
		
		//var_dump($json);

        $latitude = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
        $longitude = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};

        $result = array(
            "longitude" => $longitude,
            "latitude" => $latitude
        );

        print json_encode($result);
    }
	public function tambah_penjual()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "penjual";

		if(!($this->dasarlib->apakahBolehMelakukan('PENJUAL','tambah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}		

		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
		$data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
		$data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
		$data['footer'] = $this->load->view('admin/footer', NULL, TRUE);

		$data['list_kota'] = $this->penjualadmin_model->getListKota();

		$this->load->view('admin/penjual/tambah', $data);
	}

	public function do_tambah_penjual()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('PENJUAL','tambah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$bener = 1;
		$tujuan = base_url()."backend/penjual";

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
			$penjual_key = $waktu.$acak;

			$kedb['username'] = trim($this->input->post('email'));
			$kedb['password'] = md5($password1);
			$kedb['nama'] = trim($this->input->post('nama'));
			$kedb['nama_toko'] = trim($this->input->post('nama_toko'));
			$kedb['alamat'] = trim($this->input->post('alamat'));
			$kedb['id_kota'] = trim($this->input->post('kota'));
			$kedb['telepon'] = trim($this->input->post('phone'));
			$kedb['penjual_key '] = $penjual_key;
			$kedb['is_active'] = 1;
			$kedb['status'] = trim($this->input->post('status'));
			$kedb['permalink '] = $this->dasarlib->buatPermalink($kedb['nama_toko']);
			$kedb['the_lat'] = trim($this->input->post('the_lat'));
			$kedb['the_long'] = trim($this->input->post('the_long'));
			$kedb['deskripsi_toko'] = trim($this->input->post('deskripsi'));
			$kedb['thumbnail_logo '] = trim($this->input->post('daftarfilelogo_thumb'));
			$kedb['file_npwp_or_siup'] = trim($this->input->post('daftarfilelogo_thumb2'));

			$namatabel = "penjual";

			if($this->dasar_model->cekDataOnTable($namatabel,'username', $kedb['username']))
			{
				$bener = 0;
				$pesan =  "Error: email Sudah Terpakai";		
			}
			else
			{
				if($this->dasar_model->cekDataOnTable($namatabel,'nama_toko', $kedb['nama_toko']))
				{	
					$bener = 0;
					$pesan =  "Error: nama toko Sudah Terpakai";
				}
				else
				{
					$bener = $this->dasar_model->insertData($namatabel,$kedb);
					if($bener == 1)
					{
						$pesan =  "Simpan Data Sukses";

						//begin masukkan ke audit trail
						$keterangan_trail = "Tambah penjual: ".$kedb['nama']." - ".$kedb['nama_toko'];
						$this->dasar_model->insertTrail($iduser, $username_user, $keterangan_trail);
						//end masukkan ke audit trail
					}
					else
					{
						$bener = 0;
						$pesan =  "Simpan Data Gagal";
					}		
				}

			}
		}
		
		echo "$bener|$tujuan|$pesan";
	}


	public function edit_penjual()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "penjual";

		if(!($this->dasarlib->apakahBolehMelakukan('PENJUAL','ubah',$iduser)))
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
		
		$namatabel = "penjual";
		$namafield = "id_penjual";
		$data['list_kota'] = $this->penjualadmin_model->getListKota();
		$data['detail'] = $this->dasar_model->getDetailOnField($namatabel, $namafield, $data['id']);

		$this->load->view('admin/penjual/edit', $data);
	}
	
	public function do_edit_penjual()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('PENJUAL','ubah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$bener = 1;
		$tujuan = base_url()."backend/penjual";

		$password1 = trim($this->input->post('password1'));
		$password2 = trim($this->input->post('password2'));
		
		$username = trim($this->input->post('email'));
		
		$kedb['nama'] = trim($this->input->post('nama'));
		$kedb['nama_toko'] = trim($this->input->post('nama_toko'));
		$kedb['alamat'] = trim($this->input->post('alamat'));
		$kedb['id_kota'] = trim($this->input->post('kota'));
		$kedb['telepon'] = trim($this->input->post('phone'));
		$kedb['status'] = trim($this->input->post('status'));
		$kedb['permalink '] = $this->dasarlib->buatPermalink($kedb['nama_toko']);
		$kedb['the_lat'] = trim($this->input->post('the_lat'));
		$kedb['the_long'] = trim($this->input->post('the_long'));
		$kedb['deskripsi_toko'] = trim($this->input->post('deskripsi'));
		$kedb['thumbnail_logo '] = trim($this->input->post('daftarfilelogo_thumb'));
		$kedb['file_npwp_or_siup'] = trim($this->input->post('daftarfilelogo_thumb2'));

		$id = $this->input->post('id');
		$namatabel = "penjual";

		// cek apakah ada email yg sama
		if($this->dasar_model->cekDataOnTableForEdit($namatabel,'username', $username, 'id_penjual', $id))
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

				$bener = $this->dasar_model->updateData($namatabel,$kedb,'id_penjual',$id);
				if($bener == 1)
				{
					$pesan =  "Simpan Data Sukses";

					//begin masukkan ke audit trail
					$keterangan_trail = "Edit penjual: ".$kedb['nama']." - ".$kedb['nama_toko'];
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
	

	public function delete_penjual()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('PENJUAL','hapus',$iduser)))
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
		
		$namatabel = "penjual";
		$namafield = "id_penjual";

		$param['status'] = 4;
		
		$detail = $this->dasar_model->getDetailOnField($namatabel, $namafield, $id);

		//$bener = $this->dasar_model->hapusData($namatabel,$namafield,$id);
		$bener = $this->dasar_model->updateData($namatabel,$param,$namafield,$id);
		if($bener == 1)
		{
			$pesan =  "Hapus Data Sukses";

			//begin masukkan ke audit trail
			$keterangan_trail = "Menghapus penjual: ".$detail['nama'];
			$this->dasar_model->insertTrail($iduser, $username_user, $keterangan_trail);
			//end masukkan ke audit trail
		}
		else
		{
			$pesan =  "Hapus Data Gagal";
		}
		echo "$bener|$pesan";		
	}

	public function view_penjual()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "penjual";

		if(!($this->dasarlib->apakahBolehMelakukan('PENJUAL','ubah',$iduser)))
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
		
		$namatabel = "penjual";
		$namafield = "id_penjual";
		$data['detail'] = $this->dasar_model->getDetailOnField($namatabel, $namafield, $data['id']);

		$id_kota = $data['detail']['id_kota'];
		$data['dekota'] = $this->dasar_model->getDetailOnField('master_wilayah', 'id', $id_kota);
		$data['res'] = $this->penjualadmin_model->getItemOnPenjual($data['id']);

		$this->load->view('admin/penjual/detail', $data);
	}	


	
}
?>