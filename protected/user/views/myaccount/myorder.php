<div class="clearfix"></div>

<div class="container security">
    <div class="row">
        <ul class="list-inline list-unstyled">
            <li><a class="simple" href="#">Home<i class="fa sim fa-angle-right"></i></a></li>
            <li><a class="simple" href="#">My Dashboard<i class="fa sim fa-angle-right"></i></a></li>

            <li><h4>My Orders</h4></li>
        </ul>


        <div class="col-md-9 pickle-space">
            <div class="row">
                <h1>My Orders</h1>
                <div class="col-md-9 forward">
                    <div class="row">

                        <table id="t01">
                            <tr>

                                <th class="sea">Order Id</th>
                                <th>Order Date</th>
                                <th>Order Total</th>
                                <th>Order Status</th>
                                <th>Order Items</th>
                            </tr>
                            <?php
                            foreach ($myorders as $myorder) {
                                    $orderid = $myorder->id;
                                    $admin_status = OrderStatus::model()->findByPk($myorder->admin_status);
                                    ?>
                                    <tr>
                                        <td class="seat"><?= $orderid; ?> </td>
                                        <td><?= $myorder->order_date; ?></td>
                                        <?php
                                        if ($myorder->discount_rate == 0) {
                                                ?>

                                                <td>Rs:<?= $myorder->total_amount; ?>/-</td>
                                                <?php
                                        } else {
                                                ?>
                                                <td>Rs:<?= $myorder->discount_rate; ?>/-</td>
                                        <?php } ?>
                                        <td><?= $admin_status->title; ?></td>
                                        <td><a class="my" href="<?php echo Yii::app()->baseUrl; ?>/index.php/myaccount/Orderitems/<?= $orderid; ?>">Order Items</a></td>


                                    </tr>

                                    <?php
                            }
                            ?>
                        </table>

                    </div>
                </div>
            </div>

        </div>
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/border.png" class="img-responsive design"/> </div>
</div>

