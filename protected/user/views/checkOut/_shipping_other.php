<label style="font-weight:normal;">
        <input type="radio" name="shipping_value" value="1" checked>
        <strong>I will pick up the order</strong> <br /> From Laksyah Design House <br />
        <?php echo Yii::app()->Currency->convert($shipping_charge->shipping_rate); ?>
</label>