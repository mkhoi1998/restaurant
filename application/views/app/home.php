<?php include('include/header.php'); ?>
<div>
	<div class = "vbox">
		<center>
		<img vspace="25" src="image/global/logo.png" alt="logo" width="60" height="60">
		<hr size= "0.5" width="50%" color=7B7B7B noshade >
		<br>
		<h2 style="text-transform: uppercase;"><?php echo $tit ?></h2>
		<br>
		<p style="max-width: 270px;"><?php echo $contain ?></p>
		</center>
		<div class = "reservation">
		<h2>Reservation</h2>
		<?php
			echo form_open(site_url('reservation.html'),['name'=>"reservation",'onSubmit'=>"return check();"]);
		?>
		<br>
		<center>
		<?php echo form_input(['id'=>"datepicker",'width'=>"270",'value'=>"Date"]); ?>
		<br>
		<?php
			$option = ["Seats"];
			for($i =1;$i <=8;$i++)
			{
				if($i==1)  $in = $i." person"; else $in = $i." people";
				array_push($option,$in);
			}
			$js = 'class="form"';
			echo form_dropdown('seats', $option, 'Seats',$js);
				
		?>
		<br>
		<?php
			$option = ["Time"];
			for($i =7;$i <=24;$i++)
			{
				if($i<=12)  $in = $i." A.M."; else {$a = $i-12; $in =  $a." P.M.";}
				array_push($option,$in);
			}
			$js = 'class="form"';
			echo form_dropdown('time', $option, 'Time',$js);
				
		?>
		<br><br>
		<?php $url = 'reservation.html';?>
		<?php echo form_submit("book","Book Now"); ?>
		</center>
		<?php echo form_close(); ?>
		<br>
		<div> <?php if(isset($_COOKIE['output'])) echo $_COOKIE['output']; ?> </div>
		</div>
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
	</div>
<?php include('include/footer.php'); ?>