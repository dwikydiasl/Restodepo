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
	.kotak-member-gold{
		margin-bottom: 15px;
	}
	.kotak-member-silver{
		margin-bottom: 15px;
	}
	.modal-body .form-group{
		border: 1px solid #E3E3E3;
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
				<div id="edit-profil">
					<div class="container">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb" style="background-color: #32433C">
							    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
							    <li class="breadcrumb-item active" aria-current="page" style="color: #FA7422 ">Edit Profil Toko</li>
							</ol>
						</nav>
						<div class="row">
							<div class="col-md-12 col-lg-12 col-xl-8">
								<div class="edit-data-profil">
									<div style="margin-bottom: 15px">
										<div class="" style="margin-top: 10px;">
										    <input type="file" class="form-control-file" id="exampleFormControlFile1">
										</div>				
									</div>
									<div class="form-group ">
										<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Lengkap Anda ">
									</div>
									<div class="form-group ">
										<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Toko ">
									</div>
									<div class="form-row">		
									    <div class="col-md-6">
									    	<div class="form-group">
									    		<input type="email" class="form-control" placeholder="E-Mail Anda">
									    	</div>				      
									    </div>
									    <div class="col-md-6">
									    	<div class="form-group">
									    		 <input type="number" class="form-control" placeholder="Telepon">
									    	</div>				      
									    </div>
									</div>
									<div class="form-group ">
										<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Alamat Tempat Tinggal">
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group ">
												<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Kota">
											</div>
										</div>
									</div>															
									<div class="row" style=" padding-top: 20px;">
										<div class="col-md-6">
											<a href="" data-toggle="modal" data-target="#ubah-password">
												<i class="fas fa-unlock-alt"></i> Ubah Password
											</a>
										</div>
										<div class="col-md-6" align="right">
											<button type="button" class="btn hijau" >Simpan</button>
										</div>
									</div>
								</div>								
							</div>
							<div class=" col-md-12 col-lg-12 col-xl-4">
								<div class="detail-data-profil" style="border-radius: 5px;">
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
										<img src="assets/avatar_pembeli/foto/p3.png">
									</div>
									<div class="nama" align="center">
										<h6>PT Indofood Sukses Makmur, Tbk</h6>
									</div>
									<div class="row">
										<div class="col-3 col-md-3">
											<h5>E-Mail</h5>
										</div>
										<div class="col-9 col-md-9">
											<h5>: johndhae@gmail.com</h5>
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
													<div class="col-3 col-md-6">
														<h6> Direspon</h6>
													</div>
													<div class="col-6 col-md-6">
														<h6>: 9</h6>
													</div>
												</div>
												<div class="row">
													<div class="col-3 col-md-6">
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
														<span> 10 Produk</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>					
							</div>
						</div>

						<!---UPLOAD DOCUMENT--->
						
						<div class="upload-dpcument">
							<div class="container">
								<div class="row">
								<h6>Upload Document</h6>
								<div class="input-group" style="margin-bottom: 10px;">
									<input type="file" class="form-control-file" id="exampleFormControlFile1">
									<label>Upload Scan Photo SIUP secara jelas (Max 2Mb Format PDF,JPG).</label>
								</div>
								<div class="input-group">
									<input type="file" class="form-control-file" id="exampleFormControlFile1">
									<label>Upload Scan Photo NPWP secara jelas (Max 2Mb Format PDF,JPG).</label>
								</div>
							</div>
							</div>
							
						</div>


						<!---AKUN BANK--->
						
						<div class="akun-bank">
							<div class="row">
								<div class="col-md-6">
										<h6>Akun Bank</h6>
									<div class="form-group ">
										<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Akun ">
									</div>
									<div class="form-group">
									    <select class="form-control" id="exampleFormControlSelect1">
									      <option>Pilih Bank</option>
									      <option>PT. BANK RAKYAT INDONESIA TBK.</option>
									      <option>PT. BANK MANDIRI TBK.</option>
									    </select>
									  </div>
									<div class="form-group ">
										<input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Nomer Rekening">
									</div>
								</div>
								<div class="col-md-6" align="right">
									Reset 
									<div style="padding-top: 110px">
										<button type="button" class="btn hijau" >Simpan</button>
									</div>
								</div>
							</div>
						</div>

						

						<!--Status Member --->

						<div class="panel-status-member">
							<h6>Restodepo Membership</h6>
							<div class="row">
								<div class="col-md-6 col-lg-6 col-xl-3">
									<a href="" data-toggle="modal" data-target="#upgrademembergold">
										<div class="kotak-member-gold">
											<div class="list-kotak">
												<h5>GOLD MEMBER</h5>
												<h6>Biaya Berlangganan</h6>
												<h6>Rp. 2000.000,- / Bulan</h6>
											</div>													
										</div>
									</a>
								</div>
								<div class="col-md-6 col-lg-6 col-xl-3">
									<a href="" data-toggle="modal" data-target="#upgrademembersilver">
										<div class="kotak-member-silver">
											<div class="list-kotak">
												<h5>SILVER MEMBER</h5>
												<h6>Biaya Berlangganan</h6>
												<h6>Rp. 2000.000,- / Bulan</h6>
											</div>										
										</div>
									</a>
								</div>
								<div class="col-md-6 col-lg-6 col-xl-3">
									<div class="kotak-member-free">
										<h5>FREE MEMBER</h5>
										<h6>Active</h6>
										<h6>Upgrade untuk banyak benefit</h6>	
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

<!-- Modal Ubah Password-->

<div class="modal fade" id="ubah-password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	    <div class="modal-content">
	      	<div class="modal-header">
	        	<h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
	      	</div>
	      	<div class="modal-body">
	        	<div class="row">
					<div class="col-md-6">
						<div class="form-group ">
							<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Password Sekarang">
						</div>
						<div class="form-group ">
							<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Password Baru">
						</div>																		
					</div>
				</div>
	      	</div>
	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
	        	<button type="button" class="btn hijau">Simpan</button>
	      	</div>
	    </div>
	</div>
</div>

<!-- Modal Upgrade Member -->
<div class="modal fade" id="upgrademembergold" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color: #938400;">Upgrade Gold Member</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<h6>Biaya Berlangganan</h6>
		<h6>Rp. 2000.000,- / Bulan</h6>
		<p>
			Benefit : Promo di fitur Slide pada Halaman Utama,
			Nomor satu di listing pencarian,
			Gold member label, Upload Foto Produk hingga 20 foto
		</p>
		<ol>
			<li>Silahkan transfer dana sesuai yang tertera di atas ke rekening Dompetresto Depo dibawah ini :
				<ul type="">
					<li>BCA : 78784939932  an Resto Depo</li>
					<li>Mandiri : 4343445322 an Resto Depo</li>
					<li>BNI : 6689887655 an Resto Depo</li>
				</ul>
			</li>
			<li>Setelah itu Klik tombol “Selesai transfer”.</li>
			<li>Tunggu Konfirmasi Aktivasi Member dari Admin Restodepo.</li>
			<li>Status Member Anda Aktive.</li>
		</ol>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-danger">Upgrade</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Upgrade Member -->
<div class="modal fade" id="upgrademembersilver" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color: #7F7F7D;">Upgrade Silver Member</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<h6>Biaya Berlangganan</h6>
		<h6>Rp. 2000.000,- / Bulan</h6>
		<p>
			Benefit : Promo di fitur Slide pada Halaman Utama,
			Nomor satu di listing pencarian,
			Silver member label, Upload Foto Produk hingga 10 foto
		</p>
		<ol>
			<li>Silahkan transfer dana sesuai yang tertera di atas ke rekening Dompetresto Depo dibawah ini :
				<ul type="">
					<li>BCA : 78784939932  an Resto Depo</li>
					<li>Mandiri : 4343445322 an Resto Depo</li>
					<li>BNI : 6689887655 an Resto Depo</li>
				</ul>
			</li>
			<li>Setelah itu Klik tombol “Selesai transfer”.</li>
			<li>Tunggu Konfirmasi Aktivasi Member dari Admin Restodepo.</li>
			<li>Status Member Anda Aktive.</li>
		</ol>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-danger">Upgrade</button>
      </div>
    </div>
  </div>
</div>