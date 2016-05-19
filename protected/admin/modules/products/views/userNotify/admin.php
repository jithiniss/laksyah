<section class="content-header">
    <h1>
        User Notified

    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php/site/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active"> Notifications</li>
    </ol>
</section>
<div class="row">


    <div class="col-sm-12">


        <div class="panel panel-default">
            <?php
            $this->widget('booster.widgets.TbGridView', array(
                'type' => ' bordered condensed hover',
                'id' => 'user-notify-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    'email_id',
                    'prod_id',
                    array(
                        'name' => 'status',
                        'value' => function($data) {
                                if ($data->status == 0) {
                                        return $data = "No";
                                }
                                else {
                                        return $data = "Yes";
                                }
                                return $data;
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

