<?php
class Produkadmin_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_list_tag_produk()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$sqlText = "ishapus=0";    

		$aColumns 	= array('a.*');
		
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
				   FROM tag_produk a ".
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

			
			if($this->dasarlib->apakahBolehMelakukan('PRODUK','ubah',$iduser))
			{			
				$action	.= "<a href='".base_url()."backend/produk/edit_tag_produk?id=".$theid."' class='btn btn-xs btn-primary' title='Edit'><i class='fa fa-pencil-square-o'></i></a> &nbsp;";			
			}

			if($this->dasarlib->apakahBolehMelakukan('PRODUK','hapus',$iduser))
			{			
				$action	.= "<a href='".base_url()."backend/produk/delete_tag_produk?id=".$theid."' class='btn btn-xs btn-danger hapus' title='Delete'><i class='fa fa-times'></i></a> &nbsp;";			
			}
			
			$row[]	= array(($number + $_GET['iDisplayStart']), 
							 $nama,
							 $action
							);
			$number++;
		}
		/**	ROW COUNT */
		$sql2 = "select count(a.id) as jml from tag_produk a ".$sWhere;
		$res2 = $this->db->query($sql2);
		$row2 = $res2->row(); 
		
		$iTotal = $row2->jml;
						
		if ( $sWhere != "" ){
			$sQueryTotal = " SELECT count(a.id) as jml2 FROM tag_produk a ".$sWhere;
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

	public function get_list_item_produk()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$sqlText = "a.ishapus=0 and a.id_penjual=b.id_penjual";    

		$aColumns 	= array('a.id_item','a.idkategori', 'a.nama', 'b.nama_toko' );
		
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
				   FROM item_produk a, penjual b ".
				   $sWhere." ".
				   $sOrder." ".
				   $sLimit;
				   
		//var_dump($sql); exit;		   
		
		$res = $this->db->query($sql);
		
		$number		= 1;
		$row 		= array();

		
		
		foreach ($res->result_array() as $entry)
 		{

			$theid = $entry['id_item']; 
			$nama = $entry['nama'];
			$nama_toko = $entry['nama_toko'];
			$idkategori = $entry['idkategori'];
			$arkategori = $this->get_text_kategori_produk($idkategori);
			$kategori = implode(' -> ',$arkategori);

			$tag = $this->get_text_tag_produk($theid);

			$action = "";

			
			if($this->dasarlib->apakahBolehMelakukan('PRODUK','ubah',$iduser))
			{			
				$action	.= "<a href='".base_url()."backend/produk/edit_item_produk?id=".$theid."' class='btn btn-xs btn-primary' title='Edit'><i class='fa fa-pencil-square-o'></i></a> &nbsp;";			
			}

			if($this->dasarlib->apakahBolehMelakukan('PRODUK','hapus',$iduser))
			{			
				$action	.= "<a href='".base_url()."backend/produk/delete_item_produk?id=".$theid."' class='btn btn-xs btn-danger hapus' title='Delete'><i class='fa fa-times'></i></a> &nbsp;";			
			}
			
			$row[]	= array(($number + $_GET['iDisplayStart']), 
							 $nama,
							 $nama_toko,
							 $kategori,
							 $tag,
							 $action
							);
			$number++;
		}
		/**	ROW COUNT */
		$sql2 = "select count(a.id_item) as jml from item_produk a, penjual b ".$sWhere;
		$res2 = $this->db->query($sql2);
		$row2 = $res2->row(); 
		
		$iTotal = $row2->jml;
						
		if ( $sWhere != "" ){
			$sQueryTotal = " SELECT count(a.id_item) as jml2 FROM item_produk a, penjual b ".$sWhere;
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

	public function get_text_tag_produk($theid)
	{
		$hasil = "";

		$sql = "select aa.id, bb.nama from matrix_tag_produk aa, tag_produk bb where aa.id_item = $theid and aa.nilai=1 and aa.id_tag = bb.id";	
		$res = $this->db->query($sql);
		$res2 = $res->result_array();
		foreach($res2 as $row2)
		{
			$hasil	.= $row2['nama'].', ';
		}
		$hasil = substr($hasil, 0, -2);
		
		return $hasil;
	}

	public $array_text_kategori = array();

	public function get_text_kategori_produk($idkategori)
	{
		$this->array_text_kategori = array();
		$sql = "select nama, id_parent from kategori_produk where idkategori = $idkategori";	
		$res = $this->db->query($sql);
		$row = $res->row_array();
		$this->array_text_kategori[] = $row['nama'];
		
		$id_parent = $row['id_parent'];
		if($id_parent <> 0)
		{
			$this->susun_induk_kategori($id_parent);
		}
		return array_reverse($this->array_text_kategori);
	}

	public function susun_induk_kategori($id_parent)
	{
		if($id_parent <> 0)
		{
			$sql = "select nama, id_parent from kategori_produk where idkategori = $id_parent";	
			$res = $this->db->query($sql);
			$row = $res->row_array();
			$this->array_text_kategori[] = $row['nama'];
			$id_parent2 = $row['id_parent'];
			$this->susun_induk_kategori($id_parent2);
		}
	}

	public $array_id_kategori = array();

	public function get_id_kategori_produk($idkategori)
	{
		$this->array_id_kategori = array();

		$this->array_id_kategori[] = $idkategori;

		$sql = "select nama, id_parent from kategori_produk where idkategori = $idkategori";	
		$res = $this->db->query($sql);
		$row = $res->row_array();

		$id_parent = $row['id_parent'];
		$this->array_id_kategori[] = $id_parent;
		
		if($id_parent <> 0)
		{
			$this->susun_id_induk_kategori($id_parent);
		}
		return array_reverse($this->array_id_kategori);
	}

	public function susun_id_induk_kategori($id_parent)
	{
		if($id_parent <> 0)
		{
			$sql = "select nama, id_parent from kategori_produk where idkategori = $id_parent";	
			$res = $this->db->query($sql);
			$row = $res->row_array();
			$id_parent2 = $row['id_parent'];
			if($id_parent2 <> 0)
			{
				$this->array_id_kategori[] = $id_parent2;
				$this->susun_id_induk_kategori($id_parent2);
			}
			
		}
	}

	public function get_list_penjual()
	{
		$rowx = array();
		$sql = "select id_penjual,nama, nama_toko from penjual where status <> 3 order by nama_toko";	
		$res = $this->db->query($sql);
		$res2 = $res->result_array();
		foreach($res2 as $row2)
		{
			$id = $row2['id_penjual'];
			$namanya = $row2['nama_toko'].' - '.$row2['nama'];
			$rowx[]	= array("id" => $id, "nama" => $namanya);
		}
		
		return $rowx;
	}	

	function apakahAdaItemProduk($id_penjual,$nama)
	{
		$sql = "select count(id_item) as jml from item_produk where id_penjual=$id_penjual and nama='$nama'";	
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

	function apakahAdaItemProdukEdit($id_penjual,$nama,$id_item)
	{
		$sql = "select count(id_item) as jml from item_produk where id_penjual=$id_penjual and nama='$nama' and id_item <> $id_item";	
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

	function getTextDaftarGambarWarung($id)
	{
		$rowx = "";
		$sql = "select file_foto from item_produk_foto where id_item = $id order by id_foto asc";	
		$res = $this->db->query($sql);
		
		$rowcount = $res->num_rows();
		
		
		if($rowcount == 0)
		{
			$rowx = "";
		}
		else
		{		
			$res2 = $res->result_array();
			foreach($res2 as $row2)
			{
				$file_foto = $row2['file_foto'];
				$rowx .= $file_foto."|";
			}
		}
		//var_dump($rowx);exit;
		
		return $rowx;
	}	

	function getTextDaftarGambarWarung_thumb($id)
	{
		$rowx = "";
		$sql = "select thumbnail from item_produk_foto where id_item = $id order by id_foto asc";	
		$res = $this->db->query($sql);
		
		$rowcount = $res->num_rows();
		
		
		if($rowcount == 0)
		{
			$rowx = "";
		}
		else
		{		
			$res2 = $res->result_array();
			foreach($res2 as $row2)
			{
				$file_foto = $row2['thumbnail'];
				$rowx .= $file_foto."|";
			}
		}
		//var_dump($rowx);exit;
		
		return $rowx;
	}		

	function getGambarWarungHtml($id)
	{
		$rowx = "";
		$sql = "select file_foto,thumbnail from item_produk_foto where id_item = $id order by id_foto asc";	
		$res = $this->db->query($sql);
		
		$rowcount = $res->num_rows();
		
		
		if($rowcount == 0)
		{
			$rowx = "";
		}
		else
		{		
			$res2 = $res->result_array();
			foreach($res2 as $row2)
			{
				$file_foto = $row2['file_foto'];
				$thumbnail = $row2['thumbnail'];
				$rowx .= "<span style='display: inline-block;'><img src='".base_url()."assets/gambar_item/thumbnail/$thumbnail' height='100'> <br> <a href='javascript:void(0)' onclick=hapusgambar('$file_foto')>Delete <i class='fa fa-times'></i></a> </span>";
			}
		}
		//var_dump($rowx);exit;
		
		return $rowx;
	}	

	function hapusDaftarGambarItem($id)
	{
		$this->db->delete('item_produk_foto', array('id_item' => $id));
		return 1;
	}

	public function cekTagItem($id_item,$id_tag)
	{
		$boleh = false;
		$sqlText = "select nilai from matrix_tag_produk where id_item = $id_item and id_tag = $id_tag";
		$res = $this->db->query($sqlText);
		$row = $res->row_array();
		
		if($row['nilai'] == 1)
		{
			$boleh = true;
		}
		return $boleh;
	}

	public function hapusMatrixKategoriProduk($id_item)
	{
		$this->db->delete('matrix_kategori_produk', array('id_item' => $id_item));
		return 1;
	}

	public function hapusMatrixTagProduk($id_item)
	{
		$this->db->delete('matrix_tag_produk', array('id_item' => $id_item));
		return 1;
	}






	// disini
















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