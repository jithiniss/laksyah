<section class="content-header">
    <h1>
        Slider              <small>Manage</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php/site/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Manage Slider</li>
    </ol>
</section>
<a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/cms/slider/create'; ?>" class='btn  btn-laksyah manage'>Add Slider</a>
<div class="col-xs-12 form-page">
    <div class="box">
        <div class="box-body table-responsive no-padding">
            <?php
            $this->widget('booster.widgets.TbGridView', array(
                'type' => ' bordered condensed hover',
                'id' => 'slider-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    array(
                        'name' => 'image_extension',
                        'value' => function($data) {
                                if($data->image_extension == "") {
                                        return;
                                } else {
                                        return '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->request->baseUrl . "/uploads/sliders/" . $data->id . "." . $data->image_extension . '" />';
                                }
                        },
                        'type' => 'raw'
                    ),
                    'content',
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
                        'filter' => array('1' => "Enabled", '0' => "Disabled")
                    ),
                    /*
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
