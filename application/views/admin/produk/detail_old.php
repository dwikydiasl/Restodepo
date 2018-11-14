<?php echo $header1;?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/mycss.css">
<link href="<?php echo base_url();?>assets/components/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
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
           		
                                <div class="form-group">
                                    <label for="nama_usaha">Nama Perusahaan</label><br />

                                    <?php echo $detail['nama_usaha'];?>
                                </div>

                                <div class="form-group">
                                  <label for="nama">Nama</label><br />
                                  <?php echo $detail['nama'];?>
                                </div>

                                <div class="form-group">
                                  <label for="email">Email</label><br />
                                  <?php echo $detail['username'];?>
                                </div>

                                <div class="form-group">
                                  <label for="phone">Telepon</label><br />
                                  <?php echo $detail['phone'];?>
                                </div>

                                <div class="form-group">
                                  <label for="isactive">Status Tampil</label><br />
                                    <?php if ($detail['isactive'] == 1) 
                                    {
                                        echo "Aktif";
                                    }
                                    else
                                    {
                                        echo "Tidak Aktif";
                                    }
                                    ?>
                                </div>

                                <div class="form-group">
                                    <a href="<?php echo base_url(); ?>backend/penjual" class="btn btn-warning">Kembali</a>
                                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php echo $footer;?>
<script src="<?php echo base_url(); ?>assets/components/dasarjs/dasar.js"></script>
<script src="<?php echo base_url();?>assets/components/select2/dist/js/select2.min.js" type="text/javascript"></script>

<script type="text/javascript">


</script>
</body>
</html>