<?php
$this->breadcrumbs=array(
	'Drivers'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Drivers','url'=>array('index')),
	array('label'=>'Create Driver','url'=>array('create')),
	array('label'=>'Update Driver','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Driver','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View Driver "'. $model->full_name . '"'; ?>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'full_name',
		'email',
		'phone',
		'address',
	),
)); ?>
