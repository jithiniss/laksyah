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
                                <th class="sea">Product Details</th>
                                <th>Date</th>
                                <th>Quantity</th>
                                <th>Order Total</th>
                                <th></th>


                            </tr>
                            <?php
                            $orderid = $myorders->id;

                            $products = OrderProducts::model()->findAllByAttributes(array('order_id' => $orderid));
                            //$admin_status = OrderStatus::model()->findByPk($myorder->admin_status);
                            foreach ($products as $product) {
                                    $prod_details = Products::model()->findByPk($product->product_id);
                                    $folder = Yii::app()->Upload->folderName(0, 1000, $prod_details->id);
                                    ?>
                                    <tr>

                                        <td class="seat">
                                            <?php
                                            if ($product->option_id != 0) {
                                                    $options = Options::model()->findByPk($product->option_id);
                                                    ?>
                                                    <img class="casa" src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?php echo $folder; ?>/<?php echo $prod_details->id; ?>/options/<?= $options->id; ?>/small.<?php echo $options->image; ?>"/>
                                                    <?php
                                            } else {
                                                    ?>
                                                    <img class="casa" src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?php echo $folder; ?>/<?php echo $prod_details->id; ?>/small.<?php echo $prod_details->main_image; ?>"/>
                                            <?php } ?>
                                            <p><?= $prod_details->product_name; ?></p>

                                        </td>

                                        <td><?= $myorders->order_date; ?></td>
                                        <td><?= $product->quantity; ?></td>
                                        <?php
                                        if ($product->option_id != 0) {
                                                $options = Options::model()->findByPk($product->option_id);
                                                ?>
                                                <td>Rs:<?= $options->amount * $product->quantity; ?>/-</td>
                                                <?php
                                        } else {
                                                ?>
                                                <td>Rs:<?= $prod_details->price * $product->quantity; ?>/-</td>
                                        <?php } ?>
                                        <td><a class="my" href="<?php echo Yii::app()->baseUrl; ?>/index.php/myaccount/Review/<?php echo $product->id; ?>">Add Review</a><span><br><br></span><br></td>


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

