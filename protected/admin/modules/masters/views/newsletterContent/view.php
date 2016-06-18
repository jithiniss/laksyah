<?php
/* @var $this NewsletterContentController */
/* @var $model NewsletterContent */

$this->breadcrumbs=array(
	'Newsletter Contents'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List NewsletterContent', 'url'=>array('index')),
	array('label'=>'Create NewsletterContent', 'url'=>array('create')),
	array('label'=>'Update NewsletterContent', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete NewsletterContent', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage NewsletterContent', 'url'=>array('admin')),
);
?>

<h1>View NewsletterContent #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'heading',
		'subheading',
		'content',
		'image',
		'link',
		'status',
		'type',
		'doc',
		'cb',
		'dou',
		'ub',
	),
)); ?>
