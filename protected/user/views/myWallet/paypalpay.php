<form name=paypal action='https://www.sandbox.paypal.com/cgi-bin/webscr' method='post'>
        <input type='hidden' name='cmd' value='_xclick'>
        <input type='hidden' name='business' value='laksyahowner@gmail.com'>
        <input type='hidden' name='item_name' value='Laksyah Wallet'>
        <input type='hidden' name='item_number' value=<?= $order; ?>>
        <input type='hidden' name='amount' value=<?= $totaltopay; ?>>
        <input type="hidden" name="pay_id" value="<?= $pid; ?>">
        <input type="hidden" name="user_id" value="<?= $uid; ?>">
        <input type="hidden" name="wallet_id" value="<?= $wid; ?>">
        <input type='hidden' name='no_shipping' value='1'>
        <input type='hidden' name='return' value="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Mywallet/CreditSuccess/payid/<?php echo $pid; ?>/user_id/<?php echo $hid; ?>/wallet_id/<?php echo $pid; ?>">
        <input type='hidden' name='cancel' value='<?php echo Yii::app()->request->baseUrl; ?>/index.php/Mywallet/CreditError'>
        <input type='hidden' name='no_note' value='1'>
        <input type='hidden' name='currency_code' value='USD'>
        <input type='hidden' name='lc' value='US'>
        <input type='hidden' name='bn' value='PP-BuyNowBF'>
</form>
<h3>Payment Procedure  Progress </h3><span id="wait">.</span>
<script>
        var dots = window.setInterval(function () {
                var wait = document.getElementById("wait");
                if (wait.innerHTML.length > 3)
                        wait.innerHTML = "";
                else
                        wait.innerHTML += ".";
        }, 500);
</script>
<script>
        document.paypal.submit();
</script>