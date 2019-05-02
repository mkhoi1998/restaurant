<?php include('include/header.php'); ?>
<div>
	<div class = "vbox">
		<img vspace="25" src="image/global/logo.png" alt="logo" width="60" height="60">
		<hr size= "0.5" width="50%" color=7B7B7B noshade >
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
		<li><a href="#"  onClick="return check();">Log in</a></li>
		<li><a class="signup" href="signup.html">Sign up</a></li>
		</ul>
		</ul>
	</div>
	<div class = "right" style="padding: 10px">
	<div class="form-group">
    <?php echo form_open(site_url("signup.html"),['name'=>"accountedit"]); ?>
        <br>
		<h4>Fullname</h4>
        <?php echo form_input(['type'=>'text','name'=>'name','placeholder'=>'Name','style'=>'width:80%',"class"=>'popup']); ?>
		<h4>Email</h4>
        <?php echo form_input(['type'=>'text','name'=>'remail','placeholder'=>'Email','style'=>'width:80%',"class"=>'popup']); ?>
		<h4>Phone</h4>
        <?php echo form_input(['type'=>'text','name'=>'phone','placeholder'=>'Phone','style'=>'width:80%',"class"=>'popup']); ?>
        <h4>Password</h4>
        <?php echo form_input(['type'=>'password','name'=>'rpassword','value'=>'','style'=>'width:50%',"class"=>'popup']); ?>
        <h4>Retype password</h4>
        <?php echo form_input(['type'=>'password','name'=>'rpassword_re','value'=>'','style'=>'width:50%',"class"=>'popup']); ?>
		<h4>Address</h4>
        <?php echo form_input(['type'=>'text','name'=>'address','placeholder'=>"Address",'style'=>'width:20%',"class"=>'popup']); ?>
		<?php echo form_input(['type'=>'text','name'=>'street','placeholder'=>"Street",'style'=>'width:60%',"class"=>'popup']); ?>
		<?php echo form_input(['type'=>'text','name'=>'province','placeholder'=>"Province",'style'=>'width:30%',"class"=>'popup']); ?>
        <br>
		<?php
            echo form_submit("submit","Sign up",['class'=>'edit']);
            echo form_reset("reset","Reset",['class'=>'edit']);
    echo form_close();
    ?>
	<br>
	<div> <?php if(isset($output)) echo $output; ?> </div>
    </div>
	</div>
<?php include('include/footer.php'); ?>

