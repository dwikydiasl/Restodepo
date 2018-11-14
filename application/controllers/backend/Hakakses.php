<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hakakses extends CI_Controller 
{
  	function __construct() {
      	parent::__construct();

      	//$this->load->model('login_model');
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('restodepoadmin'));
		}
		$this->load->model('hakakses_model');
		
		//$metod = $this->router->fetch_method();
		//var_dump($metod); exit;

  	}		 
	 
	public function index()
	{}

	
	//=============================================
	// begin AREA TUGAS alias MODUL
	public function areatugas()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "hakakses";
		
		if(!($this->dasarlib->apakahBolehMelakukan('AREA_TUGAS','lihat',$iduser)))
		{
			redirect(base_url('restodepoadmin'));
			exit;
		}		

		if($this->dasarlib->apakahBolehMelakukan('AREA_TUGAS','tambah',$iduser))
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
		
		$this->load->view('admin/hakakses/areatugas',$data);

	}
	
	public function list_area_tugas()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		if(!($this->dasarlib->apakahBolehMelakukan('AREA_TUGAS','lihat',$iduser)))
		{
			redirect(base_url('restodepoadmin'));
			exit;
		}		

		$hasil = $this->hakakses_model->getListAreaTugas();
		echo $hasil;
	}
	
	public function tambah_area_tugas()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		if(!($this->dasarlib->apakahBolehMelakukan('AREA_TUGAS','tambah',$iduser)))
		{
			redirect(base_url('restodepoadmin'));
			exit;
		}

		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "hakakses";
		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
		$data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
		$data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
		$data['footer'] = $this->load->view('admin/footer', NULL, TRUE);
		
		$this->load->view('admin/hakakses/tambah_area_tugas',$data);
	}
	
	public function do_tambah_area_tugas()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		if(!($this->dasarlib->apakahBolehMelakukan('AREA_TUGAS','tambah',$iduser)))
		{
			redirect(base_url('restodepoadmin'));
			exit;
		}
		
		$bener = 1;
		$tujuan = base_url()."backend/hakakses/areatugas";
		
		$kedb['kode'] = trim($this->input->post('kode'));
		$kedb['nama'] = trim($this->input->post('nama'));
		$kedb['keterangan'] = trim($this->input->post('keterangan'));

		$namatabel = "area_tugas";
		
		if($this->dasar_model->cekDataOnTable($namatabel,'kode', $kedb['kode']))
		{
			$bener = 0;
			$pesan =  "Error: kode Sudah Terpakai";		
		}
		else
		{
			$bener = $this->dasar_model->insertData($namatabel,$kedb);
			if($bener == 1)
			{
				$pesan =  "Tambah Data Sukses";
			}
			else
			{
				$pesan =  "Tambah Data Gagal";
			}
		}
		
		echo "$bener|$tujuan|$pesan";
	}
	
	public function edit_area_tugas()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		if(!($this->dasarlib->apakahBolehMelakukan('AREA_TUGAS','ubah',$iduser)))
		{
			redirect(base_url('restodepoadmin'));
			exit;
		}

		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "hakakses";
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
		
		$namatabel = "area_tugas";
		$namafield = "id";
		$data['detail'] = $this->dasar_model->getDetailOnField($namatabel, $namafield, $data['id']);
		
		
		$this->load->view('admin/hakakses/edit_area_tugas',$data);
	}
	
	public function do_edit_area_tugas()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		if(!($this->dasarlib->apakahBolehMelakukan('AREA_TUGAS','ubah',$iduser)))
		{
			redirect(base_url('restodepoadmin'));
			exit;
		}
		
		$bener = 1;
		$tujuan = base_url()."backend/hakakses/areatugas";
		
		$kedb['kode'] = trim($this->input->post('kode'));
		$kedb['nama'] = trim($this->input->post('nama'));
		$kedb['keterangan'] = trim($this->input->post('keterangan'));

		$namatabel = "area_tugas";
		$namafield = "kode";
		$id = trim($this->input->post('id'));
		
		if($this->dasar_model->cekDataOnTableForEdit($namatabel,$namafield, $kedb['kode'], 'id', $id ))
		{
			$bener = 0;
			$pesan =  "Error: kode Sudah Terpakai";		
		}
		else
		{
			$bener = $this->dasar_model->updateData($namatabel,$kedb,'id',$id);
			if($bener == 1)
			{
				$pesan =  "Simpan Data Sukses";
			}
			else
			{
				$pesan =  "Simpan Data Gagal";
			}
		}
		
		echo "$bener|$tujuan|$pesan";
	}
	
	public function delete_area_tugas()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		if(!($this->dasarlib->apakahBolehMelakukan('AREA_TUGAS','hapus',$iduser)))
		{
			redirect(base_url('restodepoadmin'));
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
		
		$namatabel = "area_tugas";
		$namafield = "id";
		
		//$bener = $this->dasar_model->hapusData($namatabel,$namafield,$id);
		$bener = $this->hakakses_model->hapusAreaTugas($id);
		if($bener == 1)
		{
			$pesan =  "Hapus Data Sukses";
		}
		else
		{
			$pesan =  "Hapus Data Gagal";
		}
		
		
		echo "$bener|$pesan";
	}	
	// end AREA TUGAS alias MODUL
	//=============================================
	
	
	//=============================================
	// begin DEPARTEMEN
	public function departemen()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "hakakses";
		
		if(!($this->dasarlib->apakahBolehMelakukan('DEPARTEMEN','lihat',$iduser)))
		{
			redirect(base_url('restodepoadmin'));
			exit;
		}		

		if($this->dasarlib->apakahBolehMelakukan('DEPARTEMEN','tambah',$iduser))
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
		
		$this->load->view('admin/hakakses/departemen',$data);

	}
	
	public function list_departemen()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		if(!($this->dasarlib->apakahBolehMelakukan('DEPARTEMEN','lihat',$iduser)))
		{
			redirect(base_url('restodepoadmin'));
			exit;
		}		

		$hasil = $this->hakakses_model->getListDepartemen();
		echo $hasil;
	}
	
	public function tambah_departemen()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		if(!($this->dasarlib->apakahBolehMelakukan('DEPARTEMEN','tambah',$iduser)))
		{
			redirect(base_url('restodepoadmin'));
			exit;
		}

		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "hakakses";
		
		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
		$data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
		$data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
		$data['footer'] = $this->load->view('admin/footer', NULL, TRUE);
		
		$this->load->view('admin/hakakses/tambah_departemen',$data);
	}
	
	public function do_tambah_departemen()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		if(!($this->dasarlib->apakahBolehMelakukan('DEPARTEMEN','tambah',$iduser)))
		{
			redirect(base_url('restodepoadmin'));
			exit;
		}
		
		$bener = 1;
		$tujuan = base_url()."backend/hakakses/departemen";
		
		$kedb['nama'] = trim($this->input->post('nama'));

		$namatabel = "departemen";
		
		if($this->dasar_model->cekDataOnTable($namatabel,'nama', $kedb['nama']))
		{
			$bener = 0;
			$pesan =  "Error: Nama Sudah Terpakai";		
		}
		else
		{
			$bener = $this->dasar_model->insertData($namatabel,$kedb);
			if($bener == 1)
			{
				$pesan =  "Simpan Data Sukses";
			}
			else
			{
				$pesan =  "Simpan Data Gagal";
			}
		}
		
		echo "$bener|$tujuan|$pesan";
	}
	
	public function edit_departemen()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		if(!($this->dasarlib->apakahBolehMelakukan('DEPARTEMEN','ubah',$iduser)))
		{
			redirect(base_url('restodepoadmin'));
			exit;
		}

		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "hakakses";

		
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
		
		$namatabel = "departemen";
		$namafield = "id";
		$data['detail'] = $this->dasar_model->getDetailOnField($namatabel, $namafield, $data['id']);
		
		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
		$data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
		$data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
		$data['footer'] = $this->load->view('admin/footer', NULL, TRUE);
		
		$this->load->view('admin/hakakses/edit_departemen',$data);
	}
	
	public function do_edit_departemen()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		if(!($this->dasarlib->apakahBolehMelakukan('DEPARTEMEN','ubah',$iduser)))
		{
			redirect(base_url('restodepoadmin'));
			exit;
		}
		
		$bener = 1;
		$tujuan = base_url()."backend/hakakses/departemen";
		
		$kedb['nama'] = trim($this->input->post('nama'));

		$namatabel = "departemen";
		$namafield = "nama";
		$id = trim($this->input->post('id'));
		
		if($this->dasar_model->cekDataOnTableForEdit($namatabel,$namafield, $kedb['nama'], 'id', $id ))
		{
			$bener = 0;
			$pesan =  "Error: nama Sudah Terpakai";		
		}
		else
		{
			$bener = $this->dasar_model->updateData($namatabel,$kedb,'id',$id);
			if($bener == 1)
			{
				$pesan =  "Simpan Data Sukses";
			}
			else
			{
				$pesan =  "Simpan Data Gagal";
			}
		}
		
		echo "$bener|$tujuan|$pesan";
	}
	
	public function delete_departemen()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		if(!($this->dasarlib->apakahBolehMelakukan('DEPARTEMEN','hapus',$iduser)))
		{
			redirect(base_url('restodepoadmin'));
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
		
		//cek apakah ada masih user di departemen ini
		if($this->dasar_model->cekDataOnTable('pengguna','departemen', $id))
		{
			$bener = 0;
			$pesan =  "ERROR: Masih ada user yang ada di departemen ini";
		}
		else
		{
			$namatabel = "departemen";
			$namafield = "id";
			
			$bener = $this->dasar_model->hapusData($namatabel,$namafield,$id);
			if($bener == 1)
			{
				$pesan =  "Hapus Data Sukses";
			}
			else
			{
				$pesan =  "Hapus Data Gagal";
			}
		}
		echo "$bener|$pesan";
	}	
	// end DEPARTEMEN
	//=============================================
	
	

	//=============================================
	// begin JABATAN
	
	public function jabatan()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "hakakses";
		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
		$data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
		$data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
		$data['footer'] = $this->load->view('admin/footer', NULL, TRUE);		

		if(!($this->dasarlib->apakahBolehMelakukan('JABATAN','lihat',$iduser)))
		{
			redirect(base_url('restodepoadmin'));
			exit;
		}		

		if($this->dasarlib->apakahBolehMelakukan('JABATAN','tambah',$iduser))
		{
			$boleh_tambah = TRUE;
		}
		else
		{
			$boleh_tambah = FALSE;
		}
				
		$data['boleh_tambah'] = $boleh_tambah;
		
		$this->load->view('admin/hakakses/jabatan',$data);	
	}
	
	public function list_jabatan()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		if(!($this->dasarlib->apakahBolehMelakukan('JABATAN','lihat',$iduser)))
		{
			redirect(base_url('restodepoadmin'));
			exit;
		}		

		$hasil = $this->hakakses_model->getListJabatan();
		echo $hasil;
	}
	
	public function tambah_jabatan()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		if(!($this->dasarlib->apakahBolehMelakukan('JABATAN','tambah',$iduser)))
		{
			redirect(base_url('restodepoadmin'));
			exit;
		}
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "hakakses";
		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
		$data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
		$data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
		$data['footer'] = $this->load->view('admin/footer', NULL, TRUE);		
		
		$namatabel = "area_tugas";
		$namafield = "id,nama,keterangan";
		$isiwhere = "";
		$orderby = "id";		
		$data['list_area_tugas'] = $this->dasar_model->getDataOnTable($namatabel, $namafield, $isiwhere, $orderby);
		
		$this->load->view('admin/hakakses/tambah_jabatan',$data);
	}	
	
	
	public function do_tambah_jabatan()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		if(!($this->dasarlib->apakahBolehMelakukan('JABATAN','tambah',$iduser)))
		{
			redirect(base_url('restodepoadmin'));
			exit;
		}
		
		$bener = 1;
		$tujuan = base_url()."backend/hakakses/jabatan";
		
		$kedb['nama'] = trim($this->input->post('nama'));

		$namatabel = "jabatan";
		
		if($this->dasar_model->cekDataOnTable($namatabel,'nama', $kedb['nama']))
		{
			$bener = 0;
			$pesan =  "Error: Nama Sudah Terpakai";		
		}
		else
		{
			// masukkan jabatan dulu
			$bener = $this->dasar_model->insertData($namatabel,$kedb);
						
			if($bener == 1)
			{
				// ambil id jabatan yang barusan di-insert
				$lastjabatan =  $this->dasar_model->getDetailOnField($namatabel, 'nama', $kedb['nama']);
				$idjabatan = $lastjabatan['id'];
				
				//memasukkan ke default priviledge
				$namatabel2 = "area_tugas";
				$namafield2 = "id,nama";
				$isiwhere2 = "";
				$orderby2 = "id";				
				$list_area_tugas = $this->dasar_model->getDataOnTable($namatabel2, $namafield2, $isiwhere2, $orderby2);
				foreach($list_area_tugas as $row)
				{
					$idarea = $row['id'];
					
					$namalihat = $idarea."_lihat";
					$namatambah = $idarea."_tambah";
					$namaubah = $idarea."_ubah";
					$namahapus = $idarea."_hapus";
			
					$namaprovide = $idarea."_isprovide";
					$namaapprove = $idarea."_isapprove";
					$namarelease = $idarea."_isrelease";
					
					if($this->dasarlib->IsChecked('cekhak',$namalihat))
					{
						$isilihat = 1;
					}
					else
					{
						$isilihat = 0;
					}
				
					if($this->dasarlib->IsChecked('cekhak',$namatambah))
					{
						$isitambah = 1;
					}
					else
					{
						$isitambah = 0;
					}
				
					if($this->dasarlib->IsChecked('cekhak',$namaubah))
					{
						$isiubah = 1;
					}
					else
					{
						$isiubah = 0;
					}
				
					if($this->dasarlib->IsChecked('cekhak',$namahapus))
					{
						$isihapus = 1;
					}
					else
					{
						$isihapus = 0;
					}
			
					if($this->dasarlib->IsChecked('cekhak',$namaprovide))
					{
						$isiprovide = 1;
					}
					else
					{
						$isiprovide = 0;
					}
					
					if($this->dasarlib->IsChecked('cekhak',$namaapprove))
					{
						$isiapprove = 1;
					}
					else
					{
						$isiapprove = 0;
					}
					
					if($this->dasarlib->IsChecked('cekhak',$namarelease))
					{
						$isirelease = 1;
					}
					else
					{
						$isirelease = 0;
					}
															
					$this->hakakses_model->insertDefaultHakAkses($idjabatan,$idarea,$isilihat,$isitambah,$isiubah,$isihapus,$isiprovide,$isiapprove,$isirelease);				
				}
				$pesan =  "Simpan Data Sukses";
			}
			else
			{
				$pesan =  "Simpan Data Gagal";
			}
		}
		
		echo "$bener|$tujuan|$pesan";
		
	}
	
	public function edit_jabatan()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		if(!($this->dasarlib->apakahBolehMelakukan('JABATAN','ubah',$iduser)))
		{
			redirect(base_url('restodepoadmin'));
			exit;
		}

		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "hakakses";
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
		
		$namatabel = "jabatan";
		$namafield = "id";
		$data['detail'] = $this->dasar_model->getDetailOnField($namatabel, $namafield, $data['id']);
		
		$namatabel2 = "area_tugas";
		$namafield2 = "id,nama,keterangan";
		$isiwhere2 = "";
		$orderby2 = "id";		
		$data['list_area_tugas'] = $this->dasar_model->getDataOnTable($namatabel2, $namafield2, $isiwhere2, $orderby2);
		
		
		$this->load->view('admin/hakakses/edit_jabatan',$data);
	}
	
	public function do_edit_jabatan()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		if(!($this->dasarlib->apakahBolehMelakukan('JABATAN','ubah',$iduser)))
		{
			redirect(base_url('restodepoadmin'));
			exit;
		}
		
		$bener = 1;
		$tujuan = base_url()."backend/hakakses/jabatan";
		
		$kedb['nama'] = trim($this->input->post('nama'));
		$id = trim($this->input->post('id'));

		$namatabel = "jabatan";
		
		if($this->dasar_model->cekDataOnTableForEdit($namatabel,"nama", $kedb['nama'], "id", $id ))
		{
			$bener = 0;
			$pesan =  "Error: Nama Sudah Terpakai";		
		}
		else
		{
			// update jabatan dulu
			$bener = $this->dasar_model->updateData($namatabel,$kedb,"id",$id);
						
			if($bener == 1)
			{
				$idjabatan = $id;
				
				//memasukkan ke default priviledge
				$namatabel2 = "area_tugas";
				$namafield2 = "id,nama";
				$isiwhere2 = "";
				$orderby2 = "id";				
				$list_area_tugas = $this->dasar_model->getDataOnTable($namatabel2, $namafield2, $isiwhere2, $orderby2);
				foreach($list_area_tugas as $row)
				{
					$idarea = $row['id'];
					
					$namalihat = $idarea."_lihat";
					$namatambah = $idarea."_tambah";
					$namaubah = $idarea."_ubah";
					$namahapus = $idarea."_hapus";
			
					$namaprovide = $idarea."_isprovide";
					$namaapprove = $idarea."_isapprove";
					$namarelease = $idarea."_isrelease";
					
					if($this->dasarlib->IsChecked('cekhak',$namalihat))
					{
						$isilihat = 1;
					}
					else
					{
						$isilihat = 0;
					}
				
					if($this->dasarlib->IsChecked('cekhak',$namatambah))
					{
						$isitambah = 1;
					}
					else
					{
						$isitambah = 0;
					}
				
					if($this->dasarlib->IsChecked('cekhak',$namaubah))
					{
						$isiubah = 1;
					}
					else
					{
						$isiubah = 0;
					}
				
					if($this->dasarlib->IsChecked('cekhak',$namahapus))
					{
						$isihapus = 1;
					}
					else
					{
						$isihapus = 0;
					}
			
					if($this->dasarlib->IsChecked('cekhak',$namaprovide))
					{
						$isiprovide = 1;
					}
					else
					{
						$isiprovide = 0;
					}
					
					if($this->dasarlib->IsChecked('cekhak',$namaapprove))
					{
						$isiapprove = 1;
					}
					else
					{
						$isiapprove = 0;
					}
					
					if($this->dasarlib->IsChecked('cekhak',$namarelease))
					{
						$isirelease = 1;
					}
					else
					{
						$isirelease = 0;
					}
															
					$this->hakakses_model->updateDefaultHakAkses($idjabatan,$idarea,$isilihat,$isitambah,$isiubah,$isihapus,$isiprovide,$isiapprove,$isirelease);
				}
				$pesan =  "Simpan Data Sukses";
			}
			else
			{
				$pesan =  "Simpan Data Gagal";
			}
		}
		
		echo "$bener|$tujuan|$pesan";
	
	}	
	
	public function delete_jabatan()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		if(!($this->dasarlib->apakahBolehMelakukan('JABATAN','hapus',$iduser)))
		{
			redirect(base_url('restodepoadmin'));
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

		//cek apakah ada masih user di departemen ini
		if($this->dasar_model->cekDataOnTable('pengguna','jabatan', $id))
		{
			$bener = 0;
			$pesan =  "ERROR: Masih ada user yang ada di jabatan ini";
		}
		else
		{				
			$bener = $this->hakakses_model->hapusJabatan($id);
			if($bener == 1)
			{
	
				$pesan =  "Hapus Data Sukses";
			}
			else
			{
				$pesan =  "Hapus Data Gagal";
			}
		}
		echo "$bener|$pesan";
	}	
	
	// end JABATAN
	//=============================================




	//=============================================
	// begin PENGGUNA/USER
	
	public function pengguna()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "hakakses";
		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
		$data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
		$data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
		$data['footer'] = $this->load->view('admin/footer', NULL, TRUE);		
		
		if(!($this->dasarlib->apakahBolehMelakukan('PENGGUNA','lihat',$iduser)))
		{

			redirect(base_url('restodepoadmin'));
			exit;
		}		

		if($this->dasarlib->apakahBolehMelakukan('PENGGUNA','tambah',$iduser))
		{
			$boleh_tambah = TRUE;
		}
		else
		{
			$boleh_tambah = FALSE;
		}
		
		$data['boleh_tambah'] = $boleh_tambah;
		
		$this->load->view('admin/hakakses/pengguna',$data);	
	}
	
	public function list_pengguna()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		if(!($this->dasarlib->apakahBolehMelakukan('PENGGUNA','lihat',$iduser)))
		{
			redirect(base_url('restodepoadmin'));
			exit;
		}		

		$hasil = $this->hakakses_model->getListPengguna();
		echo $hasil;
	}	
	
	public function tambah_pengguna()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		if(!($this->dasarlib->apakahBolehMelakukan('PENGGUNA','tambah',$iduser)))
		{
			redirect(base_url('restodepoadmin'));
			exit;
		}
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "hakakses";
		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
		$data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
		$data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
		$data['footer'] = $this->load->view('admin/footer', NULL, TRUE);		
		
		$namatabel2 = "departemen";
		$namafield2 = "id,nama";
		$isiwhere2 = "";
		$orderby2 = "id";				
		$data['list_departemen'] = $this->dasar_model->getDataOnTable($namatabel2, $namafield2, $isiwhere2, $orderby2);

		$namatabel3 = "jabatan";
		$namafield3 = "id,nama";
		$isiwhere3 = "";
		$orderby3 = "id";				
		$data['list_jabatan'] = $this->dasar_model->getDataOnTable($namatabel3, $namafield3, $isiwhere3, $orderby3);
		
				
		$this->load->view('admin/hakakses/tambah_pengguna',$data);
	}
	
	public function do_tambah_pengguna()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		if(!($this->dasarlib->apakahBolehMelakukan('PENGGUNA','tambah',$iduser)))
		{
			redirect(base_url('restodepoadmin'));
			exit;
		}
		
		$bener = 1;
		$tujuan = base_url()."backend/hakakses/pengguna";
		
		$kedb['username'] = trim($this->input->post('username'));
		$kedb['password'] = trim($this->input->post('password'));
		$kedb['departemen'] = trim($this->input->post('departemen'));
		$kedb['jabatan'] = trim($this->input->post('jabatan'));
		$kedb['nama'] = trim($this->input->post('nama'));
		$kedb['email'] = trim($this->input->post('email'));
		$kedb['isactive'] = trim($this->input->post('isactive'));

		$namatabel = "pengguna";
		
		if($this->dasar_model->cekDataOnTable($namatabel,'username', $kedb['username']))
		{
			$bener = 0;
			$pesan =  "Error: Username Sudah Terpakai";		
		}
		else
		{
			if(($this->dasarlib->isValidPassword($kedb['password'])) && ($this->dasarlib->isValidUsername($kedb['username'])))
			{
				$bener = $this->hakakses_model->insertPengguna($kedb);
				if($bener == 1)
				{
					$pesan =  "Simpan Data Sukses";
				}
				else
				{
					$pesan =  "Simpan Data Gagal";
				}

			}
			else
			{
				$bener = 0;
				$pesan =  "ERROR: username or password is using invalid char";
			}
			
			
		}
		
		echo "$bener|$tujuan|$pesan";
	}

	public function edit_pengguna()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		if(!($this->dasarlib->apakahBolehMelakukan('PENGGUNA','ubah',$iduser)))
		{
			redirect(base_url('restodepoadmin'));
			exit;
		}

		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "hakakses";
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
		
		$namatabel = "pengguna";
		$namafield = "id";
		$data['detail'] = $this->dasar_model->getDetailOnField($namatabel, $namafield, $data['id']);
				
		$data['list_departemen'] = $this->dasar_model->getDataOnTable('departemen', 'id,nama', '', 'id');

		$namatabel3 = "jabatan";
		$namafield3 = "id,nama";
		$isiwhere3 = "";
		$orderby3 = "id";				
		$data['list_jabatan'] = $this->dasar_model->getDataOnTable($namatabel3, $namafield3, $isiwhere3, $orderby3);
		
		
		$namatabel2 = "area_tugas";
		$namafield2 = "id,nama,keterangan";
		$isiwhere2 = "";
		$orderby2 = "id";		
		$data['list_area_tugas'] = $this->dasar_model->getDataOnTable($namatabel2, $namafield2, $isiwhere2, $orderby2);
				
		$this->load->view('admin/hakakses/edit_pengguna',$data);
	}
	
	public function do_edit_pengguna()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		if(!($this->dasarlib->apakahBolehMelakukan('PENGGUNA','ubah',$iduser)))
		{
			redirect(base_url('restodepoadmin'));
			exit;
		}
		
		$bener = 1;
		$tujuan = base_url()."backend/hakakses/pengguna";
		
		$kedb['username'] = trim($this->input->post('username'));
		if(trim($this->input->post('password')) == "")
		{}
		else
		{
			
			$pass = trim($this->input->post('password'));
			
			if($this->dasarlib->isValidPassword($pass)) 
			{
				$bener = 1;
				$kedb['password'] = md5($pass);
			}
			else
			{
				$bener = 0;
				$pesan =  "ERROR: password is using invalid char, should be 4-16 char alphanumeric";
				
			}

		}
		$kedb['departemen'] = trim($this->input->post('departemen'));
		$kedb['jabatan'] = trim($this->input->post('jabatan'));
		$kedb['nama'] = trim($this->input->post('nama'));
		$kedb['email'] = trim($this->input->post('email'));
		$kedb['isactive'] = trim($this->input->post('isactive'));
		$id = trim($this->input->post('id'));

		$namatabel = "pengguna";
		
		if($bener == 1)
		{
			if($this->dasar_model->cekDataOnTableForEdit($namatabel,"username", $kedb['username'], "id", $id ))
			{
				$bener = 0;
				$pesan =  "Error: Username Sudah Terpakai";		
			}
			else
			{
				// update pengguna
				$bener = $this->dasar_model->updateData($namatabel,$kedb,"id",$id);
							
				if($bener == 1)
				{
					$idpengguna = $id;
					
					//update user priviledge
					$namatabel2 = "area_tugas";
					$namafield2 = "id,nama";
					$isiwhere2 = "";
					$orderby2 = "id";				
					$list_area_tugas = $this->dasar_model->getDataOnTable($namatabel2, $namafield2, $isiwhere2, $orderby2);
					foreach($list_area_tugas as $row)
					{
						$idarea = $row['id'];
						
						$namalihat = $idarea."_lihat";
						$namatambah = $idarea."_tambah";
						$namaubah = $idarea."_ubah";
						$namahapus = $idarea."_hapus";
				
						$namaprovide = $idarea."_isprovide";
						$namaapprove = $idarea."_isapprove";
						$namarelease = $idarea."_isrelease";
						
						if($this->dasarlib->IsChecked('cekhak',$namalihat))
						{
							$isilihat = 1;
						}
						else
						{
							$isilihat = 0;
						}
					
						if($this->dasarlib->IsChecked('cekhak',$namatambah))
						{
							$isitambah = 1;
						}
						else
						{
							$isitambah = 0;
						}
					
						if($this->dasarlib->IsChecked('cekhak',$namaubah))
						{
							$isiubah = 1;
						}
						else
						{
							$isiubah = 0;
						}
					
						if($this->dasarlib->IsChecked('cekhak',$namahapus))
						{
							$isihapus = 1;
						}
						else
						{
							$isihapus = 0;
						}
				
						if($this->dasarlib->IsChecked('cekhak',$namaprovide))
						{
							$isiprovide = 1;
						}
						else
						{
							$isiprovide = 0;
						}
						
						if($this->dasarlib->IsChecked('cekhak',$namaapprove))
						{
							$isiapprove = 1;
						}
						else
						{
							$isiapprove = 0;
						}
						
						if($this->dasarlib->IsChecked('cekhak',$namarelease))
						{
							$isirelease = 1;
						}
						else
						{
							$isirelease = 0;
						}
																
						$this->hakakses_model->updateHakAksesUser($idpengguna,$idarea,$isilihat,$isitambah,$isiubah,$isihapus,$isiprovide,$isiapprove,$isirelease);
					}
					$pesan =  "Simpan Data Sukses";
				}
				else
				{
					$pesan =  "Simpan Data Gagal";
				}
			}
		
		}
		
		echo "$bener|$tujuan|$pesan";
	}

	


	public function delete_pengguna()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		if(!($this->dasarlib->apakahBolehMelakukan('PENGGUNA','hapus',$iduser)))
		{
			redirect(base_url('restodepoadmin'));
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
				
		$bener = $this->hakakses_model->hapusPengguna($id);
		if($bener == 1)
		{

			$pesan =  "Hapus Data Sukses";
		}
		else
		{
			$pesan =  "Hapus Data Gagal";
		}
		echo "$bener|$pesan";
	}	
	
	// end PENGGUNA/USER
	//=============================================
}
?>