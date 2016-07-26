<label class="col-xs-12" style="font-weight:normal;">
        <input type="radio" name="shipping_value" value="1" checked>&nbsp;&nbsp;&nbsp;<strong>I will pick up the order</strong> From Laksyah Design House <?php echo Yii::app()->Currency->convert(0); ?>

</label>
<label class="col-xs-12" style="font-weight:normal;">
        <input type="radio" name="shipping_value" value="2" >&nbsp;&nbsp;&nbsp;<strong>Free Shipping</strong>  Delivered With in 3-14 days <?php echo Yii::app()->Currency->convert($shipping_charge); ?>
</label>