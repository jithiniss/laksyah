<section class="content-header">
    <h1>
        User Details                <small>Manage</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php/site/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Update User Details</li>
    </ol>
</section>

<a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/user/userDetails/admin'; ?>" class='btn  btn-laksyah manage'>Manage User Details</a>
<section class="content">
    <div class="box box-info">

        <div class="box-body">
            <?php $this->renderPartial('_form', array('model' => $model)); ?>        </div>
    </div>
</section>