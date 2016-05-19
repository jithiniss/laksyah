<section class="content-header">
    <h1>
        Static Pages               <small>Manage</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php/site/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Manage Static Pages </li>
    </ol>
</section>

<a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/cms/staticPage/create'; ?>" class='btn  btn-laksyah manage'>Add Pages</a>
<div class="col-xs-12 form-page">
    <div class="box">
        <div class="box-body table-responsive no-padding">
            <?php
            $this->widget('booster.widgets.TbGridView', array(
                'type' => ' bordered condensed hover',
                'id' => 'static-page-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    'title',
                    array(
                        'name' => 'big_content',
                        'value' => function($data) {
                                $contents = str_word_count($data->big_content);
                                if($contents > 5) {
                                        return substr($data->big_content, 0, 50);
                                        //return $data->small_content;
                                } else {
                                        return $data->big_content;
                                }
                        }
                    ),
                    array(
                        'name' => 'small_content',
                        'value' => function($data) {
                                $count = str_word_count($data->small_content);
                                if($count > 5) {
                                        return substr($data->small_content, 0, 50);
                                        //return $data->small_content;
                                } else {
                                        return $data->small_content;
                                }
                        }
                    ),
                    array(
                        'name' => 'image',
                        'value' => function($data) {
                                if($data->image == "") {
                                        return;
                                } else {
                                        return '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->request->baseUrl . "/uploads/static/" . $data->id . "." . $data->image . '" />';
                                }
                        },
                        'type' => 'raw'
                    ),
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
