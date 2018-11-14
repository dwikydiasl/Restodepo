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
            <div class="col-md-6"><h3>Tambah Item</h3></div>
            <div class="col-md-6" style="text-align:right; margin-top:20px;">
               &nbsp;
            </div>
    	</div>  
    </section>

    <!-- Main content -->
    <section class="content container-fluid" style="margin-top:-10px;">
		<div class="box">
        	<div class="box-body">
           		<form name="dasarform" id="dasarform" method="post" action="<?php echo base_url(); ?>backend/toko/do_tambah_item">
                                
                                <div class="form-group">
                                    <label for="nama_toko">Nama Toko</label><br />
                                    <?php echo $detoko['nama_toko'];?>
                                </div>

                                <div class="form-group">
                                  <label for="idkategoriparent">Parent Kategori</label>
                                  <select name="idkategoriparent" id="idkategoriparent" class="form-control" onchange="ganti_parent_kategori()">
                                  
                                  <?php
                                    foreach ($list_kategori as $entry)
                                    {
                                        
                                            echo "<option value=\"".$entry['idkategori']."\">".$entry['nama']."</option>";
                                    }                                   
                                  ?>                      
                                  </select>
                                </div>

                                <div class="form-group">
                                  <label for="idkategori">Kategori</label>
                                  <div id="divkategori">
                                  <select name="idkategori" id="idkategori" class="form-control">
                                  
                                                  
                                  </select>
                                  </div>
                                </div>

                                <div class="form-group">
                                    <label for="kode">Kode Item</label>
                                    <input type="text" class="form-control" id="kode" name="kode" placeholder="A001">
                                </div>

                                <div class="form-group">
                                    <label for="nama">Nama Item</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="nama item" required>
                                </div>

                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi </label>
                                    <textarea name="deskripsi" class="form-control" id="deskripsi" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </div> 

                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input type="number" class="form-control" id="harga" name="harga" value="1000" step="100">
                                </div>

                                <div class="form-group">
                                    <label for="diskon_persen">Diskon, dalam persen</label>
                                    <input type="number" class="form-control" id="diskon_persen" name="diskon_persen" value="0" step="1" min="0" max="100">
                                </div>

                                <div class="form-group">
                                    <label for="stok">Jumlah Stok</label>
                                    <input type="number" class="form-control" id="stok" name="stok" value="0" step="1" min="0">
                                </div>

                                <div class="form-group">
                                    <label for="berat">Berat dalam kilogram</label>
                                    <input type="number" class="form-control" id="berat" name="berat" value="0" step="0.1" min="0">
                                </div>

                                <div class="form-group">
                                    <label for="rasa">Rasa, jika ada</label>
                                    <input type="text" class="form-control" id="rasa" name="rasa">
                                </div>


                                <div class="form-group">
                                  <label for="status_tampil">Status Tampil</label>
                                  <select name="status_tampil" id="status_tampil" class="form-control" >
                                    <option value="1">Tampil</option>
                                    <option value="0">Tidak Tampil</option>
                                  </select>
                                </div>


                                <div class="form-group">
                                  <label>Foto Item</label> <br>
                                  <button type="button" class="btn btn-primary" onClick="mulai_upload2();" name="btnuploader2" id="btnuploader2"><i class='fa fa-image'></i> Browse</button>
                                    <div id="preview_gambar2" style="margin-bottom:20px; margin-top:10px;">
                                        
                                    </div>
                                </div>
                                <div id="uploadbar2">
                                </div>


                                <div class="form-group">
                                    <input type="hidden" name="daftarfilelogo2" id="daftarfilelogo2">
                                    <input type="hidden" name="daftarfilelogo_thumb2" id="daftarfilelogo_thumb2">

                                    <input type="hidden" name="id_toko" id="id_toko" value="<?php echo $id_toko;?>">
                                    <input type="hidden" name="id_penjual" id="id_penjual" value="<?php echo $detoko['id_penjual'];?>">

                                    <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-success">
                                    <input type="reset" name="Reset" id="Reset" value="Reset" class="btn btn-default"> 
                                    <a href="<?php echo base_url(); ?>backend/toko/detail_toko?id=<?php echo $id_toko;?>" class="btn btn-warning">Kembali</a>
                                </div>

                            </form>

                            <form name="uploadform2" id="uploadform2" method="post" class="hide" action="<?php echo base_url();?>backend/toko/do_foto_item" enctype="multipart/form-data">
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


