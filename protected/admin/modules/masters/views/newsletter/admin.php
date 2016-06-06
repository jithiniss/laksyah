<section class="content-header">
        <h1>
                Newsletter         <small>Manage</small>
        </h1>
        <ol class="breadcrumb">
                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php/site/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li class="active">Manage Newsletter   </li>
        </ol>
</section>
<a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/masters/newsletter/create'; ?>" class='btn  btn-laksyah manage'>Add Newsletter</a>
<a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/masters/newsletter/Email'; ?>" class='btn  btn-laksyah manage'>Email's</a>
<div class="col-xs-12 form-page">
        <div class="box">
                <div class="box-body table-responsive no-padding">
                        <?php
                        $this->widget('booster.widgets.TbGridView', array(
                            'type' => ' bordered condensed hover',
                            'id' => 'newsletter-grid',
                            'dataProvider' => $model->search(),
                            'filter' => $model,
                            'columns' => array(
                                'first_name',
                                'email',
                                array('name' => 'status',
                                    'filter' => array('1' => 'enable', '0' => 'disable'),
                                    'value' => function($data) {
                                    if ($data->status == '1') {
                                            return 'enable';
                                    } elseif ($data->status == '0') {
                                            return 'disable';
                                    } else {
                                            return 'Invalid';
                                    }
                            },
                                ),
                                'date',
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
