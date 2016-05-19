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
                    array('name' => 'address_book_id',
                        'value' => function($data) {

                                return $data->addressBook->address_1;
                        },
                    ),
                    array('name' => 'address_book_id',
                        'value' => function($data) {

                                return $data->addressBook->address_2;
                        },
                    ),
                    'comment',
                    'payment_mode',
                    'admin_comment',
                    'transaction_id',
                    'payment_status',
                    array('name' => 'status',
                    ),
//                    'DOC',
                ),
            ));
            ?>
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
        </div>
    </div>
</div>