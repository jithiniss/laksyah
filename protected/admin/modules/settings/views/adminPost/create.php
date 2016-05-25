<section class="content-header">
        <h1>
                Admin Post
                <small>Create</small>
        </h1>
        <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>Admin Post</a></li>
                <li class="active">Create</li>
        </ol>
</section>
<a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/settings/AdminPost/admin'; ?>" class='btn  btn-laksyah manage'>Manage Post</a>
<section class="content">

        <div class="box box-info">

                <div class="box-body">
                        <?php $this->renderPartial('_form', array('model' => $model)); ?>
                </div>
        </div>
</section>
