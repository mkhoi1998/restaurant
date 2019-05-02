<?php include('include/header.php'); ?>
<div>
	<div class = "vbox">
		<center>
		<img vspace="25" src="image/global/logo.png" alt="logo" width="60" height="60">
		<hr size= "0.5" width="50%" color=7B7B7B noshade >
		<br>
		<h2 style="text-transform: uppercase;"><?php echo $contain[1]; ?></h2>
		<br>
		<p style="max-width: 230px;">
		<?php 
      	for($i=3;$i<count($contain);$i+=2)
      	{
			echo $contain[$i]."<br><br>";
	  	}
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
			<li><a href="#"  onClick="return check();">Log in</a></li>
			<li><a class="signup" href="signup.html">Sign up</a></li>
		<?php } ?>
		</ul>
		</ul>
	<div class = "right" style="text-align:center;">
	<?php for($i=3;$i<count($img);$i+=2)
	{
		?><img src="image/restaurant/<?php echo $img[$i]?>";  alt="<?php echo $img[$i]?>" width="520"><br><br> <?php
	} ?>
	</div>
<?php include('include/footer.php'); ?>
