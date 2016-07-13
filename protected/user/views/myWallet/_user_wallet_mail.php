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
                    <td style="padding:40px 20px; font-family:'Open Sans',arial, sans-serif; font-size:13px"><p>Hi <?php echo $user_wallet->first_name; ?><span>      <?php echo $user_wallet->last_name; ?>,</p>
                        <p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;">You have added <b><?php echo Yii::app()->Currency->convertCurrencyCode($wallet_history->amount); ?></b> to your Laksyah Credit Balance on <?php echo date("d-m-Y g:i a", strtotime($wallet_history->entry_date)); ?>.</p>
                        <p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;"><b>Your Message : </b><?php echo $wallet_history->field1; ?></p>
                        <p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;"><b>Payment Method : </b>
                            <?php
                            if($wallet_history->payment_method == 1) {
                                    echo "Paid By Laksyah";
                            } else if($wallet_history->payment_method == 2) {
                                    echo "Credit/Debit Card or Netbanking";
                            } else if($wallet_history->payment_method == 3) {
                                    echo "Paypal";
                            }
                            ?></p>
                        <p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;">Your updated Laksyah Credit Balance is <b><?php echo Yii::app()->Currency->convertCurrencyCode($user_wallet->wallet_amt); ?></b> .</p>

                        <p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;">Laksyah Credit Balance can be used  for shopping on Laksyah.</p>
                        <p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;"><a href="<?php echo $this->siteURL() . '/index.php/CreditHistory' ?>" style="text-transform: uppercase;background-color: #f47721;border-radius: 0;outline: none;border: none;height: 40px;line-height: 40px;padding: 0px 10px;padding-left: 30px;padding-right: 30px; color:#fff; text-decoration:none; display:inline-block;">VIEW MY ACCOUNT</a></p>

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