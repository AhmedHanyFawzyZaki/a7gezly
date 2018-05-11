<?php
$this->breadcrumbs=array(
	'Room Option Relations'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List RoomOptionRelation','url'=>array('index')),
	array('label'=>'Create RoomOptionRelation','url'=>array('create')),
	array('label'=>'Update RoomOptionRelation','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete RoomOptionRelation','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View RoomOptionRelation #'. $model->id; ?>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'room_type_id',
		'room_option_id',
	),
)); ?>
