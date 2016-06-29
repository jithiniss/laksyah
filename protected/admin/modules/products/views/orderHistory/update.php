<?php
/* @var $this OrderHistoryController */
/* @var $model OrderHistory */
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
                <h1 style="float: left;" class="title">OrderHistory</h1>
                <p style="float: left;margin-top: 8px;margin-left: 11px;" class="description">Update OrderHistory</p>
        </div>

        <div class="breadcrumb-env">

                <ol class="breadcrumb bc-1" >
                        <li>
                                <a href="<?php echo Yii::app()->request->baseurl . '/site/home'; ?>"><i class="fa-home"></i>Home</a>
                        </li>

                        <li class="active">

                                <strong>Update OrderHistory</strong>
                        </li>
                </ol>

        </div>

</div>
<div class="row">


        <div class="col-sm-12">
                <a class="btn  btn-success manage" href="<?php echo Yii::app()->request->baseurl . '/products/orderHistory/admin'; ?>" id="add-note">
                        <i class="fa fa-pencil"></i>
                        <span>Manage OrderHistory</span>
                </a>

                <div class="panel panel-default">
                        <div class="panel-heading">
                                <h3 class="panel-title"></h3>

                        </div>
                        <div class="panel-body">
                                <?php $this->renderPartial('_form', array('model' => $model)); ?>            </div>

                </div>


        </div>

</div>


