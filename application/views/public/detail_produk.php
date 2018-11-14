<style type="text/css">
	#header1{
		display: none;
		}
</style>

<?php
include "header1.php";
?>
<?php
include "header2.php";
?>


<div id="detail-produk">
	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
			    <li class="breadcrumb-item"><a href="pencarian-produk.php">Bahan Baku</a></li>
			    <li class="breadcrumb-item"><a href="pencarian-produk.php">Makanan</a></li>
			    <li class="breadcrumb-item active" aria-current="page" style="color: #FA7422 ">Pasta</li>
			</ol>
		</nav>
		<div class="panel-detail-produk">
			<div class="row">
				<div class="nama-produk col-12 col-md-6 col-lg-7 col-xl-8">
					<p><?php echo $detail['nama']; ?> <span> <i class="fas fa-check-circle"></i> Verifeid</span> </p>
				</div>
				<div class="col-4 col-md-1 col-lg-1 col-xl-1" align="right">
					<i class="fas fa-heart"></i>
				</div>
				<div class="col-8 col-md-5 col-lg-4 col-xl-3">
					<div class="kualits-produk " align="center">
						<i class="fas fa-flag"></i> Tandai Sebagai Kualitas Buruk
					</div>					
				</div>
			</div>
			<!--Konten Baris 1-->
			<div class="row">
				<div class="col-md-6 col-lg-3 col-xl-3">
					<img src="<?php echo base_url();?>assets/gambar_item/thumbnail/">
				</div> 
				<div class="col-md-6 col-lg-3 col-xl-3">
					<img src="<?php echo base_url();?>assets/gambar_item/thumbnail/produk-kelas-susu.jpg">
				</div>
				<div class="col-md-12 col-lg-6 col-xl-6">
					<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
					  	<div class="carousel-inner">
						    <div class="carousel-item active">
						      <img class="d-block w-100" src="<?php echo base_url();?>assets/gambar_toko/thumbnail/slide-img-gudang.png" alt="First slide">
						    </div>
						    <div class="carousel-item">
						      <img class="d-block w-100" src="<?php echo base_url();?>assets/gambar_toko/thumbnail/slide-img-gudang.png" alt="Second slide">
						    </div>
						    <div class="carousel-item">
						      <img class="d-block w-100" src="<?php echo base_url();?>assets/gambar_toko/thumbnail/slide-img-gudang.png" alt="Third slide">
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
			</div>
			<!--Konten Baris 2-->
			<div class="row" style="margin-top: 15px">
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-12 col-lg-6 col-xl-6">
							<img src="<?php echo base_url();?>assets/gambar_item/thumbnail/produk-kelas-minyak.jpg">
						</div>
						<div class="col-md-12 col-lg-6 col-xl-6">
							<img src="<?php echo base_url();?>assets/gambar_item/thumbnail/rekomendasi-2.png">
						</div>
					</div>
					<div class="info-toko">
						<div class="row">
							<!--info Kiri-->
							<div class="col-12 col-sm-7 col-md-12 col-lg-7">
								<div class="row">
									<div class="col-md-8 col-sm-6">
										<p><?php echo $toko['nama_toko'] ?></p>
									</div>
									<div class="col-md-4 col-4">
										
									</div>
								</div>
								<div class="detail-toko row">
									<div class="col-md-12">
										<div class="row">
											<div class="col-6 col-md-5">
												Lokasi Usaha
											</div>
											<div class="col-6 col-md-7">
												: Yogyakarta
											</div>
										</div>
										<div class="row">
											<div class="col-6 col-md-5">
												Status Member
											</div>
											<div class="kategori-toko col-6 col-md-7">
												: Gold
											</div>
										</div>
										<div class="row">
											<div class="col-6 col-md-5">
												No Izin Usaha
											</div>
											<div class="col-6 col-md-7">
												: 434215435245435
											</div>
										</div>
										<div class="row">
											<div class="col-6 col-md-5">
												Waktu Respon
											</div>
											<div class="col-6 col-md-7">
												: < 24 Jam
											</div>
										</div>
									</div>								
								</div>							
							</div>
							<!--info Kanan-->
							<div class="info-kanan col-12 col-sm-5 col-md-12 col-lg-5">
								<div class="row">
									<div class="col-md-10">
										<p>Produk yang sudah dikirim
									</div>
									<div class="col-md-2">
											
									</div>
								</div>
								<div class="produk-terkirim">
									<h6>Total 18.000 Item</h6>
									<p>Jangkauan Penjualan :</p>
									<span>Surabaya, solo, Jakarta, Madiun</span>
								</div>
							</div>
						</div>						
					</div>
				</div>
				<div class="col-md-6">
					<div class="deskripsi-produk-detail">
						<div class="row">
							<div class="no-sertifikat col-6 col-md-6">
								<p>Sertifikat Produk : <span><?php echo $detail['kode']; ?></span></p>
							</div>
							<div class="col-6 col-md-6" align="right">
								<div class="btn-chat-sup">
									<a href=""  data-toggle="modal" data-target="#chatPembeli">Chat Supplier</a>
								</div>								
							</div>
						</div>
						<div class="harga-produk">
							<h5><?php echo $detail['harga']; ?></h5>
							<h6><?php echo $detail['deskripsi_singkat']; ?></h6>
						</div>
						<div class="permintaan-produk">
							<div class="title-permintaan">
								<h6>REQUEST PRODUK</h6>
							</div>
							<div class="form-row">
							    <div class="col-md-4">
							    	<div class="form-group">
							    		<input type="number" class="form-control form-control-sm" id="inputCity" placeholder="Qty">
							    	</div>							      
							    </div>
							    <div class=" col-md-4">
							    	<div class="form-group">
							    		<select id="inputState" class="form-control form-control-sm">
								        	<option selected>Pilih Unit</option>
								        	<option>Box</option>
								      	</select>
							    	</div>							      	
							    </div>
							    <div class="col-md-12">
							    	<div class="input-group ">
										<textarea class="form-control form-control-sm" id="exampleFormControlTextarea1" rows="2" placeholder="Masukkan Catatan "></textarea>	 
									</div>
							    </div>																	
							</div>
							<div class="row" style="margin-top: 10px;">
								<div class="kirim-barang col-md-6">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
										<label class="form-check-label" for="defaultCheck1">
										    Alamat sesuai data profil
										</label>
									</div>
								</div>
								<div class="col-md-6" align="right" >
									<button type="button" class="btn hijau" >Kirim</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!--Konten Baris 3-->

			<div class="info-detail-produk row">
				<div class="col-md-6">
					<h6>Detail Produk</h6>
					<p>
						<?php echo $detail['deskripsi_full']; ?>
					</p>
					<table class="table">
					  <thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">First</th>
					      <th scope="col">Last</th>
					      <th scope="col">Handle</th>
					    </tr>
					  </thead>
					  <tbody>
					    <tr>
					      <th scope="row">1</th>
					      <td>Mark</td>
					      <td>Otto</td>
					      <td>@mdo</td>
					    </tr>
					    <tr>
					      <th scope="row">2</th>
					      <td>Jacob</td>
					      <td>Thornton</td>
					      <td>@fat</td>
					    </tr>
					    <tr>
					      <th scope="row">3</th>
					      <td>Larry</td>
					      <td>the Bird</td>
					      <td>@twitter</td>
					    </tr>
					  </tbody>
					</table>
				</div>
				<div class="col-md-6">					
					<h6>Pengirim dan Pengemasan</h6>
					<p>
						Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book
					</p>
					<h6>FAQ</h6>
					<p>
						Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book
					</p>
					<div class="tags">
						<h6>Tags</h6>
						<p><?php echo $kategori['nama'] ?></p>
					</div>
				</div>
			</div>
		</div>

		<div id="rekomendasi" style="margin-top:20px">
	    	<div class="">
	    		<div class="title-rekomendasi row">
					<div class="col" align="left">
						<p>Produk lain yang di jual</p>
					</div>
					<div class="col" align="right">
						<a href="" class="btn-rekom">Selengkapnya  <i class="fas fa-angle-right"></i></a>
					</div>
				</div>

				<!--Produk lain yang di jual-->

				<div class="row marginv20">
					<?php foreach ($produk_lainnya as  $row_1 ) {?>
				
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
</div>



<?php
include "footer1.php";
?>
<?php
include "footer2.php";
?>

<!-- Modal -->
<div class="modal fade" id="chatPembeli" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $detail['nama']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form>
      	<div class="modal-body">      	
	      	<label for="exampleFormControlTextarea1">Tulis Pesan :</label>
	       	<div class="form-group" style="border: 1px solid #E3E3E3;">		   
				<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
			</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
	        <button type="submit" class="btn btn-danger">Kirim</button>
	      </div>
      </form>      
    </div>
  </div>
</div>