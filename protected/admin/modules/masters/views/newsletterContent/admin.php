<?php
/* @var $this NewsletterContentController */
/* @var $model NewsletterContent */
?>
<section class="content-header">
        <h1>
                Newsletter         <small>Manage</small>
        </h1>
        <ol class="breadcrumb">
                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php/site/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li class="active">Manage Newsletter   </li>
        </ol>
</section>
<a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/masters/newsletter/create'; ?>" class='btn  btn-laksyah manage'>Add Email</a>
<a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/masters/newsletter/Email'; ?>" class='btn  btn-laksyah manage'>Email's</a>
<a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/masters/NewsletterContent/create'; ?>" class='btn  btn-laksyah manage'>Add Newsletter</a>
<div class="col-xs-12 form-page">
        <div class="box">
                <div class="box-body table-responsive no-padding">
                        <?php
                        $this->widget('booster.widgets.TbGridView', array(
                            'type' => ' bordered condensed hover',
                            'id' => 'newsletter-content-grid',
                            'dataProvider' => $model->search(),
                            'filter' => $model,
                            'columns' => array(
                                'type',
                                'heading',
                                'subheading',
                                'content',
                                array(
                                    'name' => 'image',
                                    'value' => function($data) {
                                            if ($data->image == "") {
                                                    return;
                                            } else {
                                                    return '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->request->baseUrl . '/uploads/newsletter/' . $data->id . '.' . $data->image . '" />';
                                            }
                                    },
                                    'type' => 'raw'
                                ),
                                'link',
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
                                /*

                                  'type',
                                  'doc',
                                  'cb',
                                  'dou',
                                  'ub',
                                 */
                                array(
                                    'htmlOptions' => array('nowrap' => 'nowrap'),
                                    'class' => 'booster.widgets.TbButtonColumn',
                                    'template' => '{update} {delete} {send}',
                                    'buttons' => array(
                                        'send' => array(
                                            'url' => 'Yii::app()->request->baseUrl."/admin.php/masters/NewsletterContent/EmailSend/id/".$data->id',
                                            'label' => '<i class="fa fa-money" style="font-size: 20px;"> </i>',
                                            'options' => array(
                                                'data-toggle' => 'tooltip',
                                                'title' => 'Send Newsletter',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ));
                        ?>
                </div>

        </div>


</div>

