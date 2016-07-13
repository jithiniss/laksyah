<div class="container main_container inner_pages ">
        <div class="breadcrumbs"> <?php echo CHtml::link('HOME', array('site/index')); ?> <span>/</span>Contact Us</div>
        <div class="row">
                <?php echo $this->renderPartial('_staticmenu'); ?>
                <!-- / Side <?php //echo $this->renderPartial('_staticmenu');   ?>bar-->
                <div class="col-sm-9 user_content">
                        <h1>Contact Us</h1>
                        <!--<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Success </div>-->
                        <article>
                                <div class="row">

                                        <div class="col-sm-12">
                                                <div class="registration_form contact_us">
                                                        <?php
                                                        $form = $this->beginWidget('CActiveForm', array(
                                                            'id' => 'contact-us-contact-form',
                                                            'action' => Yii::app()->baseUrl . '/index.php/site/contactUs/',
                                                            // Please note: When you enable ajax validation, make sure the corresponding
                                                            // controller action is handling ajax validation correctly.
                                                            // See class documentation of CActiveForm for details on this,
                                                            // you need to use the performAjaxValidation()-method described there.
                                                            'enableAjaxValidation' => false,
                                                        ));
                                                        ?>
                                                        <?php if (Yii::app()->user->hasFlash('success')): ?>
                                                                <div class="alert alert-success normal">
                                                                        <strong>Success!</strong> <?php echo Yii::app()->user->getFlash('success'); ?>
                                                                </div>
                                                        <?php endif; ?>
                                                        <?php if (Yii::app()->user->hasFlash('error')): ?>
                                                                <div class="alert alert-danger">
                                                                        <strong>Danger!</strong> <?php echo Yii::app()->user->getFlash('error'); ?>
                                                                </div>
                                                        <?php endif; ?>
                                                        <p><strong><em>To contact us via email, complete the fields below:</em></strong></p>
                                                        <div class="form-group col-xs-12 col-sm-6">
                                                                <?php echo $form->labelEx($model, 'name'); ?>
                                                                <?php echo $form->textField($model, 'name', array('size' => 60, 'class' => 'form-control')); ?>
                                                                <?php echo $form->error($model, 'name', array('style' => 'color:red')); ?>
                                                        </div>
                                                        <div class="form-group col-xs-12 col-sm-6">
                                                                <?php echo $form->labelEx($model, 'email'); ?>
                                                                <?php echo $form->textField($model, 'email', array('size' => 60, 'class' => 'form-control')); ?>
                                                                <?php echo $form->error($model, 'email', array('style' => 'color:red')); ?>
                                                        </div>
                                                        <div class="form-group col-xs-12 col-sm-6">
                                                                <?php echo $form->labelEx($model, 'phone'); ?>
                                                                <?php echo $form->textField($model, 'phone', array('size' => 60, 'class' => 'form-control')); ?>
                                                                <?php echo $form->error($model, 'phone', array('style' => 'color:red')); ?>
                                                        </div>
                                                        <div class="form-group col-xs-12 col-sm-6">
                                                                <?php echo $form->labelEx($model, 'country'); ?>
                                                                <?php echo $form->textField($model, 'country', array('size' => 60, 'class' => 'form-control')); ?>
                                                                <?php echo $form->error($model, 'country', array('style' => 'color:red')); ?>
                                                        </div>
                                                        <div class="form-group col-xs-12">
                                                                <?php echo $form->labelEx($model, 'comment'); ?>
                                                                <?php echo $form->textArea($model, 'comment', array('rows' => 5, 'cols' => 60, 'class' => 'form-control')); ?>
                                                                <?php echo $form->error($model, 'comment', array('style' => 'color:red')); ?>
                                                        </div>
                                                        <div class="form_button pull-right"> <strong>
                                                                        <?php echo CHtml::submitButton('Submit', array('class' => 'btn-primary')); ?>
                                                                </strong>
                                                        </div>
                                                        <?php $this->endWidget(); ?>
                                                        <div class="clearfix"></div>
                                                </div>

                                        </div>
                                </div>
                                <div class="contact_us_details">
                                        <h4><i class="fa fa-whatsapp"></i> +91 914 220 2222 &nbsp;&nbsp; <i class="fa fa-whatsapp"></i> +91 9656 30 3333</h4>
                                </div>
                                <h3>ENQUIRIES</h3>
                                <div class="row margin-bottom">
                                        <div class="col-sm-4"><strong>Customer&nbsp;Care:</strong><br>support@laksyah.com</div>
                                        <div class="col-sm-4"><strong>Shipping:</strong><br>logistics@laksyah.com</div>
                                        <div class="col-sm-4"><strong>Product&nbsp;Submission:</strong><br>submissions@laksyah.com</div>
                                </div>
                                <div class="row">
                                        <div class="col-sm-4"><strong>Sales:</strong><br>sales@laksyah.com</div>
                                        <div class="col-sm-4"><strong>Careers:</strong><br>careers@laksyah.com</div>
                                        <div class="col-sm-4"><strong>All&nbsp;other&nbsp;enquiries:</strong><br>info@laksyah.com</div>
                                </div>
                                <h3>WORKING HOURS:</h3>
                                <p>Mon to Sat 09:30am to 6:30pm IST (Indian Standard Time)</p>
                                <h3>VISIT US:</h3>
                                <p>The Design House,<br/>
                                        C-3, GCDA House, Mavelipuram,<br/>
                                        Kakkanad, kochi</p>
                        </article>
                </div>
        </div>
</div>