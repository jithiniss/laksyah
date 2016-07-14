<?php
/* @var $this UserGiftscardHistoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'User Giftscard Histories',
);

$this->menu=array(
	array('label'=>'Create UserGiftscardHistory', 'url'=>array('create')),
	array('label'=>'Manage UserGiftscardHistory', 'url'=>array('admin')),
);
?>

<h1>User Giftscard Histories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
