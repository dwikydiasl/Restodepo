<?php echo $header1;?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/mycss.css">

<?php echo $header2;?>
<?php echo $sidebar;?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      	<div class="row" style="margin-top:-25px;">
            <div class="col-md-6"><h3>Edit Pengguna</h3></div>
            <div class="col-md-6" style="text-align:right; margin-top:20px;">
               &nbsp;
            </div>
    	</div>  
    </section>

    <!-- Main content -->
    <section class="content container-fluid" style="margin-top:-10px;">
		<div class="box">
        	<div class="box-body">
           		<form name="dasarform" id="dasarform" method="post" action="<?php echo base_url(); ?>backend/hakakses/do_edit_pengguna">

                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="nama" value="<?php echo stripslashes($detail['nama']); ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="email"  value="<?php echo stripslashes($detail['email']); ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="username"  value="<?php echo stripslashes($detail['username']); ?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="password">Password (kosongkan jika tidak ingin mengganti)</label>
                                    <input type="text" class="form-control" id="password" name="password" placeholder="password">
                                </div>

                                <div class="form-group">
                                    <label for="departemen">Departemen</label>
                                    <select name="departemen" class="form-control">
                                        <?php
                                        foreach ($list_departemen as $rowdept) {
                                            ?>
                                            <option value="<?php echo $rowdept['id']; ?>" <?php if ($rowdept['id'] == $detail['departemen']) {
                                            echo " selected=\"selected\"";
                                        } ?>> <?php echo stripslashes($rowdept['nama']); ?></option>
<?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="jabatan">Jabatan</label>
                                    <select name="jabatan" class="form-control">
                                        <?php
                                        foreach ($list_jabatan as $row3) {
                                            ?>
                                            <option value="<?php echo $row3['id']; ?>" <?php if ($row3['id'] == $detail['jabatan']) {
                                            echo " selected=\"selected\"";
                                        } ?>> <?php echo stripslashes($row3['nama']); ?></option>
<?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="isactive">Status User</label>
                                    <select name="isactive" class="form-control">
                                        <option value="1" <?php if ($detail['isactive'] == 1) {
    echo " selected=\"selected\"";
} ?>>Aktif</option>
                                        <option value="0" <?php if ($detail['isactive'] == 0) {
    echo " selected=\"selected\"";
} ?>>Non Aktif</option>
                                    </select>
                                </div>
                                <div>
                                    <table class="table table-striped table-hover">
                                        <tr>
                                            <th>No</th>
                                            <th>Area Tugas</th>
                                            <th style="text-align:center">Lihat</th>
                                            <th style="text-align:center">Tambah</th>
                                            <th style="text-align:center">Ubah</th>
                                            <th style="text-align:center">Hapus</th>
                                            <th style="text-align:center">Provide</th>
                                            <th style="text-align:center">Approve</th>
                                            <th style="text-align:center">Release</th>
                                        </tr>
<?php
$nn = 1;
foreach ($list_area_tugas as $row) {
    $idarea = $row['id'];
    ?>            
                                            <tr>
                                                <td><?php echo $nn; ?></td>
                                                <td>
                                                    <strong><?php echo stripslashes($row['nama']); ?></strong><br>
    <?php echo stripslashes(nl2br($row['keterangan'])); ?>                          
                                                </td>
                                                <td align="center">
                                                    <input name="cekhak[]" type="checkbox" value="<?php echo $idarea; ?>_lihat" <?php if ($this->hakakses_model->cekHakAksesUser($idarea, 'lihat', $id)) {
        echo "checked=\"checked\"";
    } ?> />
                                                </td>
                                                <td align="center">
                                                    <input name="cekhak[]" type="checkbox" value="<?php echo $idarea; ?>_tambah" <?php if ($this->hakakses_model->cekHakAksesUser($idarea, 'tambah', $id)) {
        echo "checked=\"checked\"";
    } ?> />
                                                </td>
                                                <td align="center">
                                                    <input name="cekhak[]" type="checkbox" value="<?php echo $idarea; ?>_ubah" <?php if ($this->hakakses_model->cekHakAksesUser($idarea, 'ubah', $id)) {
        echo "checked=\"checked\"";
    } ?> />
                                                </td>
                                                <td align="center">
                                                    <input name="cekhak[]" type="checkbox" value="<?php echo $idarea; ?>_hapus" <?php if ($this->hakakses_model->cekHakAksesUser($idarea, 'hapus', $id)) {
        echo "checked=\"checked\"";
    } ?> />
                                                </td>          

                                                <td align="center">
                                                    <input name="cekhak[]" type="checkbox" value="<?php echo $idarea; ?>_isprovide" <?php if ($this->hakakses_model->cekHakAksesUser($idarea, 'isprovide', $id)) {
                                            echo "checked=\"checked\"";
                                        } ?> />
                                                </td>          
                                                <td align="center">
                                                    <input name="cekhak[]" type="checkbox" value="<?php echo $idarea; ?>_isapprove" <?php if ($this->hakakses_model->cekHakAksesUser($idarea, 'isapprove', $id)) {
                                            echo "checked=\"checked\"";
                                        } ?> />
                                                </td>          
                                                <td align="center">
                                                    <input name="cekhak[]" type="checkbox" value="<?php echo $idarea; ?>_isrelease" <?php if ($this->hakakses_model->cekHakAksesUser($idarea, 'isrelease', $id)) {
                                            echo "checked=\"checked\"";
                                        } ?> />
                                                </td>          
                                            </tr>
    <?php $nn++;
} ?>


                                    </table>

                                </div>

                                <div class="form-group">
                                    <input name="id" type="hidden" value="<?php echo $id; ?>" />
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