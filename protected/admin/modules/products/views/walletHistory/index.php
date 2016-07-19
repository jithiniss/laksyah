<?php
/* @var $this WalletHistoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Wallet Histories',
);

$this->menu=array(
	array('label'=>'Create WalletHistory', 'url'=>array('create')),
	array('label'=>'Manage WalletHistory', 'url'=>array('admin')),
);
?>

<h1>Wallet Histories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
