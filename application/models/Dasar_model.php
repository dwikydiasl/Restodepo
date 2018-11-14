<?php
class Dasar_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }
		
	
	//fungsi yang akan mengembalikan resultset format array, select semua yang ketarik oleh where nya
	function getDataOnTable($namatabel, $namafield, $isiwhere, $orderby)
	{
		if($isiwhere == "")
		{
			$sqlwhere = "";
		}
		else
		{
			$sqlwhere = "WHERE $isiwhere";
		}
		
		$sql = "select $namafield from $namatabel $sqlwhere order by $orderby";	
		$res = $this->db->query($sql);
		
		$result = $res->result_array();
		return $result;
	}	

	
	//fungsi yang akan mengembalikan row format array, hanya 1 row
	function getDetailOnField($namatabel, $namafield, $param)
	{
		$sql = "select * from $namatabel where $namafield = '$param'";	
		$res = $this->db->query($sql);
		$row = $res->row_array();
		return $row;
	}		
	
	
	// fungsi cek apakah sudah ada, digunakan untuk pas mau entry, kalo untuk pas edit, pakai fungsi berikutnya
	function cekDataOnTable($namatabel,$namafield, $param)
	{
		$sql = "select count($namafield) as jml from $namatabel where $namafield='$param'";	
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
	

	function cekDataOnTableForEdit($namatabel,$namafield, $param, $namafield2, $param2 )
	{
		$sql = "select count($namafield) as jml from $namatabel where $namafield='$param' and $namafield2 <> '$param2'";	
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

	
	// tambah atau insert data
	function insertData($namatabel,$param)
	{
		if($this->db->insert($namatabel, $param))
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	
	
	// hapus atau delete data
	function hapusData($namatabel,$namafield,$nilai)
	{
		if($this->db->delete($namatabel, array($namafield => $nilai)))
		{
			return 1;
		}
		else
		{
			return 0;
		}
		
	}
	
	
	// update data
	function updateData($namatabel,$param,$namafield,$nilai)
	{
		$this->db->where($namafield, $nilai);
		if($this->db->update($namatabel, $param))
		{
			return 1;
		}
		else
		{
			return 0;
		}		
	}
	
	
	// untuk ambil priviledge
	function getpriv($namaaksi,$userid,$idarea)
	{
	  	$sqlText = "select $namaaksi from user_privilege where idpengguna=$userid and idarea=$idarea";
		$res = $this->db->query($sqlText);
		$row = $res->row_array();		
	  	if(($row = $res->row_array()) && ($row[$namaaksi] == 1))
		{
			return true;
		}
		else
		{
			return false;
		}
	
	}
	

    // untuk memasukkan ke audit trail
    public function insertTrail($iduser, $username, $keterangan_trail) {
        $sql = "insert into trail(userid, username, postingdate, keterangan) values($iduser,'$username',NOW(),'$keterangan_trail')";
        $this->db->query($sql);
    }	

    public function apakahMaintenance()
    {
    	$sql = "select * from maintenance where id = 1";	
		$res = $this->db->query($sql);
		$row = $res->row_array();
		$ismaintenance = $row['ismaintenance'];
		return $ismaintenance;
    }

}
?>