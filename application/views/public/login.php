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
		<div class="container" >			
			<div class="panel-login">
				<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
					<li >
					    <a class=" active" id="pills-login-tab" data-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true">
					    	<i class="fas fa-sign-in-alt"></i> Login
					    </a>
					</li>
					<li >
					    <a class="" id="pills-daftar-tab" data-toggle="pill" href="#pills-daftar" role="tab" aria-controls="pills-daftar" aria-selected="false">
					    	<i class="fas fa-user-edit"></i> Daftar
					    </a>
					</li>
					<li >
					    <a class="" id="pills-reset-password-tab" data-toggle="pill" href="#pills-reset-password" role="tab" aria-controls="pills-reset-password" aria-selected="false">
					    	<i class="fas fa-user-lock"></i> Reset Password
					    </a>
					</li>
				</ul>
					<div class="tab-content" id="pills-tabContent">

						<!--LOGIN-->

					  <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="pills-login-tab" >
					  		<form class="form-login" id="login-restodepo" name="login-restodepo" action="<?php echo base_url();?>akun/logmein" method="POST">
					  			<div class="row">
					  				<div class="col-md-2">
						  				<label>Username</label>
							  		</div>
							  		<div class="col-md-10">
							  			<div class="input-group ">
											<span class="input-group-addon" id="sizing-addon2">
												<i class="far fa-user "></i>
											</span>	
										  	<input class="form-control" type="email" name="username" placeholder="Masukkan E-Mail Anda"  aria-describedby="sizing-addon2" value/>  			 
										</div>
							  		</div>							  		
					  			</div>
					  			<div class="row">
					  				<div class="col-md-2">
						  				<label>Password</label>
							  		</div>
							  		<div class="col-md-10">
							  			<div class="input-group ">
											<span class="input-group-addon" id="sizing-addon2">
												<i class="fa fa-key "></i>
											</span>	
										  	<input class="form-control" type="Password" name="password7" placeholder="Masukkan Password Anda"  aria-describedby="sizing-addon2" value/>  			 
										</div>
							  		</div>							  		
					  			</div>
					  			<div class="row">
					  				<div class="col-md-2">
						  				<label>Status</label>
							  		</div>
							  		<div class=" col-md-10">
							  			<div class="input-group">
											<span class="input-group-addon" id="sizing-addon2">
												<i class="fa fa-users "></i>
											</span>	
										  	 <select name="select_role" id="select_role1" class="form-control">
											    <option value="pembeli">Pembeli</option>
											    <option value="penjual">Penjual</option>
											  </select>	  			 
										</div>
							  		</div>							  		
					  			</div>
					  			<div class="row">
					  				<div class="col-md-2">
						  				<label></label>
							  		</div>
							  		<div class="col-md-10">
							  			<div class="input-group ">
											<span style="font-size:20px; color:#bbbbbb; font-weight:bold; padding-left: 5px; padding-top: 5px;">
												<?php echo $kode;?>									
											</span>
										  	<input class="form-control" type="text" placeholder="Masukkan Kode di Sebelah" name="captcha" id="captcha" aria-describedby="sizing-addon2" value/> 		 
										</div>
							  		</div>							  		
					  			</div>
					  			<div align="center">
					  				<button type="submit" class="btn orange">Login</button>
					  			</div>					  			
					  		</form>				  			
					  </div>

					  <!--DAFTAR-->

					  	<div class="tab-pane fade" id="pills-daftar" role="tabpanel" aria-labelledby="pills-daftar-tab">
					  		<div class="data-daftar">					  			
					  		<h6>Data Personal</h6>
							  	<form action="<?php echo base_url().'akun/doregister';?>" method="POST" >
							  		<div class="data-personal">
								  		<div class="row">
							  				<div class="col-md-2">
								  				<label>Mendaftar Sebagai</label>
									  		</div>
									  		<div class="col-md-10">
									  			<div class="input-group ">
													<span class="input-group-addon" id="sizing-addon2">
														<i class="fa fa-users "></i>
													</span>	
												  	 <select class="form-control" id="select_role" name="select_role">
													    <option value="">Pilih Status Akun</option>
												     	<option value="penjual">Penjual</option>
												     	<option value="pembeli">Pembeli</option>
													  </select>	  			 
												</div>
									  		</div>									  		
							  			</div>
								  		<div class="row">
								  			<div class="col-md-2">
									  			<label>E-Mail</label>
										  	</div>
										  	<div class="col-md-10">
										  		<div class="input-group ">
													<span class="input-group-addon" id="sizing-addon2">
														<i class="far fa-envelope "></i>
													</span>	
													<input class="form-control" type="text" name="email" placeholder="Masukkan E-Mail Anda"  aria-describedby="sizing-addon2" value/>		 
												</div>
										  	</div>										  	
								  		</div>
								  		<div class="row">
								  			<div class="col-md-2">
									  			<label>Password</label>
										  	</div>
										  	<div class="col-md-5">
										  		<div class="input-group " >
													<span class="input-group-addon" id="sizing-addon2">
														<i class="fa fa-key "></i>
													</span>	
													<input class="form-control" type="password" name="password1" placeholder="Masukkan Password"  aria-describedby="sizing-addon2" value/>		 
												</div>
										  	</div>
										  	<div class="col-md-5">
										  		<div class="input-group ">
													<input class="form-control" type="password" placeholder="Ulangi Password" name="password2" aria-describedby="sizing-addon2" value/>		 
												</div>
										  	</div>											
								  		</div>								  		
							  			<div class="output">
										  <div id="penjual" class="colors penjual">
										  		<div class="row">
									  				<div class="col-md-2">
										  				<label>Nama PT</label>
											  		</div>
											  		<div class="col-md-10">
											  			<div class="input-group ">
															<span class="input-group-addon" id="sizing-addon2">
																<i class="far fa-user "></i>
															</span>	
														  	<input class="form-control" type="text" placeholder="Masukkan Nama PT" name="nama_pt" aria-describedby="sizing-addon2" value/>  			 
														</div>
											  		</div>									  		
									  			</div>
									  			<div class="row">
									  				<div class="col-md-2">
										  				<label>Nama Toko</label>
											  		</div>
											  		<div class="col-md-10">
											  			<div class="input-group ">
															<span class="input-group-addon" id="sizing-addon2">
																<i class="far fa-user "></i>
															</span>	
														  	<input class="form-control" type="text" placeholder="Masukkan Nama Toko" name="nama_toko" aria-describedby="sizing-addon2" value/>
														</div>
											  		</div>									  		
									  			</div>
										   </div>
										  <div id="pembeli" class="colors pembeli"> 
										  	<div class="row">
									  				<div class="col-md-2">
										  				<label>Nama </label>
											  		</div>
											  		<div class="col-md-10">
											  			<div class="input-group ">
															<span class="input-group-addon" id="sizing-addon2">
																<i class="far fa-user "></i>
															</span>	
														  	<input class="form-control" type="text" placeholder="Masukkan  Nama" name="nama" aria-describedby="sizing-addon2" value/>  			 
														</div>
											  		</div>									  		
									  			</div>
										  </div>
										</div>
							  			<div class="row">
							  				<div class="col-md-2">
								  				<label>Telepon</label>
									  		</div>
									  		<div class="col-md-10">
									  			<div class="input-group ">
													<span class="input-group-addon" id="sizing-addon2">
														<i class="fas fa-mobile-alt "></i>
													</span>	
												  	<input class="form-control" type="number" placeholder="ex: 0812xxx" name="telepon"  aria-describedby="sizing-addon2" value/>			 
												</div>
									  		</div>									  		
							  			</div>
					  				</div>
							  		
						  			<div align="center" style="margin-top: 30px;">
							  			<button type="submit" class="btn orange">Kirim</button>
							  		</div>
							  	</form>
							 </div>
					  	</div>

					  <!--RESET PASSWORD-->


					  	<div class="tab-pane fade" id="pills-reset-password" role="tabpanel" aria-labelledby="pills-reset-password-tab">
					  		<form name="reset-passwword" action="<?php echo base_url().'akun/doresetpassword';?>" method="POST">
					  			<div class="panel-reset-password">
						  			<div class="row">
						  				<div class="col-md-2">
							  				<label>Status</label>
								  		</div>
								  		<div class="input-group col-md-10">
											<span class="input-group-addon" id="sizing-addon2">
												<i class="fa fa-users "></i>
											</span>	
										  	 <select class="form-control" name="select_role" id="select_role2">
											    <option value="pembeli">Pembeli</option>
											    <option value="penjual">Penjual</option>
											  </select>	  			 
										</div>
						  			</div>
						  			<div class="row">
									  	<div class="col-md-2">
										  	<label>E-Mail</label>
										</div>
										<div class="input-group col-md-10">
											<span class="input-group-addon" id="sizing-addon2">
												<i class="fa fa-envelope "></i>
											</span>	
											<input class="form-control" type="text" placeholder="Masukkan E-Mail Anda" name="email" aria-describedby="sizing-addon2" value/>		 
										</div>
									</div>
									<div align="center">
										<button type="submit" class="btn orange">Kirim Password Baru</button>
									</div>
						  		</div>
					  		</form>				  		
					  	</div>
					</div>
			</div>			
			
		</div>
	</div>

