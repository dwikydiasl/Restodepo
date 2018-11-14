<?php echo $header1;?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/mycss.css">

<?php echo $header2;?>
<?php echo $sidebar;?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Audit Trail
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
		<div class="box">
        	<div class="box-body">
          <table width="100%" class="table table-condensed table-striped table-hover dasarTable" id="example" cellspacing="0" >  
                                <thead>
                                    <tr style="background-color:#79d279">
                                        <th width="5%" style="border-bottom-color:#ddd; border-color:#ddd; border-top-color:#ddd;">No</th>
                                        <th width="15%" style="border-bottom-color:#ddd; border-color:#ddd; border-top-color:#ddd;">Username</th>
                                        <th width="20%" style="border-bottom-color:#ddd; border-color:#ddd; border-top-color:#ddd;">Tanggal</th>
                                        <th width="60%" style="border-bottom-color:#ddd; border-color:#ddd; border-top-color:#ddd;">Keterangan</th>
                                    </tr>
                                </thead>
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
<script src="<?php echo base_url(); ?>assets/components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
$(document).ready(function () {
	if ($('table').hasClass('dasarTable')) {
		$('.dasarTable').dataTable({
			"dom": '<"pull-left"l><"pull-right"f>tip',
			"autoWidth": false,
			"bSort": true,
			"paging": true,
			"info": true,
			"stateSave": false,
			"pagingType": "full_numbers",
			"lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]],
			"pageLength": 50,
			"ajax": "<?php echo base_url(); ?>backend/dashboard/trail_list?iDisplayStart=0&iDisplayLength=-1",
			"aoColumns": [
				{"bSortable": false, "bSearchable": false},
				null,
				null,
				{"bSortable": false}
			]
		});
	}
});
</script>
</body>
</html>