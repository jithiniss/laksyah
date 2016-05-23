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
                    'order_date',
//                    array('name' => 'ship_address_id',
//                        'value' => '$data->addressBook->address_1',
//                    ),
                    'comment',
                    'payment_mode',
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
                                    'title' => 'view',
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
