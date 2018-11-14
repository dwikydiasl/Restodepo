<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>


    </head>
    <body>
        <form name="dasarform_ekko" id="dasarform_ekko" method="post" action="<?php echo base_url(); ?>backend/setting/do_tambah_admin_fee">


                <div class="form-group">
                  <label for="batas_bawah">Batas Bawah Transaksi</label>
                  <input type="number" class="form-control" id="batas_bawah" name="batas_bawah" value="0" required="">
                </div>
                <div class="form-group">
                  <label for="batas_atas">Batas Atas Transaksi</label>
                  <input type="number" class="form-control" id="batas_atas" name="batas_atas" value="0" required>
                </div>

                <div class="form-group">
                  <label for="fee">Admin Fee</label>
                  <input type="number" class="form-control" id="fee" name="fee" value="0" required>
                </div>

                <div class="form-group">
                    <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-success" >
                    <input type="reset" name="Reset" id="Reset" value="Reset" class="btn btn-default"> 

                </div>

            </form>
<script src="<?php echo base_url(); ?>assets/components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="<?php echo base_url(); ?>assets/components/dasarjs/dasar.js"></script>
    </body>
</html>