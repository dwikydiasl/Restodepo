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
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb" style="background-color: #32433C">
							<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
							<li class="breadcrumb-item"><a href="#">Permintaan Penawran</a></li>
							 <li class="breadcrumb-item active" aria-current="page" style="color: #FA7422 ">Daftar Penawaran</li>
						</ol>
					</nav>
					<div class="row">
						<div class=" col-md-12 col-lg-3">
							<div class="box-penawaran">
								<h6>Daftar Permintaan</h6>
								<div class="filter-permintaan">
									<div class="input-group">
										<span class="input-group-addon" id="sizing-addon2">
											<i class="fa fa-search "></i>
										</span>
									  	<input class="form-control form-control-sm" type="text" placeholder="Cari Permintaan"  aria-describedby="sizing-addon2" value/>										  					 
									</div>	
								</div>
								<div class="daftar-permintaan">
									<div class="scrollbar" id="style-2">
								      	<div class="force-overflow">
								      		<div class="info-permintaan ">
													<h4>Dari : Soraya Kopi Solo</h4>
													<h5>Penawaran Harga</h5>
												</div>
												<div class="info-permintaan active">
													<h4>Dari : Soraya Kopi Solo</h4>
													<h5>Penawaran Harga</h5>
												</div>
												<div class="info-permintaan">
													<h4>Dari : Soraya Kopi Solo</h4>
													<h5>Penawaran Harga</h5>
												</div>
												<div class="info-permintaan">
													<h4>Dari : Soraya Kopi Solo</h4>
													<h5>Penawaran Harga</h5>
												</div>
												<div class="info-permintaan">
													<h4>Dari : Soraya Kopi Solo</h4>
													<h5>Penawaran Harga</h5>
												</div>
												<div class="info-permintaan">
													<h4>Dari : Soraya Kopi Solo</h4>
													<h5>Penawaran Harga</h5>
												</div>
												<div class="info-permintaan">
													<h4>Dari : Soraya Kopi Solo</h4>
													<h5>Penawaran Harga</h5>
												</div>
												<div class="info-permintaan">
													<h4>Dari : Soraya Kopi Solo</h4>
													<h5>Penawaran Harga</h5>
												</div>
												<div class="info-permintaan">
													<h4>Dari : Soraya Kopi Solo</h4>
													<h5>Penawaran Harga</h5>
												</div>
								      	</div>
								    </div>									
								</div>
							</div>						
						</div>
						<div class=" col-md-12 col-lg-9">
							<div class="konten-penawaran">
								<div class="title-penawaran">
									<div class="row">
										<div class="col">
											<h4>Dari : Soraya Kopi Solo</h4>
											<h5>Permintaan contoh barang</h5>
										</div>
										<div class="col" align="right">
											<h5>12 Oktober 2019, Pukul 10:00 AM</h5>
										</div>
									</div>
								</div>
								<div class="jenis-penawaran">
									<h5>Keyword / Jenis Produk</h5>
									<div class="row">
										<div class="col-md-5 col-lg-5 col-xl-5">
											<div class="input-group">
												<h5>Tepung Beras Ros Brand</h5>
											</div>											
										</div>
										<div class="col-md-4 col-lg-3 col-xl-3">
											<div class="input-group">
												<h5>Qty: 10</h5>
											</div>	
										</div>
										<div class="col-md-3 col-lg-2 col-xl-2">
											<div class="input-group">
												<h5>Ton</h5>
											</div>	
										</div>
									</div>
									<div class="row" style="margin-top: 10px;">
										<div class="col-md-6 col-lg-5 col-xl-5">
											<div class="input-group">
												<h5>Kisaran Harga Rp. 100.000 - 200.000</h5>
											</div>											
										</div>
										<div class="col-md-4">
											<div class="input-group">
												<h5>JNE</h5>
											</div>	
										</div>										
									</div>
								</div>
								<div class="deskripsi-penawaran">
									<h5>Deskripsi Produk Yang Dicari</h5>
									<p>
										Salam, Bapak / Ibu
										Saya mencari barang dengan spesifikasi sebagai berikut :<br>

										Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
										<div>
											<img src="assets/img/produk-kelas-minyak.jpg" class="img-responsive">
										</div>										
									</p>
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
								<div class="detail-kontak-penawaran">
									<div class="row">
										<div class="col-4 col-md-3 col-xl-2 col-sm-2">
											<img src="assets/avatar_pembeli/foto/pembeli.jpg" >
										</div>
										<div class="col-8 col-md-9 col-xl-4 col-sm-10">
											<div class="status-toko">
												<div class="row">
													<div class="col-md-9">
														<span><i class="fas fa-check-circle"></i> Verified</span>
													</div>
													<div class="col-md-3">
																
													</div>
												</div>
											</div>											
											<h6>Warung Upnormal</h6>
											<h6>Alamat    :  Jakarta</h6>
											<h6>No Telp : 08909-8291-2198 </h6>
											<h6>E-Mail : Evans@gmail.com </h6>
										</div>
										<div class="detail-histori col-6 col-md-6 col-xl-3 col-sm-6">
											<div class="detail-histori-penawaran2">
												<h5>Total Transaksi</h5>
												<h6>100 Produk</h6>
											</div>													
										</div>
										<div class="detail-histori col-6 col-md-6 col-xl-3 col-sm-6">
											<div class="respon-penawaran">
												<h5>Respon Penawaran</h5>
												<h6>Dikirim : 10 Produk</h6>
											</div>
										</div>									
									</div>
								</div>
								<div class="box-balas-penawaran">
									<div class="title-balas-penawaran">
										<h5>Penawaran Contoh Barang dan Harga</h5>
									</div>
									<div class="kalender">
										
									</div>
									<div id="summernote"></div>
									<div class="catatan-penawaran">
										<h6>Harga akan dikenakan PPN 10% dan Dompetresto Fee</h6>

										<h6>Demikian surat penawaran kami sampaikan, atas perhatiannya kami ucapkan terimakasih.</h6>

										<h6>Hormat kami,</h6>
										<h6>PT. Sandang Pangan .Tbk</h6>
									</div>
								</div>
								<div class="btn-balas-penawaran" align="right">
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

 	<script>
      $('#summernote').summernote({
        placeholder: 'Ex : Dengan Hormat, Menindak lanjuti prihal permintaan harga barang dan contoh, berikut kami sampaikan penawaran dengan perincian sebagai berikut :',
        tabsize: 2,
        height: 200
      });
    </script>