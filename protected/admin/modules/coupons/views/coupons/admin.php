<section class="content-header">
    <h1>
        Coupons         <small>Manage</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php/site/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Manage Coupons   </li>
    </ol>
</section>
<a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/coupons/coupons/create'; ?>" class='btn  btn-laksyah manage'>Add Coupons</a>
<div class="col-xs-12 form-page">
    <div class="box">
        <div class="box-body table-responsive no-padding">
            <?php
            $this->widget('booster.widgets.TbGridView', array(
                'type' => ' bordered condensed hover',
                'id' => 'coupons-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    array('name' => 'product_id',
                        'value' => function($data) {
                                $prod = explode(',', $data->product_id);

                                foreach($prod as $prod1) {
                                        $product = Products::model()->findByPk($prod1);
                                        $prod2.=$product->product_name . ',';
                                }

                                return rtrim($prod2, ',');
                        },
                    ),
                    array('name' => 'user_id',
                        'value' => function ($data) {
                                $user = explode(',', $data->user_id);

                                foreach($user as $user1) {
                                        $user2 = UserDetails::model()->findByPk($user1);
                                        $user3.=$user2->first_name . ',';
                                }
                                return rtrim($user3, ',');
                        }
                    ),
                    'cash_limit',
                    'code',
                    'expiry_date',
                    'discount',
                    /*
                      'discount_type',
                      'status',
                     */
                    array(
                        'htmlOptions' => array('nowrap' => 'nowrap'),
                        'class' => 'booster.widgets.TbButtonColumn',
                        'template' => '{update}{delete}',
                    ),
                ),
            ));
            ?>
        </div>
    </div>
</div>
