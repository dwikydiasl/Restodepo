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
	@media (min-width: 1024px) and (max-width: 1224px) {

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
				<div class="">
					<div class="row" style="margin-bottom: 15px;">
						<div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">					
							<div class="detail-data-profil-dashboard">
								<div class="" >
									<div class="row">
										<div class="status-member-toko col">
											
										</div>
										<div class="status-member col" align="right">
											<a>
												<i class="fas fa-check-circle"></i> Verified
											</a>
										</div>
									</div>															
								</div>
								<div class="avatar-profil" align="center">
									<img src="assets/avatar_pembeli/foto/pembeli.jpg">
								</div>
								<div class="nama" align="center">
									<h6>Warung Upnormal</h6>
								</div>
								<div class="pengeluaran-bulanan" align="center">
									<h6>Total Pengeluaran Bulan ini :</h6>
									<h4>Rp. 5,895,443</h4>
								</div>							
							</div>
						</div>
						<div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
							<div class="ads"> 
								<div class="row">
									<div class="kotak-banner col-md-12">
										<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
										  <ol class="carousel-indicators">
										    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
										    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
										    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
										  </ol>
										  <div class="carousel-inner">
										    <div class="carousel-item active">
										      <img class="d-block w-100" src="assets/img/slide-dashboard-seller.png" alt="First slide">
										    </div>
										    <div class="carousel-item">
										      <img class="d-block w-100" src="assets/img/slide-dashboard-seller.png" alt="Second slide">
										    </div>
										    <div class="carousel-item">
										      <img class="d-block w-100" src="assets/img/slide-dashboard-seller.png" alt="Third slide">
										    </div>
										  </div>
										  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
										    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
										    <span class="sr-only">Previous</span>
										  </a>
										  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
										    <span class="carousel-control-next-icon" aria-hidden="true"></span>
										    <span class="sr-only">Next</span>
										  </a>
										</div>
									</div>								
								</div>
								<div class="row" style="margin-top: 30px">
									<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
										<div class="respon-penawaran" style="background-color: #fff; padding-bottom: 5px;" align="center">
											<h5>Respon Penawaran</h5>
											<div class="dashboard-info row" align="center" style="padding-top: 20px">
												<div class="direspon col-sm-6 col-md-6">
													<span>11</span>
													<h6>Direspon</h6>
												</div>
												<div class="dibatalkan col-sm-6 col-md-6">
													<span>11</span>
													<h6>Dibatalkan</h6>
												</div>
											</div>		
										</div>
									</div>
									<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6" >
										<div class="total-transaksi" style="background-color: #fff; ">
											<h5 align="center">Total Transaksi</h5>
											<div class="dashboard-info row">
												<div class="total col-md-12" align="center" style="padding-top: 21px; padding-bottom: 20px;">
												<span> 10 Produk</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>		
				</div>
				
				<div class="dashboard-line2">
					<div class="container">
						<div class="row" style="background-color: #fff; padding: 5px; border-radius: 5px;">
							<div class="detail-custom-invoice col-12 col-sm-12 col-md-12 col-lg-3">
								<div >
									<h5>Custom Invoice</h5>
									<h6>Dari : Toko Gudang Rose brand</h6>	
									<h6>No : IN-8788392</h6>
									<h6>No Resi : 898930200003 (Cargo Logistik) </h6>
									<h4>2 September 2018</h4>
								</div>
							</div>
							<div class="col-12 col-sm-12 col-md-12 col-lg-7">
								<div class="rekap-penjualan">
									<h5>Status Produk</h5>
									<div class="input-group" style="margin-top: 15px;">
										
									</div>
									<div class="row" style="margin-top: -13px;">
										<div class="col-4 col-md-4">
											<i class="fas fa-circle"></i>
										</div>
										<div class="col-4 col-md-4" align="center">
											<i class="fas fa-circle active"></i>
										</div>
										<div class="col-4 col-md-4" align="right">
											<i class="fas fa-circle"></i>
										</div>
									</div>
									<div class="row" ">
										<div class="col-4 col-md-4">
											<label>Pengiriman</label>
										</div>
										<div class="col-4 col-md-4" align="center">
											<label>Pengiriman Oleh Kurir</label>
										</div>
										<div class="col-4 col-md-4" align="right">
											<label>Produk Tiba</label>
										</div>
									</div>							
								</div>
							</div>
							<div class="col-12 col-sm-12 col-md-12 col-lg-2" style="padding-top: 45px;">
								<div class="status-terkini">
									<span>Dalam Proses</span>
								</div>
							</div>
						</div>
					</div>					
				</div>	

				<div class="dashboard-line2">
					<div class="container">
						<div class="row" style="background-color: #fff; padding: 5px; border-radius: 5px;">
							<div class="detail-custom-invoice col-md-4 col-lg-3">
								<div>
									<h5>Invoice Kedelai Hitam Khas...</h5>
									<h6>Dari : Toko Gudang Rose brand</h6>	
									<h6>No : IN-8788392</h6>
									<h6>No Resi : 898930200003 (Cargo Logistik) </h6>
									<h4>2 September 2018</h4>
								</div>
							</div>
							<div class="col-md-6 col-lg-7">
								<div class="rekap-penjualan">
									<h5>Status Produk</h5>
									<div class="input-group" style="margin-top: 15px;">
										
									</div>
									<div class="row" style="margin-top: -13px;">
										<div class="col-4 col-md-4">
											<i class="fas fa-circle"></i>
										</div>
										<div class="col-4 col-md-4" align="center">
											<i class="fas fa-circle active"></i>
										</div>
										<div class="col-4 col-md-4" align="right">
											<i class="fas fa-circle"></i>
										</div>
									</div>
									<div class="row" ">
										<div class="col-4 col-md-4">
											<label>Pengiriman</label>
										</div>
										<div class="col-4 col-md-4" align="center">
											<label>Pengiriman Oleh Kurir</label>
										</div>
										<div class="col-4 col-md-4" align="right">
											<label>Produk Tiba</label>
										</div>
									</div>							
								</div>
							</div>
							<div class="col-md-2 col-lg-2" style="padding-top: 45px;">
								<div class="status-terkini2">
									<span>Selesei</span>
								</div>
							</div>
						</div>
					</div>					
				</div>
			</div>
		</div>
	</div>
</div>
