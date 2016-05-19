<section class="content-header">
    <h1>
        Home Sub-Category              <small>Manage</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php/site/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Manage Home Sub-Category   </li>
    </ol>
</section>
<a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/cms/homeSubcategory/create'; ?>" class='btn  btn-laksyah manage'>Add Home Sub-category</a>
<div class="col-xs-12 form-page">
    <div class="box">
        <div class="box-body table-responsive no-padding">
            <?php
            $this->widget('booster.widgets.TbGridView', array(
                'type' => ' bordered condensed hover',
                'id' => 'home-subcategory-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    array(
                        'name' => 'category_id',
                        'filter' => CHtml::listData(HomeCategory::model()->findAll(), 'id', 'category_name'),
                        'value' => '$data->category->category_name',
                    ),
                    'title',
                    array('name' => 'image',
                        'value' => function($data) {
                                if($data->image == '') {
                                        return;
                                } else {
                                        return '<img style="width:100px;height:100px;" src="' . Yii::app()->baseUrl . '/uploads/homesubcategory/' . $data->id . '.' . $data->image . '"';
                                }
                        },
                        'type' => 'raw',
                    ),
                    'link',
                    /*
                      'DOC',
                      'DOU',
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
