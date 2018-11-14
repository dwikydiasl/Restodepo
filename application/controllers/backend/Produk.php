<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller 
{
  	public $array_kategori = array();


  	function __construct() {
      	parent::__construct();

      	$this->load->model('produkadmin_model');

  	}	 

  	//KATEGORI
	 
	public function kategori_produk()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "produk";

		if(!($this->dasarlib->apakahBolehMelakukan('PRODUK','lihat',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}		

		if($this->dasarlib->apakahBolehMelakukan('PRODUK','tambah',$iduser))
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

        $data['list_kategori'] = $this->buat_kategori();

		$data['boleh_tambah'] = $boleh_tambah;

		$this->load->view('admin/produk/index_kategori', $data);
	}

	public function buat_kategori()
	{
		$texarid = '';

		$q = $this->db->query("SELECT idkategori, nama FROM kategori_produk where id_parent = 0 and ishapus=0 order by nama");
		$res = $q->result_array();
		foreach($res as $row)
		{
			$idkategori = $row['idkategori'];
			$nama = $row['nama'];
			$texarid = $idkategori."|";
			$this->array_kategori[] = array("idkategori" => $idkategori, "nama" => '<strong>'.$nama.'</strong>');
			$this->buat_subkategori($idkategori,$texarid,$nama);
		}
		return $this->array_kategori;
	}

	public function buat_subkategori($parentid,$texarid, $texparen)
	{				
		$texarid = substr($texarid, 0, -1);
		$arx = explode("|",$texarid);

		$q = $this->db->query("SELECT idkategori, nama, id_parent FROM kategori_produk where id_parent = $parentid and ishapus=0 order by nama");
		if($res2 = $q->result_array())
		{
			foreach($res2 as $row2)
			{
			    
			    if(in_array($row2['idkategori'], $arx))
			    {
			    }
				else
				{				    
				    $this->array_kategori[] = array("idkategori" => $row2['idkategori'], "nama" => $texparen.' -> '.$row2['nama']);
				    $parenbaru = $texparen.' -> '.$row2['nama'];
				    $arx[]= $row2['idkategori'];		
				    $texarid2 = implode('|',$arx);	        
				    $this->buat_subkategori($row2['idkategori'],$texarid2,$parenbaru);
				}

			}	
		}
		
	}

	public function tambah_kategori()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "produk";

		if(!($this->dasarlib->apakahBolehMelakukan('PRODUK','tambah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}		

		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
		$data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
		$data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
		$data['footer'] = $this->load->view('admin/footer', NULL, TRUE);

		$data['list_kategori'] = $this->buat_kategori();

		$this->load->view('admin/produk/tambah_kategori', $data);
	}

	public function do_tambah_kategori()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('PRODUK','tambah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$bener = 1;
		$tujuan = base_url()."backend/produk/kategori_produk";

		$kedb['nama'] = trim($this->input->post('nama'));
		$kedb['permalink '] = $this->dasarlib->buatPermalink($kedb['nama']);
		$kedb['id_parent'] = trim($this->input->post('id_parent'));

		$namatabel = "kategori_produk";

		if($this->dasar_model->cekDataOnTable($namatabel,'nama', $kedb['nama']))
		{
			$bener = 0;
			$pesan =  "Error: Nama Kategori Sudah Ada";		
		}
		else
		{
			$bener = $this->dasar_model->insertData($namatabel,$kedb);
			if($bener == 1)
			{
				$pesan =  "Simpan Data Sukses";

				//begin masukkan ke audit trail
				$keterangan_trail = "Tambah kategori produk: ".$kedb['nama'];
				$this->dasar_model->insertTrail($iduser, $username_user, $keterangan_trail);
				//end masukkan ke audit trail
			}
			else
			{
				$bener = 0;
				$pesan =  "Simpan Data Gagal";
			}		
		}
		echo "$bener|$tujuan|$pesan";
	}	


	public function edit_kategori()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "produk";

		if(!($this->dasarlib->apakahBolehMelakukan('PRODUK','ubah',$iduser)))
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
				$data['id'] = $this->input->get('id');
			}  
		}
		
		$namatabel = "kategori_produk";
		$namafield = "idkategori";

		$data['detail'] = $this->dasar_model->getDetailOnField($namatabel, $namafield, $data['id']);

		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
		$data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
		$data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
		$data['footer'] = $this->load->view('admin/footer', NULL, TRUE);

		$data['list_kategori'] = $this->buat_kategori();

		$this->load->view('admin/produk/edit_kategori', $data);
	}

	public function do_edit_kategori()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('PRODUK','ubah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$bener = 1;
		$tujuan = base_url()."backend/produk/kategori_produk";

		$id = $this->input->post('id');

		$kedb['nama'] = trim($this->input->post('nama'));
		$kedb['permalink '] = $this->dasarlib->buatPermalink($kedb['nama']);
		$kedb['id_parent'] = trim($this->input->post('id_parent'));

		$namatabel = "kategori_produk";
		// cek apakah ada email yg sama
		if($this->dasar_model->cekDataOnTableForEdit($namatabel,'nama', $kedb['nama'], 'idkategori', $id))
		{
			$bener = 0;
			$pesan =  "Error: nama kategori Sudah ada";		
		}
		else
		{
			$bener = $this->dasar_model->updateData($namatabel,$kedb,'idkategori',$id);
			if($bener == 1)
			{
				$pesan =  "Simpan Data Sukses";

				//begin masukkan ke audit trail
				$keterangan_trail = "Edit kategori produk: ".$kedb['nama'];
				$this->dasar_model->insertTrail($iduser, $username_user, $keterangan_trail);
				//end masukkan ke audit trail
			}
			else
			{
				$pesan =  "Simpan Data Gagal";
			}

		}
		echo "$bener|$tujuan|$pesan";		
	}

	
	public function delete_kategori()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('PRODUK','hapus',$iduser)))
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
		
		$namatabel = "kategori_produk";
		$namafield = "idkategori";

		$param['ishapus'] = 1;
		
		$detail = $this->dasar_model->getDetailOnField($namatabel, $namafield, $id);

		//$bener = $this->dasar_model->hapusData($namatabel,$namafield,$id);
		$bener = $this->dasar_model->updateData($namatabel,$param,$namafield,$id);
		if($bener == 1)
		{
			$pesan =  "Hapus Data Sukses";

			//begin masukkan ke audit trail
			$keterangan_trail = "Menghapus kategori produk: ".$detail['nama'];
			$this->dasar_model->insertTrail($iduser, $username_user, $keterangan_trail);
			//end masukkan ke audit trail
		}
		else
		{
			$pesan =  "Hapus Data Gagal";
		}
		echo "$bener|$pesan";		
	}

	// TAG PRODUK

	public function tag_produk()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "produk";

		if(!($this->dasarlib->apakahBolehMelakukan('PRODUK','lihat',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}		

		if($this->dasarlib->apakahBolehMelakukan('PRODUK','tambah',$iduser))
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

		$this->load->view('admin/produk/index_tag_produk', $data);
	}

	public function list_tag_produk()
	{
		$hasil = $this->produkadmin_model->get_list_tag_produk();
        echo $hasil;
	}	

	public function tambah_tag_produk()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "produk";

		if(!($this->dasarlib->apakahBolehMelakukan('PRODUK','tambah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}		

		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
		$data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
		$data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
		$data['footer'] = $this->load->view('admin/footer', NULL, TRUE);


		$this->load->view('admin/produk/tambah_tag_produk', $data);
	}

	public function do_tambah_tag_produk()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('PRODUK','tambah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$bener = 1;
		$tujuan = base_url()."backend/produk/tag_produk";

		$kedb['nama'] = trim($this->input->post('nama'));
		$kedb['permalink '] = $this->dasarlib->buatPermalink($kedb['nama']);

		$namatabel = "tag_produk";

		if($this->dasar_model->cekDataOnTable($namatabel,'nama', $kedb['nama']))
		{
			$bener = 0;
			$pesan =  "Error: Nama Tag Sudah Ada";		
		}
		else
		{
			$bener = $this->dasar_model->insertData($namatabel,$kedb);
			if($bener == 1)
			{
				$pesan =  "Simpan Data Sukses";

				//begin masukkan ke audit trail
				$keterangan_trail = "Tambah tag produk: ".$kedb['nama'];
				$this->dasar_model->insertTrail($iduser, $username_user, $keterangan_trail);
				//end masukkan ke audit trail
			}
			else
			{
				$bener = 0;
				$pesan =  "Simpan Data Gagal";
			}		
		}
		echo "$bener|$tujuan|$pesan";
	}	

	public function edit_tag_produk()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "penjual";

		if(!($this->dasarlib->apakahBolehMelakukan('PRODUK','ubah',$iduser)))
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
		
		$namatabel = "tag_produk";
		$namafield = "id";
		$data['detail'] = $this->dasar_model->getDetailOnField($namatabel, $namafield, $data['id']);
		$this->load->view('admin/produk/edit_tag_produk', $data);
	}	

	public function do_edit_tag_produk()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('PRODUK','ubah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$bener = 1;
		$tujuan = base_url()."backend/produk/tag_produk";

		$id = $this->input->post('id');

		$kedb['nama'] = trim($this->input->post('nama'));
		$kedb['permalink '] = $this->dasarlib->buatPermalink($kedb['nama']);


		$namatabel = "tag_produk";

		if($this->dasar_model->cekDataOnTableForEdit($namatabel,'nama', $kedb['nama'], 'id', $id))
		{
			$bener = 0;
			$pesan =  "Error: Nama Tag Sudah Ada";		
		}
		else
		{
			$bener = $this->dasar_model->updateData($namatabel,$kedb,'id',$id);
			if($bener == 1)
			{
				$pesan =  "Simpan Data Sukses";

				//begin masukkan ke audit trail
				$keterangan_trail = "Edit tag produk: ".$kedb['nama'];
				$this->dasar_model->insertTrail($iduser, $username_user, $keterangan_trail);
				//end masukkan ke audit trail
			}
			else
			{
				$bener = 0;
				$pesan =  "Simpan Data Gagal";
			}		
		}
		echo "$bener|$tujuan|$pesan";
	}		

	public function delete_tag_produk()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('PRODUK','hapus',$iduser)))
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
		
		$namatabel = "tag_produk";
		$namafield = "id";

		$param['ishapus'] = 1;
		
		$detail = $this->dasar_model->getDetailOnField($namatabel, $namafield, $id);

		//$bener = $this->dasar_model->hapusData($namatabel,$namafield,$id);
		$bener = $this->dasar_model->updateData($namatabel,$param,$namafield,$id);
		if($bener == 1)
		{
			$pesan =  "Hapus Data Sukses";

			//begin masukkan ke audit trail
			$keterangan_trail = "Menghapus tag produk: ".$detail['nama'];
			$this->dasar_model->insertTrail($iduser, $username_user, $keterangan_trail);
			//end masukkan ke audit trail
		}
		else
		{
			$pesan =  "Hapus Data Gagal";
		}
		echo "$bener|$pesan";		
	}


	// ITEM PRODUK
	public function item_produk()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "produk";

		if(!($this->dasarlib->apakahBolehMelakukan('PRODUK','lihat',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}		

		if($this->dasarlib->apakahBolehMelakukan('PRODUK','tambah',$iduser))
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

		$this->load->view('admin/produk/index_item_produk', $data);
	}

	public function list_item_produk()
	{
		$hasil = $this->produkadmin_model->get_list_item_produk();
        echo $hasil;
	}		

	public function tambah_item_produk()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "produk";

		if(!($this->dasarlib->apakahBolehMelakukan('PRODUK','tambah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}		

		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
		$data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
		$data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
		$data['footer'] = $this->load->view('admin/footer', NULL, TRUE);

		$data['list_kategori'] = $this->buat_kategori();
		$data['list_penjual'] = $this->produkadmin_model->get_list_penjual();

		$data['list_tag'] = $this->dasar_model->getDataOnTable("tag_produk", "*", "ishapus=0", "nama");

		$this->load->view('admin/produk/tambah_item_produk', $data);
	}

	public function do_foto_item()
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
		$nama_file_baru_kotak = $waktu."_".$acak."_kotak.".$fileext;
		$nama_file_baru_small = $waktu."_".$acak."_small.".$fileext;

		$config['file_name']  = $nama_file_baru;
		$config['upload_path'] =  './assets/gambar_item/foto/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '0';
		$config['max_width']  = '';
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

			// di-resize dulu jadi kotak
			$path = "./assets/gambar_item/foto/".$nama_file_baru;
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
			$config['new_image'] 		= './assets/gambar_item/foto/'.$nama_file_baru_kotak;
		
			$this->image_lib->initialize($config);
			$this->image_lib->crop();
			$this->image_lib->clear();		
			
			// resize thumb 160
			$config2['image_library'] = 'gd2';
			$config2['source_image'] = './assets/gambar_item/foto/'.$nama_file_baru_kotak;
			$config2['maintain_ratio'] = TRUE;
			$config2['height']     = 160;
			$config2['new_image']   = './assets/gambar_item/thumbnail/'.$nama_file_baru_small;
			
			$this->image_lib->initialize($config2); 
			$this->image_lib->resize();
			

			//unlink('./assets/avatar_member/'.$nama_file_baru);
			//$this->load->library('image_lib');

		}
		echo "$bener|<span style='display: inline-block;'><img src='".base_url()."assets/gambar_item/thumbnail/$nama_file_baru_small' height='100'> <br> <a href='javascript:void(0)' onclick=hapusgambar('$nama_file_baru')>Delete <i class='fa fa-times'></i></a> </span>|$nama_file_baru_small|$nama_file_baru";
		exit;		
	}

	public function do_foto_editor()
	{

		if(empty($_FILES['file']))
		{
		    echo base_url()."assets/gambar_editor/noimage.png";
		}
		
		$temp = explode(".", $_FILES["file"]["name"]);
		$waktu = round(microtime(true));
		$newfilename =  $waktu .'.' . end($temp);
		$newfilename_small = $waktu.'_small.' . end($temp);

		$destinationFilePath = './assets/gambar_editor/'.$newfilename ;

		if(!move_uploaded_file($_FILES['file']['tmp_name'], $destinationFilePath)){
		    echo base_url()."assets/gambar_editor/noimage.png";
		}
		else
		{
		    $this->load->library('image_lib'); 

		    $image_info = getimagesize('./assets/gambar_editor/'.$newfilename);
        	$image_width = $image_info[0];
        	$image_height = $image_info[1];

        	if($image_width > 400)
        	{
				$config2['image_library'] = 'gd2';
				$config2['source_image'] = './assets/gambar_editor/'.$newfilename;
				$config2['maintain_ratio'] = TRUE;
				$config2['width']     = 400;
				$config2['new_image']   = './assets/gambar_editor/'.$newfilename_small;
				
				$this->image_lib->initialize($config2); 
				$this->image_lib->resize();

			    echo base_url()."assets/gambar_editor/".$newfilename_small;
			}
			else
			{
				echo base_url()."assets/gambar_editor/".$newfilename;
			}
		}

	}




	public function do_tambah_item_produk()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('PRODUK','tambah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$bener = 1;
		$tujuan = base_url()."backend/produk/item_produk";

		$kedb['idkategori'] = trim($this->input->post('idkategori'));
		$kedb['id_penjual'] = trim($this->input->post('id_penjual'));
		$kedb['kode'] = trim($this->input->post('kode'));
		$kedb['nama'] = trim($this->input->post('nama'));
		$kedb['deskripsi_singkat'] = trim($this->input->post('deskripsi_singkat'));
		$kedb['deskripsi_full'] = trim($this->input->post('deskripsi_full'));
		$kedb['harga'] = trim($this->input->post('harga'));
		$kedb['status_tampil'] = trim($this->input->post('status_tampil'));
		$kedb['ishapus'] = 0;

		$depenjual = $this->dasar_model->getDetailOnField('penjual', 'id_penjual', $kedb['id_penjual']);
		$permalink_penjual = $depenjual['permalink'];
		$kedb['permalink'] = $this->dasarlib->buatPermalink($kedb['nama']).'--'.$permalink_penjual;

		$daftarfilelogo2 = trim($this->input->post('daftarfilelogo2'));
		$daftarfilelogo_thumb2 = trim($this->input->post('daftarfilelogo_thumb2'));

		$namatabel = "item_produk";

		//cek apakah penjual sudah punya produk ini
		if($this->produkadmin_model->apakahAdaItemProduk($kedb['id_penjual'],$kedb['nama']))
		{
			$bener = 0;
			$pesan =  "Error: Nama Item Sudah Ada di penjual ini";		
		}
		else
		{
			// cek apakah ada gambar produk
			if($daftarfilelogo2 == '')
			{
				$bener = 0;
				$pesan =  "Error: Gambar produk setidaknya ada 1";
			}
			else
			{
				//masukkan item produk
				$bener = $this->dasar_model->insertData($namatabel,$kedb);
				if($bener == 1)
				{
					$pesan =  "Simpan Data Sukses";

					// ambil id_item dari produk yg dimasukkan barusan
					$deproduk = $this->dasar_model->getDetailOnField('item_produk', 'permalink', $kedb['permalink']);
					$id_item = $deproduk['id_item'];

					// masukkan matrix kategori
					$arkategori = $this->produkadmin_model->get_id_kategori_produk($kedb['idkategori']);
					foreach($arkategori as &$value)
					{
						$ke_kategori['id_item'] = $id_item;
						$ke_kategori['id_kategori'] = $value;
						$this->dasar_model->insertData('matrix_kategori_produk',$ke_kategori);
					}

					// masukkan matrix tag
					$list_tag = $this->dasar_model->getDataOnTable("tag_produk", "*", "ishapus=0", "nama");
					foreach($list_tag as $row9)
					{
						$id_tag = $row9['id'];
						$namacek = $id_tag."_yes";
						if($this->dasarlib->IsChecked('cekdata',$namacek))
						{
							$isicek = 1;
						}
						else
						{
							$isicek = 0;
						}
						$ke_tag['id_item'] = $id_item;
						$ke_tag['id_tag'] = $id_tag;
						$ke_tag['nilai'] = $isicek;
						$this->dasar_model->insertData('matrix_tag_produk',$ke_tag);

					}

					// masukkan gambar produk
					$daftarnya = rtrim($daftarfilelogo2, "|");
					$arrmenu2 = explode('|',$daftarnya);
					
					$daftarnya60 = rtrim($daftarfilelogo_thumb2, "|");
					$arrmenu260 = explode('|',$daftarnya60);
					
					$jml2 = count($arrmenu2);
					for($xx = 0; $xx < $jml2; $xx++) 
					{
						$namafilegambar = $arrmenu2[$xx];
						$namafilegambar60 = $arrmenu260[$xx];
						
						$kefoto['id_item'] = $id_item;
						$kefoto['id_penjual'] = $kedb['id_penjual'];
						$kefoto['file_foto'] = $namafilegambar;
						$kefoto['ishapus'] = 0;
						$kefoto['thumbnail'] = $namafilegambar60;

						$image_info = getimagesize(base_url()."assets/gambar_item/foto/".$namafilegambar);
						$image_width = $image_info[0];
						$image_height = $image_info[1];

						$kefoto['img_width'] = $image_width;
						$kefoto['img_height'] = $image_height;

						$this->dasar_model->insertData('item_produk_foto',$kefoto);
					}



					//begin masukkan ke audit trail
					$keterangan_trail = "Tambah item produk: ".$kedb['nama'];
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
		echo "$bener|$tujuan|$pesan";
	}		

	public function edit_item_produk()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "produk";

		if(!($this->dasarlib->apakahBolehMelakukan('PRODUK','ubah',$iduser)))
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
				$data['id'] = $this->input->get('id');
			}  
		}
		
		$namatabel = "item_produk";
		$namafield = "id_item";

		$data['detail'] = $this->dasar_model->getDetailOnField($namatabel, $namafield, $data['id']);

		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
		$data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
		$data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
		$data['footer'] = $this->load->view('admin/footer', NULL, TRUE);

		$data['list_kategori'] = $this->buat_kategori();
		$data['list_penjual'] = $this->produkadmin_model->get_list_penjual();

		$data['list_tag'] = $this->dasar_model->getDataOnTable("tag_produk", "*", "ishapus=0", "nama");

		$data['texdaftarfilegambar'] = $this->produkadmin_model->getTextDaftarGambarWarung($data['id']);
		$data['texdaftarfilegambar_thumb'] = $this->produkadmin_model->getTextDaftarGambarWarung_thumb($data['id']);
		$data['texdaftargambarwarung'] =  $this->produkadmin_model->getGambarWarungHtml($data['id']);


		$this->load->view('admin/produk/edit_item_produk', $data);
	}	

	public function do_edit_item_produk()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('PRODUK','ubah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$bener = 1;
		$tujuan = base_url()."backend/produk/item_produk";

		$id_item = $this->input->post('id');
		$detail_lama = $this->dasar_model->getDetailOnField('item_produk', 'id_item', $id_item);
		$kategori_lama = $detail_lama['idkategori'];

		$kedb['idkategori'] = trim($this->input->post('idkategori'));
		$kedb['id_penjual'] = trim($this->input->post('id_penjual'));
		$kedb['kode'] = trim($this->input->post('kode'));
		$kedb['nama'] = trim($this->input->post('nama'));
		$kedb['deskripsi_singkat'] = trim($this->input->post('deskripsi_singkat'));
		$kedb['deskripsi_full'] = trim($this->input->post('deskripsi_full'));
		$kedb['harga'] = trim($this->input->post('harga'));
		$kedb['status_tampil'] = trim($this->input->post('status_tampil'));

		$depenjual = $this->dasar_model->getDetailOnField('penjual', 'id_penjual', $kedb['id_penjual']);
		$permalink_penjual = $depenjual['permalink'];
		$kedb['permalink'] = $this->dasarlib->buatPermalink($kedb['nama']).'--'.$permalink_penjual;

		$daftarfilelogo2 = trim($this->input->post('daftarfilelogo2'));
		$daftarfilelogo_thumb2 = trim($this->input->post('daftarfilelogo_thumb2'));

		$namatabel = "item_produk";

		//cek apakah penjual sudah punya produk ini
		if($this->produkadmin_model->apakahAdaItemProdukEdit($kedb['id_penjual'],$kedb['nama'],$id_item))
		{
			$bener = 0;
			$pesan =  "Error: Nama Item Sudah Ada di penjual ini";		
		}
		else
		{
			// cek apakah ada gambar produk
			if($daftarfilelogo2 == '')
			{
				$bener = 0;
				$pesan =  "Error: Gambar produk setidaknya ada 1";
			}
			else
			{
				//masukkan item produk
				$bener = $this->dasar_model->updateData($namatabel,$kedb,'id_item',$id_item);
				if($bener == 1)
				{
					$pesan =  "Simpan Data Sukses";

					// bandingkan kategori baru dengan lama, kalo sama ga melakukan apa2, tapi kalo beda, maka hapus matrix kategorinya dan dibuat baru
					if($kedb['idkategori'] == $kategori_lama)
					{}
					else
					{
						//hapus dulu semua matrix kategori
						$this->produkadmin_model->hapusMatrixKategoriProduk($id_item);

						//masukkan baru
						$arkategori = $this->produkadmin_model->get_id_kategori_produk($kedb['idkategori']);
						foreach($arkategori as &$value)
						{
							$ke_kategori['id_item'] = $id_item;
							$ke_kategori['id_kategori'] = $value;
							$this->dasar_model->insertData('matrix_kategori_produk',$ke_kategori);
						}
					}

					
					//hapus matrix tag item produk
					$this->produkadmin_model->hapusMatrixTagProduk($id_item);

					// masukkan matrix tag
					$list_tag = $this->dasar_model->getDataOnTable("tag_produk", "*", "ishapus=0", "nama");
					foreach($list_tag as $row9)
					{
						$id_tag = $row9['id'];
						$namacek = $id_tag."_yes";
						if($this->dasarlib->IsChecked('cekdata',$namacek))
						{
							$isicek = 1;
						}
						else
						{
							$isicek = 0;
						}
						$ke_tag['id_item'] = $id_item;
						$ke_tag['id_tag'] = $id_tag;
						$ke_tag['nilai'] = $isicek;
						$this->dasar_model->insertData('matrix_tag_produk',$ke_tag);

					}

					//hapus gambar item produk
					$this->produkadmin_model->hapusDaftarGambarItem($id_item);

					// masukkan gambar produk
					$daftarnya = rtrim($daftarfilelogo2, "|");
					$arrmenu2 = explode('|',$daftarnya);
					
					$daftarnya60 = rtrim($daftarfilelogo_thumb2, "|");
					$arrmenu260 = explode('|',$daftarnya60);
					
					$jml2 = count($arrmenu2);
					for($xx = 0; $xx < $jml2; $xx++) 
					{
						$namafilegambar = $arrmenu2[$xx];
						$namafilegambar60 = $arrmenu260[$xx];
						
						$kefoto['id_item'] = $id_item;
						$kefoto['id_penjual'] = $kedb['id_penjual'];
						$kefoto['file_foto'] = $namafilegambar;
						$kefoto['ishapus'] = 0;
						$kefoto['thumbnail'] = $namafilegambar60;

						$image_info = getimagesize(base_url()."assets/gambar_item/foto/".$namafilegambar);
						$image_width = $image_info[0];
						$image_height = $image_info[1];

						$kefoto['img_width'] = $image_width;
						$kefoto['img_height'] = $image_height;

						$this->dasar_model->insertData('item_produk_foto',$kefoto);
					}



					//begin masukkan ke audit trail
					$keterangan_trail = "Edit item produk: ".$kedb['nama'];
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
		echo "$bener|$tujuan|$pesan";		
	}	

	public function delete_item_produk()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('PRODUK','hapus',$iduser)))
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
		
		$namatabel = "item_produk";
		$namafield = "id_item";

		$param['ishapus'] = 1;
		
		$detail = $this->dasar_model->getDetailOnField($namatabel, $namafield, $id);

		//$bener = $this->dasar_model->hapusData($namatabel,$namafield,$id);
		$bener = $this->dasar_model->updateData($namatabel,$param,$namafield,$id);
		if($bener == 1)
		{
			$pesan =  "Hapus Data Sukses";

			//begin masukkan ke audit trail
			$keterangan_trail = "Menghapus item produk: ".$detail['nama'];
			$this->dasar_model->insertTrail($iduser, $username_user, $keterangan_trail);
			//end masukkan ke audit trail
		}
		else
		{
			$pesan =  "Hapus Data Gagal";
		}
		echo "$bener|$pesan";		
	}	

	// disini 







	
	
}
?>