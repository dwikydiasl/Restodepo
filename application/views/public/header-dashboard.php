<!doctype html>
<html lang="en">
  <head>
  	<title>RestoDepo</title>
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/icon/restodepo-favicon.png" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/public/css/style.css">
    <link href="<?php echo base_url();?>assets/components/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" /> 
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
     <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/public/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
     <!--J Query-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/public/js/jquery-ui/jquery-ui.css"> 

    <!--FontAwesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js" integrity="sha384-kW+oWsYx3YpxvjtZjFXqazFpA7UP/MbiY4jvs+RWZo2+N94PFZ36T6TFkc9O3qoB" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/public/fontawesome/css/fontawesome.css" />

    <!--Summernote-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>


  </head>
  <body class="front-page">
    <!--Header-->
    
    <div id="header2">
    	<div class="container-fluid">
			<div class="bantuan" align="right">
				<a href="">Depot Bantuan</a>
				<a href="">CARA BERJUALAN DI RESTO DEPO</a>
			</div>
			<div class="menu row">
				<div class="col-6 col-md-4 col-sm-6 col-lg-4 col-xl-3">
					<a href="index.php">
						<img src="<?php echo base_url();?>assets/icon/restodepo-main-logo.png" class="main-logo" width="70%" >
					</a>					
				</div>
				<div class=" col-1 col-md-5 col-sm-2 col-lg-6  col-xl-7">
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">
							  	<select class="select" id="inputGroupSelect03">
							    	<option value="1">Supplier</option>
							    	<option value="2">Produk</option>
							  	</select>
						</span>
					  	<input class="form-control" type="text" placeholder="Cari Supplier atau Produk apa ?"  aria-describedby="sizing-addon2" value/>	
					  	<span class="input-group-addon" id="sizing-addon2">
							<i class="fa fa-search "></i>
						</span>				 
					</div>	
				</div>
				<div class=" col-4 col-md-3 col-sm-4 col-lg-2  col-xl-2" align="right">
					<div class="menu-right row">
						<label class="toggleSwitch nolabel" onclick="">
					        <input type="checkbox" checked />
					        <span>
					            <span>Tutup</span>
					            <span>Buka</span>
					        </span>
					        <a></a>
					 </label>
						<div class="dropdown" style="margin-left: 20px;">
						  <a  id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
						    <i class="far fa-user " ></i> <span class="badge">0</span>
						  </a>
						  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="margin-right:0 auto;">
						    <a class="dropdown-item" href="<?php echo base_url('');?>">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-2" align="left">
                        <img src="<?php echo base_url();?>assets/gambar_toko/foto/p3.png" class="avatar-login" width="30" height="30px;">
                      </div>
                      <div class="col-md-10" align="left">
                        <small>Halo</small>
                      <h6 style="font-size: 14px">Daging Segar Barokah</h6>
                      </div>
                    </div>  
                  </div>                                  
                </a>
                <a class="dropdown-item" href="<?php echo base_url('');?>"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                <a class="dropdown-item" href="<?php echo base_url('');?>"><i class="fas fa-shopping-cart"></i> Orderan Saya</a>
                <a class="dropdown-item" href="<?php echo base_url('');?>"><i class="fas fa-comments"></i> Kotak Pesan</a>
                <a class="dropdown-item" href="<?php echo base_url('');?>"><i class="fas fa-clipboard-list"></i> Kotak Penawaran</a>
                <a class="dropdown-item" href="<?php echo base_url('akun/dologout');?>"><i class="fas fa-sign-out-alt"></i> Keluar</a>
						  </div>						  
						</div>
					</div>					
				</div>
			</div>
		</div>
    </div>

<style type="text/css">
	/*  Toggle Switch  */

.toggleSwitch span span {
  display: none;
}

@media only screen {
  .toggleSwitch {
    display: inline-block;
    height: 28px;
    position: relative;
    overflow: visible;
    padding: 0;
    margin-top: 1px;
    cursor: pointer;
    width: 80px;

  }
  .toggleSwitch * {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
  }
  .toggleSwitch label,
  .toggleSwitch > span {
    line-height: 30px;
    height: 30px;
    vertical-align: middle;
  }
  .toggleSwitch input:focus ~ a,
  .toggleSwitch input:focus + label {
    outline: none;
  }
  .toggleSwitch label {
    position: relative;
    z-index: 3;
    display: block;
    width: 100%;
  }
  .toggleSwitch input {
    position: absolute;
    opacity: 0;
    z-index: 5;
  }
  .toggleSwitch > span {
    position: absolute;
    left: -40px;
    width: 100%;
    margin: 0;
    padding-right: 50px;
    text-align: left;
    white-space: nowrap;
  }
  .toggleSwitch > span span {
    position: absolute;
    top: 0;
    left: 0;
    z-index: 5;
    display: block;
    width: 50%;
    margin-left: 50px;
    text-align: left;
    font-size: 0.9em;
    width: 100%;
    left: 15%;
    top: -1px;
    opacity: 0;
  }
  .toggleSwitch a {
    position: absolute;
    right: 50%;
    z-index: 4;
    display: block;
    height: 100%;
    padding: 0;
    left: 11px;
    width: 25px;
    background-color: #34E09F;
    border: 2px solid #FFFFFF;
    border-radius: 100%;
    -webkit-transition: all 0.2s ease-out;
    -moz-transition: all 0.2s ease-out;
    transition: all 0.2s ease-out;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
  }
  .toggleSwitch > span span:first-of-type {
    color: #FA7422;
    opacity: 1;
    left: 35%;
    font-weight: bold;
  }
  .toggleSwitch > span:before {
    content: '';
    display: block;
    width: 100%;
    height: 100%;
    position: absolute;
    left: 50px;
    top: -1px;
    background-color: #ECECEC;
    border: 2px solid #ccc;
    border-radius: 30px;
    -webkit-transition: all 0.2s ease-out;
    -moz-transition: all 0.2s ease-out;
    transition: all 0.2s ease-out;
  }
  .toggleSwitch input:checked ~ a {
    border-color: #fff;
    left: 100%;
    margin-left: -15px;
  }
  .toggleSwitch input:checked ~ span:before {
    border:2px solid rgba(0, 0, 0, 0.1);
    box-shadow: inset 0 0 0 30px #ECECEC;
  }
  .toggleSwitch input:checked ~ span span:first-of-type {
    opacity: 0;
  }
  .toggleSwitch input:checked ~ span span:last-of-type {
    opacity: 1;
    color: #008B57;
    font-weight: bold;
  }
 
}


/*  End Toggle Switch  */
</style>