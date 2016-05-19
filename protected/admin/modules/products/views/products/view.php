<section class="content-header">
    <h1>View Products #<?php echo $model->id; ?></h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/products/products/admin'; ?>"><i class="fa fa-dashboard"></i>  Products</a></li>
        <li class="active">Manage</li>
    </ol>
</section>

<div class="col-xs-12 form-page">
    <div class="box">
        <div class="box-body table-responsive no-padding">
            <?php
            $this->widget('booster.widgets.TbDetailView', array(
                'data' => $model,
                'attributes' => array(
//                    'id',
                    array(
                        'name' => 'category_id',
                        'value' => function($data) {
                                $cats = explode(',', $data->category_id);
                                $catt = '';
                                foreach ($cats as $cat) {
                                        unset($_SESSION['category']);
                                        $category = ProductCategory::model()->findByPk($cat);
                                        $catt .= Yii::app()->category->selectCategories($category) . ', ';
                                }
                                return $catt;
                        },
                    ),
                    array(
                        'name' => 'main_image',
                        'value' => function($data) {
                                if ($data->main_image == "") {
                                        return;
                                } else {
                                        $folder = Yii::app()->Upload->folderName(0, 1000, $data->id);
                                        return '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->request->baseUrl . '/uploads/products/' . $folder . '/' . $data->id . '/' . $data->id . '.' . $data->main_image . '" />';
                                }
                        },
                        'type' => 'raw'
                    ),
                    'gallery_images',
                    'description',
                    'meta_title',
                    'meta_description',
                    'meta_keywords',
                    'header_visibility',
                    'sort_order',
                    'price',
                    'quantity',
                    'subtract_stock',
                    'discount',
                    array('name' => 'discount_type',
                        'value' => function($data) {
                                if ($data->discount_type == 1) {

                                        return"Fixed";
                                } elseif ($data->discount_type == 0) {
                                        return"Classic";
                                } else {
                                        return"Invalid data...";
                                }
                        },
                    ),
                    'discount_rate',
                    'requires_shipping',
                    'dimensionl',
                    'dimensionw',
                    'dimensionh',
                    'dimension_class',
                    'weight',
                    'weight_class',
                    array(
                        'name' => 'status',
                        'value' => function($data) {
                                if ($data->status == 1) {
                                        return "Enabled";
                                } elseif ($data->status == 0) {
                                        return "Disabled";
                                } else {
                                        return "Invalid";
                                }
                        },
                        'filter' => array('1' => "Enabled", '0' => "disabled")
                    ),
                    'related_products',
//                    'CB',
//                    'UB',
//                    'DOC',
//                    'DOU',
                ),
            ));
            ?>
        </div>
    </div>
</div>