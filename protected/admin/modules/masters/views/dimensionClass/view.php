<?php
/* @var $this DimensionClassController */
/* @var $model DimensionClass */

$this->breadcrumbs=array(
	'Dimension Classes'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List DimensionClass', 'url'=>array('index')),
	array('label'=>'Create DimensionClass', 'url'=>array('create')),
	array('label'=>'Update DimensionClass', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DimensionClass', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DimensionClass', 'url'=>array('admin')),
);
?>

<h1>View DimensionClass #<?php echo $model->id; ?></h1>

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
