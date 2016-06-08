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
                    <td><a href="http://laksyah.com"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/emailer_01.jpg" width="776" height="102" alt=""></a></td>
                </tr>
                <tr>
                    <td style="padding:40px 20px; font-family:'Open Sans',arial, sans-serif; font-size:13px"><p>Hi Admin,</p>
                        <table id="Table_01"  border="0" cellpadding="0" cellspacing="0" align="left" style="padding:13px 0px; font-family:'Open Sans',arial, sans-serif; font-size:13px">
                            <tr>
                                <td><p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;padding:10px;">Customer Name</p></td>
                                <td>:</td>
                                <td><p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;padding:10px;"><?php echo $user_wallet->first_name; ?>  <?php echo $user_wallet->last_name; ?></p></td>
                            </tr>
                            <tr>
                                <td><p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;padding:10px;">Paid Amount</p></td>
                                <td>:</td>
                                <td><p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;padding:10px;"><?php echo Yii::app()->Currency->convert($wallet_history->amount); ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td><p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;padding:10px;">Payment Method</p></td>
                                <td>:</td>
                                <td>
                                    <p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;padding:10px;">
                                        <?php
                                        if($wallet_history->payment_method == 1) {
                                                echo "Paid By Laksyah";
                                        } else if($wallet_history->payment_method == 2) {
                                                echo "Credit/Debit Card or Netbanking";
                                        } else if($wallet_history->payment_method == 3) {
                                                echo "Paypal";
                                        }
                                        ?>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td><p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;padding:10px;">Message</p></td>
                                <td>:</td>
                                <td><p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;padding:10px;"><?php echo $wallet_history->field1; ?></p></td>
                            </tr>
                            <tr>
                                <td><p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;padding:10px;">Updated Credit Balance</p></td>
                                <td>:</td>
                                <td><p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;padding:10px;"><?php echo Yii::app()->Currency->convert($user_wallet->wallet_amt); ?></p></td>
                            </tr>
                            <tr>
                                <td><p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;padding:10px;">Payment Status</p></td>
                                <td>:</td>
                                <td><p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;padding:10px;"><?php if($wallet_history->field2 == 1) {
                                                echo 'Success';
                                        } else {
                                                echo 'Failed';
                                        } ?></p></td>
                            </tr>
                        </table>


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