<section class="content-header">
    <h1>
        ReturnRequest                <small>Manage</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/products/returnRequest/admin'; ?>"><i class="fa fa-dashboard"></i>  ReturnRequest</a></li>
        <li class="active">Manage</li>
    </ol>
</section>
<div class="col-xs-12 form-page">
    <div class="box">
        <div class="box-body table-responsive no-padding">
            <?php
            $this->widget('booster.widgets.TbGridView', array(
                'type' => ' bordered condensed hover',
                'id' => 'return-request-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
//                    'user_id',
//                    'product_id',
                    'product_description',
//		'DOC',
//		'status',
                    array(
                        'htmlOptions' => array('nowrap' => 'nowrap'),
                        'class' => 'booster.widgets.TbButtonColumn',
                        'template' => '{delete}',
                    ),
                ),
            ));
            ?>
        </div>
    </div>
</div>
