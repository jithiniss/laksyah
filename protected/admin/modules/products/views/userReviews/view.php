<?php
/* @var $this UserReviewsController */
/* @var $model UserReviews */

$this->breadcrumbs=array(
	'User Reviews'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UserReviews', 'url'=>array('index')),
	array('label'=>'Create UserReviews', 'url'=>array('create')),
	array('label'=>'Update UserReviews', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UserReviews', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserReviews', 'url'=>array('admin')),
);
?>

<h1>View UserReviews #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'guest_user',
		'user_image',
		'product_id',
		'review',
		'approvel',
	),
)); ?>
