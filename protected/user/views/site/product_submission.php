<div class="container main_container inner_pages ">
    <div class="breadcrumbs"><?php echo CHtml::link('HOME', array('site/index')); ?> <span>/</span>PRODUCT SUBMISSION</div>
    <div class="row">
        <?php echo $this->renderPartial('_staticmenu'); ?>
        <!-- / Sidebar-->
        <div class="col-sm-9 user_content">
            <h1><?php echo $model->title; ?></h1>
            <!--<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    Success </div>-->
            <article>


                <img  src="<?php echo Yii::app()->baseUrl; ?>/uploads/static/<?php echo $model->id . '.' . $model->image; ?>"/>

                <?php echo $model->big_content; ?>
                <?php echo $model->small_content; ?>


            </article>
        </div>
    </div>
</div>