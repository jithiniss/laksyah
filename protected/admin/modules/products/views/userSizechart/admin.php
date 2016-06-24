<?php
/* @var $this UserSizechartController */
/* @var $model UserSizechart */
?>
<style>
        .table th, td{
                text-align: center;
        }
        .table td{
                text-align: center;
        }
</style>



<div class="row">


        <div class="col-sm-12">

                <div class="panel panel-default">
                        <?php
                        $this->widget('booster.widgets.TbGridView', array(
                            'type' => ' bordered condensed hover',
                            'id' => 'user-sizechart-grid',
                            'dataProvider' => $model->search(),
                            'filter' => $model,
                            'columns' => array(
                                array('name' => 'user_id',
                                    'value' => function($data) {
                                            return $data->user->first_name;
                                    },
                                    'type' => 'raw',
                                ),
                                'product_name',
                                'product_code',
                                array('name' => 'type',
                                    'filter' => array('2' => 'Custom Fitting', '1' => 'Standard Fitting'),
                                    'value' => function($data) {
                                    if ($data->type == '2') {
                                            return 'Custom Fitting';
                                    } elseif ($data->type == '1') {
                                            return 'Standard Fitting';
                                    } else {
                                            return 'Invalid';
                                    }
                            },
                                ),
                                array('name' => 'unit',
                                    'filter' => array('2' => 'Centimeters', '1' => 'Inches'),
                                    'value' => function($data) {
                                    if ($data->unit == '2') {
                                            return 'Centimeters';
                                    } elseif ($data->unit == '1') {
                                            return 'Inches';
                                    } else {
                                            return 'Invalid';
                                    }
                            },
                                ),
                                'around_neck',
                                'neck_depth',
                                'around_upper_chest',
                                'around_chest',
                                'around_lower_chest',
                                'shoulder_to_breastpoint',
                                'around_waist',
                                /*
                                  'shoulder_to_waist',
                                  'around_armhole',
                                  'sleeve_length',
                                  'arm_length',
                                  'around_upper_arm',
                                  'around_elbow',
                                  'around_wrist',
                                  'length_upper_garment',
                                  'shoulder_width',
                                  'around_lower_waist',
                                  'waist_to_ankle',
                                  'inseam_to_ankle',
                                  'around_hip',
                                  'around_tigh',
                                  'around_knee',
                                  'around_calf',
                                  'around_ankle',
                                  'skirt_length',
                                  'gown_full_length',
                                  'date',
                                  'comments',
                                  'enq_id',
                                  'enq_history_id',
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

