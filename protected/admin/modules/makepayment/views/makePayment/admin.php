<?php
/* @var $this MakePaymentController */
/* @var $model MakePayment */
?>
<style>
        .table th, td{
                text-align: center;
        }
        .table td{
                text-align: center;
        }
</style>


<div class="page-title">

        <div class="title-env">
                <h1 style="float: left;" class="title">MakePayment</h1>
                <p style="float: left;margin-top: 8px;margin-left: 11px;" class="description">Manage MakePayment</p>
        </div>

        <div class="breadcrumb-env">

                <ol class="breadcrumb bc-1" >
                        <li>
                                <a href="<?php echo Yii::app()->request->baseurl . '/site/home'; ?>"><i class="fa-home"></i>Home</a>
                        </li>

                        <li class="active">

                                <strong>Manage MakePayment</strong>
                        </li>
                </ol>

        </div>

</div>
<div class="row">


        <div class="col-sm-12">


                <div class="panel panel-default">
                        <?php
                        $this->widget('booster.widgets.TbGridView', array(
                            'type' => ' bordered condensed hover',
                            'id' => 'make-payment-grid',
                            'dataProvider' => $model->search(),
                            'filter' => $model,
                            'columns' => array(
                                array('name' => 'userid',
                                    'value' => function($data) {
                                            return $data->user->first_name;
                                    },
                                    'type' => 'raw',
                                ),
                                'product_name',
                                'product_code',
                                'message',
                                array('name' => 'amount_type',
                                    'filter' => array('2' => 'Advance Payment', '1' => 'Final', '3' => 'other'),
                                    'value' => function($data) {
                                    if ($data->amount_type == '2') {
                                            return 'Advance Payment';
                                    } elseif ($data->amount_type == '1') {
                                            return 'Final';
                                    } elseif ($data->amount_type == '1') {
                                            return 'other';
                                    } else {
                                            return 'Invalid';
                                    }
                            },
                                ),
                                'amount',
                                array('name' => 'pay_method',
                                    'filter' => array('1' => 'CREDIT/DEBIT/NET BANKING', '2' => 'PAYPAL', '3' => 'VOUCHER'),
                                    'value' => function($data) {
                                    if ($data->pay_method == '1') {
                                            return 'CREDIT/DEBIT/NET BANKING';
                                    } elseif ($data->pay_method == '2') {
                                            return 'PAYPAL';
                                    } elseif ($data->pay_method == '3') {
                                            return 'VOUCHER';
                                    } else {
                                            return 'Invalid';
                                    }
                            },
                                ),
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

