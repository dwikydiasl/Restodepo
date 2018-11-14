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
			<div class="konten-dashboard col-md-8 col-lg-9 col-xl-10">
				<div class="container">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb" style="background-color: #32433C">
							<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
							<li class="breadcrumb-item"><a href="#">Orderan Saya</a></li>
							 <li class="breadcrumb-item active" aria-current="page" style="color: #FA7422 ">Pembayaran Invoice</li>
						</ol>
					</nav>
					<div class="row">
						<div class=" col-sm-4 col-md-12 col-lg-3">
							<div class="box-penawaran">
								<h6>Invoice Masuk</h6>
								<div class="daftar-permintaan">
									<div class="scrollbar" id="style-2">
								      	<div class="force-overflow">
								      		<div class="info-permintaan ">
												<h4>Keju Procis </h4>
												<h5>Dari : Soraya Kopi Solo</h5>
												<h5>Hal : Penawaran Harga</h5>
												<small>Senin, 2 September 2018 ; 20:10 PM</small>
											</div>
											<div class="info-permintaan active">
												<h4>Keju Procis </h4>
												<h5>Dari : Soraya Kopi Solo</h5>
												<h5>Hal : Penawaran Harga</h5>
												<small>Senin, 2 September 2018 ; 20:10 PM</small>
											</div>
											<div class="info-permintaan ">
												<h4>Keju Procis </h4>
												<h5>Dari : Soraya Kopi Solo</h5>
												<h5>Hal : Penawaran Harga</h5>
												<small>Senin, 2 September 2018 ; 20:10 PM</small>
											</div>
											<div class="info-permintaan ">
												<h4>Keju Procis </h4>
												<h5>Dari : Soraya Kopi Solo</h5>
												<h5>Hal : Penawaran Harga</h5>
												<small>Senin, 2 September 2018 ; 20:10 PM</small>
											</div>
								      	</div>
								    </div>									
								</div>
							</div>						
						</div>
						<div class="col-sm-8 col-md-12 col-lg-9">
							<div class="detail-kontak-penawaran" style="background-color: #fff">
								<div class="row">
									<div class="col-3 col-sm-3 col-md-3 col-xl-2">
										<img src="assets/avatar_pembeli/foto/p3.png">
									</div>
									<div class="col-9 col-sm-9 col-md-9 col-xl-4">
										<div class="status-toko">
											<div class="row">
												<div class="col-3 col-md-3">
													<h5>Gold</h5>
												</div>
												<div class="col-9 col-md-9">
													<span><i class="fas fa-check-circle"></i> Verified</span>
												</div>
											</div>
										</div>											
										<h6>PT Indofood Sukses Makmur, Tbk</h6>
										<h6>Lokasi    :  Jakarta</h6>
										<h6>No SIUP  : 08909-8291-2198 </h6>
									</div>
									<div class="detail-histori col-6 col-sm-6 col-md-6 col-xl-3">
										<div class="detail-histori-penawaran2">
											<h5>Total Transaksi</h5>
											<h6>100 Produk</h6>
										</div>	
									</div>
									<div class="detail-histori col-6 col-sm-6 col-md-6 col-xl-3">
										<div class="respon-penawaran">
											<h5>Respon Penawaran</h5>
											<h6>Dikirim : 10 Produk</h6>
										</div>
									</div>																
								</div>
							</div>
							<div class="panel-kotak-penawaran">
								<h5>Invoice Keju Asin Cap Holland</h5>	
								<div class="tittle-kotak-penawaran">
									<h4>2 Oktober 2018</h4>
									<h6>No.2018/IIX/retodepo/021</h6>
									<h6>Jatuh Tempo : Kamis, 10 September 2018</h6> <br>
									<h6>Kepada : </h6>
									<h6>Userdepo Cafe</h6>
									<h6>jl. Pasopati no 17, Jakarta Selatan, 76788</h6>
									<h6>phone : (746) 998-9389</h6>
								</div>
								<div class="table-responsive" style="margin-top: 20px;">
								<table class="table">
									<thead>
									    <tr>
									      	<th scope="col">No</th>
									      	<th scope="col">Deskripsi Produk</th>
									      	<th scope="col">Unit</th>
									      	<th scope="col">Qty</th>
									      	<th scope="col">Harga Satuan</th>
									      	<th scope="col">Total</th>
									    </tr>
									</thead>
								  	<tbody>
									    <tr>
									      <th scope="row">1</th>
									      <td>Tepung</td>
									      <td>Ton</td>
									      <td>1</td>
									      <td>45.000</td>
									      <td>10.000.000</td>
									    </tr>
									    <tr>
									      <th scope="row">2</th>
									      <td>Daging</td>
									      <td>Ton</td>
									      <td>2</td>
									      <td>45.000</td>
									      <td>10.000.000</td>
									    </tr>
									    <tr>
									      <th scope="row">3</th>
									      <td>Tepung</td>
									      <td>Ton</td>
									      <td>1</td>
									      <td>45.000</td>
									      <td>10.000.000</td>
									    </tr>
									    <tr bgcolor="#BCFFE6">
									      <th scope="row"></th>
									      <td></td>
									      <td></td>
									      <td></td>
									      <td style="font-weight: bold;">Sub Total</td>
									      <td>30.000.000</td>
									    </tr>
									    <tr>
									      <th scope="row"></th>
									      <td></td>
									      <td></td>
									      <td></td>
									      <td>PPN 10%</td>
									      <td>1.500.000</td>
									    </tr>
									    <tr bgcolor="#BCFFE6">
									      <th scope="row"></th>
									      <td></td>
									      <td></td>
									      <td></td>
									      <td style="font-weight: bold;">Total</td>
									      <td>31.000.000</td>
									    </tr>
								  	</tbody>
								</table>
								</div>
								<div class="cara-pembayaran">
									<h6>Syarat Ketentuan Fitur DompetResto :</h6>					
									<ol>
								      <li>Pembayaran menggunakan dompetresto dikenakan fee transaksi berdasarkan total harga sebagai berikut :
								      		<ol type="a">
								               	<li>total harga kisaran 1juta - 10 juta sebesar 1%</li>
								               	<li>total harga kisaran 10 juta -  50 juta sebesar 5%</li>
								            	<li>total harga diatas 50 juta sebesar 10%</li>
								            </ol>
								      </li>
								      <li>Dengan melakukan transaksi di situs restodepo.com , penjual dan pembeli di anggap setuju atas syarat dan  ketentuan yang berlaku.</li>
								   </ol>
								</div>
								<div class="opsi-btn-penawran ">
									<div align="right">
										 <button type="button" class="btn hijau">Bayar Invoice</button>
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
