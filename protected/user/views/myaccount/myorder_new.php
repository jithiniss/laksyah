<div class="container main_container inner_pages ">
        <div class="breadcrumbs"> <a href="#">HOME</a> <span>/</span> <a href="#">My Account</a> <span>/</span> Make a Payment </div>
        <div class="row">
                <?php echo $this->renderPartial('_menu'); ?>
                <div class="col-sm-9 user_content"> <a class="account_link pull-right" href="#">Credit History</a>
                        <h1>My Orders</h1>
                        <!--<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Success </div>-->
                        <ul class="my_order_lists">
                                <?php
                                $ii = 1;
                                foreach ($myorders as $myorder) {
                                        $order_products = OrderProducts::model()->findAllByAttributes(array('order_id' => $myorder->id));

                                        $order_history = OrderHistory::model()->findAllByAttributes(array('order_id' => $myorder->id), array('order' => 'date ASC'));
                                        ?>
                                        <li>
                                                <div class="order_header">
                                                        <div class="row">
                                                                <div class="col-xs-6 col-sm-4">Order ID: <?= $myorder->id ?></div>
                                                                <div class = "col-xs-5 hidden-xs">
                                                                        <?php
                                                                        $i = 1;
                                                                        foreach ($order_products as $pdts) {
                                                                                $pdt = Products::model()->findByPk($pdts->product_id);
                                                                                ?>
                                                                                <?php
                                                                                if ($i == 1) {
                                                                                        echo $pdt->product_name;
                                                                                } else {
                                                                                        echo ',' . $pdt->product_name;
                                                                                }
                                                                                if (count($order_products) > 2) {
                                                                                        echo '....';
                                                                                        exit;
                                                                                }
                                                                                ?>
                                                                                <?php
                                                                                $i++;
                                                                        }
                                                                        ?>

                                                                </div>
                                                                <div class="col-xs-6 col-sm-3 text-right"><?php if ($myorder->status) { ?><strong class="label label-success">Delivered</strong> <a class="toggle_btn"><i class="fa fa-caret-up fa-caret-down"></i></a> <?php } else { ?><strong class="label label-danger">Not Delivered</strong> <a class="toggle_btn"><i class="fa fa-caret-up"></i></a>  <?php } ?></div>
                                                        </div>
                                                </div>
                                                <div class="order_tracking" style="display: <?php echo $ii == 1 ? 'block' : 'none'; ?>;">
                                                        <?php
                                                        foreach ($order_products as $order_product) {
                                                                $product_details = Products::model()->findByPk($order_product->product_id);
                                                                ?>
                                                                <div class="row">
                                                                        <div class="col-sm-4 border-right">
                                                                                <div class="cart_product_detail">
                                                                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?php echo Yii::app()->Upload->folderName(0, 1000, $product_details->id) ?>/<?php echo $product_details->id; ?>/small.<?php echo $product_details->main_image; ?>" alt="">
                                                                                        <h3><?php echo $product_details->product_name; ?></h3>
                                                                                        <p><span>Color:</span>	Doeskin</p>
                                                                                        <p><span>Size:</span>	S</p>
                                                                                        <p><span>Qty:</span>	<?= $order_product->quantity ?></p>
                                                                                        <p><span>Price:</span>	<?php echo Yii::app()->Currency->convert($order_product->amount); ?></p>
                                                                                        <div class="clearfix"></div>
                                                                                </div>
                                                                        </div>
                                                                        <div class="col-sm-8 status_lists">
                                                                                <div class="row status_list_header">
                                                                                        <div class="col-xs-3">Date</div>
                                                                                        <div class="col-xs-9">Status</div>
                                                                                </div>
                                                                                <?php
                                                                                foreach ($order_history as $order_hist) {
                                                                                        echo $order_hist->date;
                                                                                        exit;
                                                                                        $currentDateTime = $order_hist->date;
                                                                                        $newDateTime = date('d/m/Y h:i A', strtotime($currentDateTime));
                                                                                        ?>
                                                                                        <div class="row">
                                                                                                <div class="col-xs-3"><?= $newDateTime; ?></div>
                                                                                                <div class="col-xs-9"><?= $order_hist->order_status_comment != '' ? $order_hist->order_status_comment : ''; ?></div>
                                                                                        </div>
                                                                                <?php }
                                                                                ?>


                                                                                <div class="row">
                                                                                        <div class="col-xs-3"></div>
                                                                                        <div class="col-xs-9">
                                                                                                <p> <?php
                                                                                                        if ($order_hist->order_status == 3) {
                                                                                                                echo 'Order shipped through' . MasterShippingTypes::model()->findByPk($order_hist->shipping_type)->shipping_type;
                                                                                                        }
                                                                                                        ?></p>
                                                                                                <p>Package Tracking ID: #<?= $order_hist->tracking_id; ?> <a href="#">( Copy )</a></p>
                                                                                                <a class="btn-primary" href="#">Track Package</a>
                                                                                        </div>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                        <?php } ?>

                                                </div>
                                        </li>
                                        <?php
                                        $ii++;
                                }
                                ?>
                        </ul>
                </div>
        </div>
</div>

<script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
                acc[i].onclick = function () {
                        this.classList.toggle("active");
                        this.nextElementSibling.classList.toggle("show");
                }
        }
</script>








