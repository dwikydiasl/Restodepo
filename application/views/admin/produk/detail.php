<?php echo $header1;?>
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/mycss.css">
<style type="text/css">
.gantibg:hover{
  background: #ccffcc;
}  
</style>

<?php echo $header2;?>
<?php echo $sidebar;?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      	<div class="row" style="margin-top:-25px;">
            <div class="col-md-6"><h3>Detail Penjual</h3></div>
            <div class="col-md-6" style="text-align:right; margin-top:20px;">
               &nbsp;
            </div>
    	</div>  
    </section>

    <!-- Main content -->
    <section class="content container-fluid" style="margin-top:-10px;">
		<div class="box">
        	<div class="box-body">
            <div class="row">
              <div class="col-md-8 dasarTable">
                <div class="row col-md-12" style="margin-bottom:20px;">
                  <a href="<?php echo base_url(); ?>backend/toko/tambah_item?id_penjual=<?php echo $detail['id_penjual'];?>"><span class="btn btn-success"><i class="fa fa-plus-circle"></i> Tambah Item</span></a>
                </div>

                <!--
                <?php
                foreach ($list_item as $entry)
                {
                ?>
                <div class="col-md-3 gantibg" style="margin-bottom:10px; padding:8px;">
                  <div class="text-center">
                    <img src="<?php echo base_url();?>assets/gambar_item/thumbnail/<?php echo $entry['thumbnail'];?>" height="100">
                  </div>
                  <div class="text-center">
                    <strong><?php echo $entry['nama'];?></strong>
                    <?php
                    if($entry['ishapus'] == 1)
                    {
                      echo " (TERHAPUS)";
                    }
                    ?>

                    <br>
                    Rp <?php echo $entry['harga_terdiskon'];?>
                  </div>
                  <div class="text-center">
                    <a href="<?php echo base_url(); ?>backend/toko/edit_item?id_item=<?php echo $entry['id_item'];?>&id_toko=<?php echo $detail['id_toko'];?>"><span class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit</i></span></a> 

                    <?php
                    if($entry['ishapus'] == 0)
                    {
                    ?>
                    <a href="<?php echo base_url();?>backend/toko/hapus_item?id_item=<?php echo $entry['id_item'];?>&id_toko=<?php echo $detail['id_toko'];?>" class="btn btn-xs btn-danger hapus"><i class="fa fa-trash"> Hapus</i></a>
                    <?php } ?>

                  </div>
                </div>
              <?php } ?>
            -->


              </div>
              <div class="col-md-4" style="background-color: #eee">
                                <div class="form-group">
                                  <label for="id_penjual">Nama Perusahaan</label><br />
                                  <?php echo $detail['nama'];?>
                                </div>
                                
                                <div class="form-group">
                                    <label for="nama_toko">Nama Toko</label><br />
                                    <?php echo $detail['nama_toko'];?>
                                </div>

                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi Singkat Toko</label><br />
                                    <?php echo $detail['deskripsi_toko'];?>
                                </div>           

                                <div class="form-group">
                                  <label for="kota">Kota</label><br />
                                  <?php echo ucwords($dekota['namakab']);?>
                                </div>

                                <div class="form-group">
                                    <label for="alamat">Alamat</label><br />
                                    <?php echo $detail['alamat'];?>
                                </div>

                                <div class="form-group">
                                  <label for="telepon">Telepon</label><br />
                                  <?php echo $detail['telepon'];?>
                                </div>

                                <div class="form-group">
                                  <label for="is_active">Status Tampil</label><br />
                                  
                                  <?php 
                                  if($detail['is_active'] == 1)
                                  { 
                                    echo 'Tampil';
                                  }
                                  else
                                  {
                                    echo 'Tidak Tampil';
                                  }

                                  ?>
 
                                </div>

                                <div class="form-group">
                                  <label for="status">Status Toko</label><br />
                                    <?php 
                                    if($detail['status'] == 0)
                                    { 
                                        echo 'Baru';
                                    }
                                    elseif($detail['status'] == 1)
                                    { 
                                        echo 'Aktif';
                                    }
                                    elseif($detail['status'] == 2)
                                    { 
                                        echo 'Suspend';
                                    }
                                    else
                                    { 
                                        echo 'Hapus';
                                    }
                                    ?>
                                    
                                </div>
              
                                <div class="form-group">
                                  <label>Gambar Cover</label> <br>
                                 
                                        <?php
                                            if($detail['thumbnail_logo'] <> "")
                                            {
                                        ?>
                                        <img src="<?php echo base_url().'assets/gambar_toko/thumbnail/'.$detail['thumbnail_logo'];?>" height='100'>

                                        <?php
                                            }
                                        ?>

                                </div>
              </div>

            </div>
           		
                                

            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php echo $footer;?>
<script src="<?php echo base_url(); ?>assets/components/dasarjs/dasar.js"></script>
<script src="<?php echo base_url(); ?>assets/components/bootbox/bootbox.min.js" type="text/javascript"></script>

</body>
</html>