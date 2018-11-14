<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

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
                $this->load->model('akun_model');
        }

    //halaman index    

    public function index(){


    	$this->load->view('public/index');
    }

    // menampilkan halaman login
	public function login()
	{
		$data['kode'] = "";
		
		if(isset($_SESSION[$this->config->item('sess_prefix_penjual').'loggedinSession']))
		{
			redirect(base_url().'akun/dashboard_penjual');
		}
		elseif(isset($_SESSION[$this->config->item('sess_prefix_pembeli').'loggedinSession']))
		{
			redirect(base_url('akun/dashboard_penjual'));
		}
		else
		{
			$data['kode'] = $this->dasarlib->getRandomString(4);	
			$sessdata = array(
				$this->config->item('sess_prefix_penjual').'CaptchaSession'  => $data['kode'],
				$this->config->item('sess_prefix_pembeli').'CaptchaSession'  => $data['kode']
			);
			$this->session->set_userdata($sessdata);	
			
			$this->load->view('public/login',$data);
		}

	}

	//Proses Login
	public function logmein()
	{
		$email 		= $this->input->post('username');
		$password 	= $this->input->post('password7');
		$kode 		= $this->input->post('captcha');
		$select_role= $this->input->post('select_role');
		if ($select_role == "penjual") {		
			$sesscaptcha = $_SESSION[$this->config->item('sess_prefix_penjual').'CaptchaSession'];
		} else {
			$sesscaptcha = $_SESSION[$this->config->item('sess_prefix_pembeli').'CaptchaSession'];
		}
		
		if($sesscaptcha == $kode)
		{
			// jika captcha benar
			if ($select_role == "penjual") {

				//penjual


				if ($this->akun_model->cekLoginpenjual($email,$password))
				{
					$detail = $this->dasar_model->getDetailOnField('penjual','username', $email);
					$iduser = $detail['id_penjual'];
					$nama_toko	= $detail['nama_toko'];
					if ($detail['thumbnail_logo'] != null || $detail['thumbnail_logo'] != "") {
						$thumbnail_logo = base_url()."assets/gambar_toko/foto/".$detail['thumbnail_logo'];
					} else {
						$thumbnail_logo = base_url()."assets/gambar_toko/foto/noimage.jpg";
					}
					$sessdata = array(
						$this->config->item('sess_prefix_penjual').'UsernameSession'  => $email,
						$this->config->item('sess_prefix_penjual').'loggedinSession' => TRUE,
						$this->config->item('sess_prefix_penjual').'IDSession' => $iduser,
						$this->config->item('sess_prefix_penjual').'NamaSession' => $nama_toko,
						$this->config->item('sess_prefix_penjual').'RoleSession' => 1

					);
					$this->session->set_userdata($sessdata);


					//update last login
					$skr = date("Y-m-d H:i:s");
					$datax = array(
					 'last_login' => $skr
					 );
					$update = $this->dasar_model->updateData("penjual", $datax, "username", $email);


					redirect(base_url().'akun/dashboard_penjual');
				}
				else
				{
					echo "salah login";exit;
				}
			} else {
				
				// login pembeli

				if ($this->akun_model->cekLoginpembeli($email,$password))
				{
					$detail = $this->dasar_model->getDetailOnField('pembeli','username', $email);
					$iduser = $detail['id_pembeli'];
					$nama_toko	= $detail['nama_toko'];
					if ($detail['thumbnail_logo'] != null || $detail['thumbnail_logo'] != "") {
						$thumbnail_logo = base_url()."assets/gambar_toko/foto/".$detail['thumbnail_logo'];
					} else {
						$thumbnail_logo = base_url()."assets/gambar_toko/foto/noimage.jpg";
					}
					$sessdata = array(
						$this->config->item('sess_prefix_penjual').'UsernameSession'  => $email,
						$this->config->item('sess_prefix_penjual').'loggedinSession' => TRUE,
						$this->config->item('sess_prefix_penjual').'IDSession' => $iduser,
						$this->config->item('sess_prefix_penjual').'NamaSession' => $nama_toko,
						$this->config->item('sess_prefix_penjual').'RoleSession' => 2

					);
					$this->session->set_userdata($sessdata);


					//update last login
					$skr = date("Y-m-d H:i:s");
					$datax = array(
					 'last_login' => $skr
					 );
					$update = $this->dasar_model->updateData("pembeli", $datax, "username", $email);


					redirect(base_url().'akun/dashboard_pembeli');
				}
				else
				{
					echo "salah login";exit;
				}
			}
			
			
		}
		else
		{
			// jika captcha salah
			$result = array(
				'code' => 'error',
				'message' => 'Wrong captcha!'
			);
		}
		
	}

	public function dashboard_penjual()
	{
		$last_segment 		= $this->uri->total_segments();
        $key 				= $this->uri->segment($last_segment);
		$data['detail_penjual'] 	= $this->dasar_model->getDetailOnField('penjual','permalink', $key);
		

		$this->load->view('public/dashboard_penjual',$data);
	}

	public function dashboard_pembeli()
	{

		
		$this->load->view('public/dashboard_pembeli',$data);
	}

	public function dologout()
	{
		

		$this->session->sess_destroy();
		$data['msg'] = "You are logged out";
		redirect(base_url());
		//$this->login($data);
	}

	//Register

	public function doregister()
	{
		$select_role = trim($this->input->post('select_role'));

		if ($select_role == 'penjual') {
			//penjual
		$password1 = trim($this->input->post('password1'));
		$password2 = trim($this->input->post('password2'));

		if($password1 <> $password2)
		{
			echo "Error: Password dan konfirmasi tidak sama";
			exit;

		}
		if(!($this->dasarlib->isValidPassword($password1)))
		{
			
			echo "Error: Illegal Password, panjang password 4-16 char";
			exit;

		}
			$koderole = 1;
			$kedb['username'] = trim($this->input->post('email'));
			$kedb['password'] = $password1;
			$kedb['nama'] = trim($this->input->post('nama_pt'));
			$kedb['nama_toko'] = trim($this->input->post('nama_toko'));
			$kedb['telepon'] = trim($this->input->post('telepon'));
			$kedb['penjual_key'] = $this->dasarlib->getRandomString(32);
			$kedb['permalink'] = $this->dasarlib->buatPermalinkNamaFile($kedb['nama_toko']);

			$key_email = $koderole.'-'.$kedb['penjual_key'];

			// cek email duplicated

			$namatabel = "penjual";

				if($this->dasar_model->cekDataOnTable($namatabel,'username', $kedb['username']))
			{
				echo "E-Mail Sudah Terpakai";
				exit;		
			}
			else
			{
				// cek nama toko

				if($this->dasar_model->cekDataOnTable($namatabel,'nama_toko', $kedb['nama_toko']))
				{	
					echo "Nama Toko Sudah Terpakai";
					exit;
				}
				

			}
			
			$this->dasar_model->insertData('penjual',$kedb);

			// kirim aktivasi E-Mail

			$data['name']			= $kedb['nama'];
			$data['link']			= base_url()."akun/activation/".$key_email;				
			$data['email_pengirim']	= "admin@restodepo.co.id";
			$data['email_tujuan']	= $kedb['username'];
			$data['subjek']			= "Aktivasi Akun - Restodepo.co.id";
			$data['template']		= 'account_activation';



			$this->load->view('public/after_register');


		} else {
			//Pembeli 

		$password1 = trim($this->input->post('password1'));
		$password2 = trim($this->input->post('password2'));

		if($password1 <> $password2)
		{
			echo "Error: Password dan konfirmasi tidak sama";
			exit;

		}
		if(!($this->dasarlib->isValidPassword($password1)))
		{
			
			echo "Error: Illegal Password, panjang password 4-16 char";
			exit;

		}

			$koderole = 2;	
			$kedb['username'] = trim($this->input->post('email'));
			$kedb['password'] = $password1;
			$kedb['nama'] = trim($this->input->post('nama'));
			$kedb['phone'] = trim($this->input->post('phone'));
			$kedb['pembeli_key'] = $this->dasarlib->getRandomString(32);			

			$key_email = $koderole.'-'.$kedb['pembeli_key'];


			// cek username

			$namatabel = "pembeli";

				if($this->dasar_model->cekDataOnTable($namatabel,'username', $kedb['username']))
			{
				echo "E-Mail Sudah Terpakai";
				exit;
			}
			


			$this->dasar_model->insertData('pembeli',$kedb);

			// kirim aktivasi E-Mail

			$data['name']			= $kedb['nama'];
			$data['link']			= base_url()."akun/activation/".$key_email;				
			$data['email_pengirim']	= "admin@restodepo.co.id";
			$data['email_tujuan']	= $kedb['username'];
			$data['subjek']			= "Aktivasi Akun - Restodepo.co.id";
			$data['template']		= 'account_activation';
						
			$this->dasarlib->send_email($data);

			$this->load->view('public/after_register');
		}
		

		// $this->load->view('public/login');
	}

	 function activation(){
		$last_segment 	= $this->uri->total_segments();
        $key 			= $this->uri->segment($last_segment);
        $arkey 			= explode('-', $key);
		if ($arkey[0]==1) {
			//penjual
			if ($this->dasar_model->cekDataOnTable('penjual','penjual_key', $arkey[1])) {
				// ada
				// cek status
				$detail = $this->dasar_model->getDetailOnField('penjual','penjual_key', $arkey[1]);
				$status = $detail['status'];
				$id_penjual =$detail['id_penjual'];
				if ($status==0) {
					// belum aktif
					$datax = array(
					 'status' => 1
					 );
					$update = $this->dasar_model->updateData("penjual", $datax, "id_penjual", $id_penjual);
					$data['pesan'] = "Selamat akun anda telah aktif";

				} else {
					// ditolak
					$data['pesan']= "Akun ini sudah pernah diaktifkan";
				}
				
				//echo "ada penjual";
			} else {
				// ga ada
				$data['pesan']= "Maaf E-Mail anda tidak terdaftar sebagai penjual";
			}
			

			
		} else {
			//pembeli

			if ($arkey[0]==2) {
			
			if ($this->dasar_model->cekDataOnTable('pembeli','pembeli_key', $arkey[1])) {
				// ada
				// cek status
				$detail = $this->dasar_model->getDetailOnField('pembeli','pembeli_key', $arkey[1]);
				$status = $detail['status'];
				$id_pembeli =$detail['id_pembeli'];
				if ($status==0) {
					// belum aktif
					$datax = array(
					 'status' => 1
					 );
					$update = $this->dasar_model->updateData("pembeli", $datax, "id_pembeli", $id_pembeli);
					$data['pesan'] = "Selamat akun anda telah aktif";

				} else {
					// ditolak
					$data['pesan']= "Akun ini sudah pernah diaktifkan";
				}
				
				//echo "ada penjual";
			} else {
				// ga ada
				$data['pesan']= "Maaf E-Mail anda tidak terdaftar sebagai pembeli";
			}
			

			
		}

		}
		$this->load->view('public/after_activation', $data);
		
	}
	public function doresetpassword(){
		$select_role = trim($this->input->post('select_role'));
		$email = trim($this->input->post('email'));

		if ($select_role == "penjual") {
			//penjual
			// cek email
			if ($this->dasar_model->cekDataOnTable('penjual','username', $email))
			{
				// email ada
				$new_password= $this->dasarlib->getRandomString(8);
				$new_password2= md5($new_password);
				$detail = $this->dasar_model->getDetailOnField('penjual','username', $email);



				//update data
				$datax = array(
					 'password' => $new_password2
					 );
					$update = $this->dasar_model->updateData("penjual", $datax, "username", $email);


				//kirim email

				$data['name']			= $detail['nama_toko'];
				$data['pass_baru']		= $new_password;			
				$data['email_pengirim']	= "admin@restodepo.co.id";
				$data['email_tujuan']	= $email;
				$data['subjek']			= "Reset Password - Restodepo.co.id";
				$data['template']		= 'lupa_password';
							
				$this->dasarlib->send_email($data);
				$dataz['pesan']= "Password baru sudah kami kirim ke Email Anda, silahkan cek E-Mail anda";

			}
			else
			{
				// tidak ada
				$dataz['pesan']= "E-Mail anda tidak terdaftar";
			}
		} else {

			//pembeli

			if ($this->dasar_model->cekDataOnTable('pembeli','username', $email))
			{
				// email ada
				$new_password= $this->dasarlib->getRandomString(8);
				$new_password2= md5($new_password);
				$detail = $this->dasar_model->getDetailOnField('pembeli','username', $email);



				//update data
				$datax = array(
					 'password' => $new_password2
					 );
					$update = $this->dasar_model->updateData("pembeli", $datax, "username", $email);


				//kirim email

				$data['name']			= $detail['nama'];
				$data['pass_baru']		= $new_password;			
				$data['email_pengirim']	= "admin@restodepo.co.id";
				$data['email_tujuan']	= $email;
				$data['subjek']			= "Reset Password - Restodepo.co.id";
				$data['template']		= 'lupa_password';
							
				$this->dasarlib->send_email($data);
				$dataz['pesan']= "Password baru sudah kami kirim ke Email Anda, silahkan cek E-Mail anda";

			}
			else
			{
				// tidak ada
				$dataz['pesan']= "E-Mail anda tidak terdaftar";
			}

		}
		
		$this->load->view('public/after_reset', $dataz);
		



	}


}
