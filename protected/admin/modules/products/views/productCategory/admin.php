<section class="content-header">
    <h1>
        Product Category

    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php/site/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Product Category</li>
    </ol>
</section>
<a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/products/productCategory/create'; ?>" class='btn  btn-laksyah manage'>Add Product Category</a>
<div class="col-xs-12 form-page">
    <div class="box">
        <div class="box-body table-responsive no-padding">
            <?php
            $this->widget('booster.widgets.TbGridView', array(
                'type' => ' bordered condensed hover',
                'id' => 'product-category-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    //'parent',
                    array(
                        'name' => 'parent',
                        'value' => function($data) {
                                $value = ProductCategory::model()->findByPk($data->parent);
                                return $value->category_name;
                        },
                    ),
                    'category_name',
                    array(
                        'name' => 'description',
                        'value' => function($data) {
                                $contents = str_word_count($data->description);
                                if($contents > 5) {
                                        return substr($data->description, 0, 50);
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
                                        return '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->request->baseUrl . "/uploads/products/category/" . $data->id . "." . $data->image . '" />';
                                }
                        },
                        'type' => 'raw'
                    ),
                    'sort_order',
                    'meta_title',
                    array(
                        'name' => 'meta_description',
                        'value' => function($data) {
                                $contents = str_word_count($data->meta_description);
                                if($contents > 5) {
                                        return substr($data->meta_description, 0, 50);
                                        //return $data->small_content;
                                } else {
                                        return $data->meta_description;
                                }
                        }
                    ),
                    'meta_keywords',
                    array(
                        'name' => 'header_visibility',
                        'value' => function($data) {
                                if($data->header_visibility == 1) {
                                        return "Enabled";
                                } elseif($data->header_visibility == 0) {
                                        return "Disabled";
                                } else {
                                        return "Invalid";
                                }
                        },
                        'filter' => array('1' => "Enabled", '0' => "disabled")
                    ),
                    array(
                        'name' => 'status',
                        'value' => function($data) {
                                if($data->status == 1) {
                                        return "Enabled";
                                } elseif($data->status == 0) {
                                        return "Disabled";
                                } else {
                                        return "Invalid";
                                }
                        },
                        'filter' => array('1' => "Enabled", '0' => "disabled")
                    ),
                    /* 'CB',
                      'UB',
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
