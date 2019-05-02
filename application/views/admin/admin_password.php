<?php include('include/header.php'); ?>
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Change password</h1>
                        <?php echo form_open(site_url("admin-password.html"),['name'=>"password"]); ?>
                            <?php echo form_label("Old password") ?>
                            <br>
                            <?php echo form_input(['type'=>'password','name'=>'old','value'=>'','style'=>'width:100%']); ?>
                            <br><br>
                            <?php echo form_label("New password") ?>
                            <br>
                            <?php echo form_input(['type'=>'password','name'=>'new','value'=>'','style'=>'width:100%']); ?>
                            <br>
                            <?php echo form_label("Retype password") ?>
                            <br>
                            <?php echo form_input(['type'=>'password','name'=>'new_re','value'=>'','style'=>'width:100%']); ?>
                            <br><br>
                            <?php
                                echo form_submit("submit","Change password",['class'=>'btn btn-primary']);
                                echo form_reset("reset","Reset",['class'=>'btn btn-primary']);
                        echo form_close();
                        ?>
                    <br>
                    <div> <?php if(isset($output)) echo $output; ?> </div>
                    <br>
                    </div>
                </div>

<?php include('include/footer.php'); ?>
