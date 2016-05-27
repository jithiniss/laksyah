<html>
    <head>
        <title>emailer</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <style>

    </style>
    <body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
        <!-- Save for Web Slices (emailer.psd) -->
        <div style="margin:auto; width:776px; border:solid 2px #404241; margin-top:40px; margin-bottom:40px;">
            <table id="Table_01" width="776" border="0" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td><a href="http://laksyah.com"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/emailer_01.jpg" width="776" height="102" alt=""></a></td>
                </tr>

                <tr>
                    <td>
                        <table cellspacing="0" cellpadding="0" border="0" width="776">
                            <thead>
                                <tr>
                                    <th align="left" width="325" bgcolor="#EAEAEA" style="font-family:'Open Sans',arial, sans-serif;font-size:13px;padding:5px 9px 6px 9px;line-height:1em">Billing Information:</th>
                                    <th width="10"></th>
                                    <th align="left" width="325" bgcolor="#EAEAEA" style="font-family:'Open Sans',arial, sans-serif;font-size:13px;padding:5px 9px 6px 9px;line-height:1em">Payment Method:</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td valign="top" style="font-size:16px;padding:7px 9px 9px 9px;border-left:1px solid #eaeaea;border-bottom:1px solid #eaeaea;border-right:1px solid #eaeaea">
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
                                        <p><?php
                                            if ($order->payment_mode == 1) {
                                                    echo"Wallet";
                                            } elseif ($order->payment_mode == 2) {
                                                    echo"Payment gateway";
                                            } elseif ($order->payment_mode == 3) {
                                                    echo"Paypal";
                                            }
                                            ?></p>



                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <br>

                        <table cellspacing="0" cellpadding="0" border="0" width="776">
                            <thead>
                                <tr>
                                    <th align="left" width="364" bgcolor="#EAEAEA" style="font-family:'Open Sans',arial, sans-serif;font-size:13px;padding:5px 9px 6px 9px;line-height:1em">Shipping Information:</th>
                                    <th width="10"></th>
                                    <th align="left" width="364" bgcolor="#EAEAEA" style="font-family:'Open Sans',arial, sans-serif;font-size:13px;padding:5px 9px 6px 9px;line-height:1em">Shipping Method:</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td valign="top" style="font-size:16px;padding:7px 9px 9px 9px;border-left:1px solid #eaeaea;border-bottom:1px solid #eaeaea;border-right:1px solid #eaeaea">
                                        <?php echo $user_address->first_name; ?>   <?php echo $bill_address->last_name; ?><br>

                                        <?php echo $user_address->address_1; ?> <br>
                                        <?php echo $user_address->postcode; ?><br>


                                        <?php echo $user_address->state; ?> <br>



                                        &nbsp;
                                    </td>
                                    <td>&nbsp;</td>
                                    <td valign="top" style="font-size:16px;padding:7px 9px 9px 9px;border-left:1px solid #eaeaea;border-bottom:1px solid #eaeaea;border-right:1px solid #eaeaea">shipping rate:
                                        <?php echo Yii::app()->Currency->convert($shiping_charge->shipping_rate); ?> ( delivered within 3-14 working days )
                                        &nbsp;
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <br>

                        <table cellspacing="0" cellpadding="0" border="0" width="776" style="border:1px solid #eaeaea">
                            <thead>
                                <tr>
                                    <th align="left" bgcolor="#EAEAEA" style="font-family: 'Open Sans',arial, sans-serif;font-size:13px;padding:3px 9px">  PRODUCT NAME</th>
                                    <th align="left" bgcolor="#EAEAEA" style="font-family: 'Open Sans',arial, sans-serif;font-size:13px;padding:3px 9px">QUANTITY</th>
                                    <th align="center" bgcolor="#EAEAEA" style="font-family: 'Open Sans',arial, sans-serif;font-size:13px;padding:3px 9px"> UNIT PRICE</th>
                                    <th align="right" bgcolor="#EAEAEA" style="font-family: 'Open Sans',arial, sans-serif;font-size:13px;padding:3px 9px">SUB TOTAL</th>
                                </tr>
                            </thead>

                            <tbody bgcolor="#F6F6F6">

                                <?php
                                foreach ($order_details as $orders) {
                                        $product_names = Products::model()->findByAttributes(array('id' => $orders->product_id));
                                        ?>
                                        <tr>
                                            <td align="center" width="776"><?php echo $product_names->product_name; ?></td>
                                            <td align="left" style="padding: 0px 0px 0px 36px" width="776"><?php echo $orders->quantity; ?></td>
                                            <td align="left" style="padding: 0px 0px 0px 58px;" width="776"><?php echo Yii::app()->Currency->convert($orders->amount); ?><?php if ($orders->gift_option == 1) { ?><span style="font-size: 9px;">  + <?php
                                                            echo Yii::app()->Currency->convert($orders->rate) . '(gift add on)';
                                                    }
                                                    ?>  </span> </td>
                                            <td align="right" style="padding: 0px 10px 0px 0px" width="776"><?php echo Yii::app()->Currency->convert($orders->amount + $orders->rate); ?></td>
                                        </tr>
                                <?php } ?>




                            </tbody>

                            <tbody>

                                <tr>
                                    <td colspan="3" align="right" style="padding:3px 9px">
                                        Shipping &amp; Handling                    </td>
                                    <td align="right" style="padding:3px 9px">
                                        <span> <?php echo Yii::app()->Currency->convert($shiping_charge->shipping_rate); ?> </span>                    </td>
                                </tr>


                                <?php
                                foreach ($order_details as $total_order) {
                                        $totorder += $total_order->amount;
                                }
                                ?>

                                <?php
                                foreach ($order_details as $giftoption) {
                                        $totgift += $giftoption->rate;
                                }
                                ?>

                                <?php $granttotal = $totgift + $totorder; ?>
                                <tr>
                                    <td colspan = "3" align = "right" style = "padding:3px 9px">
                                        <strong>Grand Total</strong>
                                    </td>
                                    <td align = "right" style = "padding:3px 8px">
                                        <strong>
                                            <?php
                                            $total = $granttotal + $shiping_charge->shipping_rate;
                                            echo Yii::app()->Currency->convert($total);
                                            ?>
                                        </strong>

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
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/emailer_03.jpg" width="776" height="47" alt=""></td>
                </tr>
                <tr>
                    <td style="background-color:#f7f4f1"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td width="250" align="center" style="border-right:solid 1px #d7d7d7;"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/emailer-footer.jpg" width="116" height="162" alt=""/></td>
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
