<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
  	function __construct() {
      	parent::__construct();

      	$this->load->model('login_model');

  	}	 
	 
	public function index()
	{
		
		$data['msg'] = "";
		$this->login($data);
	}
	
	// menampilkan halaman login
	public function login($data)
	{
		$data['kode'] = "";
		
		if(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession']))
		{
			redirect(base_url().'backend/dashboard');
		}
		else
		{
			$data['kode'] = $this->dasarlib->getRandomString(4);	
			$sessdata = array(
				$this->config->item('sess_prefix').'CaptchaSession'  => $data['kode']
			);
			$this->session->set_userdata($sessdata);	
			$this->load->view('admin/login',$data);
		}

	}
	
	// proses login disini
	public function logmein()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$kode = $this->input->post('captcha');
				
		$sesscaptcha = $_SESSION[$this->config->item('sess_prefix').'CaptchaSession'];
		
		
		if($sesscaptcha == $kode)
		{
			// jika captcha benar
			$data['msg'] = "";
			if($this->login_model->cekLogin($username,$password))
			{
				$detail = $this->login_model->getDetailUser($username);
				$iduser = $detail['id'];
				$departemen = $detail['departemen'];
				$jabatan = $detail['jabatan'];
				$nama = $detail['nama'];
				
				$de_dep = $this->dasar_model->getDetailOnField('departemen', 'id', $departemen);
				$nama_dep = $de_dep['nama'];
				$ispublic = $de_dep['ispublic'];
				
				if($jabatan == 1)
				{
					$isadmin = 1;
				}
				else
				{
					$isadmin = 0;
				}
				
				
				$sessdata = array(
					$this->config->item('sess_prefix').'UsernameSession'  => $username,
					$this->config->item('sess_prefix').'loggedinSession' => TRUE,
					$this->config->item('sess_prefix').'IDSession' => $iduser,
					$this->config->item('sess_prefix').'DepartemenSession' => $departemen,
					$this->config->item('sess_prefix').'NamaDepartemen'	=> $nama_dep,
					$this->config->item('sess_prefix').'JabatanSession' => $jabatan,
					$this->config->item('sess_prefix').'NamaSession' => $nama,
					$this->config->item('sess_prefix').'IsAdminSession' => $isadmin,
					$this->config->item('sess_prefix').'IsPublicSession' => $ispublic,				
					$this->config->item('sess_prefix').'NamaPageSession' => 'dashboard'
				);
				$this->session->set_userdata($sessdata);
                //begin masukkan ke audit trail
                $keterangan_trail = "Login ke dashboard";
                $this->dasar_model->insertTrail($iduser, $username, $keterangan_trail);
                //end masukkan ke audit trail
				
				redirect(base_url().'backend/dashboard');
				//$this->dashboard();
			}
			else
			{
				$data['msg'] = "Invalid login or innactive user";
				$this->login($data);
			}
		}
		else
		{
			// jika captcha salah
			$data['msg'] = "Wrong captcha";
			$this->login($data);			
		}
		
		
		
	}
	
	
	
	public function dologout()
	{
		if (!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession']))){
			redirect (base_url('restodepoadmin')); 
		}
        $iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
        $username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

        //begin masukkan ke audit trail
        $keterangan_trail = "Logout dari dashboard";
        $this->dasar_model->insertTrail($iduser, $username_user, $keterangan_trail);
        //end masukkan ke audit trail	

		$this->session->sess_destroy();
		$data['msg'] = "You are logged out";
		redirect(base_url().'restodepoadmin');
		//$this->login($data);
	}
	
	public function changePassword()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url().'restodepoadmin');
		}			
		else
		{
			$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
			$data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
			$data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
			$data['footer'] = $this->load->view('admin/footer', NULL, TRUE);
			
			$data['judulpage'] = "Ganti Password";
			
			$this->load->view('admin/changepassword',$data);	
		}
	}
	
	public function doChangePassword()
	{
		$bener = 1;
		$pesan =  "Ganti Password Sukses";
		$tujuan = base_url()."backend/dashboard";
		
		$oldpass = trim($this->input->post('oldpass'));
		$pxold = md5($oldpass);
		
		$newpass = trim($this->input->post('newpass'));
		$confpass = trim($this->input->post('confpass'));
		$pxnew = md5($newpass);
		
		$idnya = $_SESSION[$this->config->item('sess_prefix').'IDSession'];
		$detail = $this->login_model->getDetailUserOnID($idnya);
		
		$passdb = $detail['password'];
		if($passdb <> $pxold)
		{
			$bener = 0;
			$pesan = "Error: Password lama salah";
		}
		
		if($newpass <> $confpass)
		{
			$bener = 0;
			$pesan = "Error: Password baru dan konfirmasi tidak sama";
		}
		
		if(!preg_match('/^[0-9A-Za-z!@#$%]{5,16}$/', $newpass)) {
  			$bener = 0;
    		$pesan = "ERROR: Password use illegal char, password must 5-16 char long";
		}
		
		if($bener == 1)
		{
			$this->login_model->updateUserPassword($idnya,$pxnew);
		}
		
		echo "$bener|$tujuan|$pesan"; 
		//return true;
	}
	
	
	
	
}

?>