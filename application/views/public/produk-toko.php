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
						<li class="breadcrumb-item"><a href="#">Kelola Toko</a></li>
						<li class="breadcrumb-item active" aria-current="page" style="color: #FA7422 ">Produk Toko</li>
					</ol>
				</nav>
				<div class="panel-peoduk-toko">
					<div class="btn-tambah-produk row" style="margin-bottom: 10px;">
						<div class="col-6 col-md-7 col-lg-7" align="left" style="padding-top: 5px; ">
							<h6>Daftar Produk Toko</h6>
						</div>
						<div class="col-6 col-md-5 col-lg-5" align="right">
							<div class="form-group row" align="right">
							    <label for="staticEmail" class="col-6 col-md-6 col-lg-6 col-sm-5 col-xl-7 col-form-label" >Sort Berdasarkan :</label>
							    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-5" align="right">
							    	<div class="list">
							    		<select class="form-control" id="exampleFormControlSelect1">
									      	<option>Produk Terbaru</option>
									      	<option>Produk Terlaris</option>
									    </select>
							    	</div>							      	
							    </div>
							</div>
						</div>
					</div>

					<!--Tabel Produk Toko-->

					<div class="row marginv20">
						<div class="col-6 col-md-6 col-xl-3 col-sm-6 productCard" >
							<div class="box-lite">
								<div class="like" >
									<i class="fas fa-heart"></i>
								</div>
								<div class="cover100">							
									<img src="assets/img/produk-kelas-tepung.jpg" class="img-responsive">
								</div>
								<a href="">
									<div class="card-body">
										<h5>Tepung Beras Indrayanti </h5>
										<h6>Rp. 120k - 150k / box</h6>
										<p>Minimal Order 10 Box</p>
									</div>							
								</a>
								<div class="btn-action" align="center">
									<div class="row">
										<div class="col-6 col-md-6 col-sm-6">
											<a href="">
												<i class="far fa-edit"></i> Edit
											</a>
										</div>
										<div class="col-6 col-md-6 col-sm-6">
											<a href="" data-toggle="modal" data-target="#hapusProduk">
												<i class="fas fa-trash"></i> Hapus
											</a>
										</div>
									</div>									
								</div>
							</div>														  
						</div>
						<div class="col-6 col-md-6 col-xl-3 col-sm-6 productCard" >
							<div class="box-lite">
								<div class="like" >
									<i class="fas fa-heart"></i>
								</div>
								<div class="cover100">
									<img src="assets/img/produk-kelas-minyak.jpg" class="img-responsive">
								</div>
								<a href="">
									<div class="card-body">
										<h5>Minyak Zaitun </h5>
										<h6>Rp. 120k - 150k / box</h6>
										<p>Minimal Order 10 Box</p>
									</div>							
								</a>
								<div class="btn-action" align="center">
									<div class="row">
										<div class="col-6 col-md-6 col-sm-6">
											<a href="">
												<i class="far fa-edit"></i> Edit
											</a>
										</div>
										<div class="col-6 col-md-6 col-sm-6">
											<a href="" data-toggle="modal" data-target="#hapusProduk">
												<i class="fas fa-trash"></i> Hapus
											</a>
										</div>
									</div>									
								</div>
							</div>							  
						</div>
						<div class="col-6 col-md-6 col-xl-3 col-sm-6 productCard" >
							<div class="box-lite">
								<div class="like" >
									<i class="fas fa-heart"></i>
								</div>
								<div class="cover100">
									<img src="assets/img/produk-kelas-susu.jpg" class="img-responsive">
								</div>
								<a href="">
									<div class="card-body">
										<h5>Susu Sapi </h5>
										<h6>Rp. 120k - 150k / box</h6>
										<p>Minimal Order 10 Box</p>
									</div>							
								</a>
								<div class="btn-action" align="center">
									<div class="row">
										<div class="col-6 col-md-6 col-sm-6">
											<a href="" >
												<i class="far fa-edit"></i> Edit
											</a>
										</div>
										<div class="col-6 col-md-6 col-sm-6">
											<a href="" data-toggle="modal" data-target="#hapusProduk">
												<i class="fas fa-trash"></i> Hapus
											</a>
										</div>
									</div>									
								</div>
							</div>						  
						</div>
						<div class="col-6 col-md-6 col-xl-3 col-sm-6 productCard" >
							<div class="box-lite">
								<div class="like" >
									<i class="fas fa-heart"></i>
								</div>
								<div class="cover100">
									<img src="assets/img/produkkelas-minuman-instan.jpg" class="img-responsive">
								</div>
								<a href="">
									<div class="card-body">
										<h5>Minuman  </h5>
										<h6>Rp. 120k - 150k / box</h6>
										<p>Minimal Order 10 Box</p>
									</div>							
								</a>
								<div class="btn-action" align="center">
									<div class="row">
										<div class="col-6 col-md-6 col-sm-6">
											<a href="">
												<i class="far fa-edit"></i> Edit
											</a>
										</div>
										<div class="col-6 col-md-6 col-sm-6">
											<a href="" data-toggle="modal" data-target="#hapusProduk">
												<i class="fas fa-trash"></i> Hapus
											</a>
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

<!-- Modal -->
<div class="modal fade" id="hapusProduk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      		<div class="modal-body">
        		<h5>Hapus Produk Tepung Beras Indrayanti ?</h5>
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        		<button type="button" class="btn btn-danger">Hapus</button>
      		</div>
    	</div>
  	</div>
</div>



 <script>
      $('#summernote').summernote({
        placeholder: 'Masukkan Detail Dari Produk',
        tabsize: 2,
        height: 200
      });
</script>