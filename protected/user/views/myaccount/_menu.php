<!--<div class="col-md-3 nop">
        <ul class="list-unstyled sofas">

                <li class="sides2"><i class="fa ics fa-angle-right"></i><a class="sides3" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/myaccount/profile">Account Information</a></li>

                <li class="sides2"><i class="fa ics fa-angle-right"></i><a class="sides3" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/myaccount/addressbook">Address Book</a></li>
        </ul>
</div>-->

<div class="col-sm-3 sidebar">
        <h3 class="side_nav_toggle"><i class="fa fa-align-justify "></i><?php echo Yii::app()->session['user']['first_name']; ?>'s Account</h3>
        <div class="cat_nav">
                <ul class="catmenu">
                        <li><?php echo CHtml::link('My Profile', array('Myaccount/Profile')); ?></li>
                        <li><?php echo CHtml::link('My Credit', array('MyWallet/CreditHistory')); ?></li>
                        <li><?php echo CHtml::link('Address Book', array('Myaccount/Addressbook')); ?></li>
                        <li><?php echo CHtml::link('My Orders', array('Myaccount/Myordernew')); ?></li>
                        <li><?php echo CHtml::link('My Wishlist', array('Myaccount/Mywishlists')); ?></li>
                        <li><?php echo CHtml::link('Measurements', array('Myaccount/SizeChartType')); ?></li>
                        <li><?php echo CHtml::link('Make a Payment', array('Myaccount/Makepayment')); ?></li>
                        <!--            <li> <a href="#">Track My Order</a></li>-->
                </ul>
        </div>
</div>