<?php
$this->breadcrumbs=array(
	'Trip Room Codition Relations'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TripRoomCoditionRelation','url'=>array('index')),
	array('label'=>'Create TripRoomCoditionRelation','url'=>array('create')),
	array('label'=>'Update TripRoomCoditionRelation','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete TripRoomCoditionRelation','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View TripRoomCoditionRelation #'. $model->id; ?>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'trip_id',
		'room_type_id',
		'condition_id',
		'temp1',
		'temp2',
	),
)); ?>
