<?php
class Hakakses_model extends CI_Model 
{
	
	function __construct()
    {
        parent::__construct();
    }
	
	public function getListAreaTugas()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$sqlText = "1 = 1";    
		
		$aColumns 	= array('a.id', 'a.kode', 'a.nama');
		
		/** PAGING */
		$sLimit = "";
		if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' ){
			//$sLimit = "LIMIT ". $_GET['iDisplayLength'] ." OFFSET ". $_GET['iDisplayStart'];
			$sLimit = "LIMIT ". $_GET['iDisplayStart'] .", ". $_GET['iDisplayLength'];
		}
		/** ORDERING */
		$sOrder = "";
		if ( isset( $_GET['iSortCol_0'] ) ){
			$sOrder = "ORDER BY  ";
			for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ ){
				if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" ){
					$sOrder .= $aColumns[ intval( $_GET['iSortCol_'.$i] ) ]."
						".$_GET['sSortDir_'.$i].", ";
				}
			}
			$sOrder = substr_replace( $sOrder, "", -2 );
			if ( $sOrder == "ORDER BY" ){
				$sOrder = "ORDER BY id asc";
			}
		}
		
		/** WHERE CLAUSA */	
		$sWhere = "WHERE $sqlText ";
		if ( isset($_GET['sSearch']) && $_GET['sSearch'] != "" ){
			$sWhere = " WHERE $sqlText AND (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ ){
				if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" ){
					$sWhere .= $aColumns[$i]." LIKE '%". $_GET['sSearch'] ."%' OR ";
				}
			}
			
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ")";
		}
		 
		/** INDIVIDUAL KOLOM FILTERING */
		for ( $i=0 ; $i<count($aColumns) ; $i++ ){
			if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != "" ){
				if ( $sWhere == "" ){
					$sWhere = " ";
				}
				else{
					$sWhere .= " AND ";
				}
				$sWhere .= $aColumns[$i]." LIKE '%".$_GET['sSearch_'.$i]."%' ";
			}
		}
		
		
		$sql 	= "SELECT ".str_replace(" , ", " ", implode(", ", $aColumns))."
				   FROM area_tugas a ".
				   $sWhere." ".
				   $sOrder." ".
				   $sLimit;
				   
		//var_dump($sql); exit;		   
		
		$res = $this->db->query($sql);
		
		$number		= 1;
		$row 		= array();
		
		
		foreach ($res->result_array() as $entry)
 		{
			$theid = $entry['id']; 
			$kode = $entry['kode'];
			$nama = $entry['nama'];
			$action = "";
			
			if($this->dasarlib->apakahBolehMelakukan('AREA_TUGAS','ubah',$iduser))
			{			
				$action	.= "<a href='".base_url()."backend/hakakses/edit_area_tugas?id=".$theid."' class='btn btn-xs btn-primary' title='Edit'><i class='fa fa-pencil-square-o'></i></a> &nbsp;";			
			}

			if($this->dasarlib->apakahBolehMelakukan('AREA_TUGAS','hapus',$iduser))
			{			
				$action	.= "<a href='".base_url()."backend/hakakses/delete_area_tugas?id=".$theid."' class='btn btn-xs btn-danger hapus' title='Delete'><i class='fa fa-times'></i></a> &nbsp;";			
			}
			
			$row[]	= array(($number + $_GET['iDisplayStart']), 
							 $kode,
							 $nama, 
							 $action
							);
			$number++;
		}
		/**	ROW COUNT */
		$sql2 = "select count(a.id) as jml from area_tugas a ".$sWhere;
		$res2 = $this->db->query($sql2);
		$row2 = $res2->row(); 
		
		$iTotal = $row2->jml;
						
		if ( $sWhere != "" ){
			$sQueryTotal = " SELECT count(a.id) as jml2
							 FROM area_tugas a ".
							 $sWhere;
			$res3 = $this->db->query($sQueryTotal);
			$row3 = $res3->row(); 
			$iFilteredTotal = $res3->row(); 
		}else{
			$iFilteredTotal = $iTotal;
		}
		$json	= json_encode(array("draw" => 1,
							  "iTotalRecords" => $iTotal,
							  "iTotalDisplayRecords" => $iFilteredTotal,
							  "aaData" => $row));
		//echo var_dump($json); exit;
		return $json;	
	}	
	
	public function getListDepartemen()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$sqlText = "1 = 1";    
		
		$aColumns 	= array('a.id', 'a.nama');
		
		/** PAGING */
		$sLimit = "";
		if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' ){
			//$sLimit = "LIMIT ". $_GET['iDisplayLength'] ." OFFSET ". $_GET['iDisplayStart'];
			$sLimit = "LIMIT ". $_GET['iDisplayStart'] .", ". $_GET['iDisplayLength'];
		}
		/** ORDERING */
		$sOrder = "";
		if ( isset( $_GET['iSortCol_0'] ) ){
			$sOrder = "ORDER BY  ";
			for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ ){
				if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" ){
					$sOrder .= $aColumns[ intval( $_GET['iSortCol_'.$i] ) ]."
						".$_GET['sSortDir_'.$i].", ";
				}
			}
			$sOrder = substr_replace( $sOrder, "", -2 );
			if ( $sOrder == "ORDER BY" ){
				$sOrder = "ORDER BY id asc";
			}
		}
		
		/** WHERE CLAUSA */	
		$sWhere = "WHERE $sqlText ";
		if ( isset($_GET['sSearch']) && $_GET['sSearch'] != "" ){
			$sWhere = " WHERE $sqlText AND (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ ){
				if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" ){
					$sWhere .= $aColumns[$i]." LIKE '%". $_GET['sSearch'] ."%' OR ";
				}
			}
			
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ")";
		}
		 
		/** INDIVIDUAL KOLOM FILTERING */
		for ( $i=0 ; $i<count($aColumns) ; $i++ ){
			if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != "" ){
				if ( $sWhere == "" ){
					$sWhere = " ";
				}
				else{
					$sWhere .= " AND ";
				}
				$sWhere .= $aColumns[$i]." LIKE '%".$_GET['sSearch_'.$i]."%' ";
			}
		}
		
		
		$sql 	= "SELECT ".str_replace(" , ", " ", implode(", ", $aColumns))."
				   FROM departemen a ".
				   $sWhere." ".
				   $sOrder." ".
				   $sLimit;
				   
		//var_dump($sql); exit;		   
		
		$res = $this->db->query($sql);
		
		$number		= 1;
		$row 		= array();
		
		
		foreach ($res->result_array() as $entry)
 		{
			$theid = $entry['id']; 
			$nama = $entry['nama'];
			$action = "";
			
			if($this->dasarlib->apakahBolehMelakukan('DEPARTEMEN','ubah',$iduser))
			{			
				$action	.= "<a href='".base_url()."backend/hakakses/edit_departemen?id=".$theid."' class='btn btn-xs btn-primary' title='Edit'><i class='fa fa-pencil-square-o'></i></a> &nbsp;";			
			}

			if($this->dasarlib->apakahBolehMelakukan('DEPARTEMEN','hapus',$iduser))
			{			
				$action	.= "<a href='".base_url()."backend/hakakses/delete_departemen?id=".$theid."' class='btn btn-xs btn-danger hapus' title='Delete'><i class='fa fa-times'></i></a> &nbsp;";			
			}
			
			$row[]	= array(($number + $_GET['iDisplayStart']), 
							 $nama, 
							 $action
							);
			$number++;
		}
		/**	ROW COUNT */
		$sql2 = "select count(a.id) as jml from departemen a ".$sWhere;
		$res2 = $this->db->query($sql2);
		$row2 = $res2->row(); 
		
		$iTotal = $row2->jml;
						
		if ( $sWhere != "" ){
			$sQueryTotal = " SELECT count(a.id) as jml2
							 FROM departemen a ".
							 $sWhere;
			$res3 = $this->db->query($sQueryTotal);
			$row3 = $res3->row(); 
			$iFilteredTotal = $res3->row(); 
		}else{
			$iFilteredTotal = $iTotal;
		}
		$json	= json_encode(array("draw" => 1,
							  "iTotalRecords" => $iTotal,
							  "iTotalDisplayRecords" => $iFilteredTotal,
							  "aaData" => $row));
		//echo var_dump($json); exit;
		return $json;	
	}	

	public function getListJabatan()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$sqlText = "1 = 1";    
		
		$aColumns 	= array('a.id', 'a.nama');
		
		/** PAGING */
		$sLimit = "";
		if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' ){
			//$sLimit = "LIMIT ". $_GET['iDisplayLength'] ." OFFSET ". $_GET['iDisplayStart'];
			$sLimit = "LIMIT ". $_GET['iDisplayStart'] .", ". $_GET['iDisplayLength'];
		}
		/** ORDERING */
		$sOrder = "";
		if ( isset( $_GET['iSortCol_0'] ) ){
			$sOrder = "ORDER BY  ";
			for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ ){
				if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" ){
					$sOrder .= $aColumns[ intval( $_GET['iSortCol_'.$i] ) ]."
						".$_GET['sSortDir_'.$i].", ";
				}
			}
			$sOrder = substr_replace( $sOrder, "", -2 );
			if ( $sOrder == "ORDER BY" ){
				$sOrder = "ORDER BY id asc";
			}
		}
		
		/** WHERE CLAUSA */	
		$sWhere = "WHERE $sqlText ";
		if ( isset($_GET['sSearch']) && $_GET['sSearch'] != "" ){
			$sWhere = " WHERE $sqlText AND (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ ){
				if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" ){
					$sWhere .= $aColumns[$i]." LIKE '%". $_GET['sSearch'] ."%' OR ";
				}
			}
			
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ")";
		}
		 
		/** INDIVIDUAL KOLOM FILTERING */
		for ( $i=0 ; $i<count($aColumns) ; $i++ ){
			if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != "" ){
				if ( $sWhere == "" ){
					$sWhere = " ";
				}
				else{
					$sWhere .= " AND ";
				}
				$sWhere .= $aColumns[$i]." LIKE '%".$_GET['sSearch_'.$i]."%' ";
			}
		}
		
		
		$sql 	= "SELECT ".str_replace(" , ", " ", implode(", ", $aColumns))."
				   FROM jabatan a ".
				   $sWhere." ".
				   $sOrder." ".
				   $sLimit;
				   
		//var_dump($sql); exit;		   
		
		$res = $this->db->query($sql);
		
		$number		= 1;
		$row 		= array();
		
		
		foreach ($res->result_array() as $entry)
 		{
			$theid = $entry['id']; 
			$nama = $entry['nama'];
			$action = "";
			
			if($this->dasarlib->apakahBolehMelakukan('JABATAN','ubah',$iduser))
			{			
				$action	.= "<a href='".base_url()."backend/hakakses/edit_jabatan?id=".$theid."' class='btn btn-xs btn-primary' title='Edit'><i class='fa fa-pencil-square-o'></i></a> &nbsp;";			
			}

			if($this->dasarlib->apakahBolehMelakukan('JABATAN','hapus',$iduser))
			{			
				$action	.= "<a href='".base_url()."backend/hakakses/delete_jabatan?id=".$theid."' class='btn btn-xs btn-danger hapus' title='Delete'><i class='fa fa-times'></i></a> &nbsp;";			
			}
			
			$row[]	= array(($number + $_GET['iDisplayStart']), 
							 $nama, 
							 $action
							);
			$number++;
		}
		/**	ROW COUNT */
		$sql2 = "select count(a.id) as jml from jabatan a ".$sWhere;
		$res2 = $this->db->query($sql2);
		$row2 = $res2->row(); 
		
		$iTotal = $row2->jml;
						
		if ( $sWhere != "" ){
			$sQueryTotal = " SELECT count(a.id) as jml2
							 FROM jabatan a ".
							 $sWhere;
			$res3 = $this->db->query($sQueryTotal);
			$row3 = $res3->row(); 
			$iFilteredTotal = $res3->row(); 
		}else{
			$iFilteredTotal = $iTotal;
		}
		$json	= json_encode(array("draw" => 1,
							  "iTotalRecords" => $iTotal,
							  "iTotalDisplayRecords" => $iFilteredTotal,
							  "aaData" => $row));
		//echo var_dump($json); exit;
		return $json;	
	}	
	
	public function insertDefaultHakAkses($idjabatan,$idarea,$isilihat,$isitambah,$isiubah,$isihapus,$isiprovide,$isiapprove,$isirelease)
	{
		$sqlText = "insert into def_privilege(idjabatan,idarea,lihat,tambah,ubah,hapus,isprovide,isapprove,isrelease) values($idjabatan,$idarea,$isilihat,$isitambah,$isiubah,$isihapus,$isiprovide,$isiapprove,$isirelease)";
		$this->db->query($sqlText);
	}
	
	public function cekHakAksesDefaultJabatan($idarea,$namaaksi,$idjabatan)
	{
		$boleh = false;
		$sqlText = "select $namaaksi from def_privilege where idjabatan=$idjabatan and idarea=$idarea";
		$res = $this->db->query($sqlText);
		$row = $res->row_array();
		
		if($row[$namaaksi] == 1)
		{
			$boleh = true;
		}
		return $boleh;
	}
	
	public function updateDefaultHakAkses($idjabatan,$idarea,$isilihat,$isitambah,$isiubah,$isihapus,$isiprovide,$isiapprove,$isirelease)
	{
		//cek dulu, jika ada maka update, jika tidak ada maka insert
		$sql3 = "select count(id) as jml from def_privilege where idjabatan=$idjabatan and idarea=$idarea";
		$result = $this->db->query($sql3);
		$row = $result->row_array();
		$jml = $row['jml'];
		if($jml > 0)
		{
			$sqlText = "update def_privilege set lihat=$isilihat, tambah=$isitambah, ubah=$isiubah, hapus=$isihapus, isprovide=$isiprovide, isapprove=$isiapprove, isrelease=$isirelease where idjabatan=$idjabatan and idarea=$idarea";
		}
		else
		{
			$sqlText = "insert into def_privilege(idjabatan, idarea, lihat, tambah, ubah, hapus, isprovide, isapprove, isrelease) values($idjabatan, $idarea, $isilihat, $isitambah, $isiubah, $isihapus, $isiprovide, $isiapprove, $isirelease)";
		}
		$this->db->query($sqlText);
	}	
	
	public function hapusJabatan($id)
	{
		$bener = 0;
		$this->db->trans_begin();
		
		$this->db->query('delete from jabatan where id='.$id);
		$this->db->query('delete from def_privilege where idjabatan='.$id);
		
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			$bener = 0;
		}
		else
		{
			$this->db->trans_commit();
			$bener = 1;
		}	
		return $bener;
	}	
	
	
	// PENGGUNA
	
	public function getListPengguna()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$sqlText = "1 = 1";    
		
		$aColumns 	= array('a.id', 'a.username', 'a.departemen', 'a.jabatan', 'a.nama');
		
		/** PAGING */
		$sLimit = "";
		if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' ){
			//$sLimit = "LIMIT ". $_GET['iDisplayLength'] ." OFFSET ". $_GET['iDisplayStart'];
			$sLimit = "LIMIT ". $_GET['iDisplayStart'] .", ". $_GET['iDisplayLength'];
		}
		/** ORDERING */
		$sOrder = "";
		if ( isset( $_GET['iSortCol_0'] ) ){
			$sOrder = "ORDER BY  ";
			for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ ){
				if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" ){
					$sOrder .= $aColumns[ intval( $_GET['iSortCol_'.$i] ) ]."
						".$_GET['sSortDir_'.$i].", ";
				}
			}
			$sOrder = substr_replace( $sOrder, "", -2 );
			if ( $sOrder == "ORDER BY" ){
				$sOrder = "ORDER BY id asc";
			}
		}
		
		/** WHERE CLAUSA */	
		$sWhere = "WHERE $sqlText ";
		if ( isset($_GET['sSearch']) && $_GET['sSearch'] != "" ){
			$sWhere = " WHERE $sqlText AND (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ ){
				if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" ){
					$sWhere .= $aColumns[$i]." LIKE '%". $_GET['sSearch'] ."%' OR ";
				}
			}
			
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ")";
		}
		 
		/** INDIVIDUAL KOLOM FILTERING */
		for ( $i=0 ; $i<count($aColumns) ; $i++ ){
			if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != "" ){
				if ( $sWhere == "" ){
					$sWhere = " ";
				}
				else{
					$sWhere .= " AND ";
				}
				$sWhere .= $aColumns[$i]." LIKE '%".$_GET['sSearch_'.$i]."%' ";
			}
		}
		
		
		$sql 	= "SELECT ".str_replace(" , ", " ", implode(", ", $aColumns))."
				   FROM pengguna a ".
				   $sWhere." ".
				   $sOrder." ".
				   $sLimit;
				   
		//var_dump($sql); exit;		   
		
		$res = $this->db->query($sql);
		
		$number		= 1;
		$row 		= array();
		
		
		foreach ($res->result_array() as $entry)
 		{

			$theid = $entry['id']; 
			$nama = $entry['nama'];
			$action = "";
			$iddept = $entry['departemen'];
			$idjabatan = $entry['jabatan'];
			
			$sqlText = "select * from departemen where id=$iddept";
			$res = $this->db->query($sqlText);
			$detail_departemen = $res->row_array();
			$namaDepartemen = stripslashes($detail_departemen['nama']);

			$sqlText2 = "select * from jabatan where id=$idjabatan";
			$res2 = $this->db->query($sqlText2);
			$detail_jabatan = $res2->row_array();
			$namaJabatan = stripslashes($detail_jabatan['nama']);			
			
			
			if($this->dasarlib->apakahBolehMelakukan('PENGGUNA','ubah',$iduser))
			{			
				$action	.= "<a href='".base_url()."backend/hakakses/edit_pengguna?id=".$theid."' class='btn btn-xs btn-primary' title='Edit'><i class='fa fa-pencil-square-o'></i></a> &nbsp;";			
			}

			if($this->dasarlib->apakahBolehMelakukan('PENGGUNA','hapus',$iduser))
			{			
				$action	.= "<a href='".base_url()."backend/hakakses/delete_pengguna?id=".$theid."' class='btn btn-xs btn-danger hapus' title='Delete'><i class='fa fa-times'></i></a> &nbsp;";			
			}
			
			$row[]	= array(($number + $_GET['iDisplayStart']), 
							 $entry['nama'], 
							 $entry['username'],
							 $namaDepartemen,
							 $namaJabatan, 
							 $action
							);
			$number++;
		}
		/**	ROW COUNT */
		$sql2 = "select count(a.id) as jml from pengguna a ".$sWhere;
		$res2 = $this->db->query($sql2);
		$row2 = $res2->row(); 
		
		$iTotal = $row2->jml;
						
		if ( $sWhere != "" ){
			$sQueryTotal = " SELECT count(a.id) as jml2
							 FROM pengguna a ".
							 $sWhere;
			$res3 = $this->db->query($sQueryTotal);
			$row3 = $res3->row(); 
			$iFilteredTotal = $res3->row(); 
		}else{
			$iFilteredTotal = $iTotal;
		}
		$json	= json_encode(array("draw" => 1,
							  "iTotalRecords" => $iTotal,
							  "iTotalDisplayRecords" => $iFilteredTotal,
							  "aaData" => $row));
		//echo var_dump($json); exit;
		return $json;	
	}	
	
	public function insertPengguna($kedb)
	{
		$username = $kedb['username'];
		$password = md5($kedb['password']);
		$departemen = $kedb['departemen'];
		$jabatan = $kedb['jabatan'];
		$nama = $kedb['nama'];
		$email = $kedb['email'];
		$isactive = $kedb['isactive'];
		
		$bener = 0;
		$this->db->trans_begin();
		
		$sql2 = "insert into pengguna(username, password, departemen, jabatan, nama, email, isactive) values('$username', '$password', $departemen, $jabatan, '$nama', '$email', $isactive)";
		
		$this->db->query($sql2);
		
		//ambil id username yang barusan
		$sqlText = "select * from pengguna where username='$username' and nama='$nama'";
		$res = $this->db->query($sqlText);
		$row = $res->row_array();
		$idpengguna = $row['id'];
		
		// ambil def_privilege dari jabatan ini, kemudian masukkan ke tabel user_privilege
		$sqlText2 = "select * from def_privilege where idjabatan=$jabatan order by idarea";
		$res2 = $this->db->query($sqlText2);
		$result2 = $res2->result_array();
		foreach($result2 as $row2)
		{
			$idarea = $row2['idarea'];
			$lihat = $row2['lihat'];
			$tambah = $row2['tambah'];
			$ubah = $row2['ubah'];
			$hapus = $row2['hapus'];
			$isprovide = $row2['isprovide'];
			$isapprove = $row2['isapprove'];
			$isrelease = $row2['isrelease'];
			
			$sql3 = "insert into user_privilege(idpengguna, idarea, lihat, tambah, ubah, hapus, isprovide, isapprove, isrelease) values($idpengguna, $idarea, $lihat, $tambah, $ubah, $hapus, $isprovide, $isapprove, $isrelease)";
			$this->db->query($sql3);			
		}		
		
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			$bener = 0;
		}
		else
		{
			$this->db->trans_commit();
			$bener = 1;
		}	
		return $bener;
	}	

	public function cekHakAksesUser($idarea,$namaaksi,$idpengguna)
	{
		$boleh = false;
		$sqlText = "select $namaaksi from user_privilege where idpengguna=$idpengguna and idarea=$idarea";
		$res = $this->db->query($sqlText);
		$row = $res->row_array();
		if($row[$namaaksi] == 1)
		{
			$boleh = true;
		}
		return $boleh;		
	}

	public function updateHakAksesUser($idpengguna,$idarea,$isilihat,$isitambah,$isiubah,$isihapus,$isiprovide,$isiapprove,$isirelease)
	{
		//cek dulu, jika ada maka update, jika tidak ada maka insert
		$sql3 = "select count(id) as jml from user_privilege where idpengguna=$idpengguna and idarea=$idarea";
		$result = $this->db->query($sql3);
		$row = $result->row_array();
		$jml = $row['jml'];
		if($jml > 0)
		{
			$sqlText = "update user_privilege set lihat=$isilihat, tambah=$isitambah, ubah=$isiubah, hapus=$isihapus, isprovide=$isiprovide, isapprove=$isiapprove, isrelease=$isirelease where idpengguna=$idpengguna and idarea=$idarea";
		}
		else
		{
		$sqlText = "insert into user_privilege(idpengguna, idarea, lihat, tambah, ubah, hapus, isprovide, isapprove, isrelease) values($idpengguna, $idarea, $isilihat,$isitambah,$isiubah,$isihapus,$isiprovide,$isiapprove,$isirelease)";
		}
		$this->db->query($sqlText);
	}

	public function hapusPengguna($id)
	{
		$bener = 0;
		$this->db->trans_begin();
		
		$this->db->query('delete from pengguna where id='.$id);
		$this->db->query('delete from user_privilege where idpengguna='.$id);
		
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			$bener = 0;
		}
		else
		{
			$this->db->trans_commit();
			$bener = 1;
		}	
		return $bener;
	}	
	
	public function hapusAreaTugas($id)
	{
		$bener = 0;
		$this->db->trans_begin();
		
		$this->db->query('delete from area_tugas where id='.$id);
		$this->db->query('delete from user_privilege where idarea='.$id);
		$this->db->query('delete from def_privilege where idarea='.$id);
		
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			$bener = 0;
		}
		else
		{
			$this->db->trans_commit();
			$bener = 1;
		}	
		return $bener;
	}	

	function getListTrail()
	{
		$sqlText = "1 = 1";    
		
		$aColumns 	= array('a.id', 'a.username', 'a.postingdate', 'a.keterangan');
		
		/** PAGING */
		$sLimit = "";
		if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' ){
			//$sLimit = "LIMIT ". $_GET['iDisplayLength'] ." OFFSET ". $_GET['iDisplayStart'];
			$sLimit = "LIMIT ". $_GET['iDisplayStart'] .", ". $_GET['iDisplayLength'];
		}
		/** ORDERING */
		$sOrder = "ORDER BY a.id desc";
		if ( isset( $_GET['iSortCol_0'] ) ){
			$sOrder = "ORDER BY  ";
			for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ ){
				if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" ){
					$sOrder .= $aColumns[ intval( $_GET['iSortCol_'.$i] ) ]."
						".$_GET['sSortDir_'.$i].", ";
				}
			}
			$sOrder = substr_replace( $sOrder, "", -2 );
			if ( $sOrder == "ORDER BY" ){
				$sOrder = "ORDER BY a.id desc";
			}
		}
		
		/** WHERE CLAUSA */	
		$sWhere = "WHERE $sqlText ";
		if ( isset($_GET['sSearch']) && $_GET['sSearch'] != "" ){
			$sWhere = " WHERE $sqlText AND (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ ){
				if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" ){
					$sWhere .= $aColumns[$i]." LIKE '%". $_GET['sSearch'] ."%' OR ";
				}
			}
			
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ")";
		}
		 
		/** INDIVIDUAL KOLOM FILTERING */
		for ( $i=0 ; $i<count($aColumns) ; $i++ ){
			if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != "" ){
				if ( $sWhere == "" ){
					$sWhere = " ";
				}
				else{
					$sWhere .= " AND ";
				}
				$sWhere .= $aColumns[$i]." LIKE '%".$_GET['sSearch_'.$i]."%' ";
			}
		}
		
		
		$sql 	= "SELECT ".str_replace(" , ", " ", implode(", ", $aColumns))."
				   FROM trail a ".
				   $sWhere." ".
				   $sOrder." ".
				   $sLimit;
				   
		//var_dump($sql); exit;		   
		
		$res = $this->db->query($sql);
		
		$number		= 1;
		$row 		= array();
		
		
		foreach ($res->result_array() as $entry)
 		{
			$theid = $entry['id']; 
			$username = $entry['username'];
			$postingdate = $entry['postingdate'];
			$keterangan = $entry['keterangan'];
			
			$texposting = $this->dasarlib->ubahTanggalPanjang($postingdate); 
			
			$row[]	= array(($number + $_GET['iDisplayStart']), 
							 $username,
							 $texposting, 
							 $keterangan
							);
			$number++;
		}
		/**	ROW COUNT */
		$sql2 = "select count(a.id) as jml from trail a ".$sWhere;;
		$res2 = $this->db->query($sql2);
		$row2 = $res2->row(); 
		
		$iTotal = $row2->jml;
						
		if ( $sWhere != "" ){
			$sQueryTotal = " SELECT count(a.id) as jml2 FROM trail a ".$sWhere;
			$res3 = $this->db->query($sQueryTotal);
			$row3 = $res3->row(); 
			$iFilteredTotal = $res3->row(); 
		}else{
			$iFilteredTotal = $iTotal;
		}
		$json	= json_encode(array("draw" => 1,
							  "iTotalRecords" => $iTotal,
							  "iTotalDisplayRecords" => $iFilteredTotal,
							  "aaData" => $row));
		//echo var_dump($json); exit;
		return $json;	
	}	
	


}
?>