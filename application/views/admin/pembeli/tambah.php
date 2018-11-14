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
            <div class="col-md-6"><h3>Tambah Pembeli</h3></div>
            <div class="col-md-6" style="text-align:right; margin-top:20px;">
               &nbsp;
            </div>
    	</div>  
    </section>

    <!-- Main content -->
    <section class="content container-fluid" style="margin-top:-10px;">
		<div class="box">
        	<div class="box-body">
           		<form name="dasarform" id="dasarform" method="post" action="<?php echo base_url(); ?>backend/pembeli/do_tambah_pembeli">
                                

                                <div class="form-group">
                                  <label for="nama">Nama</label>
                                  <input type="text" class="form-control" id="nama" name="nama" required>
                                </div>

                                <div class="form-group">
                                  <label for="email">Email</label>
                                  <input type="email" class="form-control" id="email" name="email" required>
                                </div>

                                <div class="form-group">
                                  <label for="phone">Telepon</label>
                                  <input type="text" class="form-control" id="phone" name="phone">
                                </div>

                            


                                <div class="form-group">
                                  <label for="kota">Kota</label>
                                  <select name="kota" id="kota" class="form-control">
                                  
                                  <?php
                                    foreach ($list_kota as $entry)
                                    {
                                        if($entry['id'] == 157){
                                            echo "<option value=\"".$entry['id']."\" selected>".ucwords($entry['namakab'])."</option>";                                          
                                        }else{
                                            echo "<option value=\"".$entry['id']."\">".ucwords($entry['namakab'])."</option>";
                                        }
                                    }                                   
                                  ?>                      
                                  </select>
                                </div>




                                <div class="form-group">
                                  <label for="status">Status</label>
                                  <select name="status" id="status" class="form-control" >
                                    <option value="1">Aktif</option>
                                    <option value="0">Baru</option>
                                    <option value="2">Suspend</option>
                                    <option value="3">Hapus</option>
                                  </select>
                                </div>

                                <div class="form-group">
                                  <label for="password1">Password</label>
                                  <input type="password" class="form-control" id="password1" name="password1">
                                </div>

                                <div class="form-group">
                                  <label for="password2">Konfirmasi Password</label>
                                  <input type="password" class="form-control" id="password2" name="password2">
                                </div>

                                <div class="form-group">
                                  <label>Avatar</label> <br>
                                  <button type="button" class="btn btn-primary" onClick="mulai_upload();" name="btnuploader" id="btnuploader"><i class='fa fa-image'></i> Browse</button>
                                    <div id="preview_gambar" style="margin-bottom:20px; margin-top:10px;">
                                        
                                    </div>
                                </div>
                                <div id="uploadbar">
                                </div>


                                <div class="form-group">
                                    <input type="hidden" name="daftarfilelogo" id="daftarfilelogo">
                                    <input type="hidden" name="daftarfilelogo_thumb" id="daftarfilelogo_thumb">

                                    <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-success">
                                    <input type="reset" name="Reset" id="Reset" value="Reset" class="btn btn-default"> 
                                    <a href="<?php echo base_url(); ?>backend/pembeli" class="btn btn-warning">Kembali</a>
                                </div>

                            </form>

                            <form name="uploadform" id="uploadform" method="post" class="hide" action="<?php echo base_url();?>backend/pembeli/do_cover" enctype="multipart/form-data">
                                 <input type="file" name="gambar" id="gambar">
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
  $('#kota').select2();

}); 
//begin uploader cover
        function mulai_upload()
        {
            $('#gambar').click();
        }

        $('#gambar').on('change',function(){
            $('#uploadform').submit();
            })

    $("#uploadform").submit(function(event){
        event.preventDefault();
        //$("#totalfoto").val($(".boximage").length);
        var formData = new FormData(this);
        //$("#photoCropperData").html("");
        //counterPhoto++;
        //$('#uploadbar').html('uploading... ');

        $.ajax({
            xhr: function()
              {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt){
                  if (evt.lengthComputable) {
                    var percentComplete = Math.round(100*evt.loaded / evt.total);

                    if(percentComplete==100){
                        uploading = "completed";
                        $("#btnuploader").html("<i class='fa fa-image'></i> Ganti Gambar");
                        $('#uploadbar').html('Upload completed');
                    }else{
                        uploading = "";
                        //$('#uploadbar').show();
                        $('#uploadbar').html('uploading... ' + percentComplete + '%');
                        //$('#btnuploader').html("<i class='fa fa-circle-o-notch fa-spin'></i><br> Uploading.."+(percentComplete)+"%");
                    }
                  }
                }, false);

                return xhr;
            },
            url:"<?=base_url()?>backend/pembeli/do_cover",
            type:"POST",
            data: formData,
            contentType: false,
            cache: false,
            processData:false,
        })
        .done(function(result){
            var htmlData = result;
            arrmsg = result.split('|');
            benergak = arrmsg[0];
            pesan = arrmsg[1];
            nama_aja_thumb = arrmsg[2];
            nama_aja = arrmsg[3];

            if(benergak == '0')
            {
                alert('Gagal Upload');
            }
            else
            {

                //var daftarfilex = $('#daftarfile').val();
                //daftarfilex = daftarfilex + nama_aja +'|';
                //$('#daftarfile').val(daftarfilex);
                $('#daftarfilelogo_thumb').val(nama_aja_thumb);
                $('#daftarfilelogo').val(nama_aja);

                //var preview_lama = $('#preview_gambar').html();
                //var preview_baru = preview_lama + ' ' + pesan;
                //$('#preview_gambar').html(preview_baru);
                $('#preview_gambar').html(pesan);
                //alert(preview_baru);
            }


            //$("#photoCropperData").html(htmlData);
        });
    });
//end uploader cover   
</script>
</body>
</html>