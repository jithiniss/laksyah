<section class="content-header">
        <h1>
                Product Mail Template

        </h1>
        <ol class="breadcrumb">
                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php/site/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li class="active"> Product Mail Template</li>
        </ol>
</section>
<a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/productMailTemplate/create'; ?>" class='btn  btn-laksyah manage'>Add Product Mail Template</a>
<div class="col-xs-12 form-page">
        <div class="box">
                <div class="panel panel-default">
                        <?php
                        $this->widget('booster.widgets.TbGridView', array(
                            'type' => ' bordered condensed hover',
                            'id' => 'product-mail-template-grid',
                            'dataProvider' => $model->search(),
                            'filter' => $model,
                            'columns' => array(
                                array('name' => 'product_id',
//                        'filter' => CHtml::listData(Products::model()->findAll(), 'id', 'product_name'),
                                    'value' => function($data) {
                                            //return '<a href="' . Yii::app()->baseUrl . '/admin.php/products/products/view/id/' . $data->product_id . '" target="_blank">' . $data->product->product_name . '</a>';
                                            return $data->product->product_name;
                                    },
                                    'type' => 'raw',
                                ),
                                'title',
                                'content',
                                /*
                                  'doc',
                                  'dou',
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
