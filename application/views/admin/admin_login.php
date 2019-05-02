<!doctype html>
<html>
<head>
<!------ Include the above in your HEAD tag ---------->
<style>

body  {
	font-family:arial;
    background-color: #1d1d1d;
    margin:auto;
    padding:0;
}
input
{
    background: #1d1d1d;
    color: whitesmoke;
    border: 1px solid whitesmoke;
    width: 265px;
    height: 35px;
    margin: 5px;
    font-size: 16px;
    border-radius: 2px;
}
.box
{
   position: fixed;
   top: 50%;
   left: 50%;
   transform: translate(-50%, -50%);
}
</style>
<link rel="stylesheet" href="css/style.css">
<title>Admin log in</title>
</head>
<body>
<div>
	<div class = "box">
		<center>
		<img vspace="25" src="image/global/logo.png" alt="logo" width="60" height="60">
		<?php echo form_open(site_url('admin.html'),['name'=>"reservation"]); ?>
		<br>
		<?php echo form_input(['type'=>'text','name'=>'username','value'=>'','placeholder'=>'Username']); ?>
		<br>
		<?php echo form_password(['type'=>'text','name'=>'password','value'=>'','placeholder'=>'Password']); ?>
		<br><br>
		<?php echo form_submit("submit","Log In"); ?>
		<?php echo form_close(); ?>
		</center>
	
</div>
</body>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
	$(document).ready(function () {
    $('#datepicker').datepicker({
      uiLibrary: 'bootstrap'
    });
});
</script>