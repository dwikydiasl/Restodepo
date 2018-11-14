<?php echo $header1;?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/mycss.css">

<?php echo $header2;?>
<?php echo $sidebar;?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Maintenance
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
		<div class="box">
        	<div class="box-body" style="text-align: center;">


            <h3>Status Aplikasi: 
              <?php
                if($ismaintenance == 0)
                {
                  echo "Running";
                }
                else
                {
                  echo "Maintenance";
                }
              ?>
              </h3>

            <div style="margin: 30px 0 30px 0;">
              <?php
                if($ismaintenance == 0)
                {
                 ?>
                  <a href="<?php echo base_url(); ?>backend/dashboard/set_maincenance_to?nilai=1" class="konfirmasi"><span class="btn btn-danger"><i class="fa fa-close"></i> Set to Maintenance</span></a>
                 <?php
                }
                else
                {
                 ?>
                  <a href="<?php echo base_url(); ?>backend/dashboard/set_maincenance_to?nilai=0" class="konfirmasi"><span class="btn btn-success"><i class="fa fa-check"></i> Set to Running</span></a>
                 <?php
                }
              ?>
              </h3>    
      
              

              

            </div>

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
<script src="<?php echo base_url(); ?>assets/components/bootbox/bootbox.min.js" type="text/javascript"></script>

<script type="text/javascript">
  

</script>


</body>
</html>