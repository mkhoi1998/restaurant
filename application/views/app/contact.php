<?php include('include/header.php'); ?>
<div>
	<div class = "vbox">
		<center>
		<img vspace="25" src="image/global/logo.png" alt="logo" width="60" height="60">
		<hr size= "0.5" width="50%" color=7B7B7B noshade >
		<br>
		<h2 style="text-transform: uppercase;"><?php echo $contain[0]; ?></h2>
		<br>
		<p style="max-width: 230px;">
		<?php 
			echo $contain[1]."<br>";
			echo $contain[2]."/ ".$contain[3]."<br>";
			echo $contain[4]." ".$contain[5].", ".$contain[6]."<br><br>";
			echo "Open from ".$contain[7]." A.M. to ".$contain[8]." P.M.<br><br>";
	  	?></p>
		</center>
	</div>
	<div class = "base">
		<p></p>
	</div>
	<div>
		<br>
		<ul>
		<li><a href="home.html">Home</a></li>
		<li><a href="restaurant.html">Restaurant</a></li>
		<li><a href="menu.html">Menu</a></li>
		<li><a href="contact.html">Contact</a></li>
		<?php if ($logon) 
		{
			?> <li><a href="account.html">Account</a></li>
			<li><a href="account-logout.html">Log out</a></li>
			<?php
		}
		else
		{?>
			<li><a href="#" onClick="return check();">Log in</a></li>
			<li><a class="signup" href="signup.html">Sign up</a></li>
		<?php } ?>
		</ul>
		</ul>
	<div class = "right" style="text-align:center;">
		<iframe left='40px' height="250px" width="520px" frameborder="0" src="<?php echo $contain[9]; ?>" ></iframe>
		<?php $url = 'feedback.html';?>
		<?php echo form_open(site_url('feedback.html'),['name'=>"feedback",'onSubmit'=>"return check();"]); ?>
		<br>
		<?php echo form_textarea(['name'=>'subject','rows'=>1,'placeholder'=>'Subject','class'=>'contact']); ?>
		<br>
		<?php echo form_textarea(['name'=>'message','rows'=>6,'placeholder'=>'Message','class'=>'contact']); ?>
		<br>
		<?php echo form_submit("send","Send"); ?>
		<?php echo form_close(); ?>
		<br>
		<div> <?php if(isset($_COOKIE['output'])) echo $_COOKIE['output']; ?> </div>
		<br><br>
	</div>
<?php include('include/footer.php'); ?>