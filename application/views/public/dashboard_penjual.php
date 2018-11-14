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
</style>

<div id="dashboard">
	<div class="container-fluid">
		<div class="row">
			<div class="menu-dashboard col-sm-4 col-md-3 col-lg-3 col-xl-2">
				<?php
					include "menu-dashboard-penjual.php";
				?>			
			</div>
			<div class="konten-dashboard col-sm-8 col-md-9 col-lg-9 col-xl-10">
				<div class="">
					<div class="row" style="margin-bottom: 15px;">
						<div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">						
							<div class="detail-data-profil-dashboard">
								<div class="" >
									<div class="row">
										<div class="status-member-toko col">
											<span>
												Gold
											</span>
										</div>
										<div class="status-member col" align="right">
											<a>
												<i class="fas fa-check-circle"></i> Verified
											</a>
										</div>
									</div>															
								</div>
								<div class="avatar-profil" align="center">
									<img src="<?php echo base_url();?>assets/avatar_pembeli/foto/">
								</div>
								<div class="nama" align="center">
									<h6><?php echo $detail_penjual['nama_toko'] ?></h6>
								</div>
								<div class="pengeluaran-bulanan" align="center">
									<h6>Total Penjualan Bulan ini :</h6>
									<h4>Rp. 50,895,443</h4>
								</div>							
							</div>
						</div>
						<div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
							<div class="ads"> 
								<div class="row">
									<div class=" col-md-12">
										<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
										  <ol class="carousel-indicators">
										    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
										    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
										    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
										  </ol>
										  <div class="carousel-inner">
										    <div class="carousel-item active">
										      <img class="d-block w-100" src="<?php echo base_url();?>assets/img/slide-dashboard-buyer.png" alt="First slide">
										    </div>
										    <div class="carousel-item">
										      <img class="d-block w-100" src="<?php echo base_url();?>assets/img/slide-dashboard-buyer.png" alt="Second slide">
										    </div>
										    <div class="carousel-item">
										      <img class="d-block w-100" src="<?php echo base_url();?>assets/img/slide-dashboard-buyer.png" alt="Third slide">
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
									<div class="col-sm-6 col-md-6 col-lg-6 ">
										<div class="total-transaksi" style="background-color: #fff; ">
											<h5 align="center">Respon Penawaran</h5>
											<div class="dashboard-info row">
												<div class="total col-md-12" align="center" style="padding-top: 21px; padding-bottom: 20px;">
												<span> 10 Dikirim</span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-6 col-md-6 col-lg-6 " >
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
				
				<div class="row" style="margin-bottom: 90px;">
					<div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
						<div class="">
							<div class="respon-penawaran" style="background-color: #fff; padding-bottom: 15px;" align="center">
								<h5>Kotak Pesan</h5>
								<div class="dashboard-info row" align="center" style="padding-top: 20px">
									<div class="direspon col-sm-6 col-md-6">
										<h6>Direspon</h6>
										<span>11</span>									
									</div>
									<div class="dibatalkan col-sm-6 col-md-6">
										<h6>Dibatalkan</h6>
										<span>11</span>									
									</div>
								</div>		
							</div>							
						</div>
					</div>
					<div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
						<div class="">
							<div class="respon-penawaran" style="background-color: #fff; padding-bottom: 15px;" align="center">
								<h5>Kotak Pesan</h5>
								<div class="dashboard-info row" align="center" style="padding-top: 20px">
									<div class="direspon col-sm-6 col-md-6">
										<h6>Direspon</h6>
										<span>11</span>									
									</div>
									<div class="dibatalkan col-sm-6 col-md-6">
										<h6>Dibatalkan</h6>
										<span>11</span>									
									</div>
								</div>		
							</div>							
						</div>
					</div>
					<div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
						<div class="">
							<div class="respon-penawaran" style="background-color: #fff; padding-bottom: 15px;" align="center">
								<h5>Penjualan Produk</h5>
								<div class="dashboard-info row" align="center" style="padding-top: 20px">
									<div class="direspon col-sm-6 col-md-6">
										<h6>Menunggu Invoice</h6>
										<span>11</span>									
									</div>
									<div class="dibatalkan col-sm-6 col-md-6">
										<h6>Dana Masuk</h6>
										<span>11</span>									
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
