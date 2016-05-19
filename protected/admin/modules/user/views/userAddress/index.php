<?php
/* @var $this UserAddressController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'User Addresses',
);

$this->menu=array(
	array('label'=>'Create UserAddress', 'url'=>array('create')),
	array('label'=>'Manage UserAddress', 'url'=>array('admin')),
);
?>

<h1>User Addresses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
