<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession']))) {
            redirect(base_url().'restodepoadmin');
        }
        $this->load->model(array('hakakses_model','dashboard_model'));

    }

    public function index() {
        $data['msg'] = ""; 
		if (isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])) {
            $_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "dashboard";
            $iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];

            //$menudata['isimenu'] = $this->dasarlib->bikinSideMenu();	
			$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
			$data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
			$data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
			$data['footer'] = $this->load->view('admin/footer', NULL, TRUE);

            $data['jumlah_member'] = $this->dashboard_model->get_jumlah_member();
            $data['jumlah_toko'] = $this->dashboard_model->get_jumlah_toko();
            $data['jumlah_tj'] = $this->dashboard_model->get_jumlah_tanya_jawab();
            $data['jumlah_invoice'] = $this->dashboard_model->get_jumlah_invoice();
					

            $this->load->view('admin/dashboard', $data);
        } else {
            $data['msg'] = "";
            $this->load->view('admin/login', $data);
        }
    }

    // AUDIT TRAIL

    function audit_trail() {
        if (!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession']))) {
            redirect(base_url() . "restodepoadmin");
            exit;
        }

        $iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
        $_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "audittrail";

        if (!($this->dasarlib->apakahBolehMelakukan('AUDIT_TRAIL', 'lihat', $iduser))) {
            redirect(base_url('restodepoadmin'));
            exit;
        }


		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
		$data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
		$data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
		$data['footer'] = $this->load->view('admin/footer', NULL, TRUE);

        $this->load->view('admin/trail', $data);
    }

    function trail_list() {
        $hasil = $this->hakakses_model->getListTrail();
        echo $hasil;
    }
    

    //MAINTENANVE

    public function maintenance()
    {
        if (!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession']))) {
            redirect(base_url() . "restodepoadmin");
            exit;
        }

        $iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
        $_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "maintenance";

        if (!($this->dasarlib->apakahBolehMelakukan('MAINTENANCE', 'lihat', $iduser))) {
            redirect(base_url('restodepoadmin'));
            exit;
        }

        $maintenis = $this->dasar_model->getDetailOnField('maintenance', 'id', 1);
        $data['ismaintenance'] = $maintenis['ismaintenance'];


        $data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
        $data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
        $data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
        $data['footer'] = $this->load->view('admin/footer', NULL, TRUE);

        $this->load->view('admin/maintenance', $data);
    }

    public function set_maincenance_to()
    {
        $to = $this->input->get('nilai');

        $param['ismaintenance'] = $to;
        $pesan = "Set Aplikasi Sukses";
        $url = "";

        $bener = 1;

        if($this->dasar_model->updateData('maintenance',$param,'id',1))
        {
            $pesan = "Set Aplikasi Sukses";
            $bener = 1;
        }
        else
        {
            $pesan = "Set Aplikasi Gagal";
            $bener = 0;
        }

        echo "$bener|$pesan|$url";

    }


}

?>