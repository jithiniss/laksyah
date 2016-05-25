<section class="content-header">
        <h1>  Product Options

                <small>Create</small>
        </h1>
        <ol class="breadcrumb">
                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php/site/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li class="active">Create Product Options</li>
        </ol>
</section>
<a class="btn btn-laksyah" href="<?php echo Yii::app()->request->baseurl . '/admin.php/products/masterOptions/admin'; ?>" id="add-note">
        Manage Product Options
</a>
<section class="content">

        <div class="box box-info">

                <div class="box-body">


                        <div class="form">


                                <?php
                                $form = $this->beginWidget('CActiveForm', array(
                                    'id' => 'options-detail-form',
                                    'htmlOptions' => array('class' => 'form-horizontal'),
                                    // Please note: When you enable ajax validation, make sure the corresponding
                                    // controller action is handling ajax validation correctly.
                                    // There is a call to performAjaxValidation() commented in generated controller code.
                                    // See class documentation of CActiveForm for details on this.
                                    'enableAjaxValidation' => false,
                                ));
                                ?>

                                <?php echo $form->errorSummary($model); ?>


                                <br/>
                                <div class="form-group">
                                        <label class="col-sm-2 control-label">Product Name</label><div class="col-sm-10"><span style="text-transform: capitalize;"> <?php echo $productOptions->product->product_name; ?></span></div>
                                </div>
                                <input type="hidden" value="<?php echo $options->master_option_id; ?>" id="master_option_id"/>
                                <?php
                                if ($model->isNewRecord) {


                                        $check_type = OptionDetails::model()->findAll(['condition' => 'master_option_id=' . $options->master_option_id]);

                                        if (!empty($check_type)) {
                                                $t = 1;
                                                foreach ($check_type as $type) {
                                                        if ($type->color_id != 0) {
                                                                if ($t == 1) {
                                                                        $types.=$type->color_id;
                                                                } else {
                                                                        $types.=',' . $type->color_id;
                                                                }
                                                        } else if ($type->size_id != 0) {
                                                                if ($t == 1) {
                                                                        $types.=$type->size_id;
                                                                } else {
                                                                        $types.=',' . $type->size_id;
                                                                }
                                                        }


                                                        $t++;
                                                }

                                                if ($types != "") {
                                                        $condition = ' and id not in(' . $types . ') ';
                                                }
                                        } else {
                                                $condition = '';
                                        }
                                } else {
                                        $condition = '';
                                }
                                ?>
                                <?php if ($productOptions->option_type_id == 1) { ?>
                                        <div class="form-group">
                                                <?php echo $form->labelEx($model, 'color_id', array('class' => 'col-sm-2 control-label')); ?>
                                                <div class="col-sm-10">

                                                        <?php echo CHtml::activeDropDownList($model, 'color_id', CHtml::listData(OptionCategory::model()->findAll(['condition' => 'option_type_id=1 ' . $condition]), 'id', 'color_name'), array('empty' => '--Select--', 'class' => 'form-control')); ?>

                                                        <?php echo $form->error($model, 'color_id'); ?>
                                                </div>
                                        </div>


                                <?php } else if ($productOptions->option_type_id == 2) { ?>
                                        <div class="form-group">
                                                <?php echo $form->labelEx($model, 'size_id', array('class' => 'col-sm-2 control-label')); ?>
                                                <div class="col-sm-10">
                                                        <?php echo CHtml::activeDropDownList($model, 'size_id', CHtml::listData(OptionCategory::model()->findAll(['condition' => 'option_type_id=2 ' . $condition]), 'id', 'size'), array('empty' => '--Select--', 'class' => 'form-control')); ?>

                                                        <?php echo $form->error($model, 'size_id'); ?>
                                                </div>
                                        </div>

                                <?php } else if ($productOptions->option_type_id == 3) { ?>
                                        <div class="form-group">
                                                <?php echo $form->labelEx($model, 'color_id', array('class' => 'col-sm-2 control-label')); ?>
                                                <div class="col-sm-10">
                                                        <?php echo CHtml::activeDropDownList($model, 'color_id', CHtml::listData(OptionCategory::model()->findAll(['condition' => 'option_type_id=1']), 'id', 'color_name'), array('empty' => '--Select--', 'class' => 'form-control')); ?>

                                                        <?php echo $form->error($model, 'color_id'); ?>
                                                </div>
                                        </div>

                                        <div class="form-group">
                                                <?php echo $form->labelEx($model, 'size_id', array('class' => 'col-sm-2 control-label')); ?>
                                                <div class="col-sm-10">
                                                        <?php echo CHtml::activeDropDownList($model, 'size_id', CHtml::listData(OptionCategory::model()->findAll(['condition' => 'option_type_id=2']), 'id', 'size'), array('empty' => '--Select--', 'class' => 'form-control option_sizes')); ?>

                                                        <?php echo $form->error($model, 'size_id'); ?>
                                                </div>
                                        </div>

                                <?php } ?>
                                <div class="form-group">
                                        <?php echo $form->labelEx($model, 'stock', array('class' => 'col-sm-2 control-label')); ?>
                                        <div class="col-sm-10">
                                                <?php echo $form->textField($model, 'stock', array('class' => 'form-control')); ?>

                                                <?php echo $form->error($model, 'stock'); ?>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <?php echo $form->labelEx($model, 'status', array('class' => 'col-sm-2 control-label')); ?>
                                        <div class="col-sm-10">
                                                <?php echo $form->dropdownList($model, 'status', array('1' => 'In Stock', '0' => 'Out of Stock'), array('class' => 'form-control')); ?>

                                                <?php echo $form->error($model, 'status'); ?>
                                        </div>
                                </div>

                                <div class="form-group btns">
                                        <label>&nbsp;</label><br/>
                                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save', array('class' => 'btn btn-laksyah pull-right')); ?>
                                </div>

                                <?php $this->endWidget(); ?>

                        </div><!-- form -->

                </div>
                <div class="box-body table-responsive no-padding">
                        <?php
                        if ($productOptions->option_type_id == 1 || $productOptions->option_type_id == 3) {
                                $color = true;
                        } else {
                                $color = false;
                        }
                        if ($productOptions->option_type_id == 2 || $productOptions->option_type_id == 3) {
                                $size = true;
                        } else {
                                $size = false;
                        }
                        $this->widget('booster.widgets.TbGridView', array(
                            'type' => ' bordered condensed hover',
                            'id' => 'options-detail-grid',
                            'dataProvider' => $options->search(),
                            'filter' => $options,
                            'columns' => array(
                                array(
                                    'name' => 'color_id',
                                    'value' => '$data->color->color_name',
                                    'filter' => CHtml::listData(OptionCategory::model()->findAll(['condition' => 'option_type_id=1']), 'id', 'color_name'),
                                    'visible' => $color,
                                ),
                                array(
                                    'name' => 'size_id',
                                    'value' => '$data->size->size',
                                    'filter' => CHtml::listData(OptionCategory::model()->findAll(['condition' => 'option_type_id=2']), 'id', 'size'),
                                    'visible' => $size,
                                ),
                                'stock',
                                array(
                                    'name' => 'status',
                                    'filter' => array('1' => 'In Stock', '0' => 'Out of Stock'),
                                    'value' => function($data) {
                                    return $data->status == 1 ? 'In Stock' : 'Out of Stock';
                            }
                                ),
                                array(
                                    'htmlOptions' => array('nowrap' => 'nowrap'),
                                    'class' => 'booster.widgets.TbButtonColumn',
                                    'template' => '{update}{delete}',
                                    'buttons' => array(
                                        'update' => array(
                                            'url' => 'Yii::app()->request->baseUrl . "/admin.php/products/masterOptions/OptionDetails/id/".$data->master_option_id."/optionid/" . $data->id',
                                            'label' => '<i class="glyphicon glyphicon-trash" style="font-size: 20px;"> </i>',
                                            'options' => array(
                                                'data-toggle' => 'tooltip',
                                                'title' => 'update',
                                            ),
                                        ),
                                        'delete' => array(
                                            'url' => 'Yii::app()->request->baseUrl . "/admin.php/products/masterOptions/OptionsDelete/id/" . $data->id."?option=".$data->master_option_id',
                                            'label' => '<i class="glyphicon glyphicon-trash" style="font-size: 20px;"> </i>',
                                            'options' => array(
                                                'data-toggle' => 'tooltip',
                                                'title' => 'delete',
                                            ),
                                        ),
                                    ),),
                            ),
                        ));
                        ?>
                </div>
        </div>

</section><!-- form -->


<script>
        var baseurl = "<?php print Yii::app()->request->baseUrl; ?>";
        $(document).ready(function () {
                $('#OptionDetails_color_id').on('change', function () {
                        var color_id = $(this).val();
                        var master_id = $('#master_option_id').val();
                        ProductOptionType(color_id, master_id);
                });

                function ProductOptionType(color_id, master_id) {

                        $.ajax({
                                'url': baseurl + '/admin.php/products/MasterOptions/ProductTypeOptions',
                                'type': "POST",
                                'dataType': 'html',
                                'data': {color_id: color_id, master_id: master_id},
                                success: function (result) {


                                        $('.option_sizes').html(result);
                                        $('.option_sizes').show();
                                }

                        });
                }
        });
</script>