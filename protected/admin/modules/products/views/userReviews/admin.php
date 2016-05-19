<section class="content-header">
    <h1>
        UserReviews                <small>Manage</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/products/userReviews/admin'; ?>"><i class="fa fa-dashboard"></i>  UserReviews</a></li>
        <li class="active">Manage</li>
    </ol>
</section>
<a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/products/userReviews/create'; ?>" class='btn  btn-success manage'>Add UserReviews</a>
<div class="col-xs-12 form-page">
    <div class="box">
        <div class="box-body table-responsive no-padding">
            <?php
            $this->widget('booster.widgets.TbGridView', array(
                'type' => ' bordered condensed hover',
                'id' => 'user-reviews-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    array('name' => 'user_id',
//                        'filter' => CHtml::listData(Products::model()->findAll(), 'id', 'product_name'),
                        'value' => function($data) {
                                //return '<a href="' . Yii::app()->baseUrl . '/admin.php/products/products/view/id/' . $data->product_id . '" target="_blank">' . $data->product->product_name . '</a>';
                                return $data->user->first_name;
                        },
                        'type' => 'raw',
                    ),
                    'guest_user',
                    array(
                        'name' => 'user_image',
                        'value' => function($data) {
                                if ($data->user_image == "") {
                                        return '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->request->baseUrl . "/uploads/review-image/no_image .jpg" . '" />';
                                }
                                else {
                                        return '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->request->baseUrl . "/uploads/review-image/" . $data->id . "." . $data->user_image . '" />';
                                }
                        },
                        'type' => 'raw'
                    ),
                    array('name' => 'product_id',
//                        'filter' => CHtml::listData(Products::model()->findAll(), 'id', 'product_name'),
                        'value' => function($data) {
                                //return '<a href="' . Yii::app()->baseUrl . '/admin.php/products/products/view/id/' . $data->product_id . '" target="_blank">' . $data->product->product_name . '</a>';
                                return $data->product->product_name;
                        },
                        'type' => 'raw',
                    ),
                    'review',
//                    'approvel',
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
