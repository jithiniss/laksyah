<?php
/* @var $this HomeCategoryController */
/* @var $model HomeCategory */

$this->breadcrumbs=array(
	'Home Categories'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List HomeCategory', 'url'=>array('index')),
	array('label'=>'Create HomeCategory', 'url'=>array('create')),
	array('label'=>'Update HomeCategory', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete HomeCategory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage HomeCategory', 'url'=>array('admin')),
);
?>

<h1>View HomeCategory #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'category_name',
		'CB',
		'UB',
		'DOC',
		'DOU',
	),
)); ?>
