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
							 <li class="breadcrumb-item active" aria-current="page" style="color: #FA7422 ">Kotak Penawaran</li>
						</ol>
					</nav>
					<div class="row">
						<div class="col-sm-12 col-md-4 col-lg-3">
							<div class="box-penawaran ">
								<h6>Penawaran Masuk</h6>
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
						<div class="col-sm-12 col-md-8 col-lg-9">
							<div class="detail-kontak-penawaran" style="background-color: #fff">
								<div class="row">
									<div class="col-3 col-sm-4 col-md-4 col-lg-2 col-xl-2">
										<img src="assets/avatar_pembeli/foto/p3.png">
									</div>
									<div class="col-9 col-sm-8 col-md-8 col-lg-10 col-xl-4">
										<div class="status-toko">
											<div class="row">
												<div class="col-3 col-md-4">
													<h5>Gold</h5>
												</div>
												<div class="col-9 col-md-8">
													<span><i class="fas fa-check-circle"></i> Verified</span>
												</div>
											</div>
										</div>											
										<h6>PT Indofood Sukses Makmur, Tbk</h6>
										<h6>Lokasi    :  Jakarta</h6>
										<h6>No SIUP  : 08909-8291-2198 </h6>
									</div>
									<div class="detail-histori col-6 col-sm-6 col-md-6 col-lg-6 col-xl-3">
										<div class="detail-histori-penawaran2">
											<h5>Total Transaksi</h5>
											<h6>100 Produk</h6>
										</div>	
									</div>
									<div class="detail-histori col-6 col-sm-6 col-md-6 col-lg-6 col-xl-3">
										<div class="respon-penawaran">
											<h5>Respon Penawaran</h5>
											<h6>Dikirim : 10 Produk</h6>
										</div>
									</div>								
								</div>
							</div>
							<div class="panel-kotak-penawaran">
								<h5>Penawaran Harga Barang dan Contoh</h5>	
								<div class="tittle-kotak-penawaran row">
									<div class="col">
										<h6>No.2018/IIX/retodepo/021</h6>
									</div>
									<div class="col" align="right">
										<h6>2 Oktober 2018</h6>
									</div>
								</div>
								<div class="judul-penawaran">
									<h6>Kepad Yth</h6>
									<h6>John Dae Wong</h6>
									<p>
										Dengan Hormat,
										Menindak lanjuti prihal permintaan harga barang dan contoh, berikut kami sampaikan penawaran dengan perincian sebagai berikut:
									</p>
								</div>
								<div class="table-responsive">
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
									      <td>Mark</td>
									      <td>Otto</td>
									      <td>@mdo</td>
									      <td>@mdo</td>
									      <td>@mdo</td>
									    </tr>
									    <tr>
									      <th scope="row">2</th>
									      <td>Jacob</td>
									      <td>Thornton</td>
									      <td>@fat</td>
									      <td>@mdo</td>
									      <td>@mdo</td>
									    </tr>
									    <tr>
									      <th scope="row">3</th>
									      <td>Larry</td>
									      <td>the Bird</td>
									      <td>@twitter</td>
									      <td>@mdo</td>
									      <td>@mdo</td>
									    </tr>
								  	</tbody>
								</table>
								</div>
								<div class="catatan-penawaran">
									<h6>Ongkos kirim ke alamat userdepo cafe menggunakan agen kurir wahana logistic sebesar Rp 25,000 / Kg.</h6>
									<h6>Harga belum termasuk PPN 10% dan Dompetresto Fee 2% </h6>
									<br>
									<h6>Demikian surat penawaran kami sampaikan, atas perhatiannya kami ucapkan terimakasih.</h6>
									<br>
									<h6>Hormat kami,</h6>
									<h6>PT. Sandang Pangan .Tbk</h6>
								</div>
								<div class="cara-pembayaran">
									<h6>Cara Pembayaran :</h6>									
									<ol>
								      <li>Menggunakan Fitur DompetResto, Keamanan bertransaksi untuk pembeli dan penjual. klik disini untuk info.</li>
								      <li>Metode langsung atas kesepakatan penjual dengan pembeli, restodepo tidak bertanggung jawab atas keamanan proses
									    beli dan jual barang meskipun lewat situs kami.</li>
								   </ol>
								</div>
								<div class="opsi-btn-penawran row">
									<div class="col-md-6">
										<button type="button" class="btn btn-outline-warning">Chat Supplier</button>
									</div>
									<div class="col-md-6" align="right">
										 <button type="button" class="btn hijau">Order Sample</button>
										 <button type="button" class="btn hijau">Minta Invoice</button>
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
