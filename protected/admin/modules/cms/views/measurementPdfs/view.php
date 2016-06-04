<?php
/* @var $this MeasurementPdfsController */
/* @var $model MeasurementPdfs */

$this->breadcrumbs=array(
	'Measurement Pdfs'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List MeasurementPdfs', 'url'=>array('index')),
	array('label'=>'Create MeasurementPdfs', 'url'=>array('create')),
	array('label'=>'Update MeasurementPdfs', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MeasurementPdfs', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MeasurementPdfs', 'url'=>array('admin')),
);
?>

<h1>View MeasurementPdfs #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'file',
		'cb',
		'doc',
		'ub',
		'dou',
	),
)); ?>
