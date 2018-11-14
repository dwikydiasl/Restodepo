<?php
include "header.php";
?>
<style type="text/css">
	#header1{
		display: none;
	}
	#header2{
		border-bottom: 2px solid rgba(0, 0, 0, 0.15);
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

<div id="wishlist">
	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page" style="color: #FA7422 ">Wishlist (Daftar Keinginan)</li>
			</ol>
		</nav>

		<div class="tabel-wishlist">
			<div class="row" style="margin-bottom: 10px; ">
				<div class="col-6 col-md-6" align="left" style="padding-top: 5px; ">
					<h6>Daftar Keinginan </h6>
				</div>
				<div class="col-6 col-md-6" align="right">
					<div class="form-group row" align="right">
						<label for="staticEmail" class="col-sm-7 col-form-label" >Sort Berdasarkan :</label>
						<div class="col-sm-5">
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
			<div class="table-responsive">
				<table class="table table-hover table-bordered">
					<thead>
					    <tr class="header-table" align="center">
						    <th scope="col" width="10%">Item</th>
						    <th scope="col" width="30%">Nama Item</th>
						    <th scope="col" width="10%">Min Order</th>
						    <th scope="col" width="10%">Harga</th>
						    <th scope="col" width="30%">Aksi</th>
					    </tr>
					  </thead>
					  <tbody align="center">
					    <tr>
						    <th scope="row">
						      	<img src="assets/img/produk-kelas-tepung.jpg" class="img-responsive">
						    </th>
						    <td>Minyak Yaitun</td>
						    <td>10 kg</td>
						    <td>Rp. 120k - 150k</td>
						    <td>
						    	<button type="button" class="btn hijau btn-sm">Request Produk</button>
						    	<button type="button" class="btn orange btn-sm">Favoritkan</button>
						    	<button type="button" class="btn  btn-sm">Hapus dari daftar</button>
						    </td>
					    </tr>
					    <tr>
						    <th scope="row">
						      	<img src="assets/img/produk-kelas-minyak.jpg" class="img-responsive">
						    </th>
						    <td>Minyak Yaitun</td>
						    <td>10 kg</td>
						    <td>Rp. 120k - 150k</td>
						    <td>
						    	<button type="button" class="btn hijau btn-sm">Request Produk</button>
						    	<button type="button" class="btn orange btn-sm">Favoritkan</button>
						    	<button type="button" class="btn  btn-sm">Hapus dari daftar</button>
						    </td>
					    </tr>
					</tbody>
				</table>
			</div>			
		</div>

	</div>
</div>


<?php
include "footer.php";
?>