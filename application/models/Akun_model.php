<?php
	class Akun_model extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }

	public function cekLoginpenjual($username,$password)
	{
		$pxx = md5($password);
		$sql = "select count(id_penjual) as jml from penjual where username='$username' and password='$pxx' and is_active=1 and status=1";	
		$res = $this->db->query($sql);
		$row = $res->row_array();		
		$jml = $row['jml'];
		if($jml > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function cekLoginpembeli($username,$password)
	{
		$pxx = md5($password);
		$sql = "select count(id_pembeli) as jml from pembeli where username='$username' and password='$pxx' and status=1";	
		$res = $this->db->query($sql);
		$row = $res->row_array();		
		$jml = $row['jml'];
		if($jml > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
    

}
?>