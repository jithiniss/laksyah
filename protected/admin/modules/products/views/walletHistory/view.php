<?php
/* @var $this WalletHistoryController */
/* @var $model WalletHistory */

$this->breadcrumbs = array(
    'Wallet Histories' => array('index'),
    $model->id,
);

$this->menu = array(
//	array('label'=>'List WalletHistory', 'url'=>array('index')),
//	array('label'=>'Create WalletHistory', 'url'=>array('create')),
//	array('label'=>'Update WalletHistory', 'url'=>array('update', 'id'=>$model->id)),
//	array('label'=>'Delete WalletHistory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
    array('label' => 'View All Wallet History', 'url' => array('admin')),
);
?>

<h1>View Credit History #<?php echo $model->id; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
//        'id',
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
//        'user_id',
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
        'balance_amt',
        array('name' => 'Purchased Reference Id',
            'type' => 'raw',
//            'title' => 'Status',
            'value' => function($data) {
                    if ($data->ids != 0) {
                            return $data->ids;
                    } else {
                            return 'No Referance Id Found';
                    }
            },
        ),
        'field1',
        array('name' => 'Status',
            'type' => 'raw',
//            'title' => 'Status',
            'value' => function($data) {
                    if ($data->field1 == 1) {
                            return 'Success';
                    } else if ($data->field1 == 0) {
                            return 'Failed';
                    }
            },
        ),
        array('name' => 'Payment Method',
            'type' => 'raw',
//            'title' => 'Status',
            'value' => function($data) {
                    if ($data->payment_method != 0) {
                            return $data->payment_method;
                    } else {
                            return 'No Payment Method is Found';
                    }
            },
        ),
        array('name' => 'Gift Card Code',
            'type' => 'raw',
//            'title' => 'Status',
            'value' => function($data) {
                    if ($data->transaction_id != 0) {
                            return $data->transaction_id;
                    } else {
                            return 'No Transaction ID is Found';
                    }
            },
        ),
        array('name' => 'Gift Card Code',
            'type' => 'raw',
//            'title' => 'Status',
            'value' => function($data) {
                    if ($data->unique_code != "") {
                            return $data->unique_code;
                    }
            },
        ),
    ),
));
?>
