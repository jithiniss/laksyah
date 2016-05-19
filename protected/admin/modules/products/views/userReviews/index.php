<?php
/* @var $this UserReviewsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'User Reviews',
);

$this->menu=array(
	array('label'=>'Create UserReviews', 'url'=>array('create')),
	array('label'=>'Manage UserReviews', 'url'=>array('admin')),
);
?>

<h1>User Reviews</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
