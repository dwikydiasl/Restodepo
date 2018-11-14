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
            <div class="col-md-6"><h3>Edit Penjual</h3></div>
            <div class="col-md-6" style="text-align:right; margin-top:20px;">
               &nbsp;
            </div>
    	</div>  
    </section>

    <!-- Main content -->
    <section class="content container-fluid" style="margin-top:-10px;">
		<div class="box">
        	<div class="box-body">
           		<form name="dasarform" id="dasarform" method="post" action="<?php echo base_url(); ?>backend/penjual/do_edit_penjual">
                                
                                <div class="form-group">
                                  <label for="email">Email sebagai username</label>
                                  <input type="email" class="form-control" id="email" name="email" value="<?php echo $detail['username'];?>" readonly>
                                </div>

                                <div class="form-group">
                                  <label for="password1">Password (kosongkan jika tidak ingin mengganti)</label>
                                  <input type="password" class="form-control" id="password1" name="password1">
                                </div>

                                <div class="form-group">
                                  <label for="password2">Konfirmasi Password (kosongkan jika tidak ingin mengganti)</label>
                                  <input type="password" class="form-control" id="password2" name="password2">
                                </div>

                                <div class="form-group">
                                    <label for="nama">Nama Perusahaan</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $detail['nama'];?>" required>
                                </div>

                                <div class="form-group">
                                  <label for="nama_toko">Nama Toko</label>
                                  <input type="text" class="form-control" id="nama_toko" name="nama_toko" value="<?php echo $detail['nama_toko'];?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi Singkat Toko</label>
                                    <textarea name="deskripsi" class="form-control" id="deskripsi" style="width: 100%; height: 60px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $detail['deskripsi_toko'];?></textarea>
                                </div>

                                <div class="form-group">
                                  <label for="kota">Kota</label>
                                  <select name="kota" id="kota" class="form-control" onchange="setKota(this.value);">
                                  
                                  <?php
                                    foreach ($list_kota as $entry)
                                    {
                                        if($entry['id'] == $detail['id_kota']){
                                            echo "<option value=\"".$entry['id']."\" selected>".$entry['namakab']."</option>";                                          
                                        }else{
                                            echo "<option value=\"".$entry['id']."\">".$entry['namakab']."</option>";
                                        }
                                    }                                   
                                  ?>                           
                                  </select>
                                </div>

                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="hidden" id="current_location" name="current_location" value="(-6.1516502,106.8953152)" class="form-control">
                                    <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Example: Jl. Boulevard Kelapa Gading Blok M" value="<?php echo $detail['alamat'];?>" required>
                                    <div id="map-canvas" style="height:250px;width:100%;margin-top:20px;"></div>
                                </div>
                                
                                <div class="form-group">
                                  <label for="the_lat">Latitude</label>
                                  <input type="text" class="form-control" id="the_lat" name="the_lat" value="<?php echo $detail['the_lat'];?>" required>
                                </div>

                                <div class="form-group">
                                  <label for="the_long">Longitude</label>
                                  <input type="text" class="form-control" id="the_long" name="the_long" value="<?php echo $detail['the_long'];?>" required>
                                </div>

                                

                                <div class="form-group">
                                  <label for="phone">Telepon</label>
                                  <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $detail['telepon'];?>">
                                </div>

                                <div class="form-group">
                                  <label for="status">Status</label>
                                  <select name="status" id="status" class="form-control" >
                                   <option value="1"<?php if($detail['status'] == 1){ echo ' selected';}?>>Aktif</option>
                                   <option value="0"<?php if($detail['status'] == 0){ echo ' selected';}?>>Baru</option>
                                    <option value="2"<?php if($detail['status'] == 2){ echo ' selected';}?>>Suspend</option>
                                    <option value="3"<?php if($detail['status'] == 3){ echo ' selected';}?>>Hapus</option>
                                  </select>
                                  </select>
                                </div>

                                

                                <div class="form-group">
                                  <label>File Gambar Logo Toko</label> <br>
                                  <button type="button" class="btn btn-primary" onClick="mulai_upload();" name="btnuploader" id="btnuploader"><i class='fa fa-image'></i> Browse</button>
                                    <div id="preview_gambar" style="margin-bottom:20px; margin-top:10px;">
                                        <?php
                                            if($detail['thumbnail_logo'] <> "")
                                            {
                                        ?>
                                        <img src="<?php echo base_url().'assets/gambar_toko/thumbnail/'.$detail['thumbnail_logo'];?>" height='100'>

                                        <?php
                                            }
                                        ?>
                                        
                                    </div>
                                </div>
                                <div id="uploadbar">
                                </div>

                                <div class="form-group">
                                  <label>File Gambar Dokumen NPWP atau SIUP Owner</label> <br>
                                  <button type="button" class="btn btn-primary" onClick="mulai_upload2();" name="btnuploader2" id="btnuploader2"><i class='fa fa-image'></i> Browse</button>
                                    <div id="preview_gambar2" style="margin-bottom:20px; margin-top:10px;">
                                        <?php
                                            if($detail['file_npwp_or_siup'] <> "")
                                            {
                                        ?>
                                        <img src="<?php echo base_url().'assets/dokumen_owner/'.$detail['file_npwp_or_siup'];?>" height='200'>

                                        <?php
                                            }
                                        ?>
                                        
                                    </div>
                                </div>
                                <div id="uploadbar2">
                                </div>



                                <div class="form-group">

                                    <input type="hidden" name="daftarfilelogo" id="daftarfilelogo" value="<?php echo $detail['thumbnail_logo'];?>">
                                    <input type="hidden" name="daftarfilelogo_thumb" id="daftarfilelogo_thumb" value="<?php echo $detail['thumbnail_logo'];?>">

                                    <input type="hidden" name="daftarfilelogo2" id="daftarfilelogo2" value="<?php echo $detail['file_npwp_or_siup'];?>">
                                    <input type="hidden" name="daftarfilelogo_thumb2" id="daftarfilelogo_thumb2" value="<?php echo $detail['file_npwp_or_siup'];?>">

                                    <input type="hidden" name="id" id="id" value="<?php echo $detail['id_penjual'];?>">

                                    <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-success">
                                    <input type="reset" name="Reset" id="Reset" value="Reset" class="btn btn-default"> 
                                    <a href="<?php echo base_url(); ?>backend/penjual" class="btn btn-warning">Kembali</a>
                                </div>

                            </form>

                            <form name="uploadform" id="uploadform" method="post" class="hide" action="<?php echo base_url();?>backend/penjual/do_cover_toko" enctype="multipart/form-data">
                                 <input type="file" name="gambar" id="gambar">
                            </form>

                            <form name="uploadform2" id="uploadform2" method="post" class="hide" action="<?php echo base_url();?>backend/penjual/do_dokumen_toko" enctype="multipart/form-data">
                                 <input type="file" name="gambar2" id="gambar2">
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

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsZcFhkscQYgO4kDw85CS3GZZ_lEkbBNU&amp;libraries=places&amp;v=3.exp"></script>

