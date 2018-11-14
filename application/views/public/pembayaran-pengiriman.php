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
			<div class="konten-dashboard col-md-8 col-lg-9 col-xl-10" style="padding-bottom: 50px">
				<div class="container">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb" style="background-color: #32433C">
							<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
							<li class="breadcrumb-item"><a href="#">Penjualan Produk</a></li>
							 <li class="breadcrumb-item active" aria-current="page" style="color: #FA7422 ">Pembayaran & Pengiriman</li>
						</ol>
					</nav>
					<div class="row">
						<div class="col-12 col-md-12 col-xl-9 col-sm-12">
							<div class="daftar-penjualan">
								<div class="header-penjualan row">
									<div class="col-md-3">
										<h5>Daftar Penjualan</h5>
									</div>
									<div class="col-md-9" align="left">
										<div class="input-group">
											<span class="input-group-addon" id="sizing-addon2">
												<i class="fa fa-search "></i>
											</span>
										  	<input class="form-control form-control-sm" type="text" placeholder="Cari Invoice"  aria-describedby="sizing-addon2" value/>									  					 
										</div>
									</div>
								</div>
								<!--Tabel-->
								<div class="table-responsive">
									<table class="table table-striped">
								  <thead class="header-tabel-invoice">
								    <tr>
								      <th scope="col">No Invoice</th>
								      <th scope="col">Pembeli</th>
								      <th scope="col">Nama Produk</th>
								      <th scope="col">Status Pembayaran</th>
								      <th scope="col">Total Bayar</th>
								    </tr>
								  </thead>
								  <tbody>
								    <tr>
								      <th scope="row">1</th>
								      <td>Mark</td>
								      <td> Keju Asin Cap Holland</td>
								      <td>Dana Masuk DompetResto</td>
								      <td>Rp. 20,000,000</td>
								    </tr>
								    <tr>
								      <th scope="row">2</th>
								      <td>Jacob</td>
								      <td> Keju Asin Cap Holland</td>
								      <td>Menunggu Komfirmasi</td>
								      <td>Rp. 20,000,000</td>
								    </tr>
								    <tr>
								      <th scope="row">3</th>
								      <td>Larry</td>
								      <td> Keju Asin Cap Holland</td>
								      <td> Selesai</td>
								      <td>Rp. 20,000,000</td>
								    </tr>
								  </tbody>
								</table>
								</div>																
							</div>
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
								
								<div class="btn-dwnld" align="right">
									<button type="button" class="btn hijau-outline btn-sm">Chat Pembeli</button>
								</div>								
							</div>
						</div>
						<div class="col-12 col-md-12 col-xl-3 col-sm-12">
							<div class="row">
								<div class="col-12 col-md-6 col-xl-12 col-sm-12">
									<div class="rekap-penjualan">
										<h5>Download Rekap Penjualan</h5>
										<div class="input-group">
											<select id="" class="form-control form-control-sm">
										        <option selected>Bulan Agustus 2018</option>
										        <option>...</option>
										    </select>
										</div>
										<div class="btn-dwnld" align="right">
											<button type="button" class="btn hijau btn-sm">Download PDF</button>
										</div>								
									</div>
								</div>
								<div class="col-12 col-md-6 col-xl-12 col-sm-12">
									<div class="rekap-penjualan">
										<h5>Resi Pengiriman</h5>
										<div class="input-group">
											<input type="text" class="form-control form-control-sm" id="" aria-describedby="" placeholder="No Resi Pengiriman">
										</div>
										<div class="btn-dwnld" align="right">
											<button type="button" class="btn hijau btn-sm">Kirim</button>
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

 	<script>
      $('#summernote').summernote({
        placeholder: 'Ex : Dengan Hormat, Menindak lanjuti prihal permintaan harga barang dan contoh, berikut kami sampaikan penawaran dengan perincian sebagai berikut :',
        tabsize: 2,
        height: 200
      });
    </script>