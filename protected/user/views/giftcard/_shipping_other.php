<label style="font-weight:normal;">
        <input type="radio" name="shipping_value" value="1" checked>
        <strong>Shipping Charge Is</strong>  <br />
        <?php echo Yii::app()->Currency->convert($shipping_charge); ?>
</label>