


<section class="content-header">
        <h1>
               Feedback                <small>Create</small>
        </h1>
        <ol class="breadcrumb">
                <li><a href="<?php echo Yii::app()->request->baseUrl.'/admin.php/enquiry/feedback/admin'; ?>"><i class="fa fa-dashboard"></i>  Feedback</a></li>
                <li class="active">create</li>
        </ol>
</section>


<a href="<?php echo Yii::app()->request->baseUrl.'/admin.php/enquiry/feedback/admin'; ?>" class='btn  btn-success manage'>Manage Feedback</a>
<section class="content">
        <div class="box box-info">

                <div class="box-body">
                        <?php $this->renderPartial("_form", array("model" => $model)); ?>
                </div>

        </div>

</section><!-- form -->