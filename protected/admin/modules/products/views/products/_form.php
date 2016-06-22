

<div class="form">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'products-form',
            'htmlOptions' => array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data'),
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation' => false,
        ));
        ?>

        <p class="note">Fields with <span class="required">*</span> are required.</p>


        <div class="hasapge">
                <div class="form-group">
                        <?php echo $form->labelEx($model, 'category_id', array('class' => 'col-sm-2 control-label')); ?>
                        <?php // echo $form->hiddenField($model, 'category_id'); ?>
                        <?php
//            $this->widget('application.admin.components.TagSelect', array(
//                'type' => 'category',
//                'field_val' => $model->category_id,
//                'category_tag_id' => 'category_id', /* id of category tag */
//                'form_id' => 'products-form',
//            ));
                        ?>
                        <?php //$this->widget('application.admin.components.autoLoad', array('field_name' => 'Product[category_id]', 'model' => $model)); ?>
                        <?php //echo CHtml::activeDropDownList($model, 'category_id', CHtml::listData(ProductCategory::model()->findAll(), 'id', 'category_name'), array('empty' => '--Select--', 'class' => 'form-control')); ?>
                        <div class="col-sm-10">
                                <?php
//            $datas = ProductCategory::model()->findAll();
//            $options = array();
//            $_SESSION['category'][0] = '';
//            foreach ($datas as $data) {
//                    unset($_SESSION['category']);
//                    $options[$data->id] = Yii::app()->category->selectCategories($data);
//            }
////            var_dump($options);
////            exit;
                                if (!$model->isNewRecord) {
                                        if (!empty($model->category_id)) {
                                                $ids = explode(',', $model->category_id);
                                                $selected = array();
                                                foreach ($ids as $id) {
                                                        $selected[$id] = array('selected' => true);
                                                }
                                        }
                                }

                                //echo CHtml::activeDropDownList($model, 'category_id', $options, array('empty' => '--select--', 'class' => 'form-control', 'multiple' => true, 'size' => 8, 'options' => $selected));
                                ?>
                                <?php echo $form->hiddenField($model, 'category_id'); ?>
                                <div class="col-sm-10"><?php
                                        $this->widget('application.admin.components.CatSelect', array(
                                            'type' => 'category',
                                            'field_val' => $model->category_id,
                                            'category_tag_id' => 'Products_category_id', /* id of hidden field */
                                            'form_id' => 'product-category-form',
                                        ));
                                        ?></div>
                        </div>
                        <?php echo $form->error($model, 'category_id'); ?>
                </div>
                <div class="form-group">
                        <?php echo $form->labelEx($model, 'sku', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10"><?php echo $form->textField($model, 'sku', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
                        </div>
                        <?php echo $form->error($model, 'sku'); ?>
                </div>
                <div class="form-group" >
                        <?php echo $form->labelEx($model, 'product_name', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10"><?php echo $form->textField($model, 'product_name', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control slug', 'autocomplete' => 'off')); ?>
                        </div>
                        <?php echo $form->error($model, 'product_name'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'product_code', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10"><?php echo $form->textField($model, 'product_code', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
                        </div>
                        <?php echo $form->error($model, 'product_code'); ?>
                </div>
                <div class="form-group">
                        <?php echo $form->labelEx($model, 'canonical_name', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10"> <?php echo $form->textField($model, 'canonical_name', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
                        </div>
                        <?php echo $form->error($model, 'canonical_name'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'Main Image ( image size : 322 X 500 )', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10"><?php echo $form->fileField($model, 'main_image', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                                <?php
                                if ($model->main_image != '' && $model->id != "") {
                                        $folder = Yii::app()->Upload->folderName(0, 1000, $model->id);
                                        echo '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->baseUrl . '/uploads/products/' . $folder . '/' . $model->id . '/small' . '.' . $model->main_image . '" />';
                                }
                                ?>
                        </div>
                        <?php echo $form->error($model, 'main_image'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'Hover Images ( image size : 322 X 500 )', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10"><?php echo $form->fileField($model, 'hover_image', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                                <?php
                                if ($model->hover_image != '' && $model->id != "") {
                                        $folder = Yii::app()->Upload->folderName(0, 1000, $model->id);
                                        echo '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->baseUrl . '/uploads/products/' . $folder . '/' . $model->id . '/hover/hover.' . $model->hover_image . '" />';
                                }
                                ?>
                        </div>
                        <?php echo $form->error($model, 'hover_image'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'Gallery Images ( image size : 3016 X 4030 )', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10">
                                <?php
                                $this->widget('CMultiFileUpload', array(
                                    'name' => 'gallery_images',
                                    'accept' => 'jpeg|jpg|gif|png', // useful for verifying files
                                    'duplicate' => 'Duplicate file!', // useful, i think
                                    'denied' => 'Invalid file type', // useful, i think
                                ));
                                ?>

                                <?php
                                if (!$model->isNewRecord) {
                                        $folder = Yii::app()->Upload->folderName(0, 1000, $model->id);

                                        // $path = Yii::getPathOfAlias('webroot') . '/uploads/products/' . $folder . '/' . $model->id . '/gallery/big';

                                        $path = Yii::getPathOfAlias('webroot') . '/uploads/products/' . $folder . '/' . $model->id . '/gallery/big';


                                        $path2 = Yii::getPathOfAlias('webroot') . '/uploads/products/' . $folder . '/' . $model->id . '/gallery/';


                                        foreach (glob("{$path}/*") as $file) {

                                                $info = pathinfo($file);
                                                $file_name = basename($file, '.' . $info['basename']);

                                                //  var_dump($file_name);



                                                if ($file != '') {
                                                        $arry = explode('/', $file);
                                                        echo '<div style="float:left;margin:5px;position:relative;">'
                                                        . '<a style="position:absolute;top:43%;left:40%;color:red;" href="' . Yii::app()->baseUrl . '/admin.php/products/products/NewDelete?id=' . $model->id . '&path=' . $file_name . '"><i class="glyphicon glyphicon-trash"></i></a>'
                                                        . ' <img style="width:100px;height:100px;" src="' . Yii::app()->baseUrl . '/uploads/products/' . $folder . '/' . $model->id . '/gallery/' . end($arry) . '"> </div>';
                                                }
                                        }
                                }
                                ?>
                        </div>
                        <?php echo $form->error($model, 'gallery_images'); ?>
                </div>



                <div class="form-group">
                        <?php echo $form->labelEx($model, 'Upload Video', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10"><?php echo $form->fileField($model, 'video', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>


                                <?php
                                $vid = $model->video;
                                if ($vid != "") {
                                        ?>

                                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/1000/<?php echo $model->id; ?>/videos/video.mp4" target="_blank">play video</a>
                                <?php }
                                ?>


                        </div>
                        <?php echo $form->error($model, 'video'); ?>
                </div>



                <div class="form-group">
                        <?php echo $form->labelEx($model, 'description', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10"><?php
                                $this->widget('application.admin.extensions.eckeditor.ECKEditor', array(
                                    'model' => $model,
                                    'attribute' => 'description',
                                ));
                                ?>
                        </div>
                        <?php echo $form->error($model, 'description'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'product_details', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10"><?php
                                $this->widget('application.admin.extensions.eckeditor.ECKEditor', array(
                                    'model' => $model,
                                    'attribute' => 'product_details',
                                ));
                                ?>
                        </div>
                        <?php echo $form->error($model, 'product_details'); ?>
                </div>

                <div class="form-group">

                        <?php echo $form->labelEx($model, 'meta_title', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10"><?php echo $form->textField($model, 'meta_title', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
                        </div>
                        <?php echo $form->error($model, 'meta_title'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'meta_description', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10"><?php echo $form->textArea($model, 'meta_description', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
                        </div>
                        <?php echo $form->error($model, 'meta_description'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'meta_keywords', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10"><?php echo $form->textField($model, 'meta_keywords', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
                        </div>
                        <?php echo $form->error($model, 'meta_keywords'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'header_visibility', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10"><?php echo $form->dropDownList($model, 'header_visibility', array('1' => "Enabled", '0' => "Disabled"), array('class' => 'form-control')); ?>
                        </div>
                        <?php echo $form->error($model, 'header_visibility'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'sort_order', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10"><?php echo $form->textField($model, 'sort_order', array('class' => 'form-control')); ?>
                        </div>
                        <?php echo $form->error($model, 'sort_order'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'price', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10"><?php echo $form->textField($model, 'price', array('class' => 'form-control')); ?>
                        </div>
                        <?php echo $form->error($model, 'price'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'quantity', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10"><?php echo $form->textField($model, 'quantity', array('class' => 'form-control')); ?>
                        </div>
                        <?php echo $form->error($model, 'quantity'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'search_tag', array('class' => 'col-sm-2 control-label')); ?>
                        <?php echo $form->hiddenField($model, 'search_tag'); ?>
                        <div class="col-sm-10"><?php
                                $this->widget('application.admin.components.TagSelect', array(
                                    'type' => 'product',
                                    'field_val' => $model->search_tag,
                                    'category_tag_id' => 'Products_search_tag', /* id of hidden field */
                                    'form_id' => 'products-form',
                                ));
                                ?></div>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'subtract_stock', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10"><?php echo $form->dropDownList($model, 'subtract_stock', array('1' => "Yes", '0' => "No"), array('class' => 'form-control')); ?>
                        </div>
                        <?php echo $form->error($model, 'subtract_stock'); ?>
                </div>
                <!--    <div class="form-group">
                <?php //echo $form->labelEx($model, 'discount', array('class' => 'col-sm-2 control-label'));    ?>
                        <div class="col-sm-10"><?php //echo $form->textField($model, 'discount', array('class' => 'form-control'));                                                                                                           ?>
                        </div>
                <?php //echo $form->error($model, 'discount');    ?>
                    </div>-->
                <div class="form-group">
                        <?php echo $form->labelEx($model, 'deal_day_date', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10"><?php
                                $from = date('Y');
                                $to = date('Y') + 20;
                                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                    'model' => $model,
                                    'attribute' => 'deal_day_date',
                                    'value' => 'deal_day_date',
                                    'options' => array(
                                        'dateFormat' => 'dd-mm-yy',
                                        'changeYear' => true, // can change year
                                        'changeMonth' => true, // can change month
                                        'yearRange' => $from . ':' . $to, // range of year
                                        'showButtonPanel' => true, // show button panel
                                    ),
                                    'htmlOptions' => array(
                                        'size' => '10', // textField size
                                        'maxlength' => '10', // textField maxlength
                                        'class' => 'form-control',
                                        'placeholder' => 'deal_day_date',
                                    ),
                                ));
                                ?></div>
                        <?php echo $form->error($model, 'deal_day_date'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'deal_day_status', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10"><?php echo $form->dropDownList($model, 'deal_day_status', array('1' => "Yes", '0' => "No"), array('class' => 'form-control')); ?>
                        </div>
                        <?php echo $form->error($model, 'deal_day_status'); ?>
                </div>


                <div class="form-group">
                        <?php echo $form->labelEx($model, 'discount_type', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10"><?php echo $form->dropDownList($model, 'discount_type', array('1' => "Fixed", '0' => "Classic"), array('class' => 'form-control')); ?>
                        </div>
                        <?php echo $form->error($model, 'discount_type'); ?>
                </div>
                <div class="form-group">
                        <?php echo $form->labelEx($model, 'discount_rate', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10"><?php echo $form->textField($model, 'discount_rate', array('class' => 'form-control')); ?>
                        </div>
                        <?php echo $form->error($model, 'discount_rate'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'requires_shipping', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10"><?php echo $form->dropDownList($model, 'subtract_stock', array('1' => "Yes", '0' => "No"), array('class' => 'form-control')); ?>
                        </div>
                        <?php echo $form->error($model, 'requires_shipping'); ?>
                </div>


                <div class="form-group">
                        <?php echo $form->labelEx($model, 'enquiry_sale', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10"><?php echo $form->dropDownList($model, 'enquiry_sale', array('1' => "Sale", '0' => "Enquiry"), array('class' => 'form-control')); ?></div>
                        <?php echo $form->error($model, 'enquiry_sale'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'new_from', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10"> <?php
                                $from = date('Y') - 2;
                                $to = date('Y') + 20;
                                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                    'model' => $model,
                                    'attribute' => 'new_from',
                                    'value' => 'new_from',
                                    'options' => array(
                                        'dateFormat' => 'dd-mm-yy',
                                        'changeYear' => true, // can change year
                                        'changeMonth' => true, // can change month
                                        'yearRange' => $from . ':' . $to, // range of year
                                        'showButtonPanel' => true, // show button panel
                                    ),
                                    'htmlOptions' => array(
                                        'size' => '10', // textField size
                                        'maxlength' => '10', // textField maxlength
                                        'class' => 'form-control',
                                        'placeholder' => 'new_from',
                                    ),
                                ));
                                ?></div>
                        <?php echo $form->error($model, 'new_from'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'new_to', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10"><?php
                                $from = date('Y') - 2;
                                $to = date('Y') + 20;
                                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                    'model' => $model,
                                    'attribute' => 'new_to',
                                    'value' => 'new_to',
                                    'options' => array(
                                        'dateFormat' => 'dd-mm-yy',
                                        'changeYear' => true, // can change year
                                        'changeMonth' => true, // can change month
                                        'yearRange' => $from . ':' . $to, // range of year
                                        'showButtonPanel' => true, // show button panel
                                    ),
                                    'htmlOptions' => array(
                                        'size' => '10', // textField size
                                        'maxlength' => '10', // textField maxlength
                                        'class' => 'form-control',
                                        'placeholder' => 'new_to',
                                    ),
                                ));
                                ?></div>
                        <?php echo $form->error($model, 'new_to'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'sale_from', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10"> <?php
                                $from = date('Y') - 2;
                                $to = date('Y') + 20;
                                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                    'model' => $model,
                                    'attribute' => 'sale_from',
                                    'value' => 'sale_from',
                                    'options' => array(
                                        'dateFormat' => 'dd-mm-yy',
                                        'changeYear' => true, // can change year
                                        'changeMonth' => true, // can change month
                                        'yearRange' => $from . ':' . $to, // range of year
                                        'showButtonPanel' => true, // show button panel
                                    ),
                                    'htmlOptions' => array(
                                        'size' => '10', // textField size
                                        'maxlength' => '10', // textField maxlength
                                        'class' => 'form-control',
                                        'placeholder' => 'sale_from',
                                    ),
                                ));
                                ?></div>
                        <?php echo $form->error($model, 'sale_from'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'sale_to', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10"><?php
                                $from = date('Y') - 2;
                                $to = date('Y') + 20;
                                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                    'model' => $model,
                                    'attribute' => 'sale_to',
                                    'value' => 'sale_to',
                                    'options' => array(
                                        'dateFormat' => 'dd-mm-yy',
                                        'changeYear' => true, // can change year
                                        'changeMonth' => true, // can change month
                                        'yearRange' => $from . ':' . $to, // range of year
                                        'showButtonPanel' => true, // show button panel
                                    ),
                                    'htmlOptions' => array(
                                        'size' => '10', // textField size
                                        'maxlength' => '10', // textField maxlength
                                        'class' => 'form-control',
                                        'placeholder' => 'sale_to',
                                    ),
                                ));
                                ?></div>
                        <?php echo $form->error($model, 'sale_to'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'special_price_from', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10"><?php
                                $from = date('Y') - 2;
                                $to = date('Y') + 20;
                                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                    'model' => $model,
                                    'attribute' => 'special_price_from',
                                    'value' => 'special_price_from',
                                    'options' => array(
                                        'dateFormat' => 'dd-mm-yy',
                                        'changeYear' => true, // can change year
                                        'changeMonth' => true, // can change month
                                        'yearRange' => $from . ':' . $to, // range of year
                                        'showButtonPanel' => true, // show button panel
                                    ),
                                    'htmlOptions' => array(
                                        'size' => '10', // textField size
                                        'maxlength' => '10', // textField maxlength
                                        'class' => 'form-control',
                                        'placeholder' => 'special_price_from',
                                    ),
                                ));
                                ?></div>
                        <?php echo $form->error($model, 'special_price_from'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'special_price_to', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10"> <?php
                                $from = date('Y') - 2;
                                $to = date('Y') + 20;
                                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                    'model' => $model,
                                    'attribute' => 'special_price_to',
                                    'value' => 'special_price_to',
                                    'options' => array(
                                        'dateFormat' => 'dd-mm-yy',
                                        'changeYear' => true, // can change year
                                        'changeMonth' => true, // can change month
                                        'yearRange' => $from . ':' . $to, // range of year
                                        'showButtonPanel' => true, // show button panel
                                    ),
                                    'htmlOptions' => array(
                                        'size' => '10', // textField size
                                        'maxlength' => '10', // textField maxlength
                                        'class' => 'form-control',
                                        'placeholder' => 'special_price_to',
                                    ),
                                ));
                                ?></div>
                        <?php echo $form->error($model, 'special_price_to'); ?>
                </div>
                <div class="form-group">
                        <?php echo $form->labelEx($model, 'sizechartforwhat', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10"> <?php echo $form->textField($model, 'sizechartforwhat', array('class' => 'form-control')); ?></div>
                        <?php echo $form->error($model, 'sizechartforwhat'); ?>
                </div>
                <div class="form-group">
                        <?php echo $form->labelEx($model, 'tax', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10"> <?php echo $form->textField($model, 'tax', array('class' => 'form-control')); ?></div>
                        <?php echo $form->error($model, 'tax'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'gift_option', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10"><?php echo $form->dropDownList($model, 'gift_option', array('1' => "Yes", '0' => "No"), array('class' => 'form-control')); ?></div>
                        <?php echo $form->error($model, 'gift_option'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'stock_availability', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10"><?php echo $form->dropDownList($model, 'stock_availability', array('1' => "Yes", '0' => "No"), array('class' => 'form-control')); ?></div>
                        <?php echo $form->error($model, 'stock_availability'); ?>
                </div>
                <div class="form-group">
                        <?php echo $form->labelEx($model, 'video_link', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10"><?php echo $form->textField($model, 'video_link', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
                        </div>
                        <?php echo $form->error($model, 'video_link'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'dimensionl', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10"><?php echo $form->textField($model, 'dimensionl', array('class' => 'form-control')); ?>
                        </div>
                        <?php echo $form->error($model, 'dimensionl'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'dimensionw', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10"><?php echo $form->textField($model, 'dimensionw', array('class' => 'form-control')); ?>
                        </div>
                        <?php echo $form->error($model, 'dimensionw'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'dimensionh', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10"><?php echo $form->textField($model, 'dimensionh', array('class' => 'form-control')); ?>
                        </div>
                        <?php echo $form->error($model, 'dimensionh'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'dimension_class', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10"><?php echo CHtml::activeDropDownList($model, 'dimension_class', CHtml::listData(DimensionClass::model()->findAll(), 'id', 'title'), array('empty' => '--Select--', 'class' => 'form-control')); ?>
                        </div>
                        <?php echo $form->error($model, 'dimension_class'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'weight', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10"><?php echo $form->textField($model, 'weight', array('class' => 'form-control')); ?>
                        </div>
                        <?php echo $form->error($model, 'weight'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'weight_class', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10"><?php echo CHtml::activeDropDownList($model, 'weight_class', CHtml::listData(WeightClass::model()->findAll(), 'id', 'title'), array('empty' => '--Select--', 'class' => 'form-control')); ?>
                        </div>
                        <?php echo $form->error($model, 'weight_class'); ?>
                </div>
                <div class="form-group">
                        <?php echo $form->labelEx($model, 'status', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10"><?php echo $form->dropDownList($model, 'status', array('1' => "Enabled", '0' => "Disabled"), array('class' => 'form-control')); ?>
                        </div>
                        <?php echo $form->error($model, 'status'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'exchange', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10"><?php echo $form->dropDownList($model, 'exchange', array('1' => "Yes", '0' => "No"), array('class' => 'form-control')); ?>
                        </div>
                        <?php echo $form->error($model, 'exchange'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'related_products', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10">
                                <?php
                                if (!is_array($model->related_products)) {
                                        $myArray = explode(',', $model->related_products);
                                } else {
                                        $myArray = $model->related_products;
                                }


                                $related_products = array();

                                foreach ($myArray as $value) {
                                        $related_products[$value] = array('selected' => 'selected');
                                }
                                ?>

                                <?php echo CHtml::activeDropDownList($model, 'related_products', CHtml::listData(Products::model()->findAll(), 'id', 'product_name'), array('empty' => '-Select-', 'class' => 'form-control', 'multiple' => true, 'options' => $related_products));
                                ?>

                                <?php echo $form->error($model, 'related_products'); ?>
                        </div>
                </div>
                <div class="box-footer">
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-laksyah pos')); ?>
                </div>

                <?php $this->endWidget(); ?>

        </div><!-- form -->
</div>
<script>
        $(document).ready(function () {
                $('.slug').keyup(function () {
                        $('#Products_canonical_name').val(slug($(this).val()));
                });


        });
        var slug = function (str) {
                var $slug = '';
                var trimmed = $.trim(str);
                $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
                        replace(/-+/g, '-').
                        replace(/^-|-$/g, '');
                return $slug.toLowerCase();
        };

</script>