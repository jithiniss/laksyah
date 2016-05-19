<style>
    .pickle-space {
        padding: 0;
        /* padding-top: 0; */
        // padding-left: 103px;
    }
    .table{
        width: 75%;
    }
    .remve a{
        color: #D9534F;
        text-decoration: none;
    }
</style>
<div class="nk col-md-9">
    <div class="container">
        <div class="row">
            <?php
            $gift_data = UserGifts::model()->findByAttributes(array('user_id' => Yii::app()->session['user']['id'], 'order_id' => Yii::app()->session['orderid']));
            ?>
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr class="ran">
                                <th><p>Product</p></th>
                        <th><p>Quantity</p></th>
                        <th><p>Price</p></th>
                        <th><p>Net Price</p></th>
                        </tr>
                        </thead>
                        <?php
                        $order = Order::model()->findByPk(Yii::app()->session['orderid']);
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
                                            <?php
                                            if ($cart->options != 0) {
                                                    $option = Options::model()->findByPk($cart->options)
                                                    ?>
                                                    <img class="img-responsive crt" src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?php echo $folder; ?>/<?php echo $prod_details->id; ?>/options/<?= $option->id; ?>/small.<?php echo $option->image; ?>"/>
                                                    <?php
                                            } else {
                                                    ?>
                                                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?php echo $folder; ?>/<?php echo $prod_details->id; ?>/small.<?php echo $prod_details->main_image; ?>" class="img-responsive crt" align="absmiddle" style="max-height:300px; max-width:200px;display: block;">
                                            <?php } ?>
                                            <?php
                                            $trimstring = substr($prod_details->description, 0, 200);
                                            ?>
                                            <h6><p><?= $trimstring; ?></p></h6>
                                        </td>

                                        <td><p><?= $cart->quantity; ?></p></td>
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
                                        <td><p><?php echo Yii::app()->Currency->convert($price); ?>
                                            </p></td>
                                        <td><p><?php echo Yii::app()->Currency->convert($net_price); ?>
                                            </p></td>
                                    </tr>

                                    <?php
                                    $total+= $net_price;
                            }
                            ?>
                            <?php
                            if ($order->gift_option == 1) {
                                    $total+= $order->rate;
                                    ?>
                                    <tr>
                                        <td>Gift </td>
                                        <td> </td>
                                        <td> </td>
                                        <td><?php echo Yii::app()->Currency->convert(200); ?></td>
                                        <td class="remve"><h3><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/CheckOut/deletgift/id/<?php echo $gift_data->id; ?>"><i class="fa pen-2 fa-close"></i></a></h3></td>
                                    </tr>
                            <?php } ?>
                            <tr></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="col-md-3">
    <?php if (Yii::app()->user->hasFlash('success')): ?>
            <div class="alert alert-success">
                <strong>Success!</strong> <?php echo Yii::app()->user->getFlash('success'); ?>
            </div>
    <?php endif; ?>
    <?php if (Yii::app()->user->hasFlash('error')): ?>
            <div class="alert alert-danger">
                <strong></strong> <?php echo Yii::app()->user->getFlash('error'); ?>
            </div>
    <?php endif; ?>
    <ul class="list-inline">
        <li class="set-gms" ><p>Is it a Gift</p></li><br>
        <li class="set-gms"><form method="post" name="coupon" class="navbar-form" action="<?= Yii::app()->baseUrl; ?>/index.php/CheckOut/GiftOption">
                <div class="input-group">
                    <?php if ($total > 5000) { ?>
                            <span> no extra charge is added</span>
                            <?php
                    } else {
                            ?>
                            <span> extra charge is added</span>
                            <?php
                    }
                    ?>
                    <div id="data">
                        <span>From</span><input type="text" name="from" style="margin-left: 21px;" value="<?= $gift_data->from; ?>"><br>
                        <span>To</span><input type="text" name="to" style="margin-top:5px;margin-left: 40px;" value="<?= $gift_data->to; ?>"><br>
                        <span>Message</span><textarea name="message" style="margin-top:5px"><?= $gift_data->message; ?></textarea><br>
                        <span class="input-group-btn">
                            <button type="submit" name="btn_submit"class="btn btn-danger set-min">
                                SUBMIT
                            </button>
                        </span>
                    </div>
                </div>
        </li></form>
    </ul>
    <ul class="list-inline">
        <li class="set-gms" ><p>Coupon Code </p></li>
        <li class="set-gms"><form method="post" name="coupon" class="navbar-form" action="<?= Yii::app()->baseUrl; ?>/index.php/CheckOut/Coupon">
                <div class="input-group">
                    <input type="text" name="coupon" class="set-ltt" placeholder="Enter Coupon Code" autocomplete="off">
                    <span class="input-group-btn">
                        <button type="submit" name="btn_submit"class="btn btn-danger set-min">
                            SUBMIT
                        </button>
                    </span>
                </div>
        </li></form>
    </ul>
</div>

<!--<ul class="list-unstyled list-inline prices">

    <li class="oness"><h3><br><span class="range" style="float: right;color: red; padding-right: 101px;">Total:Rs:<?= $total; ?></span></h3></li>

    <li class="oness"><a class="bowl-buy" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/CheckOut/DeliveryAddress">NEXT</a></li>

</ul>-->
<div class="set-2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Total Price &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="set-cr">
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

    <div class="container">
        <div class="ord-summry">
            <div class="row">
                <div class="col-md-12">
                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/CheckOut/DeliveryAddress"><button type="button" class="btn btn-success soo">PROCEED TO ADD YOUR ADDRESS<i class="fa adds fa-angle-right "></i> </button></a>

                </div>
            </div>
        </div>
    </div>

</div>
