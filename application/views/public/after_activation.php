<?php
include "header1.php";
?>
<?php
include "header2.php";
?>
<style type="text/css">
	#header1{
		display: none;
		}
		#header2 .input-group{
		display: none;
	}
</style>

	<div id="login">			
		<div class="container" align="center" style="height: 500px; padding-top: 20px">			
		
			<div style="margin-bottom: 25px">
				<img src="<?php echo base_url();?>assets/img/illustrasi-selamataktifasi.png" class="main-logo" width="60%" height="400px;">
			</div>		
			<div style="font-size: 22px; font-weight: bold; font-family: roboto">
				<?php echo $pesan; ?>
			</div>
			<div class="pilih-page" align="center">
				<a href="" type="button">Lengkapi Data Profil</a> 
				Atau
				<a href="" type="button">Langsung Belanja</a> 
			</div>
			
		</div>		
	</div>

<?php
include "footer1.php";
?>
<?php
include "footer2.php";
?>

