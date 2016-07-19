<?php
/* @var $this WalletHistoryController */
/* @var $model WalletHistory */
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
                <h1 style="float: left;" class="title">WalletHistory</h1>
                <p style="float: left;margin-top: 8px;margin-left: 11px;" class="description">Manage WalletHistory</p>
        </div>

        <div class="breadcrumb-env">

                <ol class="breadcrumb bc-1" >
                        <li>
                                <a href="<?php echo Yii::app()->request->baseurl . '/site/home'; ?>"><i class="fa-home"></i>Home</a>
                        </li>

                        <li class="active">

                                <strong>Manage WalletHistory</strong>
                        </li>
                </ol>

        </div>

</div>
<div class="row">


        <div class="col-sm-12">

                <!--<a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/products/walletHistory/create'; ?>" class='btn  btn-laksyah manage'>Add Credit History</a>-->

                <div class="panel panel-default">
                        <?php
                        $this->widget('booster.widgets.TbGridView', array(
                            'type' => ' bordered condensed hover',
                            'id' => 'wallet-history-grid',
                            'dataProvider' => $model->search(),
                            'filter' => $model,
                            'columns' => array(
//            		'id',
                                array('name' => 'user_id',
                                    'type' => 'raw',
                                    'value' => function($data) {

                                            $user_id = UserDetails::model()->findByPk($data->user_id);
                                            if ($data->user_id != 0) {
                                                    return $user_id->first_name . '(USER ID:' . $user_id->id . ')';
                                            } else {
                                                    return 'User Not SPecified';
                                            }
                                    },
                                ),
                                array('name' => 'type_id',
                                    'type' => 'raw',
                                    'value' => function($data) {

                                            $htype = MasterHistoryType::model()->findByPk($data->type_id);
                                            if (!empty($htype)) {
                                                    return $htype->type;
                                            } else {
                                                    return 'Gift card Redeem';
                                            }
                                    },
                                ),
//                                'type_id',
                                'amount',
                                'entry_date',
                                array('name' => 'credit_debit',
                                    'type' => 'raw',
                                    'value' => function($data) {
                                            if ($data->credit_debit == 1) {
                                                    return 'Deposit';
                                            } else if ($data->credit_debit == 2) {
                                                    return 'Withdrawal';
                                            }
                                    },
                                ),
                                array('name' => 'field2',
                                    'type' => 'raw',
//                                    'heading' => 'Status',
                                    'value' => function($data) {
                                            if ($data->field2 == 1) {
                                                    return 'Success';
                                            } else if ($data->field2 == 0) {
                                                    return 'Failed';
                                            }
                                    },
                                ),
//                                'credit_debit',
                                /*
                                  'balance_amt',
                                  'ids',
                                  'field1',
                                  'field2',
                                  'payment_method',
                                  'transaction_id',
                                  'unique_code',
                                 */
                                array(
                                    'htmlOptions' => array('nowrap' => 'nowrap', 'heading' => 'View',
                                    ),
                                    'class' => 'booster.widgets.TbButtonColumn',
                                    'template' => '{view}',
                                ),
                            ),
                        ));
                        ?>
                </div>

        </div>


</div>

