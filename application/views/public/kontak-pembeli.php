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
						include "menu-dashboard-penjual.php";
					?>			
			</div>
			<div class="konten-dashboard col-md-8 col-lg-9 col-xl-10">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb" style="background-color: #32433C">
						<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="#">Kotak Pesan</a></li>
						<li class="breadcrumb-item active" aria-current="page" style="color: #FA7422 ">Kontak Pembeli</li>
					</ol>
				</nav>
				<div class="title-kontak" style="border-radius: 5px;">
					<div class="row" >
						<div class="col-4 col-sm-3 col-md-3 col-lg-3 col-xl-2">
							<h6>Kontak Pembeli</h6>
						</div>
						<div class="col-7 col-sm-5 col-md-5 col-lg-5 col-xl-4" align="left">
							<div class="input-group">
								<span class="input-group-addon" id="sizing-addon2">
									<i class="fa fa-search "></i>
								</span>
								<input class="form-control form-control-sm" type="text" placeholder="Cari Invoice"  aria-describedby="sizing-addon2" value/>		
							</div>
						</div>
					</div>
				</div>
				<div class="daftar-kontak-pembeli">
					<div class="row">
						<div class="col-12 col-md-6 col-xl-4 col-sm-6">
							<div class="detail-data-profil">
								<div class="status-member" align="right">
									<a>
										<i class="fas fa-check-circle"></i> Verified
									</a>										
								</div>
								<div class="avatar-profil" align="center">
									<img src="assets/avatar_pembeli/foto/ngomah-resto.jpg">
								</div>
								<div class="nama" align="center">
									<h6>Ngomah Resto</h6>
								</div>
								<div class="row">
									<div class="col-3 col-md-3">
										<h5>E-Mail</h5>
									</div>
									<div class="col-9 col-md-9">
										<h5>: ngomah-resto@gmail.com</h5>
									</div>
								</div>
								<div class="row">
									<div class="col-3 col-md-3">
										<h5>No -Telp </h5>
									</div>
									<div class="col-9 col-md-9">
										<h5>: 0989891291</h5>
									</div>
								</div>
								<div class="row">
									<div class="col-3 col-md-3">
										<h5>Alamat</h5>
									</div>
									<div class="col-9 col-md-9">
										<h5>: Jl. sungai Mahakan no 80 Surakarta</h5>
									</div>
								</div>
								<div class="row" style="margin-top: 10px;">
									<div class="col-6 col-md-6">
										<div class="respon-penawaran">
											<h5>Respon Penawaran</h5>
											<div class="row">
												<div class="col-6 col-md-6">
													<h6> Direspon</h6>
												</div>
												<div class="col-6 col-md-6">
													<h6>: 9</h6>
												</div>
											</div>
											<div class="row">
												<div class="col-6 col-md-6">
													<h6>Diabaikan</h6>
												</div>
												<div class="col-6 col-md-6">
													<h6>: 1</h6>
												</div>
											</div>
										</div>
									</div>
									<div class="col-6 col-md-6">
										<div class="total-transaksi">
											<h5 align="center">Total Transaksi</h5>
											<div class="row">
												<div class="col-md-12" align="center" style="padding-top: 21px">
													<h6> 10 Produk</h6>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="btn-chat">
									<button type="button" class="btn orange" data-toggle="modal" data-target="#chatPembeli">Chat Pembeli</button>
								</div>
							</div>							
						</div>

						<div class="col-12 col-md-6 col-xl-4 col-sm-6">
							<div class="detail-data-profil">
								<div class="status-member" align="right">
									<a>
										<i class="fas fa-check-circle"></i> Verified
									</a>										
								</div>
								<div class="avatar-profil" align="center">
									<img src="assets/avatar_pembeli/foto/pembeli.jpg">
								</div>
								<div class="nama" align="center">
									<h6>Warung Upnormal</h6>
								</div>
								<div class="row">
									<div class="col-3 col-md-3">
										<h5>E-Mail</h5>
									</div>
									<div class="col-9 col-md-9">
										<h5>: Upnormal@gmail.com</h5>
									</div>
								</div>
								<div class="row">
									<div class="col-3 col-md-3">
										<h5>No -Telp </h5>
									</div>
									<div class="col-9 col-md-9">
										<h5>: 0989891291</h5>
									</div>
								</div>
								<div class="row">
									<div class="col-3 col-md-3">
										<h5>Alamat</h5>
									</div>
									<div class="col-9 col-md-9">
										<h5>: Jl. sungai Mahakan no 80 Surakarta</h5>
									</div>
								</div>
								<div class="row" style="margin-top: 10px;">
									<div class="col-6 col-md-6">
										<div class="respon-penawaran">
											<h5>Respon Penawaran</h5>
											<div class="row">
												<div class="col-6 col-md-6">
													<h6> Direspon</h6>
												</div>
												<div class="col-6 col-md-6">
													<h6>: 9</h6>
												</div>
											</div>
											<div class="row">
												<div class="col-6 col-md-6">
													<h6>Diabaikan</h6>
												</div>
												<div class="col-6 col-md-6">
													<h6>: 1</h6>
												</div>
											</div>
										</div>
									</div>
									<div class="col-6 col-md-6">
										<div class="total-transaksi">
											<h5 align="center">Total Transaksi</h5>
											<div class="row">
												<div class="col-md-12" align="center" style="padding-top: 21px">
													<h6> 10 Produk</h6>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="btn-chat">
									<button type="button" class="btn orange">Chat Pembeli</button>
								</div>
							</div>							
						</div>

						<div class="col-12 col-md-6 col-xl-4 col-sm-6">
							<div class="detail-data-profil">
								<div class="status-member" align="right">
									<a>
										<i class="fas fa-check-circle"></i> Verified
									</a>										
								</div>
								<div class="avatar-profil" align="center">
									<img src="assets/avatar_pembeli/foto/pembeli2.png">
								</div>
								<div class="nama" align="center">
									<h6>Dapur Solo</h6>
								</div>
								<div class="row">
									<div class="col-3 col-md-3">
										<h5>E-Mail</h5>
									</div>
									<div class="col-9 col-md-9">
										<h5>: dapursolo@gmail.com</h5>
									</div>
								</div>
								<div class="row">
									<div class="col-3 col-md-3">
										<h5>No -Telp </h5>
									</div>
									<div class="col-9 col-md-9">
										<h5>: 0989891291</h5>
									</div>
								</div>
								<div class="row">
									<div class="col-3 col-md-3">
										<h5>Alamat</h5>
									</div>
									<div class="col-9 col-md-9">
										<h5>: Jl. sungai Mahakan no 80 Surakarta</h5>
									</div>
								</div>
								<div class="row" style="margin-top: 10px;">
									<div class="col-6 col-md-6">
										<div class="respon-penawaran">
											<h5>Respon Penawaran</h5>
											<div class="row">
												<div class="col-6 col-md-6">
													<h6> Direspon</h6>
												</div>
												<div class="col-6 col-md-6">
													<h6>: 9</h6>
												</div>
											</div>
											<div class="row">
												<div class="col-6 col-md-6">
													<h6>Diabaikan</h6>
												</div>
												<div class="col-6 col-md-6">
													<h6>: 1</h6>
												</div>
											</div>
										</div>
									</div>
									<div class="col-6 col-md-6">
										<div class="total-transaksi">
											<h5 align="center">Total Transaksi</h5>
											<div class="row">
												<div class="col-md-12" align="center" style="padding-top: 21px">
													<h6> 10 Produk</h6>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="btn-chat">
									<button type="button" class="btn orange">Chat Pembeli</button>
								</div>
							</div>							
						</div>
					</div>
				</div>				
			</div>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="chatPembeli" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ngomah Resto </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	 <label for="exampleFormControlTextarea1">Tulis Pesan :</label>
       	<div class="form-group" style="border: 1px solid #E3E3E3;">
		   
		    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
		 </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-danger">Kirim</button>
      </div>
    </div>
  </div>
</div>