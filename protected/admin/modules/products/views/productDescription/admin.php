<section class="content-header">
    <h1>
        Product Description

    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php/site/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active"> Product Description</li>
    </ol>
</section>
<a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/products/productDescription/create'; ?>" class='btn  btn-laksyah manage'>Add Product Description</a>
<div class="col-xs-12 form-page">
    <div class="box">
        <div class="box-body table-responsive no-padding">
            <?php
            $this->widget('booster.widgets.TbGridView', array(
                'type' => ' bordered condensed hover',
                'id' => 'product-description-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    'product_id',
                    'title',
                    array(
                        'name' => 'description',
                        'value' => function($data) {
                                $contents = str_word_count($data->description);
                                if($contents > 5) {
                                        return substr($data->description, 0, 100);
                                        //return $data->small_content;
                                } else {
                                        return $data->description;
                                }
                        }
                    ),
                    array(
                        'name' => 'image',
                        'value' => function($data) {
                                if($data->image == "") {
                                        return;
                                } else {

                                        return '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->request->baseUrl . '/uploads/products/description/' . $data->id . '.' . $data->image . '" />';
                                }
                        },
                        'type' => 'raw'
                    ),
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
