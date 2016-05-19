<section class="content-header">
    <h1>
        Currency

    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php/site/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active"> Currency</li>
    </ol>
</section>
<a href="<?php echo Yii::app()->request->baseurl . '/admin.php/masters/currency/create'; ?>" class='btn  btn-laksyah manage'>Add Currency</a>

<div class="col-xs-12 form-page">
    <div class="box">
        <div class="box-body table-responsive no-padding">
            <?php
            $this->widget('booster.widgets.TbGridView', array(
                'type' => ' bordered condensed hover',
                'id' => 'currency-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    //'id',
                    'country',
                    'currency',
                    'currency_code',
                    'symbol',
                    'rate',
                    /*
                      'image',
                      'cb',
                      'ub',
                      'doc',
                      'dou',
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

