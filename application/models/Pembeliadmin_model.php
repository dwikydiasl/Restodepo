<?php
class Pembeliadmin_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }
	
    public function get_list_pembeli()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$sqlText = "a.id_kota = b.id";    

		$aColumns 	= array('a.id_pembeli', 'a.nama', 'a.username', 'a.status', 'a.phone', 'b.namakab');
		
		/** PAGING */
		$sLimit = "";
		if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' ){
			//$sLimit = "LIMIT ". $_GET['iDisplayLength'] ." OFFSET ". $_GET['iDisplayStart'];
			$sLimit = "LIMIT ". $_GET['iDisplayStart'] .", ". $_GET['iDisplayLength'];
		}
		/** ORDERING */
		$sOrder = "ORDER BY a.nama asc";
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
				$sOrder = "ORDER BY a.nama asc";
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
				   FROM pembeli a, master_wilayah b ".
				   $sWhere." ".
				   $sOrder." ".
				   $sLimit;
				   
		//var_dump($sql); exit;		   
		
		$res = $this->db->query($sql);
		
		$number		= 1;
		$row 		= array();
		
		
		foreach ($res->result_array() as $entry)
 		{
			$theid = $entry['id_pembeli']; 
			$email = $entry['username'];
			$nama = $entry['nama'];
			$phone = $entry['phone'];
			$namakab = $entry['namakab'];

			if($entry['status'] == 0)
			{
				$status = "Baru";
			}
			elseif($entry['status'] == 1)
			{
				$status = "Aktif";
			}
			elseif($entry['status'] == 2)
			{
				$status = "Suspend";
			}
			else
			{
				$status = "Hapus";
			}
			

			$action ="";
			
			if($this->dasarlib->apakahBolehMelakukan('PEMBELI','ubah',$iduser))
			{			
				$action	.= "<a href='".base_url()."backend/pembeli/edit_pembeli?id=".$theid."' class='btn btn-xs btn-primary' title='Edit'><i class='fa fa-pencil-square-o'></i></a> &nbsp;";			
			}

			if($this->dasarlib->apakahBolehMelakukan('PEMBELI','hapus',$iduser))
			{			
				$action	.= "<a href='".base_url()."backend/pembeli/delete_pembeli?id=".$theid."' class='btn btn-xs btn-danger hapus' title='Delete'><i class='fa fa-times'></i></a> &nbsp;";			
			}
			
			$row[]	= array(($number + $_GET['iDisplayStart']), 
							 $nama,
							 $email,
							 $phone,
							 $namakab,
							 $status, 
							 $action
							);
			$number++;
		}
		/**	ROW COUNT */
		$sql2 = "select count(a.id_pembeli) as jml from pembeli a, master_wilayah b ".$sWhere;
		$res2 = $this->db->query($sql2);
		$row2 = $res2->row(); 
		
		$iTotal = $row2->jml;
						
		if ( $sWhere != "" ){
			$sQueryTotal = " SELECT count(a.id_pembeli) as jml2 FROM pembeli a, master_wilayah b ".$sWhere;
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


	function getListKota()
	{
		$rowx = array();
		$sql = "select id,namakab from master_wilayah where id > 0 order by namakab";	
		$res = $this->db->query($sql);
		$res2 = $res->result_array();
		foreach($res2 as $row2)
		{
			$id = $row2['id'];
			$namakab = $row2['namakab'];
			$rowx[]	= array("id" => $id, "namakab" => $namakab);
		}
		
		return $rowx;
	}		


}
?>