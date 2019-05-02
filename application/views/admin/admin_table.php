<?php include('include/header.php'); ?>

<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
        <h1 class="page-header"> Home </h1>
        <table class="table table-hover">
        <thead>
        <tr>
            <th>Id</th>
            <th>Seat</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php
        for($i=0;$i<count($contain);$i+=2)
        {
        ?>
        <tr>
            <td><?php echo $contain[$i]; ?></td>
            <td><?php echo $contain[$i+1]; ?></td>
            <td align="center"><a onclick="return confirm('Do you really want to delete this table?');" href="admin-restaurant-table-del.html?id=<?php echo $contain[$i];?>"><img width="14" src="image/admin/delete.png"></a></td>
        </tr>
        <?php
        }
        ?>
        </tbody>
        </table>
        <div class="form-group">
        <?php echo form_open(site_url("admin-table.html"),['name'=>"table"]); ?>
            <?php echo form_label("Id") ?>
            <br>
            <?php echo form_input(['type'=>'text','name'=>'id','value'=>'','style'=>'width:100%']); ?>
            <br><br>
            <?php echo form_label("Seat") ?>
            <br>
            <?php echo form_input(['type'=>'text','name'=>'seat','value'=>'','style'=>'width:100%']); ?>
            <br><br>
            <?php
                echo form_submit("submit","Add/ Edit table",['class'=>'btn btn-primary']);
                echo form_reset("reset","Reset",['class'=>'btn btn-primary']);
        echo form_close(); ?>
        </div>
    </div>
</div>

<?php include('include/footer.php'); ?>
