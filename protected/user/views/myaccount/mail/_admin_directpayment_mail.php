<html>
    <head>
        <title>emailer</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
        <!-- Save for Web Slices (emailer.psd) -->
        <div style="margin:auto; width:776px; border:solid 2px #404241; margin-top:40px; margin-bottom:40px;">
            <table id="Table_01" width="776" border="0" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td><a href="http://laksyah.com"><img src="<?php echo $this->siteURL(); ?>/images/emailer_01.jpg" width="776" height="102" alt=""></a></td>
                </tr>
                <tr>
                    <td style="padding:40px 20px; font-family:'Open Sans',arial, sans-serif; font-size:13px"><p>Hi Admin,</p>
                        <table id="Table_01"  border="0" cellpadding="0" cellspacing="0" align="left" style="padding:13px 0px; font-family:'Open Sans',arial, sans-serif; font-size:13px">
                            <tr>
                                <td><p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;padding:10px;">Customer Name</p></td>
                                <td>:</td>
                                <td><p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;padding:10px;"><?php echo $userdetails->first_name; ?>  <?php echo $userdetails->last_name; ?></p></td>
                            </tr>
                            <tr>
                                <td><p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;padding:10px;">Enquiry ID</p></td>
                                <td>:</td>
                                <td><p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;padding:10px;">#<?php echo $enquiry->id; ?></p></td>
                            </tr>
                            <tr>
                                <td><p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;padding:10px;">Product Name</p></td>
                                <td>:</td>
                                <td><p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;padding:10px;"><?php echo $payment->product_name; ?></p></td>
                            </tr>
                            <tr>
                                <td><p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;padding:10px;">Product Code</p></td>
                                <td>:</td>
                                <td><p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;padding:10px;"><?php echo $payment->product_code; ?></p></td>
                            </tr>
                            <tr>
                                <td><p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;padding:10px;">Paid Amount</p></td>
                                <td>:</td>
                                <td><p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;padding:10px;"><?php echo Yii::app()->Currency->convertCurrencyCode($payment->total_amount); ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td><p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;padding:10px;">Payment Method</p></td>
                                <td>:</td>
                                <td>  <p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;padding:10px;">
                                        <?php
                                        if($payment->payment_mode == 1) {
                                                echo "Laksyah Credit Amount";
                                        } else if($payment->payment_mode == 2) {
                                                echo "Credit/Debit Card or Netbanking";
                                        } else if($payment->payment_mode == 3) {
                                                echo "Paypal";
                                        } else if($payment->payment_mode == 4) {
                                                $wallet_amt = $payment->wallet;
                                                if($payment->netbanking != '') {
                                                        $payment_amt = $payment->netbanking;
                                                        echo $method = 'Laksyah Credit Amount + CREDIT/DEBIT CARD OR NET BANKING';
                                                } else if($payment->paypal != '') {
                                                        $payment_amt = $payment->paypal;
                                                        echo $method = 'Laksyah Credit Amount + Paypal';
                                                }
                                        }
                                        ?></p></td>
                            </tr>
                            <?php if($payment->message != "") { ?>
                                    <tr>
                                        <td><p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;padding:10px;">Message</p></td>
                                        <td>:</td>
                                        <td><p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;padding:10px;"><?php echo $payment->message; ?></p></td>
                                    </tr>
                            <?php } ?>

                            <tr>
                                <td><p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;padding:10px;">Payment Date</p></td>
                                <td>:</td>
                                <td><p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;padding:10px;"><?php echo date("d-m-Y g:i a", strtotime($payment->date)); ?></p></td>
                            </tr>
                            <tr>
                                <td><p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;padding:10px;">Payment Status</p></td>
                                <td>:</td>
                                <td><p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;padding:10px;"><?php
                                        if($payment->status == 1) {
                                                echo 'Success';
                                        } else {
                                                echo 'Failed';
                                        }
                                        ?></p></td>
                            </tr>
                        </table>


                    </td>
                </tr>

                <tr>
                    <td>
                        <img src="<?php echo $this->siteURL(); ?>/images/emailer_03.jpg" width="776" height="47" alt=""></td>
                </tr>
                <tr>
                    <td style="background-color:#f7f4f1"><table width="100%" border="0" cellspacing="0" cellpadding="0">
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
