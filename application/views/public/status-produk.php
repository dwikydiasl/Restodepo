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
							 <li class="breadcrumb-item active" aria-current="page" style="color: #FA7422 ">Status Produk</li>
						</ol>
					</nav>
					<div class="row">
						<div class="col-md-5 col-lg-3">
							<div class="box-penawaran">
								<h6>Histori Pembayaran</h6>
								<div style="padding: 10px">
									<div class="input-group" style="border:2px solid #34E09F">
										<span class="input-group-addon" id="sizing-addon2">
											<i class="fa fa-search "></i>
										</span>
									  	<input class="form-control form-control-sm" type="text" placeholder="Cari Invoice"  aria-describedby="sizing-addon2" value/>										  					 
									</div>
								</div>
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
						<div class="konten-status-produk col-md-7 col-lg-9">
							<div class="row">
								<div class="col-sm-12 col-md-12 col-lg-12 col-xl-6" >
									<div class="upload-status-produk">
										<div class="title-upload-status-produk">
											<div class="row">
												<div class="col">
													<h5>Status Produk</h5>
												</div>
												<div class="col" align="right">
													<h6>Menunggu Komfirmasi</h6>
												</div>
											</div>
										</div>
										<div class="input-group" style="margin-top: 10px;">
											<input type="file" class="form-control-file" id="exampleFormControlFile1">
										</div>
										<div class="btn-status-produk" align="right" style="margin-top: 16px;">
											<button type="button" class="btn hijau">Kirim</button>
										</div>									
									</div>
								</div>
								<div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
									<div class="upload-status-produk">
										<div class="title-upload-status-produk">
											<div class="row">
												<div class="col">
													<h5>Status Produk</h5>
												</div>
												<div class="col" align="right">
													<h6>Menunggu Komfirmasi</h6>
												</div>
											</div>
										</div>
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
												<label>Pengiriman Kurir</label>
											</div>
											<div class="col-4 col-md-4" align="right">
												<label>Produk Tiba</label>
											</div>
										</div>	
										<div class="btn-status-produk" align="right" style="margin-top: 0px; margin-bottom: 0px;">
											<button type="button" class="btn hijau-outline">Chat Supplier</button>
											<button type="button" class="btn hijau">Kirim</button>
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
									<div class="no-resi">
										<h6>No Resi JNE</h6>
										<h6>988789987689988</h6>
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
