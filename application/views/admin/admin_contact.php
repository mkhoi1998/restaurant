<?php include('include/header.php'); ?>

<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
        <h1 class="page-header"> Contact </h1>
        <h3> Name: <?php echo $contain[1]; ?> </h3>
        <?php
        echo "Email: ".$contain[2]."<br>";
        echo "Phone: ".$contain[3]."<br>";
        echo $contain[4]." ".$contain[5].", ".$contain[6]."<br><br>";
        echo "Open from ".$contain[7]." A.M. to ".$contain[8]." P.M.<br><br>";
        ?>
        </tbody>
        </table>
        <div class="form-group">
        <?php echo form_open(site_url("admin-contact.html"),['name'=>"contactname"]); ?>
            <?php echo form_label("Name") ?>
            <br>
            <?php echo form_input(['type'=>'text','name'=>'name','value'=>'','style'=>'width:100%']); ?>
            <br><br>
            <?php
                echo form_submit("submit","Edit name",['class'=>'btn btn-primary']);
                echo form_reset("reset","Reset",['class'=>'btn btn-primary']);
        echo form_close();
        ?>
        </div>     
        <?php echo form_open(site_url("admin-contact.html"),['name'=>"contactadd"]); ?>   
        <table class="table table-hover">
        <thead>
        <tr>
            <th>Email</th>
            <th>Phone</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php echo form_input(['type'=>'text','name'=>'email','value'=>'','style'=>'width:100%']); ?></td>
            <td><?php echo form_input(['type'=>'text','name'=>'phone','value'=>'','style'=>'width:100%']); ?></td>
        </tr>
        </tbody>
        </table>
        <table class="table table-hover">
        <thead>
        <tr>
            <th>Address</th>
            <th>Street</th>
            <th>Province</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php echo form_input(['type'=>'text','address'=>'address','value'=>'','style'=>'width:100%']); ?></td>
            <td><?php echo form_input(['type'=>'text','street'=>'street','value'=>'','style'=>'width:100%']); ?></td>
            <td><?php echo form_input(['type'=>'text','province'=>'province','value'=>'','style'=>'width:100%']); ?></td>
        </tr>
        </tbody>
        </table>   
        <?php
                echo form_submit("submit","Edit contact",['class'=>'btn btn-primary']);
                echo form_reset("reset","Reset",['class'=>'btn btn-primary']);
        echo form_close();
        ?>
        <div class="form-group">
        <?php echo form_open(site_url("admin-contact.html"),['name'=>"contactmap"]); ?>
            <?php echo form_label("Map") ?>
            <br>
            <?php echo form_input(['type'=>'text','name'=>'map','value'=>'','style'=>'width:100%']); ?>
            <br><br>
            <?php
                echo form_submit("submit","Edit map",['class'=>'btn btn-primary']);
                echo form_reset("reset","Reset",['class'=>'btn btn-primary']);
        echo form_close();
        ?>
        <?php echo form_open(site_url("admin-contact.html"),['name'=>"contactadd"]); ?>   
        <table class="table table-hover">
        <thead>
        <tr>
            <th>Opening hours</th>
            <th>Close hours</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php echo form_input(['type'=>'text','name'=>'open','value'=>'','style'=>'width:100%']); ?></td>
            <td><?php echo form_input(['type'=>'text','name'=>'close','value'=>'','style'=>'width:100%']); ?></td>
        </tr>
        </tbody>
        </table>
        
        <?php
                echo form_submit("submit","Edit hours",['class'=>'btn btn-primary']);
                echo form_reset("reset","Reset",['class'=>'btn btn-primary']);
        echo form_close();
        ?>
        </div> 
    </div>
</div>

<?php include('include/footer.php'); ?>
