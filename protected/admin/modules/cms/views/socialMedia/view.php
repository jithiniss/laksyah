<?php
/* @var $this SocialMediaController */
/* @var $model SocialMedia */

$this->breadcrumbs=array(
	'Social Medias'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List SocialMedia', 'url'=>array('index')),
	array('label'=>'Create SocialMedia', 'url'=>array('create')),
	array('label'=>'Update SocialMedia', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SocialMedia', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SocialMedia', 'url'=>array('admin')),
);
?>

<h1>View SocialMedia #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'link',
		'CB',
		'UB',
		'DOC',
		'DOB',
	),
)); ?>
