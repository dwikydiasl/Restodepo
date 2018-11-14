<?php
class Transaksiadmin_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }
	
    public function get_list_tanya_jawab_root()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$sqlText = "a.id_pembeli = b.id_pembeli AND a.id_penjual=c.id_penjual AND a.id_item=d.id_item AND a.id_root=0";    

		$aColumns 	= array('a.*', 'b.nama as nama_pembeli', 'c.nama_toko', 'd.nama as nama_produk');
		
		/** PAGING */
		$sLimit = "";
		if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' ){
			//$sLimit = "LIMIT ". $_GET['iDisplayLength'] ." OFFSET ". $_GET['iDisplayStart'];
			$sLimit = "LIMIT ". $_GET['iDisplayStart'] .", ". $_GET['iDisplayLength'];
		}
		/** ORDERING */
		$sOrder = "ORDER BY a.idtj desc";
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
				$sOrder = "ORDER BY a.idtj desc";
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
				   FROM tanya_jawab a, pembeli b, penjual c, item_produk d ".
				   $sWhere." ".
				   $sOrder." ".
				   $sLimit;
				   
		//var_dump($sql); exit;		   
		
		$res = $this->db->query($sql);
		
		$number		= 1;
		$row 		= array();
		
		
		foreach ($res->result_array() as $entry)
 		{
			$theid = $entry['idtj']; 
			$nama_pembeli = $entry['nama_pembeli'];
			$nama_toko = $entry['nama_toko'];
			$nama_produk = $entry['nama_produk'];
			$tanggal = $this->dasarlib->ubahTanggalPanjang3($entry['posting_date']);


			$action ="";
			
			if($this->dasarlib->apakahBolehMelakukan('TRANSAKSI','ubah',$iduser))
			{			
				$action	.= "<a href='".base_url()."backend/transaksi/view_tanya_jawab?id=".$theid."' class='btn btn-xs btn-success' title='View' data-toggle='lightbox' data-title='".$nama_produk."'><i class='fa fa-eye'></i></a> &nbsp;";			
			}

			
			$row[]	= array(($number + $_GET['iDisplayStart']), 
							 $nama_pembeli,
							 $nama_toko,
							 $nama_produk,
							 $tanggal,
							 $action
							);
			$number++;
		}
		/**	ROW COUNT */
		$sql2 = "select count(a.idtj) as jml from tanya_jawab a, pembeli b, penjual c, item_produk d ".$sWhere;
		$res2 = $this->db->query($sql2);
		$row2 = $res2->row(); 
		
		$iTotal = $row2->jml;
						
		if ( $sWhere != "" ){
			$sQueryTotal = " SELECT count(a.idtj) as jml2 FROM tanya_jawab a, pembeli b, penjual c, item_produk d ".$sWhere;
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

	public function get_detail_tanya_jawab($idroot)
	{
		$rowx = array();
		// ambil row root nya
		$sql = "select a.konten, a.posting_date, b.nama as nama_poster from tanya_jawab a, pembeli b WHERE a.idtj=$idroot AND a.id_pembeli = b.id_pembeli";	
		$query = $this->db->query($sql);
		$row = $query->row_array();
		$konten = $row['konten'];
		$nama_poster = $row['nama_poster']; 
		$waktu = $this->dasarlib->ubahTanggalPanjang3($row['posting_date']);
		$rowx[]	= array("nama" => $nama_poster, "waktu" => $waktu, "konten" => $konten, "poster" => 1);

		//ambil rows anak2nya

		$sql2 = "select a.konten, a.posting_date, a.poster, b.nama as nama_pembeli, c.nama_toko from tanya_jawab a, pembeli b, penjual c WHERE a.id_root=$idroot AND a.id_pembeli = b.id_pembeli AND a.id_penjual=c.id_penjual";	
		$res = $this->db->query($sql2);
		$res2 = $res->result_array();
		foreach($res2 as $row2)
		{
			$konten2 = $row2['konten'];
			$poster = $row2['poster'];
			if($poster == 1)
			{
				$pengirim = $row2['nama_pembeli'];
			}
			else
			{
				$pengirim = $row2['nama_toko'];
			}

			$waktu2 = $this->dasarlib->ubahTanggalPanjang3($row2['posting_date']);
			$rowx[]	= array("nama" => $pengirim, "waktu" => $waktu2, "konten" => $konten2,"poster" => $poster);
		}
		
		return $rowx;
	}

    public function get_list_invoice()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$sqlText = "a.id_penjual=c.id_penjual AND a.id_pembeli = b.id_pembeli";    

		$aColumns 	= array('a.id_invoice_master','a.nomor_invoice', 'a.total_tagihan', 'a.posting_date', 'a.status', 'b.nama as nama_pembeli', 'c.nama_toko');
		
		/** PAGING */
		$sLimit = "";
		if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' ){
			//$sLimit = "LIMIT ". $_GET['iDisplayLength'] ." OFFSET ". $_GET['iDisplayStart'];
			$sLimit = "LIMIT ". $_GET['iDisplayStart'] .", ". $_GET['iDisplayLength'];
		}
		/** ORDERING */
		$sOrder = "ORDER BY a.id_invoice_master desc";
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
				$sOrder = "ORDER BY a.id_invoice_master desc";
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
				   FROM invoice_master a, pembeli b, penjual c ".
				   $sWhere." ".
				   $sOrder." ".
				   $sLimit;
				   
		//var_dump($sql); exit;		   
		
		$res = $this->db->query($sql);
		
		$number		= 1;
		$row 		= array();
		
		
		foreach ($res->result_array() as $entry)
 		{
			$theid = $entry['id_invoice_master']; 
			$nama_pembeli = $entry['nama_pembeli'];
			$nama_toko = $entry['nama_toko'];
			$nomor_invoice = $entry['nomor_invoice'];
			$total_tagihan = number_format($entry['total_tagihan'],0,',','.');
			$tanggal = $this->dasarlib->ubahTanggalPanjang3($entry['posting_date']);
			$status = $entry['status'];
			if($status == 0)
			{
				$texstatus = "Baru";
			}
			elseif($status == 1)
			{
				$texstatus = "Konfirmasi";
			}
			elseif($status == 2)
			{
				$texstatus = "Terbayar";
			}
			elseif($status == 3)
			{
				$texstatus = "Tertransfer";
			}
			else
			{
				$texstatus = "Unknown Status";
			}



			$action ="";
			
			if($this->dasarlib->apakahBolehMelakukan('TRANSAKSI','ubah',$iduser))
			{			
				$action	.= "<a href='".base_url()."backend/transaksi/view_invoice?id=".$theid."' class='btn btn-xs btn-success' title='View' data-toggle='lightbox' data-title='Invoice ".$nomor_invoice."'><i class='fa fa-eye'></i></a> &nbsp;";			
			}

			
			$row[]	= array(($number + $_GET['iDisplayStart']), 
							 $nama_toko,
							 $nama_pembeli,
							 $nomor_invoice,
							 $total_tagihan,
							 $texstatus,
							 $tanggal,
							 $action
							);
			$number++;
		}
		/**	ROW COUNT */
		$sql2 = "select count(a.id_invoice_master) as jml from invoice_master a, pembeli b, penjual c ".$sWhere;
		$res2 = $this->db->query($sql2);
		$row2 = $res2->row(); 
		
		$iTotal = $row2->jml;
						
		if ( $sWhere != "" ){
			$sQueryTotal = " SELECT count(a.id_invoice_master) as jml2 FROM invoice_master a, pembeli b, penjual c ".$sWhere;
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

	public function get_detail_invoice_on_idmaster($idmaster)
	{
		$sql = "SELECT aa.*, bb.nama as nama_item FROM invoice_detail aa, item_produk bb WHERE aa.id_invoice_master = $idmaster AND aa.id_item = bb.id_item";	
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
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