<?php
include "footer1.php";
?>
<?php
include "footer2.php";
?>

<script type="text/javascript">
	$(function() {
  $('#select_role').change(function(){
    $('.colors').hide();
    $('#' + $(this).val()).show();
  });
});
</script>
<style type="text/css">
	@media screen and (-ms-high-contrast: active), (-ms-high-contrast: none) {
  .dropdown select::-ms-expand {
    display: none;
  }
  select:focus::-ms-value {
    background: transparent;
    color: #222;
  }
}

body:last-child .dropdown::after, x:-moz-any-link {
  display: none;
}
/* reduce padding */
body:last-child .dropdown select, x:-moz-any-link {
  padding-right: .8em;
}

_::-moz-progress-bar, body:last-child .dropdown {
  overflow: hidden;
}
/* Show only the custom icon */
_::-moz-progress-bar, body:last-child .dropdown:after {
  display: block;
}
_::-moz-progress-bar, body:last-child .dropdown select {
  /* increase padding to make room for menu icon */
  padding-right: 1.9em;
  /* `window` appearance with these text-indent and text-overflow values will hide the arrow FF up to v30 */
  -moz-appearance: window;
  text-indent: 0.01px;
  text-overflow: "";
  /* for FF 30+ on Windows 8, we need to make the select a bit longer to hide the native arrow */
  width: 110%;
}

