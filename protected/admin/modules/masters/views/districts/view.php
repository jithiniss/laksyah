<?php
/* @var $this DistrictsController */
/* @var $model Districts */

$this->breadcrumbs=array(
	'Districts'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'List Districts', 'url'=>array('index')),
	array('label'=>'Create Districts', 'url'=>array('create')),
	array('label'=>'Update Districts', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete Districts', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Districts', 'url'=>array('admin')),
);
?>

<h1>View Districts #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'country_id',
		'state_id',
		'district_name',
	),
)); ?>
