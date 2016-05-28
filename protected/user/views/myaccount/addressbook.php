
<?php
if (empty($model)) {
        echo '<b>No More address found</b>';
} else {
        ?>
        <center><h1>Address Book</h1></center>

        <?php
        foreach ($model as $address) {
                $country = Countries::model()->findByPk($address->country);
                if ($address->default_billing_address == '1') {
                        ?>
                        <div style="margin-left: 474px;"><p style="color: red;"><b>Default Billing Address</b></p>
                                <div><?php echo $address->first_name; ?></div>
                                <div><?php echo $address->last_name; ?></div>
                                <div><?php echo $address->company; ?></div>
                                <div><?php echo $address->contact_number; ?></div>
                                <div><?php echo $address->state; ?></div>
                                <div><?php echo $country->country_name; ?></div>
                                <button><a class="my" href="<?php echo Yii::app()->baseUrl; ?>/index.php/Myaccount/EditAddress/<?php echo $address->id; ?>">Edit</a></button>
                                <button><a class="my" href="<?php echo Yii::app()->baseUrl; ?>/index.php/Myaccount/DeleteAddress/<?php echo $address->id; ?>">Delete</a></button>
                        </div>

                        <?php
                } if ($address->default_shipping_address == '1') {
                        ?>
                        <div style="margin-left: 474px;"><p style="color: red;"><b>Default Shipping Address</b></p>
                                <div><?php echo $address->first_name; ?></div>
                                <div><?php echo $address->last_name; ?></div>
                                <div><?php echo $address->company; ?></div>
                                <div><?php echo $address->contact_number; ?></div>
                                <div><?php echo $address->state; ?></div>
                                <div><?php echo $country->country_name; ?></div>
                                <button><a class="my" href="<?php echo Yii::app()->baseUrl; ?>/index.php/Myaccount/EditAddress/<?php echo $address->id; ?>">Edit</a></button>
                                <button><a class="my" href="<?php echo Yii::app()->baseUrl; ?>/index.php/Myaccount/DeleteAddress/<?php echo $address->id; ?>">Delete</a></button>
                        </div>

                <?php }if ($address->default_shipping_address == '0' && $address->default_billing_address == '0') {
                        ?>
                        <div style="margin-left: 474px;"><p><b>New Address</b></p>
                                <div><?php echo $address->first_name; ?></div>
                                <div><?php echo $address->last_name; ?></div>
                                <div><?php echo $address->company; ?></div>
                                <div><?php echo $address->contact_number; ?></div>
                                <div><?php echo $address->state; ?></div>
                                <div><?php echo $country->country_name; ?></div>
                                <button><a class="my" href="<?php echo Yii::app()->baseUrl; ?>/index.php/Myaccount/EditAddress/<?php echo $address->id; ?>">Edit</a></button>
                                <button><a class="my" href="<?php echo Yii::app()->baseUrl; ?>/index.php/Myaccount/DeleteAddress/<?php echo $address->id; ?>">Delete</a></button>
                        </div>

                <?php }
                ?>

                <?php
        }
}
?>
<center><button><a class="my" href="<?php echo Yii::app()->baseUrl; ?>/index.php/Myaccount/Newaddress">Create new address</a></button></center>
