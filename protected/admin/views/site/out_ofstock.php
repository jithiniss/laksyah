<div class="col-md-6">
        <div class="box">
                <div class="box-header">

                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                        <?php
                        $this->widget('booster.widgets.TbGridView', array(
                            'type' => ' bordered condensed hover',
                            'id' => 'products-grid',
                            'dataProvider' => $model,
                            'filter' => $model,
                            'columns' => array(
//                    'category_id',
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
                                'product_name',
                                'product_code',
                                'quantity',
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
                                array(
                                    'name' => 'hover_image',
                                    'value' => function($data) {
                                            if ($data->hover_image == "") {
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
                                            if ($data->video == "") {
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
                                            if ($contents > 5) {
                                                    return substr($data->description, 0, 50);
                                            } else {
                                                    return $data->description;
                                            }
                                    }
                                ),
                                'meta_title',
                                'price',
                            ),
                        ));
                        ?>
                </div><!-- /.box-body -->
        </div><!-- /.box -->


</div>

