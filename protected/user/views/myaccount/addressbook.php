<div class="container main_container inner_pages ">
        <div class="breadcrumbs"> <?php echo CHtml::link('HOME', array('site/index')); ?> <span>/</span> <?php echo CHtml::link('My Account', array('Myaccount/index')); ?><span>/</span> Address Book </div>
        <div class="row">
                <?php echo $this->renderPartial('_menu'); ?>
                <!-- / Sidebar-->
                <div class="col-sm-9 user_content">
                        <h1>Address Book</h1>
                        <div class="default_address">
                                <div class="row">

                                        <?php if (empty($model)) { ?>
                                                <div class="row">
                                                        <div class="col-xs-6 row-borderd text-right empty_image"><img src="<?php echo Yii::app()->baseUrl ?>/images/laksyah_log.jpg" alt=""/></div>
                                                        <div class="col-xs-6 empty_message">
                                                                <h3 class="fournotfour">Address Book Not Found</h3>

                                                                <?php echo CHtml::link('New Address', array('Myaccount/Newaddress', 'id' => CHtml::encode($address->id)), array('class' => 'btn-dark')); ?>
                                                        </div>
                                                </div>

                                        <?php } else {
                                                ?>
                                                <?php
                                                foreach ($model as $address) {
                                                        $country = Countries::model()->findByPk($address->country);
                                                        ?>
                                                        <div class="col-sm-6">
                                                                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered">
                                                                        <tbody>
                                                                                <?php if ($address->default_billing_address == '1') { ?>
                                                                                        <tr>
                                                                                                <th class="cart_action"><span class="label label-success"><i class="fa fa-check"></i></span> Billing Address</th>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td><p><?php echo $address->first_name; ?><br>
                                                                                                                <?php echo $address->last_name; ?><br>
                                                                                                                <?php echo $address->company; ?><br>
                                                                                                                <?php echo $address->contact_number; ?><br>
                                                                                                                <?php echo $address->state; ?><br>
                                                                                                                <?php echo $country->country_name; ?><br>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td class="cart_action action_link"><a href="<?php echo Yii::app()->baseUrl; ?>/index.php/Myaccount/EditAddress/<?php echo $address->id; ?>">Edit</a> | <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/Myaccount/newaddress/<?php echo $address->id; ?>">New Address</a> | <a  onclick="deleteaddress(<?php echo $address->id; ?>)">Delete</a> </td>
                        <!--                                                                                                <td class="cart_action action_link"><?php echo CHtml::link('Edit', array('Myaccount/EditAddress', 'id' => CHtml::encode($address->id))); ?> | <?php echo CHtml::link('New Address', array('Myaccount/Newaddress', 'id' => CHtml::encode($address->id))); ?> | <?php echo CHtml::link('Delete', array('Myaccount/DeleteAddress'), array('class' => '', 'onclick' => 'deleteaddress($address->id)')); ?></td>-->
                                                                                        </tr>
                                                                                <?php } else { ?>
                                                                                        <tr>
                                                                                                <th class="cart_action">Billing Address</th>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td><p><?php echo $address->first_name; ?><br>
                                                                                                                <?php echo $address->last_name; ?><br>
                                                                                                                <?php echo $address->company; ?><br>
                                                                                                                <?php echo $address->contact_number; ?><br>
                                                                                                                <?php echo $address->state; ?><br>
                                                                                                                <?php echo $country->country_name; ?><br>

                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td class="cart_action action_link"><a href="<?php echo Yii::app()->baseUrl; ?>/index.php/Myaccount/EditAddress/<?php echo $address->id; ?>">Edit</a> | <a  onclick="deleteaddress(<?php echo $address->id; ?>)">Delete</a> </td>
                        <!--<td class="cart_action action_link"><?php echo CHtml::link('Edit', array('Myaccount/EditAddress', 'id' => CHtml::encode($address->id))); ?> |  <?php echo CHtml::link('Delete', array('Myaccount/DeleteAddress'), array('class' => '', 'onclick' => 'deleteaddress($address->id)')); ?></td>-->
                                                                                        </tr>

                                                                                <?php } ?>

                                                                        </tbody>

                                                                </table>
                                                        </div>
                                                        <div class="col-sm-6">
                                                                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered">
                                                                        <tbody>
                                                                                <?php if ($address->default_shipping_address == '1') { ?>
                                                                                        <tr>
                                                                                                <th class="cart_action"><span class="label label-success"><i class="fa fa-check"></i></span> Shipping Address</th>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td><p><?php echo $address->first_name; ?><br>
                                                                                                                <?php echo $address->last_name; ?><br>
                                                                                                                <?php echo $address->company; ?><br>
                                                                                                                <?php echo $address->contact_number; ?><br>
                                                                                                                <?php echo $address->state; ?><br>
                                                                                                                <?php echo $country->country_name; ?><br>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td class="cart_action action_link"><a href="<?php echo Yii::app()->baseUrl; ?>/index.php/Myaccount/EditAddress/<?php echo $address->id; ?>">Edit</a> | <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/Myaccount/newaddress/<?php echo $address->id; ?>">New Address</a> | <a  onclick="deleteaddress(<?php echo $address->id; ?>)">Delete</a> </td>
                        <!--<td class="cart_action action_link"><?php echo CHtml::link('Edit', array('Myaccount/EditAddress', 'id' => CHtml::encode($address->id))); ?> | <?php echo CHtml::link('New Address', array('Myaccount/Newaddress', 'id' => CHtml::encode($address->id))); ?> | <?php echo CHtml::link('Delete', array('Myaccount/DeleteAddress'), array('class' => '', 'onclick' => 'deleteaddress()')); ?></td>-->
                                                                                        </tr>
                                                                                <?php } else { ?>
                                                                                        <tr>
                                                                                                <th class="cart_action">Shipping Address</th>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td><p><?php echo $address->first_name; ?><br>
                                                                                                                <?php echo $address->last_name; ?><br>
                                                                                                                <?php echo $address->company; ?><br>
                                                                                                                <?php echo $address->contact_number; ?><br>
                                                                                                                <?php echo $address->state; ?><br>
                                                                                                                <?php echo $country->country_name; ?><br>

                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td class="cart_action action_link"><a href="<?php echo Yii::app()->baseUrl; ?>/index.php/Myaccount/EditAddress/<?php echo $address->id; ?>">Edit</a> | <a  onclick="deleteaddress(<?php echo $address->id; ?>)">Delete</a> </td>
                                                                                        </tr>

                                                                                <?php } ?>

                                                                        </tbody>

                                                                </table>
                                                        </div>
                                                        <?php
                                                }
                                        }
                                        ?>

                                </div>
                        </div>
                </div>
        </div>
</div>
<script>
        function deleteaddress(id)
        {

                var r = confirm("Are you sure you want to delete shipping address and billing address??");
                if (r == true)
                {
                        $.ajax({
                                type: "GET",
                                url: baseurl + 'Myaccount/DeleteAddress',
                                data: ({id: id}),
                                success: function (data)
                                {
                                        window.location.replace("<?= Yii::app()->baseUrl; ?>/index.php/Myaccount/Addressbook/" + id);
                                }
                        });

                }
                else
                {
                        window.location.replace("<?= Yii::app()->baseUrl; ?>/index.php/Myaccount/Addressbook/" + id);
                }
        }

</script>
