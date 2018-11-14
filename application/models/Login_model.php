<?php
class Login_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }
	
	public function cekLogin($username,$password)
	{
		$pxx = md5($password);
		$sql = "select count(id) as jml from pengguna where username='$username' and password='$pxx' and isactive=1";	
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
	
	public function getDetailUser($username)
	{
		$sql = "select * from pengguna where username='$username'";	
		$res = $this->db->query($sql);
		$row = $res->row_array();
		return $row;
	}	
	
	public function getDetailUserOnID($id)
	{
		$sql = "select * from pengguna where id=$id";	
		$res = $this->db->query($sql);
		$row = $res->row_array();
		return $row;
	}	
	
	public function updateUserPassword($idnya,$pxnew)
	{
		$sql = "update pengguna set password='$pxnew' where id=$idnya";	
		$this->db->query($sql);
	}	





}
?>