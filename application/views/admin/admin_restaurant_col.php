<?php include('include/header.php'); ?>

<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
        <h1 class="page-header"> Restaurant </h1>
        <h3> Tittle: <?php echo $contain[1]; ?> </h3>
        <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Content</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php
            for($i=2;$i<count($contain);$i+=2)
            {
                ?>
                <tr>
                    <td><?php echo $contain[$i]; ?></td>
                    <td><?php echo $contain[$i+1]; ?></td>
                    <td align="center"><a onclick="return confirm('Do you really want to delete this item?');" href="admin-restaurant-col-del.html?id=<?php echo $contain[$i];?>"><img width="14" src="image/admin/delete.png"></a></td>
                </tr>
                <?php
            }
        ?>
        </tbody>
        </table>
        <div class="form-group">
        <?php echo form_open(site_url("admin-restaurant-col.html"),['name'=>"restauranttittle"]); ?>
            <?php echo form_label("Tittle") ?>
            <br>
            <?php echo form_input(['type'=>'text','name'=>'tittle','value'=>'','style'=>'width:100%']); ?>
            <br><br>
            <?php
                echo form_submit("submit","Edit tittle",['class'=>'btn btn-primary']);
                echo form_reset("reset","Reset",['class'=>'btn btn-primary']);
        echo form_close(); ?>
        </div>
        <div class="form-group">
        <?php echo form_open(site_url("admin-restaurant-col.html"),['name'=>"restaurantparagraph"]); ?>
            <?php echo form_label("Paragraph") ?>
            <br>
            <?php echo form_textarea(['name'=>'paragraph','cols'=>170,'rows'=>3]); ?>
            <br><br>
            <?php echo form_label("Id (left empty when adding)") ?>
            <br>
            <?php echo form_input(['type'=>'text','name'=>'id','value'=>'','style'=>'width:100%']); ?>
            <br><br>
            <?php
                echo form_submit("submit","Add/ Edit paragraph",['class'=>'btn btn-primary']);
                echo form_reset("reset","Reset",['class'=>'btn btn-primary']);
        echo form_close(); ?>
        </div>
    </div>
</div>

<?php include('include/footer.php'); ?>
