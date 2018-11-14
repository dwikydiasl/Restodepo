<?php echo $header1;?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/mycss.css">

<?php echo $header2;?>
<?php echo $sidebar;?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        <!-- Main content -->
    <section class="content container-fluid">
    <div class="box">
          <div class="box-body" >
        
              <div class="row" style="margin-bottom:50px;">
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-aqua">
                    <div class="inner">
                      <h3><?php echo $jumlah_member;?></h3>

                      <p>Members</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-person"></i>
                    </div>
                    
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-green">
                    <div class="inner">
                      <h3><?php echo $jumlah_toko;?></h3>

                      <p>Toko</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-home"></i>
                    </div>
                    
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-yellow">
                    <div class="inner">
                      <h3><?php echo $jumlah_tj;?></h3>

                      <p>Tanya Jawab</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-chatboxes"></i>
                    </div>
                    
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-red">
                    <div class="inner">
                      <h3><?php echo $jumlah_invoice;?></h3>

                      <p>Invoice</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-cash"></i>
                    </div>
                    
                  </div>
                </div>
                <!-- ./col -->
              </div>
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