<!doctype html>
<html>
<head>
<!------ Include the above in your HEAD tag ---------->
<style>

body  {
	font-family:arial;
    background-image: url("image/global/background.png");
    background-size: cover; /* or contain depending on what you want */
    background-repeat: no-repeat;
    background-attachment: fixed;
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
    background-color: #1d1d1d;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
</style>
<link rel="stylesheet" href="css/style.css">
<title>Reset account</title>
</head>
<body>
<div>
	<div class = "box">
		<center>
        <?php if(!isset($re))
        {?>
            <img vspace="25" src="image/global/logo.png" alt="logo" width="60" height="60">
            <?php echo form_open(site_url('account-reset.html'),['name'=>"reset"]); ?>
            <br>
            <h4 style='color:whitesmoke'>Please enter your email.</h4>
            <?php echo form_input(['type'=>'text','name'=>'email','value'=>'','placeholder'=>'Email']); ?>
            <br>
            <?php echo form_submit("submit","Submit"); ?>
            <br><br>
            <a href="/restaurant" style='color:whitesmoke'>Home</a>
            <a href="signup.html" style='color:whitesmoke'>Sign up</a>
            <?php echo form_close();
        }
        else
        {?>
            <h4 style='color:whitesmoke'><?php echo $re; ?></h4>
            <a href="/restaurant" style='color:whitesmoke'>Home</a>
            <?php }?>
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