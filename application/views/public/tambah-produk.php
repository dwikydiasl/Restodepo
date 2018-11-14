<?php
include "header-dashboard.php";
?>
<style type="text/css">
	#header1{
		display: none;
	}
	#header2{
		border-bottom: 2px solid rgba(0, 0, 0, 0.15);
	}
	#header2 .input-group{
		display: none;
	}
	#header2 .fa-heart{
		display: none;
	}
	#header2 .bantuan{
		display: none;
	}
	.modal-header{
		height: 50px;
		padding-bottom: 10px;
	}
</style>

<div id="dashboard">
	<div class="container-fluid">
		<div class="row">
			<div class="menu-dashboard col-md-4 col-lg-3 col-xl-2">
					<?php
						include "menu-dashboard-penjual.php";
					?>			
			</div>
			<div class="konten-dashboard col-md-8 col-lg-9 col-xl-10">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb" style="background-color: #32433C">
						<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="#">Kelola Toko</a></li>
						<li class="breadcrumb-item active" aria-current="page" style="color: #FA7422 ">Tambah Produk</li>
					</ol>
				</nav>
				<div class="tambah-produk">
					<div class="form-tambah-produk">		    		
			    		<div class="form-group">
						    <label>Nama Produk</label>
						    <div class="inputan">
						    	 <input type="text" class="form-control" id="formGroupExampleInput" placeholder="masukkan nama produk">
						    </div>					   
						</div>
						<div class="form-group">
						    <label>No Sertifkat Produk</label>
						    <div class="inputan">
						    	 <input type="number" class="form-control" id="formGroupExampleInput" placeholder="ex: : 445-2930-00">
						    </div>					   
						</div>
						<div class="row">
							<div class="col">
								<div class="form-group">
								    <label>Kategori Produk</label>
								    <div class="inputan">
								    	 <select id="inputState" class="form-control">
									        <option selected>Choose...</option>
									        <option>...</option>
									      </select>
								    </div>					   
								</div>
							</div>
							<div class="col">
								<div class="form-group">
								    <label>Tags</label>
								    <div class="inputan">
								    	 <select id="inputState" class="form-control">
									        <option selected>Choose...</option>
									        <option>...</option>
									      </select>
								    </div>					   
								</div>
							</div>
						</div>
						<div class="form-group">
						    <label>Deskripsi Singkat Produk</label>
						    <div class="inputan">
						    	 <input type="text" class="form-control" id="formGroupExampleInput" placeholder="masukkan deskripsi singkat produk">
						    </div>					   
						</div>
						<div class="row">
							<div class="col">
								<div class="form-group">
								    <label>Harga</label>
								    <div class="inputan">
								    	 <input type="text" class="form-control" id="formGroupExampleInput" placeholder="ex: Rp. 1jt - 2jt">
								    </div>					   
								</div> 	
							</div>
							<div class="col">
								<div class="form-group">
								    <label>Satuan/Kemasan Order</label>
								    <div class="inputan">
								    	 <select id="inputState" class="form-control">
									        <option selected>Choose...</option>
									        <option>...</option>
									      </select>
								    </div>					   
								</div>
							</div>
							<div class="col">
								<div class="form-group">
								    <label>Minimal Order</label>
								    <div class="inputan">
								    	 <input type="number" class="form-control" id="formGroupExampleInput" placeholder="ex: 10 box">
								    </div>					   
								</div>
							</div>
						</div>					
						<div class="form-group">
						    <label>FAQ</label>
						    <div class="inputan">
						    	<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
						    </div>					   
						</div>
						<div class="form-group">
						    <label>Deskripsi Lengkap Produk</label>
						    <div class="">
						    	 <div id="summernote"></div>
						    </div>					   
						</div>
						<div class="foto-produk">
			    			<h6>Foto Produk</h6>
			    			<div class="container">
			    				<div class="row" style="margin-right: 15px;">
			    					<div class="form-group">
									    <input type="file" class="form-control-file" id="exampleFormControlFile1">
									 </div>
									 <div class="form-group">
									    <input type="file" class="form-control-file" id="exampleFormControlFile1">
									 </div>
									 <div class="form-group">
									    <input type="file" class="form-control-file" id="exampleFormControlFile1">
									 </div>
									 <div class="form-group">
									    <input type="file" class="form-control-file" id="exampleFormControlFile1">
									 </div>
			    				</div>
			    			</div>		    					    			
			    		</div>
			    		<div class="foto-produk">
			    			<h6>Foto Gudang/Toko</h6>
			    			<div class="container">
			    				<div class="row" style="margin-right: 15px;">
			    					<div class="form-group">
									    <input type="file" class="form-control-file" id="exampleFormControlFile1">
									 </div>
									 <div class="form-group">
									    <input type="file" class="form-control-file" id="exampleFormControlFile1">
									 </div>
			    				</div>
			    			</div>		    					    			
			    		</div>					
			   	 	</div>
			   	 	<div class="btn-tambah-produk-baru" align="center">
			   	 		<a class="btn btn-danger" href="produk-toko.php" role="button"><i class="fas fa-arrow-left"></i> Kembali</a>
		       			<button type="button" class="btn hijau"><i class="far fa-save"></i> Simpan</button>
			   	 	</div>
				</div>
			</div>
		</div>
	</div>
</div>


 <script>
      $('#summernote').summernote({
        placeholder: 'Masukkan Detail Dari Produk',
        tabsize: 2,
        height: 200
      });
    </script>

