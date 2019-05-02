<?php include('include/header.php'); ?>
<div>
	<div class = "vbox">
		<img vspace="25" src="image/global/logo.png" alt="logo" width="60" height="60">
		<hr size= "0.5" width="50%" color=7B7B7B noshade >
        <br>
        <h2 style="text-transform: uppercase;">Cart</h2>
		<table id="table" border="0" cellpadding="10px" cellspacing="1px">  
	<?php
	if(!(isset($_SESSION['userInfo']) && (isset($_COOKIE['user']))))
        $this->cart->destroy();  ?>
    <tr id= "main_heading">
        <td>Name</td>
        <td>Quantity</td>
        <td>Sum</td>
        <td></td>
    </tr>
    <?php if ($cart = $this->cart->contents()): ?>
    
    <?php
        echo form_open('update.html');
        $grand_total = 0;
        $i = 1;
        foreach ($cart as $item):
            echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
            echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
            echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
            echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
            echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
    ?>
    <tr>
        <td><?php echo $item['name']; ?></td>
        <td><?php echo form_input('cart[' . $item['id'] . '][qty]', $item['qty'], 'maxlength="3" size="1" class="menucount"'); ?></td>
        <?php $grand_total = $grand_total + $item['subtotal']; ?>
        <td>$<?php echo number_format($item['subtotal']) ?> </td>
        <td>   
            <a href="<?php echo base_url('remove.html?id=' . $item['rowid']); ?>">
                <img src="<?php echo base_url('image/admin/delete.png'); ?>" width='25px' height='20px'/>   
            </a>
        </td>
        <?php endforeach; ?>
    </tr>
    <tr>
        <td><b>Total: $<?php echo number_format($grand_total); ?></b></td>
        <?php // "clear cart" button call javascript confirmation message ?>
        <td colspan="5" align="right"><input  class ='menubutton' type="button" value="Delete Cart" onclick="clear_cart()"/>
        <?php //submit button. ?>
        <input class ='menubutton'  type="submit" value="Update Cart"/>
        <?php echo form_close(); ?>
        <?php echo form_open('purchase.html'); ?>
        <?php echo form_hidden('cart[' . $item['id'] . '][total]', $grand_total); ?>
        <input class ='menubutton' type="submit" value="Purchase"/></td>
        <?php echo form_close(); ?>
    </tr>
    <?php endif; ?>
</table>      
<div> <?php if(isset($_COOKIE['output'])) echo $_COOKIE['output']; ?> </div>
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
	</div>
	<div class = "right">
    <li><a href="menu.html">All</a></li>
    <li><a href="menu.html?type=starter">Starter</a></li>
    <li><a href="menu.html?type=main">Main</a></li>
    <li><a href="menu.html?type=salad">Salad</a></li>
    <li><a href="menu.html?type=drink">Drink</a></li>
    <li><a href="menu.html?type=sweet">Sweet</a></li>
	<table>
    <?php for($i=0;$i<count($contain);$i+=6)
    {
        ?>
    <tr id="menudetail" >
	<td class="menudetail" img="<?php echo $contain[$i+1]; ?>" name = "<?php echo $contain[$i+2]; ?>" content="<?php echo $contain[$i+3]; ?>" cash="<?php echo $contain[$i+4]; ?>" idmenu="<?php echo $contain[$i]; ?>">
		<img src="image/menu/<?php echo $contain[$i+1]; ?>" width="80"  height="80"style="float:left; padding: 10px; ">
		<h4><?php echo $contain[$i+2]; ?></h4>
		<h4>$<?php echo $contain[$i+4]; ?></h4>
		<br>
		<p> <?php echo $contain[$i+3]; ?></p>
	</td>
	</tr>
    <?php
    }
    ?>
	</table>
	</div>
<?php include('include/footer.php'); ?>
