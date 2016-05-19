<section class="content-header">
    <h1>
        Product Option Category

    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php/site/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Product Option Category</li>
    </ol>
</section>

<a class="btn btn-laksyah" href="<?php echo Yii::app()->request->baseurl . '/admin.php/products/optionCategory/create'; ?>" id="add-note">Add Option Category</a>
<div class="col-xs-12 form-page">
    <div class="box">
        <div class="box-body table-responsive no-padding">
            <?php
            $this->widget('booster.widgets.TbGridView', array(
                'type' => ' bordered condensed hover',
                'id' => 'option-category-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    array(
                        'name' => 'option_type_id',
                        'value' => '$data->optionType->type',
                        'filter' => CHtml::listData(OptionType::model()->findAll(['condition' => 'field1=1']), 'id', 'type')
                    ),
                    'color_name',
                    'color_code',
                    'size',
                    /* 'status',

                      'field1',
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

