<section class="content-header">
    <h1>
        Products

    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php/site/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active"> Products</li>
    </ol>
</section>
<a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/products/products/create'; ?>" class='btn  btn-laksyah manage'>Add Products</a>
<div class="col-xs-12 form-page">
    <div class="box">
        <div class="box-body table-responsive no-padding">
            <?php
            $this->widget('booster.widgets.TbGridView', array(
                'type' => ' bordered condensed hover',
                'id' => 'products-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
//                    'category_id',
                    array(
                        'name' => 'category_id',
                        'value' => function($data) {
                                $cats = explode(',', $data->category_id);
                                $catt = '';
                                foreach($cats as $cat) {
                                        unset($_SESSION['category']);
                                        $category = ProductCategory::model()->findByPk($cat);
                                        $catt .= Yii::app()->category->selectCategories($category) . ', ';
                                }
                                return $catt;
                        },
                    ),
                    'sku',
                    'product_name',
                    'product_code',
                    'quantity',
                    array(
                        'name' => 'main_image',
                        'value' => function($data) {
                                if($data->main_image == "") {
                                        return;
                                } else {
                                        $folder = Yii::app()->Upload->folderName(0, 1000, $data->id);
                                        return '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->request->baseUrl . '/uploads/products/' . $folder . '/' . $data->id . '/' . $data->id . '.' . $data->main_image . '" />';
                                }
                        },
                        'type' => 'raw'
                    ),
                    array(
                        'name' => 'hover_image',
                        'value' => function($data) {
                                if($data->hover_image == "") {
                                        return;
                                } else {
                                        $folder = Yii::app()->Upload->folderName(0, 1000, $data->id);
                                        return '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->request->baseUrl . '/uploads/products/' . $folder . '/' . $data->id . '/hover/hover.' . $data->hover_image . '" />';
                                }
                        },
                        'type' => 'raw'
                    ),
                    array(
                        'name' => 'video',
                        'value' => function($data) {
                                if($data->video == "") {
                                        return;
                                } else {
                                        //  $folder = Yii::app()->Upload->folderName(0, 1000, $data->id);
                                        //  return '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->request->baseUrl . '/uploads/products/' . $folder . '/' . $data->id . '/videos/videos.' . $data->video . '" />';
                                        echo $data->video;
                                }
                        },
                        'type' => 'raw'
                    ),
                    array(
                        'name' => 'description',
                        'value' => function($data) {
                                $contents = str_word_count($data->description);
                                if($contents > 5) {
                                        return substr($data->description, 0, 50);
                                } else {
                                        return $data->description;
                                }
                        }
                    ),
                    'meta_title',
                    'price',
                    /* 'meta_description',
                      'meta_keywords',
                      'header_visibility',
                      'sort_order',
                      'price',
                      'quantity',
                      'subtract_stock',
                      'requires_shipping',
                      'dimensionl',
                      'dimensionw',
                      'dimensionh',
                      'dimension_class',
                      'weight',
                      'weight_class',
                      'status',
                      'exchange',
                      'related_products',
                      'CB',
                      'UB',
                      'DOC',
                      'DOU',
                     */
                    array(
                        'htmlOptions' => array('nowrap' => 'nowrap'),
                        'class' => 'booster.widgets.TbButtonColumn',
                        'template' => '{update}{delete}{view}',
                    ),
                ),
            ));
            ?>
        </div>
    </div>
</div>
