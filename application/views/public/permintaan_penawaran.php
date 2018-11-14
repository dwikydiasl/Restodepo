<?php
include "header1.php";
?>
<?php
include "header2.php";
?>
<style type="text/css">
	#header1{
		display: none;
	}
</style>

<div id="permintaan-penawaran">
	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
			    <li class="breadcrumb-item active" aria-current="page" style="color: #FA7422 ">Permintaan Penawaran</li>
			</ol>
		</nav>
		<div class="panel-permintaan-penawaran">
			<h5>Permintaan Penawaran</h5>
			<form action="<?php echo base_url('produk/ajukan_penawaran_produk');?>">
				<div class="form-check-permintaan">
					<h6>Jenis Penawaran</h6>
					<div class="form-check">
				        <input class="form-check-input" type="checkbox" id="gridCheck1">
				        <label class="form-check-label" for="gridCheck1">
				          Minta Penawaran Harga
				        </label>
				    </div>
				    <div class="form-check">
				        <input class="form-check-input" type="checkbox" id="gridCheck1">
				        <label class="form-check-label" for="gridCheck1">
				          Minta Penawaran Contoh Barang
				        </label>
				    </div>
				    <div class="form-check">
				        <input class="form-check-input" type="checkbox" id="gridCheck1">
				        <label class="form-check-label" for="gridCheck1">
				          Minta Penawaran Contoh Barang dan Harga
				        </label>
				    </div>
				</div>
				<div class="form-permintaan">
					<label for="exampleFormControlInput1">Jenis Produk</label>
					<div class="form-group">
					    <input type="text" class="form-control" name="jenis_produk" id="jenis_produk" placeholder="Tuliskan secara spesifik dan detail produk yang di cari ! Contoh : Gula Jawa ">
					</div>
					<div class="form-row">
					    <div class="col-md-3">
					    	<div class="form-group">
					    		 <input type="number" class="form-control" name="kuantitas" id="kuantitas" placeholder="Kuantitas">
					    	</div>				     
					    </div>
					    <div class="col-md-3">
					    	<div class="form-group">
					    		<select id="inputState" class="form-control">
							        <option selected value="ton">Ton</option>
							        <option value="kg">Kg</option>
							        <option value="dus">Dus</option>  
							      </select>
					    	</div>				       
					    </div>
					</div>
					<label for="exampleFormControlInput1">Deskripsi Produk yang diCari</label>
					<div class="form-group">
					   <textarea class="form-control" name="deskripsi" id="deskripsi" rows="2" placeholder="Masukkan Catatan "></textarea>
					</div>
					    <label for="exampleFormControlFile1">Upload File</label>
					<div class="" align="left" style="margin-bottom: 10px;">
					    <input type="file" class="form-control-file" id="exampleFormControlFile1">
					</div>
					<label>Kisaran harga yang dicari</label>
					<div class="form-row" style="border-bottom: 2px solid #C4C4C4; padding-bottom: 10px; margin-bottom: 10px;">		
					    <div class="col-md-3">
					    	<div class="form-group">
					    		<input type="number" class="form-control" name="harga_min" id="harga_min" placeholder="100.000">
					    	</div>				      
					    </div>
					    <div class="col-md-3">
					     	<div class="form-group">
					    		<input type="number" class="form-control" name="harga_max" id="harga_max" placeholder="5.000.000">
					    	</div>
					    </div>
					</div>
					    <label for="exampleFormControlInput1">Kontak Detail</label>
					<div class="form-group" >
					    <input type="email" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap Anda ">
					</div>
					<div class="form-row">		
					    <div class="col-md-3">
					    	<div class="form-group">
					    		<input type="email" class="form-control" name="email" id="email" placeholder="E-Mail Anda">
					    	</div>				      
					    </div>
					    <div class="col-md-3">
					    	<div class="form-group">
					    		 <input type="number" class="form-control" name="telepon" id="telepon" placeholder="Telepon">
					    	</div>				      
					    </div>
					</div>
					<div class="form-check" style="margin-top: 10px;">
				        <input class="form-check-input" type="checkbox" id="gridCheck1">
				        <label class="form-check-label" for="gridCheck1">
				          Sesuai Alamat di Profil RestoDepo Saya
				        </label>
				    </div>
				    <div align="center">
				    	<button type="submit" class="btn btn-danger">Ajukan</button>
				    </div>
				</div>
			</form>			
		</div>
	</div>
</div>



<?php
include "footer1.php";
?>
<?php
include "footer2.php";
?>