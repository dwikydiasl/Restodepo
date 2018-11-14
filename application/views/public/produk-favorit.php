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
	@media screen and (max-width: 670px) {
		#header1{
		display: none;
		position: block;
	}
	@media (min-width: 765px) and (max-width: 909px) { 
		.card-body h5{
			padding-bottom: 5px;
		}
		.card-body h6{
			padding-bottom: 5px;
		}
	}
	#header2{
		border-bottom: 2px solid rgba(0, 0, 0, 0.15);
		position: none;
	}
	}
</style>

<div id="dashboard">
	<div class="container-fluid">
		<div class="row">
			<div class="menu-dashboard col-md-4 col-lg-3 col-xl-2">
					<?php
						include "menu-dashboard.php";
					?>			
			</div>
			<div class="konten-dashboard  col-md-8 col-lg-9 col-xl-10">
				<div class="container">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb" style="background-color: #32433C">
							<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
							<li class="breadcrumb-item"><a href="#">Orderan Saya</a></li>
							 <li class="breadcrumb-item active" aria-current="page" style="color: #FA7422 ">Favorit</li>
						</ol>
					</nav>
					<div class="produk-terbeli">
						<div class="row">
							<div class="col-8 col-sm-8 col-md-8 col-lg-9">
								<h6>Produk yang pernah dibeli</h6>
							</div>
							<div class="filter-produk-favorit col-4 col-sm-4 col-md-4 col-lg-3">
								<div class="input-group">
									<span class="input-group-addon" id="sizing-addon2">
										<i class="fa fa-search "></i>
									</span>
								  	<input class="form-control form-control-sm" type="text" placeholder="Cari nama produk"  aria-describedby="sizing-addon2" value/>	
								  					 
								</div>	
							</div>
						</div>
						<div class="row marginv20">
							<div class="col-6 col-sm-6 col-md-6 col-lg-3 productCard" >
								<div class="box-lite">
									<h4>PT. Panganmu .tbk</h4>
									<div class="like" >
										<i class="fas fa-heart"></i>
									</div>
									<div class="cover100">							
										<img src="assets/img/produk-kelas-tepung.jpg" class="img-responsive">
									</div>
									<a href="">
										<div class="card-body">
											<h5>Tepung Beras Indrayanti </h5>
											<h6>Rp. 120k - 150k / box</h6>
											<p>Minimal Order 10 Box</p>
										</div>							
									</a>									
								</div>
								<div class="btn-beli-lagi">
									<button type="button" class="btn hijau-outline  btn-block">
										<i class="fas fa-redo"></i> Beli Lagi
									</button>
								</div>												  
							</div>
							<div class="col-6 col-sm-6 col-md-6 col-lg-3 productCard" >
								<div class="box-lite">
									<h4>PT. Panganmu .tbk</h4>
									<div class="like" >
										<i class="fas fa-heart"></i>
									</div>
									<div class="cover100">
										<img src="assets/img/produk-kelas-minyak.jpg" class="img-responsive">
									</div>
									<a href="">
										<div class="card-body">
											<h5>Minyak Zaitun </h5>
											<h6>Rp. 120k - 150k / box</h6>
											<p>Minimal Order 10 Box</p>
										</div>							
									</a>
								</div>
								<div class="btn-beli-lagi">
									<button type="button" class="btn hijau-outline btn-block">
										<i class="fas fa-redo"></i> Beli Lagi
									</button>
								</div>							  
							</div>
							<div class="col-6 col-sm-6 col-md-6 col-lg-3 productCard" >
								<div class="box-lite">
									<h4>PT. Panganmu .tbk</h4>
									<div class="like" >
										<i class="fas fa-heart"></i>
									</div>
									<div class="cover100">
										<img src="assets/img/produk-kelas-susu.jpg" class="img-responsive">
									</div>
									<a href="">
										<div class="card-body">
											<h5>Susu Sapi </h5>
											<h6>Rp. 120k - 150k / box</h6>
											<p>Minimal Order 10 Box</p>
										</div>							
									</a>
								</div>
								<div class="btn-beli-lagi">
									<button type="button" class="btn hijau-outline btn-block">
										<i class="fas fa-redo"></i> Beli Lagi
									</button>
								</div>						  
							</div>
							<div class="col-6 col-sm-6 col-md-6 col-lg-3 productCard" >
								<div class="box-lite">
									<h4>PT. Panganmu .tbk</h4>
									<div class="like" >
										<i class="fas fa-heart"></i>
									</div>
									<div class="cover100">
										<img src="assets/img/produkkelas-minuman-instan.jpg" class="img-responsive">
									</div>
									<a href="">
										<div class="card-body">
											<h5>Minuman  </h5>
											<h6>Rp. 120k - 150k / box</h6>
											<p>Minimal Order 10 Box</p>
										</div>							
									</a>
								</div>
								<div class="btn-beli-lagi">
									<button type="button" class="btn hijau-outline btn-block">
										<i class="fas fa-redo"></i> Beli Lagi
									</button>
								</div>							  
							</div>
						</div>

						<!--pagination-->

						<nav aria-label="Page navigation example">
						  <ul class="pagination justify-content-end">
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




					<!---Produk Favorit-->

					<div class="produk-favorit">
						<div class="row">
							<div class="col-8 col-sm-8 col-md-8 col-lg-9">
								<h6>Produk Favorit</h6>
							</div>
							<div class="filter-produk-favorit col-4 col-md-4 col-sm-3 col-lg-3">
								<div class="input-group">
									<span class="input-group-addon" id="sizing-addon2">
										<i class="fa fa-search "></i>
									</span>
								  	<input class="form-control form-control-sm" type="text" placeholder="Cari nama produk"  aria-describedby="sizing-addon2" value/>  					 
								</div>	
							</div>
						</div>
						<div class="row marginv20">
							<div class="col-6 col-sm-6 col-md-6 col-lg-3  productCard" >
								<div class="box-lite">
									<div class="like" >
										<i class="fas fa-heart"></i>
									</div>
									<div class="cover100">							
										<img src="assets/img/produk-kelas-tepung.jpg" class="img-responsive">
									</div>
									<a href="">
										<div class="card-body">
											<h5>Tepung Beras Indrayanti </h5>
											<h6>Rp. 120k - 150k / box</h6>
											<p>Minimal Order 10 Box</p>
										</div>							
									</a>
								</div>
								<div class="btn-beli-lagi">
									<button type="button" class="btn hijau-outline btn-block">
										Request Order
									</button>
								</div>														  
							</div>
							<div class="col-6 col-sm-6 col-md-6 col-lg-3  productCard" >
								<div class="box-lite">
									<div class="like" >
										<i class="fas fa-heart"></i>
									</div>
									<div class="cover100">
										<img src="assets/img/produk-kelas-minyak.jpg" class="img-responsive">
									</div>
									<a href="">
										<div class="card-body">
											<h5>Minyak Zaitun </h5>
											<h6>Rp. 120k - 150k / box</h6>
											<p>Minimal Order 10 Box</p>
										</div>							
									</a>
								</div>
								<div class="btn-beli-lagi">
									<button type="button" class="btn hijau-outline btn-block">
										Request Order
									</button>
								</div>							  
							</div>
							<div class="col-6 col-sm-6 col-md-6 col-lg-3  productCard" >
								<div class="box-lite">
									<div class="like" >
										<i class="fas fa-heart"></i>
									</div>
									<div class="cover100">
										<img src="assets/img/produk-kelas-susu.jpg" class="img-responsive">
									</div>
									<a href="">
										<div class="card-body">
											<h5>Susu Sapi </h5>
											<h6>Rp. 120k - 150k / box</h6>
											<p>Minimal Order 10 Box</p>
										</div>							
									</a>
								</div>
								<div class="btn-beli-lagi">
									<button type="button" class="btn hijau-outline btn-block">
										Request Order
									</button>
								</div>						  
							</div>
							<div class="col-6 col-sm-6 col-md-6 col-lg-3  productCard" >
								<div class="box-lite">
									<div class="like" >
										<i class="fas fa-heart"></i>
									</div>
									<div class="cover100">
										<img src="assets/img/produkkelas-minuman-instan.jpg" class="img-responsive">
									</div>
									<a href="">
										<div class="card-body">
											<h5>Minuman  </h5>
											<h6>Rp. 120k - 150k / box</h6>
											<p>Minimal Order 10 Box</p>
										</div>							
									</a>
								</div>
								<div class="btn-beli-lagi">
									<button type="button" class="btn hijau-outline btn-block">
										Request Order
									</button>
								</div>							  
							</div>
						</div>

						<!--pagination-->

						<nav aria-label="Page navigation example">
						  <ul class="pagination justify-content-end">
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
</div>