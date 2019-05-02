<?php include('include/header.php'); ?>

<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
        <h1 class="page-header"> Menu </h1>
        <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php
            for($i=0;$i<count($contain);$i+=6)
            {
                ?>
                <tr>
                    <td><?php echo $contain[$i]; ?></td>
                    <td><img src="image/menu/<?php echo $contain[$i+1]?>";  alt="<?php echo $contain[$i+1]?>" width="50"><br><br> </td>
                    <td><?php echo $contain[$i+2]; ?></td>
                    <td><?php echo $contain[$i+3]; ?></td>
                    <td>$<?php echo $contain[$i+4]; ?></td>
                    <td align="center"><a onclick="return confirm('Do you really want to delete this item?');" href="admin-menu-del.html?id=<?php echo $contain[$i];?>"><img width="14" src="image/admin/delete.png"></a></td>
                </tr>
                <?php
            }
        ?>
        </tbody>
        </table>
        <?php for($i=0;$i<$page;$i++)
         {
            ?> <a href='admin-menu.html?p=<?php echo $i+1; ?>'><?php echo $i+1; ?></a><?php   
         }?>
        <div class="form-group">
        <?php echo form_open_multipart("admin-menu.html"); ?>
            <?php echo form_label("Id (left empty when adding)") ?>
            <br>
            <?php echo form_input(['type'=>'text','name'=>'id','value'=>'','style'=>'width:100%']); ?>
            <br><br>
            <?php echo form_input(['type'=>'file','name'=>'img','value'=>'','style'=>'width:100%']); ?>
            <br><br>
            <?php echo form_label("Name") ?>
            <?php echo form_input(['type'=>'text','name'=>'name','value'=>'','style'=>'width:100%']); ?>
            <br><br>
            <?php echo form_label("Price") ?>
            <?php echo form_input(['type'=>'text','name'=>'price','value'=>'','style'=>'width:100%']); ?>
            <br><br>
            <?php echo form_label("Description") ?>
            <?php echo form_textarea(['name'=>'content','cols'=>170,'rows'=>3]); ?>
            <br><br>
            <?php
                echo form_submit("submit","Add/ Edit menu",['class'=>'btn btn-primary']);
                echo form_reset("reset","Reset",['class'=>'btn btn-primary']);
        echo form_close(); ?>
        </div>
    </div>
</div>

<?php include('include/footer.php'); ?>
