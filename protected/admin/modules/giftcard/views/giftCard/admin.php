<section class="content-header">
        <h1>
                User Details                <small>Manage</small>
        </h1>
        <ol class="breadcrumb">
                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php/site/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li class="active">Manage User Details</li>
        </ol>
</section>
<a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/giftcard/GiftCard/create'; ?>" class='btn  btn-laksyah manage'>Add Gift Card</a>
<div class="col-xs-12 form-page">
        <div class="box">
                <div class="box-body table-responsive no-padding">
                        <?php
                        $this->widget('booster.widgets.TbGridView', array(
                            'type' => ' bordered condensed hover',
                            'id' => 'gift-card-grid',
                            'dataProvider' => $model->search(),
                            'filter' => $model,
                            'columns' => array(
                                'name',
                                'amount',
                                array(
                                    'name' => 'image',
                                    'value' => function($data) {
                                            if ($data->image == "") {
                                                    return;
                                            } else {
                                                    return '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->baseUrl . '/uploads/gift/' . $data->id . '.' . $data->image . '" />';
                                            }
                                    },
                                    'type' => 'raw'
                                ),
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