<script type="text/javascript">
function ganti_parent_kategori()
{
    var idparent = $('#idkategoriparent').val();
    $.ajax({
            url: "<?php echo base_url() ?>backend/toko/get_child_kategori",
            type: "POST",
            data: {idparent:idparent}
            })
            .done(function (result) {
                $('#divkategori').html(result);
                $('#idkategori').select2();
            });
}

    $(document).ready(function(){      
            $('#idkategori').select2();
            $('#idkategoriparent').select2();
            ganti_parent_kategori();
        }); 

//begin uploader foto warung
var potobesar = '';
var potokecil = '';
var arrpotobesar = '';
var arrpotokecil = '';

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
                        $("#btnuploader2").html("<i class='fa fa-image'></i> Tambah Gambar");
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
            url:"<?=base_url()?>backend/toko/do_foto_item",
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

                var daftarfilex = $('#daftarfilelogo2').val();
                daftarfilex = daftarfilex + nama_aja +'|';
                $('#daftarfilelogo2').val(daftarfilex);

                var daftarfilex100 = $('#daftarfilelogo_thumb2').val();
                daftarfilex100 = daftarfilex100 + nama_aja_thumb +'|';
                $('#daftarfilelogo_thumb2').val(daftarfilex100);

                var preview_lama = $('#preview_gambar2').html();
                var preview_baru = preview_lama + ' ' + pesan;
                $('#preview_gambar2').html(preview_baru);

            }


            //$("#photoCropperData").html(htmlData);
        });
    });

    function hapusgambar(namanya)
    {
        var texisi = '';
        var texisi60 = '';
        var isihtml = '';
        
        var isi_daftarfilemenu = $('#daftarfilelogo2').val();
        var isi_bersih_daftarfilemenu = isi_daftarfilemenu.slice(0, -1);

        var isi_daftarfilemenu60 = $('#daftarfilelogo_thumb2').val();
        var isi_bersih_daftarfilemenu60 = isi_daftarfilemenu60.slice(0, -1);
        
        arrisi = isi_bersih_daftarfilemenu.split('|');
        var jumlah = arrisi.length;
        arrisi60 = isi_bersih_daftarfilemenu60.split('|');
        
        if(jumlah == 1)
        {
            texisi = '';
            texisi60 = '';
            isihtml = '';
        }
        else
        {
        
            var indeks = arrisi.indexOf(namanya);
            arrisi.splice(indeks, 1);
            arrisi60.splice(indeks, 1);
            
            texisi = arrisi.join("|");
            texisi = texisi +'|';
            
            texisi60 = arrisi60.join("|");
            texisi60 = texisi60 +'|';
    
            for (i = 0; i < arrisi.length; i++) 
            {
                namaskr = arrisi[i];
                namaskr60 = arrisi60[i];
                isihtml = isihtml + "<span style='display: inline-block;'><img src='<?php echo base_url();?>assets/gambar_item/thumbnail/"+namaskr60+"' height='100'> <br> <a href='javascript:void(0)' onclick=hapusgambar('"+namaskr+"')>Delete <i class='fa fa-times'></i></a></span>";
            }
            
            //alert(namanya);
            //alert('bersih:' + isi_bersih_daftarfilemenu);
        }
        
        $('#daftarfilelogo2').val(texisi);
        $('#daftarfilelogo_thumb2').val(texisi60);
        $('#preview_gambar2').html(isihtml);
        
    }
//end uploader foto warung   
 
</script>
</body>
</html>