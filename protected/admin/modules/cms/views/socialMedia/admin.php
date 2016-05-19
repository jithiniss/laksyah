<section class="content-header">
    <h1>
        Social Media                <small>Manage</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php/site/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Manage Social Media </li>
    </ol>
</section>
<!--<a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/cms/socialMedia/create'; ?>" class='btn  btn-success manage'>Add SocialMedia</a>-->
<div class="col-xs-12 form-page">
    <div class="box">
        <div class="box-body table-responsive no-padding">
            <?php
            $this->widget('booster.widgets.TbGridView', array(
                'type' => ' bordered condensed hover',
                'id' => 'social-media-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    'name',
                    'link',
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
