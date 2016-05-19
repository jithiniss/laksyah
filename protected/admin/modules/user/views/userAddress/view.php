<?php
/* @var $this UserAddressController */
/* @var $model UserAddress */

$this->breadcrumbs=array(
	'User Addresses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UserAddress', 'url'=>array('index')),
	array('label'=>'Create UserAddress', 'url'=>array('create')),
	array('label'=>'Update UserAddress', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UserAddress', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserAddress', 'url'=>array('admin')),
);
?>

<h1>View UserAddress #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'first_name',
		'last_name',
		'company',
		'address_1',
		'address_2',
		'city',
		'postcode',
		'country',
		'state',
		'district',
		'CB',
		'UB',
		'DOC',
		'DOU',
	),
)); ?>
