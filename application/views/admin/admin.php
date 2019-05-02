<?php include('include/header.php'); ?>
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Dashboard</h1>
                        <h3>Order</h3>
                        <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Date</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Full name</th>
                            <th>Address</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            for($i=0;$i<count($ord);$i+=9)
                            {
                            ?>
                            <tr>
                                <td><?php echo $ord[$i]; ?></td>
                                <td><?php echo $ord[$i+1]; ?></td>
                                <td><?php echo $ord[$i+2]; ?></td>
                                <td><?php echo $ord[$i+3]; ?></td>
                                <td><?php echo $ord[$i+4]; ?></td>
                                <td><?php echo $ord[$i+3]*$ord[$i+4]; ?></td>
                                <td><?php echo $ord[$i+5]; ?></td>
                                <td><?php echo $ord[$i+6].", ".$ord[$i+7].", ".$ord[$i+8]; ?></td>
                            </tr>
                            <?php
                            }
                        ?>
                        </tbody>
                        </table>
                        <h3>Reservation</h3>
                        <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Reservation ID</th>
                            <th>Table ID</th>
                            <th>Seat</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>Time</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            for($i=0;$i<count($re);$i+=6)
                            {
                            ?>
                            <tr>
                                <td><?php echo $re[$i]; ?></td>
                                <td><?php echo $re[$i+1]; ?></td>
                                <td><?php echo $re[$i+2]; ?></td>
                                <td><?php echo $re[$i+3]; ?></td>
                                <td><?php echo $re[$i+4]; ?></td>
                                <td><?php if($re[$i+5]>6) {$a =$re[$i+5]-6; echo $a.' P.M.';} else {$a =$re[$i+5]+6; echo $a.' A.M.';}?></td>
                            </tr>
                            <?php
                            }
                        ?>
                        </tbody>
                        </table>
                        <h3>Feedback</h3>
                        <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>View</th>
                            <th>Delete</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            for($i=0;$i<count($contain);$i+=5)
                            {
                                if ( $contain[$i+4]==0)
                                {
                                    ?>
                                    <tr style="color:red;" >
                                        <th><?php echo $contain[$i]; ?></th>
                                        <th><?php echo $contain[$i+1]; ?></th>
                                        <th><?php echo $contain[$i+2]; ?></th>
                                        <th><?php echo $contain[$i+3]; ?></th>
                                        <th><a href="admin-feedback-done.html?id=<?php echo $contain[$i];?>"><img width="14" src="image/admin/check.png"></a></th>
                                        <th><a onclick="return confirm('Do you really want to delete this feedback?');" href="admin-feedback-del.html?id=<?php echo $contain[$i];?>"><img width="14" src="image/admin/delete.png"></a></th>
                                    </tr>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <tr>
                                        <td><?php echo $contain[$i]; ?></td>
                                        <td><?php echo $contain[$i+1]; ?></td>
                                        <td><?php echo $contain[$i+2]; ?></td>
                                        <td><?php echo $contain[$i+3]; ?></td>
                                        <td><?php echo "Done"; ?></td>
                                        <td><a onclick="return confirm('Do you really want to delete this item?');" href="admin-feedback-del.html?id=<?php echo $contain[$i];?>"><img width="14" src="image/admin/delete.png"></a></td>
                                    </tr>
                                    <?php

                                }
                            }
                        ?>
                        </tbody>
                        </table>
                        <h3>Reset</h3>
                        <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Email</th>
                            <th>Fullname</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Street</th>
                            <th>PRovince</th>
                            <th>Reset</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            for($i=0;$i<count($set);$i+=8)
                            {
                            ?>
                            <tr>
                                <td><?php echo $set[$i]; ?></thtd>
                                <td><img width="50" src="image/user/<?php echo $set[$i+1]; ?>"></td>
                                <td><?php echo $set[$i+2]; ?></td>
                                <td><?php echo $set[$i+3]; ?></td>
                                <td><?php echo $set[$i+4]; ?></td>
                                <td><?php echo $set[$i+5]; ?></td>
                                <td><?php echo $set[$i+6]; ?></td>
                                <td><?php echo $set[$i+7]; ?></td>
                                <td><a onclick="return confirm('Do you really want to reset this user?');" href="admin-reset.html?id=<?php echo $set[$i];?>"><img width="14" src="image/admin/edit.png"></a></td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                        </table>
                    </div>
                </div>

<?php include('include/footer.php'); ?>
