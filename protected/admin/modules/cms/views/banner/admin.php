<section class="content-header">
        <h1>
                Banner Image              <small>Manage</small>
        </h1>
        <ol class="breadcrumb">
                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php/site/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li class="active">Manage Slider</li>
        </ol>
</section>
<!--<a href="<?php // echo Yii::app()->request->baseUrl . '/admin.php/cms/Banner/create';  ?>" class='btn  btn-laksyah manage'>Add Banner Image</a>-->
<div class="col-xs-12 form-page">
        <div class="box">
                <div class="box-body table-responsive no-padding">
                        <?php
                        $this->widget('booster.widgets.TbGridView', array(
                            'type' => ' bordered condensed hover',
                            'id' => 'banner-grid',
                            'dataProvider' => $model->search(),
                            'filter' => $model,
                            'columns' => array(
                                'name',
                                array(
                                    'name' => 'image',
                                    'value' => function($data) {
                                            if ($data->image == "") {
                                                    return;
                                            } else {
                                                    return '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->request->baseUrl . "/uploads/banner/" . $data->id . "." . $data->image . '" />';
                                            }
                                    },
                                    'type' => 'raw'
                                ),
                                'heading',
                                'description',
                                'link',
                                'doc',
                                /*
                                  'cb',

                                  'ub',
                                  'dou',
                                 */
                                array(
                                    'htmlOptions' => array('nowrap' => 'nowrap'),
                                    'class' => 'booster.widgets.TbButtonColumn',
                                    'template' => '{update}',
                                ),
                            ),
                        ));
                        ?>
                </div>

        </div>


</div>

