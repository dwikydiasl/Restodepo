<?php
class Toko_model extends CI_Model 
{
	function __construct()
    {
        parent::__construct();
    }

    function getFotoProdukById($id_item)
    {
        $this->db->join('item_produk b', 'b.id_item = a.id_item','left');
        $this->db->where('a.id_item', $id_item);
        $this->db->where('a.ishapus', 0);
        $query = $this->db->get('item_produk_foto a');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    public function getProdukLainnyaById($id_penjual)
    {
        $rowx = array();
        $sql = "select aa.id_penjual, aa.id_item, aa.nama, aa.deskripsi_singkat, aa.harga, aa.permalink from item_produk aa where aa.status_tampil=1 and aa.ishapus=0 order by aa.id_penjual desc limit 4";   
        $res = $this->db->query($sql);
        $result = $res->result_array();
        

        foreach($result as $row2)
        {
            $id_penjual = $row2['id_penjual'];
            $id_item = $row2['id_item'];
            $nama = $row2['nama'];
            $deskripsi_singkat = $row2['deskripsi_singkat'];
            $harga = $row2['harga'];
            $permalink = $row2['permalink'];

            $sql3 = "select thumbnail from item_produk_foto where id_item = '$id_item' order by id_foto asc limit 1";   
            $res3 = $this->db->query($sql3);
            $row3 = $res3->row_array();

            $rowx[] = array(
                "id_penjual" => $id_penjual,
                "id_item" => $id_item, 
                "nama" => $nama, 
                "deskripsi_singkat" => $deskripsi_singkat, 
                "harga" => $harga,
                "permalink" => $permalink,
                "gambar"=>$row3['thumbnail']
            );
        }
        
        return $rowx;
        
    }

    function getProdukTerbaruLainnya()
    {
        $rowx = array();
        $sql = "select aa.id_item, aa.nama, aa.deskripsi_singkat, aa.harga, aa.permalink from item_produk aa where aa.status_tampil=1 and aa.ishapus=0 order by aa.id_item desc limit 8";   
        $res = $this->db->query($sql);
        $result = $res->result_array();
        

        foreach($result as $row2)
        {
            $id_item = $row2['id_item'];
            $nama = $row2['nama'];
            $deskripsi_singkat = $row2['deskripsi_singkat'];
            $harga = $row2['harga'];
            $permalink = $row2['permalink'];

            $sql3 = "select thumbnail from item_produk_foto where id_item = '$id_item' order by id_foto asc limit 1";   
            $res3 = $this->db->query($sql3);
            $row3 = $res3->row_array();

            $rowx[] = array(
                "id_item" => $id_item, 
                "nama" => $nama, 
                "deskripsi_singkat" => $deskripsi_singkat, 
                "harga" => $harga,
                "permalink" => $permalink,
                "gambar"=>$row3['thumbnail']
            );
        }
        
        return $rowx;
    }

    public function getProdukTerlarisLainnya()
    {
        $rowx = array();
        $sql = "SELECT id_item, COUNT(id_item) as jml FROM invoice_detail GROUP BY id_item ORDER BY jml DESC limit 8";  
        $res = $this->db->query($sql);
        $result = $res->result_array();
        

        foreach($result as $row2)
        {
            $id_item = $row2['id_item'];
            $sql3 = "select * from item_produk where id_item = $id_item";   
            $res3 = $this->db->query($sql3);
            $row3 = $res3->row_array();

            $nama = $row3['nama'];
            $deskripsi_singkat = $row3['deskripsi_singkat'];
            $harga = $row3['harga'];
            $permalink = $row3['permalink'];

            $sql4 = "select thumbnail from item_produk_foto where id_item = '$id_item' order by id_foto asc limit 1";   
            $res4 = $this->db->query($sql4);
            $row4 = $res4->row_array();

            $rowx[] = array(
                "id_item" => $id_item, 
                "nama" => $nama, 
                "deskripsi_singkat" => $deskripsi_singkat, 
                "harga" => $harga,
                "permalink" => $permalink,
                "gambar"=>$row4['thumbnail']
            );
        }
        
        return $rowx;
        
    }

     public function getcari()
    {
        $rowx = array();
        $sql = "select aa.id_penjual, aa.id_item, aa.nama, aa.deskripsi_singkat, aa.harga, aa.permalink from item_produk aa where aa.status_tampil=1 and aa.ishapus=0 order by aa.id_item desc limit 4";   
        $res = $this->db->query($sql);
        $result = $res->result_array();
        
        foreach($result as $row2)
        {
            $id_item = $row2['id_item'];
            $nama = $row2['nama'];
            $deskripsi_singkat = $row2['deskripsi_singkat'];
            $harga = $row2['harga'];
            $permalink = $row2['permalink'];

            $sql3 = "select thumbnail from item_produk_foto where id_item = '$id_item' order by id_foto asc limit 1";   
            $res3 = $this->db->query($sql3);
            $row3 = $res3->row_array();

            $rowx[] = array(
                "id_item" => $id_item, 
                "nama" => $nama, 
                "deskripsi_singkat" => $deskripsi_singkat, 
                "harga" => $harga,
                "permalink" => $permalink,
                "gambar"=>$row3['thumbnail']
            );
        }
        
        return $rowx;
        
    }

    public function search_produk($search) {
        $this->db->select('*');
        $this->db->from('item_produk');
        $this->db->like('nama',$search);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function search_kategori($search) {
        $this->db->select('*');
        $this->db->from('item_produk');
        $this->db->like('nama',$search);
        $query = $this->db->get();
        return $query->result();
    }

     public function getKlikKategori($id_kategori)
    {
        $rowx = array();
        $sql = "select aa.id_item, aa.nama, aa.deskripsi_singkat, aa.harga, aa.permalink from item_produk aa where aa.status_tampil=1 and aa.ishapus=0 order by aa.id_item desc limit 12";   
        $res = $this->db->query($sql);
        $result = $res->result_array();
        
        foreach($result as $row2)
        {
            $id_item = $row2['id_item'];
            $nama = $row2['nama'];
            $deskripsi_singkat = $row2['deskripsi_singkat'];
            $harga = $row2['harga'];
            $permalink = $row2['permalink'];

            $sql3 = "select thumbnail from item_produk_foto where id_item = '$id_item' order by id_foto asc limit 1";   
            $res3 = $this->db->query($sql3);
            $row3 = $res3->row_array();

            $rowx[] = array(
                "id_item" => $id_item, 
                "nama" => $nama, 
                "deskripsi_singkat" => $deskripsi_singkat, 
                "harga" => $harga,
                "permalink" => $permalink,
                "gambar"=>$row3['thumbnail']
            );
        }
        
        return $rowx;
        
    }
}