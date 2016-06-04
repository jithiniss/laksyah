<section class="content-header">
        <h1>
                Measurement Pdf              <small>Manage</small>
        </h1>
        <ol class="breadcrumb">
                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php/site/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li class="active">Manage Measurements</li>
        </ol>
</section>
<a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/cms/MeasurementPdfs/create'; ?>" class='btn  btn-laksyah manage'>Add Pdf</a>
<div class="col-xs-12 form-page">
        <section class="content">
                <div class="box box-info">
                        <div class="box-body table-responsive no-padding">
                                <?php
                                $this->widget('booster.widgets.TbGridView', array(
                                    'type' => ' bordered condensed hover',
                                    'id' => 'measurement-pdfs-grid',
                                    'dataProvider' => $model->search(),
                                    'filter' => $model,
                                    'columns' => array(
                                        'name',
                                        'file',
//                                'cb',
                                        'doc',
//                                'ub',
                                        /*
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
        </section>


</div>