<script type="text/javascript">
$(document).ready(function(){      
  $('#kota').select2();
}); 

//begin map 

            <?php if(@$detail['id_penjual']!= ""){?>
                var longitude   = <?php echo $detail['the_long'];?>;
                var latitude    = <?php echo $detail['the_lat'];?>; 
            <?php }else{ ?>
                var longitude   = 106.8953152;
                var latitude    = -6.1516502;
            <?php }?>
                    
            var dataKota;
            var kota;
            
            var geocoder;
            var map;
            var marker;
            var pos;
            var latlng;
            var map_called = 0;
            var autocomp;
            var timeout;            
            
            function initialize() {
                latlng = new google.maps.LatLng(latitude,longitude);
        
                geocoder = new google.maps.Geocoder();
                jQuery("#current_location").val(latlng);
                var mapOptions = {
                    zoom: 16,
                    center: latlng
                }
                map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);                                                               
                
                autocomp = new google.maps.places.Autocomplete(/** @type {HTMLInputElement} */(document.getElementById('alamat')),{ types: ['geocode'] });
                
                marker = new google.maps.Marker({
                    map:map,
                    draggable:true,
                    animation: google.maps.Animation.DROP,
                    position: latlng
                });
                google.maps.event.addListener(marker, 'click', toggleBounce);
                google.maps.event.addListener(marker, 'dragend', function(e){
                    var poss = e.latLng;
                    var post = (JSON.parse(JSON.stringify(poss)));
                    latitude  = post.lat;
                    longitude = post.lng;
                    jQuery("#current_location").val(e.latLng);
                    jQuery("#the_lat").val(post.lat);
                    jQuery("#the_long").val(post.lng);
                    //alert(poss);
                    //jQuery("#submit-edit-profile").removeClass("btn-primary").addClass("btn-danger");
                });
                map_called++;
            }
            
            function toggleBounce() {
                if (marker.getAnimation() != null) {
                marker.setAnimation(null);
                } else {
                marker.setAnimation(google.maps.Animation.BOUNCE);
                }
            }
            
            
            $(document).ready(function(){
                jQuery("#the_lat").val(latitude);
                jQuery("#the_long").val(longitude);
                
                initialize();
                                                                                
                $(document).find("input").keydown(function(event){                                  
                    if(event.keyCode == 13) {                                     
                        event.preventDefault();                                   
                        return false;                                   
                    }                               
                });
            });
            
            function setKota(idkota){
                 //alert(idkota);
                //kota = dataKota["kota_"+idkota];
                kota = idkota;
                getCoordinate();
            }
            
            $("#alamat").on("keyup",function(event){
                clearTimeout(timeout);
                
                var xidkota = $('#kota').val();
                kota = xidkota;
                
                //setKota(idkota);
                
                //alert('kota:'+kota);
                
                timeout = setTimeout(function(){
                    getCoordinate();
                },500);
            });
            
            
            function getCoordinate(){
                var address = $("#alamat").val();
                
                //alert('step satu: '+address +'|'+kota);
                
                $.ajax({
                    url: "<?=base_url()?>backend/penjual/getPlaceCoordinate",
                    type: "POST",
                    data: {address: address, kota : kota}
                })
                .done(function(rest){
                    var result = JSON.parse(rest);
                    //alert(result.latitude+' | '+ result.longitude);
                    setMapCoordinate(result.latitude, result.longitude);
                })
                .fail(function(msg){
                    alert("Gagal memuat peta");
                });
            }
            
            function setMapCoordinate(latit,longit){
                latitude    = latit;
                longitude   = longit;
                var thecenter = new google.maps.LatLng(latitude, longitude);
                
                //alert('center:'+thecenter);
                
                map.setCenter(thecenter);                                                                       
                marker.setPosition(thecenter);
                jQuery("#current_location").val(thecenter);
                jQuery("#the_lat").val(latitude);
                jQuery("#the_long").val(longitude);
                
                google.maps.event.addListener(marker, 'dragend', function(e){                                       
                    jQuery("#current_location").val(e.latLng);                                      
                });                                                 
            }

//end map  

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
            url:"<?=base_url()?>backend/penjual/do_cover_toko",
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

//begin uploader dokumen
        function mulai_upload2()
        {
            $('#gambar2').click();
        }

        $('#gambar2').on('change',function(){
            $('#uploadform2').submit();
            })

    $("#uploadform2").submit(function(event){
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
                        $("#btnuploader2").html("<i class='fa fa-image'></i> Ganti Gambar");
                        $('#uploadbar2').html('Upload completed');
                    }else{
                        uploading = "";
                        //$('#uploadbar').show();
                        $('#uploadbar2').html('uploading... ' + percentComplete + '%');
                        //$('#btnuploader').html("<i class='fa fa-circle-o-notch fa-spin'></i><br> Uploading.."+(percentComplete)+"%");
                    }
                  }
                }, false);

                return xhr;
            },
            url:"<?=base_url()?>backend/penjual/do_dokumen_toko",
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
                $('#daftarfilelogo_thumb2').val(nama_aja_thumb);
                $('#daftarfilelogo2').val(nama_aja);
                $('#preview_gambar2').html(pesan);
            }

        });
    });
//end uploader dokumen  

</script>
</body>
</html>