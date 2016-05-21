
<style>
    button.accordion {
        background-color: #eee;
        color: #444;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        transition: 0.4s;
    }

    button.accordion.active, button.accordion:hover {
        background-color: #ddd;
    }

    div.panel {
        padding: 0 18px;
        display: none;
        background-color: white;
    }

    div.panel.show {
        display: block !important;
    }
</style>
<div class="clearfix"></div>

<div class="container security">
    <div class="row">
        <ul class="list-inline list-unstyled">
            <li><a class="simple" href="#">Home<i class="fa sim fa-angle-right"></i></a></li>
            <li><a class="simple" href="#">My Dashboard<i class="fa sim fa-angle-right"></i></a></li>

            <li><h4>My Orders</h4></li>
        </ul>
        <div class="col-md-3">

        </div>
        <div class="col-md-9">
            <div style="text-align: center">
                <h3>Order Tracking</h3>
                <hr>
            </div>
            <div>
                <?php
                foreach ($myorders as $myorder) {
                        $order_products = OrderProducts::model()->findByAttributes(array('order_id' => $myorder->id));
                        $product_details = Products::model()->findByPk($order_products->product_id);
                        $order_history = OrderHistory::model()->findAllByAttributes(array('order_id' => $myorder->id), array('order' => 'date ASC'));
                        ?>
                        <button class="accordion">
                            <span>ORDERID <?= $myorder->id ?></span>
                            <span style="padding-left: 222px;"><?= $product_details->product_name; ?></span>
                            <span style="float:right"><?= $myorder->status == 1 ? 'Delivered' : 'Not Deleverd' ?></span>
                        </button>
                        <div class="panel my_cart_item cart_product_detail cart_item ">
                            <?php $folder = Yii::app()->Upload->folderName(0, 1000, $product_details->id); ?>
                            <img src="<?= Yii::app()->baseUrl; ?>/uploads/products/<?= $folder ?>/<?= $product_details->id ?>/small.<?= $product_details->main_image ?>" />
                            <h3><?= $product_details->product_name; ?></h3>
                            <p><span>Color:</span>	Doeskin</p>
                            <p><span>Size:</span>	S</p>
                            <p><span>Qty:</span><?= $order_products->quantity ?></p>
                            <div style="float: right">
                                <table>
                                    <thead>
                                    <th>Date</th>
                                    <th>Status</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($order_history as $order_hist) {
                                                $currentDateTime = $order_hist->date;
                                                $newDateTime = date('d/m/Y h:i A', strtotime($currentDateTime));
                                                ?>
                                                <tr>
                                                    <td><?= $newDateTime; ?></td>
                                                    <td><?= $order_hist->order_status_comment != '' ? $order_hist->order_status_comment : ''; ?>
                                                        <?php
                                                        if ($order_hist->order_status == 3) {
                                                                echo 'Order shipped through' . MasterShippingTypes::model()->findByPk($order_hist->shipping_type)->shipping_type . '<br>Package Tracking ID: #<span>' . $order_hist->tracking_id . '</span>';
                                                        }
                                                        ?></td>
                                                </tr>
                                        <?php }
                                        ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <?php
                }
                ?>

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








