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
            <div class="col-md-6"><h3>Edit Kategori</h3></div>
            <div class="col-md-6" style="text-align:right; margin-top:20px;">
               &nbsp;
            </div>
    	</div>  
    </section>

    <!-- Main content -->
    <section class="content container-fluid" style="margin-top:-10px;">
		<div class="box">
        	<div class="box-body">
           		<form name="dasarform" id="dasarform" method="post" action="<?php echo base_url(); ?>backend/produk/do_edit_kategori">
                                
                                <div class="form-group">
                                  <label for="id_parent">Parent</label>
                                  <select name="id_parent" id="id_parent" class="form-control">
                                    <option value="0"<?php if($detail['id_parent'] == 0){ echo " selected";}?>>Tanpa Parent</option>
                                  
                                  <?php
                                    foreach ($list_kategori as $entry)
                                    {
                                        echo "<option value=\"".$entry['idkategori']."\"";
                                        if($entry['idkategori'] == $detail['id_parent'])
                                        {
                                            echo " selected";
                                        }
                                        echo ">".$entry['nama']."</option>";
                                    }                                   
                                  ?>                      
                                  </select>
                                </div>

                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $detail['nama'];?>" required>
                                </div>

                                <div class="form-group">
                                    <input type="hidden" name="id" id="id" value="<?php echo $detail['idkategori'];?>">
                                    <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-success">
                                    <input type="reset" name="Reset" id="Reset" value="Reset" class="btn btn-default"> 
                                    <a href="<?php echo base_url(); ?>backend/produk/kategori_produk" class="btn btn-warning">Kembali</a>
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
$(document).ready(function(){      
  $('#id_parent').select2();
}); 



</script>
</body>
</html>