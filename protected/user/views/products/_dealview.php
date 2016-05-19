<div class="col-md-4 col-sm-6 col-xs-6">

        <div  style="border: 2px solid #d2d2d2;padding: 10px;text-align: center;">

                <div  style="    border: 2px solid #828181;">

                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Products/Detail/id/<?php echo $data->id; ?>">
                                <?php if ($data->main_image == NULL) { ?>
                                        <img width="280" height="300" class="safe" src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/no-productimage.jpg" />
                                        <?php
                                } else {
                                        ?><div class="img_div_view">
                                                <img class="img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?php
                                                echo Yii::app()->Upload->folderName(0, 1000, $data->id)
                                                ?>/<?php echo $data->id; ?>/medium.<?php echo $data->main_image; ?>"/></div>
                                <?php } ?></a>
                </div>


                <h4><?php echo $data->product_name; ?></h4>
                <?php
                if ($data->stock_availability == 1) {
                        if ($data->discount_rate != 0) {
                                if ($data->discount_type == 1) {
                                        $discountRate = $data->price - $data->discount_rate;
                                } else {
                                        $discountRate = $data->price - ( $data->price * ($data->discount_rate / 100));
                                }
                                ?>
                                <span style='color:red;text-decoration:line-through'>
                                        <span style='color:black'>
                                                <?php echo Yii::app()->Currency->convert($data->price); ?>
                                        </span>
                                </span>&nbsp;&nbsp;
                                <span style='color:black'><?php echo Yii::app()->Currency->convert($discountRate); ?></span>

                                <?php
                        } else {
                                ?>

                                <span style='color:black'><?php echo Yii::app()->Currency->convert($data->price); ?></span>
                                <?php
                        }
                } else {
                        ?>

                        <span style='color:black'><?php echo Yii::app()->Currency->convert($data->price); ?></span>
                        <form action="<?= Yii::app()->baseUrl; ?>/index.php/products/ProductNotify/id/<?= $data->id; ?>" method="post" name="notify">
                                <?php
                                if (isset(Yii::app()->session['user'])) {
                                        ?>
                                        <input type="text" id="email"  name="email" value="<?= Yii::app()->session['user']['email'] ?>">
                                        <?php
                                } else {
                                        ?>
                                        <input type="text" id="email"  name="email">
                                        <?php
                                }
                                ?>
                                <input type="submit" class="btn-default" href="#" value="Notify Me" style="margin-top: 8px;">
                        </form>
                <?php } ?>
                <br>
                <?php
                $new_from = $data->new_from;
                $new_to = $data->new_to;
                $today = date('Y-m-d');
                if (strtotime($new_from) <= strtotime($today) && strtotime($new_to) >= strtotime($today)) {
                        ?>
                        <span class="label label-danger">New</span>
                        <?php
                }
                ?>
                <?php
                $sale_from = $data->sale_from;
                $sale_to = $data->sale_to;

                if (strtotime($sale_from) <= strtotime($today) && strtotime($sale_to) >= strtotime($today)) {
                        ?>
                        <span class="label label-warning">Sale</span>
                        <?php
                }
                ?>
                <br>

                <ul class="list-unstyled list-inline prices">
                        <div>
                                <?php if (Yii::app()->user->hasFlash('success')): ?>
                                        <div class="alert alert-success mesage">
                                                <strong>Success!</strong> <?php echo Yii::app()->user->getFlash('success'); ?>
                                        </div>
                                <?php endif; ?>
                                <?php if (Yii::app()->user->hasFlash('error')): ?>
                                        <div class="alert alert-danger mesage">
                                                <strong>sorry!</strong><?php echo Yii::app()->user->getFlash('error'); ?>
                                        </div>
                                <?php endif; ?>
                        </div>
                        <h3><?php echo $data->product_name; ?></h3>
                        <span><?php echo $data->product_code; ?></span><br>
                        <span><?php echo Yii::app()->Discount->Discount($data); ?></span>
                        <br>
                        <?php
                        //check wheather sale or enquiry//

                        if ($data->enquiry_sale == 1) {
                                //instock//

                                if ($data->stock_availability == 1) {
                                        if (isset(Yii::app()->session['user'])) {
                                                ?>
                                                <a href="<?= Yii::app()->baseUrl; ?>/index.php/Products/Wishlist/id/<?= $data->id ?>" class="add_to_wishlist add wish ">Add to WishList</a>
                                                <?php
                                        }
                                        ?>
                                        <div class="qunatity">
                                                <h6>Quantity : </h6>
                                                <select class="qty_<?= $data->id ?>" >
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                </select>
                                        </div>
                                        <div style = "padding-top: 5px; position: relative;">
                                                <!--<form method = "post" name = "option" action = "<?= Yii::app()->request->baseUrl; ?>/index.php/cart/Buynow" id = "myform">-->
                                                <a href="<?= Yii::app()->baseUrl; ?>/index.php/Products/Wishlist/id/<?= $data->id ?>" class="add_to_wishlist add wish ">Add to WishList</a>
                                                <input type = "submit" class = "add add_to_cart" id="<?= $data->id; ?>" href = "#" value = "Add To Cart">
                                                <input type = "hidden" id = "opt_id" name = "opt">
                                                <input type = "hidden" value = "<?= $data->canonical_name; ?>" id="cano_name_<?= $data->id; ?>" name="cano_name">
                                                <!--</form>-->

                                        </div>
                                        <?php
                                }
                                //out of stock//
                                elseif ($data->stock_availability == 0) {
                                        ?>
                                        <form action = "<?= Yii::app()->baseUrl; ?>/index.php/products/ProductNotify/id/<?= $data->id; ?>" method = "post" name = "notify">
                                                <?php
                                                if (isset(Yii::app()->session['user'])) {
                                                        ?>
                                                        <input type="text" id="email"  name="email" value="<?= Yii::app()->session['user']['email'] ?>">
                                                        <?php
                                                } else {
                                                        ?>
                                                        <input type="text" id="email"  name="email">
                                                        <?php
                                                }
                                                ?>
                                                <input type="submit" class="add" value="Notify Me">
                                        </form>

                                        <?php
                                } else {
                                        //other checking if availanle//
                                }
                        }
                        //enquiry//
                        else {
                                ?>
                                <button type="button" class="add" data-toggle="modal" data-target="#myModal">
                                        Enquire Now
                                </button>

                                <!-- Modal -->
                                <script>
                                        $(document).ready(function () {
        <?php if ($model->hasErrors()) { ?>
                                                        $("#myModal").modal('show');
        <?php } ?>
                                        });
                                </script>

                                <script>
                                        $(document).ready(function () {
        <?php if (Yii::app()->user->hasFlash('enuirysuccess')) { ?>
                                                        $("#myModal").modal('show');
                                                        $(".modal-body").html('Your Enquiry Submitted Successfully');

        <?php } ?>
                                        });
                                </script>
                                <div class="modal " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                        <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title" id="myModalLabel">Enquire Now</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                                <div class="form">

                                                                        <?php
                                                                        $form = $this->beginWidget('CActiveForm', array(
                                                                            'id' => 'product-enquiry-form',
                                                                            'htmlOptions' => array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data'),
                                                                            // Please note: When you enable ajax validation, make sure the corresponding
                                                                            // controller action is handling ajax validation correctly.
                                                                            // There is a call to performAjaxValidation() commented in generated controller code.
                                                                            // See class documentation of CActiveForm for details on this.
                                                                            'enableAjaxValidation' => true,
                                                                        ));
                                                                        ?>

                                                                        <p class="note">Fields with <span class="required">*</span> are required.</p>



                                                                        <div class="form-group">
                                                                                <?php echo $form->labelEx($model, 'product_id', array('class' => 'col-sm-2 control-label')); ?>
                                                                                <div class="col-sm-10"><?php echo CHtml::activeDropDownList($model, 'product_id', CHtml::listData(Products::model()->findAll(), 'id', 'product_name'), array('empty' => '--Select--', 'class' => 'form-control')); ?>
                                                                                </div>
                                                                                <?php echo $form->error($model, 'product_id'); ?>
                                                                        </div>
                                                                        <div class="form-group">
                                                                                <?php echo $form->labelEx($model, 'name', array('class' => 'col-sm-2 control-label')); ?>
                                                                                <div class="col-sm-10"><?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
                                                                                </div>
                                                                                <?php echo $form->error($model, 'name'); ?>
                                                                        </div>
                                                                        <div class="form-group">
                                                                                <?php echo $form->labelEx($model, 'email', array('class' => 'col-sm-2 control-label')); ?>
                                                                                <div class="col-sm-10"><?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
                                                                                </div>
                                                                                <?php echo $form->error($model, 'email'); ?>
                                                                        </div>
                                                                        <div class="form-group">
                                                                                <?php echo $form->labelEx($model, 'phone', array('class' => 'col-sm-2 control-label')); ?>
                                                                                <div class="col-sm-10"><?php echo $form->textField($model, 'phone', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
                                                                                </div>
                                                                                <?php echo $form->error($model, 'phone'); ?>
                                                                        </div>

                                                                        <div class="form-group">
                                                                                <?php echo $form->labelEx($model, 'country', array('class' => 'col-sm-2 control-label')); ?>
                                                                                <div class="col-sm-10"><?php echo CHtml::activeDropDownList($model, 'country', CHtml::listData(Countries::model()->findAll(), 'id', 'country_name'), array('empty' => '--Select--', 'class' => 'form-control')); ?>
                                                                                </div>
                                                                                <?php echo $form->error($model, 'country'); ?>
                                                                        </div>
                                                                        <div class="form-group">
                                                                                <?php echo $form->labelEx($model, 'size', array('class' => 'col-sm-2 control-label')); ?>
                                                                                <div class="col-sm-10"><?php echo CHtml::activeDropDownList($model, 'size', CHtml::listData(MasterSize::model()->findAll(), 'id', 'size'), array('empty' => '--Select--', 'class' => 'form-control')); ?>
                                                                                </div>
                                                                                <?php echo $form->error($model, 'size'); ?>
                                                                        </div>

                                                                        <div class="form-group">
                                                                                <?php echo $form->labelEx($model, 'requirement', array('class' => 'col-sm-2 control-label')); ?>
                                                                                <div class="col-sm-10"><?php
                                                                                        $this->widget('application.admin.extensions.eckeditor.ECKEditor', array(
                                                                                            'model' => $model,
                                                                                            'attribute' => 'requirement',
                                                                                        ));
                                                                                        ?>
                                                                                </div>
                                                                                <?php echo $form->error($model, 'requirement'); ?>
                                                                        </div>



                                                                        <div class="modal-footer">
                                                                                <?php echo CHtml::submitButton($model->isNewRecord ? 'Enquiry Now' : 'Save', array('class' => 'btn btn-default')); ?>
                                                                                <?php echo CHtml::resetButton($model->isNewRecord ? 'Reset' : 'Save', array('class' => 'btn btn-primary')); ?>
                                                                        </div>
                                                                        <?php $this->endWidget(); ?>
                                                                </div><!-- form -->
                                                        </div>

                                                </div>
                                        </div>
                                </div>

                                <?php
                        }
                        ?>




                </ul>
                <a  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Products/Detail/name/<?php echo $data->canonical_name; ?>" style="text-align: right !important;">More >></a>

        </div>


</div>
