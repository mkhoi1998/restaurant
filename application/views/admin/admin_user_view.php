<?php include('include/header.php'); ?>
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Reservation</h1>
                        <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Reservation Id</th>
                            <th>Table Id</th>
                            <th>Seats</th>
                            <th>Date</th>
                            <th>Time</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            for($i=0;$i<count($contain);$i+=5)
                            {
                            ?>
                            <tr onclick="document.location='admin-user-view.html?id=<?php echo $contain[$i];?>'">
                                <td><?php echo $contain[$i]; ?></td>
                                <td><?php echo $contain[$i+1]; ?></td>
                                <td><?php echo $contain[$i+2]; ?></td>
                                <td><?php echo $contain[$i+3]; ?></td>
                                <td><?php if($contain[$i+4]>6) {$a =$contain[$i+4]-6; echo $a.' P.M.';} else {$a =$contain[$i+4]+6; echo $a.' A.M.';}?></td>
                            </tr>
                            <?php
                            }
                        ?>
                        </tbody>
                        </table>
                        <h1 class="page-header">Order</h1>
                        <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Order Id</th>
                            <th>Date</th>
                            <th>Quantity</th>
                            <th>Date</th>
                            <th>Total</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            for($i=0;$i<count($ord);$i+=5)
                            {
                            ?>
                                <td><?php echo $ord[$i]; ?></td>
                                <td><?php echo $ord[$i+1]; ?></td>
                                <td><?php echo $ord[$i+3]; ?></td>
                                <td><?php echo $ord[$i+4]; ?></td>
                                <td>$<?php echo $ord[$i+3]*$ord[$i+4]; ?></td>
                            </tr>
                            <?php
                            }
                        ?>
                        </tbody>
                        </table>
                    </div>
                </div>

<?php include('include/footer.php'); ?>
