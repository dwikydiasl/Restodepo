<?php
class Settingadmin_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }
	
    public function get_list_bank_kami()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$sqlText = "a.kode_bank = b.kode AND a.ishapus=0";    

		$aColumns 	= array('a.*', 'b.nama as nama_bank');
		
		/** PAGING */
		$sLimit = "";
		if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' ){
			//$sLimit = "LIMIT ". $_GET['iDisplayLength'] ." OFFSET ". $_GET['iDisplayStart'];
			$sLimit = "LIMIT ". $_GET['iDisplayStart'] .", ". $_GET['iDisplayLength'];
		}
		/** ORDERING */
		$sOrder = "ORDER BY a.id asc";
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
				$sOrder = "ORDER BY a.id asc";
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
				   FROM bank_kami a, bank_list b ".
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
			$nama_bank = $entry['nama_bank'];
			$norek = $entry['norek'];
			$atas_nama = $entry['atas_nama'];

            $action ="";
			
			if($this->dasarlib->apakahBolehMelakukan('SETTING','ubah',$iduser))
			{			
				$action	.= "<a href='".base_url()."backend/setting/edit_bank_kami?id=".$theid."' class='btn btn-xs btn-primary' title='Edit'><i class='fa fa-pencil-square-o'></i></a> &nbsp;";			
			}

			if($this->dasarlib->apakahBolehMelakukan('SETTING','hapus',$iduser))
			{			
				$action	.= "<a href='".base_url()."backend/setting/delete_bank_kami?id=".$theid."' class='btn btn-xs btn-danger hapus' title='Delete'><i class='fa fa-times'></i></a> &nbsp;";			
			}
			
			$row[]	= array(($number + $_GET['iDisplayStart']), 
							 $nama_bank,
							 $norek,
							 $atas_nama,
							 $action
							);
			$number++;
		}
		/**	ROW COUNT */
		$sql2 = "select count(a.id) as jml from bank_kami a, bank_list b ".$sWhere;
		$res2 = $this->db->query($sql2);
		$row2 = $res2->row(); 
		
		$iTotal = $row2->jml;
						
		if ( $sWhere != "" ){
			$sQueryTotal = " SELECT count(a.id) as jml2 FROM bank_kami a, bank_list b ".$sWhere;
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

    public function getListBank()
	{
		$sql = "select * from bank_list order by nama";	
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}	

	public function get_list_admin_fee()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$sqlText = "1=1";    

		$aColumns 	= array('a.*');
		
		/** PAGING */
		$sLimit = "";
		if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' ){
			//$sLimit = "LIMIT ". $_GET['iDisplayLength'] ." OFFSET ". $_GET['iDisplayStart'];
			$sLimit = "LIMIT ". $_GET['iDisplayStart'] .", ". $_GET['iDisplayLength'];
		}
		/** ORDERING */
		$sOrder = "ORDER BY a.batas_bawah asc";
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
				$sOrder = "ORDER BY a.batas_bawah asc";
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
				   FROM admin_fee a ".
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
			$batas_bawah = number_format($entry['batas_bawah'],0,',','.');
			$batas_atas = number_format($entry['batas_atas'],0,',','.');
			$fee = number_format($entry['fee'],0,',','.');

            $action ="";
			
			if($this->dasarlib->apakahBolehMelakukan('SETTING','ubah',$iduser))
			{			
				$action	.= "<a href='".base_url()."backend/setting/edit_admin_fee?id=".$theid."' class='btn btn-xs btn-primary' title='Edit' data-toggle='lightbox' data-title='Edit Admin Fee'><i class='fa fa-pencil-square-o'></i></a> &nbsp;";			
			}

			if($this->dasarlib->apakahBolehMelakukan('SETTING','hapus',$iduser))
			{			
				$action	.= "<a href='".base_url()."backend/setting/delete_admin_fee?id=".$theid."' class='btn btn-xs btn-danger hapus' title='Delete'><i class='fa fa-times'></i></a> &nbsp;";			
			}
			
			$row[]	= array(($number + $_GET['iDisplayStart']), 
							 $batas_bawah,
							 $batas_atas,
							 $fee,
							 $action
							);
			$number++;
		}
		/**	ROW COUNT */
		$sql2 = "select count(a.id) as jml from admin_fee a ".$sWhere;
		$res2 = $this->db->query($sql2);
		$row2 = $res2->row(); 
		
		$iTotal = $row2->jml;
						
		if ( $sWhere != "" ){
			$sQueryTotal = " SELECT count(a.id) as jml2 FROM admin_fee a ".$sWhere;
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