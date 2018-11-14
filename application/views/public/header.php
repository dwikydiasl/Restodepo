<!doctype html>
<html lang="en">
  <head>
  	<title>RestoDepo</title>
    <link rel="shortcut icon" href="assets/icon/restodepo-favicon.png" />
  	<link rel="stylesheet" type="text/css" href="assets/public/css/style.css">
    <link href="assets/components/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" /> 
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   
	 
	
    <link rel="stylesheet" type="text/css" href="assets/public/css/bootstrap.css">

    <!--J Query-->
    <link rel="stylesheet" type="text/css" href="assets/public/js/jquery-ui/jquery-ui.css"> 

    <!--FontAwesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    
    <link rel="stylesheet" href="asset/public/fontawesome/css/fontawesome.css" />

    <!--Summernote-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    


  </head>
  <body class="front-page">
    <!--Header-->
    <div id="header1" align="center">
    	<div class="container">
    		<div class="row">
    			<div class="title-terlaris col-12 col-sm-4 col-md-4 col-lg-3 col-xl-2" align="center">
    				<a class=""><font color="#fff" style="font-size: 16px;">KATEGORI TERLARIS</font></a>
    			</div>
    			<div class="col-12 col-sm-8 col-md-8 col-lg-9 col-xl-10" align="center">
    				<div class="wrapper">
					    <ul class="tab-container">
					      <li><a href="">IKAN</a></li>
		    				<li><a href="">TELUR</a></li>
		    				<li><a href="">DAGING</a></li>
		    				<li><a href="">TEPUNG</a></li>
		    				<li><a href="">MAKANAN BEKU</a></li>
		    				<li><a href="">KEJU</a></li>
		    				<li><a href="">SIRUP</a></li>
					    </ul>
					</div>  				   				
    			</div>
    		</div>    				
    	</div>
    </div>
    <div id="header2">
    	<div class="container">
			<div class="bantuan" align="right">
				<a href="">Depot Bantuan</a>
				<a href="">CARA BERJUALAN DI RESTO DEPO</a>
			</div>
			<div class="menu row">
				<div class="col-12 col-sm-12 col-md-3 col-md-3 col-lg-3 col-xl-3">
					<a href="index.php">
						<img src="assets/icon/restodepo-main-logo.png" class="main-logo" width="90%" height="40px;">
					</a>					
				</div>
				<div class=" col-9 col-sm-9 col-md-7 col-md-7 col-lg-7 col-xl-7">
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">
							  	<select class="select" id="inputGroupSelect03">
							    	<option value="1">Produk</option>
							    	<option value="2">Supplier</option>
							  	</select>
						</span>
					  	<input class="form-control" type="text" placeholder="Cari Supplier atau Produk apa ?"  aria-describedby="sizing-addon2" value/>	
					  	<span class="input-group-addon" id="sizing-addon2">
							<i class="fa fa-search "></i>
						</span>				 
					</div>	
				</div>
				<div class=" col-3 col-sm-3 col-md-2 col-lg-2 col-xl-2" align="right">
					<div class="menu-right row" align="right">
						<a href="wishlist.php"> <i class="far fa-heart " data-toggle="tooltip" data-placement="bottom" title="Wishlist"></i></a>
						<div class="dropdown">
						  <a  id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
						    <i class="far fa-user " ></i> <span class="badge">0</span>
						  </a>
						  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						    <a class="dropdown-item" href="<?php echo base_url().'login';?>"><i class="fas fa-user-alt"></i> Login</a>
						    <a class="dropdown-item" href="<?php echo base_url().'login';?>"><i class="fas fa-pen-square"></i> Daftar</a>
						  </div>						  
						</div>
					</div>					
				</div>
			</div>
		</div>
    </div>

