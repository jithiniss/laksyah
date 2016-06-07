<?php
/* @var $this QAndAController */
/* @var $model QAndA */
?>
<style>
    .table th, td{
        text-align: center;
    }
    .table td{
        text-align: center;
    }
</style>
<div class="page-title">

    <div class="title-env">
        <h1 style="float: left;font-size: 24px;" class="title">Q & A</h1>
<!--        <p style="float: left;margin-top: 8px;margin-left: 11px;" class="description">Update QAndA</p>-->
    </div>

    <!--    <div class="breadcrumb-env">

            <ol class="breadcrumb bc-1" >
                <li>
                    <a href="<?php //echo Yii::app()->request->baseurl . '/site/home';     ?>"><i class="fa-home"></i>Home</a>
                </li>

                <li class="active">

                    <strong>Update QAndA</strong>
                </li>
            </ol>

        </div>-->

</div>
<div class="row">


    <div class="col-sm-12">

        <a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/qAndA/admin'; ?>" class='btn  btn-laksyah manage'>Manage Q & A</a>
<!--        <a class="btn btn-secondary btn-icon btn-icon-standalone" href="<?php echo Yii::app()->request->baseurl . '/qAndA/admin'; ?>" id="add-note">
        <i class="fa-pencil"></i>
        <span>Manage QAndA</span>
    </a>-->

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"></h3>

            </div>
            <div class="panel-body">
                <?php $this->renderPartial('_form', array('model' => $model)); ?>            </div>

        </div>


    </div>

</div>


