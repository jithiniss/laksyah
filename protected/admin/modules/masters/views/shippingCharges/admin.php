<?php
/* @var $this ShippingChargesController */
/* @var $model ShippingCharges */
?>
<style>
        .table th, td{
                text-align: center;
        }
        .table td{
                text-align: center;
        }
</style>


<div class="page-title">

        <div class="title-env">
                <h1 style="float: left;" class="title">ShippingCharges</h1>
                <p style="float: left;margin-top: 8px;margin-left: 11px;" class="description">Manage ShippingCharges</p>
        </div>

        <div class="breadcrumb-env">

                <ol class="breadcrumb bc-1" >
                        <li>
                                <a href="<?php echo Yii::app()->request->baseurl . '/site/home'; ?>"><i class="fa-home"></i>Home</a>
                        </li>

                        <li class="active">

                                <strong>Manage ShippingCharges</strong>
                        </li>
                </ol>

        </div>

</div>
<div class="row">


        <div class="col-sm-12">

                <a class="btn btn-secondary btn-icon btn-icon-standalone" href="<?php echo Yii::app()->request->baseurl . '/admin.php/masters/shippingCharges/create'; ?>" id="add-note">
                        <i class="fa-pencil"></i>
                        <span>Add ShippingCharges</span>
                </a>
                <div class="panel panel-default">
                        <?php
                        $this->widget('booster.widgets.TbGridView', array(
                            'type' => ' bordered condensed hover',
                            'id' => 'shipping-charges-grid',
                            'dataProvider' => $model->search(),
                            'filter' => $model,
                            'columns' => array(
//                                'id',

                                array(
                                    'name' => 'country',
                                    'filter' => CHtml::listData(Countries::model()->findAll(), 'id', 'country_name'),
                                    'value' => function($data) {
                                            return Countries::model()->findByPk($data->country)->country_name;
                                    }
                                ),
                                'zone',
                                'weight',
                                'shipping_rate',
                                /*
                                  'ub',
                                  'status',
                                  'sort_order',
                                  'zone',
                                  'weight',
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

