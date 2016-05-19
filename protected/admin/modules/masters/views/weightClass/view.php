<?php
/* @var $this WeightClassController */
/* @var $model WeightClass */

$this->breadcrumbs=array(
	'Weight Classes'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List WeightClass', 'url'=>array('index')),
	array('label'=>'Create WeightClass', 'url'=>array('create')),
	array('label'=>'Update WeightClass', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete WeightClass', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage WeightClass', 'url'=>array('admin')),
);
?>

<h1>View WeightClass #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'unit',
		'CB',
		'UB',
		'DOC',
		'DOU',
	),
)); ?>
