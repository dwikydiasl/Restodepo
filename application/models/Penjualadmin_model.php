<?php
class Penjualadmin_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }
	
    public function get_list_penjual()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$sqlText = "a.id_kota = b.id";    

		$aColumns 	= array('a.id_penjual', 'a.nama', 'a.nama_toko', 'a.telepon', 'a.status', 'b.namakab');
		
		/** PAGING */
		$sLimit = "";
		if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' ){
			//$sLimit = "LIMIT ". $_GET['iDisplayLength'] ." OFFSET ". $_GET['iDisplayStart'];
			$sLimit = "LIMIT ". $_GET['iDisplayStart'] .", ". $_GET['iDisplayLength'];
		}
		/** ORDERING */
		$sOrder = "ORDER BY a.nama_toko asc";
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
				$sOrder = "ORDER BY a.nama_toko asc";
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
				   FROM penjual a, master_wilayah b ".
				   $sWhere." ".
				   $sOrder." ".
				   $sLimit;
				   
		//var_dump($sql); exit;		   
		
		$res = $this->db->query($sql);
		
		$number		= 1;
		$row 		= array();
		
		
		foreach ($res->result_array() as $entry)
 		{
			$theid = $entry['id_penjual']; 
			$nama = $entry['nama'];
			$nama_toko = $entry['nama_toko'];
			$kota = $entry['namakab'];
			$phone = $entry['telepon'];

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
			

			$action ="<a href='".base_url()."backend/penjual/view_penjual?id=".$theid."' class='btn btn-xs btn-success' title='View Detail'><i class='fa fa-eye'></i></a> &nbsp;";
			
			if($this->dasarlib->apakahBolehMelakukan('PENJUAL','ubah',$iduser))
			{			
				$action	.= "<a href='".base_url()."backend/penjual/edit_penjual?id=".$theid."' class='btn btn-xs btn-primary' title='Edit'><i class='fa fa-pencil-square-o'></i></a> &nbsp;";			
			}

			if($this->dasarlib->apakahBolehMelakukan('PENJUAL','hapus',$iduser))
			{			
				$action	.= "<a href='".base_url()."backend/penjual/delete_penjual?id=".$theid."' class='btn btn-xs btn-danger hapus' title='Delete'><i class='fa fa-times'></i></a> &nbsp;";			
			}
			
			$row[]	= array(($number + $_GET['iDisplayStart']), 
							 $nama,
							 $nama_toko,
							 $kota,
							 $phone,
							 $status, 
							 $action
							);
			$number++;
		}
		/**	ROW COUNT */
		$sql2 = "select count(a.id_penjual) as jml from penjual a, master_wilayah b ".$sWhere;
		$res2 = $this->db->query($sql2);
		$row2 = $res2->row(); 
		
		$iTotal = $row2->jml;
						
		if ( $sWhere != "" ){
			$sQueryTotal = " SELECT count(a.id_penjual) as jml2 FROM penjual a, master_wilayah b ".$sWhere;
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

	public function getItemOnPenjual($id_penjual)
    {
        $rowx = array();
        $sql = "select a.id_item,a.nama as namaproduk, a.harga, b.nama as namakategori from item_produk a, kategori_produk b where a.id_penjual = $id_penjual and a.idkategori = b.idkategori order by a.nama";
        $res = $this->db->query($sql);
        $res2 = $res->result_array();
        foreach($res2 as $row2)
        {
            $adafoto = 0;

            $id_item = $row2['id_item'];
            $namaproduk = $row2['namaproduk'];
            $harga = $row2['harga'];
            $namakategori = $row2['namakategori'];


            $sql5 = "select thumbnail from item_produk_foto where id_item = $id_item order by id_foto asc limit 1";
            $res5 = $this->db->query($sql5);
            $jml = $res5->num_rows();
            if($jml > 0)
            {
                $adafoto = 1;
                $row5 = $res5->row_array();
                $file_foto = $row5['thumbnail'];
            }
            else
            {
                $adafoto = 0;
                $file_foto = "";
            }



            $rowx[]	= array("namaproduk" => $namaproduk, "harga" => $harga, "namakategori" => $namakategori, 'file_foto' => $file_foto, 'adafoto' => $adafoto);
        }

        return $rowx;

    }	



}
?>