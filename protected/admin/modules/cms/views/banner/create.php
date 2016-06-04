<section class="content-header">
        <h1>
                Banner Image          <small>Create</small>
        </h1>
        <ol class="breadcrumb">
                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php/site/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li class="active">Create Slider</li>
        </ol>
</section>


<a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/cms/Banner/admin'; ?>" class='btn  btn-laksyah manage'>Manage Banner</a>
<section class="content">
        <div class="box">
                <div class="box box-info">

                        <div class="box-body">
                                <?php $this->renderPartial("_form", array("model" => $model)); ?>
                        </div>
                </div>
        </div>

</section><!-- form -->