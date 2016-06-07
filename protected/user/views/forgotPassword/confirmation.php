<div class="clearfix"></div>



<div class="container login">
    <div class="row">


        <div class="col-md-12 pickle-space">
            <div class="row">
                <h1>Check Confirmation Details</h1>
                <div class="col-md-4 col-md-offset-4 forward">
                    <div class="row">
                        <table border="2">
                            <tr><td>Name:</td><td><?php echo $model->first_name; ?></td></tr>
                            <tr><td>Email:</td><td><?php echo $model->email; ?></td></tr>
                            <tr><td>Phone1:</td><td><?php echo $model->phone_no_1; ?></td></tr>
                            <tr><td>Phone2:</td><td><?php echo $model->phone_no_2; ?></td></tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        Click this link if your details are correct=><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/ForgotPassword/mail/id/<?php echo $model->id; ?>"><input type="button" value="proceed" name="submit"></a>
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/border.png" class="img-responsive design"/> </div>
</div>





