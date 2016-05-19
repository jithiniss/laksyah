<section class="content-header">
    <h1>
        OrderProducts                <small>Manage</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/products/orderProducts/admin'; ?>"><i class="fa fa-dashboard"></i>  OrderProducts</a></li>
        <li class="active">Manage</li>
    </ol>
</section>
<a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/products/orderProducts/create'; ?>" class='btn  btn-success manage'>Add OrderProducts</a>
<div class="col-xs-12 form-page">
    <div class="box">
        <div class="box-body table-responsive no-padding">
            <?php
            $this->widget('booster.widgets.TbGridView', array(
                'type' => ' bordered condensed hover',
                'id' => 'order-products-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
//		'order_id',
                    array('name' => 'product_id',
//                        'filter' => CHtml::listData(Products::model()->findAll(), 'id', 'product_name'),
                        'value' => function($data) {
                                return '<a href="' . Yii::app()->baseUrl . '/admin.php/products/products/view/id/' . $data->product_id . '" target="_blank">' . $data->product->product_code . '</a>';
                        },
                        'type' => 'raw',
                    ),
                    'quantity',
                    array('name' => 'amount',
                        'value' => function($data) {
                                return 'INR ' . $data->amount . '/-';
                        }
                    ),
                    'DOC',
//		'status',
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
