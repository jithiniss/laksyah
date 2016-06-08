<html>
    <head>
        <title>Order Confirmation - Your Order with laksyah.com [<?php echo $order->id; ?>] has been successfully placed!</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <style>

    </style>
    <body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
        <!-- Save for Web Slices (emailer.psd) -->
        <div style="margin:auto; width:776px; border:solid 2px #404241; margin-top:40px; margin-bottom:40px;">
            <table id="Table_01" width="776" border="0" cellpadding="0" cellspacing="0" align="center" style=" font-family: 'Open Sans',arial, sans-serif;">
                <tr>
                    <td><a href="http://laksyah.com"><img src="<?php echo $this->siteURL(); ?>/images/emailer_01.jpg" width="776" height="102" alt=""></a></td>
                </tr>
                <tr><td>
                        <h1> <span style="float: right;font-size: 13px;padding: 10px;font-weight: bold; padding-top: 0px;">Order ID #<?php echo $order->id; ?></span></h1>

                    </td></tr>
                <tr>
                    <td>
                        <table cellspacing="0" cellpadding="0" border="0" width="776" style="    font-family: 'Open Sans',arial, sans-serif;font-size: 13px;">
                            <thead>
                                <tr>
                                    <th align="left" width="325" bgcolor="#EAEAEA" style="    font-family: 'Open Sans',arial, sans-serif;font-size:13px;padding:5px 9px 6px 9px;line-height:1em">Billing Information:</th>
                                    <th width="10"></th>
                                    <th align="left" width="325" bgcolor="#EAEAEA" style="font-family:'Open Sans',arial, sans-serif;font-size:13px;padding:5px 9px 6px 9px;line-height:1em">Payment Method:</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td valign="top" style="font-size:13px;padding:7px 9px 9px 9px;border-left:1px solid #eaeaea;border-bottom:1px solid #eaeaea;border-right:1px solid #eaeaea">
                                        <?php echo $bill_address->first_name; ?>   <?php echo $bill_address->last_name; ?>  <br>

                                        <?php echo $bill_address->address_1; ?> <br>
                                        <?php echo $bill_address->postcode; ?><br>


                                        <?php echo $bill_address->state; ?><br>

                                        <?php
                                        echo $shiping_charge->country;
                                        ?>



                                    </td>
                                    <td>&nbsp;</td>
                                    <td valign="top" style="font-family: 'Open Sans',arial, sans-serif;font-size:12px;padding:7px 9px 9px 9px;border-left:1px solid #eaeaea;border-bottom:1px solid #eaeaea;border-right:1px solid #eaeaea">
                                        <p style="text-transform: uppercase;font-weight: bold;padding-top:20px;">pay via <?php
                                            if($order->payment_mode == 1) {
                                                    echo "Credit Amount";
                                            } elseif($order->payment_mode == 2) {
                                                    echo "CREDIT/DEBIT CARD OR NET BANKING";
                                            } elseif($order->payment_mode == 3) {
                                                    echo "Paypal";
                                            } elseif($order->payment_mode == 4) {
                                                    $wallet_amt = $order->wallet;
                                                    if($order->netbanking != '') {
                                                            $payment_amt = $order->netbanking;
                                                            $method = 'CREDIT/DEBIT CARD OR NET BANKING';
                                                    } else if($order->paypal != '') {
                                                            $payment_amt = $order->paypal;
                                                            $method = 'Paypal';
                                                    }
                                                    echo "<br>Credit Amount = " . $wallet_amt;
                                                    echo "<br>" . $method . " = " . $payment_amt;
                                            }
                                            ?></p>



                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <br>

                        <table cellspacing="0" cellpadding="0" border="0" width="776" style="    font-family: 'Open Sans',arial, sans-serif;font-size: 13px;">
                            <thead>
                                <tr>
                                    <th align="left" width="364" bgcolor="#EAEAEA" style="font-family:'Open Sans',arial, sans-serif;font-size:13px;padding:5px 9px 6px 9px;line-height:1em">Shipping Information:</th>
                                    <th width="10"></th>
                                    <th align="left" width="364" bgcolor="#EAEAEA" style="font-family:'Open Sans',arial, sans-serif;font-size:13px;padding:5px 9px 6px 9px;line-height:1em">Shipping Method:</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td valign="top" style="font-size:13px;padding:7px 9px 9px 9px;border-left:1px solid #eaeaea;border-bottom:1px solid #eaeaea;border-right:1px solid #eaeaea">
                                        <?php echo $user_address->first_name; ?>   <?php echo $bill_address->last_name; ?><br>

                                        <?php echo $user_address->address_1; ?> <br>
                                        <?php echo $user_address->postcode; ?><br>


                                        <?php echo $user_address->state; ?> <br>



                                        &nbsp;
                                    </td>
                                    <td>&nbsp;</td>
                                    <td valign="top" style="font-size:13px;padding:7px 9px 9px 9px;border-left:1px solid #eaeaea;border-bottom:1px solid #eaeaea;border-right:1px solid #eaeaea">
                                        <?php
                                        if($shiping_charge->shipping_rate == 0 || $shiping_charge->shipping_rate = '') {
                                                echo " Free Shipping";
                                        } else {
                                                ?>
                                                Shipping Rate:<?php
                                                echo Yii::app()->Currency->convert($shiping_charge->shipping_rate);
                                        }
                                        ?> ( delivered within 3-14 working days )
                                        &nbsp;
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <table cellspacing="0" cellpadding="0" border="0" width="776" style="border:1px solid #eaeaea;font-family: 'Open Sans',arial, sans-serif;">
                            <thead>
                                <tr>
                                    <th align="left" bgcolor="#EAEAEA" style="font-size:13px;padding:3px 9px">Item</th>
                                    <th align="left" bgcolor="#EAEAEA" style="font-size:13px;padding:3px 9px">Sku</th>
                                    <th align="center" bgcolor="#EAEAEA" style="font-size:13px;padding:3px 9px">Qty</th>
                                    <th align="right" bgcolor="#EAEAEA" style="font-size:13px;padding:3px 9px">Subtotal</th>
                                </tr>
                            </thead>

                            <tbody bgcolor="#F6F6F6">
                                <?php
                                foreach($order_details as $orders) {
                                        $product_names = Products::model()->findByAttributes(array('id' => $orders->product_id));
                                        $product_option = OptionDetails::model()->findByAttributes(array('id' => $orders->option_id));
                                        $color = OptionCategory::model()->findByPk($product_option->color_id);
                                        $size = OptionCategory::model()->findByPk($product_option->size_id);
                                        ?>
                                        <tr>
                                            <td align="left" valign="top" style="font-size:11px;padding:3px 9px;padding-top:10px; <?php if($orders->gift_option == 0) { ?>padding-bottom:10px;border-bottom:1px dotted #cccccc;<?php } ?>">
                                                <strong style="font-size:11px;text-transform: uppercase;"><?php echo $product_names->product_name; ?></strong>
                                                <?php
                                                if($orders->option_id != '') {
                                                        ?>
                                                        <dl style="margin:0;padding:0">
                                                            <?php if($product_option->color_id != '' && $product_option->color_id != 0) {
                                                                    ?>
                                                                    <dt><strong>Color : </strong>
                                                                    <span style="margin:0;padding:0 0 0 9px">PARADISE PINK </span></dt>
                                                                    <?php
                                                            }
                                                            if($product_option->size_id != '' && $product_option->size_id != 0) {
                                                                    ?>
                                                                    <dt><strong>Size &nbsp;&nbsp;: </strong>
                                                                    <span style="margin:0;padding:0 0 0 9px">XXL</span></dt>
                                                            <?php } ?>
                                                        </dl>
                                                <?php } ?>
                                            </td>
                                            <td align="left" valign="top" style="font-size:11px;padding:3px 9px;padding-top:10px; <?php if($orders->gift_option == 0) { ?>padding-bottom:10px;border-bottom:1px dotted #cccccc;<?php } ?>"><?php echo $product_names->sku; ?></td>
                                            <td align="center" valign="top" style="font-size:11px;padding:3px 9px;padding-top:10px; <?php if($orders->gift_option == 0) { ?>padding-bottom:10px;border-bottom:1px dotted #cccccc;<?php } ?>"><?php echo $orders->quantity; ?></td>
                                            <td align="right" valign="top" style="font-size:11px;padding:3px 9px;padding-top:10px; <?php if($orders->gift_option == 0) { ?>padding-bottom:10px;border-bottom:1px dotted #cccccc;<?php } ?>">


                                                <span><?php echo Yii::app()->Currency->convert($orders->amount); ?></span>                                        </td>
                                        </tr>
                                        <?php if($orders->gift_option == 1) { ?>
                                                <tr>
                                                    <td colspan="3" style="padding: 0px 0px 10px 10px;text-transform: uppercase;font-size: 10px;font-weight: bold;border-bottom:1px dotted #cccccc">Gift Packing</td>
                                                    <td align="right" valign="top" style="font-size:11px;padding:3px 9px;border-bottom:1px dotted #cccccc;"><?php echo Yii::app()->Currency->convert($orders->rate); ?></td>
                                                </tr>

                                                <?php
                                        }
                                }
                                ?>

                                <tr>
                                    <?php
                                    foreach($order_details as $total_order) {
                                            $totorder += $total_order->amount;
                                    }

                                    foreach($order_details as $giftoption) {
                                            $totgift += $giftoption->rate;
                                    }
                                    $granttotal = $totgift + $totorder;
                                    $total = $granttotal + $shiping_charge->shipping_rate;
                                    ?>
                                    <td colspan="3" align="right" style="padding:13px 9px 0 0;font-size:13px;">
                                        Subtotal                    </td>
                                    <td align="right" style="padding:13px 9px 0 0;font-size:13px;">
                                        <span><?php echo Yii::app()->Currency->convert($granttotal); ?></span>                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" align="right" style="padding:3px 9px;font-size:13px;">
                                        Shipping &amp; Handling                    </td>
                                    <td align="right" style="padding:3px 9px;font-size:13px;">
                                        <span><?php echo Yii::app()->Currency->convert($shiping_charge->shipping_rate); ?></span>                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" align="right" style="padding:3px 9px 13px 0;font-size:13px;">
                                        <strong>Grand Total</strong>
                                    </td>
                                    <td align="right" style="padding:3px 9px 13px 0;font-size:13px;">
                                        <strong><span><?php echo Yii::app()->Currency->convert($total); ?></span></strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <br>
                        <p style="font-size:12px;margin:0 0 10px 0"></p>
                    </td>
                </tr>



                <tr>
                    <td>
                        <img src="<?php echo $this->siteURL(); ?>/images/emailer_03.jpg" width="776" height="47" alt=""></td>
                </tr>
                <tr>
                    <td style="background-color:#f7f4f1"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="    font-family: 'Open Sans',arial, sans-serif;font-size: 13px;">
                            <tbody>
                                <tr>
                                    <td width="250" align="center" style="border-right:solid 1px #d7d7d7;"><img src="<?php echo $this->siteURL(); ?>/images/emailer-footer.jpg" width="116" height="162" alt=""/></td>
                                    <td align="center" style="border-right:solid 1px #d7d7d7;">
                                        <h4 style=" font-family:'Open Sans',arial, sans-serif; font-size:16px; color:#414042; margin-bottom:10px;">Contact Us </h4>
                                        <p style="font-family:'Open Sans',arial, sans-serif; font-size:13px;">Tel: +91 914 220 2222 <br>
                                            <a href="mailto:support@laksyah.com" style="border:none; color:#414042;">support@laksyah.com</a> <br>
                                            Mon to Sat 9.30am to 6.30pm IST</p></td>
                                    <td width="250" align="center"><h4 style=" font-family:'Open Sans',arial, sans-serif; font-size:16px; color:#414042; margin-bottom:10px;">Visit Us</h4>
                                        <p style="font-family:'Open Sans',arial, sans-serif; font-size:13px;">The Design House,  C-3,<br>
                                            GCDA House, Mavelipuram,<br>
                                            Kakkanad, kochi </p></td>
                                </tr>
                            </tbody>
                        </table></td>
                </tr>
            </table></div>
        <!-- End Save for Web Slices -->
    </body>
</html>
