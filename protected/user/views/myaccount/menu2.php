<?php
$model = Mydesign::model()->findAll();
var_dump($model->category
);
die;
?>

<div class="col-md-3 nop">
    <ul class="list-unstyled sofas">
        <li class="sides2"><i class="fa ics fa-angle-right"></i><a class="sides3" href="#">Account Dashboard</a></li>
        <li class="sides2"><i class="fa ics fa-angle-right"></i><a class="sides3" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/myaccount/profile">Account Information</a></li>

        <li class="sides2"><i class="fa ics fa-angle-right"></i><a class="sides3" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/myaccount/myorders">My Orders</a></li>
        <li class="sides2"><i class="fa ics fa-angle-right"></i><a class="sides3" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/myaccount/mydesign">My Designs</a></li>
        <li class="sides2"><i class="fa ics fa-angle-right"></i><a class="sides3" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/myaccount/addressbook">Address Book</a></li>
    </ul>
</div>