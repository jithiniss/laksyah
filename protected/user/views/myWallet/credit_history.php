<div class="container main_container inner_pages ">
        <div class="breadcrumbs"> <?php echo CHtml::link('HOME', array('site/index')); ?><span>/</span> <?php echo CHtml::link('My Account', array('Myaccount/index')); ?>  <span>/</span>   My Credit </div>
        <div class="row">
                <?php echo $this->renderPartial('//myaccount/_menu'); ?>
                <!-- / Sidebar-->
                <div class="col-sm-9 user_content">
                        <?php echo CHtml::link(' <span class="account_link pull-right">Redeem Your Gift Card</span>', array('MyWallet/index')); ?>
                        <h1>My Credit &nbsp;<?php echo Yii::app()->Currency->convert(Yii::app()->session['user']['wallet_amt']); ?></h1>
                        <!--<div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                Success </div>-->
                        <div class="border_box">
                                <?php if (!empty($history)) { ?>
                                        <div class="row header_row">
                                                <div class="col-xs-4">Description</div>
                                                <!--<div class="col-xs-3">WITHDRAWAL</div>-->
                                                <div class="col-xs-4">DEPOSIT</div>
                                                <div class="col-xs-4">Status</div>

                                        </div>
                                        <?php foreach ($history as $credit_history) { ?>


                                                <div class="row">
                                                        <div class="col-xs-4 col-mob-8">
                                                                <p><strong><?php echo $credit_history->type->type; ?></strong></p>
                                                                <?php if ($credit_history->ids != "" && $credit_history->ids != 0) { ?>
                                                                        <p>Order Id: <?php echo $credit_history->ids; ?></p>
                                                                <?php } ?>
                                                                <p> <?php echo date('d/m/Y - g:i:s A', strtotime(date($credit_history->entry_date))); ?></p>
                                                                <?php if ($credit_history->field1 != "") { ?>
                                                                        <p style="margin-top: 10px;text-align: justify"><span style="font-weight: bold;">Message </span>: <?php echo $credit_history->field1; ?></p>
                                                                <?php } ?>
                                                        </div>
                                                        <div class="col-mob-4">
                                                                <p><strong>+ ₹ 2000</strong></p>
                                                                <p>
                                                                        <?php if ($credit_history->field2 == 1) { ?>
                                                                                <span class="label label-success" style="font-size: 90%;">Success</span>
                                                                        <?php } else if ($credit_history->field2 == 0) {
                                                                                ?>
                                                                                <span class="label label-warning" style="font-size: 90%;">Failed</span>
                                                                        <?php }
                                                                        ?>
                                                                </p>
                                                        </div>
                                                       <!-- <div class="col-xs-3 hidden-mobile">
                                                                <?php if ($credit_history->credit_debit == 2) { ?>

                                                                        <p><?php echo Yii::app()->Currency->convert($credit_history->amount); ?></p>
                                                                <?php } ?>
                                                        </div>-->
                                                        <div class="col-xs-4 hidden-mobile">
                                                                <?php if ($credit_history->credit_debit == 1) { ?>
                                                                        <?php echo Yii::app()->Currency->convert($credit_history->amount); ?>
                                                                <?php } ?>
                                                        </div>
                                                        <div class="col-xs-4 hidden-mobile">
                                                                <?php if ($credit_history->field2 == 1) { ?>
                                                                        <span class="label label-success" style="font-size: 90%;">Success</span>
                                                                <?php } else if ($credit_history->field2 == 0) {
                                                                        ?>
                                                                        <span class="label label-warning" style="font-size: 90%;">Failed</span>
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
                                                        <p><strong>No Credit History</strong></p>
                                                </div></div>
                                        <?php
                                }
                                ?>
                        </div>
                </div>
        </div>
</div>