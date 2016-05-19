<section class="content-header">
    <h1>
        User Wallet History                <small>Manage</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php/site/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Manage User Wallet</li>
    </ol>
</section>


<a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/user/userDetails/admin'; ?>" class='btn  btn-laksyah manage'>Return to User Details</a>
<section class="content">
    <div class="box box-info">

        <div class="box-body">
            <div class="form-group">
                <label class="col-sm-2">Name</label> : &nbsp;&nbsp;<span style="text-transform: capitalize;"><?php echo $model->first_name . " " . $model->last_name; ?></span>
            </div>
            <div class="form-group">
                <label class="col-sm-2">Wallet Amount</label> : &nbsp;&nbsp;<?php echo $model->wallet_amt; ?> /-
            </div>
            <div class="nav-tabs-custom">
                <?php
                if(isset($_SESSION['wallet_bag'])) {

                        if($_SESSION['wallet_bag'] == '8') {
                                $active1 = 'active';
                        } else if($_SESSION['wallet_bag'] == '7') {
                                $active2 = 'active';
                        } else {
                                $active = 'active';
                        }
                } else {
                        $active = 'active';
                }
                ?>
                <ul class="nav nav-tabs">
                    <li class="<?php echo $active . " " . $active1 ?>"><a href="#tab_1" data-toggle="tab" aria-expanded="false">Add Money</a></li>
                    <li class="<?php echo $active2 ?>"><a href="#tab_2" data-toggle="tab" aria-expanded="true">Redeem Money</a></li>



                </ul>

                <div class="tab-content">
                    <div class="tab-pane <?php echo $active . " " . $active1 ?>" id="tab_1">

                        <div class="form" style="    margin: 0 auto;margin-bottom: 50px;margin-top: 50px;">

                            <?php
                            $form = $this->beginWidget('CActiveForm', array(
                                'id' => 'wallet-add-form',
                                // 'action' => Yii::app()->createUrl('/user/walletHistory/addwallet'),
                                'htmlOptions' => array('class' => 'form-horizontal'),
                                'enableAjaxValidation' => false,
                            ));
                            ?>
                            <input type="hidden" name="WalletHistory[type_form]" value="2"/>
                            <div class="form-group">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-5">
                                    <?php if(Yii::app()->user->hasFlash('success1')): ?>
                                            <div class="alert alert-success alert-dismissable" style="margin:0 auto;">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <b><i class="icon fa fa-check"></i> Alert ! </b>
                                                <?php echo Yii::app()->user->getFlash('success1'); ?>
                                            </div>

                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <?php echo $form->labelEx($wallet_add, 'amount', array('class' => 'col-sm-3 control-label')); ?>
                                <div class="col-sm-5"><?php echo $form->textField($wallet_add, 'amount', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>

                                    <?php echo $form->error($wallet_add, 'amount', array('style' => 'padding-left:0px;')); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <?php echo $form->labelEx($wallet_add, 'field1', array('class' => 'col-sm-3 control-label')); ?>
                                <div class="col-sm-5"><?php echo $form->textArea($wallet_add, 'field1', array('class' => 'form-control')); ?>

                                    <?php echo $form->error($wallet_add, 'field1', array('style' => 'padding-left:0px;')); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-5">
                                    <?php echo CHtml::submitButton('Add Money', array('class' => 'btn btn-laksyah col-sm-3 pull-right', 'style' => 'margin:0;')); ?>
                                </div></div>





                            <?php $this->endWidget(); ?>

                        </div><!-- form -->
                    </div><!-- /.tab-pane -->
                    <div class="tab-pane <?php echo $active2 ?>" id="tab_2">
                        <div class="form" style="    margin: 0 auto;margin-bottom: 50px;margin-top: 50px;">

                            <?php
                            $redeem = $this->beginWidget('CActiveForm', array(
                                'id' => 'wallet-redeem-form',
                                'htmlOptions' => array('class' => 'form-horizontal'),
                                'enableAjaxValidation' => false,
                            ));
                            ?>
                            <input type="hidden" name="WalletHistory[type_form]" value="1"/>
                            <div class="form-group">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-5">
                                    <?php if(Yii::app()->user->hasFlash('success')): ?>
                                            <div class="alert alert-success alert-dismissable" style="margin:0 auto;">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <b><i class="icon fa fa-check"></i> Alert ! </b>
                                                <?php echo Yii::app()->user->getFlash('success'); ?>
                                            </div>

                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">

                                <?php echo $redeem->labelEx($wallet_redeem, 'type_id', array('class' => 'col-sm-3 control-label')); ?>
                                <div class="col-sm-5"><?php echo $redeem->dropDownlist($wallet_redeem, 'type_id', CHtml::listData(MasterHistoryType::model()->findAllByAttributes(['credit_debit' => 2]), 'id', 'type'), array('empty' => 'Select Type', 'class' => 'form-control')); ?>

                                    <?php echo $redeem->error($wallet_redeem, 'type_id', array('style' => 'padding-left:0px;')); ?>
                                </div>
                            </div>
                            <div class="form-group">

                                <?php echo $redeem->labelEx($wallet_redeem, 'amount', array('class' => 'col-sm-3 control-label')); ?>
                                <div class="col-sm-5"><?php echo $redeem->textField($wallet_redeem, 'amount', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>

                                    <?php echo $redeem->error($wallet_redeem, 'amount', array('style' => 'padding-left:0px;')); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <?php echo $redeem->labelEx($wallet_redeem, 'field1', array('class' => 'col-sm-3 control-label')); ?>
                                <div class="col-sm-5"><?php echo $redeem->textArea($wallet_redeem, 'field1', array('class' => 'form-control')); ?>

                                    <?php echo $redeem->error($wallet_redeem, 'field1', array('style' => 'padding-left:0px;')); ?>
                                </div>
                            </div>
                            <div class="form-group">

                                <?php echo $redeem->labelEx($wallet_redeem, 'ids', array('class' => 'col-sm-3 control-label')); ?>
                                <div class="col-sm-5"><?php echo $redeem->textField($wallet_redeem, 'ids', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>

                                    <?php echo $redeem->error($wallet_redeem, 'ids', array('style' => 'padding-left:0px;')); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-5">
                                    <?php echo CHtml::submitButton('Redeem Money', array('class' => 'btn btn-laksyah col-sm-3 pull-right', 'style' => 'margin:0;')); ?>
                                </div></div>





                            <?php $this->endWidget(); ?>

                        </div><!-- form -->
                    </div><!-- /.tab-pane -->

                </div><!-- /.tab-content -->
            </div>

            <hr>
            <div class="table-responsive">
                <div class="panel panel-default">
                    <?php
                    $this->widget('booster.widgets.TbGridView', array(
                        'type' => ' bordered condensed hover',
                        'id' => 'wallet-history-grid',
                        'dataProvider' => $wallet->search(),
                        'filter' => $wallet,
                        'columns' => array(
                            ['name' => 'type_id',
                                'filter' => CHtml::listData(MasterHistoryType ::model()->findAll(), 'id', 'type'),
                                'value' => function($data) {
                                        return $data->type->type;
                                }],
                            'amount',
                            array(
                                'name' => 'entry_date',
                                'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                    'model' => $wallet,
                                    'attribute' => 'entry_date',
                                    'language' => 'en-GB',
                                    // 'i18nScriptFile' => 'jquery.ui.datepicker-ja.js', (#2)
                                    'htmlOptions' => array(
                                        'class' => 'form-control',
                                        'dateFormat' => 'yy-mm-dd',
                                    ),
                                    'defaultOptions' => array(// (#3)
                                        'showOn' => 'focus',
                                        'dateFormat' => 'yy-mm-dd',
                                        'showOtherMonths' => true,
                                        'selectOtherMonths' => true,
                                        'changeMonth' => true,
                                        'changeYear' => true,
                                    ),
                                    'options' => array(
                                        'dateFormat' => 'yy-mm-dd'
                                    )
                                        ), true), // (#4)
//                                'value' => function($data) {
//                                return date("d-M-Y", strtotime($data->entry_date));
//                        },
                            ),
                            array(
                                'name' => 'credit_debit',
                                'filter' => array('1' => 'Credit', '2' => 'Debit'),
                                'value' => function($data) {
                                return $data->credit_debit == 1 ? 'Credit' : 'Debit';
                        },
                            ),
                            'balance_amt',
                            array(
                                'name' => 'ids',
                                'value' => function($data) {
                                        return $data->ids == 0 ? '' : $data->ids;
                                },
                            ),
                            'field1',
                        /* 'field2',
                         */
                        ),
                    ));
                    ?>
                </div>
            </div>

        </div>

    </div>

</section><!-- form -->