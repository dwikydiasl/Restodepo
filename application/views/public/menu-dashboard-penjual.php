<div id="panel-dashboard">
	<div class=" container">
		<div class="waktu" align="center">
			<script type='text/javascript'>
				<!--
				var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
				var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
				var date = new Date();
				var day = date.getDate();
				var month = date.getMonth();
				var thisDay = date.getDay(),
					thisDay = myDays[thisDay];
				var yy = date.getYear();
				var year = (yy < 1000) ? yy + 1900 : yy;
				document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
				//-->
			</script>
		</div>
			<ul id="nav">
				<li>
					<a href="<?php echo base_url('akun/dashboard_penjual');?>">
						<i class="fas fa-tachometer-alt"></i> Dashboard
					</a>
			  	</li>
				<li><a href="#"><i class="fas fa-shopping-bag"></i> Penjualan Produk  <span class="notif"><i class="fas fa-circle"></i></span></a>
				    <ul>
				      	<li>
				      		<a href="<?php echo base_url('penjual/invoice_penjual');?>">Invoice 
				      			<span class="badge badge-secondary">0</span>
				      		</a>
				      	</li>
				      	<li>
				      		<a href="<?php echo base_url('penjual/pembayaran_pengiriman');?>">Pembayaran & Pengiriman
				      			<span class="badge badge-secondary">0</span>
				      		</a>
				      	</li>
				    </ul>
				</li>
			  	<li><a href="#"><i class="fas fa-store"></i> Kelola Toko</a>
			    	<ul>
			      		<li>
			      			<a href="<?php echo base_url('penjual/produk_toko');?>">Produk Toko</a>
			      		</li>
			      		<li>
			      			<a href="<?php echo base_url('penjual/tambah_produk');?>">Tambah Produk</a>
			      		</li>
			    	</ul>
			  	</li>
			  	<li><a href="#"><i class="fas fa-file-invoice"></i> Permintaan Penawaran </a>
			    	<ul>
			      		<li>
			      			<a href="<?php echo base_url('penjual/permintaan_penawaran_pembeli');?>">Daftar Permintaan <span class="badge badge-secondary">0</span>
			      			</a>
			      		</li>
			    	</ul>
			  	</li>
			  	<li><a href="#"><i class="fas fa-comments"></i> Kotak Pesan  <span class="notif"><i class="fas fa-circle"></i></span></a>
			    	<ul>
			     		<li>
			     			<a href="<?php echo base_url('penjual/kotak_pesan');?>">Pesan Masuk  <span class="badge badge-secondary">8</span></a>
			     		</li>
						<li>
							<a href="<?php echo base_url('penjual/kontak_pembeli');?>">Kontak Pembeli</a>
						</li>
			   		</ul>
			  	</li>
			  	<li>
			  		<a href="<?php echo base_url('penjual/edit_profil');?>"><i class="fas fa-cog"></i> Edit Profil</a>
			  	</li>
			</ul>			
	</div>
</div>
<style type="text/css">
	#nav {
    float: left;
    font-size: 14px;
}
#nav li{
	margin-left: -60px;
	border-bottom: 1px solid #32433C;
}
#nav li ul li{
}
#nav li a {
    display: block;
    padding: 5px 10px;
    text-decoration: none;
    color: #fff;
}
#nav li a:hover, #nav li a.active {
    color: black;
}
#nav li a.active {
	background-color: #FCFFF6;
	width: 100%;
}
#nav li ul {
    display: none; // used to hide sub-menus
   
}
#nav li ul li a {
    padding: 5px 15px;
}
#nav li{
	list-style: none;
}
#nav li ul li{
	 margin-left: -30px;
}
@media screen and (max-width: 576px) {
	#nav li{
	margin-left: -40px;
	border-bottom: 0px solid #32433C;
	}
}
@media (min-width: 576px) and (max-width: 768px) {
	.accordion-dashboard{
	}
	#nav li{
	margin-left: -60px;
	border-bottom: 0px solid #32433C;
}
@media (min-width: 768px) and (max-width: 992px) {
	
	}
}
</style>

<script type="text/javascript">
	$(document).ready(function () {
  $('#nav li').first().addClass("active").find('ul').show();
  $('#nav > li > a').click(function(){
    if ($(this).attr('class') != 'active'){
      $('#nav li ul').slideUp();
      $(this).next().slideToggle();
      $('#nav li a').removeClass('active');
      $(this).addClass('active');
    }
  });
});
</script>