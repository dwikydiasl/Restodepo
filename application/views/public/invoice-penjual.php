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
						include "menu-dashboard-penjual.php";
					?>			
			</div>
			<div class="konten-dashboard col-md-8 col-lg-9 col-xl-10">
				<div class="container">
					<nav aria-label="breadcrumb" >
						<ol class="breadcrumb" style="background-color: #32433C">
							<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
							<li class="breadcrumb-item"><a href="#">Orderan Saya</a></li>
							 <li class="breadcrumb-item active" aria-current="page" style="color: #FA7422 "> Invoice</li>
						</ol>
					</nav>
					<div class="row">
						<div class=" col-md-12 col-lg-3">
							<div class="box-penawaran">
								<h6>Menunggu Invoice</h6>
								<div class="daftar-permintaan">
									<div class="scrollbar" id="style-2">
								      <div class="force-overflow">
								      	<div class="info-permintaan ">
										<h4>No. 1223 / IX / Resto-depo</h4>          
										<h5>Penawaran Harga Barang
										Nyonya Aleea</h5>
									</div>
									<div class="info-permintaan ">
										<h4>No. 1223 / IX / Resto-depo</h4>          
										<h5>Penawaran Harga Barang
										Nyonya Aleea</h5>
									</div>
									<div class="info-permintaan ">
										<h4>No. 1223 / IX / Resto-depo</h4>          
										<h5>Penawaran Harga Barang
										Nyonya Aleea</h5>
									</div>
									<div class="info-permintaan ">
										<h4>No. 1223 / IX / Resto-depo</h4>          
										<h5>Penawaran Harga Barang
										Nyonya Aleea</h5>
									</div>
									<div class="info-permintaan ">
										<h4>No. 1223 / IX / Resto-depo</h4>          
										<h5>Penawaran Harga Barang
										Nyonya Aleea</h5>
									</div>
									<div class="info-permintaan ">
										<h4>No. 1223 / IX / Resto-depo</h4>          
										<h5>Penawaran Harga Barang
										Nyonya Aleea</h5>
									</div>
									<div class="info-permintaan ">
										<h4>No. 1223 / IX / Resto-depo</h4>          
										<h5>Penawaran Harga Barang
										Nyonya Aleea</h5>
									</div>
									<div class="info-permintaan ">
										<h4>No. 1223 / IX / Resto-depo</h4>          
										<h5>Penawaran Harga Barang
										Nyonya Aleea</h5>
									</div>
								      </div>
								    </div>									
								</div>
							</div>						
						</div>
						<div class=" col-md-12 col-lg-9">
							<div class="buat-invoice">
								<div class="container">
									<div class="row">
										<div class="col-md-3">
											<h5>Buat Custom Invoice:</h5>
										</div>
										<div class="col-md-9">
											<div class="row" >
												<a style="margin-bottom: 5px;">Penawaran Contoh Barang dan Harga</a>
												<a style="margin-bottom: 5px;">Penawaran Contoh Barang</a>
											</div>
											<div class="row" style="margin-top: 5px;">
												<a>Penawaran Harga</a>
											</div>									
										</div>
									</div>
								</div>								
							</div>							
							<div class="panel-invoice-penjual">								
								<div class="tittle-invoice-penjual">
									<div style="border-bottom: 1px solid #C4C4C4;">
										<h5>Penawaran Harga Barang</h5>									
										<h6>No.2018/IIX/retodepo/021</h6>
										<h4>2 Oktober 2018</h4>
									</div>									
								</div>
								<div class="kontak-penawaran">
									<h5>Kontak Detail</h5>
									<div class="row">
										<div class="col">
											<h6>Nama  : Nyonya Soraya Lilahitalla</h6>
										</div>
										<div class="col">
											<h6>Email   : Sorayatri@mail.com</h6>
										</div>
										<div class="col">
											<h6>Nomor Telepon    :  08676743211</h6>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<h6>Alamat Lengkap  : Jl. Angke No 5, Surakarta </h6>
										</div>
									</div>
								</div>
								<div class="detail-kontak-penawaran" style="background-color: #E8EFDD">
									<div class="row">
										<div class="col-3 col-md-2 col-sm-2">
											<img src="assets/avatar_pembeli/foto/p2.jpg">
										</div>
										<div class="col-9 col-md-4 col-sm-10">
											<div class="status-toko">
												<div class="row">
													<div class="col-md-9">
														<span><i class="fas fa-check-circle"></i> Verified</span>
													</div>
													<div class="col-md-3">
																
													</div>
												</div>
											</div>											
											<h6>Chris Evans</h6>
											<h6>Alamat    :  Jakarta</h6>
											<h6>No Telp : 08909-8291-2198 </h6>
											<h6>E-Mail : Evans@gmail.com </h6>
										</div>
										<div class="detail-histori col-6 col-md-3 col-sm-6">
											<div class="detail-histori-penawaran2">
												<h5>Total Transaksi</h5>
												<h6>100 Produk</h6>
											</div>													
										</div>
										<div class="detail-histori col-6 col-md-3 col-sm-6">
											<div class="respon-penawaran">
												<h5>Respon Penawaran</h5>
												<h6>Dikirim : 10 Produk</h6>
											</div>
										</div>									
									</div>
								</div>
								<div class="panel-invoice">
									<div class="detail-invoice">
										<h5>Invoice Penawaran Harga Barang</h5>
										<div class="row">
											<div class="col-md-3" style="margin-bottom: 5px;">
												<div class="input-group ">
													<input type="email" class="form-control form-control-sm"" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tanggal Pembuatan">
												</div>
											</div>
										</div>														
										<h6>No. IN-8788392</h6>
										<h6>Jatuh Tempo : </h6>

										<h4>Kepada :</h4> 
										<h6>Nyonya Soraya Lilahitalla</h6>
										<h6>jl. Pasopati no 17, Jakarta Selatan, 76788</h6>
										<h6>phone : (746) 998-9389</h6>
									</div>
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
									    <tr>
									      <th scope="row"></th>
									      <td></td>
									      <td></td>
									      <td></td>
									      <td>JNE</td>
									      <td>1.500.000</td>
									    </tr>
									    <tr>
									      <th scope="row"></th>
									      <td></td>
									      <td></td>
									      <td></td>
									      <td>Fee 2%</td>
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
								
								<div class="opsi-btn-penawran ">
									<div align="right" style="padding: 10px;">
										 <button type="button" class="btn hijau"><i class="far fa-share-square"></i> Kirim</button>
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