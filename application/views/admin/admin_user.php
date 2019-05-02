<?php include('include/header.php'); ?>
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User</h1>
                        <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Profile picture</th>
                            <th>Email</th>
                            <th>Fullname</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Street</th>
                            <th>Province</th>
                            <th>Delete</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            for($i=0;$i<count($contain);$i+=7)
                            {
                            ?>
                            <tr onclick="document.location='admin-user-view.html?id=<?php echo $contain[$i];?>'">
                                <td><a><img width="50" height="50" src="image/user/<?php echo $contain[$i+6]; ?>"></a></td>
                                <td><?php echo $contain[$i]; ?></td>
                                <td><?php echo $contain[$i+1]; ?></td>
                                <td><?php echo $contain[$i+2]; ?></td>
                                <td><?php echo $contain[$i+3]; ?></td>
                                <td><?php echo $contain[$i+4]; ?></td>
                                <td><?php echo $contain[$i+5]; ?></td>
                                <td><a onclick="return confirm('Do you really want to delete this user?');" href="admin-user-del.html?id=<?php echo $contain[$i];?>"><img width="14" src="image/admin/delete.png"></a></td>
                            </tr>
                            <?php

                                
                            }
                        ?>
                        </tbody>
                        </table>
                    </div>
                </div>

<?php include('include/footer.php'); ?>
