<?php
/* @var $this UserSizechartController */
/* @var $model UserSizechart */

$this->breadcrumbs=array(
	'User Sizecharts'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UserSizechart', 'url'=>array('index')),
	array('label'=>'Create UserSizechart', 'url'=>array('create')),
	array('label'=>'Update UserSizechart', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UserSizechart', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserSizechart', 'url'=>array('admin')),
);
?>

<h1>View UserSizechart #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'product_name',
		'product_code',
		'type',
		'unit',
		'standerd',
		'around_neck',
		'neck_depth',
		'around_upper_chest',
		'around_chest',
		'around_lower_chest',
		'shoulder_to_breastpoint',
		'around_waist',
		'shoulder_to_waist',
		'around_armhole',
		'sleeve_length',
		'arm_length',
		'around_upper_arm',
		'around_elbow',
		'around_wrist',
		'length_upper_garment',
		'shoulder_width',
		'around_lower_waist',
		'waist_to_ankle',
		'inseam_to_ankle',
		'around_hip',
		'around_tigh',
		'around_knee',
		'around_calf',
		'around_ankle',
		'skirt_length',
		'gown_full_length',
		'date',
		'comments',
		'enq_id',
		'enq_history_id',
	),
)); ?>
