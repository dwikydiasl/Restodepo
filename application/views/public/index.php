<?php
include "header1.php";
?>
<?php
include "header2.php";
?>

<div id="bg-index" >
	<div id="konten1">
    	<div class="container">
    		<div class="btn-konten-low" align="right" style="padding-top: 60px; margin-bottom: 50px;">
    			<a href="pencarian-produk.php" class="btn-konten1">
    				LOW MOQ
    				on +100 product
    			</a>
    		</div>
    		<div class="container">
    			<div class="row">
	    			<div class="bahan-baku col-md-12 col-lg-3">
	    				<h6>Bahan Baku</h6>
	    				<div class="row">
	    					<div class="list-bahan line col-6 col-md-6">
	    						<a href="pencarian-produk.php">
	    							<img src="assets/icon/bakery.svg"> <span> Bakery </span> 
	    						</a>    						
	    					</div>
	    					<div class="list-bahan col-6 col-md-6 ">
	    						<a href="pencarian-produk.php">
	    							<img src="assets/icon/makanan.svg"><span> Makanan</span> 
	    						</a>
	    					</div>
	    				</div>
	    				<div class="row">
	    					<div class="list-bahan line col-6 col-md-6 ">
	    						<a href="pencarian-produk.php">
	    							<img src="assets/icon/minuman.svg"> <span> Minuman </span> 
	    						</a>    						
	    					</div>
	    					<div class="list-bahan col-6 col-md-6">
	    						<a href="pencarian-produk.php">
	    							<img src="assets/icon/pastry.svg"><span> Pastry</span> 
	    						</a>
	    					</div>
	    				</div>
	    				<div class="row">
	    					<div class="list-bahan line col-6 col-md-6 ">
	    						<a href="pencarian-produk.php">
	    							<img src="assets/icon/candies.svg"> <span> Candies </span> 
	    						</a>    						
	    					</div>
	    					<div class="list-bahan col-6 col-md-6">
	    						<a href="pencarian-produk.php">
	    							<img src="assets/icon/sirup.svg"><span> Sirup</span> 
	    						</a>
	    					</div>
	    				</div>
	    				<div class="row">
	    					<div class="list-bahan line col-6 col-md-6 ">
	    						<a href="pencarian-produk.php">
	    							<img src="assets/icon/laukpauk.svg"> <span> Lauk Pauk </span> 
	    						</a>    						
	    					</div>
	    					<div class="list-bahan kategori-selanjutnya col-6 col-md-6">
	    						<a href="<?php echo base_url('produk/kategori_lainnya');?>">
	    							<img src="assets/icon/button-lain.svg" > <span> Lainnya</span> 
	    						</a>
	    					</div>    					   					
	    				</div>
	    			</div>
	    			<div class="baner-premium col-md-12 col-lg-5">
	    				<div class="banner row">
	    					<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
							  <div class="carousel-inner">
							    <div class="carousel-item active">
							      <img class="d-block w-100" src="assets/img/banner-slide.jpg" alt="First slide">
							    </div>
							    <div class="carousel-item">
							      <img class="d-block w-100" src="assets/img/banner-slide.jpg" alt="Second slide">
							    </div>
							    <div class="carousel-item">
							      <img class="d-block w-100" src="assets/img/banner-slide.jpg" alt="Third slide">
							    </div>
							  </div>
							  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
							    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
							    <span class="sr-only">Previous</span>
							  </a>
							  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
							    <span class="carousel-control-next-icon" aria-hidden="true"></span>
							    <span class="sr-only">Next</span>
							  </a>
							</div>
	    				</div>
	    				<div class="produk-premium row">
	    					<div class="container"> 
	    						<div class="title-premium row">
		    						<div class="col-md-8" align="left">
		    							<h6>Produk Supplier Terpercaya</h6> 
			    					</div>
			    					<div class="col-md-4" align="right">
			    						<a href="">Lihat Semua <i class="fas fa-chevron-right"></i></a>
			    					</div>
			    				</div>
	    					</div>	    					
		    				<div class="container">
		    					<div class="row">
		    						<div class="col-12 col-md-6 col-sm-12">
			    						<a href=""><img src="assets/img/img-premium-1.png" width="100%"></a>
				    				</div>
				    				<div class="col-12 col-md-6 col-sm-12">
				    					<a href=""><img src="assets/img/img-premium-2.png" width="100%"></a>
				    				</div>
		    					</div>		    					
		    				</div>    									
	    				</div>
	    			</div>
	    			<div class="permintaan col-md-12 col-lg-4">
	    				<h5>Ajukan Permintaan Penawaran !</h5>
	    				<form  method="POST">
						  <div class="form-check">
						    <input type="checkbox" class="form-check-input" id="exampleCheck1">
						    <label class="form-check-label" for="exampleCheck1">Minta Penawaran Harga</label>
						  </div>
						  <div class="form-check">
						    <input type="checkbox" class="form-check-input" id="exampleCheck1">
						    <label class="form-check-label" for="exampleCheck1">Minta Penawaran Contoh Barang</label>
						  </div>
						  <div class="form-check" style="margin-bottom: 25px;">
						    <input type="checkbox" class="form-check-input" id="exampleCheck1">
						    <label class="form-check-label" for="exampleCheck1">Minta Penawaran Contoh Barang dan Harga</label>
						  </div>
						  <input type="email" class="form-control" name="nama_produk" id="nama_produk" placeholder="Nama Produk">
						  <div class="form-row">
						    <div class="col-7">
						      <input type="number" class="form-control" placeholder="Kuantitas">
						    </div>
						    <div class="col">
						      	<div class="input-group-prepend">
								</div>
								<select class="form-control" id="select_rle-satuan">
								    <option value="ton">Ton</option>
								    <option value="Kg">Kg</option>
								    <option value="dus">Dus</option>
								</select>
						    </div>
						  </div>
						  <div class="btn-ajukan" align="right">
						  	<a href="<?php echo base_url('produk/ajukan_penawaran_produk');?>" type="submit" class="btn orange">Ajukan</a>
						  </div>						  
						</form>
	    			</div>
	    		</div>
    		</div>    		
    	</div>
    </div>

    <!--Konten2-->

    <div id="konten2">
    	<div class="container">
    		<div class="box-konten2">
    			<div class="row">
	    			<div class="col-12 col-sm-12 col-md-12 col-lg-3">
	    				<div class="gambar1">
	    					<img src="assets/img/img-warehouse.jpg" width="100%">
	    				</div>
	    			</div>
	    			<div class="col-12 col-sm-12 col-md-12 col-lg-9">
	    				<div class="konten-gambar">
	    					<div class="row">
		    					<div class="list-gambar col-6 col-sm-6 col-md-6 col-lg-3">
		    						<div class="hovereffect">							        
					    				<a href="<?php echo base_url(); ?>Cari/klikKategori/search/tepung">
										    <img class="img-responsive" src="assets/gambar_toko/foto/produk-kelas-tepung.jpg"  alt="">
										    <div class="overlay">
										        <h2>Tepung</h2>
										    </div>
										</a>
									</div>
		    					</div>
		    					<div class="list-gambar col-6 col-sm-6 col-md-6 col-lg-3">
		    						<div class="hovereffect">
				    					<a href="<?php echo base_url(); ?>Cari/carikategori/search/minyak">
										    <img class="img-responsive" src="assets/gambar_toko/foto/produk-kelas-minyak.jpg"  alt="">
										    <div class="overlay">
										        <h2>Minyak</h2>
										    </div>
									    </a>
									</div> 
		    					</div>
		    					<div class="list-gambar col-6 col-sm-6 col-md-6 col-lg-3">
		    						<div class="hovereffect">
				    					<a href="<?php echo base_url(); ?>Cari/carikategori/search/pasta">
										    <img class="img-responsive" src="assets/gambar_toko/foto/produk-kelas-pasta.jpg"  alt="">
										    <div class="overlay">
										       	<h2>Pasta</h2>
										    </div>
									    </a>
									</div> 
		    					</div>
		    					<div class="list-gambar col-6 col-sm-6 col-md-6 col-lg-3">
		    						<div class="hovereffect">
				    					<a href="<?php echo base_url(); ?>Cari/carikategori/search/keju">
										    <img class="img-responsive" src="assets/gambar_toko/foto/produk-kelas-keju.jpg"  alt="">
										    <div class="overlay">
										        <h2>Keju</h2>
										    </div>
									    </a>
									</div> 
		    					</div>
		    				</div>
		    				<!--Baris 2-->
		    				<div class="row" style="margin-top: 20px;">
		    					<div class="list-gambar col-6 col-sm-6 col-md-6 col-lg-3">
		    						<div class="hovereffect">
			    						<a href="<?php echo base_url(); ?>Cari/carikategori/search/mentega">
									        <img class="img-responsive" src="assets/gambar_toko/foto/produk-kelas-butter.jpg"   alt="">
									        <div class="overlay">
									           <h2>Mentega</h2>
									        </div>
								        </a>
								    </div>
		    					</div>
		    					<div class="list-gambar col-6 col-sm-6 col-md-6 col-lg-3">
		    						<div class="hovereffect">
			    						<a href="<?php echo base_url(); ?>Cari/carikategori/search/minuman">
									        <img class="img-responsive" src="assets/gambar_toko/foto/produk-kelas-teh.jpg"   alt="">
									        <div class="overlay">
									           <h2>Teh Celup</h2>
									        </div>
								        </a>
								    </div> 
		    					</div>
		    					<div class="list-gambar col-6 col-sm-6 col-md-6 col-lg-3">
		    						<div class="hovereffect">
			    						<a href="<?php echo base_url(); ?>Cari/carikategori/search/minuman_instan">
									        <img class="img-responsive" src="assets/gambar_toko/foto/produkkelas-minuman-instan.jpg"   alt="">
									        <div class="overlay">
									           <h2>Minuman Instan</h2>
									        </div>
								        </a>
								    </div>  
		    					</div>
		    					<div class="list-gambar col-6 col-sm-6 col-md-6 col-lg-3">
		    						<div class="hovereffect">
			    						<a href="<?php echo base_url(); ?>Cari/carikategori/search/susu">
									        <img class="img-responsive"  src="assets/gambar_toko/foto/produk-kelas-susu.jpg"   alt="">
									        <div class="overlay">
									           <h2>Susu</h2>
									        </div>
								    	</a>
								    </div> 
		    					</div>
		    				</div>
	    				</div>
	    			</div>		    		
	    		</div>
    		</div>  		
    	</div>
    </div>

    <!--Produk Terlaris-->

    <div id="rekomendasi">
    	<div class="container">
    		<div class="title-rekomendasi row">
				<div class="col" align="left">
					<p>Produk Terlaris</p>
				</div>
				<div class="col" align="right">
					<a href="<?php echo base_url('produk/produk_terlaris_lainnya');?>" class="btn-rekom">Selengkapnya  <i class="fas fa-angle-right"></i></a>
				</div>
			</div>

			<!--tabel Produk Terlaris-->

			<div class="row marginv20">
				<?php foreach ($list_produk_terlaris as  $row_1 ) {?>
				
				<div class="col-6 col-sm-6 col-md-6 col-lg-3 productCard" >
					<div class="box-lite">
						<div class="like" >
							<i class="fas fa-heart"></i>
						</div>
						<div class="cover100">
							<img src="<?php echo base_url();?>assets/gambar_item/thumbnail/<?php echo $row_1['gambar']; ?>" class="img-responsive">
						</div>
						<a href="<?php echo base_url();?>produk/detail/<?php echo $row_1['permalink']; ?>">
							<div class="card-body">
								<h5><?php echo $row_1['nama']; ?></h5>
								<h6><?php echo $row_1['harga']; ?></h6>
								<p><?php echo $row_1['deskripsi_singkat']; ?></p>
							</div>							
						</a>
					</div>							  
				</div>
				<?php 
					}
				?>
			</div>
    	</div>
    </div>

    <!--Produk Terbaru-->

     <div id="baru-lihat">
    	<div class="container">
    		<div class="title-baru-lihat row">
				<div class="col" align="left">
					<p>Produk Terbaru</p>
				</div>
				<div class="col" align="right">
					<a href="<?php echo base_url('produk/produk_terbaru_lainnya');?>" class="btn-rekom">Selengkapnya <i class="fas fa-angle-right"></i></a>
				</div>
			</div>

			<!--Tabel Produk Terbaru-->

			<div class="row marginv20">
				<?php foreach ($list_produk_terbaru as  $row_1 ) {?>				
				<div class="col-6 col-sm-6 col-md-6 col-lg-3 productCard" >
					<div class="box-lite">
						<div class="like" >
							<i class="fas fa-heart"></i>
						</div>
						<div class="cover100">
							<img src="<?php echo base_url();?>assets/gambar_item/thumbnail/<?php echo $row_1['gambar']; ?>" class="img-responsive">
						</div>
						<a href="<?php echo base_url();?>produk/detail/<?php echo $row_1['permalink']; ?>">
							<div class="card-body">
								<h5><?php echo $row_1['nama']; ?></h5>
								<h6><?php echo $row_1['harga']; ?></h6>
								<p><?php echo $row_1['deskripsi_singkat']; ?></p>
							</div>							
						</a>
					</div>							  
				</div>
				<?php 
					}
				?>				
			</div>
    	</div>
    </div>

</div>

   

<?php
include "footer1.php";
?>
<?php
include "footer2.php";
?>