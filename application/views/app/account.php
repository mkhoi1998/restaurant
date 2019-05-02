<?php include('include/header.php'); ?>
<div>
	<div class = "vbox">
		<img vspace="25" src="image/global/logo.png" alt="logo" width="60" height="60">
		<hr size= "0.5" width="50%" color=7B7B7B noshade >
		<br>
		<img width="70" height="70" src="image/user/<?php echo $contain[6]; ?>">
		<br>
		<h2><?php echo $contain[1]; ?></h2>
		<br>
		<?php echo $contain[0]."/ ".$contain[2]; ?>
		<br>
		<?php echo $contain[3]." ".$contain[4].", ".$contain[5]; ?>
		<a href="account-edit.html" style="position: absolute; bottom:50px; left:30%;">Update account info</a>
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
	<div class = "right"style="padding: 10px">
	<br>
	<h2>Reservation</h2>
    <table class="table">
    <thead>
    <tr>
        <th>Reservation Id</th>
        <th>Table Id</th>
        <th>Seats</th>
        <th>Date</th>
        <th>Time</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php
    for($i=0;$i<count($res);$i+=5)
    {
    ?>
    <tr>
        <td><?php echo $res[$i]; ?></td>
        <td><?php echo $res[$i+1]; ?></td>
        <td><?php echo $res[$i+2]; ?></td>
        <td><?php echo $res[$i+3]; ?></td>
        <td><?php if($res[$i+4]>6) {$a =$res[$i+4]-6; echo $a.' P.M.';} else {$a =$res[$i+4]+6; echo $a.' A.M.';}?></td>
		<td><a onclick="return confirm('Do you really want to delete this item?');" href="account-reservation-del.html?id=<?php echo $res[$i];?>"><img width="14" src="image/admin/delete.png"></a></td>
	</tr>
    <?php
    }
    ?>
    </tbody>
    </table>
	<h2>Order</h2>
    <table class="table">
    <thead>
    <tr>
        <th>Order Id</th>
        <th>Date</th>
        <th>Name</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Total</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php
    for($i=0;$i<count($ord);$i+=5)
    {
    ?>
    <tr>
        <td><?php echo $ord[$i]; ?></td>
        <td><?php echo $ord[$i+1]; ?></td>
        <td><?php echo $ord[$i+2]; ?></td>
        <td><?php echo $ord[$i+3]; ?></td>
        <td><?php echo $ord[$i+4]; ?></td>
        <td>$<?php echo $ord[$i+3]*$ord[$i+4]; ?></td>
		<td><a onclick="return confirm('Do you really want to delete this item?');" href="order-del.html?oid=<?php echo $ord[$i];?>&pid=<?php echo $ord[$i+2];?>"><img width="14" src="image/admin/delete.png"></a></td>
	</tr>
    <?php
    }
    ?>
    </tbody>
    </table>
	</div>
<?php include('include/footer.php'); ?>
