<?php echo $header1;?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/mycss.css">

<?php echo $header2;?>
<?php echo $sidebar;?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Ganti Password
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
		<div class="box">
        	<div class="box-body">
           		<form name="dasarform" id="dasarform" method="post" action="<?php echo base_url(); ?>backend/login/doChangePassword">

                    <div class="form-group">
                      <label for="oldpass">Password Lama</label>
                      <input type="password" class="form-control" id="oldpass" name="oldpass" required>
                    </div>

                    <div class="form-group">
                      <label for="newpass">Password Baru</label>
                      <input type="password" class="form-control" id="newpass" name="newpass" required>
                    </div>

                    <div class="form-group">
                      <label for="confpass">Konfirmasi Password Baru</label>
                      <input type="password" class="form-control" id="confpass" name="confpass" required>
                    </div>


                                <div class="form-group">
                                    <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-success">
                                    <input type="reset" name="Reset" id="Reset" value="Reset" class="btn btn-default"> 
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

</body>
</html>