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
		<div class="accordion-dashboard">
			<ul id="nav">
				<li>
					<a href="dashboard-pembeli.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
			  	</li>
				<li><a href="#"><i class="fas fa-shopping-bag"></i> Orderan Saya <span class="notif"><i class="fas fa-circle"></i></span></a>
				    <ul>
				      	<li>
				      		<a href="pembayaran-invoice.php">Pembayaran Invoice 
				      			<span class="badge badge-secondary">10</span>
				      		</a>
				      	</li>
						<li>
							<a href="status-produk.php">Status Produk 
								<span class="badge badge-secondary">0</span>
							</a>
						</li>
						<li>
							<a href="produk-favorit.php">Favorit
							</a>
						</li>
						<li>
							<a href="#">Track Pengiriman
							</a>
						</li>
				    </ul>
				</li>
				<li>
					<a href="kotak-pesan-pembeli.php">
						<i class="fas fa-comments"></i> Kotak Pesan 
						<span class="badge badge-secondary">0</span>
					</a>
				</li>
				<li>
					<a href="kotak-penawaran.php"><i class="fas fa-file-invoice"></i> Kotak Penawaran <span class="badge badge-secondary">0</span></a>
				</li>
				<li>
					<a href="edit-profil.php"><i class="fas fa-cog"></i> Edit Profil
					</a>
				</li>
			</ul>			
		</div>
		<div class="tanya-admin" align="center" style="margin-bottom: 30px;">
			<a href=""><i class="fas fa-question-circle"></i> Tanya Admin Depo</a>
		</div>					
	</div>
</div>
<style type="text/css">
	#nav {
    float: left;
    font-size: 14px;
}
#nav li{
	margin-left: -65px;
	border-bottom: 1px solid #32433C;
}
#nav li ul li{
	border-bottom:none;
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
.toggleSwitch{
	display: none;
}
.tanya-admin{
	margin-top: 350px;
	border:1px solid #34E09F;
	padding: 3px 8px 3px 8px;
	border-radius: 20px;
	color: #34E09F;

}
.tanya-admin a{
color: #34E09F;
font-size: 12px;
text-align: center;
margin-bottom: 30px;
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