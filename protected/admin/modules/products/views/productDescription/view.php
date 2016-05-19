<?php
/* @var $this ProductDescriptionController */
/* @var $model ProductDescription */

$this->breadcrumbs=array(
	'Product Descriptions'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List ProductDescription', 'url'=>array('index')),
	array('label'=>'Create ProductDescription', 'url'=>array('create')),
	array('label'=>'Update ProductDescription', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ProductDescription', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProductDescription', 'url'=>array('admin')),
);
?>

<h1>View ProductDescription #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'product_id',
		'title',
		'description',
		'image',
		'CB',
		'UB',
		'DOC',
		'DOU',
	),
)); ?>
