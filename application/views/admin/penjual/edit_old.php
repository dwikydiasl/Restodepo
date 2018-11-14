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
            <div class="col-md-6"><h3>Edit Penjual</h3></div>
            <div class="col-md-6" style="text-align:right; margin-top:20px;">
               &nbsp;
            </div>
    	</div>  
    </section>

    <!-- Main content -->
    <section class="content container-fluid" style="margin-top:-10px;">
		<div class="box">
        	<div class="box-body">
           		<form name="dasarform" id="dasarform" method="post" action="<?php echo base_url(); ?>backend/penjual/do_edit_penjual">
                                
                                <div class="form-group">
                                    <label for="nama_usaha">Nama Perusahaan</label>
                                    <input type="text" class="form-control" id="nama_usaha" name="nama_usaha" value="<?php echo $detail['nama_usaha'];?>" required>
                                </div>

                                <div class="form-group">
                                  <label for="nama">Nama</label>
                                  <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $detail['nama'];?>" required>
                                </div>

                                <div class="form-group">
                                  <label for="email">Email</label>
                                  <input type="email" class="form-control" id="email" name="email" value="<?php echo $detail['username'];?>" required>
                                </div>

                                <div class="form-group">
                                  <label for="phone">Telepon</label>
                                  <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $detail['phone'];?>">
                                </div>

                                <div class="form-group">
                                  <label for="isactive">Status</label>
                                  <select name="isactive" id="isactive" class="form-control" >
                                    <option value="1" <?php if ($detail['isactive'] == 1) {
    echo " selected=\"selected\"";
} ?>>Aktif</option>
                                        <option value="0" <?php if ($detail['isactive'] == 0) {
    echo " selected=\"selected\"";
} ?>>Tidak Aktif</option>
                                  </select>
                                </div>

                                <div class="form-group">
                                  <label for="password1">Password (kosongkan jika tidak ingin mengganti)</label>
                                  <input type="password" class="form-control" id="password1" name="password1">
                                </div>

                                <div class="form-group">
                                  <label for="password2">Konfirmasi Password</label>
                                  <input type="password" class="form-control" id="password2" name="password2">
                                </div>



                                <div class="form-group">
                                    <input name="id" type="hidden" value="<?php echo $id; ?>" />
                                    <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-success">
                                    <input type="reset" name="Reset" id="Reset" value="Reset" class="btn btn-default"> 
                                    <a href="<?php echo base_url(); ?>backend/penjual" class="btn btn-warning">Kembali</a>
                                </div>

                            </form>


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