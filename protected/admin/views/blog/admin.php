<section class="content-header">
        <h1>
                Blog Details                <small>Manage</small>
        </h1>
        <ol class="breadcrumb">
                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php/site/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li class="active">Manage  Blog Details </li>
        </ol>
</section>
<a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/blog/create'; ?>" class='btn  btn-laksyah manage'>Add Blog</a>


<div class="col-xs-12 form-page">
        <div class="box">
                <div class="box-body table-responsive no-padding">
                        <?php
                        $this->widget('booster.widgets.TbGridView', array(
                            'type' => ' bordered condensed hover',
                            'id' => 'blog-grid',
                            'dataProvider' => $model->search(),
                            'filter' => $model,
                            'columns' => array(
                                //'id',
                                'heading',
                                array(
                                    'name' => 'small_image',
                                    'value' => function($data) {
                                            if ($data->small_image == "") {
                                                    return;
                                            } else {
                                                    return '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->request->baseUrl . '/uploads/blog/' . '/' . $data->id . '/' . small . '.' . $data->small_image . '" />';
                                            }
                                    },
                                    'type' => 'raw'
                                ),
                                array(
                                    'name' => 'big_image',
                                    'value' => function($data) {
                                            if ($data->big_image == "") {
                                                    return;
                                            } else {
                                                    return '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->request->baseUrl . '/uploads/blog/' . '/' . $data->id . '/' . big . '.' . $data->big_image . '" />';
                                            }
                                    },
                                    'type' => 'raw'
                                ),
                                array(
                                    'name' => 'small_content',
                                    'value' => function($data) {
                                            $contents = str_word_count($data->small_content);
                                            if ($contents > 5) {
                                                    return substr($data->small_content, 0, 50);
                                            } else {
                                                    return $data->small_content;
                                            }
                                    }
                                ),
                                array(
                                    'name' => 'big_content',
                                    'value' => function($data) {
                                            $contents = str_word_count($data->big_content);
                                            if ($contents > 5) {
                                                    return substr($data->big_content, 0, 100);
                                            } else {
                                                    return $data->big_content;
                                            }
                                    }
                                ),
                                array('name' => 'status',
                                    'filter' => array('1' => 'Enabled', '0' => 'Disabled'),
                                    'value' => function($data) {
                                    if ($data->status == '1') {
                                            return 'Enabled';
                                    } else {
                                            return 'Disabled';
                                    }
                            },
                                ),
                                /*
                                  'meta_keywords',
                                  'meta_title',
                                  'meta_description',

                                  'CB',
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

