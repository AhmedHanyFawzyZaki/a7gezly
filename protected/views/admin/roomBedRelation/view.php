<?php
$this->breadcrumbs=array(
	'Room Bed Relations'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List RoomBedRelation','url'=>array('index')),
	array('label'=>'Create RoomBedRelation','url'=>array('create')),
	array('label'=>'Update RoomBedRelation','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete RoomBedRelation','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View RoomBedRelation #'. $model->id; ?>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'room_type_id',
		'bed_type_id',
		'temp1',
		'temp2',
	),
)); ?>
