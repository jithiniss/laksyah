<section class="content-header">
    <h1>
        Dimension Class         <small>Update</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php/site/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Update Dimension Class   </li>
    </ol>
</section>


<a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/masters/dimensionClass/admin'; ?>" class='btn  btn-laksyah manage'>Manage Dimension Class</a>
<section class="content">
    <div class="box box-info">

        <div class="box-body">
            <?php $this->renderPartial('_form', array('model' => $model)); ?>        </div>
    </div>
</section>