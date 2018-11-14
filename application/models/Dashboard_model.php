<?php
class Dashboard_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }
	
	public function get_jumlah_member()
	{
		$sql = "select count(id_pembeli) as jml from pembeli where status <> 3";	
		$res = $this->db->query($sql);
		$row = $res->row_array();
		return $row['jml'];
	}


	public function get_jumlah_toko()
	{
		$sql = "select count(id_penjual) as jml from penjual where status <> 3";	
		$res = $this->db->query($sql);
		$row = $res->row_array();
		return $row['jml'];
	}

	public function get_jumlah_tanya_jawab()
	{
		$sql = "select count(idtj) as jml from tanya_jawab where id_root = 0";	
		$res = $this->db->query($sql);
		$row = $res->row_array();
		return $row['jml'];
	}

	
	public function get_jumlah_invoice()
	{
		$sql = "select count(id_invoice_master) as jml from invoice_master";	
		$res = $this->db->query($sql);
		$row = $res->row_array();
		return $row['jml'];
	}
	



}
?>