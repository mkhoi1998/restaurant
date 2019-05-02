
	
</div>
<div class="modal fade" id="modall">
<div class="modal-dialog">
        <div class="login">
            <div style=" position: absolute; bottom: 0;">
			<center>
			<?php echo form_open(site_url($url),['name'=>"signup", 'onSubmit'=>"return subdude();"]); ?>
			<br>
			<?php echo form_input(['type'=>'text','name'=>'email','value'=>'','placeholder'=>'Email',"class"=>'popup']); ?>
			<br>
			<?php echo form_password(['type'=>'text','name'=>'password','value'=>'','placeholder'=>'Password',"class"=>'popup']); ?>
			<br><br>
			<a href="account-reset.html">Forgot password?</a>
			<br>
			<a href="signup.html">Don't have account? Sign up</a>
			<?php echo form_submit("submit","Log in","class='popupbutton'",[]); ?>
			<?php echo form_close(); ?>
            <div class="modal-body"></div>
			</center>
            </div>
        </div>
</div>
</div>
<div class="modal fade" id="modalm">
<div class="modal-dialog">
    <div class="menuview">
		<div class="content"></div>
		<?php echo form_open(site_url("menu.html"),['name'=>"order",'onSubmit'=>"return checkmenu();"]); ?>
		<?php echo form_input(['type'=>'hidden','name'=>'hid','id'=>'hid']); ?>
		<?php echo form_input(['type'=>'hidden','name'=>'hname','id'=>'hname']); ?>
		<?php echo form_input(['type'=>'hidden','name'=>'hcash','id'=>'hcash']); ?>
		Amount: <?php echo form_input(['type'=>'text','name'=>'hnumber','value'=>1,'style'=>'width:20%', 'class'=>"menucount"]); ?>
		<?php echo form_submit("submit","Order",['class'=>'menubutton']);
		echo form_close(); ?>
	</div>
		
		
</div>
</div>
	<script scr="//code.jquery.com/jquery.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js"></script>
	<script type="text/javascript">
	function check()
	{
		var message = $("textarea[name='message']").val();
        var subject = $("textarea[name='subject']").val();
        var date = $("input[id='datepicker']").val();
        var seat = $("select[name='seats']").val();
        var time = $("select[name='time']").val();
		document.cookie = "message="+message+";";
		document.cookie = "subject="+subject+";";
		document.cookie = "date="+date+";";
		document.cookie = "seat="+seat+";";
		document.cookie = "time="+time+";";
		var logon = "<?php echo $logon; ?>";
		if(!logon)
		{
			$('#modall').modal('show');
			return false;
		}
		else
		{
			return true;
		}
	}function checkmenu()
	{
		var logon = "<?php echo $logon; ?>";
		if(!logon)
		{
			alert("Please log in before order");
			return false;
		}
		else
		{
        	var hid = $("input[name='hid']").val();
        	var hname = $("input[name='hname']").val();
        	var hcash = $("input[name='hcash']").val();
        	var hnumber = $("input[name='hnumber']").val();
			$.ajax({
            type: "POST",
            url: 'order.html',
      		async: false, 
            data: {hid: hid, hname: hname, hcash: hcash, hnumber: hnumber},
            success: function(data)
            {
				if(data.length > 0)
				{
					result = '1';
				}
				else
				{
					alert(hcash);
				}
            }
        	});
		}
	}
	function subdude()
	{
        var email = $("input[name='email']").val();
        var password = $("input[name='password']").val();
		var result = '0';
        $.ajax({
            type: "POST",
            url: 'valid.html',
      		async: false, 
            data: {email: email, password: password},
            success: function(data)
            {
				if(data.length > 0)
				{
					result = '1';
				}
				else
				{
					$('#modall .modal-body').html('Incorrect username or password.');
				}
            }
        });
		if(result == '1')
			return true;
		else
			return false;
    }
	$('.menudetail').click(function(event)
	{
		var img = $(this).attr('img');
		var name = $(this).attr('name');
		var content = $(this).attr('content');
		var cash = $(this).attr('cash');
		var idmenu = $(this).attr('idmenu');
		$('#hid').val(idmenu)
		$('#hname').val(name)
		$('#hcash').val(cash)
		$('#modalm .content').html('<img src="image/menu/'+img+'" width="100%" height="300px">'+'<br><br><p>'+name+'</p><p>'+content+'</p><br><br><p> $'+cash+'</p>');
		$('#modalm').modal('show');

	})
	function clear_cart() {
    var result = confirm('Do you want to clear this cart ?');
    if (result) 
        {
            window.location = "<?php echo base_url('clear.html'); ?>";
        }
    else {
        return false;
        }
	}
	$(document).ready(function()
	{
		$("#menudetail td").slice(5).hide();
		var mincount = 5;
		var maxcount = 10;
		$(window).scroll(function() 
		{
			if($(window).scrollTop() + $(window).height() >= $(document).height() - 5)
			{
				$("#menudetail td").slice(mincount,maxcount).fadeIn(1200);
				mincount = mincount+5;
				maxcount = maxcount+5;
			}
		});
	});
</script>
	
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
</body>

</html>