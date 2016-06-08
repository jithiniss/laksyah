<form name=paypal action='https://www.sandbox.paypal.com/cgi-bin/webscr' method='post'>
        <input type='hidden' name='cmd' value='_xclick'>
        <input type='hidden' name='business' value='laksyahowner@gmail.com'>
        <input type='hidden' name='item_name' value='Laksyah Credit Payment'>
        <input type='hidden' name='item_number' value=<?= $wallet_id; ?>>
        <input type='hidden' name='amount' value=<?= $totaltopay; ?>>
        <input type='hidden' name='no_shipping' value='1'>
        <input type='hidden' name='return' value='<?php echo Yii::app()->request->baseUrl; ?>/index.php/Mywallet/CreditSuccess'>
        <input type='hidden' name='cancel' value='<?php echo Yii::app()->request->baseUrl; ?>/index.php/Mywallet/CreditError'>
        <input type='hidden' name='no_note' value='1'>
        <input type='hidden' name='currency_code' value='USD'>
        <input type='hidden' name='lc' value='US'>
        <input type='hidden' name='bn' value='PP-BuyNowBF'>
</form>
<script>
        document.paypal.submit();
</script>