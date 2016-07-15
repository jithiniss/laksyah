<section class="content-header">
    <h1>
        Make Payment History

    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php/site/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active"> Payment History</li>
    </ol>
</section>
<div class="col-xs-12 form-page">
    <div class="box">
        <div class="box-body table-responsive no-padding">
            <?php
            $this->widget('booster.widgets.TbGridView', array(
                'type' => ' bordered condensed hover',
                'id' => 'make-payment-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    array(
                        'name' => 'user name',
                        'filter' => CHtml::activeTextField($model, 'user_name', array('class' => 'form-control')),
                        'value' => function($data) {

                        return $data->user->first_name . ' ' . $data->user->last_name;
                },
                        'type' => 'raw',
                    ),
                    array('name' => 'payment_type',
                        'filter' => array('1' => 'Direct Payment', '2' => 'Enquiry Payment'),
                        'value' => function($data) {
                        if($data->status == '1') {
                                return 'Direct Payment';
                        } elseif($data->status == '2') {
                                return 'Enquiry Payment';
                        }
                },
                    ),
                    'product_name',
                    'product_code',
                    'message',
                    array('name' => 'amount_type',
                        'filter' => CHtml::listData(MasterPaymentType::model()->findAll(array('condition' => 'status=1', 'order' => 'sorting asc')), 'id', 'type'),
                        'value' => function($data) {
                        echo MasterPaymentType::model()->findByPk($data->amount_type)->type;
                },
                    ),
                    'other_amount_type',
                    'total_amount',
                    array('name' => 'payment_mode',
                        'filter' => array('1' => 'WALLET', '2' => 'CREDIT/DEBIT/NET BANKING', '3' => 'PAYPAL', '4' => 'WALLET + CREDIT/DEBIT/NET BANKING'),
                        'value' => function($data) {
                        if($data->payment_mode == '1') {
                                return 'WALLET';
                        } elseif($data->payment_mode == '2') {
                                return 'CREDIT/DEBIT/NET BANKING';
                        } elseif($data->payment_mode == '3') {
                                return 'PAYPAL';
                        } elseif($data->payment_mode == '4') {
                                return 'WALLET + CREDIT/DEBIT/NET BANKING';
                        }
                },
                    ),
                    'netbanking', 'paypal', 'wallet',
                    array('name' => 'status',
                        'filter' => array('0' => 'Not Paid', '1' => 'Paid', '2' => 'Failed'),
                        'value' => function($data) {
                        if($data->status == '0') {
                                return 'Not Paid';
                        } elseif($data->status == '1') {
                                return 'Paid';
                        } elseif($data->status == '2') {
                                return 'Failed';
                        }
                },
                    ),
                    'transaction_id',
                    'date',
                    array(
                        'htmlOptions' => array('nowrap' => 'nowrap'),
                        'class' => 'booster.widgets.TbButtonColumn',
                        'template' => '{delete}',
                    ),
                ),
            ));
            ?>
        </div>

    </div>


</div>

