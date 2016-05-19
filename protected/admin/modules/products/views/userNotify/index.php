<?php
/* @var $this UserNotifyController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'User Notifies',
);

$this->menu=array(
	array('label'=>'Create UserNotify', 'url'=>array('create')),
	array('label'=>'Manage UserNotify', 'url'=>array('admin')),
);
?>

<h1>User Notifies</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
