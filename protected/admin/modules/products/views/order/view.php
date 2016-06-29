<section class="content-header">
        <h1>View Order #<?php echo $model->id; ?></h1>
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
                        $this->widget('booster.widgets.TbDetailView', array(
                            'data' => $model,
                            'attributes' => array(
//                    'id',
                                array('name' => 'user_id',
                                    'value' => function($data) {
                                            return $data->user->first_name;
                                    },
                                ),
                                array('name' => 'total_amount',
                                    'value' => function($data) {
                                            return 'INR ' . $data->total_amount . '/-';
                                    },
                                ),
                                'order_date',
                                array('name' => 'ship_address_id',
                                    'type' => 'raw',
                                    'value' => function($data) {
                                            $shipp_add = UserAddress::model()->findByPk($data->ship_address_id);
                                            $result .= $shipp_add->first_name . ' ' . $shipp_add->last_name . '<br />';
                                            $result .= $shipp_add->address_1 . ' ' . $shipp_add->address_2 . '<br />';
                                            $result .= $shipp_add->city . ' ' . $shipp_add->postcode . '<br />';
                                            $result .= Countries::model()->findByPk($shipp_add->country)->country_name . ' ' . States::model()->findByPk($shipp_add->state)->state_name . '<br />';
                                            return $result;
                                    },
                                ),
                                array('name' => 'bill_address_id',
                                    'type' => 'raw',
                                    'value' => function($data) {

                                            $bill_add = UserAddress::model()->findByPk($data->bill_address_id);
                                            $result1 .= $bill_add->first_name . ' ' . $bill_add->last_name . '<br />';
                                            $result1 .= $bill_add->address_1 . ' ' . $bill_add->address_2 . '<br />';
                                            $result1 .= $bill_add->city . ' ' . $bill_add->postcode . '<br />';
                                            $result1 .= Countries::model()->findByPk($bill_add->country)->country_name . ' ' . States::model()->findByPk($bill_add->state)->state_name . '<br />';
                                            return $result1;
                                    },
                                ),
                                'comment',
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
                                'admin_comment',
                                'transaction_id',
                                array('name' => 'payment_status',
                                    'value' => function($data) {
                                            if ($data->payment_status == 1) {
                                                    return 'Success';
                                            } else if ($data->payment_status == 2) {
                                                    return 'Failed Transaction';
                                            } else {
                                                    return 'Not Paid';
                                            }
//                                            return 'INR ' . $data->payment_status . '/-';
                                    },
                                ),
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
//                    'DOC',
                            ),
                        ));
                        ?>


                        <section class="content-header">
                                <h1>Order History</h1>
                        </section>


                        <?php
                        $this->widget('booster.widgets.TbGridView', array(
                            'type' => ' bordered condensed hover',
                            'id' => 'order-products-grid',
                            'dataProvider' => $history->search(),
                            //'filter' => $products,
                            'columns' => array(
                                'date',
                                array('name' => 'status',
//                        'filter' => CHtml::listData(Products::model()->findAll(), 'id', 'product_name'),
                                    'value' => function($data) {
                                            return OrderStatus::model()->findByPk($data->order_status)->title . ' ' . OrderStatus::model()->findByPk($data->order_status)->description;
                                    },
                                    'type' => 'raw',
                                ),
                                'order_status_comment',
                                array('name' => 'shipping_type',
//                        'filter' => CHtml::listData(Products::model()->findAll(), 'id', 'product_name'),
                                    'value' => function($data) {
                                            return OrderStatus::model()->findByPk($data->shipping_type)->shipping_type;
                                    },
                                    'type' => 'raw',
                                ),
                                'tracking_id',
                                array(
                                    'htmlOptions' => array('nowrap' => 'nowrap'),
                                    'class' => 'booster.widgets.TbButtonColumn',
                                    'template' => '',
                                ),
                            ),
                        ));
                        ?>
                        <?php if ($data->laksyah_gift == 1) { ?>
                                <div id="order-products-grid" class="grid-view">
                                        <div class="summary">Displaying 1-1 of 1 result.</div>
                                        <table class="items table table-bordered table-condensed table-hover">
                                                <thead>
                                                        <tr>
                                                                <th id="order-products-grid_c0"><a class="sort-link" href="/admin.php/products/order/view/id/446/OrderHistory_sort/date">Date <span class="caret"></span></a></th><th id="order-products-grid_c1"><a class="sort-link" href="/admin.php/products/order/view/id/446/OrderHistory_sort/status">Status <span class="caret"></span></a></th><th id="order-products-grid_c2"><a class="sort-link" href="/admin.php/products/order/view/id/446/OrderHistory_sort/order_status_comment">Order Status Comment <span class="caret"></span></a></th><th id="order-products-grid_c3"><a class="sort-link" href="/admin.php/products/order/view/id/446/OrderHistory_sort/shipping_type">Shipping Type <span class="caret"></span></a></th><th id="order-products-grid_c4"><a class="sort-link" href="/admin.php/products/order/view/id/446/OrderHistory_sort/tracking_id">Tracking <span class="caret"></span></a></th><th class="button-column" id="order-products-grid_c5">&nbsp;</th></tr>
                                                </thead>
                                                <tbody>
                                                        <tr class="odd">
                                                                <td>2016-06-28 13:19:11</td><td>vvvv vvvvv</td><td>Order Placed</td><td>&nbsp;</td><td>0</td><td nowrap="nowrap"></td></tr>
                                                </tbody>
                                        </table>
                                        <div class="keys" style="display:none" title="/admin.php/products/order/view/id/446"><span>31</span></div>
                                </div>
                        <?php } else { ?>
                                <section class="content-header">
                                        <h1>Products</h1>
                                </section>
                                <?php
                                $this->widget('booster.widgets.TbGridView', array(
                                    'type' => ' bordered condensed hover',
                                    'id' => 'order-products-grid',
                                    'dataProvider' => $products->search(),
                                    //'filter' => $products,
                                    'columns' => array(
//		'order_id',
                                        array('name' => 'product_id',
//                        'filter' => CHtml::listData(Products::model()->findAll(), 'id', 'product_name'),
                                            'value' => function($data) {
                                                    return '<a href="' . Yii::app()->baseUrl . '/admin.php/products/products/view/id/' . $data->product_id . '" target="_blank">' . $data->product->product_name . '</a>';
                                            },
                                            'type' => 'raw',
                                        ),
                                        array('name' => 'Product Code',
//                        'filter' => CHtml::listData(Products::model()->findAll(), 'id', 'product_name'),
                                            'value' => function($data) {
                                                    return $data->product->product_code;
                                            },
                                            'type' => 'raw',
                                        ),
                                        array('name' => 'Product Options',
//                        'filter' => CHtml::listData(Products::model()->findAll(), 'id', 'product_name'),
                                            'value' => function($data) {
                                                    if ($data->option_id != 0) {
                                                            $option_details = OptionDetails::model()->findByPk($data->option_id);
                                                            if ($option_details->color_id != 0) {
                                                                    return 'Color : ' . OptionCategory::model()->findByPk($option_details->color_id)->color_name . '(' . OptionCategory::model()->findByPk($option_details->color_id)->color_code . ')';
                                                            }
                                                            if ($option_details->size_id != 0) {
                                                                    return 'Size : ' . OptionCategory::model()->findByPk($option_details->size_id)->size;
                                                            }
                                                    } else {
                                                            return 'No Product Options are Mentioned';
                                                    }
                                                    //return OrderStatus::model()->findByPk($data->shipping_type)->shipping_type;
                                            },
                                            'type' => 'raw',
                                        ),
                                        'quantity',
                                        array('name' => 'amount',
                                            'value' => function($data) {
                                                    return 'INR ' . $data->amount . '/-';
                                            }
                                        ),
//		'status',
                                        array(
                                            'htmlOptions' => array('nowrap' => 'nowrap'),
                                            'class' => 'booster.widgets.TbButtonColumn',
                                            'template' => '',
                                        ),
                                    ),
                                ));
                                ?>
                        <?php } ?>
                </div>
        </div>
</div>