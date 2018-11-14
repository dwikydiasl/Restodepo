<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller 
{
  	function __construct() {
      	parent::__construct();

      	$this->load->model('settingadmin_model');

  	}	 
	 
	// BANK
	public function bank()
	{
        if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
        $iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "setting";

		if(!($this->dasarlib->apakahBolehMelakukan('SETTING','lihat',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}		

		if($this->dasarlib->apakahBolehMelakukan('SETTING','tambah',$iduser))
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

		$this->load->view('admin/setting/bank', $data);
	}

	
	public function list_bank_kami()
	{
		$hasil = $this->settingadmin_model->get_list_bank_kami();
        echo $hasil;
    }

    public function tambah_bank()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "setting";

		if(!($this->dasarlib->apakahBolehMelakukan('SETTING','tambah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}		

		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
		$data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
		$data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
		$data['footer'] = $this->load->view('admin/footer', NULL, TRUE);

		$data['list_bank'] = $this->settingadmin_model->getListBank();

		$this->load->view('admin/setting/tambah_bank', $data);
    }
    
    public function do_tambah_bank()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('SETTING','tambah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$bener = 1;
		$tujuan = base_url()."backend/setting/bank";

        $kedb['kode_bank'] = trim($this->input->post('kode_bank'));
        $kedb['norek'] = trim($this->input->post('norek'));
        $kedb['atas_nama'] = trim($this->input->post('atas_nama'));

        $namatabel = "bank_kami";

        if($this->dasar_model->cekDataOnTable($namatabel,'norek', $kedb['norek']))
        {
            $bener = 0;
            $pesan =  "Error: Nomor rekening sudah ada";		
        }
        else
        {
            $bener = $this->dasar_model->insertData($namatabel,$kedb);
            if($bener == 1)
            {
                $pesan =  "Simpan Data Sukses";

                //begin masukkan ke audit trail
                $keterangan_trail = "Tambah bank restodepo: ".$kedb['norek']." atas nama: ".$kedb['atas_nama'];
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

    public function delete_bank_kami()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('SETTING','hapus',$iduser)))
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
		
		$namatabel = "bank_kami";
		$namafield = "id";

		$param['ishapus'] = 1;
		
		$detail = $this->dasar_model->getDetailOnField($namatabel, $namafield, $id);

		//$bener = $this->dasar_model->hapusData($namatabel,$namafield,$id);
		$bener = $this->dasar_model->updateData($namatabel,$param,$namafield,$id);
		if($bener == 1)
		{
			$pesan =  "Hapus Data Sukses";

			//begin masukkan ke audit trail
			$keterangan_trail = "Menghapus bank: ".$detail['norek']." atas nama: ".$detail['atas_nama'];
			$this->dasar_model->insertTrail($iduser, $username_user, $keterangan_trail);
			//end masukkan ke audit trail
		}
		else
		{
			$pesan =  "Hapus Data Gagal";
		}
		echo "$bener|$pesan";		
    }
    
	public function edit_bank_kami()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "setting";

		if(!($this->dasarlib->apakahBolehMelakukan('SETTING','ubah',$iduser)))
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
		
		$namatabel = "bank_kami";
		$namafield = "id";
        $data['detail'] = $this->dasar_model->getDetailOnField($namatabel, $namafield, $data['id']);
        
		$data['list_bank'] = $this->settingadmin_model->getListBank();

		$this->load->view('admin/setting/edit_bank_kami', $data);
	}    

    public function do_edit_bank()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('SETTING','ubah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$bener = 1;
		$tujuan = base_url()."backend/setting/bank";

        $kedb['kode_bank'] = trim($this->input->post('kode_bank'));
        $kedb['norek'] = trim($this->input->post('norek'));
        $kedb['atas_nama'] = trim($this->input->post('atas_nama'));

        $namatabel = "bank_kami";
		$id = $this->input->post('id');

		// cek apakah ada norek yg sama
		if($this->dasar_model->cekDataOnTableForEdit($namatabel,'norek', $kedb['norek'], 'id', $id))
		{
			$bener = 0;
			$pesan =  "Error: nomor rekening Sudah ada";		
		}
		else
		{
            $bener = $this->dasar_model->updateData($namatabel,$kedb,'id',$id);
            if($bener == 1)
            {
                $pesan =  "Simpan Data Sukses";

                //begin masukkan ke audit trail
                $keterangan_trail = "Edit bank kami: ".$kedb['norek']." atas nama: ".$kedb['atas_nama'];
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


	// ADMIN FEE
	public function admin_fee()
	{
        if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
        $iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "setting";

		if(!($this->dasarlib->apakahBolehMelakukan('SETTING','lihat',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}		

		if($this->dasarlib->apakahBolehMelakukan('SETTING','tambah',$iduser))
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

		$this->load->view('admin/setting/admin_fee', $data);
	}

	
	public function list_admin_fee()
	{
		$hasil = $this->settingadmin_model->get_list_admin_fee();
        echo $hasil;
    }
	
	public function tambah_admin_fee()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "setting";

		if(!($this->dasarlib->apakahBolehMelakukan('SETTING','tambah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}		

		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
		$data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
		$data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
		$data['footer'] = $this->load->view('admin/footer', NULL, TRUE);

		$data['list_bank'] = $this->settingadmin_model->getListBank();

		$this->load->view('admin/setting/tambah_admin_fee', $data);
    }

    public function do_tambah_admin_fee()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('SETTING','tambah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$bener = 1;
		$tujuan = base_url()."backend/setting/admin_fee";

        $kedb['batas_bawah'] = trim($this->input->post('batas_bawah'));
        $kedb['batas_atas'] = trim($this->input->post('batas_atas'));
        $kedb['fee'] = trim($this->input->post('fee'));

        $namatabel = "admin_fee";

        if($this->dasar_model->cekDataOnTable($namatabel,'batas_bawah', $kedb['batas_bawah']))
        {
            $bener = 0;
            $pesan =  "Error: Batas bawah ini sudah ada";		
        }
        else
        {
            $bener = $this->dasar_model->insertData($namatabel,$kedb);
            if($bener == 1)
            {
                $pesan =  "Simpan Data Sukses";

                $kalimat = $kedb['batas_bawah'] .' - '.$kedb['batas_atas'] .', Fee: '. $kedb['fee'];
                //begin masukkan ke audit trail
                $keterangan_trail = "Tambah fee transaksi ".$kalimat;
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

    public function delete_admin_fee()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('SETTING','hapus',$iduser)))
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
		
		$namatabel = "admin_fee";
		$namafield = "id";

		$detail = $this->dasar_model->getDetailOnField($namatabel, $namafield, $id);

		$bener = $this->dasar_model->hapusData($namatabel,$namafield,$id);
		//$bener = $this->dasar_model->updateData($namatabel,$param,$namafield,$id);
		if($bener == 1)
		{
			$pesan =  "Hapus Data Sukses";

			//begin masukkan ke audit trail
			$keterangan_trail = "Menghapus admin fee id: ".$id.', nilai fee: '.$detail['fee'];
			$this->dasar_model->insertTrail($iduser, $username_user, $keterangan_trail);
			//end masukkan ke audit trail
		}
		else
		{
			$pesan =  "Hapus Data Gagal";
		}
		echo "$bener|$pesan";		
    }	

	public function edit_admin_fee()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "setting";

		if(!($this->dasarlib->apakahBolehMelakukan('SETTING','ubah',$iduser)))
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
		
		$namatabel = "admin_fee";
		$namafield = "id";
        $data['detail'] = $this->dasar_model->getDetailOnField($namatabel, $namafield, $data['id']);
        
		$this->load->view('admin/setting/edit_admin_fee', $data);
	}    

    public function do_edit_admin_fee()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('SETTING','ubah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$bener = 1;
		$tujuan = base_url()."backend/setting/admin_fee";

        $kedb['batas_bawah'] = trim($this->input->post('batas_bawah'));
        $kedb['batas_atas'] = trim($this->input->post('batas_atas'));
        $kedb['fee'] = trim($this->input->post('fee'));

        $namatabel = "admin_fee";
		$id = $this->input->post('id');

		// cek apakah ada norek yg sama
		if($this->dasar_model->cekDataOnTableForEdit($namatabel,'batas_bawah', $kedb['batas_bawah'], 'id', $id))
		{
			$bener = 0;
			$pesan =  "Error: batas bawah Sudah ada";		
		}
		else
		{
            $bener = $this->dasar_model->updateData($namatabel,$kedb,'id',$id);
            if($bener == 1)
            {
                $pesan =  "Simpan Data Sukses";
                $kalimat = $kedb['batas_bawah'] .' - '.$kedb['batas_atas'] .', Fee: '. $kedb['fee'];
                //begin masukkan ke audit trail
                $keterangan_trail = "Tambah fee transaksi ".$kalimat;
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

}
?>