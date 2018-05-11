<?php
$this->breadcrumbs=array(
	'Room Codition Relations'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List RoomCoditionRelation','url'=>array('index')),
	array('label'=>'Create RoomCoditionRelation','url'=>array('create')),
	array('label'=>'Update RoomCoditionRelation','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete RoomCoditionRelation','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View RoomCoditionRelation #'. $model->id; ?>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'room_type_id',
		'condition_id',
		'temp1',
		'temp2',
	),
)); ?>
