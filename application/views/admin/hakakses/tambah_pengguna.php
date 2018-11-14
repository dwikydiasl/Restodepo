<?php echo $header1;?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/mycss.css">

<?php echo $header2;?>
<?php echo $sidebar;?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      	<div class="row" style="margin-top:-25px;">
            <div class="col-md-6"><h3>Tambah Pengguna</h3></div>
            <div class="col-md-6" style="text-align:right; margin-top:20px;">
               &nbsp;
            </div>
    	</div>  
    </section>

    <!-- Main content -->
    <section class="content container-fluid" style="margin-top:-10px;">
		<div class="box">
        	<div class="box-body">
           		<form name="dasarform" id="dasarform" method="post" action="<?php echo base_url(); ?>backend/hakakses/do_tambah_pengguna">

                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="nama" required>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="email" required>
                                </div>

                                <div class="form-group">
                                    <label for="username">Username (4 - 16 char)</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="username" required>
                                </div>

                                <div class="form-group">
                                    <label for="password">Password (4 - 16 char)</label>
                                    <input type="text" class="form-control" id="password" name="password" placeholder="password" required>
                                </div>

                                <div class="form-group">
                                    <label for="departemen">Departemen</label>
                                    <select name="departemen" class="form-control">
                                        <?php
                                        foreach ($list_departemen as $rowdept) {
                                            ?>
                                            <option value="<?php echo $rowdept['id']; ?>"> <?php echo stripslashes($rowdept['nama']); ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="jabatan">Jabatan</label>
                                    <select name="jabatan" class="form-control">
                                        <?php
                                        foreach ($list_jabatan as $row3) {
                                            ?>
                                            <option value="<?php echo $row3['id']; ?>"> <?php echo stripslashes($row3['nama']); ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="isactive">Status User</label>
                                    <select name="isactive" class="form-control">
                                        <option value="1">Aktif</option>
                                        <option value="0">Non Aktif</option>
                                    </select>
                                </div>



                                <div class="form-group">
                                    <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-success">
                                    <input type="reset" name="Reset" id="Reset" value="Reset" class="btn btn-default"> 
                                    <a href="<?php echo base_url(); ?>backend/hakakses/pengguna" class="btn btn-warning">Kembali</a>
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



<script type="text/javascript">
</script>
</body>
</html>