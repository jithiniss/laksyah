<section class="content-header">
    <h1>
        Home Category              <small>Manage</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php/site/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Manage Home Category   </li>
    </ol>
</section>
<a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/cms/homeCategory/create'; ?>" class='btn  btn-laksyah manage'>Add Home Category</a>
<div class="col-xs-12 form-page">
    <div class="box">
        <div class="box-body table-responsive no-padding">
            <?php
            $this->widget('booster.widgets.TbGridView', array(
                'type' => ' bordered condensed hover',
                'id' => 'home-category-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    'category_name',
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
