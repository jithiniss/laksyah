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
        <h1 style="float: left; font-size: 24px;" class="title">QAndA</h1>
<!--        <p style="float: left;margin-top: 8px;margin-left: 11px;" class="description">Manage QAndA</p>-->
    </div>

    <!--    <div class="breadcrumb-env">

            <ol class="breadcrumb bc-1" >
                <li>
                    <a href="<?php //echo Yii::app()->request->baseurl . '/site/home';     ?>"><i class="fa-home"></i>Home</a>
                </li>

                <li class="active">

                    <strong>Manage QAndA</strong>
                </li>
            </ol>

        </div>-->

</div>
<div class="row">


    <div class="col-sm-12">


        <a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/qAndA/create'; ?>" class='btn  btn-laksyah manage'>Add Q & A</a>

<!--        <a class="btn btn-secondary btn-icon btn-icon-standalone" href="<?php echo Yii::app()->request->baseurl . '/qAndA/create'; ?>" id="add-note">
    <i class="fa-pencil"></i>
    <span>Add QAndA</span>
</a>-->
        <div class="panel panel-default">
            <?php
            $this->widget('booster.widgets.TbGridView', array(
                'type' => ' bordered condensed hover',
                'id' => 'qand-a-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    'id',
                    'order_q1',
                    'order_a1',
                    'order_q2',
                    'order_a2',
                    'payment_q1',
                    /*
                      'payment_a1',
                      'payment_q2',
                      'payment_a2',
                      'sort_order',
                      'cb',
                      'ub',
                      'doc',
                      'dou',
                     */
                    array(
                        'htmlOptions' => array('nowrap' => 'nowrap'),
                        'class' => 'booster.widgets.TbButtonColumn',
                        'template' => '{update}{delete}',
                    ),
                ),
            ));
            ?>
        </div>

    </div>


</div>

