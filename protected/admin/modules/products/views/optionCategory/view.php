<?php
/* @var $this OptionCategoryController */
/* @var $model OptionCategory */

$this->breadcrumbs=array(
	'Option Categories'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List OptionCategory', 'url'=>array('index')),
	array('label'=>'Create OptionCategory', 'url'=>array('create')),
	array('label'=>'Update OptionCategory', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete OptionCategory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OptionCategory', 'url'=>array('admin')),
);
?>

<h1>View OptionCategory #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'option_type_id',
		'color_name',
		'color_code',
		'size',
		'status',
		'field1',
	),
)); ?>
