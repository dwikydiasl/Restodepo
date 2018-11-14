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
	.modal-body .form-group{
		border: 1px solid #E3E3E3;
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
				<div id="edit-profil">
					<div class="container">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb" style="background-color: #32433C">
							    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
							    <li class="breadcrumb-item active" aria-current="page" style="color: #FA7422 ">Edit Profil</li>
							</ol>
						</nav>
						<div class="row">
							<div class="col-md-12 col-xl-8">
								<div class="edit-data-profil">
									<div style="margin-bottom: 15px">
										<div class="" style="margin-top: 10px;">
										    <input type="file" class="form-control-file" id="exampleFormControlFile1">
										</div>				
									</div>
									<div class="form-group ">
										<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Lengkap Anda ">
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
									<div class="row" >
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
							<div class=" col-md-12 col-xl-4">
								<div class="detail-data-profil" style="border-radius: 5px; padding-bottom: 25px;">
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

						<!---ALAMAT PENGIRIMAN--->
						
						<div class="akun-bank">
							<div class="row">
								<div class="col-md-6">
										<h6>Alamat Pengiriman</h6>
									<div class="form-group ">
										<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Penerima">
									</div>
									<div class="form-group ">
										<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Alamat">
									</div>
									<div class="form-row">		
									    <div class="col-md-6">
									    	<div class="form-group">
									    		<input type="Kota" class="form-control" placeholder="Kota">
									    	</div>				      
									    </div>
									    <div class="col-md-6">
									    	<div class="form-group">
									    		 <input type="number" class="form-control" placeholder="kode Pos">
									    	</div>				      
									    </div>
									</div>
									<div class="form-row">		
									    <div class="col-md-6">
									    	<div class="form-group">
									    		<input type="number" class="form-control" placeholder="No Telephone">
									    	</div>				      
									    </div>
									</div>																		
								</div>
								<div class="col-md-6" align="right">
									<div style="padding-top: 170px">
										<button type="button" class="btn " >Hapus</button>
										<button type="button" class="btn hijau" >Simpan</button>
									</div>
								</div>
							</div>
							<div class="btn-tambah-alamat-baru">
								<button type="button" class="btn hijau" data-toggle="modal" data-target="#tambah-alamat-baru">
									<i class="fas fa-map-marker-alt"></i> Tambah Alamat
								</button>
							</div>
						</div>

						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!--Modal Tambah Alamat Baru-->

<div class="modal fade" id="tambah-alamat-baru" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
	    <div class="modal-content">
	      	<div class="modal-header">
	        	<h5 class="modal-title" id="exampleModalLabel">Tambah Alamat Pengiriman Baru</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          	<span aria-hidden="true">&times;</span>
	        	</button>
	      	</div>
	      	<div class="modal-body">
	       		<div class="row">
					<div class="col-md-12">
						<div class="form-group ">
							<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Penerima">
						</div>
						<div class="form-group ">
							<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Alamat">
						</div>
						<div class="form-row">		
							<div class="col-md-6">
								<div class="form-group">
									<input type="Kota" class="form-control" placeholder="Kota">
								</div>				      
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="number" class="form-control" placeholder="kode Pos">
								</div>				      
							</div>
						</div>
						<div class="form-row">		
							<div class="col-md-6">
								<div class="form-group">
									<input type="number" class="form-control" placeholder="No Telephone">
								</div>				      
							</div>
						</div>																		
					</div>
				</div>
	     	</div>
		    <div class="modal-footer">
		        <button type="button" class="btn btn" data-dismiss="modal">Batal</button>
		        <button type="button" class="btn hijau" >Simpan</button>
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