<section class="content-header">
    <h1>
        Exchange                <small>Manage</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/products/exchange/admin'; ?>"><i class="fa fa-dashboard"></i>  Exchange</a></li>
        <li class="active">Manage</li>
    </ol>
</section>
<a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/products/exchange/create'; ?>" class='btn  btn-success manage'>Add Exchange</a>
<div class="col-xs-12 form-page">
    <div class="box">
        <div class="box-body table-responsive no-padding">
            <?php
            $this->widget('booster.widgets.TbGridView', array(
                'type' => ' bordered condensed hover',
                'id' => 'exchange-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    'product_id',
                    'name',
                    'email',
                    'phone',
                    'description',
                    array('name' => 'image',
                        'value' => function($data) {
                                if ($data->image == "") {
                                        return;
                                } else {
                                        return '<img width="100"height="100" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->baseUrl . '/uploads/product-exchange/' . $data->id . '.' . $data->image . '" />';
                                }
                        },
                        'type' => 'raw'
                    ),
                    /*
                      'date',
                      'status',
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
