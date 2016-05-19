<section class="content-header">
    <h1>
        Product Options

    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php/site/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Product Options</li>
    </ol>
</section>



<div class="col-sm-12">

    <a class="btn btn-laksyah" href="<?php echo Yii::app()->request->baseurl . '/admin.php/products/masterOptions/create'; ?>" id="add-note">
        Add Product Options
    </a>
    <div class="col-xs-12 form-page">
        <div class="box">
            <div class="box-body table-responsive no-padding">
                <?php
                $this->widget('booster.widgets.TbGridView', array(
                    'type' => ' bordered condensed hover',
                    'id' => 'master-options-grid',
                    'dataProvider' => $model->search(),
                    'filter' => $model,
                    'columns' => array(
                        array(
                            'name' => 'product_id',
                            'value' => '$data->product->product_name',
                            'filter' => CHtml::listData(Products::model()->findAll(['condition' => 'status=1']), 'id', 'product_name')
                        ),
                        array(
                            'name' => 'option_type_id',
                            'value' => '$data->optionType->type',
                            'filter' => CHtml::listData(OptionType::model()->findAll(['condition' => 'field1=1']), 'id', 'type')
                        ),
                        array(
                            'htmlOptions' => array('nowrap' => 'nowrap'),
                            'class' => 'booster.widgets.TbButtonColumn',
                            'template' => '{update}{delete}',
                            'buttons' => array(
                                'update' => array(
                                    'url' => 'Yii::app()->request->baseUrl . "/admin.php/products/masterOptions/OptionDetails/id/" . $data->id',
                                    'label' => '<i class="glyphicon glyphicon-pencil" style="font-size: 20px;"> </i>',
                                    'options' => array(
                                        'data-toggle' => 'tooltip',
                                        'title' => 'update',
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
</div>

