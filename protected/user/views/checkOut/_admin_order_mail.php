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
                    <td valign="top">
                        <h1 style="font-size:22px;font-weight:normal;line-height:22px;margin:13px 0 12px 14px">Hello, Admin</h1>
                        <p style="font-size:15px;line-height:16px;margin: 0px 12px 8px 11px;">
                            A order from   <?php echo $bill_address->first_name; ?>   <?php echo $bill_address->last_name; ?>  <small>(placed on <?php
                                echo
                                date("d/m/Y", strtotime($order->order_date));
                                ?>)</small>
                        </p></td>
                </tr>
                <tr>
                    <td>
                        <table cellspacing="0" cellpadding="0" border="0" width="776">
                            <thead>
                                <tr>
                                    <th align="left" width="325" bgcolor="#EAEAEA" style="font-size:13px;padding:5px 9px 6px 9px;line-height:1em">Billing Information:</th>
                                    <th width="10"></th>
                                    <th align="left" width="325" bgcolor="#EAEAEA" style="font-size:13px;padding:5px 9px 6px 9px;line-height:1em">Payment Method:</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td valign="top" style="font-size:16px;padding:7px 9px 9px 9px;border-left:1px solid #eaeaea;border-bottom:1px solid #eaeaea;border-right:1px solid #eaeaea">
                                        <?php echo $bill_address->first_name; ?>   <?php echo $bill_address->last_name; ?>  <br>

                                        <?php echo $bill_address->address_1; ?> <br>
                                        <?php echo $bill_address->postcode; ?><br>


                                        <?php echo $bill_address->state; ?><br>



                                    </td>
                                    <td>&nbsp;</td>
                                    <td valign="top" style="font-size:12px;padding:7px 9px 9px 9px;border-left:1px solid #eaeaea;border-bottom:1px solid #eaeaea;border-right:1px solid #eaeaea">
                                        <p><strong><?php
                                                if ($order->payment_mode == 1) {
                                                        echo"Wallet";
                                                } elseif ($order->payment_mode == 2) {
                                                        echo"Payment gateway";
                                                } elseif ($order->payment_mode == 3) {
                                                        echo"Paypal";
                                                }
                                                ?></strong></p>



                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <br>

                        <table cellspacing="0" cellpadding="0" border="0" width="776">
                            <thead>
                                <tr>
                                    <th align="left" width="364" bgcolor="#EAEAEA" style="font-size:13px;padding:5px 9px 6px 9px;line-height:1em">Shipping Information:</th>
                                    <th width="10"></th>
                                    <th align="left" width="364" bgcolor="#EAEAEA" style="font-size:13px;padding:5px 9px 6px 9px;line-height:1em">Shipping Method:</th>
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
                                    <td valign="top" style="font-size:16px;padding:7px 9px 9px 9px;border-left:1px solid #eaeaea;border-bottom:1px solid #eaeaea;border-right:1px solid #eaeaea">shipping rate
                                        <?php echo $shiping_charge->shipping_rate; ?>  ( delivered within 3-14 working days )
                                        &nbsp;
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <br>

                        <table cellspacing="0" cellpadding="0" border="0" width="776" style="border:1px solid #eaeaea">
                            <thead>
                                <tr>
                                    <th align="left" bgcolor="#EAEAEA" style="font-size:13px;padding:3px 9px">  PRODUCT NAME</th>
                                    <th align="left" bgcolor="#EAEAEA" style="font-size:13px;padding:3px 9px">QUANTITY</th>
                                    <th align="center" bgcolor="#EAEAEA" style="font-size:13px;padding:3px 9px">     UNIT PRICE</th>
                                    <th align="right" bgcolor="#EAEAEA" style="font-size:13px;padding:3px 9px">SUB TOTAL</th>
                                </tr>
                            </thead>

                            <tbody bgcolor="#F6F6F6">
                                <tr>
                                    <?php foreach ($order_details as $orders) { ?>
                                            <?php
                                            $product_names = Products::model()->findAllByAttributes(array('id' => $orders->product_id));
                                            foreach ($product_names as $p_names) {
                                                    ?>
                                                    <td align="center" width="776"><?php echo $p_names->product_name; ?></td>
                                                    <td align="left" style="padding: 0px 0px 0px 36px" width="776">
                                                        <?php echo $orders->quantity; ?>
                                                    </td>
                                                    <td align="center" width="776"><?php
                                                        echo $p_names->price . '.00';
                                                        ?></td>
                                                    <td align="right" width="776" style="padding: 10px"> <?php echo ($orders->quantity * $p_names->price) . '.00'; ?></td>

                                                    </br>
                                                </tr>
                                        <?php }
                                        ?>
                                        <?php
                                }
                                ?>


                            </tbody>

                            <tbody>
                                <tr>

<!--                                    <td align="right" style="padding:3px 9px">
<span>₹2,495.00</span>                    </td>-->
                                </tr>
                                <tr>
                                    <td colspan="3" align="right" style="padding:3px 9px">
                                        Shipping &amp; Handling                    </td>
                                    <td align="right" style="padding:3px 9px">
                                        <span>₹0.00</span>                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" align="right" style="padding:3px 9px">
                                        <strong>Grand Total</strong>
                                    </td>
                                    <td align="right" style="padding:3px 9px">
                                        <strong><span><?php echo $order->total_amount . '.00'; ?></span></strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
