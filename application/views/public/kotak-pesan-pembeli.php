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
						include "menu-dashboard.php";
					?>			
			</div>
			<div class="konten-dashboard col-md-8 col-lg-9 col-xl-10">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb" style="background-color: #32433C">
						<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
						<li class="breadcrumb-item active" aria-current="page" style="color: #FA7422 ">Kotak Pesan</li>
					</ol>
				</nav>
				<div class="kotak-pesan ">
					<div class="row">
						<div class="col-md-4" >
							<div class="pesan-masuk">
								<div class="cari-pesan">
									<div class="input-group">
										<span class="input-group-addon" id="sizing-addon2">
											<i class="fa fa-search "></i>
										</span>
									  	<input class="form-control form-control-sm" type="text" placeholder="Cari Pesan Masuk"  aria-describedby="sizing-addon2" value/>
									</div>
								</div>
								<div class="daftar-pesan-masuk">
									<div class="scrollbar" id="style-2">
								      	<div class="force-overflow">
								      		<div class="pesan">
												<div style="padding: 10px;">
													<h5>Produk Meses Coklat Enak</h5>
													<h6>Dari : PT Indofood Sukses Makmur, Tbk</h6>
													<h6>Senin, 2 September 2018 ; 20:10 PM</h6>
												</div>										
											</div>
											<div class="pesan">
												<div style="padding: 10px;">
													<h5>Produk Meses Coklat Enak</h5>
													<h6>Dari : PT Indofood Sukses Makmur, Tbk</h6>
													<h6>Senin, 2 September 2018 ; 20:10 PM</h6>
												</div>										
											</div>
											<div class="pesan active">
												<div style="padding: 10px;">
													<h5>Produk Meses Coklat Enak</h5>
													<h6>Dari : PT Indofood Sukses Makmur, Tbk</h6>
													<h6>Senin, 2 September 2018 ; 20:10 PM</h6>
												</div>										
											</div>
											<div class="pesan">
												<div style="padding: 10px;">
													<h5>Produk Meses Coklat Enak</h5>
													<h6>Dari : PT Indofood Sukses Makmur, Tbk</h6>
													<h6>Senin, 2 September 2018 ; 20:10 PM</h6>
												</div>										
											</div>	
								      	</div>
								    </div>											
								</div>
							</div>
						</div>
						<div class="col-md-8" >
							<div class="box-pesan">
								<div class="title-pesan">
									<div class="row">
										<div class="col">
											<h5>Penawaran Harga Barang dan Contoh</h5>
											<h6>PT Indofood Sukses Makmur, Tbk</h6>
										</div>
										<div class="col">
											
										</div>
									</div>
								</div>
								<div class="isi-pesan" >
									<div class="container">
										<div class="ketik-pesan" align="right">
											<div class="row">
												<div class="col-9 col-sm-9 col-md-8 col-lg-9 col-xl-10 text" align="right">
													<h5>Kalau pengiriman menggunakan logistic lain bisa engga ya ?</h5>
													<h6>Senin, 2 September 2018 ; 20:15 PM</h6>
												</div>
												<div class="col-3 col-sm-3 col-md-4 col-lg-3 col-xl-2">
													<img src="assets/avatar_pembeli/foto/p2.jpg">
												</div>
											</div>
										</div>
										<div class="balasan-pesan" align="left">
											<div class="row">
												<div class="col-3 col-sm-3 col-md-4 col-lg-3 col-xl-2" align="left">
													<img src="assets/avatar_pembeli/foto/p3.png">		
												</div>
												<div class="col-9 col-sm-9 col-md-8 col-lg-9 col-xl-10 text">
													<h5>Bisa, Mau kurir logistic apa ?</h5>
													<h6>Senin, 2 September 2018 ; 20:15 PM</h6>
												</div>
											</div>
										</div>
									</div>									
								</div>
								<div class="container">
									<div class="tulis-pesan">
										<div class="row">
											<div class="col-10 col-sm-9 col-md-9 col-lg-10">
												<div class="input-group">
												<textarea class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="Ketik Pesan...."></textarea>
											</div>	
											</div>
											<div class="col-2 col-sm-2 col-md-3 col-lg-2">
												<button type="button" class="btn orange">Kirim</button>
											</div>
										</div>														
									</div>
								</div>								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

