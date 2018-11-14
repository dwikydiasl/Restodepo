<?php echo $header1;?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/mycss.css">

<?php echo $header2;?>
<?php echo $sidebar;?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      	<div class="row" style="margin-top:-25px;">
            <div class="col-md-6"><h3>Kategori Produk</h3></div>
            <div class="col-md-6" style="text-align:right; margin-top:20px;">
                <?php
                if ($boleh_tambah) {
                    ?>
                    <a href="<?php echo base_url(); ?>backend/produk/tambah_kategori"><span class="btn btn-success"><i class="fa fa-plus-circle"></i> Tambah</span></a>
                <?php } ?>
            </div>
    	</div>  
    </section>

    <!-- Main content -->
    <section class="content container-fluid" style="margin-top:-10px;">
		<div class="box">
        	<div class="box-body">
            	<table width="100%" class="table table-condensed table-striped table-hover dasarTable" id="example" cellspacing="0" > 
                    <thead>
                        <tr style="background-color:#79d279">
                            <th width="10%">NO</th>
                            <th width="75%">NAMA KATEGORI</th>
                            <th width="15%">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $mm = 1;
                        foreach($list_kategori as $row)
                        {
                            $theid = $row['idkategori'];
                            $nama = $row['nama'];
                            
                        
                        ?>
                        <tr>
                            <td><?php echo $mm;?></td>
                            <td><?php echo $nama;?></td>
                            <td>
                            <?php
                            echo "<a href='".base_url()."backend/produk/edit_kategori?id=".$theid."' class='btn btn-xs btn-primary' title='Edit'><i class='fa fa-pencil-square-o'></i></a> &nbsp;";
                            echo "<a href='".base_url()."backend/produk/delete_kategori?id=".$theid."' class='btn btn-xs btn-danger hapus' title='Delete'><i class='fa fa-times'></i></a> &nbsp;";
                            ?>
                            </td>
                        </tr>
                        <?php
                        $mm++;
                        } 
                        ?>


                    </tbody>

                </table>  
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php echo $footer;?>
<script src="<?php echo base_url(); ?>assets/components/dasarjs/dasar.js"></script>

<script src="<?php echo base_url(); ?>assets/components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/components/bootbox/bootbox.min.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>assets/components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
$(document).ready(function () {
    if ($('table').hasClass('dasarTable')) {
        $('.dasarTable').dataTable({
            "dom": '<"pull-right"f>tip',
            "autoWidth": false,
            "bSort": true,
            "paging": true,
            "info": true,
            "stateSave": false,
            "pagingType": "full_numbers",
            "lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]],
            "pageLength": 50,
            
            "aoColumns": [
                {"bSortable": false, "bSearchable": false},
                null,
                {"bSortable": false}
            ]
            
        });
    }
});

</script>
</body>
</html>