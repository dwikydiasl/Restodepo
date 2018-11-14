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
	.like{
	position: absolute;
	width:60px; 
    height:60px; 
    background: #fff;
    border-radius: 0 0 90px 0;
    display: none;
	}
	.like .fa-heart{
	color: #BDBDBD;
	margin-top: 15px;
	margin-left: 15px;
	font-size: 1.4em;
	}
	.card-body h5{
	font-size:14px;
	height: 50px; 
	font-weight: bold; 
	}
	.card-body h6{
		font-size:12px;
		font-weight: bold; 
	}
	.card-body p{
		font-size:10px;
	}
</style>

<div id="pencarian-produk">
	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb ">
			    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
			    <li class="breadcrumb-item"><a href="#">Bahan Baku</a></li>
			    <li class="breadcrumb-item active" aria-current="page" style="color: #FA7422 ">Makanan</li>
			</ol>
		</nav>
		<div class=" container">
			<div class="title-pencarian">
				<div class=" row">
					<div class="col-sm-8 col-md-6 col-lg-6 col-xl-6">
						<h6>Pencarian Bahan Baku Makanan</h6>
					</div>
					<div class="filter-produk col-sm-4 col-md-6 col-lg-6 col-xl-6" align="right">
						<a class="" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
						    <i class="fas fa-filter"></i> Filter
						</a>
					</div>
					<div class="col-md-12">
						<div class="collapse" id="collapseExample">
							<div class="panel-filter ">
							    <div class="row">
							    	<div class="col-md-3">
							    		<h6>Quantity</h6>
							    		<div class="form-check">
										  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
										  <label class="form-check-label" for="defaultCheck1">
										    Kurang dari 20 item 
										  </label>
										</div>
										<div class="form-check">
										  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
										  <label class="form-check-label" for="defaultCheck1">
										    Kurang dari 100 item 
										  </label>
										</div>
										<div class="form-check">
										  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
										  <label class="form-check-label" for="defaultCheck1">
										    Lebih dari 100 item 
										  </label>
										</div>
							    	</div>
							    	<div class="col-md-3">
							    		<div class="card-group-item">
											<header class="">
												<h6 class="title">Range Harga: <span>Rp.5.000.000</span> </h6>
											</header>
											<div class="">
												<input class="col-md-12 custom-range" min="0" max="1000000000" name="" type="range">
											</div> <!-- card-body.// -->
										</div>
							    	</div>
							    	<div class=" col-md-3">
							    		<div class="filter-lokasi">
							    			<h6 for="inputLokasi">Lokasi :</h6>
							    			<div class="lokasi">
							    				<select id="inputLokasi" class="form-control">
											        <option selected>Pilih Kota</option>
											        <option>...</option>
											      </select>
							    			</div>						      
							    		</div>				    		
							    	</div>
							    	<div class="col-md-2" style="padding-top: 27px;" align="center">
							    		<button type="button" class="btn orange">Cari</button>
							    	</div>
							    </div>
							</div>
						</div>
					</div>			
				</div>
			</div>			
		</div>		
		<div class="panel-pencarian-produk">
			<div class="row">
				<div class="col-12 col-sm-12 col-md-4 col-lg-3 col-xl-3 ">
					<div class="box-kiri-kategori ">
							<h6>CARI PRODUK BERDASARKAN</h6>
						<div id="accordion">
						  	<div class="">
							    <div class="hedaer-acordion" id="headingOne">
							        <a class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
							          	Terlaris
							        </a>
							    </div>
							    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
							       	<li><a href="">Ikan</a></li>
							       	<li><a href="">Telur</a></li>
							       	<li><a href="">Daging</a></li>
							       	<li><a href="">Tepung</a></li>
							       	<li><a href="">Makanan Beku</a></li>
							       	<li><a href="">Keju</a></li>
							    </div>
						  	</div>
						  	<div class="">
							    <div class="hedaer-acordion" id="headingTwo">
							    	<a class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
							          Bahan Baku
							        </a>
							    </div>
						    	<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
						    		<li><a href="">Bakery</a></li>
							       	<li><a href="">Makanan</a></li>
							       	<li><a href="">Minuman</a></li>
							       	<li><a href="">Pastry</a></li>
							       	<li><a href="">Candies</a></li>
							       	<li><a href="">Lauk Pauk</a></li>
						    	</div>
						  	</div>
						  	<div class="">
						    	<div class="hedaer-acordion" id="headingThree">
						     		<a class="btn btn-link" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
							          RestoDepo Warehouse
							        </a>
						    	</div>
							    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
							      	<div class="card-body">
							        	<li><a href="">Bakery</a></li>
								       	<li><a href="">Makanan</a></li>
								       	<li><a href="">Minuman</a></li>
								       	<li><a href="">Pastry</a></li>
								       	<li><a href="">Candies</a></li>
								       	<li><a href="">Lauk Pauk</a></li>	
							     	</div>
							    </div>
						  	</div>
						  	<div class="">
						    	<div class="hedaer-acordion" id="headingFour">
						     		<a class="btn btn-link" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
							          Minimum Order (MOQ)
							        </a>
						    	</div>
							    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
							      	<div class="card-body">
							        	<li><a href="">Bakery</a></li>
								       	<li><a href="">Makanan</a></li>
								       	<li><a href="">Minuman</a></li>
								       	<li><a href="">Pastry</a></li>
								       	<li><a href="">Candies</a></li>
								       	<li><a href="">Lauk Pauk</a></li>	
							     	</div>
							    </div>
						  	</div>
						</div>
					</div>					
				</div>

				<!--List Produk-->

				<div class="sort-list col-12 col-sm-12 col-md-8 col-lg-9 col-xl-9">
					<div class="row" style="margin-bottom: 10px;">
						<div class="col-12 col-md-12 col-lg-6 jml-prdk" align="left" style="padding-top: 5px; ">
							<h6>1 - 8 dari 1921 Produk Ditemukan</h6>
						</div>
						<div class="col-12 col-md-12 col-lg-6" align="right">
							<div class="form-group row" align="right">
							    <label for="staticEmail" class="col-sm-7 col-form-label" >Sort Berdasarkan :</label>
							    <div class="col-sm-5">
							    	<div class="list">
							    		<select class="form-control" id="exampleFormControlSelect1">
									      	<option>Produk Terbaru</option>
									      	<option>Produk Terlaris</option>
									    </select>
							    	</div>							      	
							    </div>
							</div>
						</div>
					</div>
					<div class="row marginv20">
						<?php foreach ($detail as $search_show ) {?>
						<div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 productCard" >
								<div class="box-lite">
									<div class="like" >
										<i class="fas fa-heart"></i>
									</div>
									<div class="cover100">							
										<img src="<?php echo base_url();?>assets/gambar_item/thumbnail/<?php echo $row_1['gambar']; ?>" class="img-responsive">
									</div>
									<a href="<?php echo base_url();?>produk/detail/<?php echo $search_show->permalink; ?>">
										<div class="card-body">
											<h5> <?php echo $search_show->nama ?> </h5>
											<h6> <?php echo $search_show->harga ?> </h6>
											<p> <?php echo $search_show->deskripsi_singkat ?> </p>
										</div>							
									</a>
								</div>														  
							</div>
							<?php 
						}
						?>
					</div>

					<!--
					<div class="row marginv20">
						<?php foreach ($detail as  $row_1 ) {?>				
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
					-->

					<!--pagination-->

					<nav aria-label="Page navigation example">
					  <ul class="pagination justify-content-center">
					    <li class="page-item">
					      <a class="page-link" href="#" aria-label="Previous">
					        <span aria-hidden="true">&laquo;</span>
					        <span class="sr-only">Previous</span>
					      </a>
					    </li>
					    <li class="page-item active"><a class="page-link" href="#">1</a></li>
					    <li class="page-item"><a class="page-link" href="#">2</a></li>
					    <li class="page-item"><a class="page-link" href="#">3</a></li>
					    <li class="page-item">
					      <a class="page-link" href="#" aria-label="Next">
					        <span aria-hidden="true">&raquo;</span>
					        <span class="sr-only">Next</span>
					      </a>
					    </li>
					  </ul>
					</nav>


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