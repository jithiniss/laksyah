<?php
/* @var $this WalletHistoryController */
/* @var $model WalletHistory */
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
        <h1 style="float: left;" class="title">WalletHistory</h1>
        <p style="float: left;margin-top: 8px;margin-left: 11px;" class="description">Manage WalletHistory</p>
    </div>

    <div class="breadcrumb-env">

        <ol class="breadcrumb bc-1" >
            <li>
                <a href="<?php echo Yii::app()->request->baseurl.'/site/home'; ?>"><i class="fa-home"></i>Home</a>
            </li>

            <li class="active">

                <strong>Manage WalletHistory</strong>
            </li>
        </ol>

    </div>

</div>
<div class="row">


    <div class="col-sm-12">

        <a class="btn btn-secondary btn-icon btn-icon-standalone" href="<?php echo Yii::app()->request->baseurl.'/user/walletHistory/create'; ?>" id="add-note">
            <i class="fa-pencil"></i>
            <span>Add WalletHistory</span>
        </a>
        <div class="panel panel-default">
            <?php $this->widget('booster.widgets.TbGridView', array(
            'type' => ' bordered condensed hover',
            'id'=>'wallet-history-grid',
            'dataProvider'=>$model->search(),
            'filter'=>$model,
            'columns'=>array(
            		'id',
		'user_id',
		'type_id',
		'amount',
		'entry_date',
		'credit_debit',
		/*
		'balance_amt',
		'ids',
		'field1',
		'field2',
		*/

            array(
            'htmlOptions' => array('nowrap' => 'nowrap'),
            'class' => 'booster.widgets.TbButtonColumn',
            'template' => '{update}{delete}',
            ),
            ),
            )); ?>
        </div>

    </div>


</div>

