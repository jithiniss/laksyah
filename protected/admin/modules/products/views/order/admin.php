<section class="content-header">
        <h1>
                Order                <small>Manage</small>
        </h1>
        <ol class="breadcrumb">
                <li><a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/products/order/admin'; ?>"><i class="fa fa-dashboard"></i>  Order</a></li>
                <li class="active">Manage</li>
        </ol>
</section>
<!--<a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/products/order/create'; ?>" class='btn  btn-success manage'>Add Order</a>-->
<div class="col-xs-12 form-page">
        <div class="box">
                <div class="box-body table-responsive no-padding">
                        <?php
                        $this->widget('booster.widgets.TbGridView', array(
                            'type' => ' bordered condensed hover',
                            'id' => 'order-grid',
                            'dataProvider' => $model->search(),
                            'filter' => $model,
                            'columns' => array(
                                array('name' => 'user_id',
                                    //'value' => '$data->user->first_name',
                                    'value' => function($data) {
                                            return'<a href="' . Yii::app()->baseUrl . '/admin.php/masters/UserDetails/view/id/' . $data->user_id . '" target="_blank">' . $data->user->first_name . '</a>';
                                    },
                                    'type' => 'raw',
                                ),
                                array('name' => 'total_amount',
                                    'value' => function($data) {
                                            return 'INR ' . $data->total_amount . '/-';
                                    },
                                ),
                                array('name' => 'payment_mode',
                                    'value' => function($data) {
                                            if ($data->payment_mode == 1) {
                                                    return 'Wallet';
                                            } else if ($data->payment_mode == 2) {
                                                    return 'Netbanking';
                                            } else if ($data->payment_mode == 3) {
                                                    return 'Paypal';
                                            } else if ($data->payment_mode == 4) {
                                                    return 'Wallet, Netbanking';
                                            } else {
                                                    return 'Cash On delivery';
                                            }
//                                            return 'INR ' . $data->payment_status . '/-';
                                    },
                                ),
                                array('name' => 'payment_status',
                                    'value' => function($data) {
                                            if ($data->payment_status == 0) {
                                                    return 'Not paid';
                                            } else if ($data->payment_status == 1) {
                                                    return 'Payment Success';
                                            } else if ($data->payment_status == 2) {
                                                    return 'Payment Failed ';
                                            }
//                                            return 'INR ' . $data->payment_status . '/-';
                                    },
                                ),
                                'transaction_id',
                                array('name' => 'status',
                                    'value' => function($data) {
                                            if ($data->status == 1) {
                                                    return 'Order Placed , Not Delivered to customer';
                                            } else if ($data->status == 2) {
                                                    return 'Order Success';
                                            } else if ($data->payment_status == 3) {
                                                    return 'Order Failed';
                                            } else {
                                                    return 'Order Not Placed';
                                            }
//                                            return 'INR ' . $data->payment_status . '/-';
                                    },
                                ),
                                'order_date',
//                    array('name' => 'ship_address_id',
//                        'value' => '$data->addressBook->address_1',
//                    ),
                                array('name' => 'laksyah_gift',
                                    'value' => function($data) {
                                            if ($data->laksyah_gift == 1) {
                                                    return 'Laksya Gift Card Order';
                                            } else {
                                                    return 'Laksyah Products';
                                            }
//                                            return 'INR ' . $data->payment_status . '/-';
                                    },
                                ),
                                /*
                                  'transaction_id',
                                  'payment_status',
                                 * 'admin_status',
                                  'status',
                                  'DOC',
                                 */
                                array(
                                    'htmlOptions' => array('nowrap' => 'nowrap'),
                                    'class' => 'booster.widgets.TbButtonColumn',
                                    'template' => '{update}{delete}{view}{status}{print}',
                                    'buttons' => array(
                                        'status' => array(
                                            'url' => 'Yii::app()->request->baseUrl."/admin.php/products/orderHistory/create/id/$data->id"',
                                            'label' => '<i class="fa fa-truck" style="font-size:20px;padding:2px;"></i>',
                                            'options' => array(
                                                'data-toggle' => 'tooltip',
                                                'title' => 'History',
                                                'target' => '_blank',
                                            ),
                                        ),
                                        'print' => array(
                                            'url' => 'Yii::app()->request->baseUrl."/admin.php/products/order/print/id/$data->id"',
                                            'label' => '<i class="fa fa-print" style="font-size:20px;padding:2px;"></i>',
                                            'options' => array(
                                                'data-toggle' => 'tooltip',
                                                'title' => 'Print',
                                                'target' => '_blank',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ));
                        ?>
                </div>
        </div>
</div>