<!--                        <table cellspacing="0" cellpadding="0" border="0" width="100%" style="border:1px solid #eaeaea">
                            <thead>
                                <tr>
                                    <th align="left" bgcolor="#EAEAEA" style="font-size:13px;padding:3px 9px"><strong>Gift Message for this Order</strong></th>
                                </tr>
                            </thead>

                            <tbody>

                                <tr>
                                    <td colspan="4" align="left" style="padding:3px 9px">
                                        <strong>From:</strong> BENSON MATHEW            <br><strong>To:</strong> LINCY SAMUEL            <br><strong>Message:</strong><br> Birthdays come and go. But our love and respect for each other will always be there. Love u vave..            </td>
                                </tr>
                            </tbody>
                        </table>-->

                        <p style="font-size:12px;margin:0 0 10px 0"></p>
                    </td>
                </tr>



                <!--

                                <tr>
                                    <td>
                                        <table width="100%">
                                            <tr>
                                                <td width="25%" style="font-family: 'Open Sans',arial, sans-serif;
                                                    font-size: 13px;">
                                                    PRODUCT NAME
                                                </td>
                                                <td width="25%" style="font-family: 'Open Sans',arial, sans-serif;
                                                    font-size: 13px;">
                                                    QUANTITY
                                                </td>
                                                <td width="25%" style="font-family: 'Open Sans',arial, sans-serif;
                                                    font-size: 13px;">
                                                    UNIT PRICE
                                                </td>
                                                <td width="25%" style="font-family: 'Open Sans',arial, sans-serif;
                                                    font-size: 13px;">
                                                    TOTAL
                                                </td>
                                            </tr>

                                            <tr>
                <?php foreach ($order_details as $orders) { ?>
                        <?php
                        $product_names = Products::model()->findAllByAttributes(array('id' => $orders->product_id));
                        foreach ($product_names as $p_names) {
                                ?>
                                                                                                                                                                                                                                                                <td width="25%"><?php echo $p_names->product_name; ?></td>
                                                                                                                                                                                                                                                                <td width="25%">
                                <?php echo $orders->quantity; ?>
                                                                                                                                                                                                                                                                </td>
                                                                                                                                                                                                                                                                <td width="25%"><?php
                                echo $p_names->price . '.00';
                                ?></td>
                                                                                                                                                                                                                                                                <td width="25%"> <?php echo ($orders->quantity * $p_names->price) . '.00'; ?></td>

                                                                                                                                                                                                                                                                </br>
                                                                                                                                                                                                                                                            </tr>
                        <?php }
                        ?>
                        <?php
                }
                ?>


                                            <tr>
                                                <td align="center">TOTAL</td><td></td><td></td><td><strong  style="padding: 6px 0px 0px 17px;"><?php echo $order->total_amount . '.00'; ?></strong></td>
                                            </tr>


                                        </table>
                                    </td>
                                </tr>


                -->


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
<!--<table width="50%" border="1"  style="border-collapse: collapse;float:left">
    <tr>
        <td  style="    font-family: 'Open Sans',arial, sans-serif;
             font-size: 13px;">
            <p style="background-color: #C3C3C3; padding: 14px 0px 10px 22px;
               font-weight: bold;">Billing Information:</p>
            <p style=" padding: 0px 0px 0px 21px;"> <?php echo $bill_address->first_name; ?>   <?php echo $bill_address->last_name; ?>    </p>
            <p style=" padding: 0px 0px 0px 21px;">  <?php echo $bill_address->address_1; ?> </p>
            <p style=" padding: 0px 0px 0px 21px;"> <?php echo $bill_address->company; ?> </p>
            <p style=" padding: 0px 0px 0px 21px;">  <?php echo $bill_address->postcode; ?> </p>
            <p style=" padding: 0px 0px 0px 21px;"> <?php echo $bill_address->state; ?> </p>

        </td>
    </tr>
</table>
<table width="50%" border="1"  style="border-collapse: collapse;float:right">
    <tr>
        <td  style="    font-family: 'Open Sans',arial, sans-serif;
             font-size: 13px;">


            <p style="background-color: #C3C3C3;padding: 14px 0px 10px 22px;
               font-weight: bold;">Payment Method:</p>
            </br>
            </br> </br>    </br>

            <span> Payment Method :</span><?php
if ($order->payment_mode == 1) {
        echo"Wallet";
} elseif ($order->payment_mode == 2) {
        echo"Payment gateway";
} elseif ($order->payment_mode == 3) {
        echo"Paypal";
}
?>
            </br> </br> </br>
        </td>

    </tr>

</tr>
</table>
<table width="50%" border="1"  style="border-collapse: collapse;">
    <tr>



        <td width="50%"  style="font-family: 'Open Sans',arial, sans-serif;
            font-size: 13px;">

            <p style="background-color: #C3C3C3;">Shipping Information:</p>
            <p style=" padding: 0px 0px 0px 21px;"> <?php echo $user_address->first_name; ?>   <?php echo $bill_address->last_name; ?>  </p>
            <p style=" padding: 0px 0px 0px 21px;"><?php echo $user_address->address_1; ?> </p>
            <p style=" padding: 0px 0px 0px 21px;"> <?php echo $user_address->company; ?> </p>
            <p style=" padding: 0px 0px 0px 21px;">  <?php echo $user_address->postcode; ?> </p>
            <p style=" padding: 0px 0px 2px 21px;">   <?php echo $user_address->state; ?> </p>
        </td>
        <td width="50%">

            <p style="background-color: #C3C3C3;margin: 0px 0px 71px 0px;">Shipping Method:</p>

            </br> </br> </br></br> </br>

        </td>

    </tr>

</table>-->