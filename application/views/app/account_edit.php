<?php include('include/header.php'); ?>
<div>
	<div class = "vbox">
		<img vspace="25" src="image/global/logo.png" alt="logo" width="60" height="60">
		<hr size= "0.5" width="50%" color=7B7B7B noshade >
		<br>
		<img width="70" height="70" src="image/user/<?php echo $contain[6]; ?>">
		<a href="account.html" style="position: absolute; bottom:50px; left:45%;">Back</a>
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
		<li><a href="account.html">Account</a></li>
		<li><a href="account-logout.html">Log out</a></li>
		</ul>
		</ul>
	</div>
	<div class = "right" style="padding: 10px">
	
	<div class="form-group">
    <?php echo form_open_multipart(site_url("account-edit.html"),['name'=>"accountedit"]); ?>
        <br>
		<h4>Profile picture</h4>
		<?php echo form_input(['type'=>'file','name'=>'uimg','value'=>'',"class"=>'popup']); ?>
		<h4>Fullname</h4>
        <?php echo form_input(['type'=>'text','name'=>'name','placeholder'=>$contain[1],'style'=>'width:80%',"class"=>'popup']); ?>
		<h4>Email</h4>
        <?php echo form_input(['type'=>'text','name'=>'email','placeholder'=>$contain[0],'style'=>'width:80%',"class"=>'popup']); ?>
		<h4>Phone</h4>
        <?php echo form_input(['type'=>'text','name'=>'phone','placeholder'=>$contain[2],'style'=>'width:80%',"class"=>'popup']); ?>
		<h4>Address</h4>
        <?php echo form_input(['type'=>'text','name'=>'address','placeholder'=>$contain[3],'style'=>'width:20%',"class"=>'popup']); ?>
		<?php echo form_input(['type'=>'text','name'=>'street','placeholder'=>$contain[4],'style'=>'width:60%',"class"=>'popup']); ?>
		<?php echo form_input(['type'=>'text','name'=>'province','placeholder'=>$contain[5],'style'=>'width:30%',"class"=>'popup']); ?>
        <br>
		<?php
            echo form_submit("submit","Update info",['class'=>'edit']);
            echo form_reset("reset","Reset",['class'=>'edit']);
    echo form_close();
    ?>
	<br>
	<div> <?php if(isset($_COOKIE['output1'])) echo $_COOKIE['output1']; ?> </div>
    </div>     
	<div class="form-group">
    <?php echo form_open(site_url("account-password.html"),['name'=>"accountpassword"]); ?>
		<h4>Old password</h4>
        <?php echo form_input(['type'=>'password','name'=>'old','value'=>'','style'=>'width:50%',"class"=>'popup']); ?>
        <h4>New password</h4>
        <?php echo form_input(['type'=>'password','name'=>'new','value'=>'','style'=>'width:50%',"class"=>'popup']); ?>
        <h4>Retype password</h4>
    <?php echo form_input(['type'=>'password','name'=>'new_re','value'=>'','style'=>'width:50%',"class"=>'popup']); ?>
        <br>
        <?php
            echo form_submit("submit","Change password",['class'=>'edit']);
            echo form_reset("reset","Reset",['class'=>'edit']);
    echo form_close();
    ?>
	<br>
	<div> <?php if(isset($_COOKIE['output2'])) echo $_COOKIE['output2']; ?> </div>
    </div>   
	</div>
<?php include('include/footer.php'); ?>
