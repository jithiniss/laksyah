<?php
/* @var $this MakePaymentController */
/* @var $model MakePayment */
/* @var $form CActiveForm */
?>
<style>
    .normal{
        height:40px;
        width: 426px;
        margin-left: 442px;
    }
    .form_make{
        margin-left: 198px;
    }
</style>
<div class="container main_container inner_pages ">
    <div class="breadcrumbs"> <a href="#">HOME</a> <span>/</span> <a href="<?= Yii::app()->baseUrl; ?>/index.php/Myaccount">My Account</a> <span>/</span> Wallet </div>
    <div class="row">
        <?php echo $this->renderPartial('_menu'); ?>
        <div class="col-sm-9 user_content"> <a class="account_link pull-right" href="#">Credit History</a>
            <h1>Add Money to Wallet</h1>
            <div class="border-bottom">
                <div class="clearfix"></div>
                <?php if (Yii::app()->user->hasFlash('success')): ?>
                        <div class="alert alert-success">
                            <strong>Success!</strong> <?php echo Yii::app()->user->getFlash('success'); ?>
                        </div>
                <?php endif; ?>
                <?php if (Yii::app()->user->hasFlash('notice')): ?>
                        <div class="alert alert-danger">
                            <strong>Notice!</strong> <?php echo Yii::app()->user->getFlash('notice'); ?>
                        </div>
                <?php endif; ?>
            </div>
            <form action="<?= Yii::app()->baseUrl; ?>/index.php/Myaccount/CardToWallet" method="post">
                <div class="registration_form">
                    <div class="row">
                        <div class="col-sm-3">
                            <label>Card Id</label>
                        </div>
                        <div class="col-sm-8 col-md-6">
                            <input type="text" class="form-control" name="card_id" id="card_id">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form_button">
                            <strong>
                                <input type="submit" name="card_submit" value="continue" class="btn btn-success pos btn-primary">
                            </strong>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</div>

<!-- form -->
<!--<script  src="http://code.jquery.com/jquery.min.js"></script>-->
<script type="text/javascript">
        $(document).ready(function () {
            $('#credit').on('change', function () {
                var credit = $("#credit").val();
                var cred = credit
                .00;
                var wallet_amt = $("#wallet_amt").val();
                if (cred > wallet_amt) {
                    alert("Your Amount greater than available balance");
                } else {
                    var balance = wallet_amt - cred;
                    document.getElementById("balance").innerHTML = balance;
                }
            });
        });
</script>
