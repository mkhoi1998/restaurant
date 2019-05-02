<?php include('include/header.php'); ?>

<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
        <h1 class="page-header"> Home </h1>
        <h3> Tittle: <?php echo $contain[0]; ?> </h3>
        <table class="table table-hover">
        <thead>
        <tr>
            <th>Content</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php echo $contain[1]; ?></td>
            <td align="center"><a onclick="return confirm('Do you really want to delete this item?');" href="admin-home-del.html"><img width="14" src="image/admin/delete.png"></a></td>
        </tr>
        </tbody>
        </table>
        <div class="form-group">
        <?php echo form_open(site_url("admin-home.html"),['name'=>"hometittle"]); ?>
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
        <?php echo form_open(site_url("admin-home.html"),['name'=>"homeparagraph"]); ?>
            <?php echo form_label("Content") ?>
            <br>
            <?php echo form_textarea(['name'=>'content','cols'=>170,'rows'=>4]); ?>
            <br><br>
            <?php
                echo form_submit("submit","Edit content",['class'=>'btn btn-primary']);
                echo form_reset("reset","Reset",['class'=>'btn btn-primary']);
        echo form_close(); ?>
        </div>
    </div>
</div>

<?php include('include/footer.php'); ?>