_::-moz-progress-bar, body:last-child .dropdown select:focus {
  outline: 2px solid rgba(180,222,250, .7);
}


/* Opera - Pre-Blink nix the custom arrow, go with a native select button */
x:-o-prefocus, .dropdown::after {
  display:none;
}


/* Hover style */
.dropdown:hover {
  border:1px solid #888;
}

/* Focus style */
select:focus {
  outline:none;
  box-shadow: 0 0 1px 3px rgba(180,222,250, 1);
  background-color:transparent;
  color: #222;
  border:1px solid #aaa;
}


/* Firefox focus has odd artifacts around the text, this kills that */
select:-moz-focusring {
  color: transparent;
  text-shadow: 0 0 0 #000;
}

option {
  font-weight:normal;
}


/* These are just demo button-y styles, style as you like */
.button {
  border: 1px solid #bbb;
  border-radius: .3em;
  box-shadow: 0 1px 0 1px rgba(0,0,0,.04);
  background: #f3f3f3; /* Old browsers */
  background: -moz-linear-gradient(top, #ffffff 0%, #e5e5e5 100%); /* FF3.6+ */
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ffffff), color-stop(100%,#e5e5e5)); /* Chrome,Safari4+ */
  background: -webkit-linear-gradient(top, #ffffff 0%,#e5e5e5 100%); /* Chrome10+,Safari5.1+ */
  background: -o-linear-gradient(top, #ffffff 0%,#e5e5e5 100%); /* Opera 11.10+ */
  background: -ms-linear-gradient(top, #ffffff 0%,#e5e5e5 100%); /* IE10+ */
  background: linear-gradient(to bottom, #ffffff 0%,#e5e5e5 100%); /* W3C */
}

.output { 
}
.colors {
  display: none;
}
</style>