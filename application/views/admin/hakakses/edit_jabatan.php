<?php echo $header1;?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/mycss.css">

<?php echo $header2;?>
<?php echo $sidebar;?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      	<div class="row" style="margin-top:-25px;">
            <div class="col-md-6"><h3>Edit Jabatan</h3></div>
            <div class="col-md-6" style="text-align:right; margin-top:20px;">
               &nbsp;
            </div>
    	</div>  
    </section>

    <!-- Main content -->
    <section class="content container-fluid" style="margin-top:-10px;">
		<div class="box">
        	<div class="box-body">
           		<form name="dasarform" id="dasarform" method="post" action="<?php echo base_url(); ?>backend/hakakses/do_edit_jabatan">

                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $detail['nama']; ?>" required>
                                </div>

                                <div>
                                    <table class="table table-striped table-hover ">
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
                                                    <input name="cekhak[]" type="checkbox" value="<?php echo $idarea; ?>_lihat" <?php if ($this->hakakses_model->cekHakAksesDefaultJabatan($idarea, 'lihat', $id)) {
                                                        echo "checked=\"checked\"";
                                                    } ?> />
                                                </td>
                                                <td align="center">
                                                    <input name="cekhak[]" type="checkbox" value="<?php echo $idarea; ?>_tambah" <?php if ($this->hakakses_model->cekHakAksesDefaultJabatan($idarea, 'tambah', $id)) {
                                                        echo "checked=\"checked\"";
                                                    } ?> />
                                                </td>
                                                <td align="center">
                                                    <input name="cekhak[]" type="checkbox" value="<?php echo $idarea; ?>_ubah" <?php if ($this->hakakses_model->cekHakAksesDefaultJabatan($idarea, 'ubah', $id)) {
                                                        echo "checked=\"checked\"";
                                                    } ?> />
                                                </td>
                                                <td align="center">
                                                    <input name="cekhak[]" type="checkbox" value="<?php echo $idarea; ?>_hapus" <?php if ($this->hakakses_model->cekHakAksesDefaultJabatan($idarea, 'hapus', $id)) {
                                                        echo "checked=\"checked\"";
                                                    } ?> />
                                                </td>          

                                                <td align="center">
                                                    <input name="cekhak[]" type="checkbox" value="<?php echo $idarea; ?>_isprovide" <?php if ($this->hakakses_model->cekHakAksesDefaultJabatan($idarea, 'isprovide', $id)) {
                                                        echo "checked=\"checked\"";
                                                    } ?> />
                                                </td>          
                                                <td align="center">
                                                    <input name="cekhak[]" type="checkbox" value="<?php echo $idarea; ?>_isapprove" <?php if ($this->hakakses_model->cekHakAksesDefaultJabatan($idarea, 'isapprove', $id)) {
                                            echo "checked=\"checked\"";
                                        } ?> />
                                                </td>          
                                                <td align="center">
                                                    <input name="cekhak[]" type="checkbox" value="<?php echo $idarea; ?>_isrelease" <?php if ($this->hakakses_model->cekHakAksesDefaultJabatan($idarea, 'isrelease', $id)) {
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
                                    <a href="<?php echo base_url(); ?>backend/hakakses/jabatan" class="btn btn-warning">Kembali</a>
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