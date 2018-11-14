<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login </title>
<link href="<?php echo base_url();?>assets/components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.clearsudut
{
	border-radius: 4px !important;
}
.form-signin
{
max-width: 330px;
padding: 15px;
margin: 0 auto;
}
.form-signin .form-signin-heading, .form-signin .checkbox
{
margin-bottom: 10px;
}
.form-signin .checkbox
{
font-weight: normal;
}
.form-signin .form-control
{
position: relative;
font-size: 14px;
height: auto;
padding: 10px;
-webkit-box-sizing: border-box;
-moz-box-sizing: border-box;
box-sizing: border-box;
}
.form-signin .form-control:focus
{
z-index: 2;
}
.form-signin input[type="text"]
{
margin-bottom: -1px;
border-bottom-left-radius: 0;
border-bottom-right-radius: 0;
}
.form-signin input[type="password"]
{
margin-bottom: 10px;
border-top-left-radius: 0;
border-top-right-radius: 0;
}
.account-wall
{
margin-top: 20px;
padding: 40px 0px 20px 0px;
background-color: transparent;
-moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
-webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
box-shadow: 0px 2px 2px rgba(0, 0, 0, 0);
}
.login-title
{
color: #555;
font-size: 18px;
font-weight: 400;
display: block;
}
.profile-img
{
width: 96px;
height: 96px;
margin: 0 auto 10px;
display: block;
-moz-border-radius: 50%;
-webkit-border-radius: 50%;
border-radius: 50%;
}
.need-help
{
margin-top: 10px;
}
.new-account
{
display: block;
margin-top: 10px;
} 
body { 
  /*background: url(<?php echo base_url();?>images/bgbali.jpg) no-repeat center center fixed; */
  /*background:#004d40;*/
  background: #6dc68a;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
</style>
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">

            <div class="account-wall" style="background: rgba(255,255,255,1); margin-top:40px;">
            	<?php if ($msg) { ?><div style="margin-left:30px; font-weight:bold; color:#990000;"><?php echo $msg;?></div><?php } ?>
            <form class="form-signin" name="login" action="<?php echo base_url();?>backend/login/logmein" method="post">
            	
            
                <input type="text" class="form-control clearsudut" placeholder="Username" name="username" id="username" required autofocus>
                
                <input type="password" class="form-control clearsudut" placeholder="Password" name="password" id="password" required style="margin-top:20px;">
                <span style="font-size:24px; color:#bbbbbb; font-weight:bold;"><?php echo $kode;?></span>
                <input type="text" class="form-control clearsudut" placeholder="masukkan kode diatas" name="captcha" id="captcha" required >
                
	            <button class="btn btn-lg btn-success btn-block clearsudut" type="submit" style="margin-top:20px;">Login </button>
            
            </form>
        </div>
       
        </div>
    </div>
</div> 
<script src="<?php echo base_url();?>components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url();?>components/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript">
function disableSelection(target){
if (typeof target.onselectstart!="undefined") //For IE 
    target.onselectstart=function(){return false}
else if (typeof target.style.MozUserSelect!="undefined") //For Firefox
    target.style.MozUserSelect="none"
else //All other route (For Opera)
    target.onmousedown=function(){return false}
target.style.cursor = "default"
}

disableSelection(document.body);

</script>
</body>
</html>