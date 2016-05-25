<div class="container main_container inner_pages ">
    <div class="breadcrumbs"> <a href="#">HOME</a> <span>/</span> <a href="#">My Account</a> <span>/</span>   Make a Payment </div>
    <div class="row">
        <div class="col-sm-3 sidebar">
            <h3 class="side_nav_toggle"><i class="fa fa-align-justify "></i>My Account</h3>
            <div class="cat_nav">
                <ul class="catmenu">
                    <li><a href="#">My Profile</a></li>
                    <li> <a href="#">My Credit</a></li>
                    <li> <a href="#">Address Book</a></li>
                    <li> <a href="#">My Orders</a></li>
                    <li> <a href="#">My Wishlist</a></li>
                    <li> <a href="#">Measurement</a></li>
                    <li> <a href="#">Make a Payment</a></li>
                    <li> <a href="#">Track My Order</a></li>
                </ul>
            </div>
        </div>
        <!-- / Sidebar-->
        <div class="col-sm-9 user_content">
            <a class="account_link pull-right" href="<?php echo Yii::app()->baseUrl; ?>/index.php/AddCredit">Add Credit Money</a>
            <h1>My Credit <span><?php echo Yii::app()->Currency->convert(Yii::app()->session['user']['wallet_amt']); ?></span></h1>
            <!--<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Success </div>-->
            <div class="border_box">
                <?php if(!empty($history)) { ?>
                        <div class="row header_row">
                            <div class="col-xs-4">Description</div>
                            <div class="col-xs-3">WITHDRAWAL</div>
                            <div class="col-xs-3">DEPOSIT</div>
                            <div class="col-xs-2">Status</div>

                        </div>
                        <?php foreach($history as $credit_history) { ?>


                                <div class="row">
                                    <div class="col-xs-4 col-mob-8">
                                        <p><strong><?php echo $credit_history->type->type; ?></strong></p>
                                        <?php if($credit_history->ids != "" && $credit_history->ids != 0) { ?>
                                                <p>Order Id: <?php echo $credit_history->ids; ?></p>
                                        <?php } ?>
                                        <p> <?php echo date('d/m/Y - g:i:s A', strtotime(date($credit_history->entry_date))); ?></p>
                                        <?php if($credit_history->field1 != "") { ?>
                                                <p style="margin-top: 10px;text-align: justify"><span style="font-weight: bold;">Message </span>: <?php echo $credit_history->field1; ?></p>
                                        <?php } ?>
                                    </div>
                                    <div class="col-mob-4">
                                        <p><strong>+ ₹ 2000</strong></p>
                                        <p>
                                            <?php if($credit_history->field2 == 1) { ?>
                                                    <span class="label label-success">Success</span>
                                            <?php } else if($credit_history->field2 == 0) {
                                                    ?>
                                                    <span class="label label-warning">Failed</span>
                                            <?php }
                                            ?>
                                        </p>
                                    </div>
                                    <div class="col-xs-3 hidden-mobile">
                                        <?php if($credit_history->credit_debit == 2) { ?>

                                                <p><?php echo Yii::app()->Currency->convert($credit_history->amount); ?></p>
                                        <?php } ?>
                                    </div>
                                    <div class="col-xs-3 hidden-mobile">
                                        <?php if($credit_history->credit_debit == 1) { ?>
                                                <?php echo Yii::app()->Currency->convert($credit_history->amount); ?>
                                        <?php } ?>
                                    </div>
                                    <div class="col-xs-2 hidden-mobile">
                                        <?php if($credit_history->field2 == 1) { ?>
                                                <p>Success</p>
                                        <?php } else if($credit_history->field2 == 0) {
                                                ?>
                                                <p>Failed</p>
                                        <?php }
                                        ?>
                                    </div>

                                </div>
                                <?php
                        }
                } else {
                        ?>
                        <div class="row">
                            <div class="col-xs-12 col-mob-12">
                                <p><strong>Payment for Order</strong></p>
                            </div></div>
                        <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>