<label style="font-weight:normal;">
        <input type="radio" name="shipping_value" value="1" checked>
        <strong>I will pick up the order</strong> <br /> From Laksyah Design House <br />
        <?php echo Yii::app()->Currency->convert(0); ?>

</label>
<label style="font-weight:normal;">
        <input type="radio" name="shipping_value" value="2" >
        <strong>Free Shipping</strong> <br /> Delivered With in 3-14 days <br />
        <?php echo Yii::app()->Currency->convert($shipping_charge->shipping_rate); ?>
</label>