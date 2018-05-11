<?php
$this->breadcrumbs=array(
	'Comments'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Comments','url'=>array('index')),
	array('label'=>'Create Comments','url'=>array('create')),
	array('label'=>'Update Comments','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Comments','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View Comments #'. $model->id; ?>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'comment',
		'trip_id',
		'user_id',
		'date',
	),
)); ?>
