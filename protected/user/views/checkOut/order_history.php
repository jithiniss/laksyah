<style>
    .pickle-space {
        padding: 0;
        /* padding-top: 0; */
        padding-left: 103px;
    }
</style>

<div class="nk">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table note">
                        <thead>
                            <tr class="ran">
                                <th><p>Product</p></th>
                        <th><p>Quantity</p></th>
                        <th><p>Price</p></th>
                        <th><p>Net Price</p></th>
                        </tr>
                        </thead>
                        <?php
                        foreach ($carts as $cart) {
                                $prod_details = Products::model()->findByPk($cart->product_id);
                                $folder = Yii::app()->Upload->folderName(0, 1000, $prod_details->id);
                                if ($cart->options != 0) {

                                        $price = Options::model()->findByPk($cart->options)->amount;
                                        $net_price = ($price) * ($cart->quantity);
                                } else {
                                        if ($prod_details->discount) {
                                                $price = $prod_details->price - $prod_details->discount;
                                        } else {
                                                $price = $prod_details->price;
                                        }
                                        $net_price = ($price) * ($cart->quantity);
                                }
                                ?>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img class="img-responsive crt" src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?php echo $folder; ?>/<?php echo $prod_details->id; ?>/small.<?php echo $prod_details->main_image; ?>"/>
                                            <?php
                                            $trimstring = substr($prod_details->description, 0, 200);
                                            ?>
                                            <p><?= $trimstring; ?></p>
                                        </td>

                                        <td><p>x<?= $cart->quantity; ?></p></td>
                                        <?php
                                        if ($cart->options != 0) {

                                                $price = Options::model()->findByPk($cart->options)->amount;
                                        } else {
                                                if ($prod_details->discount) {
                                                        $price = $prod_details->price - $prod_details->discount;
                                                } else {
                                                        $price = $prod_details->price;
                                                }
                                        }
                                        ?>
                                        <td><h4>
                                                <?php echo Yii::app()->Currency->convert($price); ?>
                                            </h4></td>
                                        <td><h4>
                                                <?php echo Yii::app()->Currency->convert($net_price); ?>
                                            </h4></td>
                                    </tr>

                                    <?php
                                    $total+= $net_price;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="set-2">
    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <h4>Total Price &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="set-cr range">
                        <?php
                        $rate = $order->rate;
                        if ($order->discount_rate != 0) {
                                echo Yii::app()->Currency->convert($order->discount_rate + $rate);
                        } else {
                                echo Yii::app()->Currency->convert($order->total_amount + $rate);
                        }
                        ?>
                    </span> &nbsp;&nbsp;&nbsp;</h4>
            </div>
        </div>

    </div>
</div>
<div class="set-2">
    <div class="container">
        <div class="row">
            <div class="set-shi">
                <h1>Shipping Address</h1>
                <div class="brlin"></div>
                <p><?= $ship_address->first_name; ?></p>
                <p><?= $ship_address->address_1; ?></p>
                <p><?= $ship_address->city; ?>,<?= $ship_address->postcode; ?></p>
                <p>T: <?= $ship_address->contact_number; ?></p>
                <p>E-mail: <?= $user_details->email; ?></p>
            </div>
        </div>
    </div>
</div>
<div class="set-2">
    <div class="container">
        <div class="row">
            <div class="set-shi">
                <h1>Billing Address</h1>
                <div class="brlin"></div>
                <p><?= $bill_address->first_name; ?></p>
                <p><?= $bill_address->address_1; ?></p>
                <p><?= $bill_address->city; ?>,<?= $ship_address->postcode; ?></p>
                <p>T: <?= $bill_address->contact_number; ?></p>
                <p>E-mail: <?= $user_details->email; ?></p>
                <h2>Comments</h2>
                <div class="brlin"></div>

            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="ord-summry">
        <div class="row">
            <form name="comments" method="post">
                <div class="col-md-10 col-sm-12">

                    <div class="form-group">

                        <textarea class="form-control" rows="6" id="set4z" name="comment"></textarea>
                    </div>
                </div>
                <div class="col-md-2 col-sm-12">
                    <a href="#"><button type="submit" name="mycomment" class="btn btn-success stp4">MAKE PAYMENT&nbsp;&nbsp;<i class="fa adds fa-angle-right "></i> </button></a>

                </div>
            </form>
        </div>
    </div>
</div>

