
<section class="content-header">
    <h1>
        OrderProducts        <small>Create</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseUrl.'/admin.php/products/orderProducts/admin'; ?>"><i class="fa fa-dashboard"></i>  OrderProducts</a></li>
        <li class="active">create</li>
    </ol>
</section>

<a href="<?php echo Yii::app()->request->baseUrl.'/admin.php/products/orderProducts/admin'; ?>" class='btn  btn-success manage'>Manage OrderProducts</a>
<section class="content">
    <div class="box box-info">

        <div class="box-body">
            <?php $this->renderPartial('_form', array('model'=>$model)); ?>        </div>
    </div>
</section>